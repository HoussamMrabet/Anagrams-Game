<?php
    //TEST DE CONNEXION AU SERVEUR

	// Local Database
    	$dsn = 'mysql:host=localhost;dbname=anagrams';
		$user = 'root';
		$pass = '';
	
	// Online Database	
		// $host = 'remotemysql.com';
		// $db = 'jaH8fAUX8R';
		// $user = 'jaH8fAUX8R';
		// $pass = 'heEP5Stx21';
		// $charset = 'utf8mb4';
		// $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

	try {
		$con = new PDO($dsn, $user, $pass);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	catch(PDOException $e) {
		echo 'Failed To Connect' . $e->getMessage();
	}
?>