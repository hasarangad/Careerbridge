<?php

    session_start();
    include 'dbh.inc.php';

    include './php/job_post_elementS.php';
    
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
<div class="header">
        <div class="logo">
            <img src="./Images/Logo.png" alt="Logo">
            <a href="homeG.php">CareerBridge</a>
        </div>
        <div class="navbar">
            <a href="selection.php">SignUp</a>
            <a href="login.php">LogIn</a>
            <a href="jobPage.php">Find a Job</a>
            <a href="homeG.php">Home</a>
        </div>
        
</div>

<div class="rapper">

    <div class="section">

        <div class="main-caption">
            <h1>Find great places to work</h1>
        </div>
        
        <div class="sub-caption">
            <h3>Get access to millions of company Jobs</h3>
        </div>

    </div>

    <div class="search">

        <form action="" method="get">

            <div class="form">
                <div class="input">
                    <input type="text" name="search" placeholder="Enter company name" autofocus>
                </div>

                <div class="btn">
                    <button type ="submit" name ="submit">Find Companies</button>
                </div>

            </div>

        </form>

    </div>

    <div class="line"></div>


    <div class="main">
        <?php
            //company search
            if(isset($_GET['search'])){
                $search = mysqli_real_escape_string($conn, $_GET['search']);
                $sql ="SELECT * FROM job WHERE (job_title LIKE '%{$search}%') ORDER BY job_title ";
            }
            else{
                $sql ="SELECT * FROM job";
            }
    
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)>0){
                while($rows =mysqli_fetch_assoc($result)){
                    $userName = $rows['userName'];
                    $query = "SELECT * FROM user WHERE userName ='$userName'";
                    $res = mysqli_query($conn,$query);
                    
                    $first_name = '';
                    $last_name = '';

                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($res)){
                            $first_name = $row['fname'];
                            $last_name = $row['lname'];
                        }
                    }

                    elements($rows['userName'],$rows['job_id'],$rows['company_name'],$rows['job_title'],$rows['job_location'],$rows['job_category'],$rows['monthly_Salary'],$rows['sort_description'],$first_name,$last_name);        
                }   
            }
        ?>

    </div>
    
</div>
    



<?php
    include('footer.php');

?>


    
</body>
</html>