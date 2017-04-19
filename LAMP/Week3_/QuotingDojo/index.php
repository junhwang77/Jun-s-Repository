<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h1>Welcome to Quoting Dojo!</h1>
        <?php
            if(isset($_SESSION['errors'])){
                foreach ($_SESSION['errors'] as $errors) {
                    echo $errors.'<br>';
                }
            }
         ?>
        <form class="" action="process.php" method="post">
            <h3>Your name:</h3>
            <input type="text" name="author" value="">
            <h3>Your quote:</h3>
            <input type="text" name="quote" value="">
            <input type="submit" name="" value="Add my quote!">
            <input type="hidden" name="action" value="add">
        </form>
        <form class="" action="main.php" method="post">
            <input type="submit" name="" value="Skip to quotes!">
            <input type="hidden" name="action" value="main">
        </form>
    </body>
</html>
