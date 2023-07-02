<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_suratkeluar extends Model
{
    public function all_data()
    {
        return $this->db->table('tb_suratkeluar')
            ->join('tb_user', 'tb_user.id_user = tb_suratkeluar.id_user', 'left')
            ->join('tb_kategori', 'tb_kategori.id_kategori = tb_suratkeluar.id_kategori', 'left')
            ->orderBy('id_suratkeluar', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function detail_data($id_suratkeluar)
    {
        return $this->db->table('tb_suratkeluar')
            ->join('tb_user', 'tb_user.id_user = tb_suratkeluar.id_user', 'left')
            ->join('tb_kategori', 'tb_kategori.id_kategori = tb_suratkeluar.id_kategori', 'left')
            ->where('id_suratkeluar', $id_suratkeluar)
            ->get()
            ->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tb_suratkeluar')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tb_suratkeluar')
            ->where('id_suratkeluar', $data['id_suratkeluar'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tb_suratkeluar')
            ->where('id_suratkeluar', $data['id_suratkeluar'])
            ->delete($data);
    }
}
