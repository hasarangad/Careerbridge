<?php
    session_start();

    include 'dbh.inc.php';
    
    $uName;
    if(!isset($_SESSION["uName"])){
        header('Location: login.php');  
    }
    else{
        $uName = $_SESSION['uName'];
    }
    
?>