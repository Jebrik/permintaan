<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
	    }

		//load model
		$this->load->model('ModelStatistik','ms');
	}

	public function index()
	{
		$data = array(
			'title' => 'Statistik Aset',
			'active_menu_statistik' => 'active',
			'kondisi' => $this->ms->getKondisiAset(),
			'ktgr' => $this->ms->getNamaKategoriAset(),
			'kode' => $this->ms->getKodeKategoriAset(),
			'bw' => $this->ms->getAsetWujud(),
			'ph' => $this->db->get('penghapusan')->num_rows()  
		);

		$this->load->view('layouts/header',$data);
		$this->load->view('statistik/v_statistik',$data);
		$this->load->view('layouts/footer');
	}

}

/* End of file Statistik.php */
/* Location: ./application/controllers/Statistik.php */