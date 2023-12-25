<?php

    $dbSrver = 'localhost';
    $dbUser = 'root';
    $dbPass = '';
    $database ='my_fun';


    $connection =mysqli_connect($dbSrver,$dbUser,$dbPass,$database);

    if(!$connection){
        echo "data base is not connected";
    }


?>