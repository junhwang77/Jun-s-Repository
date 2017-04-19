<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Time Display</title>
        <style media="screen">
            .time {
                border: black 2px solid;
                display: inline-block;
                padding: 20px;
            }
            body {
                text-align: center;
            }
            p {
                border: black 2px solid;
                display: inline-block;               
            }
        </style>
    </head>
    <body>
        <div class="title">
            <p>The current time and date:</p>
        </div>
        <div class="time">
            <h1><?= $date ?></h1>
            <h1><?= $time ?></h1>
        </div>
    </body>
</html>
