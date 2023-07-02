<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_home extends Model
{

    public function tot_suratmasuk()
    {
        return $this->db->table('tb_suratmasuk')->countAll();
    }

    public function tot_suratkeluar()
    {
        return $this->db->table('tb_suratkeluar')->countAll();
    }

    public function tot_kategori()
    {
        return $this->db->table('tb_kategori')->countAll();
    }

    public function tot_user()
    {
        return $this->db->table('tb_user')->countAll();
    }
}
