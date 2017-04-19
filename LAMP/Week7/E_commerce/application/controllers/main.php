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
		$this->load->view('products');
	}
    public function cart()
    {
        $this->load->view('cart');
    }
    public function add_to_cart()
    {
        $name = $this->input->post('name');
        $price = $this->input->post('price');
        $qty = $this->input->post('qty');
        if (!isset($this->session->userdata['items']))
        {
            $this->session->set_userdata('items', array());
        }
        $items = $this->session->userdata('items');
        if (array_key_exists($name, $items))
        {
            $qty=$items["{$name}"]['qty'] + $qty;
        }
        $item_info = array('name' => $name, 'price' => $price*$qty, 'qty' => $qty);
        // $this->session->set_userdata('item_info', $item_info);
        $items["{$name}"] = $item_info;
        $this->session->set_userdata('items', $items);
        $items = $this->session->userdata('items');
        $this->load->view('cart', array('items'=>$items));
    }
    public function destroy()
    {
        $items = $this->session->userdata('items');
        $name = $this->input->post('name');
        unset($items["{$name}"]);
        redirect('cart');
        ///\/\/\ leaves index.php in url... cant get rid of it!!
    }
}
