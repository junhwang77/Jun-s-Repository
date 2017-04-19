<?php
session_start();
date_default_timezone_set('America/Los_Angeles');
$date = date('m/d/Y h:i:s a', time());
if (!isset($_SESSION['counter']))
{
    $_SESSION['counter']=0;
}
if (!empty($_POST['area']))
{
    if ($_POST['area']=='farm')
    {
        $gold = rand(10,20);
    }
    elseif ($_POST['area']=='cave')
    {
        $gold = rand(5,10);
    }
    elseif ($_POST['area']=='house')
    {
        $gold = rand(2,5);
    }
    elseif ($_POST['area']=='casino')
    {
        $gold = rand(-50,50);
    }
    if ($gold>0) {
         $log[] = "<p>You entered a {$_POST['area']} and earned {$gold} golds. ({$date})</p><br>";
    }
    else {
         $log[] = "<p>You entered a {$_POST['area']} and lost {$gold} golds... Ouch... ({$date})</p><br>";
    }
    $_SESSION['counter'] = $gold + $_SESSION['counter'];
    $_SESSION['log'] = $log;
}

if (isset($_POST['reset']) && $_POST['reset']=='reset')
{
    session_destroy();
}

header('Location: index.php');
 ?>
