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

    //check application id is set or not
    if(isset($_GET['id'])){
        $applicationId = mysqli_real_escape_string($conn, $_GET['id']);
    }
    else{
        header("Location: checkCV.php");
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
    <title>Checking CV</title>
    <link rel="stylesheet" type="text/css" href="CSS/checkCVStyle.css">
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
                $jobID = $row['job_id'];

        ?> 
        <h1>New CV / Resume for job id <?php echo $jobID;?> by <?php echo $row['full_name'];?></h1>
        <!-- <div class="box"> -->
                
                    <label><b>Job ID : </b></label>
                    <label><?php echo $jobID;?></label>                    
                    <br>
                    <br>
                    
                    <label><b>Full Name : </b></label>
                    <label><?php echo $row['full_name'];?></label>
                    <br>
                    <br>
                    
                    <label><b>Email : </b></label>
                    <label><?php echo $row['email'];?></label>
                    <br>
                    <br>
                    
                    <label><b>DOB : </b></label>
                    <label><?php echo $row['dob'];?></label>
                    <br>
                    <br>
                    
                    <label><b>User Name : </b></label>
                    <label><?php echo $row['userName'];?></label>
                    <br>
                    <br>    
                    
                    <label><b>CV : </b></label>
                    <label><a href="downloadingCV.php?file=<?php echo $row['resume_path']?>"><button>Download CV</button></a></label>
                    <br>
                    <br>
                    <div class="button">
                        <a href="updateCV.php?id=<?php echo $applicationId;?>"><input type="submit" value="Update Status" name="updateCV"></a>
                    </div>
        <!-- </div> -->
        <?php
            }
        }
        ?>
    </div>
    
    <div class="interview">
        <button><a href="createInterview.php">Create a Interview</a></button>
    </div>

    <?php include 'footer.php';?>
    <?php 
        if(!empty($_GET['file']))
        {
            $filename = basename($_GET['file']);
            $filepath = './Images/' . $filename;
            if(!empty($filename) && file_exists($filepath)){

        //Define Headers
                header("Cache-Control: public");
                header("Content-Description: File Transfer");
                header("Content-Disposition: attachment; filename=$filename");
                header("Content-Type: application/zip");
                header("Content-Transfer-Encoding: binary");

                readfile($filepath);
                exit;

            }
            else{
                echo "This File Does not exist.";
            }
        }

    ?>

</body>
</html>