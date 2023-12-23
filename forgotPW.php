<?php

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
                    <input type="text" name="fName" id="" required>
                    <span>First Name</span>
                    <i></i>
                </div>
            </div>
        </form>
    </div>

    <div id="div2" class="secondDiv">
        <!-- Content of the second div -->
        <p>This is the second div.</p>
    </div>

    <script>
        function showSecondDiv() {
            // Hide the first div
            document.getElementById('div1').style.display = 'none';
            // Show the second div
            document.getElementById('div2').style.display = 'block';
        }
    </script>
  </script>
</body>
</html>