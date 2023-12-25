<?php
    session_start();

    include 'dbh.inc.php';

    if(isset($_POST['inputSub'])){
        $input = $_POST['input'];
        $uName = mysqli_real_escape_string($conn, $input);
        $sql = "SELECT * FROM user WHERE userName = ?";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "SQL statement failed!";
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$input);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);

            //send Email
            $randomNumber = rand(100000, 999999);
            $verifyUrl = 'http://localhost/Careerbridge/verifyF.php?code='.$randomNumber.'?userName='.$uName;

            $to = $row['email'];
            $sub =  "Change Your CareerBridge password";
            $msg = "Dear " .$row['fname']. ",
            \r\nWe hope this message finds you well. Our commitment to your account security is our top priority. As part of our routine security measures, we require all users to periodically update their passwords.
            \r\nTo ensure the security of your account, we kindly ask you to reset your password by following the link below:
            \r\n $verifyUrl
            \r\nPlease note the following guidelines for creating a strong and secure password:
            \r\n1. Use a combination of uppercase and lowercase letters.
            \r\n2. Include numbers and special characters.
            \r\n3. Avoid using easily guessable information, such as your name or birthdate.
            \r\n4. Do not use the same password across multiple platforms.
            \r\nIf you have any concerns or questions regarding this password reset process, please don't hesitate to contact our support team at acareerbridge@gmail.com.
            \r\nThank you for your prompt attention to this matter. We appreciate your cooperation in helping us maintain a secure environment for all our users.
            \r\nBest regards,
            \nCareerBridge
            \nacareerbridge@gmail.com";

            $header = "From : Career Bridge";
            
            if(mail($to, $sub, $msg, $header)){
                $emailM = "Check Your Email!";                
                $sql1 = "UPDATE user SET fCode = '$randomNumber' WHERE userName = '$uName' LIMIT 1";
                mysqli_query($conn, $sql1);
                header("Location: login.php");                      
            }
            else{
                $emailM = "Enter valid Email";
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
    <title>CareerBridge | Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="CSS/forgotpwStyle.css">
</head>
<body>
    <div id="div1" class="firstDiv">
        <form action="" method="post">
            <h2>Forgot Password</h2>
            <div class="inputBox">
                <div class="inputField">
                    <input type="text" name="input" id="" required>
                    <span>Enter your Username : </span>
                    <i></i>
                </div>
            </div>
            <button type="submit" name="inputSub">Next</button>           
        </form>
    </div>
</body>
</html>