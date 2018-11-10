<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">
<title> Status Posting System </title>
<h1> Status Posting System </h1>
<meta http-equiv="Content-Type" content="text/html"; charset=utf-8" />
</head>


<body>
<!-- load the image and align it to the right side -->
<img src="book.jpg" width="125"height="125" align="right">

<form action="poststatusprocess.php" method="post">

<label>Status (required): <input required type="text" name="status"> </label>
<br> <br>

<label>Status Code (required): <input required type="text" name="code"></label>
<br> <br>

<label> Share: &nbsp  &nbsp</label> 
<label> Public <input type="radio" name="share" value="Public"</label>
<label>Friends <input type="radio" name="share"value="Friends"</label> 
<label>Only me <input type="radio" name="share" value="Only me"</label> <br> <br>

Date: <input required type = "text" name = "date" value = "<?php echo  date("d/m/y");
?>"/>
 <br><br>

<label> Permission Type: &nbsp </label> 
<label>Allow Like<input type="checkbox" value="Allow like" name="type1"</label>
<label>Allow Comment<input type="checkbox" value="allow Comment" name="type2"</label>
<label>Allow Share<input type="checkbox" value="allow share" name="type3"</label>

<br><br>

<input type="submit" value="Post">
<input type="reset" value="Reset">
</form>



<br> <br>
<a href = "index.html">Return to Home page</a>
</body>

</html>