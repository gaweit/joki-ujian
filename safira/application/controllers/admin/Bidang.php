<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bidang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Bidang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'bidang/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'bidang/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'bidang/index.html';
            $config['first_url'] = base_url() . 'bidang/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Bidang_model->total_rows($q);
        $bidang = $this->Bidang_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'bidang_data' => $bidang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,

            'title'      =>'Data Gejala',
            'isi'        =>'admin/bidang/bidang_list');

             $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }

    public function read($id) 
    {
        $row = $this->Bidang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_bidang' => $row->id_bidang,
		'bagian_karyawan' => $row->bagian_karyawan,
		'tugas' => $row->tugas,

        'title'      =>'Detail Data Gejala',
        'isi'        =>'admin/bidang/bidang_read');

        $this->load->view('admin/layout/wrapper', $data, FALSE); 
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/bidang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => base_url('admin/bidang/create_action'),
	    'id_bidang' => set_value('id_bidang'),
	    'bagian_karyawan' => set_value('bagian_karyawan'),
	    'tugas' => set_value('tugas'),

       'title'          =>'Tambah Data Gejala',
       'isi'            =>'admin/bidang/bidang_form');

       $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'bagian_karyawan' => $this->input->post('bagian_karyawan',TRUE),
		'tugas' => $this->input->post('tugas',TRUE),
	    );

            $this->Bidang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(base_url('admin/bidang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Bidang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => base_url('admin/bidang/update_action'),
		'id_bidang' => set_value('id_bidang', $row->id_bidang),
		'bagian_karyawan' => set_value('bagian_karyawan', $row->bagian_karyawan),
		'tugas' => set_value('tugas', $row->tugas),

        'title'                =>'Edit Data Gejala',
        'isi'                  =>'admin/bidang/bidang_form');

        $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/bidang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_bidang', TRUE));
        } else {
            $data = array(
		'bagian_karyawan' => $this->input->post('bagian_karyawan',TRUE),
		'tugas' => $this->input->post('tugas',TRUE),
	    );

            $this->Bidang_model->update($this->input->post('id_bidang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url('admin/bidang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Bidang_model->get_by_id($id);

        if ($row) {
            $this->Bidang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url('admin/bidang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/bidang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('bagian_karyawan', 'bagian karyawan', 'trim|required');
	$this->form_validation->set_rules('tugas', 'tugas', 'trim|required');

	$this->form_validation->set_rules('id_bidang', 'id_bidang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}