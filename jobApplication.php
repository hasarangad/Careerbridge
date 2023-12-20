<?php
session_start();
    
include 'dbh.inc.php';

if (isset($_POST['applicationSubmit'])) {
    // Form has been submitted, process the data

    $job_id = $_POST['job-id'];
    $contact_number = $_POST['contact-number'];
    $full_name = $_POST['full-name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $status = 'pending';

    // Handle file upload
    $upload_dir = 'uploads/';
    $file_name = $_FILES['upload']['name'];
    $file_path = $upload_dir . $file_name;

    if (move_uploaded_file($_FILES['upload']['tmp_name'], $file_path)) {

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert data into the database
        $sql = "INSERT INTO job_applications (job_id, contact_number, full_name, email, dob, resume_path, status) VALUES ('$job_id', '$contact_number', '$full_name', '$email', '$dob', '$file_path', '$status')";

        if ($conn->query($sql) === TRUE) {
            echo "Application submitted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "File upload failed.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application</title>
    <link rel="stylesheet" type="text/css" href="./CSS/styleJobApplication.css">
</head>
<body>
<div class="header">
        <div class="logo">
            <img src="./Images/Logo.png" alt="Logo">
            <a href="">CareerBridge</a>
        </div>

        <div class="navbar">
            <a href="settingE.php">Settings</a>
            <a href="#">Notification</a>
            <a href="#">Company</a>
            <a href="jobPage.php">Find a Job</a>
            <a href="homeE.php">Home</a>
        </div>    
    </div>

    <div class="container">
        <div class="apply-box">
            <h1>Apply Now</h1>

            <form action="" method="POST">
                <div class="form-container">
                    <div class="form-control">
                        <label for="job-id">Job ID :</label>
                        <input type="text" id="job-id" name="job-id" placeholder="Enter your Job ID">
                    </div>
                    <div class="form-control">
                        <label for="contact-number">Contact Number :</label>
                        <input type="text" id="contact-number" name="contact-number" placeholder="Enter your Phone Number">
                    </div>
                    <div class="form-control">
                        <label for="full-name">Full Name :</label>
                        <input type="text" id="full-name" name="full-name" placeholder="Enter your Full Name">
                    </div>
                    <div class="form-control">
                        <label for="email">Email Address :</label>
                        <input type="email" id="email" name="email" placeholder="Enter your Email Address">
                    </div>

                    <div class="form-control">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" id="dob" name="dob" required placeholder="Enter your Date of Birth">
                    </div>
                    <div class="form-control">
                        <label for="upload">Resume/CV :</label>
                        <input type="file" id="upload" name="upload">
                    </div>
                </div>
                <div class="button-container">
                    <button type="submit" name="applicationSubmit">Submit</button>
                </div>
            </form>
            
        </div>
    </div>

    <footer class="ftr">
        <p>
            &copy; 2023 CareerBridge. All rights reserved.
        </p>
    </footer>
</body>
</html>