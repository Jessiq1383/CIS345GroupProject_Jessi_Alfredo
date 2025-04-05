<?php
include("config.php");
session_start();

if(isset($_POST['login_user'])){
$email = $_POST['email'];
$staff_password = $_POST['password'];

$sql = "SELECT * FROM teachers where email = '$email' and staff_password = '$staff_password'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
if($count==1){
header("Location:groupprojecthomepage.php");

}
else{
echo '<script>
window.location.href = "groupproject.php"
alert("Login failed. Invalid username or password, please try again")
</script>';
}

}

 

// ADD STUDENTS key notes to make sure it can we need to insert into the students,enrollment and grades table to make sure it appears on the grades table
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// All the entites we need filled in order to make sure it gets inserted into the three tables without errors
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$password = $_POST["password_"];
$course_id = $_POST["course_id"];
$grade = $_POST["grade"];

// Insert into the student table
$sql = "INSERT INTO students (first_name, last_name, email, password_) 
VALUES ('$first_name', '$last_name', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
// Get new student ID
$student_id = $conn->insert_id;

// Insert into the enrollment table 
$conn->query("INSERT INTO enrollments (student_id, course_id) 
VALUES ('$student_id', '$course_id')");

// Now inserting into the grades table 
$conn->query("INSERT INTO grades (student_id, course_id, grade) 
VALUES ('$student_id', '$course_id', '$grade')");

/// Redirect to homepage
header("Location: groupprojecthomepage.php");
exit();
} else {
echo "Error: " . $conn->error;
}

$conn->close();
}






// GRADES PAGE - using similar code to enrollment with little 

// Joining the tables together for the grades page
// Spaceing them out so it doesn't look too crowded and clean
$sql = "SELECT s.id,s.first_name,
s.last_name,
s.email,
c.course_name,
g.grade
FROM students s
JOIN enrollments e ON s.id = e.student_id
JOIN courses c ON e.course_id = c.course_id
LEFT JOIN grades g ON s.id = g.student_id AND c.course_id = g.course_id";

$result = mysqli_query($conn, $sql);




// Output the table rows
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>
<td>{$row['id']}</td>
<td>{$row['first_name']}</td>
<td>{$row['last_name']}</td>
<td>{$row['email']}</td>
<td>" . ($row['course_name'] ?? 'N/A') . "</td>
<td>" . ($row['grade'] ?? 'N/A') . "</td>
</tr>";
}
} else {
   echo "<tr><td colspan='6'>No grades found</td></tr>";
}



// ATTENDANCE DATA FORM - moved to attendance.php


?>