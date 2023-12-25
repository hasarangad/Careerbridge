<?php

function job_element($id,$job_title,$company_name,$job_catagory,$location,$sort_description){

    $elemnt =
    "<div class=\"dumy\">
        <div class=\"row\">
            <div class=\"title\">
                <h2>$job_title</h2>
            </div>
            <div class=\"btn\">
                <a href=\"full_job_post.php?id={$id}\">
                    <button>details</button>
                </a>
            </div>
        </div>
        <div class=\"block\">
            <div class=\"block1\">
                <strong>Company Name :</strong>
                <p>$company_name</p>
            </div>
            <div class=\"block2\">
                <strong>Job Catogary :</strong>
                <p>$job_catagory</p>
            </div>
            <div class=\"block3\">
                <strong>Location :</strong>
                <p>$location</p>
            </div>
        </div>
        <div class=\"description\">
            <strong>Description :</strong>
            <p>$sort_description</p>
        </div>
    </div>"
;
echo $elemnt;}

?>


