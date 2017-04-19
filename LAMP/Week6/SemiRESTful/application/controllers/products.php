<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	protected $products = array();

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
		$this->products = $this->session->userdata('products');
	}
	public function index()
	{
		$this->load->model("Product");
		$products = $this->Product->get_all_products();
		$this->session->set_userdata('products', $products);
		$this->load->view('index');
	}
	public function new()
	{
		$this->load->view('new');
	}
	public function create()
	{
		$this->errors = '';
		$p = $this->input->post('price');
		if (preg_match("/^[a-zA-Z]+$/", $p))
		{
			$this->errors = "The price cannot contain letters";
			$this->session->set_flashdata('errors', $this->errors);
			$this->new();
		}
		if ($this->input->post('name')==null ||  $this->input->post('description')==null || $this->input->post('price')==null)
		{
			$this->errors = "field(s) cannot be empty";
			$this->session->set_flashdata('errors', $this->errors);
			$this->new();
		}
		else
		{
			//add post session into mysql data base
			$this->load->model("Product");
			$name = $this->input->post('name');
			$description = $this->input->post('description');
			$price = $this->input->post('price');
			$product_info = array(
				"name" => $name,
				"description" => $description,
				"price" => $price
			);
			$add_product = $this->Product->add_product($product_info);
			$this->products = $this->session->userdata('products');
			redirect(base_url());
		}
	}
	public function get_query_by_id($id)
	{
		$this->load->model("Product");
		$product = $this->Product->get_product_by_id($id);
		$this->session->set_flashdata('product', $product);
		$prod = $this->session->flashdata('product');
		return array($prod, $product);
	}
	public function show($id)
	{
		$product = $this->get_query_by_id($id);
		$this->load->view('show', array('product' => $product[0]));
	}
	public function edit($id)
	{
		$product = $this->get_query_by_id($id);
		$this->load->view('edit', array('product' => $product[0]));
	}
	public function update($id)
	{
		$this->load->model("Product");
		$name = $this->input->post('name');
		$description = $this->input->post('description');
		$price = $this->input->post('price');
		$product_info = array(
			"id" => $id,
			"name" => $name,
			"description" => $description,
			"price" => $price
		);
		$this->Product->edit_product($product_info);
		redirect(base_url());
	}
	public function destroy($id)
	{
		$this->load->model('Product');
		$this->Product->remove_product($id);
		redirect(base_url());
	}
}
