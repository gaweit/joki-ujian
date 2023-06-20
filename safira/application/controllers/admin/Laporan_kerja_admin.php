<?php
error_reporting(0);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_kerja_admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_kerja_model');
        $this->load->library('form_validation');
        $this->load->library('pdf');
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $id_karyawan = $this->session->userdata('id_karyawan');

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'laporan_kerja/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'laporan_kerja/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'laporan_kerja/index.html';
            $config['first_url'] = base_url() . 'laporan_kerja/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Laporan_kerja_model->total_rows($q);
        $laporan_kerja = $this->Laporan_kerja_model->listingadmin($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'laporan_kerja_data' => $laporan_kerja,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,

            'title'      =>'Data Laporan Kerja karyawan',
            'isi'        =>'admin/laporan_kerja/laporan_kerja_list_admin');
           $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }

        public function laporancetakperiode()
    {
        $tgl1 = $this->input->post('tgl_a');
        $tgl2 = $this->input->post('tgl_b');
        $nama = $this->input->post('nama');
        $status_laporan = $this->input->post('status_laporan');

        $laporan_kerja = $this->Laporan_kerja_model->tampil_tgl_nama($tgl1,$tgl2,$nama,$status_laporan);

        $data = array('title'     => 'Report Laporan Kerja',
                      'laporan_kerja' => $laporan_kerja);

                      $this->load->view('admin/laporan_kerja/cetak_laporan',$data);
    }

        public function laporancetak()
    {
        $data = array('title'             => 'Report Laporan Kerja',
                      'laporan_kerja'    => $this->Laporan_kerja_model->listingadminlaporan());
                      $this->load->view('admin/laporan_kerja/print_all_report',$data);
    }



                //Undduh File Laporan
    public function file_laporan($id_laporan_kerja){
        $file_laporan = $this->Laporan_kerja_model->detail($id_laporan_kerja);
        //Proses download
        $folder     = './file/laporan/';
        $file       = $file_laporan->file_laporan;
        force_download($folder.$file, NULL);
        }

    public function read($id) 
    {
        $row = $this->Laporan_kerja_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_laporan_kerja' => $row->id_laporan_kerja,
		'id_user' => $row->id_user,
		'id_karyawan' => $row->id_karyawan,
		'tanggal_lapor' => $row->tanggal_lapor,
		'file_laporan' => $row->file_laporan,
		'url' => $row->url,
		'status_laporan' => $row->status_laporan,

        'title'      =>'Detail Laporan Kerja',
        'isi'        =>'admin/laporan_kerja/laporan_kerja_read_admin');

        $this->load->view('admin/layout/wrapper', $data, FALSE); 
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/laporan_kerja'));
        }
    }

    public function create() 
    {
        $id_karyawan = $this->session->userdata('id_karyawan');
        $id_user     = $this->session->userdata('id_user');

        $data = array(
            'button' => 'Simpan',
            'action' => base_url('admin/laporan_kerja/create_action'),
	    'id_laporan_kerja' => set_value('id_laporan_kerja'),
	    'id_user' => set_value('id_user'),
	    'id_karyawan' => set_value('id_karyawan'),
	    'tanggal_lapor' => set_value('tanggal_lapor'),
	    'file_laporan' => set_value('file_laporan'),
	    'url' => set_value('url'),
	    'status_laporan' => set_value('status_laporan'),

       'title'            =>'Tambah Data Laporan Kerja',
        'id_karyawan'     => $id_karyawan,
        'user'            => $id_user,
       'isi'              =>'admin/laporan_kerja/laporan_kerja_form');

       $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_user' => $this->input->post('id_user',TRUE),
		'id_karyawan' => $this->input->post('id_karyawan',TRUE),
		'tanggal_lapor' => $this->input->post('tanggal_lapor',TRUE),
		'file_laporan' => upload_gambar_biasa('file_laporan','file/laporan','pdf',10000,'file_laporan'),
		'url' => $this->input->post('url',TRUE),
		'status_laporan' => $this->input->post('status_laporan',TRUE),
	    );

            $this->Laporan_kerja_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(base_url('admin/laporan_kerja'));
        }
    }
    
    public function update($id) 
    {
        $row         = $this->Laporan_kerja_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Proses Laporan',
                'action' => base_url('admin/Laporan_kerja_admin/update_action'),
		'id_laporan_kerja' => set_value('id_laporan_kerja', $row->id_laporan_kerja),
		'tanggal_lapor' => set_value('tanggal_lapor', $row->tanggal_lapor),
		'file_laporan' => set_value('file_laporan', $row->file_laporan),
		'url' => set_value('url', $row->url),
		'status_laporan' => set_value('status_laporan', $row->status_laporan),

        'title'                  =>'Edit Data Laporan Kerja',
        'isi'                    =>'admin/laporan_kerja/laporan_kerja_form_admin');

        $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/Laporan_kerja_admin'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_laporan_kerja', TRUE));
        } else {
            if ($_FILES['file_laporan']['name']=='')  {
            $data = array(

		'tanggal_lapor' => $this->input->post('tanggal_lapor',TRUE),
		'url' => $this->input->post('url',TRUE),
		'status_laporan' => $this->input->post('status_laporan',TRUE),
	    );

            $this->Laporan_kerja_model->update($this->input->post('id_laporan_kerja', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url('admin/Laporan_kerja_admin'));
        }else{
                        $data = array(

        'tanggal_lapor' => $this->input->post('tanggal_lapor',TRUE),
        'file_laporan' => upload_gambar_biasa('file_laporan','file/laporan','pdf',10000,'file_laporan'),
        'url' => $this->input->post('url',TRUE),
        'status_laporan' => $this->input->post('status_laporan',TRUE),
        );

            $this->Laporan_kerja_model->update($this->input->post('id_laporan_kerja', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url('admin/Laporan_kerja_admin'));
        }
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Laporan_kerja_model->get_by_id($id);

        if ($row) {
            $this->Laporan_kerja_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url('admin/laporan_kerja'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/laporan_kerja'));
        }
    }

    public function _rules() 
    {
	// $this->form_validation->set_rules('id_user', 'id user', 'trim');
	// $this->form_validation->set_rules('id_karyawan', 'id karyawan', 'trim');
	$this->form_validation->set_rules('tanggal_lapor', 'tanggal lapor', 'trim|required');
	// $this->form_validation->set_rules('file_laporan', 'file laporan', 'trim|required');
	$this->form_validation->set_rules('url', 'url', 'trim|required');
	$this->form_validation->set_rules('status_laporan', 'status laporan', 'trim');

	$this->form_validation->set_rules('id_laporan_kerja', 'id_laporan_kerja', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

