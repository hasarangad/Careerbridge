
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/my_post.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>My Company and Job Post</title>
</head>
<body>

    <!--Navigation bar-->
    <?php
        include ('navBar.php');
    ?>


<div class="rapper">
    <div class="main">
        <?php

            include ('php/connection.php');
            include ('php/post_elem.php');
            session_start();

            if(!isset($_SESSION['user_id'])){
                header('Location: loging.php'); 
            }

            $id = $_SESSION['user_id'];

            $sql ="SELECT * FROM company WHERE id = {$id}";

            $result = mysqli_query($connection,$sql);


            if(mysqli_num_rows($result)>0){
                while($row =mysqli_fetch_assoc($result)){
                    post_elements($row['com_id'],$row['company_logo'],$row['company_name'],$row['location'],$row['employe'],$row['industry'],$row['description']);

                }
            }
        ?>
    </div>

    <div class="line1"></div>
    <div class="topic1">
            <h3>Your posted job list</h3>
    </div>
    <div class="posts">
        <?php
            
            include('php/job_elem_update_and_delete.php');
            
            $id = $_SESSION['user_id'];

                $sql ="SELECT * FROM job WHERE id = {$id}";
            
                $result = mysqli_query($connection,$sql);
            
            
                if(mysqli_num_rows($result)>0){
                    while($rows =mysqli_fetch_assoc($result)){
                        job_update($rows['job_id'],$rows['job_title'],$rows['company_name'],$rows['job_category'],$rows['job_location'],$rows['sort_description']);
                        
                    }
                }
        
        ?>
    </div>

    <div class="line2"></div>

</div> 

<!-- Footer -->

<?php
    include('footer.php');

?>



</body>
</html>

<?php
    mysqli_close($connection);
?>

