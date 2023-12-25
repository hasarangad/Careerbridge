<?php

    session_start();
    include 'dbh.inc.php';

    include './php/job_post_element.php';
    

        if(!isset($_SESSION["uName"])){
            header('Location: login.php');
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/find_job.css">

     <!--font Awsome-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>Find job</title>

</head>
<body>
        <!-- Navigation -->
        <nav>
        <input type="checkbox" id="res-menu">
        <label for="res-menu">
            <i class="fas fa-bars" id="s1"></i>
            <i class="fas fa-times" id="s2"></i>
        </label>
        <img src="img/Logo.png" alt="logo">
        <h1>CareerBridge</h1>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="find_job_E.php">Find Job</a></li>
            <li><a href="view_companies_E.php">Company</a></li>
            <li><a href="notification_E.php">Notifications</a></li>
            <li><a href="setting_E">Settings</a></li>
            <ul>
    </nav>
    
<div class="rapper">

    <div class="section">
            <div class="main-caption">
                <p>Find great Job.....</p>
            </div>
            
            <div class="sub-caption">
                <p>Get access to millions of company  vecancies</p>
            </div>
    </div>

    <div class="search">
        <form action="find_job_E.php" method="get">
            <input type="text" name="search" id="" placeholder="Enter the job Title" autofocus>
            <button type ="submit" name ="submit">Find the job</button>
        </form>
    </div>


    <div class="main">
        <?php
            //company search
            if(isset($_GET['search'])){
                $search = mysqli_real_escape_string($conn,$_GET['search']);
                $sql ="SELECT * FROM job WHERE (job_title LIKE '%{$search}%') ORDER BY job_title ";
            }
            else{
                $sql ="SELECT * FROM job";
            }
    
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($rows =mysqli_fetch_assoc($result)){
                    elements($rows['job_id'],$rows['company_name'],$rows['job_title'],$rows['job_location'],$rows['job_category'],$rows['monthly_Salary'],$rows['sort_description']);        
                }   
            }
        ?>

    </div>
    
    <div class="rate">
        <a href= "com_selection.php">
            <button type="submit" name="submit">
                <i class="fa-solid fa-plus"></i>
                <p>Add job post<p>
            </button>
        </a>
    </div>

</div>

    
</body>
</html>