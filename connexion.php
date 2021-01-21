<?php
    //TEST DE CONNEXION AU SERVEUR
    $connexion = mysqli_connect("localhost","root","","anagrams");
    if(!$connexion){
        exit;
    }
?>