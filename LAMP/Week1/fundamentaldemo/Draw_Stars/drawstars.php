<?php

// function stars($array)
// {
//     for ($i=0; $i < count($array); $i++)
//     {
//         for ($j=0; $j < $array[$i]; $j++)
//         {
//             echo '*';
//         }
//         echo '<br>';
//     }
// }
// $x = array(4, 6, 1, 3, 5, 7, 25);
//
// stars($x);


function display($array)
{
    for ($i=0; $i < count($array); $i++)
    {
        if (is_numeric($array[$i]))
        {
            for ($j=0; $j < $array[$i]; $j++)
            {
                echo '*';
            }
            echo '<br>';
        }
        else
        {
            for ($j=0; $j < strlen($array[$i]); $j++)
            {
                echo strtolower($array[$i][0]);
            }
            echo'<br>';
        }
    }
}
$y = array(4, "Tom", 1, "Michael", 5, 7, "Jimmy Smith");

display($y);
 ?>
