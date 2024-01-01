<?php
    session_start();

    include 'dbh.inc.php';

    $uName;
    $applicationId;

    
    if(!isset($_SESSION['uName'])){
       header('Location: login.php');
    }
    else{
        $uName = $_SESSION['uName'];
    }

    //check application id is set or not
    if(isset($_GET['id'])){
        $applicationId = mysqli_real_escape_string($conn, $_GET['id']);
    }
    else{
        header("Location: createInterview.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Enter your contact email : </label>
        <input type="text" name="email" id="">
        <br>

        <label for="">Date : </label>
        <input type="date" name="date" id="">
        <br>

        <label for="">Time : </label>
        <input type="time" name="time" id="">
        <br>

        <input type="submit" value="Submit" name="submit">
        
    </form>
</body>
</html>