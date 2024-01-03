<?php
    include ('dbh.inc.php');
    session_start();

    $id = $_GET['id'];

    $sql = "DELETE FROM Job WHERE job_id = {$id} ";

    $result = mysqli_query($conn,$sql);

    if($result){
        header("Location: my_company_and_post.php");
    } else{
        echo "Error: " .mysqli_error($conn);
    }


?>