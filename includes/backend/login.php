<?php
    include("Connexion.php");
    /*if(isset($_POST['connexion'])){
        $log=$_POST['gmail'];
        $pass=$_POST['mdp'];
        $sql = "SELECT * FROM user WHERE gmail='$log' and mdp='$pass'";
        $result = mysqli_query($connexion,$sql);
        if(!empty($result)){
            $row = mysqli_fetch_assoc($result);
            $lname = $row['nom'];
            $fname = $row['prenom'];
            $img = $row['image'];
            header ("location:acceuil.php");
        }
    }*/
    session_start(); // Starting Session
    $error = ""; // Variable To Store Error Message
    if (isset($_POST['connexion'])) {
    if (empty($_POST['gmail']) || empty($_POST['mdp'])) {
    $error = "<script>alert('Username or Password is invalid')</script>";
    }
    else{
    // Define $username and $password
    $username = $_POST['username'];
    $password = $_POST['password'];
    // SQL query to fetch information of registerd users and finds user match.
    $query = "SELECT * from user where username=? AND password=? LIMIT 1";
    // To protect MySQL injection for Security purpose
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->bind_result($username, $password);
    $stmt->store_result();
    if($stmt->fetch()) //fetching the contents of the row {
    $_SESSION['login_user'] = $username; // Initializing Session
    header("location: menu.php"); // Redirecting To Menu Page
    mysqli_close($connexion); // Closing Connection
    }
    }
?>