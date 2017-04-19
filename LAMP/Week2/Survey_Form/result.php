<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php var_dump($_POST); ?>
        <h1>Submitted Information</h1>
        <p>Name: <?= $_POST['name'] ?></p>
        <p>Dojo Location: <?= $_POST['location'] ?></p>
        <p>Favorite Language: <?= $_POST['language'] ?></p>
        <p>Comment: <?= $_POST['comment'] ?></p>
        <a href="/"><button type="button" name="button">Go Back</button></a>
    </body>
</html>
