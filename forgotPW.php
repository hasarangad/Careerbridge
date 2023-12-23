<?php
    session_start();

    include 'dbh.inc.php';

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
            <button type="submit" onclick="showSecondDiv()" name="inputSub">Next</button>           
        </form>
        
    </div>

    <div id="div2" class="secondDiv">
        <form action="" method="post">
            <h2>Forgot Password</h2>
            <div class="inputBox">
                <div class="inputField">
                    <input type="text" name="code" id="" required>
                    <span>Enter your Verification Code : </span>
                    <i></i>
                </div>
            </div>
            <button type="submit" onclick="showSecondDiv()" name="inputSub">Next</button>           
        </form>
    </div>

    <script>
        function showSecondDiv() {
            // Hide the first div
            document.getElementById('div1').style.display = 'none';
            // Show the second div
            document.getElementById('div2').style.display = 'block';
        }
        function showThreeDiv() {
            // Hide the first div
            document.getElementById('div1').style.display = 'block';
            // Show the second div
            document.getElementById('div2').style.display = 'none';
        }
    </script>
</body>
</html>