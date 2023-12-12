<?php
    session_start();

    include 'dbh.inc.php';

    $loginType = $_SESSION['userType'];
    $uName = $_SESSION['uName'];

    if(isset($_POST['signUp'])){
        
        $companyName = $_POST['cName'];
        $cAddress = $_POST['userInput'];

        $checkActive = "SELECT * FROM user WHERE userName = '$uName' AND isActive = 'true'";

        $rslt = mysqli_query($conn, $checkActive);

        $rows = mysqli_num_rows($rslt);

        if($rows = 0){
            $error1 = "Check your email!";
        }
        else{
            $sql = "INSERT INTO employee(userName, companyName, Address) VALUES (?, ?, ?)";

            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){
                $errorM = "SQL Statement Failed!";
            }
            else{
                mysqli_stmt_bind_param($stmt, "sss", $uName, $companyName, $cAddress);
                $run = mysqli_stmt_execute($stmt);
                
                $on = "Yes";
                $sql1 = "INSERT INTO notification(userName, mailing) VALUES (?,?)";
                $stmt1 = mysqli_stmt_init($conn);
                if(mysqli_stmt_prepare($stmt1, $sql1)){
                    mysqli_stmt_bind_param($stmt1, "ss", $uName, $on);
                    $run = mysqli_stmt_execute($stmt1);
                    header("Location: video.php");
                }
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
    <link rel="stylesheet" href="CSS/signUpEStyle.css">
    <title>CareerBridge | Sign Up</title>
</head>
<body>
    <div class="box">
        <form action="" method="post">
            <h2>Sign Up</h2>
            <div class="inputBox">
                <input type="text" name="cName" id="" required>
                <span>Company Name</span>
                <i></i>
            </div>
            <br>
            <div class="inputField">
                <label for="userInput">Company Address :</label>
                <textarea id="userInput" name="userInput" rows="6" cols="33"></textarea>
            </div>
            <input type="submit" name = "signUp" value="Sign Up">

        </form>
    </div>
</body>
</html>