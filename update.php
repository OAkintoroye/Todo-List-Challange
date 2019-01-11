<?php 
    include 'connect.php';
    $taskName = $_POST['name'];
    $oldName = $_POST['oldname'];
    $taskDate = $_POST['date'];
    $taskStatus = $_POST['status'];

    switch($taskStatus){
        case 1:
            $taskStatus = "Incomplete";
            break;
        case 2:
            $taskStatus = "Pending";
            break;
        case 3:
            $taskStatus="Complete";
            break;
        default:
            $taskStatus = "Incomplete";
        
    }


    //check if taskName data inputted by user has been entered already
    //query returns name of duplicated task name
    $query = "SELECT taskName a FROM task WHERE EXISTS(SELECT taskName FROM task WHERE taskName ='$oldName')";
    $result = mysqli_query($connectionA,$query);
    $match = false;
    while ($taskexists = $result->fetch_assoc()){
        if ($taskexists['a'] == $taskName){
            $match = true;
            echo "<img src='red-x12.jpg'> This task name exists. Please select a different name";
            header("Refresh: 2, url=home.php");
        }	
    }

    if($match == false){
        $query = "UPDATE task SET taskName = '$taskName',taskdate = '$taskDate', status = '$taskStatus' WHERE taskName = '$oldName'";
        if ($connectionA->query($query) == FALSE) {
            echo "Error Updating data: " . $connectionA->error;
        }
         header("Refresh: 0, url=home.php");
    }
   
?>
