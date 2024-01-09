<?php

function elements($jobID, $company_name,$job_title,$job_location,$job_category,$monthly_Salary,$sort_description,$long_description,$job_type,$qulification){
    $elemnt =

    "
<div class=\"container\">

    <div class=\title\"><h2>Job Details</h2></div>
    <div>
            <h3>$job_title</h3>
        
            <div class=\"row2\">
                <strong>Location :-</strong>
                <p>$job_location</p>
                <br>
            
                <strong>Job category :-</strong>
                <p>$job_category</p>
                <br>

                <strong>Minimum qulification :-</strong>
                <p>$qulification</p>
                <br>


                <strong>Job Type :-</strong>
                <p>$job_type</p>
                <br>
        
                
                <strong>MonthlySalary :-</strong>
                <p>$monthly_Salary</p>
                <br>
        
                <strong>Company name :-</strong>
                <p>$company_name</p>

                <br>
                
                <strong>Job description :-</strong>
                <p>$sort_description</p>

                <br>

                <strong>More details about job :-</strong>
                <p>$long_description</p>

            </div>
       
    </div>
<br>
    <div class=\"button\">
    <a href=\"jobApplication.php?id=$jobID\"><input type=\"submit\" value=\"Apply now\"></a>
    </div>
    
    <div class=\"button\">
        <a href=\"jobPageS.php\"><input type=\"reset\" value=\"Back To Job Page\"></a>
    </div>


</div>"
    
;
echo $elemnt;}

?>

