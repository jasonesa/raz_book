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
	private $user_id;
	private $resource;
	private $skills;
	private $picture;
	function __construct() {
		session_start();
		parent::__construct();
		$this -> load -> helper('url');
		//$this -> load -> helper('date');
		$this -> load -> library('session');
		$this->user_id=$this -> session -> userdata('idresource');
		$this->resource=null;
		$this->skills=null;
		$this->picture=null;
		if (!$this -> session -> userdata('resourcename')) {
			redirect('my_profile');
		}
		$this -> load -> model('reservation_model');
		$this -> load -> model('resource_model');
	}


	public function index($reservation_id = NULL) {
		$name= $this -> session -> userdata('resourcename');

		$this->loadResource();

		$data=array('name'=>$this->resource->name,
					'username'=>$this->resource->username,
					'skills'=>$this->skills,
					'user_id'=>$this->user_id,
					'pic'=>$this->picture,
					'rzf_mail'=>$this->resource->email_alt,
					'description'=>$this->resource->description,
					'skype'=>$this->resource->skype,
					'aim'=>$this->resource->aim

					);

		$this->load->view('resources/updateResource_view',$data);
		

	}


	private function loadResource(){
		$this->load->model('resource_model');
		$this->load->model('skill_model');
		$resource = $this -> resource_model -> get_resource($this->user_id);
		$skills = $this -> skill_model -> get_skills($this->user_id);

		$this->resource=$resource -> row();
		$this->skills = $skills->result();

		$pic_path = PICS . $this->user_id . '.jpg';
		$resume_path = RESUMES . $this->user_id . '.pdf';
		$this->picture = (file_exists($pic_path)) ? base_url() . $pic_path : base_url() . "images/boszbook-demo-img.jpg";
		$resume = (file_exists($resume_path)) ? base_url() . $resume_path : false;
	}


	public function updateResource(){
		$this->load->model('resource_model');
		$skills= explode(',', trim($this->input->post('skills')));
		$data['name']=$this->input->post('name');
		$data['username']=$this->input->post('username');
		$data['email_alt']=$this->input->post('rzf_mail');
		$data['aim']=$this->input->post('aim');
		$data['skype']=$this->input->post('skype');
		$data['description']=$this->input->post('description');
		$this->resource_model->update_resource($data,$skills,$this->user_id);
		redirect('admin');

	}





}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
