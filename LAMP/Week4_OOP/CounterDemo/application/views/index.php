<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Counter Demo</title>
        <style type="text/css">

            body{
                text-align: center;
            }
            .board{
                font-size: 24px;
                padding: 20px;
                border:1px solid silver;
                width: 50px;
                margin: 15px auto;
            }
        </style>
    </head>
    <body>
        <p>You visited the site <div class="board">
            <?= $counter ?>
        </div>times</p>

        <a href="/welcome/reset"><button type="button" name="button">Reset</button></a>
    </body>
</html>
