<?php
class Barcode extends CI_Controller {
	function __construct()
	{
		parent::__construct();

		//$this->load->model('barcode_model');
		define('EXT', '.php');
	}

	/*function index()
	{
		$temp = "HNI84".rand(000000001, 9999999999)."VN";
		//$barcode = $this->set_barcode($temp);
		//$data = array(
			//'key'          => $temp,
			//'date'         => date('Y-m-d')
		//);
		//$this->barcode_model->insert($data);  Insert vào CSDL nếu bạn muốn
		$ndata = array(
			'bd'    => $temp,
		);
		$this->load->view('upload_view',$ndata);

	}*/

	function set_barcode($code)
	{
		//load library
		$this->load->library("zend");
		//load in folder Zend
		$this->zend->load('Zend/Barcode');

			//generate barcode
		Zend_Barcode::render('code128', 'image', array('text'=>$code), array());
	}


}
?>