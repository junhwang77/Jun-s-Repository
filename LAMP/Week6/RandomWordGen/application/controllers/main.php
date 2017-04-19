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
        $this->generate();
	}
    public function home($array)
    {
        $this->load->view('index', $array);
    }
    public function generate()
    {
        if ($this->session->userdata('counter'))
        {
            $counter = $this->session->userdata('counter');
            $this->session->set_userdata('counter', $counter+1);
        }
        else
        {
            $this->session->set_userdata('counter', 0);
        }
        $counter = $this->session->userdata('counter');
        $rand = substr(uniqid(), -12);
        $random = array('counter' => $counter,
                        'random'  => $rand    );
        $this->home($random);
    }
}
