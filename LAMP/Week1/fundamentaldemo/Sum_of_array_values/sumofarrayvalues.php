<?php
$values = array(1, 2, 5, 10, 255, 3);
echo array_sum($values).'<br>';

//more comprehensive way to write the code that does the same work:
$sum=0;
foreach ($values as $val)
{
    $sum += $val;
}
echo $sum;

 ?>
