<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	private $username;
	private $password;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('ModelLogin','ml');
	}

	public function index()
	{
		$this->load->view('auth/v_login');
	}

	public function proses_login()
	{
		$this->form_validation->set_rules('username','Username','required|min_length[5]',
			array(
				'required'=>"<p class='text-danger'>Username tidak boleh kosong</p>",
				'min_length'=>"<p class='text-danger'>Username minimal 5 Karakter</p>"
			)
		);
		$this->form_validation->set_rules('password','Password','required|min_length[5]',
			array(
				'required'=>"<p class='text-danger'>Password tidak boleh kosong</p>",
				'min_length'=>"<p class='text-danger'>Password minimal 5 Karakter</p>"
			)
		);

		if ($this->form_validation->run() != false) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$cek = $this->ml->login($username,md5($password));
			if ($cek == 1) {

				$row = $this->ml->data_login($username,md5($password));
				$data = array(
					'logged' => TRUE,
					'id_user' => $row->id_user,
					'username' => $row->username,
					'nama_user' => $row->nama_user,
					'jabatan' => $row->jabatan,
					'role' => $row->role,
					'foto' => $row->foto
				);
				$this->session->set_userdata($data);

				redirect('home');
			} else {
				$this->session->set_flashdata('gagal_login', 'Username dan Password Salah');
				redirect('login');
			}
		} else {
			$this->load->view('auth/v_login');
		}
		
	}

	public function proses_logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */