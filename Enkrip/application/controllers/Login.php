<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('Excel');
	}

	//Halaman Login
	public function index()
	{
		//Validasi
		$valid = $this->form_validation;

		$valid->set_rules(
			'username',
			'Username',
			'required',
			array('required'		=> 'Username harus diisi')
		);

		$valid->set_rules(
			'password',
			'Password',
			'required|min_length[6]',
			array(
				'required'		=> 'Password harus diisi',
				'min_length'		=> 'Password minimal 6 karakter'
			)
		);

		if ($valid->run() === FALSE) {
			//End Validasi

			$data = array('title'	    => 'Sistem Informasi ');
			$this->load->view('admin/login_view', $data, FALSE);
			//Check Username dan Password compere dengan database
		} else {
			$i 					= $this->input;
			$username 			= $i->post('username');
			$password 			= $i->post('password');
			//chech di databese
			
				$check_login		= $this->User_model->login($username, $password);
			//Kalau ada recordnya maka create session dan redirect ke halaman dasbor
	
			if (count($check_login) == 1) {
	
			if ($check_login->akses_level == "siswa") {
				$this->session->set_userdata('akses_level', $check_login->akses_level);
				$this->session->set_userdata('id_user', $check_login->id_user);	
				$this->session->set_userdata('nama', $check_login->nama);
				$this->session->set_userdata('nyawa', $check_login->nyawa);
				redirect(base_url('user/utama'), 'refresh');
			}else{
				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('akses_level', $check_login->akses_level);
				$this->session->set_userdata('id_user', $check_login->id_user);
				$this->session->set_userdata('id_karyawan', $check_login->id_karyawan);
				$this->session->set_userdata('nama', $check_login->nama);

				$this->session->set_flashdata('sukses', 'Login Berhasil');
				$this->User_model->user_aktif($username);
				redirect(base_url('admin/dasbor'), 'refresh');
			}
				
			} else {
				//Username password tidak cocok, error
				$this->session->set_flashdata('danger', ' username atau password tidak cocok');
				redirect(base_url('login'), 'refresh');
			}
		}
		//End Checking
	}
	//Logout
	public function logout()
	{
		$username = $this->session->userdata('username');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('akses_level');
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('nama');
		$this->session->set_flashdata('sukses', ' Anda berhasil logout');
		$this->User_model->user_off($username);
		redirect(base_url('login'), 'refresh');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */