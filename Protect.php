<?php
session_start();
if (isset($_SESSION['login'])==false){
        echo "<script type=\'text/javascript\'>
        alert('Veuillez vous connecter!');                          
        </script>";
        header("location:index.php");
    }else{
?>