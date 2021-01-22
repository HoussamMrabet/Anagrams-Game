<?php
	ob_start();
	session_start();
	/*if (isset($_SESSION['user'])) {
		header('Location: index.php');
	}*/
	include 'init.php';

	// Check If User Coming From HTTP Post Request

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['login'])) {
			$user = $_POST['username'];
			$pass = $_POST['password'];

			// Check If The User Exist In Database

			$stmt = $con->prepare("SELECT 
										ID, username, FullName, gmail, password, highScore
									FROM 
										user 
									WHERE 
										username = ? 
									AND 
										password = ?");

			$stmt->execute(array($user, $pass));

			$get = $stmt->fetch();

			$count = $stmt->rowCount();

			// If Count > 0 This Mean The Database Contain Record About This Username

			if ($count > 0) {

                $_SESSION['username'] = $user; // Register Session Name

                
                $_SESSION['ID'] = $get['ID']; // Register User ID in Session


                $_SESSION['highScore'] = $get['highScore'];

			} else {
                echo "<script>alert('wrong password or username')</script>";
            }
		} else {			

			$username 	= $_POST['username'];
			$password 	= $_POST['password'];
			$email 		= $_POST['gmail'];
			$fullname	= $_POST['fname'];

			// Insert Userinfo In Database
			$stmt = $con->prepare("INSERT INTO 
									user(username, FullName, gmail, password, highScore)
								VALUES(:zuser, :zfname, :zgmail, :zpass, 0)");
			$stmt->execute(array(
				'zuser' => $username,
				'zfname' => $fullname,
				'zgmail' => $email,
				'zpass' => $password,
            ));
            echo "<script>alert('Account created')</script>";
		}
    }
    
    if(isset($_SESSION["username"])){
        $usernameis = $_SESSION["username"];
    }else{
        $usernameis = "username";
    }

?>



<header>
    <nav class="nav-bar">
        <div class="options">
            <button id="music"><i class="fas fa-music"></i></button>
            <button id="nomusic" class="active"><i style="position:relative;" class="fas fa-music"><i style="position:absolute;left:0;" class="fas fa-slash"></i></i></button>
            <button id="sound"><i class="fas fa-volume-up"></i></button>
            <button id="mute" class="active"><i class="fas fa-volume-mute"></i></button>
        </div>
        <div class="log-in-out">
            <button id="usernames"><?php echo $usernameis; ?></button>
            <button id="login"><i class="fas fa-sign-in-alt"></i> Log in</button>
            <button id="signin"><i class="fas fa-user-plus"></i> Sign in</button>
            <a href="logout.php"><button id="logout"><i class="fas fa-power-off"></i></button></a>
        </div>
    </nav>
</header>

<!-- Start Signin Form -->
    <div class="signin-container">
        <div class="signin-popup">
            <button class="signin-close-btn">X</button>
            <h1>Sign in</h1>
            <form name="inscription" class="forms" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <label for="username">Username</label>
                <input type="text" name="username" required>
                <label for="fname">Full Name</label>
                <input type="text" name="fname" required>
                <label for="gmail">Gmail</label>
                <input type="text" name="gmail" required>
                <label for="password">Password</label>
                <input type="password" name="password" required>
                <input type="submit" class="submit-btn" name="signin">
            </form>
        </div>
    </div>
<!-- End Signin Form -->


<!-- Start Login Form -->
    <div class="login-container">
        <div class="login-popup">
            <button class="login-close-btn">X</button>
            <h1>Login</h1>
            <form name="login" class="forms" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <label for="username">Username</label>
                <input type="text" name="username" required>
                <label for="password">Password</label>
                <input type="password" name="password" required>
                <input type="submit" class="submit-btn" name="login">
            </form>
        </div>
    </div>
<!-- End Login Form -->

<!--div class="success-container">
    <div class="success-popup">
        <h3>Your Account has been created</h3>
        <h4>&#128077;</h4>
    </div>
</div-->

<?php 
    if(!isset($_SESSION['username'])){
        echo "<script>document.querySelector('#logout').classList.add('active')</script>";
        echo "<script>document.querySelector('#usernames').classList.add('active')</script>";
        echo "<script>document.querySelector('#login').classList.remove('active')</script>";
        echo "<script>document.querySelector('#signin').classList.remove('active')</script>";
    } else {
        echo "<script>document.querySelector('#login').classList.add('active')</script>" ;
        echo "<script>document.querySelector('#signin').classList.add('active')</script>" ;
        echo "<script>document.querySelector('#logout').classList.remove('active')</script>" ;
        echo "<script>document.querySelector('#usernames').classList.remove('active')</script>" ;
    }
?>