<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>To Do List</title>
		</head>
	<body>	
		<?php
			//create connection
			$connectionA = new mysqli("localhost","root","");
			// Check connection
			if ($connectionA->connect_error){
				die("Connection failed: " . $connectionA->connect_error);
			}
			$sql = "CREATE DATABASE IF NOT EXISTS todolist";
			if ($connectionA->query($sql) == FALSE) {
				echo "Error creating database: " . $connectionA->error;
			}
			//connect to database
			mysqli_select_db($connectionA,'todolist');
				
			//create table with three columns
			$sql = "CREATE TABLE IF NOT EXISTS Task(
			taskName VARCHAR(40) NOT NULL,
			taskDate VARCHAR(40) NOT NULL,
			status VARCHAR(40) NOT NULL
			)";
			if ($connectionA->query($sql) == FALSE) {
				echo "Error creating table: " . $connectionA->error;
			}
					
		?>
		<center><h1>ToDo List </h1>

		<table style="width:25%">
		<tr>

		<th>Task Name</th>
		<th>Status</th>
		<th>Date</th>
		<th></th>
		</tr>

		<?php
			
			mysqli_select_db($connectionA,'todolist');
				
			$query = "SELECT * FROM task";
			$result = mysqli_query($connectionA,$query);
			
			while($row = mysqli_fetch_array($result)){
					echo "<form action='DeleteTask.php' method='post'>";
					echo "<tr>";
					echo"<td>".$row['taskName']."</td>";
					echo"<td>".$row['status']."</td>";
					echo"<td>".$row['taskDate']."</td>";
					echo "</tr>";
					echo"</form>";
			}

			mysqli_close($connectionA);

		?>

		</table>
		<button type="button" onclick="location.href = 'AddTask.html';">Add Task</button>
		<button type="button" onclick="location.href = 'DeleteTask.php';">Delete Task</button>
		<button type="button" onclick="location.href = 'EditTask.php';">Edit Task</button>

		</center>


	</body>
</html>