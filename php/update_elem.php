<?php

    function up_elem($comment_id,$name,$email,$comment){
        $element = 
                "<div class=\"block\">
                    <div class=\"block1\">
                        <div class=\"img\">
                            <img src=\"img/tick.png\" alt=\"logo\">
                        </div>
                        <div class=\"profile\">
                            <div class=\"name\">$name</div>
                            <div class=\"email\">$email</div>
                        </div>
                        <div class=\"update\">
                        <a href=\"update_feedback.php?comment_id={$comment_id}\"><button value=\"update\">UPDATE</button></a>
                    </div>
                    <div class=\"delete\">
                        <a href=\"delete_feedback.php?comment_id={$comment_id}\"><button value=\"delete\">DELETE</button></a>
                    </div>
                    </div>
                    <div class=\"block2\">
                        <div class=\"comment\">
                            $comment
                        </div>
                    </div>
                </div>"
                ;
                echo $element;}
?>
