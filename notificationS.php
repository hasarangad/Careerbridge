<?php
session_start();

include 'dbh.inc.php';

if(!isset($_SESSION['uName'])){
   header('Location: login.php');
}
else{
    $uName = $_SESSION['uName'];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerBridge | Notification</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/notificationStyle.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="./Images/Logo.png" alt="Logo">
            <a href="">CareerBridge</a>
        </div>

        <div class="navbar">
            <a href="settingS.php">Settings</a>
            <a href="notificationS.php">Notification</a>
            <a href="#">Company</a>
            <a href="jobPage.php">Find a Job</a>
            <a href="homeS.php">Home</a>
        </div>    
    </div>

    <div class="container">
        <div class="block1">
            <img src="Images/new.jpg" alt="post">
            <a href="#"><button>New Feedback and Comments for Application</button></a>    
        </div>

        <div class="block2">
            <img src="Images/new.jpg" alt="post">
            <a href="#"><button>My applyed job</button></a>
        </div>

        <div class="block3">
            <img src="Images/new.jpg" alt="post">
            <a href="#"><button>My CVs/Resumes</button></a>
        </div>
    </div>

    <footer class="ftr">
        <p>
            &copy; 2023 CareerBridge. All rights reserved.
        </p>
    </footer>

</body>
</html>

