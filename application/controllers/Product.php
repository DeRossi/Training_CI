<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	public $_data;

	public function __construct(){
		parent::__construct();
		$this->_data['base_url'] = base_url();
		$this->load->model('product_model');

		$this->load->helper('url');
		$this->load->library('cart');
		$this->load->library('form_validation');
		//$this->load->library('pagination');
	}

	public function index(){
		$this->db->select('*');
		$this->db->from('product');
		$offset = $this->uri->segment(2);
		$limit = 4;
		$this->db->limit($limit, $offset);
		$querypost = $this->db->get();
		// Pagination settings
		$config['total_rows']  = $this->product_model->countAll();
		$config['base_url']    = base_url().'/product/';
		$config['per_page']    = $limit;
		$config['uri_segment'] = 2;
		$config['num_links']   = 2;
		$config['next_link']   = " Next Page >> ";
		$config['prev_link']   = " << Previous Page ";
		//$config['use_page_numbers'] = true;

		$this->pagination->initialize($config);
		$paginator = $this->pagination->create_links();

		$nData = array(
			'subview'   => 'product/list_product',
			'titlePage' => 'List All Product',
			'paginator' => $paginator,
			'post'      => $querypost
		);
		$this->load->view('product/main', $nData);
	}

	public function addCart(){
		$insert_cartdata = array(
			'pro_id'    => $this->input->post('pro_id'),
			'name'      => $this->input->post('name'),
			'pro_price' => $this->input->post('pro_price'),
			'qty'       => 1
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
			$rowid  = $cart['rowid'];
			$price  = $cart['price'];
			$amount = $price * $cart['qty'];
			$qty    = $cart['qty'];

			$data = array(
				'rowid'  => $rowid,
				'price'  => $price,
				'amount' => $amount,
				'qty'    => $qty
			);
			$this->cart->update($data);
		}
		redirect(base_url()."product");
	}

	public function billing_view(){

	}

	public function save_order(){

	}

	public function add(){
		$this->form_validation->set_rules("pro_name", "pro_name", "required|min_length[6]");
		$this->form_validation->set_rules("pro_desc", "pro_desc", "required|min_length[6]");
		if($this->form_validation->run() == true){
			$this->load->model('product_model');
			$data_insert = array(
				"student_name"    => $this->input->post("student_name"),
				"student_sex"     => $this->input->post("student_sex"),
				"student_address" => $this->input->post("student_address"),
			);
			$this->students_model->insert($data_insert);
			$this->session->set_flashdata('flash_mess', 'Added');
			redirect(base_url()."product");
		}

		$nData = array(
			'subview'   => 'product/add_product',
			'titlePage' => 'Add Product'
		);
		$this->load->view('product/main', $nData);
	}

	public function edit($id = null){
		$this->form_validation->set_rules("pro_name", "pro_name", "required|min_length[6]");
		$this->form_validation->set_rules("pro_desc", "pro_desc", "required|min_length[6]");
		if($this->form_validation->run() == true){
			$data_update = array(
				"pro_name"	=> $this->input->post("pro_name"),
				"pro_price"	=> $this->input->post("pro_price"),
				"pro_desc"	=> $this->input->post("pro_desc"),
			);
			$this->product_model->update($id, $data_update);
			$this->session->set_flashdata('flash_mess', 'Update success');
			redirect(base_url(). "product");
		}

		$nData = array(
			'titlePage' => 'Edit Product',
			'subview'   => 'product/edit_product',
			'info'      => $this->product_model->getProById($id)
		);
		$this->load->view('product/main', $nData);
	}

	public function delete($id){
		$this->product_model->delete($id);

		$this->session->set_flashdata('flash_mess', 'Deleted');
		redirect(base_url(). "product");
	}

	public function search(){
		$keyword = $this->input->post('student_name');

		$nData = array(
			'titlePage' => 'Search Product',
			'subview'   => 'product/search_product',
			'results'   => $this->product_model->search_std($keyword)
		);
		$this->load->view('product/main', $nData);
	}

	public function details($id = null){
		$this->load->model('product_model');

		$temp = "SP".rand(000000001, 9999999999)."VN";

		$nData = array(
			'bd'        => $temp,
			'subview'   => "product/product_details",
			'titlePage' => "Product details",
			'info' => $this->product_model->getProById($id)
		);
		//$this->set_barcode($id);

		//$data['info'] = $this->product_model->getProById($id);
		$this->load->view('product/main', $nData);
	}

	public function set_barcode($code=null){
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		// generate Barcode
		Zend_Barcode::render('code128', 'image', array('text'=>$code), array());

        //return $imageResource;
	}
}

/* End of file Product.php */
/* Location: ./application/controllers/Product.php */