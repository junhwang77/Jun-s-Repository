<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Submitted Information</title>
        <style media="screen">
            body {
                text-align: center;
            }
            .container {
                border: black 2px solid;
                display: inline-block;
                padding: 10px;
            }
            h4 {
                text-decoration: underline;
            }
            .label {
                text-align: left;
                display: inline-block;
            }
            .results {
                text-align: right;
                display: inline-block;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="message">
                <p> You have submitted this form <?= $counter ?> times!</p>
            </div>
            <div class="label">
                <h4>Submitted Information</h4>
                <p>Name:</p>
                <p>Dojo Location:</p>
                <p>Favorite Language:</p>
                <p>Comment:</p>
            </div>
            <div class="results">
                <p><?= $name ?></p>
                <p><?= $location ?></p>
                <p><?= $language ?></p>
                <p><?= $comment ?></p>
            </div>
            <form class="" action="/" method="post">
                <input type="submit" name="" value="Go Back">
            </form>
        </div>
    </body>
</html>
