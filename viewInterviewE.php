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
    <title>My Interviews</title>
    <link rel="stylesheet" type="text/css" href="CSS/myApplicationStyle.css">
</head>
<body>
    <?php include 'navBarS.php';?>
    <div class="container">
        <?php
        if(mysqli_stmt_prepare($stmt, $sql)){
            mysqli_stmt_bind_param($stmt,"s", $applicationId);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while($row = mysqli_fetch_assoc($result)){
                $applicationId = $row['application_id'];
        ?>        
        
        <h1>Interview For Application ID <?php echo $row['application_id'];?>  </h1>
        <div class="inlinecontent">
            <h3>Application ID : </h3>
            <p><?php echo $row['application_id'];?></p>
        </div>

        <div class="inlinecontent">
            <h3>Email : </h3>
            <p><?php echo $row['Email'];?></p>
        </div>

        <div class="inlinecontent">
            <h3>Time : </h3>
            <p><?php echo $row['time'];?></p>
        </div>
        
        <div class="inlinecontent">
            <h3>Date : </h3>
            <p><?php echo $row['date'];?></p>
        </div>php echo $row['status'];?></p>
        </div>

        <div class="btn">
            <a href="interviewsE.php"><button>Go Back</button></a>
        </div>
        
        <?php
            }
        }?>
    </div>
    <?php include 'footer.php';?>
</body>
</html>
