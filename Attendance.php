<?php

include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['id'];
    $course_id = $_POST['courseid'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    $date = $_POST['date'];
 
    $status = $_POST['status'];

// Simple validation to prevent errors or having empty information go through 
 
if (!empty($student_id) && !empty($course_id) && !empty($date) && !empty($status)) {
 
$stmt = $conn->prepare("INSERT INTO attendance (student_id, course_id, date, status) VALUES (?, ?, ?, ?)");
 
$stmt->bind_param("iiss", $student_id, $course_id, $date, $status);

// using if statements to tell the user if the record was inserted successfully or not.      
 if ($stmt->execute()) {

echo "<script>alert('Attendance record inserted successfully');</script>";
 
} else {
 echo "<script>alert('Please fill in all fields');</script>";
}
}

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
<div class="table-container">
<div class="box-form-box-table">
<h1 >Attendance</h1>
<br>

<table class="grades_table">
	
	
<th>First Name</th>
<th>Last Name</th>
<th>Student ID</th>
<th>Course Name</th>
<th>Date</th>
<th>Status</th>



<?php 

// Had to run php on attendance.php by itself because it kept overlapping with the grades table and messing a lot of things up 

include("config.php");

$sql = "SELECT a.*, s.first_name, s.last_name, c.course_name 
FROM attendance a
JOIN students s ON a.student_id = s.id
JOIN courses c ON a.course_id = c.course_id"; 

$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "<tr><td colspan='6'>Query failed: " . mysqli_error($conn) . "</td></tr>";
} elseif (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
   echo "<tr>
   <td>{$row['first_name']}</td>
   <td>{$row['last_name']}</td>
  <td>{$row['student_id']}</td>
   <td>{$row['course_name']}</td>
   <td>{$row['date']}</td>
      <td>{$row['status']}</td>
</tr>";
  }
} else {
    echo "<tr><td colspan='6'>No attendance records found.</td></tr>";
}







?>
</table>

<body>
	<div class="container "> 
	<div class="box-form-box">
	<header> Add to Attendance </header>
	<form action="Attendance.php" method="post">	
	

	<div  class="field input">
	<label for="id"> Student ID</label>	
	<input type="text" name="id" id="id" required>
	</div>

	<div  class="field input">
	<label for="Course_id"> course ID</label>	
	<input type="courseid" name="courseid" id="courseid" required>
	</div>

	<div  class="field input">
	<label for="date"> Date</label>	
	<input type="date" name="date" id="date" required>
	</div>

	<div  class="field input">
	<label for="date"> Status </label>	
	<input type="status" name="status" id="status" required>
	</div>
	<input type="submit"class="loginbutton" name="login_user" value="Insert Attendance">
	<div  class="field">
	
	</div>
</div>
</div>



</body>
</html>