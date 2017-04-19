<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}
	public function index()
	{
		if (!isset($this->session->userdata['number']))
		{
			$this->session->set_userdata('number', rand(1,100));
		}
		$this->load->view('index', array('number' => $this->session->userdata('number')));
	}
    public function checkSession()
    {
        if ($this->input->post('guess') < $this->session->userdata('number'))
        {
            $this->session->set_flashdata('result', 'Too low!');
        }
        if ($this->input->post('guess') > $this->session->userdata('number'))
        {
            $this->session->set_flashdata('result', 'Too high!');
        }
        if ($this->input->post('guess') == $this->session->userdata('number'))
        {
            $this->session->set_flashdata('correct', 'You got it!');
        }
        redirect('/');
    }
    public function destroy()
    {
        $this->session->unset_userdata('number');
        redirect('/');
    }
}
?>
