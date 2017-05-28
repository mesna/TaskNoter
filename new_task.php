<?php
	session_start();
	$error = $task = "";
	$user = $_SESSION["userLogin"];
	if (isset($_POST["taskButton"])) {
		if (empty($_POST["taskName"])) {
			$error = "Can't have an empty Task!";
		}
		else {
			$task = clean_input($_POST["taskName"]);
			$connection = mysqli_connect("localhost", "root", "t3st3r123", "test");
  			$sql = "INSERT INTO mesna_projekt_data (kasutaja, tasks) VALUES ('$user', '$task')";
  			if ($connection->query($sql) === TRUE) {
  				header("location: user.php");
  				mysqli_close($connection);
  			}
  			else {
  				echo "Error: " . $sql . "<br>" . $connection->error;
  			}
  			mysqli_close($connection);
  			}
	}
	if (isset($_POST["cancelTask"])) {
		header("location: user.php");
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
	<title>User Registration</title>
	<link rel="stylesheet" type="text/css" href="styling.css">
</head>
<body class="keha">
<div class="container">
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form">
		<label>Enter Task: </label>
		<textarea name="taskName" class="input"></textarea>
		<br>
		<button type="submit" name="taskButton">OK</button>
		<button name="cancelTask">Cancel</button>
		<span class="error"><?php echo $error; ?></span>
	</form>
</div>
</body>
</html>