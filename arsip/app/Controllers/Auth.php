<?php

namespace App\Controllers;

use App\Models\Model_auth;

class Auth extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->Model_auth = new Model_auth();
    }

    public function index()
    {
        $data = array(
            'title' => 'Login',
        );
        return view('v_login', $data);
    }

    public function login()
    {
        if ($this->validate([
            'username' => [
                'label'  => 'username',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'password' => [
                'label'  => 'password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ]
        ])) {
            //jika valid
            $username = $this->request->getPost('username');
            $passwoord = $this->request->getPost('password');
            $cek =  $this->Model_auth->login($username, $passwoord);
            if ($cek) {
                //jika datanya cocok
                session()->set('log, true');
                session()->set('id_user', $cek['id_user']);
                session()->set('nama', $cek['nama']);
                session()->set('username', $cek['username']);
                session()->set('level', $cek['level']);
                session()->set('foto', $cek['foto']);
                return redirect()->to(base_url('home'));
            } else {
                session()->setFlashdata('pesan', 'login gagal, username atau password salah');
                return redirect()->to(base_url('auth/index'));
            }
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/index'));
        }
    }
    public function logout()
    {
        session()->remove('log');
        session()->remove('namma');
        session()->remove('username');
        session()->remove('level');
        session()->remove('foto');

        session()->setFlashdata('pesan', 'anda telah logout');
        return redirect()->to(base_url('auth'));
    }
}
