<?php 
include 'connection.php';
$taskName = $_POST['name'];
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



$query = "UPDATE task SET taskName = '$taskName',taskdate = '$taskDate', status = '$taskStatus' WHERE taskName = '$taskName'";
if ($connectionA->query($query) == FALSE) {
    echo "Error Updating data: " . $connectionA->error;
    }
header("Refresh: 0, url=home.php");
?>
