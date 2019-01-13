<!DOCTYPE html>
<html lang="en">
		<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Delete Task Page</title>
	</head>
	<body>
	<p><a href="./home.php"> Back</a></p>
	<center>
	<h1>ToDo List - Delete Task </h1>
	<h3>Select Task to Delete</h3>
	
	<form action ="delete.php" method = "post">
	<?php include 'list.php'; ?>
	</form>

	</center>

</body>
</html>