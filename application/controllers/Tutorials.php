<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorials extends CI_Controller {

	public function index()
	{
		$this->load->view('tutorial_view.phtml');
	}

}

/* End of file Tutorials.php */
/* Location: ./application/controllers/Tutorials.php */