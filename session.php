<?php
	$connection = mysqli_connect("localhost", "root", "t3st3r123", "test");
	session_start();
	$checkuser = $_SESSION['userLogin'];
	$user_sql = mysqli_query($connection, "SELECT kasutaja FROM mesna_projekt WHERE kasutaja='$checkuser'");
	$row = mysqli_fetch_assoc($user_sql);
	$login_session = $row['kasutaja'];
	$task_sql = mysqli_query($connection, "SELECT ID, tasks FROM mesna_projekt_data WHERE kasutaja='$checkuser'");
	if (!isset($login_session)) {
		mysqli_close($connection);
		header("location: index.php");
	}
?>