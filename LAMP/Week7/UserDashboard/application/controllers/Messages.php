<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
	}
    public function show($user_id)
    {
        if (!isset($this->session->userdata['logged_in'])) {
            echo "Please login first";
        }
        else {
            $user = $this->User->get_user_by_id($user_id);
            $logged_in = $this->session->userdata('logged_in');
            $messages = $this->Message->messages_by_user_id($user_id);
            $this->load->view('show', array('user'=>$user,
                                            'logged_in'=>$logged_in,
                                            'messages'=>$messages));
        }

    }
    public function add($user_id, $m_poster_id)
    {
        $message = $this->input->post('message');
        $post = array('message' => $message,
                      'user_id' => $user_id,
                      'm_poster_id' => $m_poster_id);
        $this->Message->add_message($post);
        redirect("/show/{$user_id}");
    }
    public function add_comment($user_id ,$message_id, $c_poster_id)
    {
        $comment = $this->input->post('comment');
        $post = array('comment' => $comment,
                      'message_id' => $message_id,
                      'c_poster_id' => $c_poster_id);
        $this->Message->add_comment($post);
        redirect("/show/{$user_id}");
    }
	public function destroy_message($id, $user_id)
	{
		$this->Message->remove_message($id);
		redirect("/show/{$user_id}");
	}
}
