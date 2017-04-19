<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Document</title>
    </head>
    <body>
        <form class="" action="process.php" method="post">
            <input type="text" name="email" value="" placeholder="Email">
            <input type="submit" name="" value="Submit">
            <input type="hidden" name="action" value="insert">
        </form>
        <?php
            if(isset($_SESSION['errors'])){
                foreach ($_SESSION['errors'] as $errors) {
                    echo $errors;
                }
            }

         ?>
    </body>
</html>
