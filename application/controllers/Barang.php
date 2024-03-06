<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
	    }

		//load model
		$this->load->model('ModelBarang','mb');
		$this->load->model('ModelKategori','mjb');
	}

	//menampilkan data barang
	public function index()
	{
		$data = array(
			'title' => 'Data Barang',
			'active_menu_master' => 'menu-open',
			'active_menu_mst' => 'active',
			'active_menu_brg' => 'active',
			'barang' => $this->mb->getDataBarang()  
		);
			
		$this->load->view('layouts/header',$data);
		$this->load->view('master/v_barang',$data);
		$this->load->view('layouts/footer');
	}

	public function tambahBarang()
	{
		$data = array(
			'title' => 'Data Barang',
			'active_menu_master' => 'menu-open',
			'active_menu_mst' => 'active',
			'active_menu_brg' => 'active',
			'jb' => $this->mjb->getKategoriBarang() 
		);
			
		$this->load->view('layouts/header',$data);
		$this->load->view('master/c_barang',$data);
		$this->load->view('layouts/footer');
	}

	public function simpanBarang()
	{
		$data = $this->input->post(null,true);
		$result = $this->mb->storeBarang($data);

		if($result>=1){
			$this->session->set_flashdata('sukses', 'Disimpan');
			redirect('barang');
		}else{
			$this->session->set_flashdata('gagal', 'Disimpan');
			redirect('barang/tambah');
		}
	}

	public function editBarang($id_barang)
	{
		$id_barang = $this->uri->segment(3);

		$data = array(
			'title' => 'Data Barang',
			'active_menu_master' => 'menu-open',
			'active_menu_mst' => 'active',
			'active_menu_brg' => 'active',
			'brg' => $this->mb->getDetailBarang($id_barang),
			'jb' => $this->mjb->getKategoriBarang() 
		);
			
		$this->load->view('layouts/header',$data);
		$this->load->view('master/u_barang',$data);
		$this->load->view('layouts/footer');
	}

	public function ubahBarang()
	{
		$id_barang = $this->input->post('id_barang');
		$data = $this->input->post(null,true);
		unset($data['id_barang']);
		$result = $this->mb->updateBarang($id_barang,$data);
		if($result>=1){
			$this->session->set_flashdata('sukses', 'Diubah');
			redirect('barang');
		}else{
			$this->session->set_flashdata('gagal', 'Diubah');
			redirect('barang/edit/'.$id_barang);
		}
	}

	public function hapusBarang($id_barang)
	{
		$id_barang = $this->uri->segment(3);
		$where = array( 'id_barang' => $id_barang );
		$res = $this->mb->deleteBarang($where);
		if($res>=1){
			$this->session->set_flashdata('sukses', 'Dihapus');
			redirect('barang');
		}else{
			$this->session->set_flashdata('gagal', 'Dihapus');
			redirect('barang');
		}
	}

}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */