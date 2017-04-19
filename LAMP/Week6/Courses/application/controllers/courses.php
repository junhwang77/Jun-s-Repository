<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {
    protected $id = 0,
              $courses = array();

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
        $this->id = $this->session->userdata('id');
        $this->courses = $this->session->userdata('courses');
	}
	public function index()
	{
        if (!isset($this->session->userdata['id']))
        {
            $this->session->set_userdata('id', 0);
        }
		$this->load->view('index');
	}
    public function add()
    {
        // session_destroy();
        $this->errors = '';
        if (strlen($this->input->post('name'))<15)
        {
            $this->errors = "Name must be at least 15 characters";
            $this->session->set_flashdata('errors', $this->errors);
            // var_dump($this->session->flashdata('errors'));
        }
        else
        {
            $date = date('Y/m/j g:i a');
            $name = $this->input->post('name');
            $description = $this->input->post('description');
            $id = $this->input->post('id');
            $this->courses = $this->session->userdata('courses');
            $string = "<tr>
                      <td>{$name}</td>
                      <td>{$description}</td>
                      <td>{$date}</td>
                      <td><a href='courses/destroy/{$id}'>remove</a></td>
                     </tr>";
            $this->courses[$id]['string'] = $string;
            $this->courses[$id]['name'] = $name;
            $this->courses[$id]['description'] = $description;
            $this->session->set_userdata('courses', $this->courses);
            $id = $this->session->userdata('id');
            $this->session->set_userdata('id', $id+1);
        }
        redirect(base_url());
    }
    public function destroy($id)
    {
        $this->session->set_userdata('name', $this->courses[$id]['name']);
        $this->session->set_userdata('description', $this->courses[$id]['description']);
        $this->session->set_userdata('id', $id);
        $this->load->view('delete');
    }
    public function remove($id)
    {
        $courses = $this->session->userdata('courses');
        $name = $this->session->userdata('name');
        $description = $this->session->userdata('description');
        session_unset($name);
        session_unset($description);
        unset($courses[$id]);
        $this->session->set_userdata('courses', $courses);
        redirect(base_url());
    }
}
?>
