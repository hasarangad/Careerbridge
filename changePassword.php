<?php
    session_start();

    include 'dbh.inc.php';

    $uName = "";

    if(isset($_POST['confirm'])){
        $code = $_POST['code'];

        if($randomNumber == $code){
            echo "True";
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
            <h2>Forgot Password</h2>
            <div class="inputBox">
                <div class="inputField">
                    <input type="text" name="code" id="" required>
                    <span>Enter your Verification Code : </span>
                    <i></i>
                </div>
            </div>
            <button type="submit" onclick="showThreeDiv()" name="confirm">Submit</button>           
        </form>
    </div>

    <div id="div3" class="thirdDiv">
        <form action="" method="post">
            <h2>Forgot Password</h2>
            <div class="inputBox">
                <div class="inputField">
                    <input type="text" name="code" id="" required>
                    <span>Enter your Verification Code : </span>
                    <i></i>
                </div>
            </div>
            <button type="submit" onclick="showThreeDiv()" name="confirm">Submit</button>           
        </form>
    </div>

    <script>
        // function showSecondDiv() {
        //     // Hide the first div
        //     document.getElementById('div1').style.display = 'none';
        //     // Show the second div
        //     document.getElementById('div2').style.display = 'block';
        // }

        // function showThreeDiv() {
        //     // Hide the first div
        //     document.getElementById('div2').style.display = 'none';
        //     // Show the second div
        //     document.getElementById('div3').style.display = 'block';
        // }
    </script>
</body>
</html>