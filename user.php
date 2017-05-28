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
			//echo "<div style='font-size: 20px;	font-family: Courier; font-weight: bold;'><input type='checkbox'>".$row['tasks']."</div><br>";
	?>
	<div class="task"><input name="checkbox[]" type="checkbox" value="<?php echo $row['ID']?>" form="form"><?php echo $row['tasks']; ?></div>
	<?php
		}
		mysqli_close($connection);
	?>
	</div>
	<div>
		<button class="button" onclick="window.location.href='index.php'">Exit</button>
		<button class="button" id="newTask" onclick="window.location.href='new_task.php'">New Task</button>
		<form method="POST" action="delete_task.php" id="form"><button class="button" name="deleteTask" type="submit">Delete</button></form>
	</div>
	</div>
</body>
</html>