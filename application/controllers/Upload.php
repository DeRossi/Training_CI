<?php
class Upload extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array("form", "url"));
	}

	public function index(){
		$data['errors'] = '';
		$this->load->view("upload_view", $data);
	}

	public function doupload(){
		if($this->input->post("ok")){
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '900';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
			$this->load->library("upload", $config);

			$this->upload->initialize($config);

			if($this->upload->do_upload("img")){
				echo 'Upload Ok';
					$check = $this->upload->data();
					echo "<pre>";
					print_r($check);
					echo "</pre>";

				$data['hp'] = $check['file_name'];
				$this->load->view("upload_view", $data);
			}else{
echo 'false';
				$check = $this->upload->data();
				echo "<pre>";
				print_r($check);
				echo "</pre>";


				$data['hp'] = $check['file_name'];
				$data['errors'] = $this->upload->display_errors();
				$this->load->view("upload_view", $data);
			}
		}
	}
}