<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaanbarang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
	    }

		//load model
		$this->load->model('ModelPermintaan','mp');
		$this->load->model('ModelBarang','mb');
		$this->load->model('ModelKategori','mjb');
	}

	//menampilkan data permintaan
	public function index()
	{
		$data = array(
			'title' => 'Data permintaan',
			'active_menu_master' => 'menu-open',
			'active_menu_mst' => 'active',
			'active_menu_brg' => 'active',
			'permintaan' => $this->mp->getDatapermintaan()  
		);
			
		$this->load->view('layouts/header',$data);
		$this->load->view('permintaan/v_permintaan',$data);
		$this->load->view('layouts/footer');
	}

	public function tambahpermintaan()
	{
		$data = array(
			'title' => 'Data permintaan',
			'active_menu_master' => 'menu-open',
			'active_menu_mst' => 'active',
			'active_menu_brg' => 'active',
			'jb' => $this->mjb->getKategoripermintaan() 
		);
			
		$this->load->view('layouts/header',$data);
		$this->load->view('master/c_permintaan',$data);
		$this->load->view('layouts/footer');
	}

	public function simpanpermintaan()
	{
		$data = $this->input->post(null,true);
		$result = $this->mb->storepermintaan($data);

		if($result>=1){
			$this->session->set_flashdata('sukses', 'Disimpan');
			redirect('permintaan');
		}else{
			$this->session->set_flashdata('gagal', 'Disimpan');
			redirect('permintaan/tambah');
		}
	}

	public function editpermintaan($id_permintaan)
	{
		$id_permintaan = $this->uri->segment(3);

		$data = array(
			'title' => 'Data permintaan',
			'active_menu_master' => 'menu-open',
			'active_menu_mst' => 'active',
			'active_menu_brg' => 'active',
			'brg' => $this->mb->getDetailpermintaan($id_permintaan),
			'jb' => $this->mjb->getKategoripermintaan() 
		);
			
		$this->load->view('layouts/header',$data);
		$this->load->view('master/u_permintaan',$data);
		$this->load->view('layouts/footer');
	}

	public function ubahpermintaan()
	{
		$id_permintaan = $this->input->post('id_permintaan');
		$data = $this->input->post(null,true);
		unset($data['id_permintaan']);
		$result = $this->mb->updatepermintaan($id_permintaan,$data);
		if($result>=1){
			$this->session->set_flashdata('sukses', 'Diubah');
			redirect('permintaan');
		}else{
			$this->session->set_flashdata('gagal', 'Diubah');
			redirect('permintaan/edit/'.$id_permintaan);
		}
	}

	public function hapuspermintaan($id_permintaan)
	{
		$id_permintaan = $this->uri->segment(3);
		$where = array( 'id_permintaan' => $id_permintaan );
		$res = $this->mb->deletepermintaan($where);
		if($res>=1){
			$this->session->set_flashdata('sukses', 'Dihapus');
			redirect('permintaan');
		}else{
			$this->session->set_flashdata('gagal', 'Dihapus');
			redirect('permintaan');
		}
	}

}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */