<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Checkerboard</title>
        <link rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <div class="container">
        <?php
        for ($k=1; $k <=8 ; $k++) {
            if ($k%2==0) {
                for ($i=1; $i <= 8; $i++) {
                    if ($i%2==0){
                        echo '<div class="red"></div>';
                    }
                    else {
                        echo '<div class="orange"></div>';
                    }
                }
            }
            else {
                for ($j=1; $j <= 8; $j++) {
                    if ($j%2==0) {
                        echo '<div class="orange"></div>';
                    }
                    else {
                        echo '<div class="red"></div>';
                    }
                }
            }
        }
         ?>
        </div>
    </body>
</html>
