<?php
    session_start();

    include 'dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerBridge | Sign Up-Selection</title>
    <link rel="stylesheet" type="text/css" href="CSS/selectionStyle.css">
</head>
<body>
    <div class="bodyC">
        <img src="./Images/Logo.png" alt="Logo">
        <h1 class="find">
            Are you sign up as a?
        </h1>

        <div class="button-container">
            <form action="" method="post">
                <input type="submit" name="jobSeeker" value="Job Seeker"  class="button">
                <input type="submit" name="employee" value="Employee" class="button">
            </form>
            
        </div>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST['jobSeeker'])){
                    $loginType = $_POST['jobSeeker'];
                    $_SESSION["userType"] = $loginType;
                    echo $_SESSION["userType"];
                    header("Location: signup.php");
                }
                if(isset($_POST['employee'])){
                    $loginType = $_POST['employee'];
                    $_SESSION["userType"] = $loginType;
                    header("Location: signup.php");
                }
            }
            
            
        ?>
        <p>Do you have an account ? <b><a href="login.php">Log In</a></b></p>
    </div>
</body>
</html>
