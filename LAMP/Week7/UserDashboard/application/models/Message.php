<?php
class Message extends CI_Model {
    function add_message($post)
    {
        $query = "INSERT INTO messages (message, created_at, updated_at, user_id, m_poster_id) VALUES(?,?,?,?,?)";
        $values = array($post['message'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"), $post['user_id'], $post['m_poster_id']);
        return $this->db->query($query, $values);
    }
    function messages_by_user_id($user_id)
    {
        return $this->db->query("SELECT messages.id, messages.message, messages.created_at, poster.first_name, poster.last_name FROM users
        JOIN messages ON users.id=messages.user_id
        JOIN users AS poster ON messages.m_poster_id=poster.id WHERE messages.user_id=?", array($user_id))->result_array();
    }
    function add_comment($post)
    {
        $query = "INSERT INTO comments (comment, created_at, updated_at, message_id, c_poster_id) VALUES(?,?,?,?,?)";
        $values = array($post['comment'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"), $post['message_id'], $post['c_poster_id']);
        return $this->db->query($query, $values);
    }
    function comments_by_message_id($message_id)
    {
        return $this->db->query("SELECT comments.id, comments.comment, comments.created_at, poster.first_name, poster.last_name FROM messages
        JOIN comments ON messages.id=comments.message_id
        JOIN users AS poster ON comments.c_poster_id=poster.id WHERE comments.message_id=?", array($message_id))->result_array();
    }
    function remove_message($id)
    {
        $query0 = "DELETE FROM comments WHERE message_id = ?";
        $where0 = array($id);
        $this->db->query($query0, $where0);
        $query = "DELETE FROM messages WHERE id = ?";
        $where = array($id);
        return $this->db->query($query, $where);
    }
}
