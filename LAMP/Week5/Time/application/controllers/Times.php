<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Times extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}
	public function main()
	{
		$this->session->set_userdata('date', date("M j, Y"));
		$this->session->set_userdata('time', date("g:i A"));
		$this->load->view('main', array(
										'date' => $this->session->userdata('date'),
										'time' => $this->session->userdata('time')
								       ));
	}
}
?>
