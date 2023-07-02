<?php

namespace App\Controllers;

use App\Models\Model_suratmasuk;
use App\Models\Model_kategori;

class Suratmasuk extends BaseController
{
    public function __construct()
    {
        $this->Model_suratmasuk = new Model_suratmasuk();
        $this->Model_kategori = new Model_kategori();
        helper('form');
    }

    public function index()
    {

        $data = array(
            'title' => 'Surat Masuk',
            'suratmasuk' => $this->Model_suratmasuk->all_data(),
            'isi'   => 'suratmasuk/v_index'

        );

        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = array(
            'title' => 'Add Surat Masuk',
            'kategori' => $this->Model_kategori->all_data(),
            'isi'   => 'suratmasuk/v_add'

        );
        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        if ($this->validate([
            'no_surat' => [
                'label'  => 'Nomor Surat Masuk',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'id_kategori' => [
                'label'  => 'Kategori',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'asal' => [
                'label'  => 'Asal',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'tgl_terima' => [
                'label'  => 'Tanggal Terima',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'file_surat' => [
                'label'  => 'File Surat',
                'rules'  => 'uploaded[file_surat]|max_size[file_surat,2048]|ext_in[file_surat,pdf]',
                'errors' => [
                    'uploaded' => '{field} wajib diisi',
                    'max_size' => 'ukuran {field} max 2048 kb',
                    'ext_in' => 'format {field} wajib PDF',
                ]
            ],
        ])) {
            //mengambil file surat yang akanng diupload pada form
            $file_surat = $this->request->getFile('file_surat');
            //merandom nama file surat
            $nama_file = $file_surat->getRandomName();
            //jika valid
            $data = array(
                'no_surat' => $this->request->getPost('no_surat'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'asal' => $this->request->getPost('asal'),
                'tgl_terima' => $this->request->getPost('tgl_terima'),
                'id_user' => session()->get('id_user'),
                'file_surat' => $nama_file,
            );

            $file_surat->move('file_surat', $nama_file); //directori upload file
            $this->Model_suratmasuk->add($data);
            session()->setFlashdata('pesan', 'Data surat berhasil ditembahkan');
            return redirect()->to(base_url('suratmasuk'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('suratmasuk/add'));
        }
    }

    public function edit($id_suratmasuk)
    {
        $data = array(
            'title' => 'Edit Surat Masuk',
            'kategori' => $this->Model_kategori->all_data(),
            'suratmasuk' => $this->Model_suratmasuk->detail_data($id_suratmasuk),
            'isi'   => 'suratmasuk/v_edit'

        );
        return view('layout/v_wrapper', $data);
    }
    public function update($id_suratmasuk)
    {
        if ($this->validate([
            'no_surat' => [
                'label'  => 'Nomor Surat Masuk',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'id_kategori' => [
                'label'  => 'Kategori',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'asal' => [
                'label'  => 'Asal',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'tgl_terima' => [
                'label'  => 'Tanggal Terima',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'file_surat' => [
                'label'  => 'File Surat',
                'rules'  => 'max_size[file_surat,2048]|ext_in[file_surat,pdf]',
                'errors' => [
                    'max_size' => 'ukuran {field} max 2048 kb',
                    'ext_in' => 'format {field} wajib PDF',
                ]
            ],
        ])) {
            //mengambil file surat yang akan diupload pada form
            $file_surat = $this->request->getFile('file_surat');
            if ($file_surat->getError() == 4) {
                //jika file tidak diganti
                $data = array(
                    'id_suratmasuk' => $id_suratmasuk,
                    'no_surat' => $this->request->getPost('no_surat'),
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'asal' => $this->request->getPost('asal'),
                    'tgl_terima' => $this->request->getPost('tgl_terima'),
                    'id_user' => session()->get('id_user'),
                );
                $this->Model_suratmasuk->edit($data);
            } else {
                //jika file diganti
                //menghapus file lama
                $suratmasuk = $this->Model_suratmasuk->detail_data($id_suratmasuk);
                if ($suratmasuk['file_surat'] != "") {
                    unlink('file_surat/' . $suratmasuk['file_surat']);
                }
                //merandom nama file surat
                $nama_file = $file_surat->getRandomName();
                //jika valid
                $data = array(
                    'id_suratmasuk' => $id_suratmasuk,
                    'no_surat' => $this->request->getPost('no_surat'),
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'asal' => $this->request->getPost('asal'),
                    'tgl_terima' => $this->request->getPost('tgl_terima'),
                    'id_user' => session()->get('id_user'),
                    'file_surat' => $nama_file,
                );

                $file_surat->move('file_surat', $nama_file); //directori upload file
                $this->Model_suratmasuk->edit($data);
            }
            session()->setFlashdata('pesan', 'Data surat berhasil diperbarui');
            return redirect()->to(base_url('suratmasuk'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('suratmasuk/edit . $id_suratmasuk'));
        }
    }

    public function delete($id_suratmasuk)
    {
        //menghapus file lama
        $suratmasuk = $this->Model_suratmasuk->detail_data($id_suratmasuk);
        if ($suratmasuk['file_surat'] != "") {
            unlink('file_surat/' . $suratmasuk['file_surat']);
        }

        $data = array(
            'id_suratmasuk' => $id_suratmasuk,
        );
        $this->Model_suratmasuk->delete_data($data);
        session()->setFlashdata('pesan', 'Data surat berhasil dihapus');
        return redirect()->to(base_url('suratmasuk'));
    }

    public function viewpdf($id_suratmasuk)
    {
        $data = array(
            'title' => ' View Surat Masuk',
            'suratmasuk' => $this->Model_suratmasuk->detail_data($id_suratmasuk),
            'isi'   => 'suratmasuk/v_viewpdf'

        );

        return view('layout/v_wrapper', $data);
    }
}
