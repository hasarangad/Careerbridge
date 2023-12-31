<!DOCTYPE html>
<html>
<head>
	<title>Download File using PHP</title>
</head>
<body>

<h2>Download File from HERE : </h2>
<a href="newPhp.php?file=Images/1.jpg">click HERE</a>



</body>
</html>

<?php 
if(!empty($_GET['file']))
{
	$filename = basename($_GET['file']);
	$filepath = './Images/' . $filename;
	if(!empty($filename) && file_exists($filepath)){

//Define Headers
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-Type: application/zip");
		header("Content-Transfer-Encoding: binary");

		readfile($filepath);
		exit;

	}
	else{
		echo "This File Does not exist.";
	}
}

 ?>