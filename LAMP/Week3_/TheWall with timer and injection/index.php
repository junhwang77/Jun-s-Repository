<?php
    session_start();
 ?>
 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8">
         <title>Login Registration</title>
     </head>
     <body>
         <?php
            if (isset($_SESSION['errors'])) {
                foreach ($_SESSION['errors'] as $error) {
                    echo $error . '<br>';
                }
                unset($_SESSION['errors']);
            }
          ?>
         <h3>Registration:</h3>
         <form class="" action="process.php" method="post">
             <p>First Name:</p>
             <input type="text" name="first_name" value="">
             <p>Last Name:</p>
             <input type="text" name="last_name" value="">
             <p>Email:</p>
             <input type="text" name="email" value="">
             <p>Password:</p>
             <input type="password" name="password" value="">
             <p>Confirm Password:</p>
             <input type="password" name="conf_pass" value="">
             <input type="submit" name="" value="Register">
             <input type="hidden" name="action" value="register">
         </form>
         <h3>Login:</h3>
         <form class="" action="process.php" method="post">
             <p>Email:</p>
             <input type="text" name="email" value="">
             <p>Password:</p>
             <input type="password" name="password" value="">
             <input type="submit" name="" value="Login">
             <input type="hidden" name="action" value="login">
         </form>
     </body>
 </html>
