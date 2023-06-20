<?php
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
		$user = $this->User_model->listing();

		$data = array(
			'title'  => 'Selamat datang di Dashboard',
			'Tes'	 => '' . count($user) . '',

			'isi'    => 'admin/dasbor/list'
		);

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Profile
	public function profile()
	{
		$id_user = $this->session->userdata('id_user');
		$user = $this->User_model->detail($id_user);

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
				'title'  	=> 'Updata Profile: ' . $user->nama,
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
			$this->User_model->edit($data);
			$this->session->set_flashdata('sukses', 'Profile talah diupdate');
			redirect(base_url('admin/dasbor/profile'), 'refresh');
		}
		// End masuk database	
	}
}