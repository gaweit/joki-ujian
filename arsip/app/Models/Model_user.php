<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_user extends Model
{
    public function all_data()
    {
        return $this->db->table('tb_user')
            ->orderBy('id_user', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function detail_data($id_user)
    {
        return $this->db->table('tb_user')
            ->where('id_user', $id_user)
            ->get()
            ->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tb_user')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tb_user')
            ->where('id_user', $data['id_user'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tb_user')
            ->where('id_user', $data['id_user'])
            ->delete($data);
    }
}
