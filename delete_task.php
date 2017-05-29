<?php
	session_start();
	if (isset($_POST['deleteTask'])) {
		$idArray = $_POST['checkbox'];
		$connection = mysqli_connect("localhost", "test", "t3st3r123", "test");
		foreach ($idArray as $id) {
			mysqli_query($connection, "DELETE FROM mesna_projekt_data WHERE ID='$id'");
		}
		header("location: user.php");
  		//$query = mysqli_query($connection, "SELECT * FROM mesna_projekt WHERE kasutaja='$user'");
	}
?>