<?php 
session_start();

include 'dbh.inc.php';

$uName = $_SESSION['uName'];

$sql = "SELECT user.*, jobseeker.* FROM user INNER JOIN jobseeker ON user.userName = jobseeker.userName WHERE user.userName = ?";
               
$stmt = mysqli_stmt_init($conn);
if(mysqli_stmt_prepare($stmt, $sql)){
    mysqli_stmt_bind_param($stmt,"s", $uName);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $firstName = $row["fname"];
    $lastName = $row["lname"];
    $email = $row["email"];
    $fullName = $row["fname"] . " " . $row["lname"];
    $loginType = $row["loginType"];
    $uploads_dir = 'Images/pp';
    $pname = $row['pp'];
    $img = $uploads_dir.'/'.$pname;
}

//logout
if(isset($_POST["logout"])){
    // Destroy the session
    session_destroy();
    $message = "LogOut!";
    header("Location: login.php");
}

//Update firstName
if(isset($_POST['firstName'])){
    $update = mysqli_real_escape_string($conn, $_POST['fName']);

    $sql = "UPDATE user SET fName = '$update' WHERE userName = '$uName'";

    if(mysqli_query($conn, $sql)){
        $message = "First Name Updated!";
        header("Location: settingS.php");
    }
}

//Update Last Name
if(isset($_POST['lastName'])){
    $update = mysqli_real_escape_string($conn, $_POST['lName']);

    $sql = "UPDATE user SET lName = '$update' WHERE userName = '$uName'";

    if(mysqli_query($conn, $sql)){
        $message = "Last Name Updated!";
        header("Location: settingS.php");
    }
}

//Update user Name
if(isset($_POST['userName'])){
    $update = mysqli_real_escape_string($conn, $_POST['uName']);

    $sql = "UPDATE user SET userName = '$update' WHERE ((fName = '$firstName' AND lName = '$lastName') AND email = '$email')";

    if(mysqli_query($conn, $sql)){
        session_destroy();
        header("Location: login.php");
        $message = "User Name Updated!";
    }
}

//Profile Picture Update
if (isset($_POST["submit"]))
 {     
    #file name with a random number so that similar dont get replaced
     $pname = $uName."-".$_FILES["file"]["name"];
 
    #temporary file name to store file
    $tname = $_FILES["file"]["tmp_name"];
   
     #upload directory path
    $uploads_dir = 'Images/pp';
    #TO move the uploaded file to specific location
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
 
    #sql query to insert into database
    $sql = "UPDATE user SET pp='$pname' WHERE userName='$uName'";
 
    if(mysqli_query($conn,$sql)){

    }
    else{
        echo "Error";
    }
}

//update qualification
if(isset($_POST['qlf'])){
    $update = mysqli_real_escape_string($conn, $_POST['qualification']);

    $sql = "UPDATE jobseeker SET qualification = '$update' WHERE userName = '$uName'";

    if(mysqli_query($conn, $sql)){
        $message = "Company Name Updated!";
        header("Location: settingS.php");
    }
}

//Delete your Account
if(isset($_POST['deleteaccount'])){
    $sql = "DELETE FROM user WHERE userName = '$uName'";
    if(mysqli_query($conn,$sql)){
        //
    }

    $sql1 = "DELETE FROM employee WHERE userName = '$uName'";
    if(mysqli_query($conn,$sql1)){
        //
    }

    $sql2 = "DELETE FROM jobseeker WHERE userName = '$uName'";
    if(mysqli_query($conn,$sql2)){
        //
    }

    $sql3 = "DELETE FROM application WHERE userName = '$uName'";
    if(mysqli_query($conn,$sql3)){
        //
    }

    $sql4 = "DELETE FROM job WHERE userName = '$uName'";
    if(mysqli_query($conn,$sql4)){
        //
    }

    session_destroy();
    $message = "Account is Deleted!";
    header("Location: homeG.php");
}

//Notification (Mailing) on
if(isset($_POST['on'])){
    $sql = "UPDATE notification SET mailing = 'On' WHERE userName = '$uName'";

    if(mysqli_query($conn, $sql)){
        $message = "Notification on!";
        header("Location: settingS.php");
    }
}

