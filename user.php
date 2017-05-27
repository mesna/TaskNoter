<?php
	include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome back</title>
	<link rel="stylesheet" type="text/css" href="styling.css">
</head>
<body>
	<div>Hello <?php echo $login_session ?></div>
	<div><a href="logout.php">Exit</a></div>
</body>
</html>