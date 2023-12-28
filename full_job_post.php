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
    

<body>
    <?php include 'navBarS.php';?>
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
    
    <?php include 'footer.php';?>
</body>

</html>