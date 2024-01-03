<?php
    include'dbh.inc.php';
    include 'php/update_elem.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=fo, initial-scale=1.0">
    <title>update_feedback</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/update_feedback.css">
</head>

<body>
    <!--Navigation bar-->
    <?php
        include ('navBarS.php');
    ?>

<div class="container">
    <div class="title">
        <h3>You have the option to edit your feedback</h3>
    </div>
    <div class="rapper">

        <?php
            
    
            $id = $_SESSION['uName'];

            $sql ="SELECT * FROM reviews WHERE userName= '$id'";

            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)>0){
                while($rows =mysqli_fetch_assoc($result)){
                    up_elem($rows['company_name'],$rows['comment_id'],$rows['user_name'],$rows['email'],$rows['comment'],$rows['com_id']);     
                }   
            }   
        ?>

    </div>


<!-- Footer --> 
<?php
    include('footer.php');

?>

</div>

</body>
</html>
