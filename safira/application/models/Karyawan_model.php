<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{

    public $table = 'karyawan';
    public $id = 'id_karyawan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

             public function listing() {
        $this->db->select('karyawan.*,
                           bidang.*');
        $this->db->from('karyawan');
        $this->db->join('bidang','bidang.id_bidang = karyawan.id_bidang','LEFT'); 
        $this->db->order_by('id_karyawan','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_karyawan', $q);
	$this->db->or_like('nama', $q);
    $this->db->or_like('NIK', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('no_hp', $q);
	$this->db->or_like('id_bidang', $q);
	$this->db->or_like('foto', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_karyawan', $q);
	$this->db->or_like('nama', $q);
    $this->db->or_like('NIK', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('no_hp', $q);
	$this->db->or_like('id_bidang', $q);
	$this->db->or_like('foto', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

      public function bidang() {
        $this->db->select('bidang.*');
        $this->db->from('bidang');
        // $this->db->where('barang_inventaris.status', 'ADA');
        $this->db->order_by('id_bidang','DESC');
        $query = $this->db->get();
        return $query->result();
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

