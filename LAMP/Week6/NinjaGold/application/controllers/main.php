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
        if (!isset($this->session->userdata['totalgold']))
        {
            $this->session->set_userdata('totalgold', 0);
        }
        if (!isset($this->session->userdata['messages']))
        {
            $this->session->set_userdata('messages', '');
        }
        $messages = $this->session->userdata('messages');
        $totalgold = $this->session->userdata('totalgold');
        $this->load->view('index', array('totalgold' => $totalgold,
                                         'messages'   => $messages));
	}
    public function process_money()
    {
        $messages = $this->session->userdata('messages');
        $totalgold = $this->session->userdata('totalgold');
        if ($this->input->post('location')=='farm')
        {
            $earned = rand(10,20);
            $this->session->set_userdata('totalgold', $totalgold+$earned);
        }
        elseif ($this->input->post('location')=='cave')
        {
            $earned = rand(5,10);
            $this->session->set_userdata('totalgold', $totalgold+$earned);
        }
        elseif ($this->input->post('location')=='house')
        {
            $earned = rand(2,5);
            $this->session->set_userdata('totalgold', $totalgold+$earned);
        }
        elseif ($this->input->post('location')=='casino')
        {
            $earned = rand(-50,50);
            $this->session->set_userdata('totalgold', $totalgold+$earned);
        }
        $date = date('Y/m/j g:i a');
        $location=$this->input->post('location');
        if ($earned >= 0)
        {
            $this->session->set_userdata('messages', "<p id='green'>Earned {$earned} gold from the {$location}! {$date}</p><br />".$messages);
        }
        else {
            $this->session->set_userdata('messages', "<p id='red'>Entered a casino and lost {$earned} gold from the {$location}! {$date}</p><br />".$messages);
        }
        $totalgold = $this->session->userdata('totalgold');
        $messages = $this->session->userdata('messages');
        redirect('/');
    }
}
