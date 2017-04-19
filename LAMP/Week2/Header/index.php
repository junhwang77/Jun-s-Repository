<?php session_start() ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form class="" action="process.php" method="post">
            <input type="text" name="x" value="">
            <input type="text" name="y" value="">
            <input type="submit" name="" value="submit">
        </form>
        <?php
        if (isset($_SESSION['sum'])):
            echo $_SESSION['sum'];
        ?>

        <?php endif; ?>
    </body>
</html>
