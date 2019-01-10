<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Task</title>
</head>
<body>   
    <?php 
        include 'connection.php';
        $taskName = $_POST['selected'];

        $query ="SELECT taskDate, status FROM task WHERE taskName ='$taskName'";
        $result = mysqli_query($connectionA,$query);
        
		if($result){
            while($row = mysqli_fetch_assoc($result)){
                $taskDate = $row['taskDate'];
                $taskStatus = $row['status'];
            }
            echo $taskDate;
            echo $taskStatus;
		}				
		else
            echo"Error while updating: ".mysqli_error($connectionA);
    
    ?> 
        <form action="" method="post">
		<b>Task Name:</b><br/>
		<input type="text" name="name" required size=40 placeholder = <?php echo $taskName?>><br/>
		<b>Task Date:</b><br/>
		<input type="date" name="date" required placeholder = <?php echo $taskDate?>><br/>
		<b>Task Status:</b><br/>
		<select name="status" id="t_status">
            <option value="" selected hidden><?php echo $taskStatus?> </option>
            <option value="1">Incomplete</option>
			<option value="2">Pending</option>
			<option value="3">Complete</option>
		</select><br/><br/>
		<input type="submit" value="Confirm Task"/>
		</form>
    

</body>
</html>