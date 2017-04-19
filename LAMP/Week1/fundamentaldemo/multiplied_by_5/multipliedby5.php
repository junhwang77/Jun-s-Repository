<?php

// $A = array(2,4,10,16);
// function multiply_by_5($arr)
// {
//     $times5 = array();
//     for ($i=0; $i < count($arr); $i++)
//     {
//         $times5[] = $arr[$i]*5;
//     }
//     return $times5;
// }
//
//
// $B = multiply_by_5($A);
// var_dump($B); // [10,20,50,80]


$A = array(2,4,10,16);
function multiply_by_5($arr, $int)
{
    $times5 = array();
    for ($i=0; $i < count($arr); $i++)
    {
        $arr[$i] = $arr[$i]*$int;
    }
    return $arr;
}


$B = multiply_by_5($A, 6);
var_dump($B);

 ?>
