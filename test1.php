<?php 
session_start();

include 'dbh.inc.php';
 
if (isset($_POST["submit"]))
 {
    $uName = $_SESSION['userName'];
     
    #file name with a random number so that similar dont get replaced
    $pname = $uName.$_FILES["file"]["name"];
 
    #temporary file name to store file
    $tname = $_FILES["file"]["tmp_name"];
   
    #upload directory path
    $uploads_dir = 'Images/pp';
    #TO move the uploaded file to specific location
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
 
    #sql query to insert into database
    $sql = "INSERT into fileup(title,image) VALUES('$uName','$pname')";
 
    if(mysqli_query($conn,$sql)){
 
    echo "File Sucessfully uploaded";
    }
    else{
        echo "Error";
    }
}
 
 
?>
<!DOCTYPE html>
<html>
<head>                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
    <title>File Upload</title>
</head>
<body>
 
<form method="post" enctype="multipart/form-data">
    <label>File Upload</label>
    <input type="File" name="file">
    <input type="submit" name="submit">
 
 
</form>
<?php
    $img = $uploads_dir.'/'.$pname;
    echo "<img src='$img'>";
?>

</body> 
</html>
 

