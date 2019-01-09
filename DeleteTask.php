<html>
	<head>
		<title>Delete Task Page</title>
	</head>
	<body>
	<p><a href="./home.php"> Back</a></p>
	<center>
	<h1>ToDo List - Delete Task </h1>
	<h3>Select Task to Delete</h3>
	
	<?php
		include 'connection.php';
		$query = "SELECT * FROM task";
		$result = mysqli_query($connectionA,$query);
	?>
	<form action ="delete.php" method = "post">
	<select name = selected>
	<?php
		while($row = mysqli_fetch_array($result)){
            echo '<option value="'.$row['taskName'].'">'.$row['taskName'].'</option>';
		}

		echo '<input type="submit" value="Submit">';
		mysqli_close($connectionA);
	?>
	</select>
	</form>

	</center>
	
	

</body>
</html>