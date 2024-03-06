<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelLokasi extends CI_Model {

	public function getLokasi()
	{
		$query = $this->db->get('lokasi_aset');
		return $query->result_array();
	}

	public function storeLokasi($data)
	{
		$query = $this->db->insert('lokasi_aset', $data);
		return $query;
	}

	public function updateLokasi($id_lokasi,$data){
        $this->db->where(array('id_lokasi' => $id_lokasi));
        $res = $this->db->update('lokasi_aset',$data);
        return $res;
    }

    public function deleteLokasi($where)
	{
		$this->db->where($where);
		$res = $this->db->delete("lokasi_aset");
		return $res;
	}

}

/* End of file ModelLokasi.php */
/* Location: ./application/models/ModelLokasi.php */