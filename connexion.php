<?php
    //TEST DE CONNEXION AU SERVEUR

	// Local Database
    	$dsn = 'mysql:host=localhost;dbname=anagrams';
		$user = 'root';
		$pass = '';

	try {
		$con = new PDO($dsn, $user, $pass);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	catch(PDOException $e) {
		echo 'Failed To Connect' . $e->getMessage();
	}
?>
