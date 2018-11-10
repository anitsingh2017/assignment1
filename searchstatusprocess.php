<!DOCTYPE>
<html>
<head>
<link rel="stylesheet" href="styles.css">
<title> Search status form </title>
<meta http-equiv="Content-Type" content="text/html"; charset=utf-8" />
<h1> Status Information </h1>
</head>
<body>
<img src="book.jpg" width="125"height="125" align="right">

<?php
	/*
		specify the username and password and database name. 
	
	*/
	$name = "localhost";
	$userName = "root";
	$password = "";
	$dbName = "test";

	/*
		uses get method to store the user input into search variable
	*/
	$search = $_GET["search"];

	/*
		connects to the database.
	*/
	$conn =   mysqli_connect($name,$userName,$password,$dbName);
	
	if(!$conn)
	{
		echo "Can not connect to the database.";
		
	}
	/*
		queries the database to search for the specific status code.
	*/
	$sql = "select * from status where statuscode LIKE '$search%';";
	$result = mysqli_query($conn,$sql);
		
	/*
			prints out the data or prints 0 results found if no matching status code has been entered.
	*/
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

?>
<!--
	providing links to searc another status or return to home page.
-->
<div id="link"> <br>
<a href = "searchstatusform.html">Search another status</a> <br>
<a style="float:right" href = "index.html">Return to Home Page</a>
</div>

</body>