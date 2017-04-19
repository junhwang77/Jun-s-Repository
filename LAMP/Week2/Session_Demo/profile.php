<?php
session_start();

    if ( ! isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != TRUE){
        header('location: login.php');
    }
    else{
        if ($_SESSION['id'] == 1) {
            echo "Shaun";
        }
        if ($_SESSION['id'] == 2) {
            echo "Jun";
        }
    }
 ?>

<h1>Profile</h1>
