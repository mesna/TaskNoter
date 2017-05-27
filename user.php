<?php
	include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome back</title>
	<link rel="stylesheet" type="text/css" href="styling.css">
</head>
<body class="keha">
	<div class="content">
	<div>Hello <?php echo $login_session ?></div>
	<div class="tasks">Tasks</div>
	<div><button class="button"><a href="logout.php">Exit</a></button></div>
	</div>
</body>
</html>