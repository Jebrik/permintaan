<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelLogin extends CI_Model {

	function login($username,$password) {
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query =  $this->db->get('users');
		return $query->num_rows();
	}

	function data_login($username,$password) {
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('users')->row();
	}

}

/* End of file ModelLogin.php */
/* Location: ./application/models/ModelLogin.php */