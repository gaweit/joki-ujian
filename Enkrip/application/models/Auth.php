<?php
class Auth extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function register($username, $password, $nama, $email, $akses_level)
    {
        $data_user = array(
            'username' => $username,
            'password' => sha1($password),
            'nama' => $nama,
            'email' => $email,
            'akses_level' => $akses_level
        );
        $this->db->insert('user', $data_user);
    }
}