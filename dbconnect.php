<?php
	
	$server = "localhost";
	$user = "test";
	$pass = "t3st3r123";
	$db = "test";

	$connection = mysqli_connect($server, $user, $pass, $db);

	if(!$connection){
		die("Connection failed: " . mysqli_connect_error());
	}
?>