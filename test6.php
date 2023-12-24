<?php
    session_start();

    include 'dbh.inc.php';

    $uName = "";
    $randomNumber = "";

    if(isset($_POST['inputSub'])){
        $input = $_POST['input'];
        
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

            $to = $row['email'];
            $sub =  "Verification code to reset your CareerBridge password";
            $msg = "Dear " .$row['fname']. ",
            \r\n\r\nHere's the verification code to reset your password
            \r\n\r\nTo reset your password, enter this verification code when prompted:
            \r\n\r\n
            \r\n\r\n $randomNumber";
            $header = "From : Career Bridge";
            
            if(mail($to, $sub, $msg, $header)){
                $emailM = "Check Your Email!";
                $uName = $input;                           
            }
            else{
                $emailM = "Enter valid Email";
            }
        }

    }

?>