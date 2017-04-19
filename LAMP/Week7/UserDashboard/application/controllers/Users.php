<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
	}
    public function dashboard()
    {
		if (!isset($this->session->userdata['logged_in'])) {
			echo "Please login first";
		}
		else {
			$query = $this->User->get_all_users();
			$logged_in = $this->session->userdata('logged_in');
	        if ($logged_in['user_level']=='admin')
	        {
	            $this->load->view('dash_admin', array('users' => $query,
												  'logged_in' => $logged_in));
	        }
	        else
	        {
	            $this->load->view('dash_user', array('users' => $query));
	        }
		}
    }
    public function new_user()
    {
		if (!isset($this->session->userdata['logged_in'])) {
			echo "Please login first";
		}
		else {
			$this->load->helper(array('form', 'url'));
	        $this->load->view('new_user');
		}
    }
    public function edit_user($id)
    {
		if (!isset($this->session->userdata['logged_in'])) {
			echo "Please login first";
		}
		else {
			$query = $this->User->get_user_by_id($id);
			$logged_in = $this->session->userdata('logged_in');
			if ($logged_in['user_level']=='admin')
			{
				$this->load->view('edit_admin', array('user' => $query,
												 'logged_in' => $logged_in));
			}
		}
    }
	public function edit_profile()
	{
		if (!isset($this->session->userdata['logged_in'])) {
			echo "Please login first";
		}
		else {
			$logged_in = $this->session->userdata('logged_in');
			$this->load->view('edit_user', array('users' => $logged_in));
		}

	}
	public function edit_desc($user_id)
	{
		$description = $this->input->post('description');
		$user = array('description' => $description,
	 				  'user_id' => $user_id);
		$this->User->edit_user_desc($user);
		redirect("/users/edit");
	}
    public function remove_conf($id)
    {
        $this->load->view('remove_conf', array('id' => $id));
    }
    public function destroy_user($id)
    {
        $this->User->remove_user($id);
        redirect("/dashboard");
    }
    public function edit_user_info($id)
    {
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $email = $this->input->post('email');
        $user_level = $this->input->post('user_level');
        $user = array('id' => $id,
                      'first_name' => $first_name,
                      'last_name' => $last_name,
                      'email' => $email,
                      'user_level' => $user_level);
        $this->User->edit_user_info($user);
        redirect("/users/edit/{$id}");
    }

	public function edit_pass($id)
	{
		$user = $this->User->get_user_by_id($id);
		$password = md5($this->input->post('old_pass').''.            $user['salt']);
		$new_pass = $this->input->post('new_pass');
		$conf_pass = $this->input->post('conf_pass');
		if ($user['password'] == $password && $new_pass == $conf_pass)
		{
			$salt = bin2hex(openssl_random_pseudo_bytes(22));
	        $password = md5($new_pass.''.$salt);
			$user_pass = array('id' => $id,
							   'password' => $password,
						   	   'salt' => $salt);
			$this->User->edit_password($user_pass);
			$this->session->set_flashdata('success', 'Password changed successfully');
			redirect("/users/edit/{$id}");
		}
		else {
			$this->session->set_flashdata('password', 'Passwords do not match');
			redirect("/users/edit/{$id}");
		}
	}
}
