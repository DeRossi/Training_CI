<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Latest compiled and minified CSS & JS -->
<link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script src="//code.jquery.com/jquery.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<?
class Students extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('students_model');
	}

	public function index()
	{

		$id = "2";
		/*if($this->students_model->create($data)){
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
		echo "</pre></h1>"; */

		$this->show();
		$this->create();
	}

	public function show(){
		echo "<h1>Show all</h1>";
		$query = $this->db->get('students');
		foreach ($query->result() as $row) {
			echo "<h2><table class='table table-hover'><tr><td>" .$row->id. "</td><td>" .$row->student_name. "</td><td>" .$row->student_birth. "</td><td>" .$row->student_sex. "</td><td>" .$row->student_address. "</td></tr></table></h2>";
		}
	}

	public function create(){
		$data =[
			//"id" => '',
		"student_name"    => "test",
		"student_birth"   => "test",
		"student_sex"     => "test",
		"student_address" => "test",
		];

		echo "<h1>Create SV</h1>";
		if($query = $this->db->insert("students", $data)){
			echo "<h1>Record added</h1>";
		}else{
			echo "<h1>Failed</h1>";
		}

		$this->show();
	}
}

/* End of file Students.php */
/* Location: ./application/controllers/Students.php */