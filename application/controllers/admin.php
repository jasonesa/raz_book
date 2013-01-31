<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() {
		session_start();
		parent::__construct();
		$this -> load -> helper('url');
		$this -> load -> helper('date');
		$this -> load -> library('session');
		if (!$this -> session -> userdata('resourcename')) {
			redirect('admin');
		}
		$this -> load -> model('reservation_model');
		$this -> load -> model('resource_model');
	}

	public function index($reservation_id = NULL) {

		echo 'this is admin';

	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */