<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('pdf');
		$this->load->library('Excel');
	}
	public function index()
	{
		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->input->get('start')); 

		$config['per_page'] = 1000000;
		$config['page_query_string'] = TRUE;

		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$data = array(
			'q' => $q,
			'pagination' => $this->pagination->create_links(),
			'start' => $start,

			'title'      => 'Home Page',
            'isi'        => 'user/index'
		);
		$this->load->view('user/layout/wrapper', $data, FALSE);
	} 
}