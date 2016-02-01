<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function index()
	{

	}

	public function add(){
		$this->load->view('add_category', $nData);
	}

	public function edit(){

		$this->load->view('edit_category', $nData);
	}

	public function details(){
		$nData = array(
			$subview => ''
		);
		$this->load->view('category_details', $nData);

	}

	public function search(){

	}

}

/* End of file Cate.php */
/* Location: ./application/controllers/Cate.php */