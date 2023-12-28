
<?php

function job_update($row,$job_title,$company_name,$job_catagory,$location,$sort_description){

    $elemnt =
    "<div class=\"dumy\">
        <div class=\"row\">
            <div class=\"title\">
                <h2>$job_title</h2>
            </div>
            <div class=\"btn\">
                <div class=\"update\">
                    <a href=\"jobpost_update.php?id={$row}\"><button>update</button></a>
                </div>
                <div class=\"delete\">
                    <a href=\"delete_post.php?id={$row}\"><button>delete</button></a>
                </div>
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