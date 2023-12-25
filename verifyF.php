<?php
    session_start();

    include 'dbh.inc.php';
    
    if(isset($_GET['code'])){
        $fCode = mysqli_real_escape_string($conn, $_GET['code']);

        $sql = "SELECT * FROM user WHERE fCode = '$fCode'";

        $rslt = mysqli_query($conn, $sql);

        $rows = mysqli_num_rows($rslt);

        $row = mysqli_fetch_assoc($rslt);
        if($rows == 1){
            $uSql = "UPDATE user SET fCode = NULL WHERE fCode = '$fCode' LIMIT 1";

            $rslt = mysqli_query($conn, $uSql);
            $uName = $row['userName'];

            if(mysqli_affected_rows($conn) == 1){
                header("Location: changePassword.php?userName=$uName");
            }
        }
    }
?>