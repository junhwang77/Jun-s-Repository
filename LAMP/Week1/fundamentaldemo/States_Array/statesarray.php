<?php

$states = array('CA', 'WA', 'VA', 'UT', 'AZ');

echo '<select class="" name="">';
for ($i=0; $i < count($states); $i++)
{
    echo '<option value="">'.$states[$i].'</option>';
}
echo '</select><br>';

echo '<select class="" name="">';
foreach ($states as $state)
{
    echo '<option value="">'.$state.'</option>';
}
echo '</select>';

array_push($states, 'NJ', 'NY', 'DE');
var_dump($states);

echo '<select class="" name="">';
foreach ($states as $state)
{
    echo '<option value="">'.$state.'</option>';
}
echo '</select>';

?>
