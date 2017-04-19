<?php

$heads=0;
$tails=0;
echo 'Starting the program<br>';
for ($i=1; $i <= 5000; $i++)
{
    $toss=rand(1,2);
    if ($toss==1)
    {
        ++$heads;
        echo "Attempt #{$i}: Throwing a coin... It's a head! ... Got {$heads} head(s) so far and {$tails} tail(s) so far<br>";
    }
    else
    {
        ++$tails;
        echo "Attempt #{$i}: Throwing a coin... It's a tail! ... Got {$heads} head(s) so far and {$tails} tail(s) so far<br>";
    }
}
echo 'Ending the program - Thank you!';


 ?>
