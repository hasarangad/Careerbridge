<?php
    include ('dbh.inc.php');
    session_start();

    $id = $_GET['comment_id'];

    $sql = "DELETE FROM reviews WHERE comment_id =$id ";

    $result = mysqli_query($conn,$sql);

    if($result){
        header("Location: view_feedback.php");
    } else{
        echo "Error: " .mysqli_error($conn);
    }


?>