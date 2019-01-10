<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>
        <?php

            include 'connection.php';
            $query = "SELECT * FROM task";
            $result = mysqli_query($connectionA,$query);
        ?>

        <select name = selected>

        <?php
            while($row = mysqli_fetch_array($result)){
                echo '<option value="'.$row['taskName'].'">'.$row['taskName'].'</option>';
            }

            echo '<input type="submit" value="Submit">';
            mysqli_close($connectionA);
        ?>
        
        </select>
    </body>
</html>

