<?php
define('DB_HOST', '');
define('DB_USER', 'root');
define('DB_PASS', 'root'); //set DB_PASS as 'root' if you're using mac
define('DB_DATABASE', ''); //make sure to set your database
//connect to database host
$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
var_dump($connection);

 ?>
