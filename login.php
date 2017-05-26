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
			$connection = mysql_connect("localhost", "username", "password");
			// Välistan html-i jms kasutamise päringus
			$user = htmlspecialchars($user);
			$pass = htmlspecialchars($pass);
			$user = mysql_real_escape_string($user);
			$pass = mysql_real_escape_string($pass);
			//Andmebaasi valik serverist
			$db = mysql_select_db("database name", $connection);
			//Kontrollin, kas kasutaja vastava parooliga andmebaasis eksisteerib
			$query = mysql_query("SELECT * FROM TabeliNimi WHERE Username='$user' AND Password='$pass'", $connection);
			$rows = mysql_num_rows($query);
			if ($rows == 1) {
				$_SESSION['userLogin'] = $user;
				header("location: user.php");
			}
			else {
				$error = "Wrong Username or Password";
			}
			mysql_close($connection);
		}
	}
?>
