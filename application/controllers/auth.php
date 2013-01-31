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

	//main authentication function
	/*public function index() {
	 if ($this->session->userdata('username')) {
	 redirect('welcome');
	 }
	 $this -> load -> library('form_validation');
	 $this -> form_validation -> set_rules('username', 'Email Address', 'valid_email|required');
	 $this -> form_validation -> set_rules('password', 'Password', 'required|min_length[4]');
	 if ($this -> form_validation -> run() !== false) {
	 // then validation passed. Get from db
	 $this -> load -> model('auth_model');
	 $res = $this -> auth_model -> verify_user($this -> input -> post('username'), $this -> input -> post('password'));
	 if ($res !== false) {
	 $_SESSION['username'] = $this -> input -> post('username');
	 $this->session->set_userdata('username', $this -> input -> post('username'));
	 $this->session->set_userdata('userid', $res->iduser);
	 redirect('welcome');
	 }
	 }
	 $this -> load -> view('login_view');
	 }*/

	public function index($type = 'user') {
		$this -> load -> library('form_validation');
		switch ($type) {
			case 'user' :
				if ($this -> session -> userdata('username'))
					redirect('welcome');
				$model = 'auth_model';
				$sess_data = 'username';
				$sess_id = 'userid';
				$page = 'welcome';
				break;

			case 'resource' :
				if ($this -> session -> userdata('resourcename'))
					redirect('adminr');
				$model = 'resource_model';
				$sess_data = 'resourcename';
				$sess_id = 'idresource';
				$page = 'adminr';
				break;

			default :
				echo 'default';
				redirect('login');
				break;
		}

		$this -> form_validation -> set_rules('username', 'Email Address', 'valid_email|required');
		$this -> form_validation -> set_rules('password', 'Password', 'required|min_length[4]');
		if ($this -> form_validation -> run() !== false) {
			$this -> verifyUser($model, $sess_data, $page, $sess_id);
		}

		$this -> load -> view('login_view');
	}

	private function verifyUser($model, $sess_data, $page, $id) {
		$this -> load -> model($model);
		$res = $this -> $model -> verify_user($this -> input -> post('username'), $this -> input -> post('password'));
		if ($res !== false) {
			$this -> session -> set_userdata($sess_data, $this -> input -> post('username'));
			$this -> session -> set_userdata('userid', $res -> $id);
			redirect($page);
		}

	}

	public function admin_auth() {
		echo "admin auth";
	}

	//-----------logout function----------------------
	public function logout() {
		$this -> load -> helper('form');
		/*$_SESSION = array();
		 if (ini_get("session.use_cookies")) {
		 $params = session_get_cookie_params();
		 setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
		 }*/

		/*$this->session->unset_userdata('username');
		 $this->session->unset_userdata('userid');*/
		$this -> session -> sess_destroy();
		$data['action'] = 'auth';
		$this -> load -> view('login_view', $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
