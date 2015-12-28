<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('students_model');
	}

	public function index()
	{
		$data =[
			//"id" => '',
			"student_name"=> "nameB_2",
		];

		$id = "2";
		if($this->students_model->create($data)){
			echo "<h1>[Create] success</h1>";
		}else{
			echo "<h1>[Create] fail</h1>";
		}

		if($this->students_model->update($id , $data)){
			echo "<h1>[Update] success</h1>";
		}else{
			echo "<h1>[Update] fail</h1>";
		}

		$query = $this->students_model->find($id);
		echo "<h1><pre>";
		print_r($query);
		echo "</pre></h1>";
	}

}

/* End of file Students.php */
/* Location: ./application/controllers/Students.php */