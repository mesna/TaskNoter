<?php
	include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome back</title>
	<link rel="stylesheet" type="text/css" href="styling.css">
	<script src="javas.js"></script>
</head>
<body class="keha">
	<div class="content">
	<div><?php echo "<div style='font-size: 20px; font-family: Courier; font-weight: bold;'> Hello ".$login_session."</div>"; ?></div>
	<div class="tasks">
	<?php
		while ($row = mysqli_fetch_array($task_sql)) {
			echo "<div style='font-size: 20px;	font-family: Courier; font-weight: bold;'>".$row['tasks']."</div><br>";
		}
		mysqli_close($connection);
	?>
	</div>
	<div>
		<button class="button" onclick="window.location.href='index.php'">Exit</button>
		<button class="button" id="newTask" onclick="window.location.href='new_task.php'">Create a New Task</button>
	</div>
	</div>
</body>
</html>