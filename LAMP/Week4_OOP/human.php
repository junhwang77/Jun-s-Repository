<?php
class Human {
    public $health;
    public $name;
    public $clan;
    public $strength = 3;
    public $intelligence = 3;
    public $stealth = 3;
    public function __construct() {
        echo "I am alive";
        $this->health = 100;
    }
    public function __get($property){
        if (property_exists($this, $property)) {
            return $this->property;
        }
    }
    public function __set($property, $value){
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
        return $this;
    }
    public function trashTalk(){
        echo "You want a piece of me?";
    }
    public function attack($human){
        $this->trashTalk();
        $luck = rand(0,100);
        if ($luck * $this->$intelligence > 1000) {
            if ($luck > $human->stealth) {
                $human->health -= $this->strength;
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }
    public function get_health(){
        return $this->health;
    }
    public function set_health($health){
        $this->health = $health;
    }
}
/**
 *
 */
class Wizard extends Human
{
    public function __construct()
    {
        parent::__construct();
        $this->clan = "Wizard";
        $this->strength = 5;
        $this->intelligence = 40;
        $this->stealth = 5;
    }
    public function heal()
    {
        $this->health += 10;
    }
    public function trashTalk()
    {
        echo "Happiness can be found even in the darkest of times";
    }
    public function attack($human)
    {
        parent::attack($human);
        $this->heal();
    }
}

class Ninja extends Human
{
    public function steal()
    {
        $this->stealth += 5;
    }
    public function trashTalk()
    {
        echo "Now you see me...";
    }
    public function attack($human)
    {
        parent::attack($human);
        $this->steal();
    }
}

class Samurai extends Human
{
    public function sacrifice()
    {
        $this->health -= 5;
        $this->strength += 10;
    }
    public function trashTalk()
    {
        echo "The flower that blooms in adversity is the most beautiful of all";
    }
    public function attack($human)
    {
        parent::attack($human);
        $this->sacrifice();
    }
}

$ron = new Wizard();
$sasuke = new Ninja();
$kenshen = new Samurai();

echo $ron->health;
$ron->heal();
$ron->trashTalk();
echo $ron->health;

 ?>
