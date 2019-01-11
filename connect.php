<?php
    //create connection
	$connectionA = new mysqli("localhost","root","");
	// Check connection
	if ($connectionA->connect_error) {
		die("Connection failed: " . $connectionA->connect_error);
	} 
	//connect to database
	mysqli_select_db($connectionA,'todolist');

?>   
        