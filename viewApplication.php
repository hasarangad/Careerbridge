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

    $sql = "SELECT * FROM job_applications WHERE application_id = ?";
    $stmt = mysqli_stmt_init($conn);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Applications</title>
    <link rel="stylesheet" type="text/css" href="CSS/myApplicationStyle.css">
</head>
<body>
    <?php include 'navBar.php';?>
    <div class="container">
        <?php
        if(mysqli_stmt_prepare($stmt, $sql)){
            mysqli_stmt_bind_param($stmt,"s", $applicationId);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while($row = mysqli_fetch_assoc($result)){
                $applicationId = $row['application_id'];
        ?>        
        
        <h1>Application For Job ID <?php echo $row['job_id'];?>  </h1>
        <div class="inlinecontent">
            <h3>Job ID : </h3>
            <p><?php echo $row['job_id'];?></p>
        </div>

        <div class="inlinecontent">
            <h3>Full Name : </h3>
            <p><?php echo $row['full_name'];?></p>
        </div>
        
        
        <?php
            }
        }?>
    </div>
    <?php include 'footer.php';?>
</body>
</html>
