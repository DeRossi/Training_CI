<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	public $_data;
	public function __construct(){
		parent::__construct();
		define('EXT', '.php');

		if(!$this->is_logged_in()){
			redirect('login');
		}
		$this->_data['base_url'] = base_url();
		// load model
		$this->load->model('product_model');

		$this->load->helper('form', 'url');
		$this->load->library(array('session', 'cart', 'upload', 'form_validation')); // zend, pagination
		//$this->load->library('zend');
	}

	public function regex_check($str) { // allow comma and number
		if (1 !== preg_match("/^[0-9,]+$/", $str)){
			$this->form_validation->set_message('regex_check', 'The %s field is not valid.');
			return FALSE;
		}
		else {
			return TRUE;
		}
	}
	public function truncate_hp($text, $chars = 15) {
		$text = $text." ";
		$text = substr($text,0,$chars);
		$text = substr($text,0,strrpos($text,' '));
		$text = $text."...";
		return $text;
	}

	public function index(){
		$this->db->select('*')->from('product');

		$offset	= $this->uri->segment(2);
		$limit	= 8;
		$this->db->limit($limit, $offset);

		$querypost = $this->db->get();

		// Pagination settings
		$config['total_rows']	= $this->product_model->countAll();
		$config['base_url']		= base_url().'/product/';
		$config['per_page']		= $limit;
		$config['uri_segment']	= 2;
		$config['num_links']	= 2;
		$config['next_link']	= " Next Page >> ";
		$config['prev_link']	= " << Previous Page ";
		//$config['use_page_numbers'] = true;

		$this->pagination->initialize($config);
		$paginator = $this->pagination->create_links();

		$nData = array(
			'subview'		=> 'product/list_product',
			'titlePage'		=> 'Danh mục sản phẩm',
			'paginator'		=> $paginator,
			'post'			=> $querypost
			//'post'			=> $querypost
		);
		$this->load->view('product/main', $nData);
		d($config);
		d($querypost);
	}

	public function addCart(){
		$insert_cartdata = array(
			'pro_id'	=> $this->input->post('pro_id'),
			'name'		=> $this->input->post('name'),
			'pro_price'	=> $this->input->post('pro_price'),
			'qty'		=> 1
		);
		$this->cart->insert($insert_cartdata);
		redirect(base_url()."product");
	}

	public function remove($rowid){

		if($rowid === "all"){
			$this->cart->destroy();
		}else{
			$data = array(
				'rowid' => $rowid,
				'qty'   => 0
			);
			$this->cart->update($data);
		}
		redirect(base_url()."product");
	}

	public function updateCart(){
		$cart_info = $_POST['cart'];

		foreach ($cart_info as $id => $cart) {
			$rowid	= $cart['rowid'];
			$price	= $cart['price'];
			$amount	= $price * $cart['qty'];
			$qty	= $cart['qty'];

			$data = array(
				'rowid'		=> $rowid,
				'price'		=> $price,
				'amount'	=> $amount,
				'qty'		=> $qty
			);
			$this->cart->update($data);
		}
		redirect(base_url()."product");
	}

	public function billing_view(){
		echo "test";
	}

	public function save_order(){
		echo "test";
	}

	public function add(){
		$this->form_validation->set_rules("pro_name"  , "pro_name", "required|min_length[6]|max_length[25]");
		$this->form_validation->set_rules("pro_price" , "pro_price", "required|min_length[5]|max_length[12]|callback_regex_check");
		$this->form_validation->set_rules("pro_desc"  , "pro_desc", "required|min_length[6]|max_length[150]");

		if($this->form_validation->run() == true){
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$date_created = date("H:i:s - d/m/Y");
			$month_import = substr($date_created, 14);

			$data_insert = array(
				"pro_name"		=> $this->input->post("pro_name"),
				"pro_price"		=> str_replace(',', '', $this->input->post("pro_price")),
				"pro_desc"		=> $this->input->post("pro_desc"),
				"date_created"	=> $date_created,
				"month_import"	=> $month_import,
				"pro_barcode"	=> "893".rand(0000000001, 9999999999).""
			);
			$this->product_model->insert($data_insert);

			$this->session->set_flashdata('flash_mess', 'Added');
			redirect(base_url()."product");
		}

		$nData = array(
			'subview'	=> 'product/add_product',
			'titlePage'	=> 'Thêm mặt hàng'
		);
		$this->load->view('product/main', $nData);
	}


	public function edit($id = null){
		$this->form_validation->set_rules("pro_name"  , "pro_name", "required|min_length[6]|max_length[25]");
		$this->form_validation->set_rules("pro_price" , "pro_price", "required|min_length[5]|max_length[12]|callback_regex_check");
		$this->form_validation->set_rules("pro_desc"  , "pro_desc", "required|min_length[6]|max_length[150]");

		if($this->input->post("ok")){ //Upload
			$config['upload_path']		= './common/img/upload/';
			$config['allowed_types']	= 'gif|jpg|JPG|png|PNG';
			$config['max_size']			= '900';
			$config['max_width']		= '1024';
			$config['max_height']		= '768';

			$this->load->library("upload", $config);
			$this->upload->initialize($config);

			if($this->upload->do_upload('img')){
				//echo "Upload ok";
				$check = $this->upload->data();

			} else {
				$data_err = $this->upload->display_errors();

			}
			// Solve problem : giải quyết từ $data_update chứ ko phải từ $check
		}

		if($this->form_validation->run() == true){
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$date_modidied = date("H:i:s - d/m/Y");

			if(is_null($check['file_name'])){
				$data_update = array(
					"pro_name"		=> $this->input->post("pro_name"),
					"pro_price"		=> str_replace(',', '', $this->input->post("pro_price")),
					"pro_desc"		=> $this->input->post("pro_desc"),
					"date_modified"	=> $date_modidied,
				);
			} else {
				if(!$this->upload->do_upload('img')){
					$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Upload hình không đúng chuẩn <br>( max size : 900 kb; max width : 1024px; max height : 768 px; allowed type : gif, jpg, png )<br> Hãy thử lại !</div>');
					redirect(base_url(). "product/edit/" .$id);
				}
				$data_update = array(
					"pro_name"		=> $this->input->post("pro_name"),
					"pro_price"		=> str_replace(',', '', $this->input->post("pro_price")),
					"pro_desc"		=> $this->input->post("pro_desc"),
					"date_modified"	=> $date_modidied,
					"pro_img"		=> $check['file_name']
				);
			}
			$this->product_model->update($id, $data_update);
			$this->session->set_flashdata('flash_mess', 'Update success');
			redirect(base_url(). "product");
		}

		$nData = array(
			//'errors_msg'	=> $this->upload->display_errors(),

			'bd'			=> "893".rand(0000000001, 9999999999)."", //"SP".rand(000000001, 9999999999)."VN",

			'titlePage'		=> 'Sửa thông tin mặt hàng',
			'subview'		=> 'product/edit_product',
			'info'			=> $this->product_model->getProById($id)
		);
		$this->load->view('product/main', $nData);
	}

	public function delete($id){
		$this->product_model->delete($id);

		$this->session->set_flashdata('flash_mess', 'Deleted');
		redirect(base_url(). "product");
	}

	public function details($id = null){
		$this->load->model('product_model');

		$temp = "893".rand(0000000001, 9999999999).""; //"SP".rand(000000001, 9999999999)."VN";

		$nData = array(
			'bd'		=> "893".rand(0000000001, 9999999999)."", //"SP".rand(000000001, 9999999999)."VN",
			'subview'	=> "product/product_details",
			'titlePage'	=> "Product details",
			'info'		=> $this->product_model->getProById($id)
		);
		//$this->set_barcode($id);
		$this->load->view('product/main', $nData);
	}

	public function set_barcode($code){
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		// generate Barcode
		Zend_Barcode::render('code128', 'image', array('text'=>$code), array());
	}

	public function search(){
		/*$keyword = array(
			$keyword_proname	= $this->input->post('pro_name'),
			$keyword_pricefrom	= $this->input->post('pro_price_from'),
			$keyword_priceto	= $this->input->post('pro_price_to')
		);*/
		$keyword_proname	= $this->input->post('pro_name');
		$keyword_pricefrom	= str_replace(',', '', $this->input->post('pro_price_from'));
		$keyword_priceto	= str_replace(',', '', $this->input->post('pro_price_to'));

		$search = array(
			"keyword_proname"	=> $keyword_proname,
			"keyword_pricefrom"	=> $keyword_pricefrom,
			"keyword_priceto"	=> $keyword_priceto,
		);

		$results = $this->product_model->search_proname($search);
		$nData = array(
			'titlePage'	=> 'Tìm kiếm sản phẩm',
			'subview'	=> 'product/search_product',
			'search'	=> $search,
			'results'	=> $results
		);

		$this->load->view('product/main', $nData);
	}

	public function ajax_getproName(){
		$keywords = $this->input->post('value_input');
		if(empty($keywords)) return;
		$rs = $this->db->select("pro_name")->like("pro_name",$keywords)->get('product')->result();
		//$result = [];
		foreach ($rs as $key => $value) {
			$result[] = $value->pro_name;
		}
		if(!empty($result)){
			echo json_encode($result);
		}else{
			echo json_encode([]);
		}
		die;

		// $search = array(
		// 	"keyword_proname"	=> $this->input->post('pro_name'),
		// 	"keyword_pricefrom"	=> str_replace(',', '', $this->input->post('pro_price_from')),
		// 	"keyword_priceto"	=> str_replace(',', '', $this->input->post('pro_price_to')),
		// );
		// //$keyword = $this->input->post('pro_name');
		// $data = $this->product_model->search_proname($search["keyword_proname"]);
		// echo json_encode($data);
	}
}

/* End of file Product.php */
/* Location: ./application/controllers/Product.php */