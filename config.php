<?php

// phpmyadmin settings + the database name from mysql script file
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "student_system";
$conn = new mysqli($servername, $username, $password, $db_name, 4306);

if ($conn->connect_error) {
	die("connection failed:" .$conn->connect_error);

}

// if the text appeared, it means that the connection work
// seems like it works but just fill out the quotes if I need to double-check when I move files around
echo "";

?>