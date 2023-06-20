<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Surat_model extends CI_Model
{

    public $table = 'surat';
    public $id = 'id_surat';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    // Listing
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('surat');
        $this->db->order_by('id_surat', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    
        public function bagisurat($id_user,$id_karyawan) {
        $this->db->select('surat.*,
                           admin.*,
                           karyawan.*,
                           bidang.*');
        $this->db->from('surat');
        $this->db->join('admin','admin.id_user = surat.id_user','LEFT');
        $this->db->join('karyawan','karyawan.id_karyawan = surat.id_karyawan','LEFT');
        $this->db->join('bidang','bidang.id_bidang = karyawan.id_bidang','LEFT');  
        $this->db->where(array( 'surat.id_user'       =>$id_user,
                                'surat.id_karyawan'   =>$id_karyawan)
                        );
        $this->db->order_by('id_surat','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_cetak($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_surat', $q);
        $this->db->or_like('kepada', $q);
        $this->db->or_like('dari', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_surat', $q);
        $this->db->or_like('kepada', $q);
        $this->db->or_like('dari', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}