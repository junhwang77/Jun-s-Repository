<?php
/**
 *
 */
class Car
{
    public $price;
    public $speed;
    public $fuel;
    public $milage;
    function __construct($cost, $mph, $gas_level, $odo) {
        $this->price=$cost;
        $this->speed=$mph;
        $this->fuel=$gas_level;
        $this->milage=$odo;
        return $this->Display_all();
    }
    function Display_all(){
        if ($this->price > 10000) {
            $tax = 0.15;
        }
        else {
            $tax = 0.12;
        }
        echo 'Price: '.$this->price.'<br />'.
             'Speed: '.$this->speed.'mph<br />'.
             'Fuel: '.$this->fuel.'<br />'.
             'Milage: '.$this->milage.'mpg<br />'.
             'Tax: '.$tax.'<br /><hr />';
    }
}
$car1 = new Car(2000, 35, 'Full', 15);
$car2 = new Car(2000, 5, 'Not Full', 105);
$car3 = new Car(2000, 15, 'Kind of Full', 95);
$car4 = new Car(2000, 25, 'Full', 25);
$car5 = new Car(2000, 45, 'Empty', 25);
$car6 = new Car(20000000, 35, 'Empty', 15);


 ?>
