<?php

namespace App\Controllers;

use App\Models\Model_suratkeluar;
use App\Models\Model_kategori;

class Suratkeluar extends BaseController
{
    public function __construct()
    {
        $this->Model_suratkeluar = new Model_suratkeluar();
        $this->Model_kategori = new Model_kategori();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title' => 'Surat keluar',
            'suratkeluar' => $this->Model_suratkeluar->all_data(),
            'isi'   => 'suratkeluar/v_index'

        );

        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = array(
            'title' => 'Add Surat keluar',
            'kategori' => $this->Model_kategori->all_data(),
            'isi'   => 'suratkeluar/v_add'

        );
        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        if ($this->validate([
            'no_surat' => [
                'label'  => 'Nomor Surat keluar',
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
            'penerima' => [
                'label'  => 'Penerima',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'tgl_surat' => [
                'label'  => 'Tanggal Surat',
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
                'penerima' => $this->request->getPost('penerima'),
                'tgl_surat' => $this->request->getPost('tgl_surat'),
                'id_user' => session()->get('id_user'),
                'file_surat' => $nama_file,
            );

            $file_surat->move('file_surat', $nama_file); //directori upload file
            $this->Model_suratkeluar->add($data);
            session()->setFlashdata('pesan', 'Data surat berhasil ditambahkan');
            return redirect()->to(base_url('suratkeluar'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('suratkeluar/add'));
        }
    }

    public function edit($id_suratkeluar)
    {
        $data = array(
            'title' => 'Edit Surat keluar',
            'kategori' => $this->Model_kategori->all_data(),
            'suratkeluar' => $this->Model_suratkeluar->detail_data($id_suratkeluar),
            'isi'   => 'suratkeluar/v_edit'

        );
        return view('layout/v_wrapper', $data);
    }
    public function update($id_suratkeluar)
    {
        if ($this->validate([
            'no_surat' => [
                'label'  => 'Nomor Surat keluar',
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
            'penerima' => [
                'label'  => 'Penerima',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'tgl_surat' => [
                'label'  => 'Tanggal Surat',
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
                    'id_suratkeluar' => $id_suratkeluar,
                    'no_surat' => $this->request->getPost('no_surat'),
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'penerima' => $this->request->getPost('penerima'),
                    'tgl_surat' => $this->request->getPost('tgl_surat'),
                    'id_user' => session()->get('id_user'),
                );
                $this->Model_suratkeluar->edit($data);
            } else {
                //jika file diganti
                //menghapus file lama
                $suratkeluar = $this->Model_suratkeluar->detail_data($id_suratkeluar);
                if ($suratkeluar['file_surat'] != "") {
                    unlink('file_surat/' . $suratkeluar['file_surat']);
                }
                //merandom nama file surat
                $nama_file = $file_surat->getRandomName();
                //jika valid
                $data = array(
                    'id_suratkeluar' => $id_suratkeluar,
                    'no_surat' => $this->request->getPost('no_surat'),
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'penerima' => $this->request->getPost('penerima'),
                    'tgl_surat' => $this->request->getPost('tgl_surat'),
                    'id_user' => session()->get('id_user'),
                    'file_surat' => $nama_file,
                );

                $file_surat->move('file_surat', $nama_file); //directori upload file
                $this->Model_suratkeluar->edit($data);
            }
            session()->setFlashdata('pesan', 'Data surat berhasil diperbarui');
            return redirect()->to(base_url('suratkeluar'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('suratkeluar/edit/ . $id_suratkeluar'));
        }
    }

    public function delete($id_suratkeluar)
    {
        //menghapus file lama
        $suratkeluar = $this->Model_suratkeluar->detail_data($id_suratkeluar);
        if ($suratkeluar['file_surat'] != "") {
            unlink('file_surat/' . $suratkeluar['file_surat']);
        }

        $data = array(
            'id_suratkeluar' => $id_suratkeluar,
        );
        $this->Model_suratkeluar->delete_data($data);
        session()->setFlashdata('pesan', 'Data surat berhasil dihapus');
        return redirect()->to(base_url('suratkeluar'));
    }

    public function viewpdf($id_suratkeluar)
    {
        $data = array(
            'title' => ' View Surat keluar',
            'suratkeluar' => $this->Model_suratkeluar->detail_data($id_suratkeluar),
            'isi'   => 'suratkeluar/v_viewpdf'

        );

        return view('layout/v_wrapper', $data);
    }
}
