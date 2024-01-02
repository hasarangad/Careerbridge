<?php
    include ('dbh.inc.php');
    session_start();

    $id = $_GET['id'];

    $query ="DELETE FROM job WHERE com_id =$id";

    $res = mysqli_query($conn,$query);

    $sql = "DELETE FROM company WHERE com_id=$id ";

    $result = mysqli_query($conn,$sql);

    if($result){
        header("Location: view_companies_E.php");
    } else{
        echo "Error: " .mysqli_error($conn);
    }

    mysqli_close($conn);


?>