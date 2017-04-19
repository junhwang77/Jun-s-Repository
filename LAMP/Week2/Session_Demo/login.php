<?php
session_start();
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == TRUE)
    {
        header('location: home.php');
    }
    else
    {
        $_SESSION['logged_in'] = TRUE;
        $_SESSION['id'] = 1;
    }
 ?>

<h1>Login</h1>
