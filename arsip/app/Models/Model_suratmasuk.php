<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_suratmasuk extends Model
{
    public function all_data()
    {
        return $this->db->table('tb_suratmasuk')
            ->join('tb_user', 'tb_user.id_user = tb_suratmasuk.id_user', 'left')
            ->join('tb_kategori', 'tb_kategori.id_kategori = tb_suratmasuk.id_kategori', 'left')
            ->orderBy('id_suratmasuk', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function detail_data($id_suratmasuk)
    {
        return $this->db->table('tb_suratmasuk')
            ->join('tb_user', 'tb_user.id_user = tb_suratmasuk.id_user', 'left')
            ->join('tb_kategori', 'tb_kategori.id_kategori = tb_suratmasuk.id_kategori', 'left')
            ->where('id_suratmasuk', $id_suratmasuk)
            ->get()
            ->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tb_suratmasuk')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tb_suratmasuk')
            ->where('id_suratmasuk', $data['id_suratmasuk'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tb_suratmasuk')
            ->where('id_suratmasuk', $data['id_suratmasuk'])
            ->delete($data);
    }
}
