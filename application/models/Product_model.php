<?phpdefined('BASEPATH') OR exit('No direct script access allowed');class Product_model extends CI_Model {	private $_table = "product";	public function create($data){		if($this->db->insert($this->_table, $data)){			return true;		}		else			return false;		//return bool	}	public function insert($data){		$this->db->insert($this->_table, $data);	}	public function update($id, $data){		$this->db->where('pro_id', $id);		$this->db->update($this->_table, $data);	}	public function find($id){		$this->db->where('id', $id);		return $this->db->get($this->_table)->row_array();		// get()->row()		// get()->row_array()		//return object	}	/*public function getList(){		$this->db->select('id, student_name, student_birth, student_sex, student_address');		return $this->db->get($this->_table)->result_array();	}*/	public function getList($total, $start){		$this->db->limit($total, $start);		$query = $this->db->get('product');		return $query->result_array();	}	public function countAll(){		return $this->db->count_all($this->_table);	}	public function getProById($id){		$this->db->where("pro_id", $id);		return $this->db->get($this->_table)->row_array();	}	public function delete($id){		$this->db->where("pro_id", $id);		$this->db->delete($this->_table);	}	public function search_proname($keyword_proname = null, $keyword_pricefrom = null, $keyword_priceto = null){		/*if(empty($keyword)){			$result = $this->db->get('product');			return $result->result();		}*/		$this->db->order_by('date_created', 'asc');		$result = $this->db->like('pro_name', $keyword_proname)->get('product');		if($keyword_proname && empty($keyword_pricefrom) && empty($keyword_priceto)){			$result = $this->db->like('pro_name', $keyword_proname)->get('product');		}		if($keyword_pricefrom){			$result = $this->db->where('pro_price >=', $keyword_pricefrom)->get('product');		}		if($keyword_priceto){			$result = $this->db->where('pro_price <=', $keyword_priceto)->get('product');		}		if($keyword_pricefrom && $keyword_priceto && $keyword_proname) {			$where = "SELECT * FROM product WHERE pro_price >= ? AND pro_price <= ? AND pro_name LIKE ?";			$result = $this->db->query($where, array($keyword_pricefrom, $keyword_priceto, $keyword_proname));		}		// cần tối ưu thêm câu truy vấn		return $result->result();		//return $result->result_array();	}}/* End of file product_model.php *//* Location: ./application/models/product_model.php */