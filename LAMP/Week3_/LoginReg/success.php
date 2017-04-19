<?php
    session_start();
    require_once('new-connection.php');
 ?>
 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8">
         <title>Success!</title>
     </head>
     <body>
         <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
            }
            $query = "SELECT users.email FROM users";
            $accounts=$connection->query($query);
            var_dump($accounts);
          ?>

     </body>
 </html>
