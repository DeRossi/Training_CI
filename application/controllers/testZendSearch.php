<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestZendSearch extends CI_Controller {

	public function index()
	{

	}

	public function add(){
		......
//sau khi thêm sản phẩm thực hiện index sản phẩm đó để  tìm kiếm
		 $id = mysql_insert_id();//lấy id của sản phẩ vừa được add vào
		 /*Zend Search*/
		 $pro = array(
			'idpro'    => $id,
			'name'     => $this->input->post('name'),
			'name_en'  => convert_vi_to_en($this->input->post('name')),
			'catalog'  => $data['catalog'],
			'key'      => $data['key'],
			'key_en'   => convert_vi_to_en($data['key']),
		 );
		//print_r($pro);die();
		 $this->zend_search->save_item($pro,$options=array('task'=>'add'));
	 }

	 public function update($id){
		.......
//Khi cập nhật sản phẩm ta sẽ thực hiện cập nhật document có id_pro tương ứng
// Các thức hoạt động như sau : sẽ xóa document có id_pro tương ứng sau đó mới index dữ liệu mới vào
		$pro = array(
			'idpro'    => $id,
			'name'     => $this->input->post('name'),
			'name_en'  => convert_vi_to_en($this->input->post('name')),
			'catalog'  => $data['catalog'],
			'key'      => $data['key'],
			'key_en'   => convert_vi_to_en($data['key']),
		);
		$this->zend_search->save_item($pro,$options=array('task'=>'edit'));
	 }

	 public function delete($idProduct){
	 //thực hiện xóa document có id_pro tương ứng
		$pro['idpro'] = $idProduct;
		$this->zend_search->save_item($
	 }

/* End of file testZendSearch.php */
/* Location: ./application/controllers/testZendSearch.php */