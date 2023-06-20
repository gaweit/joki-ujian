<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
                             if($this->session->userdata('akses_level') != "Admin"){
            $this->session->set_flashdata('terbatas', 'Hak akses anda terbatas');
            redirect(base_url('admin/dasbor'),'refresh');
        }
        
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'karyawan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'karyawan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'karyawan/index.html';
            $config['first_url'] = base_url() . 'karyawan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Karyawan_model->total_rows($q);
        $karyawan = $this->Karyawan_model->listing($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'karyawan_data' => $karyawan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,

            'title'      =>'Data Karyawan',
            'isi'        =>'admin/karyawan/karyawan_list');

             $this->load->view('admin/layout/wrapper', $data, FALSE);  
    }

    public function read($id) 
    {
        $row = $this->Karyawan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_karyawan' => $row->id_karyawan,
		'nama' => $row->nama,
        'NIK' => $row->NIK,
		'jenis_kelamin' => $row->jenis_kelamin,
		'alamat' => $row->alamat,
		'no_hp' => $row->no_hp,
		'id_bidang' => $row->id_bidang,
		'foto' => $row->foto,

        'title'      =>'Detail Karyawan',
        'isi'        =>'admin/karyawan/karyawan_read');

        $this->load->view('admin/layout/wrapper', $data, FALSE); 
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/karyawan'));
        }
    }

    public function create() 
    {
        $bidang = $this->Karyawan_model->bidang();

        $data = array(
            'button' => 'Simpan',
            'action' => base_url('admin/karyawan/create_action'),
	    'id_karyawan' => set_value('id_karyawan'),
	    'nama' => set_value('nama'),
        'NIK' => set_value('NIK'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'alamat' => set_value('alamat'),
	    'no_hp' => set_value('no_hp'),
	    'id_bidang' => set_value('id_bidang'),
	    'foto' => set_value('foto'),

       'title'          =>'Tambah Data Karyawan',
       'bidang'         => $bidang,
       'isi'            =>'admin/karyawan/karyawan_form');

       $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
        'NIK' => $this->input->post('NIK',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
		'id_bidang' => $this->input->post('id_bidang',TRUE),
		'foto' => upload_gambar_biasa('karyawan','gambar/thumb','jpg|png',10000,'foto'),
	    );

            $this->Karyawan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(base_url('admin/karyawan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Karyawan_model->get_by_id($id);
        $bidang = $this->Karyawan_model->bidang();


        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => base_url('admin/karyawan/update_action'),
		'id_karyawan' => set_value('id_karyawan', $row->id_karyawan),
		'nama' => set_value('nama', $row->nama),
        'NIK' => set_value('NIK', $row->NIK),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'alamat' => set_value('alamat', $row->alamat),
		'no_hp' => set_value('no_hp', $row->no_hp),
		'id_bidang' => set_value('id_bidang', $row->id_bidang),
		'foto' => set_value('foto', $row->foto),

        'title'                =>'Edit Data Karyawan',
        'bidang'               => $bidang,
        'isi'                  =>'admin/karyawan/karyawan_form');

        $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/karyawan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules1();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_karyawan', TRUE));
        } else {
             if ($_FILES['foto']['name']=='') {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
        'NIK' => $this->input->post('NIK',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
		'id_bidang' => $this->input->post('id_bidang',TRUE),
	    );

            $this->Karyawan_model->update($this->input->post('id_karyawan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url('admin/karyawan'));
        } else {
                  $data = array(
        'nama' => $this->input->post('nama',TRUE),
        'NIK' => $this->input->post('NIK',TRUE),
        'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
        'alamat' => $this->input->post('alamat',TRUE),
        'no_hp' => $this->input->post('no_hp',TRUE),
        'id_bidang' => $this->input->post('id_bidang',TRUE),
        'foto' => upload_gambar_biasa('karyawan','gambar/thumb','jpg|png',10000,'foto'),
        );

            $this->Karyawan_model->update($this->input->post('id_karyawan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url('admin/karyawan'));
         }
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Karyawan_model->get_by_id($id);

        if ($row) {
            $this->Karyawan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url('admin/karyawan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/karyawan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
    $this->form_validation->set_rules('NIK', 'NIK', 'required|is_unique[karyawan.NIK]');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
	$this->form_validation->set_rules('id_bidang', 'id bidang', 'trim|required');
	// $this->form_validation->set_rules('foto', 'foto', 'trim|required');

	$this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

        public function _rules1() 
    {
    $this->form_validation->set_rules('nama', 'nama', 'trim|required');
    $this->form_validation->set_rules('NIK', 'NIK', 'trim|required');
    $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
    $this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
    $this->form_validation->set_rules('id_bidang', 'id bidang', 'trim|required');
    // $this->form_validation->set_rules('foto', 'foto', 'trim|required');

    $this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

