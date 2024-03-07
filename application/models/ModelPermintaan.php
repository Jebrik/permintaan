<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPermintaan extends CI_Model {

	public function getDatapermintaan()
	{
		$this->db->select('*');
		$this->db->from('permintaan a');
		$this->db->join('barang b', 'b.id_barang = a.id_barang');
		$this->db->join('kategori_barang c', 'c.id_kategori_barang = a.id_kategori_barang');
		$this->db->order_by('id_permintaan', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getDetailpermintaan($id_permintaan)
	{
		$this->db->select('*');
		$this->db->from('permintaan');
		$this->db->where('id_permintaan', $id_permintaan);
		$query = $this->db->get();
		return $query->result_array(); 
	}

	public function storepermintaan($data)
	{
		$query = $this->db->insert('permintaan', $data);
		return $query;
	}

	public function updatepermintaan($id_permintaan,$data){
        $this->db->where(array('id_permintaan' => $id_permintaan));
        $res = $this->db->update('permintaan',$data);
        return $res;
    }

    public function deletepermintaan($where)
	{
		$this->db->where($where);
		$res = $this->db->delete("permintaan");
		return $res;
	}

}

/* End of file Modelpermintaan.php */
/* Location: ./application/models/Modelpermintaan.php */