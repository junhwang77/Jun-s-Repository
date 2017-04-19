<?php
    session_start();

    $sum = $_POST['x'] + $_POST['y'];

    $_SESSION['sum'] = $sum;

    header('Location: index.php');

 ?>
