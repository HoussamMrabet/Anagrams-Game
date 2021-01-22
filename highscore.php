<?php 
    include 'connexion.php';
    $data['score'] = $_POST['score'];
    $data['id'] = $_POST['id'];
    $stmt = $con->prepare("UPDATE `user` SET `highScore` = :zscore WHERE `user`.`ID` = :zid");
    $stmt->execute(array('zscore' => $data['score'],'zid' => $data['id']));
?>