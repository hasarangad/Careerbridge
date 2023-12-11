<?php
session_start();

include 'dbh.inc.php';

if(isset($_POST['signup'])){
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $userName = $_POST['uName'];
    $email = $_POST['email'];
    $pw = $_POST['pwd'];
    $repwd = $_POST['rePwd'];
    $loginType = $_SESSION["userType"];
    $pp = "default.png";

    $verifyCode = sha1($email.time());
    $verifyUrl = 'http://localhost/Careerbridge/verify.php?code='.$verifyCode;
    $isActive = "false";

    $checkUNameSql = "SELECT * FROM user WHERE userName = '$userName'"; 
    $rslt = mysqli_query($conn, $checkUNameSql);

    $rows = mysqli_num_rows($rslt);

    if($rows > 0){
        $usernametaken = "User name already used. Try different username";
    }
    else{
        if($pw == $repwd){
            $sql = "INSERT INTO user(fname, lname, userName, email, password, loginType, verificationCode, isActive, pp) VALUES (?,?,?,?,?,?,?,?,?)";

            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){
                $errorM = "SQL Statement Failed!";
            }
            else{
                mysqli_stmt_bind_param($stmt, "sssssssss", $firstName, $lastName, $userName, $email, $pw, $loginType, $verifyCode, $isActive, $pp);
                $run = mysqli_stmt_execute($stmt);
                $SignUpS = "Sign Up Complete!";
                $_SESSION['uName'] = $userName;
        
                $to = $email;
                $sub =  "Confirm Your Careerbridge Registration";
                $msg = "Dear " .$firstName. ",\r\n\r\nThank you for registering with Careerbridge! We're excited to have you join our community.\r\n\r\nTo activate your account and confirm your registration, please click on the following link:\r\n".$verifyUrl."\r\n\r\nIf the link does not work, copy and paste it into your browser.\r\n\r\nBy confirming your registration, you'll gain access to a variety of resources, job opportunities, and personalized career guidance. Complete your profile to enhance your experience on Careerbridge.If you did not register on Careerbridge or have any concerns about your account, please contact our support team at acareerbridge@gmail.com.\r\n\r\nThank you for choosing Careerbridge. We're here to support you on your career journey.\r\n\r\nBest regards,\r\nAdmin Career Bridge\r\nCareerbridge Team\r\n";

                $header = "From : Career Bridge";

                
                
                if($run == TRUE){
                    if(mail($to, $sub, $msg, $header)){
                        $emailM = "Check Your Email!";
                        
                        
                    }
                    else{
                        $emailM = "Enter valid Email";
                    }
                }
            }


        }
        else{
            $pwdM = "Password dosent match!";
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
    <link rel="stylesheet" type="text/css" href="CSS/signUpStyle.css">
    <title>CareerBridge | Sign Up</title>
</head>

<body>
    <?php
        if(isset($usernametaken)){
            echo "<script>alert('$usernametaken')</script>";
        }
        else if(isset($errorM)){
            echo "<script>alert('$errorM')</script>";
        }
        else if(isset($emailM)){
            echo "<script>alert('$emailM')</script>";
            
            if($loginType == "Employee"){
                header("Location: signupE.php");
            }
            else{
                header("Location: signupS.php");
            }
        }
        else if(isset($pwdM)){
            echo "<script>alert('$pwdM')</script>";
            
        }
    ?>
    
    <div class="box">
        <form action="" method="post">
            <h2>Sign Up</h2>
            <div class="inputBox">
                <div class="inputField">
                    <input type="text" name="fName" id="" required>
                    <span>First Name</span>
                    <i></i>
                </div>
                <div class="inputField">
                    <input type="text" name="lName" id="" required>
                    <span>Last Name</span>
                    <i></i>
                </div>
            </div>

            <div class="inputBox">
                <div class="inputField">
                    <input type="text" name="uName" id="" required>
                    <span>Username</span>
                    <i></i>
                </div>
                <div class="inputField">
                    <input type="text" name="email" id="" required>
                    <span>Email</span>
                    <i></i>
                </div>
            </div>

            <div class="inputBox">
                <div class="inputField">
                    <input type="password" name="pwd" id="" required>
                    <span>Create a new password</span>
                    <i></i>
                </div>
                <div class="inputField">
                    <input type="password" name="rePwd" id="" required>
                    <span>Retype the password</span>
                    <i></i>
                </div>
            </div>
            
            <input type="submit" name="signup" value="Next">

            <div class="links">
                <p>Already have an account ?</p>
                <a href="login.php">Login</a>
            </div>
        </form>
    </div>
</body>
</html>