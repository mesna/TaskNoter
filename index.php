<?php
	include('login.php');
	if (isset($_SESSION['userLogin']) && (isset($_SESSION['passWord']))) {
		header("location: user.php");
	}
?>
<DOCTYPE html>
<html>
<head>
	<title>Welcome to TaskNoter</title>
	<link rel="stylesheet" type="text/css" href="styling.css">
</head>
<body class="keha">
	<div class="login">
	<form method="POST" action="">
		<label>Username: </label>
		<input type="text" name="userName" class="input">
		<label>Password: </label>
		<input type="Password" name="passWord" class="input">
		<br>
		<input type="submit" name="loginButton" value="Log in">
		<span class="error"><?php echo $error; ?></span>
	</form>
	<div>Not a user yet?</div>
	<button onclick="window.location.href='register.php'">Create user</button>
	</div>
</body>
</html>