<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('user');
		// $this->db->where('akses_level', 'Admin');
		$this->db->order_by('id_user', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
	public function listpeserta()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user.akses_level', 'siswa');
		$this->db->order_by('id_user', 'DESC');
		$query = $this->db->get();
		return $query->result();
	} 

	public function departemen()
	{
		$this->db->select('departemen.*');
		$this->db->from('departemen');
		$this->db->order_by('id_departemen', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function user_aktif($username)
	{
		$this->db->where('username', $username);
		$this->db->update('user', array('aktif' => '1'));
	}

	public function user_off($username)
	{
		$this->db->where('username', $username);
		$this->db->update('user', array('aktif' => '0'));
	}


	// Detail
	public function detail($id_user)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user', $id_user);
		$this->db->order_by('id_user', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Login
	public function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array(
			'username'	=> $username,
			'password'	=> sha1($password)
		));
		$this->db->order_by('id_user', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//Tambah
	public function tambah($data)
	{
		$this->db->insert('user', $data);
	}

	//Edit
	public function edit($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('user', $data);
	}

	//Delete
	public function delete($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('user', $data);
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */