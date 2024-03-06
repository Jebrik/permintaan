<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelUser extends CI_Model {

	public function getDataUser()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->result_array(); 
	}

	public function getDetailUser($id_user)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id_user', $id_user);
		$query = $this->db->get();
		return $query->result_array();
	}


	public function cekUsername($username)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $username);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function store_user($data)
	{
		$query = $this->db->insert('users', $data);
		return $query;
	}

	public function delete_user($where)
	{
		$this->db->where($where);
		$res = $this->db->delete("users");
		return $res;
	}

	public function update_user($id_user,$data_user){
		$this->db->where(array('id_user' => $id_user));
		$res = $this->db->update('users',$data_user);
		return $res;
	}	

}

/* End of file ModelUser.php */
/* Location: ./application/models/ModelUser.php */