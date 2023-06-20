<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing
	public function listing() {
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->order_by('id_user','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	             public function karyawan() {
        $this->db->select('karyawan.*,
                           bidang.*');
        $this->db->from('karyawan');
        $this->db->join('bidang','bidang.id_bidang = karyawan.id_bidang','LEFT'); 
        $this->db->order_by('id_karyawan','DESC');
        $query = $this->db->get();
        return $query->result();
    }

	    public function departemen() {
        $this->db->select('departemen.*');
        $this->db->from('departemen');
        $this->db->order_by('id_departemen','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function user_aktif($username) {
    	$this->db->where('username', $username);
    	$this->db->update('admin',array('aktif' => '1'));
    }

    public function user_off($username) {
    	$this->db->where('username', $username);
    	$this->db->update('admin',array('aktif' => '0'));
    }


	// Detail
	public function detail($id_user) {
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('id_user',$id_user);
		$this->db->order_by('id_user','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Login
	public function login($username, $password) {
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where(array('username'	=>$username,
							   'password'	=>sha1($password)));
		$this->db->order_by('id_user','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//Tambah
	public function tambah($data) {
		$this->db->insert('admin',$data);
	}

	//Edit
	public function edit($data) {
		$this->db->where('id_user',$data['id_user']);
		$this->db->update('admin',$data);    
	}
	
	//Delete
	public function delete($data) {
		$this->db->where('id_user',$data['id_user']);
		$this->db->delete('admin',$data);    
	}
	

}

