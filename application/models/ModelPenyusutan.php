<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPenyusutan extends CI_Model {

	public function getAsetWujud()
	{
		$this->db->select('*');
		$this->db->from('asets a');
		$this->db->join('barang b', 'b.id_barang = a.id_barang');
		$this->db->join('lokasi_aset c', 'c.id_lokasi = a.id_lokasi');
		$this->db->join('kategori_barang d', 'd.id_kategori = b.id_kategori');
		$this->db->where('volume !=', 0);
		$this->db->where('volume >', 0);
		$query = $this->db->get();
		return $query->result_array(); 
	}

	public function getFilterAsetWujud($id_kategori,$tahun_perolehan)
	{
		$this->db->select('*');
		$this->db->from('asets a');
		$this->db->join('barang b', 'b.id_barang = a.id_barang');
		$this->db->join('lokasi_aset c', 'c.id_lokasi = a.id_lokasi');
		$this->db->join('kategori_barang d', 'd.id_kategori = b.id_kategori');
		$this->db->where('b.id_kategori', $id_kategori);
		$this->db->where('tahun_perolehan', $tahun_perolehan);
		$query = $this->db->get();
		return $query->result_array(); 
	}

	public function getDetailAsetWujud($id_aset)
	{
		$this->db->select('*');
		$this->db->from('asets a');
		$this->db->join('barang b', 'b.id_barang = a.id_barang');
		$this->db->join('lokasi_aset c', 'c.id_lokasi = a.id_lokasi');
		$this->db->join('kategori_barang d', 'd.id_kategori = b.id_kategori');
		$this->db->where('id_aset', $id_aset);
		$query = $this->db->get();
		return $query->row_array(); 
	}

	public function getDetailAsetWujud1($id_aset)
	{
		$this->db->select('*');
		$this->db->from('asets a');
		$this->db->join('barang b', 'b.id_barang = a.id_barang');
		$this->db->join('lokasi_aset c', 'c.id_lokasi = a.id_lokasi');
		$this->db->join('kategori_barang d', 'd.id_kategori = b.id_kategori');
		$this->db->where('id_aset', $id_aset);
		$query = $this->db->get();
		return $query->row_array(); 
	}

	public function updateAset($id_aset,$data){
        $this->db->where(array('id_aset' => $id_aset));
        $res = $this->db->update('asets',$data);
        return $res;
    }

}

/* End of file ModelPenyusutan.php */
/* Location: ./application/models/ModelPenyusutan.php */