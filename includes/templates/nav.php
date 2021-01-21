<header>
    <nav class="nav-bar">
        <div class="options">
            <button id="music"><i class="fas fa-music"></i></button>
            <button id="nomusic" class="active"><i style="position:relative;" class="fas fa-music"><i style="position:absolute;left:0;" class="fas fa-slash"></i></i></button>
            <button id="sound"><i class="fas fa-volume-up"></i></button>
            <button id="mute" class="active"><i class="fas fa-volume-mute"></i></button>
        </div>
        <div class="log-in-out">
            <button id="login"><a href="#"><i class="fas fa-sign-in-alt"></i> Log in</a></button>
            <button id="signin"><a href="#"><i class="fas fa-sign-in-alt"></i> Sign in</a></button>
            <button id="logout"><a href="#"><i class="fas fa-power-off"></i> Log out</a></button>
        </div>
    </nav>
</header>

<div class="signin-container">
    <div class="signin-popup">
        <button class="signin-close-btn">X</button>
        <h1>Sign in</h1>
        <form class="forms" action="">
            <label for="username">Username</label>
            <input type="text" name="username">
            <label for="username">Full Name</label>
            <input type="text" name="fname">
            <label for="username">Gmail</label>
            <input type="text" name="username">
            <label for="password">Password</label>
            <input type="password" name="password">
            <input type="submit" class="submit-btn">
        </form>
    </div>
</div>

<div class="login-container">
    <div class="login-popup">
        <button class="login-close-btn">X</button>
        <h1>Login</h1>
        <form class="forms" action="">
            <label for="username">Username</label>
            <input type="text" name="username">
            <label for="password">Password</label>
            <input type="password" name="password">
            <input type="submit" class="submit-btn">
        </form>
    </div>
</div>

<?php 
    include $php . "login.php";
    include $php . "signin.php";
    if(!isset($_SESSION['user'])){
        echo "<script>document.querySelector('#logout').classList.add('active')</script>";
        echo "<script>document.querySelector('#login').classList.remove('active')</script>";
    } else {
        echo "<script>document.querySelector('#login').classList.add('active')</script>" ;
        echo "<script>document.querySelector('#logout').classList.remove('active')</script>" ;
    }
?>