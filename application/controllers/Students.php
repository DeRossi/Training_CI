<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Latest compiled and minified CSS & JS -->
<link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script src="//code.jquery.com/jquery.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<?
class Students extends CI_Controller {
	public $_data;

	public function __construct(){
		parent::__construct();
		$this->_data['base_url'] = base_url();
		$this->load->model('students_model');

		$this->load->helper('url');
		$this->load->library('form_validation');
	}

	public function index()
	{
		//$this->load->helper('url');
		$this->_data['base_url'] = base_url();


		$this->_data['subview'] = 'students/list';
		$this->_data['titlePage'] = 'List All Students';
		$this->load->model('students_model');

		$this->_data['info'] = $this->students_model->getList();
		
		$this->load->view('students/main.php', $this->_data, FALSE);

		//$this->showlist();
		//$this->create();
	}

/*	public function showlist(){
		echo "<h1>Show list</h1>";
		$query = $this->db->get('students');
		$str = "<h2><table class='table table-hover'><th>ID</th> <th>Student Name</th> <th>Student DOB</th> <th>Student Sex</th> <th>Student Address</th>";
		echo($str);
		foreach ($query->result() as $row) {
			echo "<tr><td>" .$row->id. "</td><td>" .$row->student_name. "</td><td>" .$row->student_birth. "</td><td>" .$row->student_sex. "</td><td>" .$row->student_address. "</td></tr>";
		}
		echo("</table></h2>");
	}*/

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

	public function add(){
		$this->_data['titlePage'] = 'Add Student';
		$this->_data['subview'] = 'students/add_student';

		$this->form_validation->set_rules("student_name", "student_name", "required|min_length[6]");
		$this->form_validation->set_rules("student_address", "student_address", "required|min_length[6]");
		if($this->form_validation->run() == true){
			$this->load->model('students_model');
			$data_insert = array(
				"student_name"    => $this->input->post("student_name"),
				"student_sex"     => $this->input->post("student_sex"),
				"student_address" => $this->input->post("student_address"),
			);
			$this->students_model->insert($data_insert);
			$this->session->set_flashdata('flash_mess', 'Added');
			redirect(base_url()."index.php/students");
		}
		$this->load->view('students/main.php', $this->_data, FALSE);
	}

	public function edit($id){
		$this->load->library('form_validation');
		$this->load->model('students_model');

		$this->_data['titlePage'] = "Edit Student";
		$this->_data['subview'] = "students/edit_student";

		$this->_data['info'] = $this->students_model->getUserById($id);
		$this->form_validation->set_rules("student_name", "student_name", "required|min_length[6]");
		$this->form_validation->set_rules("student_address", "student_address", "required|min_length[6]");
		if($this->form_validation->run() == true){
			$data_update = array(
				"student_name"    => $this->input->post("student_name"),
				"student_sex"     => $this->input->post("student_sex"),
				"student_address" => $this->input->post("student_address"),
			);
			$this->students_model->update($id, $data_update);
			$this->session->set_flashdata('flash_mess', 'Update success');
			redirect(base_url(). "index.php/students");
		}
		$this->load->view('students/main', $this->_data, FALSE);
	}

	public function delete($id){
		$this->load->model('students_model');
		$this->students_model->delete($id);

		$this->session->set_flashdata('flash_mess', 'Deleted');
		redirect(base_url(). "index.php/students");
	}

	public function search($data){
		$this->load->model('students_model');
		//$this->students_model->search($data);
		$data = array(
			"student_name" => $this->input->post("student_name"),
		);

		$this->_data['titlePage'] = "Search Student";
		$this->_data['subview']   = "students/search_student";

		$this->_data['search'] = $this->students_model->search_std($data['student_name']);
		$this->load->view('students/main', $this->_data, FALSE);
	}
}

/* End of file Students.php */
/* Location: ./application/controllers/Students.php */