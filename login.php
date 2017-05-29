<?php
	session_start();
	include("dbconnect.php");
	$error = "";
	if (isset($_POST['loginButton'])) {
		if (empty($_POST['userName']) || empty($_POST['passWord'])) {
			$error = "Wrong Username or Password";
		}
		else {
			$user = $_POST['userName'];
			$pass = $_POST['passWord'];
			$user = htmlspecialchars($user);
			$pass = htmlspecialchars($pass);
			$user = mysqli_real_escape_string($connection, $user);
			$pass = mysqli_real_escape_string($connection, $pass);
			$query = mysqli_query($connection, "SELECT * FROM mesna_projekt WHERE kasutaja='$user' AND parool='$pass'");
			$rows = mysqli_num_rows($query);
			if ($rows == 1) {
				$_SESSION['userLogin'] = $user;
				header("location: user.php");
			}
			else {
				$error = "Wrong Username or Password";
			}
			mysqli_close($connection);
		}
	}
?>
