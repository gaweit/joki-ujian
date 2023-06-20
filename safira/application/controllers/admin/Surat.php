<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Surat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Surat_model');
        $this->load->library('form_validation');
        $this->load->library('pdf');
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $id_karyawan = $this->session->userdata('id_karyawan');
        $surat = $this->Surat_model->bagisurat($id_user,$id_karyawan);
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'surat/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'surat/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'surat/index.html';
            $config['first_url'] = base_url() . 'surat/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Surat_model->total_rows($q);
        // $surat = $this->Surat_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'surat_data' => $surat,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,

            'title'      => 'Data surat',
            'isi'        => 'admin/surat/surat_list'
        );
        // var_dump($data);
        // die;
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function read($id)
    {
        $row = $this->Surat_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_surat' => $row->id_surat,
                'kepada' => $row->kepada,
                'dari' => $row->dari,

                'title'      => 'Detail Data surat',
                'isi'        => 'admin/surat/surat_read'
            );

            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/surat'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => base_url('admin/surat/create_action'),
            'id_surat' => set_value('id_surat'),
            'kepada' => set_value('kepada'),
            'dari' => set_value('dari'),
            'tgl_surat' => set_value('tgl_surat'),
            'lampiran' => set_value('lampiran'),
            'perihal' => set_value('perihal'),
            'latar_belakang' => set_value('latar_belakang'),
            'maksud_tujuan' => set_value('maksud_tujuan'),
            'permasalahan' => set_value('permasalahan'),
            'usulan' => set_value('usulan'),
            'penutup' => set_value('penutup'),
            'diketahui_oleh' => set_value('diketahui_oleh'),
            'nama_diketahui' => set_value('nama_diketahui'),
            'nipp_diketahui' => set_value('nipp_diketahui'),
            'nama_dibuat' => set_value('nama_dibuat'),
            'nipp_dibuat' => set_value('nipp_dibuat'),

            'title'          => 'Tambah Data surat',
            'isi'            => 'admin/surat/surat_form'
        );

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kepada' => $this->input->post('kepada', TRUE),
                'dari' => $this->input->post('dari', TRUE),
                'tgl_surat' => $this->input->post('tgl_surat', TRUE),
                'lampiran' => $this->input->post('lampiran', TRUE),
                'perihal' => $this->input->post('perihal', TRUE),
                'latar_belakang' => $this->input->post('latar_belakang', TRUE),
                'maksud_tujuan' => $this->input->post('maksud_tujuan', TRUE),
                'permasalahan' => $this->input->post('permasalahan', TRUE),
                'usulan' => $this->input->post('usulan', TRUE),
                'penutup' => $this->input->post('penutup', TRUE),
                'diketahui_oleh' => $this->input->post('diketahui_oleh', TRUE),
                'nama_diketahui' => $this->input->post('nama_diketahui', TRUE),
                'nipp_diketahui' => $this->input->post('nipp_diketahui', TRUE),
                'nama_dibuat' => $this->input->post('nama_dibuat', TRUE),
                'nipp_dibuat' => $this->input->post('nipp_dibuat', TRUE),
            );

            $this->Surat_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(base_url('admin/surat'));
        }
    }

    public function update($id)
    {
        $row = $this->Surat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => base_url('admin/surat/update_action'),
                'id_surat' => set_value('id_surat', $row->id_surat),
                'kepada' => set_value('kepada', $row->kepada),
                'dari' => set_value('dari', $row->dari),
                'tgl_surat' => set_value('tgl_surat', $row->tgl_surat),
                'lampiran' => set_value('lampiran', $row->lampiran),
                'perihal' => set_value('perihal', $row->perihal),
                'latar_belakang' => set_value('latar_belakang', $row->latar_belakang),
                'maksud_tujuan' => set_value('maksud_tujuan', $row->maksud_tujuan),
                'permasalahan' => set_value('permasalahan', $row->permasalahan),
                'usulan' => set_value('usulan', $row->usulan),
                'penutup' => set_value('penutup', $row->penutup),
                'diketahui_oleh' => set_value('diketahui_oleh', $row->diketahui_oleh),
                'nama_diketahui' => set_value('nama_diketahui', $row->nama_diketahui),
                'nipp_diketahui' => set_value('nipp_diketahui', $row->nipp_diketahui),
                'nama_dibuat' => set_value('nama_dibuat', $row->nama_dibuat),
                'nipp_dibuat' => set_value('nipp_dibuat', $row->nipp_dibuat),

                'title'                => 'Edit Data surat',
                'isi'                  => 'admin/surat/surat_form'
            );

            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/surat'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_surat', TRUE));
        } else {
            $data = array(
                'kepada' => $this->input->post('kepada', TRUE),
                'dari' => $this->input->post('dari', TRUE),
                'tgl_surat' => $this->input->post('tgl_surat', TRUE),
                'lampiran' => $this->input->post('lampiran', TRUE),
                'perihal' => $this->input->post('perihal', TRUE),
                'latar_belakang' => $this->input->post('latar_belakang', TRUE),
                'maksud_tujuan' => $this->input->post('maksud_tujuan', TRUE),
                'permasalahan' => $this->input->post('permasalahan', TRUE),
                'usulan' => $this->input->post('usulan', TRUE),
                'penutup' => $this->input->post('penutup', TRUE),
                'diketahui_oleh' => $this->input->post('diketahui_oleh', TRUE),
                'nama_diketahui' => $this->input->post('nama_diketahui', TRUE),
                'nipp_diketahui' => $this->input->post('nipp_diketahui', TRUE),
                'nama_dibuat' => $this->input->post('nama_dibuat', TRUE),
                'nipp_dibuat' => $this->input->post('nipp_dibuat', TRUE),
            );

            $this->Surat_model->update($this->input->post('id_surat', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url('admin/surat'));
        }
    }

    public function delete($id)
    {
        $row = $this->Surat_model->get_by_id($id);

        if ($row) {
            $this->Surat_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url('admin/surat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/surat'));
        }
    }

    public function print($id)
    {
        // $row = $this->Surat_model->get_by_id($id);

        $surat = $this->Surat_model->get_cetak($id);
        $data = array(
            'title'     => 'Cetak Surat Telaah',

            'id_surat' => $surat->id_surat,
            'kepada' => $surat->kepada,
            'dari' => $surat->dari,
            'tgl_surat' => $surat->tgl_surat,
            'lampiran' => $surat->lampiran,
            'perihal' => $surat->perihal,
            'latar_belakang' => $surat->latar_belakang,
            'maksud_tujuan' => $surat->maksud_tujuan,
            'permasalahan' => $surat->permasalahan,
            'usulan' => $surat->usulan,
            'penutup' => $surat->penutup,
            'diketahui_oleh' => $surat->diketahui_oleh,
            'nama_diketahui' => $surat->nama_diketahui,
            'nipp_diketahui' => $surat->nipp_diketahui,
            'nama_dibuat' => $surat->nama_dibuat,
            'nipp_dibuat' => $surat->nipp_dibuat,

            'title'      => 'Detail Data surat',
            'surat' => $surat
        );

        $this->load->view('admin/surat/cetak_surat', $data);
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kepada', 'bagian karyawan', 'trim|required');
        $this->form_validation->set_rules('dari', 'dari', 'trim|required');

        $this->form_validation->set_rules('id_surat', 'id_surat', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}