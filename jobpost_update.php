<?php 
	include ('dbh.inc.php');
	session_start();

	if(!isset($_SESSION['uName'])){
		header('Location: login.php');
	}

    $id = $_GET['id'];

    $sql ="SELECT * FROM job WHERE job_id = {$id}";

    $result_set = mysqli_query($conn,$sql);

    $value1 ='';
    $value2 = '';
    $value3 = '';
    $value4 ='';
    $value5 = '';
    $value6 = '';
    $value7 = '';
    $value8 = '';
  
    if(mysqli_num_rows($result_set)>0){
        if($row =mysqli_fetch_assoc($result_set)){
            $value1 = $row['job_title'];
            $value2 = $row['job_type'];
            $value3 = $row['job_location'];
            $value4 = $row['job_category'];
            $value5 = $row['monthly_Salary'];
            $value6 = $row['qulification'];
            $value7 = $row['sort_description'];
            $value8 = $row['long_description'];
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/post_update.css">
    <link rel="stylesheet" href="styleNavF.css">
    <title>Job post</title>
</head>

<body>
    <?php
        include 'navBar.php';
    ?>

    <?php
        $id = $_GET['id'];
        $value = '';
            if (isset($_POST['submit'])) {
                // submitt button is clicked
                $title= $_POST['job_title'];
                $type =$_POST['job_type'];
                $location= $_POST['job_location'];
                $category =$_POST['job_category'];
                $salary =$_POST['monthly_Salary'];
                $quli = $_POST['mini_qulification'];
                $short =$_POST['sort_description'];
                $long =$_POST['long_description'];
        
            
                $query = "UPDATE job set  job_title = '$title' , job_location = '$location' , job_type = '$type' , job_category = '$category' , monthly_Salary = '$salary' ,qulification = '$quli',sort_description = '$short',long_description = '$long' WHERE job_id ='$id' ";
                $result = mysqli_query($conn,$query);
        
                $hide = 2;
                $value= '   <div class="popup">
                                <img src="img/tick.png" alt="tick">
                                <h2>Update Successfully!</h2>
                                <p>Your details has been successfully updated. Thanks!</p>
                                <a href="find_job_E.php"><button>Back</button></a>
                            </div>';
            }
        ?>
    <?php if(!isset($hide)) { ?>
<div class="rapper">
    <div class="container">
		<h1>Update Job Post</h1>
	
        <div class="title">Add job post</div>
        <form method="POST" action="jobpost_update.php?id=<?php echo $id;?>">
            <div class="userdetails">


                <div class="inputbox">
                    <span class="details"> Job Title</span>
                    <input type="text" placeholder="Enter the job title" id="job_title" name="job_title" value="<?php echo $value1;?>" required>               
                 </div>


                <div class="inputbox">
                    <span class="details">Job Type</span>
                    <input type="text" placeholder="Enter the full time or part time" id="job_type" name="job_type" value="<?php echo $value2;?>" required>                
                </div>

                <div class="inputbox">
                    <span class="details">Location</span>
                    <input type="text" placeholder="Enter the address" id="job_location" name="job_location" value="<?php echo $value3;?>" required>                
                </div>


                
                <div class="inputbox">
                    <span class="details">Job category</span>
                    <input type="text" placeholder="Enter the Job category" id="job_category" name="job_category" value="<?php echo $value4;?>"required>                
                </div>
                
                <div class="inputbox">
                    <span class="details">Monthly Salary</span>
                    <input type="text" placeholder="Enter the Monthly Salary" id="monthly_Salary" name="monthly_Salary" value="<?php echo $value5;?>"required>                
                </div>


                <div class="inputbox">
                    <span class="details">Minimum qulification</span>
                    <input type="text" placeholder="Enter the Minimum qulification" id="mini_qulification" name="mini_qulification" value="<?php echo $value6;?>" required>                
                </div>

                <div class="inputbox">
                    <span class="details">Job description</span>
                    <textarea row="10" col="20" placeholder="Enter the Job description" id="job_description" name="sort_description" required> <?php echo $value7;?></textarea>
                </div>


                <div class="inputbox">
                    <span class="details">Job more description</span>
                    <textarea row="10" col="20" placeholder="Enter the more Job description" id="long_description" name="long_description" required><?php echo $value8;?></textarea>
                </div>

            </div>
            <div class="button">
                    <input type="submit" value="Update" name="submit">
            </div>

        </form>   
    </div>
</div>
    <?php } ?>
    <?php
        echo $value;
    ?>


<?php
    include 'footer.php';
?>
</body>
</html>
