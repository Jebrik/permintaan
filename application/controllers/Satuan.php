<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
	    }

		//load model user
		$this->load->model('ModelSatuan','ms');
	}

	//menampilkan data user
	public function index()
	{
		$data = array(
			'title' => 'Data User',
			'active_menu_master' => 'menu-open',
			'active_menu_mst' => 'active',
			'active_menu_satuan' => 'active',
			'satuan' => $this->ms->getDatasatuan()  
		);
		$this->load->view('layouts/header',$data);
		$this->load->view('master/v_satuan',$data);
		$this->load->view('layouts/footer');
	}

	public function tambahUser()
	{
		$this->form_validation->set_rules('username','Username','required|min_length[5]',
			array(
				'required'=>"<p>Username tidak boleh kosong</p>",
				'min_length'=>"<p>Username minimal 5 Karakter</p>"
			)
		);
		$this->form_validation->set_rules('password','Password','required|min_length[5]',
			array(
				'required'=>"<p>Password tidak boleh kosong</p>",
				'min_length'=>"<p>Password minimal 5 Karakter</p>"
			)
		);

		if ($this->form_validation->run() != false) {

			$username = $this->input->post('username');
			$cek = $this->mu->cekUsername($username);
			if ($cek== 1) {
				$this->session->set_flashdata('gagal_store', 'Username sudah digunakan..');
				redirect('users');
			} else {
				$password = $this->input->post('password');
				$password_confirm = $this->input->post('password_confirm');
				if ($password == $password_confirm) {
					$data = array(
						'nama_user' => $this->input->post('nama_user'),
						'username' => $this->input->post('username'),
						'password' => md5($this->input->post('password')),
						'jabatan' => $this->input->post('jabatan'),
						'role' => $this->input->post('role') 
					);
					$res = $this->mu->store_user($data);
					if($res>=1){
						$this->session->set_flashdata('sukses', 'Disimpan');
						redirect('users');
					}else{
						$this->session->set_flashdata('gagal', 'Disimpan');
						redirect('users');
					}
				} else {
					$this->session->set_flashdata('gagal_store', 'Password yang anda masukan tidak sama..');
					redirect('users');
				}								
			}
		}else {
			$data = array(
				'title' => 'Data User',
				'active_menu_master' => 'menu-open',
				'active_menu_mst' => 'active',
				'active_menu_user' => 'active',
				'user' => $this->mu->getDataUser()  
			);
			$this->load->view('layouts/header',$data);
			$this->load->view('master/v_user',$data);
			$this->load->view('layouts/footer');
		}
	}

	public function hapusUser($id_user)
	{
		$id_user = $this->uri->segment(3);
		$where = array( 'id_user' => $id_user );
		$res = $this->mu->delete_user($where);
		if($res>=1){
			$this->session->set_flashdata('sukses', 'Dihapus');
			redirect('users');
		}else{
			$this->session->set_flashdata('gagal', 'Dihapus');
			redirect('users');
		}
	}

	public function pengaturan()
	{
		$data = array(
			'title' => 'Data User',
			'active_menu_png' => 'active',  
		);
		$this->load->view('layouts/header',$data);
		$this->load->view('master/v_pengaturan',$data);
		$this->load->view('layouts/footer');
	}

	public function updateUser()
	{
		$id_user = $this->session->userdata('id_user');
		if ($_FILES['foto']['name']){

			$config['upload_path'] = 'src/img/profile/'; 
			$config['allowed_types'] = 'gif|jpg|png';  
			$config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('foto')){
				$this->session->set_flashdata('gagal', 'Diupload');
				redirect('pengaturan');
			}else{
				$ambildata = $this->mu->getDetailUser($id_user);
				foreach($ambildata as $foto){
					unlink('src/img/profile/'.$foto['foto']);
				}

				$gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='src/img/profile/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '60%';
                $config['width']= 300;
                $config['height']= 300;
                $config['new_image']= 'src/img/profile/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $data_user = array(
                	'nama_user' => $this->input->post('nama_user'),
                	'username' => $this->input->post('username'),
                	'jabatan' => $this->input->post('jabatan'),
                	'foto' => $gbr['file_name']
                );

                unset($data_user['id_user']);
                $this->mu->update_user($id_user,$data_user);

               	$this->session->set_userdata($data_user);
				$this->session->set_flashdata('sukses', 'Diubah');
				redirect('pengaturan');
			}
		}else{ 		
			$data_user = array(
				'nama_user' => $this->input->post('nama_user'),
				'username' => $this->input->post('username'),
				'jabatan' => $this->input->post('jabatan'),
			);

			$id_user = $this->session->userdata('id_user');
			$query = $this->mu->update_user($id_user,$data_user);
			if ($query) {
				$this->session->set_userdata($data_user);
				$this->session->set_flashdata('sukses', 'Diubah');
				redirect('pengaturan');
			} else {
				$this->session->set_flashdata('gagal', 'Diubah');
				redirect('pengaturan');
			}
		}
	}

	public function updatePassword()
	{
		$this->form_validation->set_rules('password','Password Baru','required|min_length[5]',
			array(
				'required'=>"<p>Password tidak boleh kosong</p>",
				'min_length'=>"<p>Password minimal 5 Karakter</p>"
			)
		);

		if ($this->form_validation->run() != false) {

			$password = $this->input->post('password');
			$password_dua = $this->input->post('password_dua');
			if ($password == $password_dua) {
				
				$data_user = array(
					'password' => md5($this->input->post('password'))
				);

				$id_user = $this->session->userdata('id_user');
				$query = $this->mu->update_user($id_user,$data_user);
				if ($query) {
					$this->session->sess_destroy();
					redirect('login');
				} else {
					$this->session->set_flashdata('gagal', 'Diubah');
					redirect('pengaturan');
				}

			} else {
				$this->session->set_flashdata('gagal_store', 'Password yang anda masukan tidak sama..');
				redirect('pengaturan');
			}	

		}else {
			$data = array(
				'title' => 'Data User'  
			);
			$this->load->view('layouts/header',$data);
			$this->load->view('master/v_pengaturan',$data);
			$this->load->view('layouts/footer');
		}
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */