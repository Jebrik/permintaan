<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata("logged") <> 1) {
			redirect(site_url('login'));
		}

		$this->load->model('ModelAset', 'ma');
		$this->load->model('ModelStatistik', 'ms');
	}

	public function index()
	{
		$data = array(
			'title' => 'Dashboard',
			'active_menu_db' => 'active',
			'aset' => $this->ma->totalAset(),
			'wujud' => $this->ma->totalAsetWujud(),
			'hapuskan' => $this->ma->totalAsetHapuskan(),
			'kondisi' => $this->ms->getKondisiAset(),
			'ktgr' => $this->ms->getNamaKategoriAset(),
			'kode' => $this->ms->getKodeKategoriAset(),
			'bw' => $this->ms->getAsetWujud(),
			'ph' => $this->db->get('penghapusan')->num_rows()

		);
		$this->load->view('layouts/header', $data);
		$this->load->view('layouts/content', $data);
		$this->load->view('layouts/footer');
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */