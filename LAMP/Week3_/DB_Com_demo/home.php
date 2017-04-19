<?php
    require("new-connection.php");
    $query = "INSERT INTO people(first_name, last_name)
              VALUES('Jun', 'Alan')";
    $insertPerson = run_mysql_query($query);
    var_dump($insertPerson);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Document</title>
    </head>
    <body>
        <?php
         ?>
    </body>
</html>
