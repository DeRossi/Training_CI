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
		$this->show();
		$this->create();
	}

	public function show(){
		echo "<h1>Show all</h1>";
		$query = $this->db->get('students');
		$str = "<h2><table class='table table-hover'><th>ID</th> <th>Student Name</th> <th>Student DOB</th> <th>Student Sex</th> <th>Student Address</th>";
		echo($str);
		foreach ($query->result() as $row) {
			echo "<tr><td>" .$row->id. "</td><td>" .$row->student_name. "</td><td>" .$row->student_birth. "</td><td>" .$row->student_sex. ".</td><td>" .$row->student_address. ".</td></tr>";
		}
		echo("</table></h2>");
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
			echo "<h1 style='color:red;'>Record added</h1>";
		}else{
			echo "<h1>Failed</h1>";
		}

		$this->show();
	}
}

/* End of file Students.php */
/* Location: ./application/controllers/Students.php */