<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this -> load -> library('session');
		$this -> load -> helper('url');
		if ($this -> session -> userdata('username')) {
			redirect('welcome');
		}
	}

	public function index($type='user_login') {
		$this -> load -> helper('form');
		$data['action']="auth/index/$type";
		$data['is_resource']=($type=='user_login')?false:true;
		$this -> load -> view('login_view',$data);

	}

	/*public function admin() {
		$this -> load -> helper('form');
		$data['action']='auth/resource';
		$this -> load -> view('login_view',$data);

	}*/

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
