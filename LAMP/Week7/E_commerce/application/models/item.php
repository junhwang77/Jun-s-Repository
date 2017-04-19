<?php
class Item extends CI_Model {
    function get_all_items()
    {
        return $this->db->query("SELECT * FROM items")->result_array();
    }
    function get_item_by_id($id)
    {
        return $this->db->query("SELECT * FROM items WHERE id = ?", array($id))->row_array();
    }
    function add_item($item)
    {
        $query = "INSERT INTO items (name, price, created_at, updated_at) VALUES(?,?,?,?)";
        $values = array($item['name'], $item['price'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
        return $this->db->query($query, $values);
    }
    // function edit_user($user)
    // {
    //     $date = date("Y-m-d, H:i:s");
    //     $query = "UPDATE products SET name = ?, description = ?, price = ?, updated_at = ? WHERE id = ?";
    //     $set = array($product['name'], $product['description'], $product['price'], date("Y-m-d, H:i:s"), $product['id']);
    //     return $this->db->query($query, $set);
    // }
    function remove_user($id)
    {
        $query = "DELETE FROM items WHERE id = ?";
        $where = array($id);
        return $this->db->query($query, $where);
    }
}

 ?>
