<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Upload Form</title>
</head>
<body>
    <h2>Upload CV</h2>
    
    <form action="test1.php" method="post" enctype="multipart/form-data">
        <input type="text" name="candidate_name" >
        
        <br>
        <input type="file" name="cv_file">
        
        <br><br>
        
        <input type="submit" value="Upload CV" name="submit">
    </form>
</body>
</html>
