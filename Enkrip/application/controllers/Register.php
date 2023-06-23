<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth');
    }

    public function index()
    {
        $this->load->view('vw_register');
    }
    public function proses()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[1]|max_length[255]|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]|max_length[255]');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required|min_length[1]|max_length[255]');
        if ($this->form_validation->run() == true) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $akses_level = $this->input->post('akses_level');
            $this->Auth->register($username, $password, $nama, $email, $akses_level);
            $this->session->set_flashdata('sukses', 'Akun Berhasil Di Daftar, Silahkan Login');
            redirect(base_url('login'), 'refresh');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('register'), 'refresh');
        }
    }
}