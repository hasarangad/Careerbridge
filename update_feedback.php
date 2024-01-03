<?php
include ('dbh.inc.php');
session_start();

if(!isset($_SESSION['uName'])){
    header('Location: login.php'); 
    
}?>

<?php

$id =$_GET['comment_id'];


$sql ="SELECT * FROM reviews WHERE comment_id = {$id}";

$result_set = mysqli_query($conn,$sql);

$value1 ='';
$value2 = '';
$value3 = '';
$value4 = '';


if(mysqli_num_rows($result_set)>0){
    if($row =mysqli_fetch_assoc($result_set)){
        $value1 = $row['user_name'];
        $value2 = $row['email'];
        $value3 = $row['comment'];
        $value4 = $row['company_name'];
    }
}
 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=fo, initial-scale=1.0">
    <title>Feedback_form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/feedback.css">
    <link rel="stylesheet" href="styleNavF.css">
</head>
<body>
    <!--Navigation bar-->
    <?php
        include ('navBar.php');
    ?>
<?php

$id = $_GET['comment_id'];
$value = '';
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];


        $query = "UPDATE reviews set user_name = '$name' ,email = '$email' , comment ='$comment'  WHERE comment_id ='$id' ";
        $result = mysqli_query($conn,$query);

        $hide = 2;
        $value= '   <div class="popup">
                        <img src="img/tick.png" alt="tick">
                        <h2>Update Successfully!</h2>
                        <p>Your details has been successfully updated. Thanks!</p>
                        <a href="view_feedback.php"><button>Back to notification page</button></a>
                    </div>';

}
?>

        
<?php if(!isset($hide)) { ?>
<div class="rapper">

    <div class="container">

        <div class="title">
            <h1>Update Feedback Form</h1>
        </div>


        <form id ="feedback" method="post" action="update_feedback.php?comment_id=<?php echo $id;?>">

            <div class="input_data">
                <div class="user_data">
                    <span>Name or Username :</span>
                    <input type="text" name ="name" value="<?php echo $value1;?>"  required >
                </div>
                <div class="user_data">
                    <span>Valid User Email :</span>
                    <input type="email" name ="email" value="<?php echo $value2;?>" required>
                </div>
                <div class="user_data">
                    <span>Company Name :</span>
                    <input type="text" name ="company_name" value="<?php echo $value4;?>"  readonly >
                </div>
            </div>

            <div class="feedback">
                <span>Feedback :</span>
                <textarea name="comment" id="" cols="50" rows="5" required><?php echo $value3;?>"</textarea>
            </div>
            <div class="btn">
                <button type="submit" name="submit">Update</button>
            </div>  

        </form>
        <div class="back">
                <a href="view_feedback.php">
                    <button>Back to notification page</button>
                </a>
         </div> 

    </div>

</div>


<?php } ?>
	<?php
    	echo $value ;
	?>

<!-- Footer --> 
<?php
    include('footer.php');

?>

</body>
</html>


