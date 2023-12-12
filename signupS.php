<?php
    session_start();

    include "dbh.inc.php";

    $loginType = $_SESSION['userType'];
    $uName = $_SESSION['uName'];
    
    if(isset($_POST['finish'])){
        
        $qlfy = $_POST['userInput'];

        $checkActive = "SELECT * FROM user WHERE userName = '$uName' AND isActive = 'true'";

        $rslt = mysqli_query($conn, $checkActive);

        $rows = mysqli_num_rows($rslt);

        if($rows > 0){
            $sql = "INSERT INTO jobseeker(userName, qualification) VALUES (?,?)";

            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){
                $errorM = "SQL Statement Failed!";
            }
            else{
                mysqli_stmt_bind_param($stmt, "ss", $uName, $qlfy);
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
        else{
            $error1 = "Check your email!";
        }

    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/signUpSStyle.css">
    <title>CareerBridge | Sign Up</title>
</head>

<body>
    <?php
        if(isset($error1)){
            echo "<script>alert('$error1')</script>";
        }
    ?>
    <div class="box">
        <form action="" method="post">
            <h2>Sign Up</h2>
            <div class="inputField">
                <label for="userInput">Qualification :</label>
                <textarea id="userInput" name="userInput" rows="11" cols="33"></textarea>
            </div>
            
            <input type="submit" name="finish" value="Sign Up">
        </form>
    </div>
</body>
</html>