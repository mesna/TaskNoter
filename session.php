<?php
	$connection = mysqli_connect("localhost", "root", "t3st3r123", "test");
	session_start();
	$checkuser = $_SESSION['userLogin'];
	$session_sql = mysqli_query($connection, "SELECT kasutaja FROM mesna_projekt WHERE kasutaja='$checkuser'");
	$row = mysqli_fetch_assoc($session_sql);
	$login_session = $row['kasutaja'];
	if (!isset($login_session)) {
		mysqli_close($connection);
		header("location: index.php");
	}
?>