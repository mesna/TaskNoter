<?php
include("dbconnect.php");
$userNameError = $passWordError = $passWordMatchError = "";
$user = $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["cancelUser"])) {
    header("location: index.php");
  }
	if (empty($_POST["userName"])) {
    	$userNameError = "Username is required";
  	} 
  	else {
    	$user = htmlspecialchars($_POST["userName"]);
      $user = mysqli_real_escape_string($connection, $user);
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
  				$pass = htmlspecialchars($_POST["passWord"]);
          $pass = mysqli_real_escape_string($connection, $pass);
  				$query = mysqli_query($connection, "SELECT * FROM mesna_projekt WHERE kasutaja='$user'");
  				$rows = mysqli_num_rows($query);
  				if ($rows == 0) {
  					$sql = "INSERT INTO mesna_projekt (kasutaja, parool) VALUES ('$user', '$pass')";
  					if ($connection->query($sql) === TRUE) {
  						header("location: index.php");
  						mysqli_close($connection);
  					}
  					else {
  						echo "Error: " . $sql . "<br>" . $connection->error;
  					}
  				}
  				else {
  					mysqli_close($connection);
            $userNameError = "This username is already taken!";
  				}
  			}
  			else {
  				$passWordMatchError = "Passwords don't match!";
  			}
  		}
 	}
}
?>
<DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="styling.css">
</head>
<body class="keha">
	<div class="container">
	<div><b class="text">Create a new user for TaskNoter</b></div><br>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form">
		<label>Username: </label>
		<input type="text" name="userName" class="input" value="<?php if(isset($_POST['userName'])){ echo $_POST['userName'];} ?>"><br>
		<span class="error"><?php echo $userNameError; ?></span>
		<label>Password: </label>
		<input type="Password" name="passWord" class="input"><br>
		<span class="error"><?php echo $passWordError; ?></span>
		<label>Password again: </label>
		<input type="password" name="passWord2" class="input">
		<span class="error"><?php echo $passWordMatchError; ?></span>
		<button type="submit" name="createUser">Create user</button>
		<button name="cancelUser">Cancel</button>
	</form>
	</div>
</body>
</html>