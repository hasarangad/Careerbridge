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

    if(isset($_GET['id'])){
        $applicationID = $applicationId = mysqli_real_escape_string($conn, $_GET['id']);
    }

    if(isset($_POST['yes'])){
        $sql ="DELETE FROM job_applications WHERE application_id = '$applicationId'";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Application</title>
    <link rel="stylesheet" type="text/css" href="CSS/selection.css">
</head>
<body>
    <div class="rapper">
    
        <div class="img">
            <img src="./Images/Logo.png" alt="Logo">
        </div>
    
        <div class="title">
            <h1>
                Do you want to remove your application ?
            </h1>
        </div>
    
        <div class="btn">
            <form action="" method="post">
                <div class="yes">
                    <button class="button" name="yes">Yes</button>   
                </div>
            </form>
            

            <div class="no">
                <a href="applied_jobs_view.php">
                    <button class="button">No</button>
                </a>
            </div>

        </div>
    </div>
</body>
</html>
