<?php
/**
 *
 */
class Node
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
class SinglyLinkedList
{

    public function __construct()
    {
        $this->head = null;
    }
    public function add($val)
    {
        if ($this->head == null)
        {
            $this->head = new Node($val);
        }
        else
        {
            $current = $this->head;
            while ($current->next)
            {
                $current = $current->next;
            }
            $current->next = new Node($val);
        }
    }
    public function remove($val)
    {
        if ($this->head->value == $val)
        {
            $this->head = $this->head->next;
        }
        else
        {
            $current = $this->head;
            while($current->next->value != $val && $current->next)
            {
                $current = $current->next;
            }
            $temp = $current->next->next;
            $current->next = $temp;
        }
    }
    public function find($val)
    {
        $current = $this->head;
        while($current != null)
        {
            if ($current->value == $val)
            {
                return true;
            }
            $current = $current->next;
        }
        return false;
    }
    public function printValues()
    {
        $current = $this->head;
        while($current)
        {
            echo $current->value . '<br />';
            $current = $current->next;
        }
    }
}



$newList2 = new SinglyLinkedList();
$newList2->add(1);
$newList2->add(2);
$newList2->add(3);
$newList2->add(4);
$newList2->add(5);

echo '<pre>';
print_r($newList2);
echo '</pre>';

// $newList2->head->next->next->next->next = null;
//
// echo '<pre>';
// print_r($newList2);
// echo '</pre>';
//
// $temp = $newList2->head->next->next->next;
// var_dump($temp);
//
// $newList2->head->next->next = $temp;
//
// echo '<pre>';
// print_r($newList2);
// echo '</pre>';
//
// $newList2->remove(1);
// $newList2->remove(3);
// $newList2->remove(5);
//
// echo '<pre>';
// print_r($newList2);
// echo '</pre>';

// echo '<pre>';
// var_dump($newList2->find(3));
// echo '</pre>';
//
//
// echo '<pre>';
// var_dump($newList2->find(99));
// echo '</pre>';

$newList2->printValues();

 ?>
