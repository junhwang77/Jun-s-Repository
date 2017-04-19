<?php

$users = array('first_name' => 'Jun', 'last_name' => 'Hwang');

function display_array($array)
{
    echo 'There are 2 keys in this array:<br>';
    foreach ($array as $key => $value)
    {
        echo $key.'<br>';
    }
    foreach ($array as $key => $value)
    {
        echo "The value in the key '{$key}' is '{$value}'.<br>";
    }
}

display_array($users);

 ?>
