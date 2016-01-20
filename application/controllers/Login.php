<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');

		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');

		$this->load->database();
		//load the login model
		$this->load->model('login_model');
	}

	public function index(){
		//get the posted values
		$username = $this->input->post("txt_username");
		$password = $this->input->post("txt_password");

		//set validations
		$this->form_validation->set_rules("txt_username", "Username", "trim|required");
		$this->form_validation->set_rules("txt_password", "Password", "trim|required");

		if ($this->form_validation->run() == FALSE){
			$this->load->view('login'); //validation fails
		} else {
			//validation succeeds
			if ($this->input->post('btn_login') == "Login"){
				//check if username and password is correct
				$usr_result = $this->login_model->get_user($username, $password);
				//print_r($usr_result);
					if ($usr_result > 0) //active user record is present
					{
						//set the session variables
						$sessiondata = array(
							'username' => $username,
							'loginuser' => TRUE
						);
						$this->session->set_userdata($sessiondata);
						redirect("product");
					}
					else{
						$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
						redirect('login/index');
					}
				}
				else{
					redirect('login/index');
				}
		}

	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Students.php */