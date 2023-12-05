<?php
    session_start();

    include 'dbh.inc.php';

    $loginType = $_SESSION['userType'];
    
    if(isset($_GET['code'])){
        $verificationCode = mysqli_real_escape_string($conn, $_GET['code']);

        $sql = "SELECT * FROM user WHERE verificationCode = '$verificationCode'";

        $rslt = mysqli_query($conn, $sql);

        $rows = mysqli_num_rows($rslt);

        if($rows == 1){
            $uSql = "UPDATE user SET isActive = 'true', verificationCode = NULL WHERE verificationCode = '$verificationCode' LIMIT 1";

            $rslt = mysqli_query($conn, $uSql);

            if(mysqli_affected_rows($conn) == 1){
                $verified = "Email Verified";

                if($loginType == "Employee"){
                    header("Location: signupE.php");
                }
                else{
                    header("Location: signupS.php");
                }
            }
        }
    }
?>