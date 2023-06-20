<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_kerja_model extends CI_Model
{

    public $table = 'laporan_kerja';
    public $id = 'id_laporan_kerja';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

        public function listing($id_user,$id_karyawan) {
        $this->db->select('laporan_kerja.*,
                           admin.*,
                           karyawan.*,
                           bidang.*');
        $this->db->from('laporan_kerja');
        $this->db->join('admin','admin.id_user = laporan_kerja.id_user','LEFT');
        $this->db->join('karyawan','karyawan.id_karyawan = laporan_kerja.id_karyawan','LEFT');
        $this->db->join('bidang','bidang.id_bidang = karyawan.id_bidang','LEFT');  
        $this->db->where(array( 'laporan_kerja.id_user'       =>$id_user,
                                'laporan_kerja.id_karyawan'   =>$id_karyawan)
                        );
        $this->db->order_by('id_laporan_kerja','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    

        public function tampil_tgl_nama($tgl1, $tgl2, $nama, $status_laporan){
        $this->db->select('laporan_kerja.*,
                           karyawan.*,
                           bidang.*');
        $this->db->from('laporan_kerja');
        $this->db->join('karyawan','karyawan.id_karyawan = laporan_kerja.id_karyawan','LEFT');
        $this->db->join('bidang','bidang.id_bidang = karyawan.id_bidang','LEFT');  
        $this->db->where('tanggal_lapor >=', $tgl1);
        $this->db->where('tanggal_lapor <=', $tgl2);
        $this->db->where('nama', $nama);
        $this->db->where('status_laporan', $status_laporan);
        // $this->db->where('laporan_kerja.status_laporan', 'diterima');
        $this->db->order_by('tanggal_lapor','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function listingadminlaporan() {
        $this->db->select('laporan_kerja.*,
                           admin.*,
                           karyawan.*,
                           bidang.*');
        $this->db->from('laporan_kerja');
        $this->db->join('admin','admin.id_user = laporan_kerja.id_user','LEFT');
        $this->db->join('karyawan','karyawan.id_karyawan = laporan_kerja.id_karyawan','LEFT');
        $this->db->join('bidang','bidang.id_bidang = karyawan.id_bidang','LEFT');  
        // $this->db->where('laporan_kerja.status_laporan', 'diterima');
        $this->db->order_by('tanggal_lapor','DESC');
        $query = $this->db->get();
        return $query->result();
    }


            public function listingadmin() {
        $this->db->select('laporan_kerja.*,
                           admin.*,
                           karyawan.*,
                           bidang.*');
        $this->db->from('laporan_kerja');
        $this->db->join('admin','admin.id_user = laporan_kerja.id_user','LEFT');
        $this->db->join('karyawan','karyawan.id_karyawan = laporan_kerja.id_karyawan','LEFT');
        $this->db->join('bidang','bidang.id_bidang = karyawan.id_bidang','LEFT');  
        $this->db->order_by('id_laporan_kerja','DESC');
        $query = $this->db->get();
        return $query->result();
    }


        public function detail($id_laporan_kerja) {
        $this->db->select('*');
        $this->db->from('laporan_kerja');
        $this->db->where('id_laporan_kerja',$id_laporan_kerja);
        $this->db->order_by('id_laporan_kerja','DESC');
        $query = $this->db->get();
        return $query->row();
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
        $this->db->like('id_laporan_kerja', $q);
	$this->db->or_like('id_user', $q);
	$this->db->or_like('id_karyawan', $q);
	$this->db->or_like('tanggal_lapor', $q);
	$this->db->or_like('file_laporan', $q);
	$this->db->or_like('url', $q);
	$this->db->or_like('status_laporan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_laporan_kerja', $q);
	$this->db->or_like('id_user', $q);
	$this->db->or_like('id_karyawan', $q);
	$this->db->or_like('tanggal_lapor', $q);
	$this->db->or_like('file_laporan', $q);
	$this->db->or_like('url', $q);
	$this->db->or_like('status_laporan', $q);
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

