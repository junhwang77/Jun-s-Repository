<?php

function print_lists($array)
{
    echo '<ul>';
    for ($i=0; $i < count($array); $i++)
    {
        echo '<li>'.$array[$i].'</li>';
    }
    echo '</ul>';
}

$arr = array(1,3,'hello');
print_lists($arr);

 ?>
