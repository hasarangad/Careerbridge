<?php

function post_elements($id,$company_logo,$company_name,$location,$employee,$industry,$description){
    $elemnt =
    "
<div class=\"container\">

    <div class=\"block1\"></div>

    <div class=\"block2\"></div>

    <div class=\"logo\">
        <img src=\"images/$company_logo\" alt=\"logo\">
    </div>

    <h1>$company_name</h1>
    <div class=\"description\">
        <h1>Description :</h1>
        <p>$description</p>
    </div>

    <div class=\"update\">
        <a href=\"company_update.php?id={$id}\"><button name=\"update\">UPDATE</button></a>
    </div>

    <div class=\"delete\">
        <a href=\"delete_company.php?id={$id}\"> 
            <button>DELETE</button>
        </a>
    </div>

    
    <div class=\"location\">
        <h1>Location :</h1>
        <p>$location</p>
    </div>

    <div class=\"size\">
        <h1>Global Company Size :</h1>
        <p>$employee+ Employees</p>
    </div>
        
    <div class=\"industry\">
        <h1>Industry :</h1>
        <p>$industry</p>
    </div>

</div>

";
echo $elemnt;}

?>

