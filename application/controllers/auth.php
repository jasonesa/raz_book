<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Auth extends CI_Controller {

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

	public function __construct() {
		session_start();

		parent::__construct();
		$this -> load -> helper('url');
		$this -> load -> library('session');
	}

	public function index($type = 'user_login') {
		$this -> load -> library('form_validation');
		if ($type != 'resource_login') {
			$success_redirect='welcome';
			$fail_redirect='/';
			if ($this -> session -> userdata('username'))
				redirect($success_redirect);
			$sess_data = array('name_type' => 'username', 'id_type' => 'iduser', 'redirect' => $success_redirect, 'model' => 'auth_model');
		} else {//resource_login
			$success_redirect='admin';
			$fail_redirect='my_profile';
			if ($this -> session -> userdata('resourcename'))
				redirect($success_redirect);
			$sess_data = array('name_type' => 'resourcename', 'id_type' => 'idresource', 'redirect' => $success_redirect, 'model' => 'resource_model');
		}

		$this -> form_validation -> set_rules('username', 'Email Address', 'valid_email|required');
		$this -> form_validation -> set_rules('password', 'Password', 'required|min_length[4]');
		if ($this -> form_validation -> run() !== false) {
			$this -> verifyUser($sess_data);
		}
		redirect($fail_redirect);
	}

	//---------------------------verify user trying to login---------------------------
	private function verifyUser($login_data) {
		$this -> load -> model($login_data['model']);
		$res = $this -> $login_data['model'] -> verify_user($this -> input -> post('username'), $this -> input -> post('password'));
		if ($res !== false) {
			$this -> session -> set_userdata($login_data['name_type'], $this -> input -> post('username'));
			$this -> session -> set_userdata($login_data['id_type'], $res -> $login_data['id_type']);
			redirect($login_data['redirect']);
		}

	}
	//----------------------------------------------------------------------------------
	
	
	

	public function admin_auth() {
		echo "admin auth";
	}

	//-----------logout function----------------------
	public function logout() {
		$this -> load -> helper('form');
		/*$this->session->unset_userdata('username');
		 $this->session->unset_userdata('userid');*/
		$this -> session -> sess_destroy();
		$data['action'] = 'auth';
		redirect('/');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
