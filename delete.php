<?php
	include 'connect.php';
		
	$query = "Select Count(*) a From task";
	$result = mysqli_query($connectionA,$query);
	//count the number of rows
		
	while ($count = $result->fetch_assoc()){
		$res = $count['a'];
	}	
	if($res > 0){
		
		$selectedTN = $_POST['selected'];
		$query = "DELETE FROM task WHERE taskName ='$selectedTN'";
		if(mysqli_query($connectionA,$query)){
				//echo "Deletion Successful";
			header("Refresh: 0, url=home.php");
		}				
		else
			echo"Error while updating: ".mysqli_error($connectionA);
		}
	else{
			echo "<img src='red-x12.jpg'> There are no tasks avaliable to delete";
			header("Refresh: 2,url=home.php");
		}

		mysqli_close($connectionA);
	?>