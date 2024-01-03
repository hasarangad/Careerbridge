<?php

function elements($rows,$company_logo,$company_name,$location,$employee,$industry,$description){

    $elemnt =

    "
    <div class=\"container\">
    <div class=\"row1\">
        <div class=\"culom1\">
            <div class=\"logo\">
                <img src=\"companyLogo/$company_logo\" alt=\"logo\" class=\"cImage\">
            </div>
        </div>
        <div class=\"culom2\">
        <a href=\"company_details_E.php?id={$rows}\">
        <button role=\"link\">Details</button>
        </a>
            
        </div>
    </div>
    <div class=\"row2\">
        <div class=\"block1\">
            <strong>Company Name :</strong>
            <p>$company_name</p>
        </div>
        <div class=\"block2\">
            <strong>Location :</strong>
            <p>$location</p>
        </div>
    </div>

    <div class =\"row3\">
        <div class=\"block3\">
            <strong>Industry :</strong>
            <p>$industry</p>
        </div>
        <div class=\"block4\">
        <strong>Global Company Size :</strong>
        <p>$employee+ Employees</p>
    </div>
    </div>

    <div class=\"row4\">
        <h5>Description :</h5>
        <p>$description</p>
    </div>

</div>"
    
;
echo $elemnt;}

?>
