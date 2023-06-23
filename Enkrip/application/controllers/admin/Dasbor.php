<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Dasbor extends CI_Controller
{

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	//Homepage
	public function index()
	{
        if ($this->session->userdata('akses_level') != "Admin") {
            $this->session->set_flashdata('terbatas', 'Hak akses anda terbatas');
            redirect(base_url(''), 'refresh');
        }
		$user = $this->User_model->listing();
		$peserta = $this->User_model->listpeserta();


		$data = array(
			'title'  => 'Selamat datang di Dashboard',
			'user'	 => '' . count($user) . '',
			'peserta' => $peserta,
			'hitungpeserta'	 => '' . count($peserta) . '',

			'isi'    => 'admin/dasbor/list'
		);
		// var_dump($data);
		// die;

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Profile
	public function profile()
	{
		$id_user = $this->session->userdata('id_user');
		$user = $this->user_model->detail($id_user);

		//Validasi 
		$valid = $this->form_validation;

		$valid->set_rules(
			'nama',
			'Nama',
			'required',
			array('required' 		=> 'Nama harus diisi')
		);

		$valid->set_rules(
			'email',
			'Email',
			'required|valid_email',
			array(
				'required' 		=> 'Email harus diisi',
				'valid_email'	=> 'Format email tidak benar'
			)
		);



		if ($valid->run() === FALSE) {
			//END Validasi


			$data = array(
				'title'  	=> ' Profile: ' . $user->nama,
				'user'		=> $user,
				'judul' 		=> 'APLIKASI PARKIR',
				'isi'		=> 'admin/dasbor/profile'
			);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
			//Ga ada Error, maka masuk database
		} else {
			$i = $this->input;

			//jika input password lebih dari 6 karakter
			if (strlen($i->post('password')) > 6) {
				$data = array(
					'id_user'			=> $id_user,
					'nama'				=> $i->post('nama'),
					'email'				=> $i->post('email'),
					'password'			=> sha1($i->post('password')),
					'akses_level'		=> $i->post('akses_level'),
					'keterangan'			=> $i->post('keterangan')

				);
			} else {
				$data = array(
					'id_user'			=> $id_user,
					'nama'				=> $i->post('nama'),
					'email'				=> $i->post('email'),
					'akses_level'		=> $i->post('akses_level'),
					'keterangan'			=> $i->post('keterangan')
				);
			}
			//End if
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Profile talah diupdate');
			redirect(base_url('admin/dasbor/profile'), 'refresh');
		}
		// End masuk database	
	}


	public function _rules()
	{
		$this->form_validation->set_rules('id_user', 'id user', 'trim');
		$this->form_validation->set_rules('url', 'url', 'trim|required');

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Dasbor.php */
/* Location: ./application/controllers/admin/Dasbor.php */