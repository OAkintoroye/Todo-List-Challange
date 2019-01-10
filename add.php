<html>
	<body>
	<?php
		include 'connection.php';
		
		$taskName = $_POST['name'];
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
				break;
			
		}
		
		//query returns name of duplicated task name
		$query = "SELECT taskName a FROM task WHERE EXISTS(SELECT taskName FROM task WHERE taskName ='$taskName')";
		$result = mysqli_query($connectionA,$query);
		
		$match = false;
		while ($taskexists = $result->fetch_assoc()){
			if ($taskexists['a'] == $taskName){
				$match = true;
				echo "<img src='red-x12.jpg'> This task name exists. Please select a different name";
				header("Refresh: 2, url=home.php");
		}		
	}

		if ($match == false){
			//use strtotime to make sure both dates have the same format
			date_default_timezone_set('America/Detroit');
			if(strtotime($date) < strtotime(date("Y-m-d")))
				$sql = "INSERT INTO task(taskName,taskDate,status) VALUES('$taskName','$date','Past Due Date')";
			else
				$sql = "INSERT INTO task(taskName,taskDate,status) VALUES('$taskName','$date','$status')";

			if ($connectionA->query($sql) == FALSE) {
				echo "Error inserting data: " . $connectionA->error;
				}
			header("Refresh: 0, url=home.php");
		}
		
	?>
	
</body>
</html>