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
        header("Location: createInterview.php");
    }

    if(isset($_POST['submit'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $time = mysqli_real_escape_string($conn, $_POST['time']);

        $sql = "INSERT INTO interviews(application_id, email, `date`, `time`) VALUES ('$applicationId', '$email', '$date', '$time')";
        if(mysqli_query($conn, $sql)){
            
            $sql1 = "SELECT * FROM job_applications WHERE application_id = ?";

            $stmt = mysqli_stmt_init($conn);

            if(mysqli_stmt_prepare($stmt, $sql1)){
                mysqli_stmt_bind_param($stmt,"s", $applicationId);
                $run = mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while($row = mysqli_fetch_assoc($result)){
                    $sEmail = $row['email'];
                    $sub =  "Online Interview Confirmation.";
                    $msg = "Dear " .$row['full_name']. ",
                    \r\nCongratulations! Your application for the position associated with Job ID:". $row['job_id']. " has been successful, and we would like to invite you for an online interview.
                    \r\nInterview Details:
                    \nDate : ".$date ."
                    \nTime : ".$time ."
                    \nPlatform : Zoom
                    \r\nPlease expect to receive the Zoom link 30 minutes before the scheduled interview time. If this time is inconvenient or you encounter any issues, please let us know immediately.
                    \r\nWe look forward to connecting with you virtually and discussing your potential contribution to our team.
                    \r\nIf you have any questions or concerns, feel free to contact me at ".$email.".
                    \r\nBest regards,\r\nAdmin Career Bridge\r\nCareerbridge Team\r\n";

                    $header = "From : Career Bridge";                
                    if($run == TRUE){
                        if(mail($sEmail, $sub, $msg, $header)){
                            $emailM = "Check Your Email!";
                            header("Location: createInterview.php");
                            
                        }
                        else{
                            $emailM = "Enter valid Email";
                        }
                    }
                    
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="CSS/interviewStyle.css">
</head>
<body>
    <?php include 'navBar.php';?>
    <div class="container">
        <h1>Create A Interview</h1>
        <form action="" method="post">
            <label for="">Enter your contact email : </label>
            <input type="text" name="email" id="">
            <br>

            <label for="">Interview Date : </label>
            <input type="date" name="date" id="">
            <br>

            <label for="">Interview Time : </label>
            <input type="time" name="time" id="">
            <br>

            <input type="submit" value="Submit" name="submit">
            
        </form>
    </div>
    <?php include 'footer.php';?>
</body>
</html>