//Notification (Mailing) off
if(isset($_POST['off'])){
    $sql = "UPDATE notification SET mailing = 'Off' WHERE userName = '$uName'";

    if(mysqli_query($conn, $sql)){
        $message = "Notification Off!";
        header("Location: settingS.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CareerBridge | Settings</title>
    <link rel="stylesheet" type="text/css" href="./CSS/settingSStyle.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="./Images/Logo.png" alt="Logo">
            <a href="">CareerBridge</a>
        </div>

        <div class="navbar">
            <a href="settingS.php">Settings</a>
            <a href="#">Notification</a>
            <a href="#">Company</a>
            <a href="jobPage.php">Find a Job</a>
            <a href="homeS.php">Home</a>
        </div>    
    </div>

    <div class="container">
        <div class="userDetails">
            <?php
               

               
            ?>
            <div class="mainBar">
                <img src='<?php echo $img?>' id='pp' alt="Profile Picture" onclick="enlargeImage()">
                <!-- Enlarged Image Container -->
                <div id="enlarged-image-container" onclick="closeEnlargedView()">
                    <img id="enlarged-image" src="" alt="Enlarged Image">
                </div>

                <script>
                    function enlargeImage() {
                        // Get the profile picture source
                        var profilePictureSrc = document.getElementById('pp').src;

                        // Set the source of the enlarged image
                        document.getElementById('enlarged-image').src = profilePictureSrc;

                        // Show the enlarged image container
                        document.getElementById('enlarged-image-container').style.display = 'flex';
                    }

                    function closeEnlargedView() {
                        // Hide the enlarged image container
                        document.getElementById('enlarged-image-container').style.display = 'none';
                    }
                </script>

                <div class="userName">
                    <h1 id='name'>
                        <?php echo $fullName;?>
                    </h1>
                    <h2 id='type'>
                        <?php echo $loginType;?>
                    </h2>
                </div>
                
                <div class="logout">
                    <form action="" method="post">
                        <svg fill="#000000" height="30px" width="30px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                        viewBox="0 0 512 512" xml:space="preserve">
                            <g>
                                <g>
                                    <path d="M256.004,0c-10.876,0-19.694,8.818-19.694,19.694v137.858c0,10.876,8.816,19.694,19.694,19.694
                                        c10.876,0,19.694-8.818,19.694-19.694V19.694C275.698,8.818,266.88,0,256.004,0z"/>
                                </g>
                            </g>

                            <g>
                                <g>
                                    <path d="M445.806,153.344c-25.441-37.223-60.761-65.947-102.141-83.071c-6.076-2.514-13.027-1.829-18.495,1.825
                                        c-5.467,3.655-8.77,9.797-8.77,16.374v41.319c0,7.309,4.069,14.018,10.536,17.424c50.603,26.654,82.049,78.514,82.049,135.341
                                        c0,84.132-68.522,152.578-152.753,152.578c-84.386,0-153.037-68.446-153.037-152.578c0-55.718,30.488-107.092,79.597-134.074
                                        c6.298-3.46,10.192-10.075,10.192-17.26V89.579c0-6.624-3.31-12.804-8.841-16.447c-5.531-3.643-12.516-4.263-18.6-1.645
                                        C80.912,107.869,26.234,190.718,26.234,282.555C26.234,409.071,129.248,512,255.866,512c126.766,0,229.9-102.929,229.9-229.445
                                        C485.766,236.274,471.949,191.594,445.806,153.344z"/>
                                </g>
                            </g>
                        </svg>
                        <input type="submit" name="logout" value="Logout">
                        
                    </form>
                    
                </div>
            </div>
            
        </div>
        
        <div class="editprofile">
            <div class="pdetail">
                <h1 id="toic">Personal Settings</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td class="td1"><label>Change First Name : </label></td>
                            <td class="td2"><input type="text" name="fName" id="" value="<?php echo $row['fname']?>"></td>
                            <td class="td3"><input type="submit" name="firstName" value="Change"></td>
                        </tr>

                        <tr>
                            <td class="td1"><label>Change Last Name : </label></td>
                            <td class="td2"><input type="text" name="lName" id="" value="<?php echo $row['lname']?>"></td>
                            <td class="td3"><input type="submit" name="lastName" value="Change"></td>
                        </tr>

                        <tr>
                            <td class="td1"><label>Change Username : </label></td>
                            <td class="td2"><input type="text" name="uName" id="" value="<?php echo $row['userName']?>"></td>
                            <td class="td3"><input type="submit" name="userName" value="Change"></td>
                        </tr>

                        <tr>
                            <td class="td1"><label>Change Profile Picture : </label></td>
                            <td class="td2"><input type="File" name="file" value="<?php echo $row['pp'];?>"></td>
                            <td class="td3"><input type="submit" name="submit" value="Change"></td>
                        </tr>

                        <tr>
                            <td class="td1"><label>Change Qualification : </label></td>
                            <td class="td2"><textarea name="qualification" id="qlf" value="" rows="4" cols="30"><?php echo $row['qualification'];?></textarea></td>
                            <td class="td3"><input type="submit" name="qlf" value="Change"></td>
                        </tr>
                    </table>

                        <label>Are want to delete your account ?</label>
                        <input type="submit" name="deleteaccount" value="Delete Account">                                  
                        <br>
                </form>  
            </div>

            <div class="pdtailsRight">
                <h1 id="topic">General Settings</h1>
                    <h3>Notification Settings : </h3>
                    <br>    
                        <form action="" method="post">
                            <label><b>Notification for all new activity : </b></label>
                            
                                <?php 
                                    $sql = "SELECT * FROM notification WHERE userName = ?";

                                    $stmt = mysqli_stmt_init($conn);

                                    if(mysqli_stmt_prepare($stmt, $sql)){
                                        mysqli_stmt_bind_param($stmt,"s",$uName);
                                        mysqli_stmt_execute($stmt);
                                        $rslt = mysqli_stmt_get_result($stmt);
                                        while($row = mysqli_fetch_assoc($rslt)){
                                            echo $row['mailing'];
                                        }
                                    }
                                ?>
                            
                            <br>
                            <input type="submit" name="on" value="Turn On"> 
                            <input type="submit" name="off" value="Turn Off">                                   
                            <br>
                            
                        </form>
                    
                    <label><b>Contact Us : </b></label>
                    <div class="help">
                        <p>Email : acareerbridge@gmail.com</p>
                        <p>Call Us : +94911234567</p>
                        <p>Address : Prototype Nexus, Colombo.</p>
                    </div>
            </div>
        </div>
        
    </div>
 
    

    <footer class="ftr">
        <p>
            &copy; 2023 CareerBridge. All rights reserved.
        </p>
    </footer>
</body>
</html>
 

