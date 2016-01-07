<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {
	public $_data;

	public function __construct(){
		parent::__construct();
		$this->_data['base_url'] = base_url();
		$this->load->model('students_model');

		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('pagination');
	}

	public function index()
	{
		$this->_data['base_url'] = base_url();


		$this->_data['subview']   = 'students/list';
		$this->_data['titlePage'] = 'List All Students';

		$this->load->model('students_model');

		// Pagination settings
		$this->_data['base_url']    = base_url()."students";
		$this->_data['total_rows']  = $this->students_model->countAll();
		$this->_data['per_page']    = "20";
		$this->_data['uri_segment'] = 3;
		$choice = $this->_data['total_rows'] / $this->_data['per_page'];

		$this->_data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->_data['pagination'] = $this->pagination->create_links();
		$this->pagination->initialize($this->_data);

		$this->load->library('pagination', $this->_data);

		$start=$this->uri->segment(3);
		//$this->_data['info'] = $this->students_model->getList();
		$this->_data['info'] = $this->students_model->getList($this->_data['per_page'], $start);

		$this->load->view('students/main', $this->_data);
		//echo '<h2>' .$this->pagination->create_links(). '</h2>';

	}

	public function add(){
		$this->_data['titlePage'] = 'Add Student';
		$this->_data['subview']   = 'students/add_student';

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
			redirect(base_url()."students");
		}
		$this->load->view('students/main', $this->_data);
	}

	public function edit($id = null){

		$this->_data['titlePage'] = "Edit Student";
		$this->_data['subview']   = "students/edit_student";

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
			redirect(base_url(). "students");
		}
		$this->load->view('students/main', $this->_data);
	}

	public function delete($id){
		$this->load->model('students_model');
		$this->students_model->delete($id);

		$this->session->set_flashdata('flash_mess', 'Deleted');
		redirect(base_url(). "students");
	}

	public function search(){
		$this->load->model('students_model');

		$keyword = $this->input->post('student_name');

		$this->_data['titlePage'] = "Search Student";
		$this->_data['subview']   = "students/search_student";
		$this->_data['results'] = $this->students_model->search_std($keyword);

		$this->load->view('students/main', $this->_data);
	}
}

/* End of file Students.php */
/* Location: ./application/controllers/Students.php */