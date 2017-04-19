<?php
class Bike {
    public $price;
    public $max_speed;
    public $miles;

    public function __construct($dollars, $mph) {
        $this->price = $dollars;
        $this->max_speed = $mph;
        $this->miles = 0;
    }
    public function displayInfo() {
        echo 'Price:'.$this->price.'<br />';
        echo 'Max Speed:'.$this->max_speed.'<br />';
        echo 'Miles Driven: '.$this->miles.'<br />';
    }
    public function drive() {
        echo 'Driving...<br />';
        $this->miles += 10;
        return $this;
    }
    public function reverse() {
        echo 'Reversing...<br />';
        $this->miles -= 5;
        if ($this->miles < 0) {
            $this->miles = 0;
        }
        return $this;
    }
}

$bike1 = new Bike(100, 85);
$bike1->drive()->drive()->drive()->reverse()->displayInfo();

$bike2 = new Bike(400, 55);
$bike2->drive()->drive()->reverse()->reverse()->displayInfo();

$bike3 = new Bike(1200, 77);
$bike3->reverse()->reverse()->reverse()->displayInfo();
 ?>
