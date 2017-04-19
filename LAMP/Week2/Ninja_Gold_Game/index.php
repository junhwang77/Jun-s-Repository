<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ninja Gold Game</title>
        <link rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <h3>Your Gold: <div class="counter"><?php
            if (!isset($_SESSION['counter'])) {
                echo 0;
            }
            else {
                echo $_SESSION['counter'];
            }
        ?></div> </h3>
        <div class="place">
            <h2>Farm</h2>
            <h4>(earns 10-20 golds)</h4>
            <form class="" action="process.php" method="post">
                <input type="hidden" name="area" value="farm">
                <input type="submit" name="" value="Find Gold!">
            </form>
        </div>
        <div class="place">
            <h2>Cave</h2>
            <h4>(earns 5-10 golds)</h4>
            <form class="" action="process.php" method="post">
                <input type="hidden" name="area" value="cave">
                <input type="submit" name="" value="Find Gold!">
            </form>
        </div>
        <div class="place">
            <h2>House</h2>
            <h4>(earns 2-5 golds)</h4>
            <form class="fgold" action="process.php" method="post">
                <input type="hidden" name="area" value="house">
                <input type="submit" name="" value="Find Gold!">
            </form>
        </div>
        <div class="place">
            <h2>Casino!</h2>
            <h4>(earns/takes 0-50 golds)</h4>
            <form class="fgold" action="process.php" method="post">
                <input type="hidden" name="area" value="casino">
                <input type="submit" name="" value="Find Gold!">
            </form>
        </div>
        <p>Activities:</p>
        <div class="activity">
            <?php if (isset($_SESSION['log']))
            {
                foreach ($_SESSION['log'] as $key)
                {
                    $log[] = $key;
                }
                foreach ($log as $l) {
                    echo $l;
                }
            }
            ?>
        </div>
        <form class="" action="process.php" method="post">
            <input type="hidden" name="reset" value="reset">
            <input type="submit" name="" value="Reset">
        </form>
    </body>
</html>
