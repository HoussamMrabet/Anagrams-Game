<?php

    // Error Reporting

    include 'includes/backend/connexion.php';

    $sessionUser = '';
    $sessionAvatar = '';

    if (isset($_SESSION['user'])) {
        $sessionUser = $_SESSION['user'];
        $sessionAvatar = $_SESSION['avatar'];
    }

    // Routes

    $tpl    = 'includes/templates/'; // Template Directory
    $func	= 'includes/functions/'; // Functions Directory
    $css 	= 'layout/css/'; // Css Directory
    $js 	= 'layout/app/'; // Js Directory
    $sounds = 'layout/sounds/';
    
	include $tpl . 'header.php';

?>