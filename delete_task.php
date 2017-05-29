<?php
	session_start();
	include("dbconnect.php");
	if (isset($_POST['deleteTask'])) {
		$idArray = $_POST['checkbox'];
		foreach ($idArray as $id) {
			mysqli_query($connection, "DELETE FROM mesna_projekt_data WHERE ID='$id'");
		}
		header("location: user.php");
	}
?>