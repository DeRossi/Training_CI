<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students_model extends CI_Model {
	private $_tables = "students";

	public function create($data){
		if($this->db->insert($this->_tables, $data)){
			return true;
		}
		else
			return false;
		//return bool
	}

	public function update($id, $data){
		//$data["id"]
		$this->db->where('id', $id);
		if($this->db->update($this->_tables, $data)){
			return true;
		}
		else
			return false;
		//return bool
	}

	public function find($id){
		$this->db->where('id', $id);
		return $this->db->get($this->_tables)->row_array();

		// get()->row()
		// get()->row_array()
		//return object
	}
}

/* End of file students_model.php */
/* Location: ./application/models/students_model.php */