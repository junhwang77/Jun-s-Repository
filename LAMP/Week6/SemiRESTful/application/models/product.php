<?php
class Product extends CI_Model {
    function get_all_products()
    {
        return $this->db->query("SELECT * FROM products")->result_array();
    }
    function get_product_by_id($product_id)
    {
        return $this->db->query("SELECT * FROM products WHERE id = ?", array($product_id))->row_array();
    }
    function add_product($product)
    {
        $query = "INSERT INTO products (name, description, price, created_at, updated_at) VALUES(?,?,?,?,?)";
        $values = array($product['name'], $product['description'], $product['price'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
        return $this->db->query($query, $values);
    }
    function edit_product($product)
    {
        $date = date("Y-m-d, H:i:s");
        $query = "UPDATE products SET name = ?, description = ?, price = ?, updated_at = ? WHERE id = ?";
        $set = array($product['name'], $product['description'], $product['price'], date("Y-m-d, H:i:s"), $product['id']);
        return $this->db->query($query, $set);
    }
    function remove_product($id)
    {
        $query = "DELETE FROM products WHERE id = ?";
        $where = array($id);
        return $this->db->query($query, $where);
    }
}

 ?>
