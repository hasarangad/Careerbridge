<?php

function post_elements($id,$company_logo,$company_name,$location,$employee,$industry,$description){

$elemnt =

"   
<div class=\"container\">

    <div class=\"logo\">
        <img src=\"companyLogo/$company_logo\" alt=\"logo\">
    </div>

    <div class =\"block\">
        <div class = \"row1\">
            <div class= \"title\">
                <h3>$company_name</h3>
            </div>

            <div class = \"btn\">
                <div class=\"update\">
                    <a href=\"company_update.php?id={$id}\">
                        <button name=\"update\">UPDATE</button>
                    </a>
                </div>
    
                <div class=\"delete\">
                    <a href=\"delete_company.php?id={$id}\"> 
                        <button>DELETE</button>
                    </a>
                </div>
        </div>

        </div>

        <div class = \"row2\">

            <div class=\"description\">
                <strong>Description :</strong>
                <p>$description</p>
            </div>

        </div>

        <div class = \"row3\">

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

    </div>
</div>
";
echo $elemnt;}

?>

