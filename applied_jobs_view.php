<?php

session_start();

include 'dbh.inc.php';

$uName = $_SESSION['uName'];

$sql = "SELECT * FROM job_applications WHERE userName = ?";

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
        <h1>My Applications</h1>
        <?php
        if(mysqli_stmt_prepare($stmt, $sql)){
            mysqli_stmt_bind_param($stmt,"s", $uName);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while($row = mysqli_fetch_assoc($result)){
                $applicationId = $row['application_id'];
        ?>        
        
        <div class="box">
            <h3>Application for j<?php echo $row['job_id'];?> : </h3>
            <form action="" method="post" class="button">
                <a href="viewApplication.php"><input type="submit" value="Read CV" name="rCv"></a>
                <input type="submit" value="Update CV" name="uCv">
                <input type="submit" value="Delete CV" name="dCv">
            </form>
        </div>
        <?php
            }
        }?>
    </div>
    <?php include 'footer.php';?>
</body>
</html>