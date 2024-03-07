<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelsatuan extends CI_Model {

	

	public function getDataSatuan()
	{
		$this->db->select('*');
		$this->db->from('satuan');
		$this->db->order_by('id_satuan', 'desc');
		$query = $this->db->get();
		return $query->result_array(); 
	}

	public function getDetailsatuan($id_satuan)
	{
		$this->db->select('*');
		$this->db->from('satuan');
		$this->db->where('id_satuan', $id_satuan);
		$query = $this->db->get();
		return $query->result_array(); 
	}

	public function storesatuan($data)
	{
		$query = $this->db->insert('satuan', $data);
		return $query;
	}

	public function updatesatuan($id_satuan,$data){
        $this->db->where(array('id_satuan' => $id_satuan));
        $res = $this->db->update('satuan',$data);
        return $res;
    }

    public function deletesatuan($where)
	{
		$this->db->where($where);
		$res = $this->db->delete("satuan");
		return $res;
	}

}

/* End of file Modelsatuan.php */
/* Location: ./application/models/Modelsatuan.php */