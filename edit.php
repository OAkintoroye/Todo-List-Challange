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
        include 'connect.php';
        if(!isset($_POST['selected'])){
            $taskName = '';
            $taskStatus = '';
            echo "<img src='red-x12.jpg'> There are no tasks avaliable to edit";
            header("Refresh: 2,url=home.php");
        }
        
        else{
            
            $query = "Select Count(*) a From task";
            $result = mysqli_query($connectionA,$query);
            //count the number of rows
    
            while ($count = $result->fetch_assoc()){
                $res = $count['a'];
            }
    
            if($res > 0){
                $taskName = $_POST['selected'];
                $query ="SELECT taskDate, status FROM task WHERE taskName ='$taskName'";
                $result = mysqli_query($connectionA,$query);
                
                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        $taskDate = $row['taskDate'];
                        $taskStatus = $row['status'];
                    }
                }				
                else
                    echo"Error while updating: ".mysqli_error($connectionA);
            }
            
            ?>
        <p><a href="./home.php"> Back</a></p>
        <center>
            <form action="update.php" method="post">
                <b>Task Name:</b><br/>
                <input type="text" name="name" required size=40 placeholder = <?php echo $taskName?>><br/>
                <b>Task Date:</b><br/>
                <input type="date" name="date" required><br/>
                <b>Task Status:</b><br/>
                <select name="status" id="t_status">
                    <option value="" selected hidden><?php echo $taskStatus?> </option>
                    <option value="1">Incomplete</option>
                    <option value="2">Pending</option>
                    <option value="3">Complete</option>
                </select><br/><br/>
                <input type="hidden" name="oldname" value= <?php echo $taskName?>> 
                <input type="submit" value="Confirm Task"/>
            </form>
        </center> 
    </body>
</html>
<?php
        }
?> 
