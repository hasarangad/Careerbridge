<?php
    session_start();
    
    include 'dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerBridge | Home</title>
    <link rel="stylesheet" type="text/css" href="CSS/homeGStyle.css">
</head>
<body>
    <?php include 'navBarS.php';?>

    <!-- Content goes here -->
    <div class="bodyC">
        <h1 class="find">
            Find your <br>  Dream Job Here
        </h1>
        <br>
        <p>
            "Discover your next career move with CareerBridge. 
            We connect you with top job opportunities, making your job search easier and more efficient. 
            Whether you're a seasoned professional or just starting out, our platform is your pathway to success. 
            Start exploring today and take the first step towards your dream job!"
        </p>
        <br>
        <div>
        <div class="search-container">
            <input type="text" class="search-input" placeholder="Search Here">
            <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                <path d="M21.2 19.78l-3.56-3.56C18.27 14.61 19 12.87 19 11c0-3.31-2.69-6-6-6s-6 2.69-6 6 2.69 6 6 6c1.87 0 3.61-.73 4.22-2.64l3.56 3.56c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41zM11 17c-3.31 0-6-2.69-6-6s2.69-6 6-6 6 2.69 6 6-2.69 6-6 6z"/>
                <path d="M0 0h24v24H0z" fill="none"/>
            </svg>
            <br>
        </div>
        <div class="btn">
            <a href="jobPageS.php"><input type="submit" value="Search"></a>
        </div>
        </div>
        
    </div>

    <?php include 'footer.php';?>
    
</body>
</html>
