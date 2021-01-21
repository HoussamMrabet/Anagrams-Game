<?php
    session_start();
    include("connexion.php");
    //if(isset($_POST['inscription'])){
        $username=$_POST['username'];
        $fname=$_POST['fname'];
        $gmail=$_POST['gmail'];
        $password=$_POST['password'];    
        $req="INSERT INTO user(username,FullName,gmail,`password`) VALUES ('".$username."','".$fname."','".$gmail."','".$password."')";
        $res=mysqli_query($connexion,$req);
        if($res){
            header("location:menu.php");
        }
    //}else{
       // echo "nothing here";
    //}
?>
