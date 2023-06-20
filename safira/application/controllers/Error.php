<?php if(! defined('BASEPATH'))
exit('No direct script acess allowed');

/**
 * 
 */
class Error extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$data = array('title'	    => 'Uppss.. 404 Error Page');

		$this->load->view('error_404.php', $data, FALSE);
	}
}

?>