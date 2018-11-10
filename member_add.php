<!DOCTYPE html>
<html>
<head>
<title> Lab 5 </title>
<meta http-equiv="Content-Type" content="text/html"; charset=utf-8" />
<h1> Lab 5 </h1>
</head>
<body>
<?php

$name = "localhost";
	$userName = "root";
	$password = "";
	$dbName = "test";
	$conn =   mysqli_connect($name,$userName,$password,$dbName);

	
	/*
	$fName = $_POST["fName"];
	$lName = $_POST["lName"];
	$gender = $_POST["gender"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	
	$sql = "CREATE TABLE vipmembers (
	member_id INT AUTO_INCREMENT PRIMARY KEY 
fName VARCHAR(40),
lName  VARCHAR(40),
gender VARCHAR(1),
email VARCHAR(40),
phone VARCHAR(20))";
	
	mysqli_query($conn,$sql);
	
	
	
	$sql = "INSERT INTO vipmembers (fName,lName,gender,phone,email)
	VALUES('$fName', '$lName', '$gender', '$phone', '$email')";
	mysqli_query($conn,$sql);
*/
?>
<a href = "member_add_form.php">Add new memeber form</a>
<a href = "vip_member.php">Return to the home page</a>
</body>

</html>