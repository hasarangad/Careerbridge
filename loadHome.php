<?php
    session_start();

    include 'dbh.inc.php';

    $uName = $_SESSION['userName'];

    $sql = "SELECT * FROM user WHERE userName = '$uName' AND loginType = 'Employee'";

    $rslt = mysqli_query($conn, $sql);

    $rows = mysqli_num_rows($rslt);

    if($rows > 0){
        header("Location: homeG.php");
    }
    else{
        header("Location: homeG.php");
    }
?>