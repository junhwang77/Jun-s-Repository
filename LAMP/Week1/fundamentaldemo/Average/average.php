<?php
$all_num = array(1, 2, 5, 10, 255, 3);
$sum = 0;
foreach ($all_num as $num)
{
    $sum+=$num;
}
$avg = $sum/count($all_num);
echo $sum.'/'.count($all_num).'='.$avg;
 ?>
