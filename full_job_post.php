<?php
    session_start();

    include 'dbh.inc.php';
    include './php/full_job_post.php';
    
    //variables
    $uName;

    //check user loged in or not
    if(!isset($_SESSION["uName"])){
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/full_job_post.css">
    <title>Job post</title>
</head>
    <nav>
        <img src="img/Logo.png" alt="logo">
        <h1>CareerBridge</h1>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="find_job_E.php">Find Job</a></li>
            <li><a href="view_companies_E.php">Company</a></li>
            <li><a href="notification_E.php">Notifications</a></li>
            <li><a href="setting_E.php">Settings</a></li>
        <ul>
    </nav>

<body>
    <div class="rapper">
        
        <div class="main">
            <?php

                $id=$_GET['id'];
                $sql ="SELECT * FROM job WHERE job_id={$id}";

                $result = mysqli_query($conn,$sql);

                if(mysqli_num_rows($result)>0){
                    if($rows =mysqli_fetch_assoc($result)){
                        elements($rows['company_name'],$rows['job_title'],$rows['job_location'],$rows['job_category'],$rows['monthly_Salary'],$rows['sort_description'],$rows['long_description'],$rows['job_type'],$rows['qulification']
                        );        
                    }   
                }
                ?>

       
        </div>

    </div>

</body>

</html>