<?php

session_start();

include 'dbh.inc.php';

$uName = $_SESSION['uName'];

$sql = "SELECT * FROM job_applications WHERE userName = ?";

$stmt = mysqli_stmt_init($conn);
if(mysqli_stmt_prepare($stmt, $sql)){
    mysqli_stmt_bind_param($stmt,"s", $uName);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Applications</title>
</head>
<body>
    <div class="container">
        <h3>Application for j<?php?></h3>
    </div>
</body>
</html>