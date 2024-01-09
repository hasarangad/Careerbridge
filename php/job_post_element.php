<?php

function elements($id,$row,$company_name,$job_title,$job_location,$job_category,$monthly_Salary,$sort_description,$firstname,$lastname){
   
   
    $elemnt = 

    "
<div class=\"container\">

    
    <div class=\"row1\">
        <h3>$job_title</h3>
    </div>

        
    <div class=\"row2\">
        <div class=\"block2\">
            <strong>Job category</strong>
            <p>$job_category</p>
        </div>
        <div class=\"block1\">
            <strong>Location</strong>
            <p>$job_location</p>
        </div>
    </div>

    <div class = \"row3\">

        <div class=\"block3\">
            <strong>MonthlySalary</strong>
            <p>$monthly_Salary</p>
        </div>

        <div class=\"block4\">
            <strong>Company name</strong>
            <p>$company_name</p>
        </div>
    </div>
    
    <div class=\"row4\">
        <strong>Job description :</strong>
        <p>$sort_description</p>
    </div>

    <div class=\"posted\">
        posted by <a href=\"profileE_E.php?userName={$id}\">@$firstname $lastname</a>
    </div>

    <div class=\"btn\">
        <a href=\"full_job_postE.php?id={$row}\"><button>Full Details</button></a>
    </div>
     

</div>"
    
;
echo $elemnt;}

?>

