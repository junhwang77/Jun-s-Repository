<?php
class Book extends CI_Model {
    function get_all_books()
    {
        return $this->db->query("SELECT * FROM books")->result_array();
    }
    function get_book_by_title($title)
    {
        return $this->db->query("SELECT * FROM books WHERE title = ?", array($title))->row_array();
    }
    function show_book_by_id($book_id)
    {
        $this->db->select('books.title,
                           books.author,
                           reviews.id,
                           reviews.rating,
                           reviews.comment,
                           reviews.created_at,
                           reviews.book_id,
                           reviews.user_id,
                           users.first_name');
        $this->db->from('reviews');
        $this->db->join('books', 'reviews.book_id = books.id');
        $this->db->join('users', 'reviews.user_id = users.id');
        $this->db->where('book_id', $book_id);
        return $this->db->get()->result_array();
    }
    function add_book($book)
    {
        $query = "INSERT INTO books (title, author, created_at, updated_at) VALUES(?,?,?,?)";
        $values = array($book['title'], $book['author'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
        return $this->db->query($query, $values);
    }
    function show_all_books_reviews_users()
    {
        $this->db->select('books.title,
                           reviews.rating,
                           reviews.comment,
                           reviews.created_at,
                           reviews.book_id,
                           reviews.user_id,
                           users.first_name');
        $this->db->from('reviews');
        $this->db->join('books', 'reviews.book_id = books.id');
        $this->db->join('users', 'reviews.user_id = users.id');
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
