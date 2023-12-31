<?php
    session_start();

    include 'dbh.inc.php';

    $uName;
    
    if(!isset($_SESSION['uName'])){
       header('Location: login.php');
    }
    else{
        $uName = $_SESSION['uName'];
    }

    $sql = "SELECT * FROM job WHERE userName = ?";

    $stmt = mysqli_stmt_init($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checking CV</title>
    <link rel="stylesheet" type="text/css" href="CSS/checkCVStyle.css">
</head>
<body>
<?php include 'navBarS.php';?>
    <div class="container">
        <h1>CHECKING CVs / RESUMES</h1>
        <?php
        if(mysqli_stmt_prepare($stmt, $sql)){
            mysqli_stmt_bind_param($stmt,"s", $uName);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while($row = mysqli_fetch_assoc($result)){
                $jobID = $row['job_id'];

                $sql1 = "SELECT * FROM job_applications WHERE job_id = ?";
                $stmt1 = mysqli_stmt_init($conn);
                if(mysqli_stmt_prepare($stmt1, $sql1)){
                    mysqli_stmt_bind_param($stmt1,"s", $jobID);
                    mysqli_stmt_execute($stmt1);
                    $result1 = mysqli_stmt_get_result($stmt1);
                    while($row1 = mysqli_fetch_assoc($result1)){

        ?>        
        
        <div class="box">
            <h3>New CV / Resume for job id <?php echo $row1['job_id'];?> by <?php echo $row1['full_name'];?> : </h3>
            <div class="button">
                <a href="viewCV.php?id=<?php echo $jobID;?>"><input type="submit" value="Full Details" name="fullCV"></a>
                <!-- <a href="updateApplication.php?id=<?php echo $applicationId;?>"><input type="submit" value="Update CV" name="uCv"></a>
                <a href="deleteApplication.php?id=<?php echo $applicationId;?>"><input type="submit" value="Delete CV" name="dCv"></a> -->
            </div>
        </div>
        <?php
                    }
                }
            }
        }
        ?>
    </div>
    <?php include 'footer.php';?>

</body>
</html>