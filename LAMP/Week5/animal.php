<?php
/**
 *
 */
class Animal
{
    public $name;
    public $health;
    public function __construct($species)
    {
        $this->name = $species;
        $this->health = 100;
    }
    public function walk()
    {
        echo 'walking...';
        $this->health -= 1;
        return $this;
    }
    public function run()
    {
        echo 'running!...';
        $this->health -= 5;
        return $this;
    }
    public function displayHealth()
    {
        echo '<br />Name: '.$this->name.'<br />'.
             'Health: '.$this->health.'<br />';
        return $this;
    }
}

/**
 *
 */
class Dog extends Animal
{
    public function __construct($breed)
    {
        $this->name = $breed;
        $this->health = 150;
    }
    public function pet()
    {
        $this->health += 5;
        return $this;
    }
}
/**
 *
 */
class Dragon extends Animal
{
    public function __construct($breed)
    {
        $this->name = $breed;
        $this->health = 170;
    }
    public function fly()
    {
        $this->health -= 10;
        return $this;
    }
    public function displayHealth()
    {
        echo '<br />this is a dragon!';
        parent::displayHealth();
    }
}


$animal = new Animal('animal');
$animal->walk()->walk()->walk()->run()->run()->displayHealth();

// $animal->fly();
// $animal->pet();

$dog = new Dog('German Shepherd');
$dog->walk()->walk()->walk()->run()->run()->pet()->displayHealth();

$dragon = new Dragon('Chinese Dragon');
$dragon->walk()->walk()->walk()->run()->run()->fly()->fly()->displayHealth();
 ?>
