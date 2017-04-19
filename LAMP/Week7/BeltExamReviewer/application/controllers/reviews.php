<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->output->enable_profiler();
    }
    public function destroy_review($book_id, $id)
    {
        $this->Review->remove_review($id);
        redirect("books/show_book/{$book_id}");
    }
}



 ?>
