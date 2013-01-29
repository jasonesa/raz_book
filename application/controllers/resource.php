<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Resource extends CI_Controller {

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
		$this->load->library('session');
		//------------move to a parent class----------
		if (!$this->session->userdata('username')) {
			redirect('login');
		}
		//------------move to a parent class----------
		
		$this -> load -> model('resource_model');
		$this -> load -> model('reservation_model');
		$this -> load -> model('skill_model');

	}

	public function index($id,$start=NULL,$end=NULL) {
		$resource = $this -> resource_model -> get_resource($id);
		$skills = $this -> get_skills($id);
		$data['starts']=$start;
		$data['ends']=$end;
		$data['resource'] = $resource -> row();
		$data['skills'] = $skills;
		$pic_path=PICS.$id.'.jpg';
		$data['profile_picture'] = (file_exists( $pic_path ))?base_url().$pic_path:base_url()."images/boszbook-demo-img.jpg";
		$this -> load -> view('header_view', $data);
		$this -> load -> view('resource_view', $data);
		$this -> load -> view('footer_view', $data);
		//var_dump($res->row());

	}

	public function get_resources($limit) {
		$this -> resource_model -> get_resources($limit);

	}

	private function get_skills($id) {
		$res = $this -> skill_model -> get_skills($id);
		$data['skills'] = $res;
		return $res;
		//var_dump($res->result());
		//$this -> load -> view('user_view',$data);
	}

	public function all($s=NULL) {
		$start = $this -> input -> get('start_date');
		$start = date("Y-m-d H:i:s", strtotime($start));
		$end = $this -> input -> get('end_date');
		$end = date("Y-m-d H:i:s", strtotime($end));

		//header('Location: http://localhost/rzf_booking/resource/all');

		if ($start && $end) {
			$data['starts']=$start;
			$data['ends']=$end;
			$data['available_resources'] = $this -> resource_model -> get_available_resources($start, $end);
			var_dump($data['available_resources']);
		} else {/*pull resources without filter*/}
		
		$this -> load -> view('header_view');
		$this -> load -> view('resources_view', $data);
		$this -> load -> view('footer_view');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
