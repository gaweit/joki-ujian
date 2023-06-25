<?php

// error_reporting(0);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Materi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Materi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $materi = $this->Materi_model->get_all();
        $urutan = 0;
        $start = $urutan++; //no urut to start


        $data = array(
            'materi_data' => $materi,
            'start' => $start,

            'title'      => 'Data Dokumen',
            'isi'        => 'admin/materi/materi_list'
        );

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function read($id)
    {
        $row = $this->Materi_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_dokumen' => $row->id_dokumen,
                'id_user' => $row->id_user,
                'nama_dokumen' => $row->nama_dokumen,
                'nama_enkrip' => $row->nama_enkrip,
                'tgl' => $row->tgl,

                'title'      => 'Detail Data Dokumen',
                'isi'        => 'admin/materi/materi_read'
            );

            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/materi'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => base_url('admin/materi/create_action'),
            'id_dokumen' => set_value('id_dokumen'),
            'id_user' => set_value('id_user'),
            'nama_dokumen' => set_value('nama_dokumen'),
            'nama_enkrip' => set_value('nama_enkrip'),
            'tgl' => set_value('tgl'),

            'title'          => 'Tambah Data Dokumen',
            'isi'            => 'admin/materi/materi_form'
        );
        // var_dump($data);
        // die();

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_user' => $this->input->post('id_user', TRUE),
                'nama_dokumen' => upload_gambar_biasa2('7c4a8d09ca3762af61e59520943dc26494f8941b','file/dokumen','jpg|png',10000,'nama_dokumen'),
                'nama_enkrip' => upload_gambar_biasa2('7c4a8d09ca3762af61e59520943dc26494f8941b','file/dokumen','jpg|png',10000,'nama_enkrip'),
                'tgl' => $this->input->post('tgl', TRUE),
            );

            $this->Materi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(base_url('admin/materi'));
        }
    }

    public function update($id)
    {
        $row = $this->Materi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => base_url('admin/materi/update_action'),
                'id_dokumen' => set_value('id_dokumen', $row->id_dokumen),
                'id_user' => set_value('id_user', $row->id_user),
                'nama_dokumen' => set_value('nama_dokumen', $row->nama_dokumen),
                'nama_enkrip' => set_value('nama_enkrip', $row->nama_enkrip),
                'tgl' => set_value('tgl', $row->tgl),

                'title'                => 'Edit Data Dokumen',
                'isi'                  => 'admin/materi/materi_form'
            );

            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/materi'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_dokumen', TRUE));
        } else {
            $data = array(
                'id_user' => $this->input->post('id_user', TRUE),
                'nama_dokumen' => upload_gambar_biasa2('7c4a8d09ca3762af61e59520943dc26494f8941b','file/dokumen','jpg|png',10000,'nama_dokumen'),
                'nama_enkrip' => upload_gambar_biasa2('7c4a8d09ca3762af61e59520943dc26494f8941b','file/dokumen','jpg|png',10000,'nama_enkrip'),
                'tgl' => $this->input->post('tgl', TRUE),
            );

            $this->Materi_model->update($this->input->post('id_dokumen', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url('admin/materi'));
        }
    }

    public function delete($id)
    {
        $row = $this->Materi_model->get_by_id($id);

        if ($row) {
            $this->Materi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url('admin/materi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/materi'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_user', 'Isi Materi', 'trim|required');
        $this->form_validation->set_rules('tgl', 'Tanggal', 'trim|required');

        $this->form_validation->set_rules('id_dokumen', 'id_dokumen', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file materi.php */
/* Location: ./application/controllers/materi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-24 19:34:19 */
/* http://harviacode.com */