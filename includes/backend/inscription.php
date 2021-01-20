<?php
    include("Connexion.php");
    if(isSet($_POST['inscription'])){
            $req="INSERT INTO user(username,FullName,gmail,password) VALUES ('".$_POST['username']."','".$_POST['fullname']."','".$_POST['gmail']."','".$_POST['password']."')";
            $res=mysqli_query($connexion,$req);
    }
?>
