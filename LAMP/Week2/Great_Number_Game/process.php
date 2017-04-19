<?php
session_start();
if (isset($_POST['number']))
{
    $_SESSION['rnumber'] = $_POST['rnumber'];
    if ($_POST['number']==$_SESSION['rnumber'])
    {
        $_SESSION['results'] =
        "<div class='green'>
            <h1>{$_POST['rnumber']} was the number</h1>
            <form action='process.php' method='post'>
                <input type='hidden' name='action' value='reset'>
                <input type='submit' value='Play again!'>
            </form>
        </div>";
    }
    elseif ($_POST['number']<$_SESSION['rnumber'])
    {
        $_SESSION['results'] = '<div class="yellow"><h1>Too low!</h1></div>';
    }
    elseif ($_POST['number']>$_SESSION['rnumber'])
    {
        $_SESSION['results'] = '<div class="red"><h1>Too high!</h1></div>';
    }
}

if (isset($_POST['action'])){
    $_SESSION = array();
}

header('Location: index.php');
 ?>
