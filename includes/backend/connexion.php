<?php
    //TEST DE CONNEXION AU SERVEUR
    $connexion = mysqli_connect("localhost","root","","anagrams");
    if(!$connexion){
        echo "<script>alert('probleme de connexion serveur')</script>";
        exit;
    }else{
        echo "<script>alert('connexion reussi')</script>";

    }
?>