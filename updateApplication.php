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
        
        <h1>Application For Job ID <?php echo $row['job_id'];?>  </h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="inlinecontentC">
                <h3>Full Name : </h3>
                <input type="text" name="lName" id="" value="<?php echo $row['full_name']?>">
            </div>

            <div class="inlinecontentC">
                <h3>Contact Number : </h3>
                <input type="text" name="lName" id="" value="<?php echo $row['contact_number']?>">
            </div>

            <div class="inlinecontentC">
                <h3>Email Address : </h3>
                <input type="text" name="lName" id="" value="<?php echo $row['email']?>">
            </div>

            <div class="inlinecontentC">
                <h3>Date of birth : </h3>
                <input type="text" name="lName" id="" value="<?php echo $row['dob']?>">
            </div>

            <div class="inlinecontentC">
                <h3>Change CV : </h3>
                <input type="File" name="file" value="">                
            </div>

        </form>

        <?php
            }
        }?>
    </div>
    <?php include 'footer.php';?>
</body>
</html>
