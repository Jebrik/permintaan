<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMonitoring extends CI_Model {

	public function getMonitoring()
	{
		$this->db->select('*');
		$this->db->from('monitoring_aset a');
		$this->db->join('asets b', 'b.id_aset = a.id_aset');
		$this->db->join('barang c', 'c.id_barang = b.id_barang');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function storeMonitoring($data)
	{
		$query = $this->db->insert('monitoring_aset', $data);
		return $query;
	}

	public function getDetailAset($id_monitoring)
	{
		$this->db->select('*');
		$this->db->from('monitoring_aset a');
		$this->db->join('asets b', 'b.id_aset = a.id_aset');
		$this->db->join('barang c', 'c.id_barang = b.id_barang');
		$this->db->join('lokasi_aset d', 'd.id_lokasi = b.id_lokasi');
		$this->db->join('kategori_barang e', 'e.id_kategori = c.id_kategori');
		$this->db->where('id_monitoring', $id_monitoring);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getDetailMonitoring($id_monitoring)
	{
		$this->db->select('*');
		$this->db->from('monitoring_aset a');
		$this->db->join('asets b', 'b.id_aset = a.id_aset');
		$this->db->join('barang c', 'c.id_barang = b.id_barang');
		$this->db->join('lokasi_aset d', 'd.id_lokasi = b.id_lokasi');
		$this->db->join('kategori_barang e', 'e.id_kategori = c.id_kategori');
		$this->db->where('id_monitoring', $id_monitoring);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function updateMonitoring($id_monitoring,$data){
        $this->db->where(array('id_monitoring' => $id_monitoring));
        $res = $this->db->update('monitoring_aset',$data);
        return $res;
    }

}

/* End of file ModelMonitoring.php */
/* Location: ./application/models/ModelMonitoring.php */