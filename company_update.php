<?php 
	include ('php/connection.php');
	session_start();

	if(!isset($_SESSION['user_id'])){
		header('Location: loging.php');
	}

    $id = $_GET['id'];

    $sql ="SELECT * FROM company WHERE com_id = {$id}";

    $result_set = mysqli_query($connection,$sql);

    $value = '';
    $value1 ='';
    $value2 = '';
    $value3 = '';
    $value4 ='';
    $value5 = '';
    $value6 = '';
    $value7 = '';

    if(mysqli_num_rows($result_set)>0){
        if($row =mysqli_fetch_assoc($result_set)){
            $value1 = $row['company_name'];
            $value2 = $row['email'];
            $value3 = $row['location'];
            $value4 = $row['industry'];
            $value5 = $row['description'];
            $value6 = $row['employe'];
            $value7 = $row['com_id'];
	}
}

    if (isset($_POST['submit'])) {
        // submitt button is clicked
        $company= $_POST['company'];
        $location =$_POST['location'];
        $employee= $_POST['employee'];
        $email =$_POST['com_email'];
        $industry =$_POST['industry'];
        $description = $_POST['description'];

    
        $sql = "UPDATE company set company_name = '$company' , location = '$location' , employe = '$employee' , email = '$email' , industry = '$industry' , description = '$description' WHERE com_id ='$id' ";
        $result = mysqli_query($connection,$sql);

        $hide = 2;
        $value= '   <div class="popup">
                        <img src="img/tick.png" alt="tick">
                        <h2>Update Successfully!</h2>
                        <p>Your details has been successfully updated. Thanks!</p>
                        <a href="view_companies_E.php"><button>Back to campany page</button></a>
                    </div>';
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Company</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="css/add company.css">
    <link rel="stylesheet" href="styleNavF.css">

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
            <h1>Update company Details</h1>
        </div>	
	
        <form action="company_update.php?id=<?php echo $value7;?>" method="post">

                <div class="input_data">
                    <div class="user_data">
                        <span>Compnay Name :</span>
                        <input type="text" name="company" value="<?php echo $value1;?>" required>
                    </div>

                    <div class="user_data">
                        <span>Company Email :</span>
                        <input type="email" name="com_email" value="<?php echo $value2;?>" required>
                    </div>

                    <div class="user_data">
                        <span>Company Industry :</span>
                        <input type="text" name="industry" value="<?php echo $value4;?>" required>
                    </div>

                    <div class="user_data">
                        <span>Company Loaction :</span>
                        <input type="text" name="location" value="<?php echo $value3;?>" required><br>
                    </div>

                    <div class="user_data">
                        <span>No of Employees :</span>
                        <input type="number" name="employee" id="" value="<?php echo $value6;?>" required><br>
                    </div>
                </div>


                <div class="description">
                    <span>Description :</span>
                    <textarea name="description" cols="30" rows="10" required><?php echo $value5;?></textarea><br>
                </div>

                <div class="btn1">
                    <button type="submit" name="submit">Update Company</button>
                </div>
        </form>

        <div class="btn2">
            <a href="my_company_and_post.php">
                <button name="cancel">cancel</button>
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

<?php
    mysqli_close($connection);
?>

