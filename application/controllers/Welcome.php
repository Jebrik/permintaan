<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('ModelAset','ma');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function halaman_notFound()
	{
		$this->load->view('layouts/error_page');
	}

	public function detailAset($id_aset)
	{
		$id_aset = $this->uri->segment(3);
		$data['aset'] = $this->ma->getDetailAsetWujud($id_aset);
		$this->load->view('aset/f_aset',$data);
	}
}
