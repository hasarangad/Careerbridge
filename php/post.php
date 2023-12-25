<?php

function elements($company_name,$job_title,$job_location,$job_category,$monthly_Salary,$sort_description){
    $elemnt =

    "
<div class=\"container\">

    
    <div class=\"row1\">
        <h3>$job_title</h3>
    </div>

        
    <div class=\"row2\">
        <div class=\"block1\">
            <strong>Location</strong>
            <p>$job_location</p>
        </div>


        <div class=\"block2\">
            <strong>Job category</strong>
            <p>$job_category</p>
        </div>

        <div class=\"block3\">
            <strong>MonthlySalary</strong>
            <p>$monthly_Salary</p>
        </div>

        <div class=\"block4\">
            <strong>Company name</strong>
            <p>$company_name</p>
        </div>
    </div>
    
    <div class=\"row3\">
        <h5>Job description :</h5>
        <p>$sort_description</p>
        <a><b>Read more......<b></a>
    </div>
     

</div>"
    
;
echo $elemnt;}

?>