<?php
/**
 *
 */
class MyFirstClass
{
    public $my_property = 'default value';

    public function __construct($instance){
        echo "I am getting called for object: ".$instance;
    }
    public function get_my_property(){
        return $this->print_hello().' '.$this->my_property;
    }
    public function set_my_property($value){
        $this->my_property = $value;
    }
    public function print_hello(){
        return 'Hello';
    }
}

$obj = new MyFirstClass('instance one');
echo $obj->get_my_property().'<br>';
$obj->set_my_property('obj 1 property value');
echo $obj->get_my_property().'<br>';

$obj2 = new MyFirstClass('instance two');
echo $obj2->get_my_property().'<br />';
$obj2->set_my_property('obj 2 property value');
echo $obj2->get_my_property().'<br />';
 ?>
