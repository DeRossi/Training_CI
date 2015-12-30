<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students_model extends CI_Model {
	private $_table = "students";

	public function create($data){
		if($this->db->insert($this->_table, $data)){
			return true;
		}
		else
			return false;
		//return bool
	}

	public function insert($data){
		$this->db->insert($this->_table, $data);
	}

	public function update($id, $data){
		//$data["id"]
		$this->db->where('id', $id);
		$this->db->update($this->_table, $data);
	}

	public function find($id){
		$this->db->where('id', $id);
		return $this->db->get($this->_table)->row_array();

		// get()->row()
		// get()->row_array()
		//return object
	}

	public function getList(){
		$this->db->select('id, student_name, student_birth, student_sex, student_address');
		return $this->db->get($this->_table)->result_array();
	}

	public function countAll(){
		return $this->db->count_all($this->_table);
	}

	public function getUserById($id){
		$this->db->where("id", $id);
		return $this->db->get($this->_table)->row_array();
	}

	public function delete($id){
		$this->db->where("id", $id);
		$this->db->delete($this->_table);
	}

	public function search_std($data){
		if(empty($data)){
			return array();
		}

		$result = $this->db->like('student_name', $data)
		->or_like('student_address', $data)
		->get('students');
		return $result->result();
	}
}

/* End of file students_model.php */
/* Location: ./application/models/students_model.php */