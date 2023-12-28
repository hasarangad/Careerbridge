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
                <input type="text" name="fullName" id="" value="<?php echo $row['full_name']?>">
            </div>

            <div class="inlinecontentC">
                <h3>Contact Number : </h3>
                <input type="text" name="contact" id="" value="<?php echo $row['contact_number']?>">
            </div>

            <div class="inlinecontentC">
                <h3>Email Address : </h3>
                <input type="text" name="email" id="" value="<?php echo $row['email']?>">
            </div>

            <div class="inlinecontentC">
                <h3>Date of birth : </h3>
                <input type="text" name="dob" id="" value="<?php echo $row['dob']?>">
            </div>

            <div class="inlinecontentC">
                <h3>Change CV : </h3>
                <input type="File" name="file" value="">                
            </div>
            
            <input type="submit" value="Update" name="update">
        </form>

        <?php
            }
        }?>
    </div>
    <?php
        if(isset($_POST['update'])){
            $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
            $contact = mysqli_real_escape_string($conn, $_POST['contact']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $dob = mysqli_real_escape_string($conn, $_POST['dob']);

            #file name with a random number so that similar dont get replaced
            $pname = $uName."-".$_FILES["file"]["name"];
        
            #temporary file name to store file
            $tname = $_FILES["file"]["tmp_name"];
            
            #upload directory path
            $uploads_dir = 'uploads/';

            $file_path = $uploads_dir . $pname;
            #TO move the uploaded file to specific location
            move_uploaded_file($tname, $uploads_dir.'/'.$pname);

            $sql = "UPDATE job_applications SET full_name='$fullName',contact_number='$contact',email='$email',dob='$dob',resume_path='$file_path' WHERE application_id='$applicationId'";
 
            if(mysqli_query($conn,$sql)){
                header("Location: viewApplication.php?id=$applicationId");
            }
            else{
                echo "Error";
            }
        }   
    ?>
    <?php include 'footer.php';?>
</body>
</html>
