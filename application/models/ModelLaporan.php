<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelLaporan extends CI_Model {

	public function getAsetWujud($id_lokasi,$tahun_perolehan)
	{
		$this->db->select('*');
		$this->db->from('asets a');
		$this->db->join('barang b', 'b.id_barang = a.id_barang');
		$this->db->where('volume !=', 0);
		$this->db->where('volume >', 0);
		$this->db->where('id_lokasi', $id_lokasi);
		$this->db->where('tahun_perolehan', $tahun_perolehan);
		$query = $this->db->get();
		return $query->result_array(); 
	}

	public function getAsetWujudExcel($id_lokasi,$tahun_perolehan)
	{
		$this->db->select('*');
		$this->db->from('asets a');
		$this->db->join('barang b', 'b.id_barang = a.id_barang');
		$this->db->where('volume !=', 0);
		$this->db->where('volume >', 0);
		$this->db->where('id_lokasi', $id_lokasi);
		$this->db->where('tahun_perolehan', $tahun_perolehan);
		$query = $this->db->get();
		return $query->result(); 
	}

	public function getAsetDihapuskan($id_lokasi,$tahun_perolehan)
	{
		$this->db->select('*');
		$this->db->from('penghapusan a');
		$this->db->join('asets b', 'b.id_aset = a.id_aset');
		$this->db->join('barang c', 'c.id_barang = b.id_barang');
		$this->db->where('id_lokasi', $id_lokasi);
		$this->db->where('tahun_perolehan', $tahun_perolehan);
		$query = $this->db->get();
		return $query->result_array(); 
	}

	public function getAsetDihapuskanExcel($id_lokasi,$tahun_perolehan)
	{
		$this->db->select('*');
		$this->db->from('penghapusan a');
		$this->db->join('asets b', 'b.id_aset = a.id_aset');
		$this->db->join('barang c', 'c.id_barang = b.id_barang');
		$this->db->where('id_lokasi', $id_lokasi);
		$this->db->where('tahun_perolehan', $tahun_perolehan);
		$query = $this->db->get();
		return $query->result(); 
	}

	public function getAsetQr($id_lokasi,$tahun_perolehan)
	{
		$this->db->select('*');
		$this->db->from('asets a');
		$this->db->join('barang b', 'b.id_barang = a.id_barang');
		$this->db->where('volume !=', 0);
		$this->db->where('volume >', 0);
		$this->db->where('id_lokasi', $id_lokasi);
		$this->db->where('tahun_perolehan', $tahun_perolehan);
		$this->db->where('qr_code !=', NULL);
		$query = $this->db->get();
		return $query->result_array(); 
	}

	public function getLokasi()
	{
		$query = $this->db->get('lokasi_aset');
		return $query->result_array();
	}

	public function getLokasiId($id_lokasi)
	{
		$this->db->select('*');
		$this->db->from('lokasi_aset');
		$this->db->where('id_lokasi', $id_lokasi);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getPengadaan($id_lokasi,$tahun_pengadaan)
	{
		$this->db->select('*');
		$this->db->from('pengadaan');
		$this->db->where('id_lokasi', $id_lokasi);
		$this->db->where('tahun_pengadaan', $tahun_pengadaan);
		$this->db->where('status', '1');
		$res = $this->db->get();
		return $res->result_array();
	}

	public function getPengadaanExcel($id_lokasi,$tahun_pengadaan)
	{
		$this->db->select('*');
		$this->db->from('pengadaan');
		$this->db->where('id_lokasi', $id_lokasi);
		$this->db->where('tahun_pengadaan', $tahun_pengadaan);
		$res = $this->db->get();
		return $res->result();
	}

}

/* End of file ModelLaporan.php */
/* Location: ./application/models/ModelLaporan.php */