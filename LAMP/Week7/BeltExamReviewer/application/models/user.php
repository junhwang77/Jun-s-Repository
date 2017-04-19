<?php
class User extends CI_Model {
    function get_all_users()
    {
        return $this->db->query("SELECT * FROM users")->result_array();
    }
    function get_user_by_email($email)
    {
        return $this->db->query("SELECT * FROM users WHERE email = ?", array($email))->row_array();
    }
    function add_user($user)
    {
        $query = "INSERT INTO users (first_name, last_name, email, password, salt, created_at, updated_at) VALUES(?,?,?,?,?,?,?)";
        $values = array($user['first_name'], $user['last_name'], $user['email'], $user['password'], $user['salt'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
        return $this->db->query($query, $values);
    }
    function get_user_by_id($user_id)
    {
        $this->db->select('users.first_name,
                          users.last_name,
                          users.email,
                          reviews.book_id,
                          books.title');
        $this->db->from('reviews');
        $this->db->join('books', 'reviews.book_id = books.id');
        $this->db->join('users', 'reviews.user_id = users.id');
        $this->db->where('user_id', $user_id);
        return $this->db->get()->result_array();
    }
    // function edit_user($user)
    // {
    //     $date = date("Y-m-d, H:i:s");
    //     $query = "UPDATE products SET name = ?, description = ?, price = ?, updated_at = ? WHERE id = ?";
    //     $set = array($product['name'], $product['description'], $product['price'], date("Y-m-d, H:i:s"), $product['id']);
    //     return $this->db->query($query, $set);
    // }
    // function remove_user($id)
    // {
    //     $query = "DELETE FROM products WHERE id = ?";
    //     $where = array($id);
    //     return $this->db->query($query, $where);
    // }
}

 ?>
