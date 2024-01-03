<?php
include ('dbh.inc.php');
session_start();

if(!isset($_SESSION['uName'])){
    header('Location: login.php'); 
}
$value = '';
$errors = array();
$user_id = $_SESSION['uName'];

        $query = "SELECT com_id, company_name FROM company";
        $result_set = mysqli_query($conn,$query);
        $list = '';
        while($row = mysqli_fetch_assoc($result_set)){
        $list .= "<option value=\"{$row['com_id']}\">{$row['company_name']}</option>";
                }
       
        if(isset($_POST['submit'])){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $comment = $_POST['comment'];
 
            $sql1 ="SELECT * FROM company WHERE com_id ={$id}";
            $res = mysqli_query($conn,$sql1);
            $value1 ='';
                while($rows =mysqli_fetch_assoc($res)){
                      $value1= $rows['company_name'];
                }
        

            

                $sql ="INSERT INTO reviews(com_id,user_name,comment,email,userName,company_name) VALUES ('$id','$name','$comment','$email','$user_id','$value1')";
                $result = mysqli_query($conn,$sql);
                $hide =2; 
                $value= '   <div class="popup">
                                <img src="Images/tick.png" alt="tick">
                                <h2>Thank You!</h2>
                                <p>Your feedback has been successfully submitted. Thanks!</p>
                                <a href="view_feedback.php"><button>Back to notification page</button></a>
                            </div>';
                
        }        
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=fo, initial-scale=1.0">
    <title>Feedback_form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/feedback.css">
</head>
<body>
    <!--Navigation bar-->
    <?php
        include ('navBar.php');
    ?>

<?php if(!isset($hide)) { ?>
<div class="rapper">
    <div class="container">

        <div class="title">
            <h1>Feedback Form</h1>
            <p>Give the samll feedback for company or give a any comments website working</p>
        </div>

        <form id ="feedback" method="post" action="feedback.php">
            <div class="input_data">
                <div class="user_data">
                    <span>Name or Username :</span>
                    <input type="text" name ="name" placeholder="Enter Your Name : " required >
                </div>
                <div class="user_data">
                    <span>Valid User Email :</span>
                    <input type="email" name ="email" placeholder="Enter Your Email : " required>
                </div>
                <div class="user_data">
                    <span>Company Name :</span>
                    <select name="id" id="" required>
                        <?php
                            echo $list;   
                        ?>
                    </select>
                </div>
            </div>

            <div class="feedback">
                <span>Feedback :</span>
                <textarea name="comment" id="" cols="50" rows="5" placeholder="Entre Your Feedback : " required></textarea>
            </div>
            <div class="btn">
                <button type="submit" name="submit">Submit</button>
            </div>              
        </form>
        <div class="back">
                <a href="view_companies_S.php">
                    <button>Back to company page</button>
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




