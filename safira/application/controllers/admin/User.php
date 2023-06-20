<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	//Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');


	}

	//Halaman Utama
	public function index()
	{
						     if($this->session->userdata('akses_level') != "Admin"){
            $this->session->set_flashdata('terbatas', 'Hak akses anda terbatas');
            redirect(base_url('admin/dasbor'),'refresh');
        }
        
		$user = $this->user_model->listing();
		$data = array( 'title'  	=>'Data User ('.count($user).')',
					   'user'		=> $user,
					   'isi'		=>'admin/user/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	    function get_info()
    {
        $id = $this->input->get('id_karyawan');

        
        $info = $this->db->select("karyawan.*")
                                         ->from("karyawan")
                                         ->where("id_karyawan",$id)
                                         ->get()
                                         ->row();
        echo json_encode($info);
                                         
    }

	//Halaman Tambah
	public function tambah() {

        $karyawan = $this->user_model->karyawan();


				     if($this->session->userdata('akses_level') != "Admin"){
            $this->session->set_flashdata('terbatas', 'Hak akses anda terbatas');
            redirect(base_url('admin/dasbor'),'refresh');
        }
		//Validasi 
		$valid = $this->form_validation;

		$valid->set_rules('id_karyawan','id_karyawan','required',
			array(	'required' 		=>'Id Karyawan harus diisi'));

		$valid->set_rules('nama','Nama','required',
			array(	'required' 		=>'Nama harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
			array(	'required' 		=>'Email harus diisi',
					'valid_email'	=>'Format email tidak benar'));

		$valid->set_rules('username','Username','required|is_unique[admin.username]',
			array(	'required' 		=>'Username harus diisi',
					'is_unique'		=>'Username <strong>'.$this->input->post('username').
									  '</strong> sudaha ada. Buat username baru'));


		$valid->set_rules('password','Password','required|min_length[6]',
			array(	'required' 		=>'Password harus diisi',
					'min_length	'	=>'Password minimal 6 karakter'));

		if($valid->run()=== FALSE) {
		//END Validasi


		$data = array( 'title'  	=>'Tambah User',
    			   'karyawan'         => $karyawan,

			   		   'isi'		=>'admin/user/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);	
		//Ga ada Error, maka masuk database
		}else{
			$i = $this->input;
			$data = array( 'id_karyawan'		=> $i->post('id_karyawan'),
				           'nama'				=> $i->post('nama'),
						   'email'				=> $i->post('email'),
						   'username'			=> $i->post('username'),
						   'password'			=> sha1($i->post('password')),
						   'akses_level'		=> $i->post('akses_level'),
						   'keterangan'			=> $i->post('keterangan'),

						);

			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data talah ditambah');
			redirect(base_url('admin/user'),'refresh');
		}
		// End masuk database	
	} 

	//Halaman Edit
	public function edit($id_user) {
		$user = $this->user_model->detail($id_user);

		//Validasi 
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
			array(	'required' 		=>'Nama harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
			array(	'required' 		=>'Email harus diisi',
					'valid_email'	=>'Format email tidak benar'));

		

		if($valid->run()=== FALSE) {
		//END Validasi


		$data = array( 'title'  	=>'Edit User: '.$user->nama,
					   'user'		=> $user,
			   		   'isi'		=>'admin/user/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);	
		//Ga ada Error, maka masuk database
		}else{
			$i = $this->input;

			//jika input password lebih dari 6 karakter
			if(strlen($i->post('password')) >6) {
			$data = array( 'id_user'			=> $id_user,
						   'nama'				=> $i->post('nama'),
						   'email'				=> $i->post('email'),
						   'password'			=> sha1($i->post('password')),
						   'akses_level'		=> $i->post('akses_level'),
						   'keterangan'			=> $i->post('keterangan')

						);
			}else{
				$data = array( 'id_user'			=> $id_user,
							   'nama'				=> $i->post('nama'),
						 	   'email'				=> $i->post('email'),
						   	   'akses_level'		=> $i->post('akses_level'),
						       'keterangan'			=> $i->post('keterangan')
						);

			}
			//End if
			 if($this->session->userdata('akses_level') != "Admin"){ 

			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data talah diudate');
			redirect(base_url('admin/dasbor'),'refresh');

          }else {
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data talah diudate');
			redirect(base_url('admin/user'),'refresh');
		}

		}
		// End masuk database	
	} 

	// Delete
	public function delete($id_user){
		//proteksi hapus disini
		if($this->session->userdata('username') == "" && $this->session->userdata('akses_level')=="") {
			$this->session->set_flashdata('sukses','Silahkan Login dahulu');
			redirect(base_url('login'),'refresh');
		}
		//End Proteksi
		
		$data = array('id_user'			=>$id_user);
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data talah dihapus');
		redirect(base_url('admin/user'),'refresh');
	}
}

