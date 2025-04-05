<?php

include("config.php");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>grades</title>
<link rel="stylesheet" type="text/css" href="groupproject.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>
<body>
<nav class = "nav">
<div class = "navdiv">
<div class = "logo"></div>
	<u1>
<li><a href="groupprojecthomepage.php">Home</a></li>
<li><a href="Add_Students.php">Add Students</a></li>
<li><a href="Attendance.php">Attendance</a></li>
<li><a href="Grades.php">Grades</a></li>
<a href="groupproject.php"> <button class = "logoutbutton">Log out</button> </a>
</u1>	
</div>	
</nav>
<div class="grades_table">
<div class="box-form-box">
<h1 >Grades of students</h1>
<br>
<table class="grades_table">
	
	<th>ID</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Email</th>
	<th>Course Name</th>
	<th>Current Grade</th>

<?php include("login.php"); ?>
</table>


</div>
</div>



</body>
</html>-