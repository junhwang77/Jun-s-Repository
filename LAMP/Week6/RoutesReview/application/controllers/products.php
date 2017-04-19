<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function show($num)
	{
		echo $num;
	}
	public function edit($num)
	{
		echo $num;
	}
}
