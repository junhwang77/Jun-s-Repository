<?php session_start() ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Great Number Game</title>
        <link rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <div class="container">
            <h1>Welcome to the Great Number Game!</h1>
            <h4>I am thinking of a number between 1 and 100</h4>
            <h4>Take a guess!</h4>
                <?php
                if (isset($_SESSION['results'])){
                    echo $_SESSION['results'];
                }
                ?>

            <form class="" action="process.php" method="post">
                <input type="hidden" name="rnumber" value=
                "<?php
                if (!isset($_SESSION['rnumber'])){
                    echo rand(1,100);
                }
                else{
                    echo $_SESSION['rnumber'];
                }
                ?>">
                <input type="text" name="number" value="">
                <input type="submit" name="" value="Submit">
            </form

        </div>
    </body>
</html>
