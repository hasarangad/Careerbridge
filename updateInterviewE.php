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

    $sql = "SELECT * FROM interviews WHERE application_id = ?";
    $stmt = mysqli_stmt_init($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Interview</title>
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
        <form action="" method="post" enctype="multipart/form-data">
            <div class="inlinecontentC">
                <h3>Email Address : </h3>
                <input type="text" name="email" id="" value="<?php echo $row['email']?>">
            </div>

            <div class="inlinecontentC">
                <h3>Date : </h3>
                <input type="text" name="date" id="" value="<?php echo $row['date']?>">
            </div>

            <div class="inlinecontentC">
                <h3>Time : </h3>
                <input type="text" name="time" value="<?php echo $row['time']?>">                
            </div>
            
            <input type="submit" value="Update" name="update">

            
            
        </form>
        <div class="btn">
                <a href="interviewsE.php"><button>Go Back</button></a>                             
        </div>
        <?php
            }
        }?>
    </div>


    <?php
        if(isset($_POST['update'])){
            $time = mysqli_real_escape_string($conn, $_POST['time']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $date = mysqli_real_escape_string($conn, $_POST['date']);

            
            $sql = "UPDATE interviews SET email='$email', `time`='$time', `date`='$date' WHERE application_id='$applicationId'";
 
            if(mysqli_query($conn,$sql)){
                header("Location: viewInterviewE.php?id=$applicationId");
            }
            else{
                echo "Error";
            }
        }   
    ?>


    <?php include 'footer.php';?>
</body>
</html>
