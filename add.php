<html>
	<body>
	<?php
		include 'connection.php';
		
		$name = $_POST['name'];
		$date = $_POST['date'];
		$status = $_POST['status'];

		switch($status){
			case 1:
				$status = "Incomplete";
				break;
			case 2:
				$status = "Pending";
				break;
			case 3:
				$status="Complete";
				break;
			default:
				$status = "Incomplete";
			
		}
		
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
			//TODO: if same day as current date, it should not make status Past Due Date
			if($date < date("Y-m-d"))
				$sql = "INSERT INTO task(taskName,taskDate,status) VALUES('$name','$date','Past Due Date')";
			else

				$sql = "INSERT INTO task(taskName,taskDate,status) VALUES('$name','$date','$status')";
			if ($connectionA->query($sql) == FALSE) {
				echo "Error inserting data: " . $connectionA->error;
				}
			header("Refresh: 0, url=home.php");
		}
		
	?>
	
</body>
</html>