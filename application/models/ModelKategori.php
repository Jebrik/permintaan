<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelKategori extends CI_Model {

	public function getKategoriBarang()
	{
		$query = $this->db->get('kategori_barang');
		return $query->result_array();
	}

	public function storeKategoriBarang($data)
	{
		$query = $this->db->insert('kategori_barang', $data);
		return $query;
	}

	public function updateKategoriBarang($id_kategori,$data){
        $this->db->where(array('id_kategori' => $id_kategori));
        $res = $this->db->update('kategori_barang',$data);
        return $res;
    }

    public function deleteKategoriBarang($where)
	{
		$this->db->where($where);
		$res = $this->db->delete("kategori_barang");
		return $res;
	}

}

/* End of file ModelJenisBarang.php */
/* Location: ./application/models/ModelJenisBarang.php */