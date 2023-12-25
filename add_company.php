<?php 
	session_start();

    include 'dbh.inc.php';

    if(!isset($_SESSION['uName'])){
        header('Location: login.php');
    }


	$errors = array();
	$value ='';

	if (isset($_POST['submit'])) {
		// submitt button is clicked
		$id = $_SESSION['uName'];
		$company= $_POST['company'];
		$location =$_POST['location'];
		$employee= $_POST['employee'];
		$email =$_POST['com_email'];
		$industry =$_POST['industry'];
		$description = $_POST['description'];
		$file_name = $_FILES['image']['name'];
		$file_type = $_FILES['image']['type'];
		$file_size = $_FILES['image']['size'];
		$temp_name = $_FILES['image']['tmp_name'];


		$upload_to = 'images/';

		// checking comapny_name is same
		$query = "SELECT * FROM company WHERE company_name ='{$company}'";

		$re =mysqli_query($conn,$query);

		if(mysqli_num_rows($re)>0){
			$errors[] = 'Company name is already taken';
		}

		$query = "SELECT * FROM company WHERE email ='{$email}'";

		$re =mysqli_query($conn,$query);

		if(mysqli_num_rows($re)>0){
			$errors[] = 'email is already taken';
		}

		//checking the file type
		if ($file_type != 'image/png') {
			if($file_type != 'image/jpeg'){
				$errors[] = 'Only JPEG or PNG files are allowed.';
			}
		}

		// checking file size
		if ($file_size > 400000) {
			$errors[] = 'File size should be less than 500kb.';
		}
		
		//insert new company
		if (empty($errors)) {

			$file_uploaded = move_uploaded_file($temp_name, $upload_to . $file_name);

			$sql = "INSERT INTO company(company_name,company_logo,location,employe,description,email,industry,userName) VALUES ('$company','$file_name','$location','$employee','$description','$email','$industry','$id')";
			$result = mysqli_query($conn,$sql);
			$hide = 2;
			$value= '   <div class="popup">
							<img src="Images/tick.png" alt="tick">
							<h2>Thank You!</h2>
							<p>Your company has been successfully added. Thanks!</p>
							<a href="view_companies_E.php"><button>Back to campany page</button></a>
						</div>';
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Company</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="CSS/add company.css">
</head>
<body>

        <?php include 'navBar.php';?>
        <!-- Navigation -->

<?php if(!isset($hide)) { ?>

<div class="rapper">

	<div class="container">
				
		<div class="title">
            <h1>Add New Company</h1>
        </div>		
            
        <?php 
		    if (!empty($errors)) {
			    echo '<div class="errors">';
				echo '<p>Check following errors:</p>';
				foreach ($errors as $error) {
				    echo '- ' . $error .'<br>';
			    }
			    echo '</div>';
		    }
	    ?>

            <form action="add_company.php" method="post" enctype="multipart/form-data">
                <div class="input_data">
                    <div class="user_data">
                        <span>Compnay Name :</span>
                        <input type="text" name="company" placeholder="Company name" required>
                    </div>

                    <div class="user_data">
                        <span>Company Email :</span>
                        <input type="email" name="com_email" placeholder="Entre your company email" required>
                    </div>

                    <div class="img">
                        <span>Company Logo :</span>
                        <input type="file" name="image" id="" required>
                    </div>

                    <div class="user_data">
                        <span>Company Industry :</span>
                        <input type="text" name="industry" placeholder="Enter your company industry" required>
                    </div>

                    <div class="user_data">
                        <span>Company Loaction :</span>
                        <input type="text" name="location" placeholder="Entre your company location" required><br>
                    </div>

                    <div class="user_data">
                        <span>No of Employees :</span>
                        <input type="number" name="employee" id="" placeholder="No of employees" required><br>
                    </div>
                </div>


                <div class="description">
                    <span>Description :</span>
                    <textarea name="description" cols="30" rows="10" placeholder="Enter Company Description" required></textarea><br>
                </div>

                <div class="btn1">
                    <button type="submit" name="submit">Add Company</button>
                </div>

            </form>

            <div class="btn2">
                <a href="find_job_E.php">
                    <button name="cancel">cancel</button>
                </a>
            </div>

    </div>
</div>
<?php include 'footer.php';?>
    <?php } ?>
	    <?php
    	    echo $value ;
	    ?>
    
</body>
</html>


