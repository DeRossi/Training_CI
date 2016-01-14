<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	private $_table = "user";

	function __construct(){
		parent::__construct();
	}

	public function get_user($user_name, $pwd){
		//$sql = "select * from user where user_name = '" . $user_name . "' and user_pass = '" . md5($pwd) . "' and user_stt = 'active'";
		$sql = "select * from user where user_name = '" . $user_name . "' and user_pass = '" . $pwd . "' and user_stt = 'active'";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

}
