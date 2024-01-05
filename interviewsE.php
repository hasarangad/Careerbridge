<?php
    session_start();

    include 'dbh.inc.php';

    $uName;
    $applicationId;
    if(!isset($_SESSION['uName'])){
       header('Location: login.php');
    }
    else{
        $uName = $_SESSION['uName'];
    }

    $sql = "SELECT * FROM interviews WHERE userName = ?";

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
<?php include 'navBar.php';?>
    <div class="container">
        <h1>Interviews</h1>
        <?php
        if(mysqli_stmt_prepare($stmt, $sql)){
            mysqli_stmt_bind_param($stmt,"s", $uName);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while($row = mysqli_fetch_assoc($result)){
                $applicationId = $row['application_id'];
        ?>        
        
        <div class="box">
            <h3>Interview for application id <?php echo $row['application_id'];?> : </h3>
            <div class="button">
                <a href="viewInterviewE.php?id=<?php echo $applicationId;?>"><input type="submit" value="Full Details" name="fullCV"></a>
            </div>
        </div>
        <?php
            }
        }
        ?>
    </div>
    <?php include 'footer.php';?>
</body>
</html>