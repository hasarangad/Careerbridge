<?php
session_start();

include 'dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input from the login form
    $input_username = $_POST["uName"];
    $input_password = $_POST["pwd"];

    // Query the database to check if the entered credentials are correct
    $sql = "SELECT * FROM user WHERE userName = '$input_username' AND password = '$input_password'";
    $result = mysqli_query($conn, $sql);

    $rsltCheck = mysqli_num_rows($result);;
    if ($rsltCheck > 0) {
        // Set a session variable to indicate that the user is logged in
        $_SESSION["loggedin"] = true;

        // Redirect the user to the home page
        $_SESSION['uName'] = $input_username;
        header("Location: video.php");
       
        //exit;
    } else {
        // Display an error message if the credentials are incorrect
        $error_message = "Incorrect username or password";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/login.css">
    <title>CareerBridge | Log IN</title>
</head>
<body>
    <?php
        // Display error message in JavaScript if any
        if (isset($error_message)) {
            echo "<script>alert('$error_message');</script>";
        }
    ?>

    <div class="box">
        <form action="" method="post">
            <h2>Sign In</h2>
            <div class="inputBox">
                <input type="text" name="uName" id="" required>
                <span>Username</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="pwd" id="" required>
                <span>Enter Password</span>
                <i></i>
            </div>
            <input type="submit" name="login" value="Login">
            <div class="links">
                <a href="#">Forgot Password ?</a>
                <a href="selection.php">SignUp</a>
            </div>
        </form>
    </div>

    
</body>
</html>