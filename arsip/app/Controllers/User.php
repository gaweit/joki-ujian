<?php

namespace App\Controllers;

use App\Models\Model_user;

class User extends BaseController
{
    public function __construct()
    {
        $this->Model_user = new Model_user();
        helper('form');
    }

    public function index()
    {
        if (session()->get('level') <> 1) {
            return redirect()->to(base_url('home'));
        }
        $data = array(
            'title' => 'User',
            'user' => $this->Model_user->all_data(),
            'isi'   => 'user/v_index'
        );

        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = array(
            'title' => 'Add User',
            'isi'   => 'user/v_add'
        );

        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        if ($this->validate([
            'nama' => [
                'label'  => 'Nama',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'username' => [
                'label'  => 'Username',
                'rules'  => 'required|is_unique[tb_user.username]',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'is_unique' => '{field} sudah ada, silahkan masukkan {field} lain',
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'level' => [
                'label'  => 'Level',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'foto' => [
                'label'  => 'Foto',
                'rules'  => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg,image/gif]',
                'errors' => [
                    'uploaded' => '{field} wajib diisi',
                    'max_size' => 'ukuran {field} max 1024 kb',
                    'mime_in' => 'format {field} wajib PNG,JPG,JPEG,GIF',
                ]
            ],
        ])) {
            //mengambil file foto yang akan diupload pada form
            $foto = $this->request->getFile('foto');
            //merandom nama file foto
            $nama_file = $foto->getRandomName();
            //jika valid
            $data = array(
                'nama' => $this->request->getPost('nama'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'level' => $this->request->getPost('level'),
                'foto' => $nama_file,
            );

            $foto->move('foto', $nama_file); //directori upload file
            $this->Model_user->add($data);
            session()->setFlashdata('pesan', 'Data user berhasil ditambahkan');
            return redirect()->to(base_url('user'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user/add'));
        }
    }

    public function edit($id_user)
    {
        $data = array(
            'title' => 'Edit User',
            'user' => $this->Model_user->detail_data($id_user),
            'isi'   => 'user/v_edit'
        );

        return view('layout/v_wrapper', $data);
    }

    public function update($id_user)
    {
        if ($this->validate([
            'nama' => [
                'label'  => 'Nama',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'username' => [
                'label'  => 'Username',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'level' => [
                'label'  => 'Level',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'foto' => [
                'label'  => 'Foto',
                'rules'  => 'max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg,image/gif]',
                'errors' => [
                    'max_size' => 'ukuran {field} max 1024 kb',
                    'mime_in' => 'format {field} wajib PNG,JPG,JPEG,GIF',
                ]
            ],
        ])) {
            $foto = $this->request->getFile('foto');
            if ($foto->getError() == 4) {
                $data = array(
                    'id_user' => $id_user,
                    'nama' => $this->request->getPost('nama'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                    'level' => $this->request->getPost('level'),
                );

                // $foto->move('foto', $nama_file); //directori upload file
                $this->Model_user->edit($data);
            } else {
                //menghapus foto lama
                $user = $this->Model_user->detail_data($id_user);
                if ($user['foto'] != "") {
                    unlink('foto/' . $user['foto']);
                }
                //merandom nama file foto
                $nama_file = $foto->getRandomName();
                $data = array(
                    'id_user' => $id_user,
                    'nama' => $this->request->getPost('nama'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                    'level' => $this->request->getPost('level'),
                    'foto' => $nama_file,
                );
                $foto->move('foto', $nama_file); //directori upload file
                $this->Model_user->edit($data);
            }
            session()->setFlashdata('pesan', 'Data user berhasil diperbarui');
            return redirect()->to(base_url('user'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user/edit/' . $id_user));
        }
    }

    public function delete($id_user)
    {
        //menghapus foto lama
        $user = $this->Model_user->detail_data($id_user);
        if ($user['foto'] != "") {
            unlink('foto/' . $user['foto']);
        }

        $data = array(
            'id_user' => $id_user,
        );
        $this->Model_user->delete_data($data);
        session()->setFlashdata('pesan', 'Data user berhasil dihapus');
        return redirect()->to(base_url('user'));
    }
}
