<?php
	session_start(); //Alustasn sessiooni
	$error = ""; //Muutuja veateate kuvamiseks
	if (isset($_POST['loginButton'])) {
		if (empty($_POST['userName']) || empty($_POST['passWord'])) { //Kontrollin, kas väljad on täidetud
			$error = "Wrong Username or Password";
		}
		else {
			$user = $_POST['userName'];
			$pass = $_POST['passWord'];
			$connection = mysqli_connect("localhost", "test", "t3st3r123", "test");
			// Välistan html-i jms kasutamise päringus
			$user = htmlspecialchars($user);
			$pass = htmlspecialchars($pass);
			$user = mysqli_real_escape_string($connection, $user);
			$pass = mysqli_real_escape_string($connection, $pass);
			//Kontrollin, kas kasutaja vastava parooliga andmebaasis eksisteerib
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
