<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>
        <?php
            include 'connect.php';
            $query = "Select Count(*) a From task";
            $result = mysqli_query($connectionA,$query);
           
            while ($count = $result->fetch_assoc()){
                $res = $count['a'];
            }	
            if($res > 0){
                $query = "SELECT * FROM task";
                $result = mysqli_query($connectionA,$query);
             ?>
                 
        <select name = "selected">
        <?php
            while($row = mysqli_fetch_array($result)){
                echo '<option value="'.$row['taskName'].'">'.$row['taskName'].'</option>';
            }
            echo '<input type="submit" value="Submit">';
            mysqli_close($connectionA);
        ?>
        </select>

       <?php 
            }
            if($res == 0){
                echo "<img src='red-x12.jpg'> There are no tasks avaliable.";
			    header("Refresh: 2,url=home.php");
            } 
        ?>
    </body>
</html>

