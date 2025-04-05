<?php

include("config.php")

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="groupproject.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">


</head>
<body>
	<div class="container "> 
	<div class="box-form-box">
	<header> Login </header>
	<form action="login.php" method="post">	
	

	<div  class="field input">
	<label for="email"> Email</label>	
	<input type="text" name="email" id="email" required>
	</div>

	<div  class="field input">
	<label for="staff_password"> Password</label>	
	<input type="password" name="password" id="staff_password" required>
	</div>
	<input type="submit"class="loginbutton" name="login_user" value="Login">
	<div  class="field">
	
	</div>
</form>
</div>
</div>





</body>
</html>