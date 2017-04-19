<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}
	public function index()
	{
        if (!isset($this->session->userdata['logged_in'])){
            echo 'Please log in first';
        }
        else {
            $query = $this->Book->show_all_books_reviews_users();
            $reviews = array_reverse($query);
            $books = $this->Book->get_all_books();
            $logged_in = $this->session->userdata('logged_in');
            $this->load->view('books', array('logged_in'=>$logged_in,
                                             'reviews' => $reviews,
                                             'books' => $books));
        }
	}
    public function show_book($book_id)
    {
        if (!isset($this->session->userdata['logged_in'])){
            echo 'Please log in first';
        }
        else {
            $query = $this->Book->show_book_by_id($book_id);
            $reviews = array_reverse($query);
            $logged_in = $this->session->userdata('logged_in');
            $this->load->view('bookpage', array('logged_in'=>$logged_in,
                                                'reviews' => $reviews));
        }
    }
    public function show_user($user_id)
    {
        if (!isset($this->session->userdata['logged_in'])) {
            echo 'Please log in first';
        }
        else {
            $user = $this->User->get_user_by_id($user_id);
            $this->load->view('users', array('user'=>$user));
        }
    }
    public function add_book()
    {
        $this->load->view('add_book');
    }
    public function create_book_review()
    {
        if ($this->input->post('title')) {
            $title = $this->input->post('title');
            $author = $this->input->post('author');
            $book_info = array(
                "title" => $title,
                "author" => $author
            );
            $this->Book->add_book($book_info);
            $book = $this->Book->get_book_by_title($title);
            $book_id = $book['id'];
        }
        elseif ($this->input->post('book_id')) {
            $book_id = $this->input->post('book_id');
        }
        $user_id = $this->input->post('user_id');
        $comment = $this->input->post('comment');
        $rating = $this->input->post('rating');
        $review_info = array(
            "comment" => $comment,
            "rating" => $rating,
            "user_id" => $user_id,
            "book_id" => $book_id,
        );
        $this->Review->add_review($review_info);
        redirect("books/show_book/{$book_id}");
    }
}
