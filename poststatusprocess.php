<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">
<title> Search status form </title>
<meta http-equiv="Content-Type" content="text/html"; charset=utf-8" />
<h1> Status Posting System </h1>
</head>

<body>
<!-- load the image and align it to the right side -->
<img src="book.jpg" width="125"height="125" align="right">
<?php

	$validStatus;
	$validCode;

if(!empty($_POST["status"]) && (preg_match('/^[\w\s\.,!\?]+$/',$_POST["status"])))
  {
	$status = $_POST["status"];
	$validStatus = true;
  } 
else
	{
	$validStatus = false;
	echo "\nPlease enter alphanumeric characters including (,.!?) and spaces for status"; 
	}



if (!empty($_POST["code"]) &&(preg_match('/^S\d\d\d\d$/', $_POST["code"]))) {
	$validCode = true;
    $code = $_POST["code"];
  } else {
	  $validCode = false;
	  echo "<br>";
    echo "Please enter valid status code e.g. Sxxxx";
	
  }

if (!empty($_POST["share"])) {
    $share= $_POST["share"];
}
else{
	$share = "not set";
}
 
if (!empty($_POST["type1"])) {
   
    $type = "allow like";
}
    if (!empty($_POST["type2"])) {
   
    $type .= " allow comment";
}    if (!empty($_POST["type3"])) {
   
    $type .= " allow share";
}
if(empty($_POST["type1"]) && empty($_POST["type2"]) && empty($_POST["type3"]))
{
	$type = "Permission type not set";
	
}

	if(!empty($_POST["date"]))
	{
		if(preg_match("/^(\d{2})\/(\d{2})\/(\d{4})$/", $_POST["date"]) || preg_match("/^(\d{2})\/(\d{2})\/(\d{2})$/", $_POST["date"]))
			{
				$date = $_POST["date"];
				
			}
			else{
				echo "<br>";
				echo " please enter the correct format of DD-MM-YYYY or DD-MM-YY in the next status.";
				$date = date(" j F Y");
			}
	}
	else 
	{
		$date = date(" j F Y");
	}

		/*
		specify the username and password and database name. 
	
		*/
$name = "localhost";
$userName = "root";
$password = "";
$dbName = "test";

	/*
		connects to the database
	
	*/
	$conn =   mysqli_connect($name,$userName,$password,$dbName);

	/*
		creates a table called status and adds values such as statuscode, description, date and share type.
	*/
$sql = "CREATE TABLE status (
description VARCHAR(50) NOT NULL,
statuscode  VARCHAR(5) NOT NULL PRIMARY KEY,
share VARCHAR(10),
date VARCHAR(30),
permission VARCHAR(40))";

	/*
		queries the database to create a table
	*/
	mysqli_query($conn,$sql);
	
	/*
		if validCode and validStatus are true then executes the following code.
	*/
if($validCode && $validStatus)
{
	/*
		sql statement to insert the values into the status table.
	*/
	$sql = "INSERT INTO status (description,statuscode,share,date,permission)
	VALUES('$status', '$code', '$share', '$date', '$type')";
	
	/*
		queries the database to insert values.
	*/
	
	
	mysqli_query($conn,$sql);
	
	$sql = "SELECT * from status";
	
	
	$result = $conn->query($sql);
	
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
				echo "status: " . $row["description"]."<br>" ;
				echo "code: " , $row["statuscode"], "<br>";
				echo "share: " , $row["share"], "<br>";
				echo "date: " , $row["date"], "<br>";
				echo "permission: " , $row["permission"], "<br>";		
		}	
	}
	else{
		echo " 0 results found.";
		
	}	
}
else{
	echo "<br>";
	echo "please enter valid status and status code";
	
}

mysqli_close($conn);

?>
<br><br>
<a href = "index.html">Return to Home page</a>
</body>

</html>