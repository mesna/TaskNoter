<?php

$userNameError = $passWordError = $passWordMatchError = "";
$user = $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["userName"])) {
    	$userNameError = "Username is required";
  	} 
  	else {
    	$user = clean_input($_POST["userName"]);
  	}

  	if (empty($_POST["passWord"])) {
    	$passWordError = "Password is required";
  	}
  	else {
  		if (empty($_POST["passWord2"])) {
  			$passWordMatchError = "Please re-enter your password!";
  		}
  		else {
  			if ($_POST["passWord"] == $_POST["passWord2"]) {
  				$pass = clean_input($_POST["passWord"]);
  			}
  			else {
  				$passWordMatchError = "Passwords don't match!";
  			}
  		}
 	}
}
function clean_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
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
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label>Username: </label>
		<input type="text" name="userName" class="input" value="<?php if(isset($_POST['userName'])){ echo $_POST['userName'];} ?>"><br>
		<span class="error"><?php echo $userNameError; ?></span>
		<label>Password: </label>
		<input type="Password" name="passWord" class="input"><br>
		<span class="error"><?php echo $passWordError; ?></span>
		<label>Password again: </label>
		<input type="password" name="passWord2" class="input">
		<span class="error"><?php echo $passWordMatchError; ?></span>
		<input type="submit" name="createUser" value="Create">
		<a href="index.php" class="button">Cancel</a>
		<button onclick="window.location='index.php'">Cancel</button>
	</form>
	</div>
</body>
</html>