<?phpdefined('BASEPATH') OR exit('No direct script access allowed');class Product_model extends CI_Model {	private $_table = "product";	public function create($data){		if($this->db->insert($this->_table, $data)){			return true;		}		else			return false;		//return bool	}	public function insert($data){		$this->db->insert($this->_table, $data);	}	public function update($id, $data){		$this->db->where('pro_id', $id);		$this->db->update($this->_table, $data);	}	public function find($id){		$this->db->where('id', $id);		return $this->db->get($this->_table)->row_array();		// get()->row()		// get()->row_array()		//return object	}	/*public function getList(){		$this->db->select('id, student_name, student_birth, student_sex, student_address');		return $this->db->get($this->_table)->result_array();	}*/	public function getList($total, $start){		$this->db->limit($total, $start);		$query = $this->db->get('product');		return $query->result_array();	}	public function countAll(){		return $this->db->count_all($this->_table);	}	public function getProById($id){		$this->db->where("pro_id", $id);		return $this->db->get($this->_table)->row_array();	}	public function delete($id){		$this->db->where("pro_id", $id);		$this->db->delete($this->_table);	}	public function search_proname($search = null){		// echo '<pre>'; print_r($search); echo '</pre>'; exit;		$query	= $this->db;		$where	= array();		if($search["keyword_proname"]){			$where["pro_name like"] = "%" . $search["keyword_proname"] . "%";		}		if($search["keyword_pricefrom"]){			$where["pro_price >= "] = $search["keyword_pricefrom"];		}		if($search['keyword_priceto']){			$where["pro_price <= "] = $search['keyword_priceto'];		}		// if ($search['keyword_pricefrom'] && $search['keyword_priceto']) {		// 	$where = array(		// 		"pro_price >=" => $search['keyword_pricefrom'],		// 		// "pro_price <= " => $search['keyword_priceto'],		// 	);		// }		// if($search['keyword']){		// 	$or_like = array(		// 		'article_title',		// 		'article_body',		// 		'article_sub_title',		// 	);		// 	array_walk($or_like, array($this, 'addLike'), $search['keyword']);		// 	$like = '(' . implode(' OR ', $or_like) . ')';		// 	$query->where($like);		// }		$query->where($where);		// $query->limit($limit,$offset);		$query->order_by('date_created','DESC');		// $table = ($lang) ? "article_" . $lang : "article_ja";		$results['search'] = $query->get("product")->result_array();		// echo '<pre>'; print_r($results); echo '</pre>'; exit;		// $total = $this->db->query($query)->row_array();		// $results['total'] = $total['total'];		return $results;	}}/* End of file product_model.php *//* Location: ./application/models/product_model.php */