<?php

function Com_elements($company_logo,$company_name,$location,$employee,$industry,$description){
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
        <strong>Description :</strong>
        <p>$description</p>
    </div>
    
    <div class=\"location\">
        <strong>Location :</strong>
        <p>$location</p>
    </div>

    <div class=\"size\">
        <strong>Global Company Size :</strong>
        <p>$employee+ Employees</p>
    </div>
        
    <div class=\"industry\">
        <strong>Industry :</strong>
        <p>$industry</p>
    </div>

</div>

";
echo $elemnt;}

?>