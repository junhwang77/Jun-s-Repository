<?php
// this is a comment for my php
echo 'top of file';
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP Test</title>
    </head>
    <style media="screen">
        .header{
            color:red;
        }
    </style>
    <body>
        <h1 class="<?php echo 'header'; ?>"><?php echo 'hello coding dojo students'; ?></h1>
    </body>
</html>
<?php
echo 'bottom of file <br>';
echo 'welcome';
 ?>
