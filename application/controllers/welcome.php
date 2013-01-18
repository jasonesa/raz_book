<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->helper('url');
		//var_dump(isset($_SESSION['username']));
		if (!isset($_SESSION['username'])) {
			redirect('login');
		}
		$this -> load -> model('reservation_model');
		$this -> load -> model('resource_model');
	}

	public function index() {
		$res = $this -> reservation_model -> get_recent();
		$resources=$this -> resource_model -> get_resources(3);
		$data['reservations']=$res->result();
		$data['resources']=$resources->result();
		$this -> load -> view('header_view',$data);
		
		$this -> load -> view('welcome_message',$data);
		$this -> load -> view('footer_view',$data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
