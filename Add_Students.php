<?php

include("config.php");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Attendance</title>
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


<div class="container	"> 
	<div class="box-form-box">
		


	<header> Add Students to your course</header>
	<form action="login.php" method="post">	
	

	<div  class="field input">
	<label for="id"> Student's ID</label>	
	<input type="id" name="id" id="id" required>
	</div>


	<div  class="field input">
	<label for="first_name"> Student's First Name</label>	
	<input type="first_name" name="first_name" id="first_name" required>
	</div>

	<div  class="field input">
	<label for="lastName"> Student's Last Name</label>	
	<input type="last_name" name="last_name" id="last_name" required>
	</div>

	<div  class="field input">
	<label for="email"> Student's Email</label>	
	<input type="email" name="email" id="email" required>
	</div>

	<div  class="field input">
	<label for="password_"> Student's password</label>	
	<input type="password_" name="password_" id="password_" required>
	</div>
	
	<div class="field input">
		<label for="course_id">Course ID</label>	
		<input type="number" name="course_id" id="course_id" required>
	</div>

	<div class="field input">
		<label for="grade">Grade</label>	
		<input type="number" step="0.01" name="grade" id="grade" required>
	</div>
	<input type="submit"class="loginbutton" name="submit" value="Add_Student">
</form>
</div>

</div>

</body>
</html>