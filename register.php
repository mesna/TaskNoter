<?php

?>
<DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="styling.css">
</head>
<body class="keha">
	<div class="register">
	<div><b>Create a new user for TaskNoter</b></div><br>
	<form method="POST" action="">
		<label>Username: </label>
		<input type="text" name="userName"><br>
		<label>Password: </label>
		<input type="Password" name="passWord"><br>
		<label>Password again: </label>
		<input type="password" name="passWord2">
		<input type="submit" name="loginButton" value="Create">
		<span><?php echo $error; ?></span>
	</form>
	</div>
</body>
</html>