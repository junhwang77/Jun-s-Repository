<?php
$odd = array();
for ($i=0; $i < 20000; $i++)
{
    if($i%2==1)
    {
        $odd[]=$i;
    }
}
var_dump($odd);
 ?>
