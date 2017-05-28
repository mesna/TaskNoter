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
	<div class="task"><?php echo "Hello! ".$login_session; ?></div>
	<div class="tasks">
	<?php
		while ($row = mysqli_fetch_array($task_sql)) {
	?>
	<div class="task"><input name="checkbox[]" type="checkbox" value="<?php echo $row['ID']?>" form="form"><?php echo $row['tasks']; ?></div>
	<?php
		}
		mysqli_close($connection);
	?>
	</div>
	<div>
		<button class="button" onclick="window.location.href='new_task.php'">New Task</button>	
		<button class="button" name="deleteTask" type="submit" form="form">Delete</button>
		<button style="float:right;"class="button" onclick="window.location.href='index.php'">Exit</button>
	</div>
	</div>
	<form method="POST" action="delete_task.php" id="form"></form>
</body>
</html>