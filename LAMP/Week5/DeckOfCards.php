<?php
/**
 *
 */
class Card
{

    public function __construct($value)
    {
        $this->value= $value;
        $this->next = null;
    }
}
/**
 *
 */
class Deck
{
    public function __construct()
    {
        $this->head = null;
        for ($suite=1; $suite < 5; $suite++)
        {
            for ($val=1; $val < 14; $val++)
            {
                if ($this->head == null)
                {
                    $this->head = new Card($suite.'-'.$val);
                }
                else
                {
                    $current = $this->head;
                    while($current->next)
                    {
                        $current = $current->next;
                    }
                    $current->next = new Card($suite.'-'.$val);
                }
            }
        }
    }
    public function shuffle()
    {
        for ($i=1; $i < 1000; $i++)
        {
            $s = rand(1,4);
            $n = rand(1,13);
            $card = $s.'-'.$n;
            if ($this->head->value == $card)
            {
                $this->head = $this->head->next;
            }
            else
            {
                $current = $this->head;
                while ($current->next->value != $card && $current->next)
                {
                    $current = $current->next;
                }
                $temp = $current->next->next;
                $current->next = $temp;
            }
            //remake the removed card and add at the end of the deck
            $current = $this->head;
            while ($current->next)
            {
                $current = $current->next;
            }
            $current->next = new Card($card);
        }
    }
    public function reset()
    {
        //remove all cards
        for ($suite=1; $suite < 5; $suite++)
        {
            for ($val=1; $val < 14; $val++)
            {
                $card = $suite.'-'.$val;
                if ($this->head->value == $card)
                {
                    $this->head = $this->head->next;
                }
                else
                {
                    $current = $this->head;
                    while ($current->next->value != $card && $current->next)
                    {
                        $current = $current->next;
                    }
                    $temp = $current->next->next;
                    $current->next = $temp;
                }
            }
        }
        //re-add all the cards
        self::__construct();
    }
    public function deal($number)
    {
        $current = $this->head;
        for ($i=1; $i < $number; $i++)
        {
            $current = $current->next;
        }
        $temp = $current->next;
        $current->next = null;
        echo '<pre>';
        print_r($this);
        echo'</pre>';
        $this->head = $temp;
    }
}
/**
 *
 */
class Player extends Deck
{
    public $name;
    public $hand;
    public function __construct($name)
    {
        parent::__construct();
        $this->$name=$name;
    }
    public function Draw($number)
    {
        parent::deal($number);
    }
    public function Discard()
    {
        
    }
}


// $deck1 = new Deck();
// $deck1->shuffle();
// $deck1->deal(2);

$player = new Player('Alan');
$player->Draw(4);

// echo '<pre>';
// print_r($deck1);
// echo'</pre>';

 ?>
