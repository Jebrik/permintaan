<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPenghapusan extends CI_Model {

	public function storePenghapusan($data)
	{
		$query = $this->db->insert('penghapusan', $data);
		return $query;
	}

	public function updateAset($id_aset,$x){
        $this->db->where(array('id_aset' => $id_aset));
        $res = $this->db->update('asets',$x);
        return $res;
    }

    public function getDetailAsetWujud($id_aset)
	{
		$this->db->select('volume');
		$this->db->from('asets');
		$this->db->where('id_aset', $id_aset);
		$query = $this->db->get();
		return $query->row_array(); 
	}

}

/* End of file ModelPenghapusan.php */
/* Location: ./application/models/ModelPenghapusan.php */