<?php 
	session_start();

    include 'dbh.inc.php';
    
    $uName;
    $id;
    
    if(!isset($_SESSION["uName"])){
        header('Location: login.php');  
    }
    else{
        $id = $_SESSION['uName'];
    }

    

    $value ='';
    $query = "SELECT com_id, company_name FROM company";
    $result_set = mysqli_query($conn,$query);
    $list = '';
    while($row = mysqli_fetch_assoc($result_set)){
    $list .= "<option value=\"{$row['com_id']}\">{$row['company_name']}</option>";
            }

	if (isset($_POST['submit'])) {
		// submitt button is clicked

        $company_name =$_POST['id'];
        $job_title = $_POST['job_title'];
        $job_type = $_POST['job_type'];
        $job_location = $_POST['job_location'];
        $job_category = $_POST['job_category'];
        $salary =$_POST['monthly_Salary'];
        $sort_description =$_POST['sort_description'];
        $long_description =$_POST['long_description'];
        //$gender = $_POST['gender'];
		$qulification = $_POST['mini_qulification'];

        $sql1 ="SELECT * FROM company WHERE com_id ={$company_name}";
        $res = mysqli_query($conn,$sql1);
        $value ='';
            while($rows =mysqli_fetch_assoc($res)){
                  $value = $rows['company_name'];
            }   
        
        $sql = "INSERT INTO job(com_id,job_title,job_type,job_location,job_category,monthly_Salary,qulification,sort_description,long_description,company_name,userName) VALUES ('$company_name','$job_title','$job_type','$job_location','$job_category','$salary','$qulification','$sort_description','$long_description','$value','$id')";

        $result = mysqli_query($conn,$sql);
        $hide = 2;
        $value= '   <div class="popup">
                        <img src="Images/tick.png" alt="tick">
                        <h2>Thank You!</h2>
                        <p>Your job post have been successfully added. Thanks!</p>
                        <a href="jobPageE.php"><button>Back to find job page</button></a>
                    </div>';
		
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/form.css">
    <link rel="stylesheet" href="CSS/post_update.css">
    
    <title>Job post</title>
</head>
<body>

<!-- <nav>

<img src="Images/Logo.png" alt="logo">
<h1>CareerBridge</h1>
<ul>
    <li><a href="homeE.php">Home</a></li>
    <li><a href="jobPageE.php">Find a Job</a></li>
    <li><a href="#">Company</a></li>
    <li><a href="notificationE.php">Notification</a></li>
    <li><a href="settingE.php">Settings</a></li>
<ul>
    
</nav>  -->
<?php include 'navBar.php';?>
<?php if(!isset($hide)) { ?>
    <div class="rapper">

    
    <div class="container">
        <div class="title">Add job post</div>
        <form method="POST" action="add_jobpost.php">
            <div class="userdetails">

                <div class="inputbox">
                    <span>Enter Your Company Name : </span>
                    <select name="id" id="">
                        <?php
                            echo $list;
                        ?>
                    </select>
                </div>

                <div class="inputbox">
                    <span class="details"> Job Title</span>
                    <input type="text" placeholder="Enter the job title" id="job_title" name="job_title" required>               
                 </div>


                <div class="inputbox">
                    <span class="details">Job Type</span>
                    <input type="text" placeholder="Enter the full time or part time" id="job_type" name="job_type" required>                
                </div>

                <div class="inputbox">
                    <span class="details">Location</span>
                    <input type="text" placeholder="Enter the address" id="job_location" name="job_location" required>                
                </div>


                
                <div class="inputbox">
                    <span class="details">Job category</span>
                    <input type="text" placeholder="Enter the Job category" id="job_category" name="job_category" required>                
                </div>
                
                <div class="inputbox">
                    <span class="details">Monthly Salary</span>
                    <input type="text" placeholder="Enter the Monthly Salary" id="monthly_Salary" name="monthly_Salary" required>                
                </div>


                <div class="inputbox">
                    <span class="details">Minimum qulification</span>
                    <input type="text" placeholder="Enter the Minimum qulification" id="mini_qulification" name="mini_qulification" required>                
                </div>
            </div>

            <div class="description">
                <span class="details">Job description</span>
                <textarea row="10" col="20" placeholder="Enter the Job description" id="job_description" name="sort_description" required></textarea>
            </div>


            <div class="description">
                <span class="details">Job more description</span>
                <textarea row="10" col="20" placeholder="Enter the more Job description" id="job_description" name="long_description" required></textarea>
            </div>

            <div class="button">
                    <input type="submit" value="Post Job" name="submit">
            </div>

        </form>
        
        <div class="btn2">
                <a href="jobPageE.php">
                    <button name="cancel">cancel</button>
                </a>
        </div>
        
    </div>
    </div>
<?php } ?>

	<?php
	    echo $value ;
	?>
<?php include 'footer.php';?>
</body>
</html>


