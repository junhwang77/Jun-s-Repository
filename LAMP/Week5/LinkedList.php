<?php

/**
 *
 */
class Node
{

    public function __construct($val)
    {
        $this->value = $val;
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
        $this->tail = null;
    }
}



$list = new SinglyLinkedList();
$list->head = new Node('Alice');
$list->head->next = new Node('Chad');
$list->head->next->next = new Node('Debra');

echo '<pre>';
print_r($list);
echo'</pre>';
 ?>
