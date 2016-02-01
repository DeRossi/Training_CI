<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {
	private $_table = "category";

	public function insert($data){
		$this->db->insert($this->_table, $data);
	}

	public function update($id, $data){
		$this->db->where('cate_id', $id);
		$this->db->update($this->_table, $data);
	}

	public function countAll(){
		return $this->db->count_all($this->_table);
	}

	public function delete($id){
		$this->db->where("cate_id", $id);
		$this->db->delete($this->_table);
	}


}

/* End of file Category.php */
/* Location: ./application/models/Category.php */