<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelBarang extends CI_Model {

	public function getDataBarang()
	{
		$this->db->select('*');
		$this->db->from('barang a');
		$this->db->join('kategori_barang b', 'b.id_kategori = a.id_kategori');
		$this->db->order_by('id_barang', 'desc');
		$query = $this->db->get();
		return $query->result_array(); 
	}

	public function getDetailBarang($id_barang)
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->where('id_barang', $id_barang);
		$query = $this->db->get();
		return $query->result_array(); 
	}

	public function storeBarang($data)
	{
		$query = $this->db->insert('barang', $data);
		return $query;
	}

	public function updateBarang($id_barang,$data){
        $this->db->where(array('id_barang' => $id_barang));
        $res = $this->db->update('barang',$data);
        return $res;
    }

    public function deleteBarang($where)
	{
		$this->db->where($where);
		$res = $this->db->delete("barang");
		return $res;
	}

}

/* End of file ModelBarang.php */
/* Location: ./application/models/ModelBarang.php */