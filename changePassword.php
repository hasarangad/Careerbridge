<?php
    session_start();

    include 'dbh.inc.php';

    $uName = "";
    if(isset($_GET['userName'])){
        $uName = mysqli_real_escape_string($conn,$_GET['userName']);
    }

    if(isset($_POST['newPW'])){
        $nPW = mysqli_real_escape_string($conn,$_POST['newPassword']);
        $cPw = mysqli_real_escape_string($conn,$_POST['cPw']);
        if($nPW == $cPw){
            $sql = "UPDATE user SET `password` = '$nPW' WHERE userName = '$uName' LIMIT 1";

            if(mysqli_query($conn, $sql)){
                $msg = "Password is changed!";
                header("Location: login.php");
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

    <div id="div2" class="secondDiv">
        <form action="" method="post">
            <h2>Change Password</h2>

            <div class="inputBox">
                <div class="inputField">
                    <input type="password" name="newPassword" id="" required>
                    <span>Enter your New Password : </span>
                    <i></i>
                </div>
                <div class="inputField">
                    <input type="password" name="cPw" id="" required>
                    <span>Retype Password : </span>
                    <i></i>
                </div>
            </div>
            <input type="submit" value="Change Password" name="newPW">          
        </form>
    </div>
</body>
</html>