<html>
	<body>
	<?php
		$name = $_POST['name'];
		$date = $_POST['date'];
		//create connection
		$connectionA = new mysqli("localhost","root","");
		// Check connection
		if ($connectionA->connect_error) {
			die("Connection failed: " . $connectionA->connect_error);
		} 
		//connect to database
		mysqli_select_db($connectionA,'todolist');
		//query returns name of duplicated task name
		$query = "SELECT taskName a FROM task WHERE EXISTS(SELECT taskName FROM task WHERE taskName ='$name')";
		$result = mysqli_query($connectionA,$query);
		
		$match = false;
		while ($taskexists = $result->fetch_assoc()){
			if ($taskexists['a'] == $name){
				$match = true;
				echo "<img src='red-x12.jpg'> This task name exists. Please select a different name";
				header("Refresh: 2, url=home.php");
			}		
		}
		
		if ($match == false){
			$sql = "INSERT INTO task(taskName,taskDate,status) VALUES('$name','$date','Incomplete')";
			if ($connectionA->query($sql) == FALSE) {
				echo "Error inserting data: " . $connectionA->error;
				}
			header("Refresh: 0, url=home.php");
		}
		
	?>
	
</body>
</html>