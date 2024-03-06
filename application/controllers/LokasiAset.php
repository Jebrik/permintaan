<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LokasiAset extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
	    }

	    $this->load->model('ModelLokasi','ml');
	}

	public function index()
	{
		$data = array(
			'title' => 'Lokasi Aset',
			'active_menu_master' => 'menu-open',
			'active_menu_mst' => 'active',
			'active_menu_lokasi' => 'active',
			'lokasi' => $this->ml->getLokasi()  
		);
	
		$this->load->view('layouts/header',$data);
		$this->load->view('master/v_lokasi',$data);
		$this->load->view('layouts/footer');
	}

	public function simpanLokasi()
	{
		$data = array(
			'nama_lokasi' => $this->input->post('nama_lokasi'),
			'updated_at' => date('Y-m-d H:i:s') 
		);

		$result = $this->ml->storeLokasi($data);

		if($result>=1){
			$this->session->set_flashdata('sukses', 'Disimpan');
			redirect('lokasi');
		}else{
			$this->session->set_flashdata('gagal', 'Disimpan');
			redirect('lokasi');
		}
	}

	public function ubahLokasi()
	{
		$id_lokasi = $this->input->post('id_lokasi');
		$data = array(
			'nama_lokasi' => $this->input->post('nama_lokasi'),
			'updated_at' => date('Y-m-d H:i:s') 
		);
		unset($data['id_lokasi']);
		$result = $this->ml->updateLokasi($id_lokasi,$data);

		if($result>=1){
			$this->session->set_flashdata('sukses', 'Diubah');
			redirect('lokasi');
		}else{
			$this->session->set_flashdata('gagal', 'Diubah');
			redirect('lokasi');
		}
	}

	public function hapusLokasi($id_lokasi)
	{
		$id_lokasi = $this->uri->segment(3);
		$where = array( 'id_lokasi' => $id_lokasi );
		$res = $this->ml->deleteLokasi($where);
		if($res>=1){
			$this->session->set_flashdata('sukses', 'Dihapus');
			redirect('lokasi');
		}else{
			$this->session->set_flashdata('gagal', 'Dihapus');
			redirect('lokasi');
		}
	}

}

/* End of file LokasiAset.php */
/* Location: ./application/controllers/LokasiAset.php */