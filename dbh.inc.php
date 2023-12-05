<?php
    $dbServer = "localhost";
    $dbUser = "root";
    $dbPW = "";
    $database = "careerbridge";

    $conn = mysqli_connect($dbServer, $dbUser, $dbPW, $database);
    
    if(!$conn){
        echo "Database not connected !";
    }
?>