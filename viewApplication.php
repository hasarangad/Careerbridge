<?php
    session_start();

    include 'dbh.inc.php';
    
    //variables
    $uName;
    $applicationId;

    //check user loged in or not
    if(!isset($_SESSION["uName"])){
        header('Location: login.php');  
    }
    else{
        $uName = $_SESSION['uName'];
    }
    
    //check application id is set or not
    if(isset($_GET['id'])){
        $applicationId = mysqli_real_escape_string($conn, $_GET['id']);
    }
    else{
        header("Location: applied_jobs_view.php");
    }
?>