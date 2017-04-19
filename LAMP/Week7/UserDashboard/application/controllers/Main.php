<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
	}
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('index');
	}
    public function signin_page()
    {
		session_destroy();
        $this->load->helper(array('form', 'url'));
        $this->load->view('signin');
    }
    public function login()
    {
        $email = $this->input->post('login_email');
        $this->load->model('User');
        $user = $this->User->get_user_by_email($email);
        $password = md5($this->input->post('login_pass').''.            $user['salt']);
        if ($user && $user['password'] == $password)
        {
            $logged_in = array(
                'user_id' => $user['id'],
                'user_email' => $user['email'],
                'user_first' => $user['first_name'],
				 'user_last' => $user['last_name'],
				'user_level' => $user['user_level'],
				'description'=> $user['description'],
				'is_logged_in' => true
            );
            $this->session->set_userdata(array('logged_in' => $logged_in));
			redirect('/users/dashboard');
        }
        else
        {
            $this->session->set_flashdata("login", "Invalid email or password");
            redirect('/signin');
        }
    }
    public function reg_page()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->view('register');
    }
	public function validations()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]', array('is_unique' => '%s is already being used.'));
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]', array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
	}
    public function validate()
    {
        $this->validations();
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('register');
        }
        else
        {
            $this->register();
            $this->load->view('register');
        }
    }
	public function validateII()
	{
		$this->validations();
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('new_user');
		}
		else
		{
			$this->register();
			redirect('/dashboard');
		}
	}

    public function register()
    {
        $this->load->model('User');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $email = $this->input->post('email');
        $salt = bin2hex(openssl_random_pseudo_bytes(22));
        $password = md5($this->input->post('password').''.$salt);
		$query = $this->User->get_all_users();
		if (count($query)==0) {
			$user_level = 'admin';
		}
		else {
			$user_level = 'normal';
		}
        $user_info = array(
            "first_name" => $first_name,
            "last_name" => $last_name,
            "email" => $email,
            "password" => $password,
            "salt" => $salt,
			"user_level" => $user_level
        );
        $this->User->add_user($user_info);
        $this->session->set_flashdata('registration', 'Registration successful!');
    }

}
