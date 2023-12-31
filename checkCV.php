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

    $sql = "SELECT * FROM job_applications WHERE userName = ?";

    $stmt = mysqli_stmt_init($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checking CV</title>
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
                $applicationId = $row['application_id'];
        ?>        
        
        <div class="box">
            <h3>Application for job id <?php echo $row['job_id'];?> : </h3>
            <div class="button">
                <a href="viewApplication.php?id=<?php echo $applicationId;?>"><input type="submit" value="Read CV" name="rCv"></a>
                <a href="updateApplication.php?id=<?php echo $applicationId;?>"><input type="submit" value="Update CV" name="uCv"></a>
                <a href="deleteApplication.php?id=<?php echo $applicationId;?>"><input type="submit" value="Delete CV" name="dCv"></a>
            </div>
        </div>
        <?php
            }
        }?>
    </div>
    <?php include 'footer.php';?>

</body>
</html>