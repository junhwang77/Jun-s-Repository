<?php
class Review extends CI_Model {
    function get_all_reviews()
    {
        return $this->db->query("SELECT * FROM reviews")->result_array();
    }
    function get_review_by_book_id($id)
    {
        return $this->db->query("SELECT * FROM reviews WHERE book_id = ?", array($id))->row_array();
    }
    function add_review($review)
    {
        $query = "INSERT INTO reviews (rating, comment, user_id, book_id, created_at, updated_at) VALUES(?,?,?,?,?,?)";
        $values = array($review['rating'], $review['comment'], $review['user_id'], $review['book_id'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
        return $this->db->query($query, $values);
    }
    // function edit_user($user)
    // {
    //     $date = date("Y-m-d, H:i:s");
    //     $query = "UPDATE products SET name = ?, description = ?, price = ?, updated_at = ? WHERE id = ?";
    //     $set = array($product['name'], $product['description'], $product['price'], date("Y-m-d, H:i:s"), $product['id']);
    //     return $this->db->query($query, $set);
    // }
    function remove_review($id)
    {
        $query = "DELETE FROM reviews WHERE id = ?";
        $where = array($id);
        return $this->db->query($query, $where);
    }
}

 ?>
