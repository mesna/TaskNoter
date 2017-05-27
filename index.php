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
	<div class="container">
	<form method="POST" action="" class="form">
		<label>Username: </label>
		<input type="text" name="userName" class="input">
		<label>Password: </label>
		<input type="Password" name="passWord" class="input">
		<br>
		<button type="submit" name="loginButton">Log In</button>
		<span class="error"><?php echo $error; ?></span>
	</form>
	<div>Not a user yet?</div>
	<button onclick="window.location.href='register.php'">Create user</button>
	</div>
</body>
</html>