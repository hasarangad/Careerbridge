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
    if(isset($_GET['userName'])){
        $applicationId = mysqli_real_escape_string($conn, $_GET['userName']);
        
    }
    else{
        // header("Location: checkCV.php");
    }

    //get data from Data base
    $sql = "SELECT user.*, employee.* FROM user INNER JOIN employee ON user.userName = employee.userName WHERE user.userName = ?";
               
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt, $sql)){
        mysqli_stmt_bind_param($stmt,"s", $applicationId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        $firstName = $row["fname"];
        $lastName = $row["lname"];
        $email = $row["email"];
        $fullName = $row["fname"] . " " . $row["lname"];
        $loginType = $row["loginType"];
        $uploads_dir = 'Images/pp';
        $pname = $row['pp'];
        $img = $uploads_dir.'/'.$pname;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Details</title>
    <link rel="stylesheet" href="CSS/profile.css">
</head>
<body>
    
    <div class="container">
        <img src="<?php echo $img;?>" alt="profile_pic">
        <h3 class="full name"><?php echo $fullName;?></h3>
        <strong class="email"><?php echo $email;?></strong>
        <p class="qulification"><?php echo $row['companyName'];?></p>

        <div class="job_type">
            <strong><?php echo $loginType;?></strong>
        </div>

        <div class="settings">
            <a href="jobPageS.php"><button>Go Back</button></a>
        </div>
    </div>
</body>

</html>