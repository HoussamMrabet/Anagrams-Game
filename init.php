<?php

    // Error Reporting

    include 'connexion.php';

    $sessionUser = '';
    $sessionHighScore = '';

    if (isset($_SESSION['username'])) {
        $sessionUser = $_SESSION['username'];
        $sessionHighScore= $_SESSION['highScore'];
    }

    // Routes

    $tpl    = 'includes/templates/'; // Template Directory
    $css 	= 'layout/css/'; // Css Directory
    $js 	= 'layout/app/'; // Js Directory
    $sounds = 'layout/sounds/';
    
	include $tpl . 'header.php';

?>