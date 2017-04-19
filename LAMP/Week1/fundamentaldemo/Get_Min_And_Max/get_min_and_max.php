<?php

function get_max_and_min($array){
    $floats = array_map('floatval', $array);
    for ($i=0; $i < count($floats); $i++)
    {
        for ($j=0; $j < count($floats) ; $j++)
        {
            if ($floats[$i]<$floats[$j])
            {
                list($floats[$i],$floats[$j]) = array($floats[$j],$floats[$i]);
            }
        }
    }
    $min_max['min']=$floats[0];
    $min_max['max']=$floats[count($floats)-1];
    return $min_max;
}


$sample = array( 135, 2.4, 2.67, 1.23, 332, 2, 1.02);
$output = get_max_and_min($sample);
var_dump($output);

 ?>
