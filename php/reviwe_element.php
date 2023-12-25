<?php

    function review_elem($name,$email,$comment){
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
