<?php
    session_start();

    include 'dbh.inc.php';

    $uName = $_SESSION['uName'];

    $sql = "SELECT * FROM user WHERE userName = ?";

    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt, $sql)){
        mysqli_stmt_bind_param($stmt,"s", $uName);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        $type = $row['loginType'];

        if($type == "Employee"){
            header("Location: homeE.php");
        }
        else{
            header("Location: homeS.php");
        }
    }
    
?>