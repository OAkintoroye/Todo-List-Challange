<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Edit Task</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="main.js"></script>
    </head>
    <body>

        <p><a href="./home.php"> Back</a></p>
        <?php 
            include 'connect.php';
        ?>
        <center>
            <h1>ToDo List - Edit Task </h1>
            <h3>Select Task to Edit</h3>
            
            <form action ="edit.php" method = "post">
            <?php include 'list.php'; ?>
            </form>
        </center>
            
    </body>
</html>