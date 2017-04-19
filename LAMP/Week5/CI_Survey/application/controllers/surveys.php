<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surveys extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}
	public function index()
	{
		$this->load->view('index');
	}
	public function process_form()
	{
		if ($this->session->userdata('counter'))
		{
			$counter = $this->session->userdata('counter');
			$this->session->set_userdata('counter', $counter+1);
		}
		else
		{
			$this->session->set_userdata('counter', 1);
		}
		$counter = $this->session->userdata('counter');
		$name = $this->input->post('name');
		$location = $this->input->post('location');
		$language = $this->input->post('language');
		$comment = $this->input->post('comment');
		$data = array('counter'  => $counter,
					  'name' 	 => $name,
					  'location' => $location,
					  'language' => $language,
					  'comment'  => $comment);
		$this->result($data);
	}
	public function result($array)
	{
		$this->load->view('result', $array);
	}
}
?>
