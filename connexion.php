<?php
    //TEST DE CONNEXION AU SERVEUR
    /*$connexion = mysqli_connect("localhost","root","","anagrams");
    if(!$connexion){
        exit;
    }*/
    $dsn = 'mysql:host=localhost;dbname=anagrams';
	$user = 'root';
	$pass = '';
	$option = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	);

	try {
		$con = new PDO($dsn, $user, $pass, $option);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	catch(PDOException $e) {
		echo 'Failed To Connect' . $e->getMessage();
	}
?>