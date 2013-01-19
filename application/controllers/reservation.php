<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Reservation extends CI_Controller {

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
		if (!isset($_SESSION['username'])) {
			redirect('login');
		}
		$this -> load -> model('reservation_model');
		$this -> load -> model('resource_model');
	}

	public function index($reservation_id = NULL) {

		if ($reservation_id) {
			$reservation = $this -> reservation_model -> get_reservation($reservation_id) -> row();
			$date_format = "%m/%d/%Y";
			$data['reservation'] = $reservation;
			$data['starts'] = mdate($date_format, mysql_to_unix($reservation -> start_date));
			$data['ends'] = mdate($date_format, mysql_to_unix($reservation -> end_date));
			$data['resources'] = $this -> resource_model -> get_by_reservation($reservation_id);
			$data['available_resources'] = $this -> reservation_model -> get_available_resources($reservation -> start_date, $reservation -> end_date);
			$data['user_iduser'] = $reservation -> user_id;
			$data['description'] = $reservation -> description;
		} else {
			$data['reservation_name'] = '';
			$data['user_iduser'] = '';
			$data['description'] = '';
			$data['starts'] = '';
			$data['ends'] = '';
			$data['resources'] = '';
			$data['available_resources'] = array();
			$data['resources'] = array();
		}

		$this -> load -> view('header_view', $data);
		$this -> load -> view('reservation_view', $data);
		$this -> load -> view('footer_view', $data);

	}

	public function all() {
		$user= $this->session->userdata('userid');
		$reservations = $this -> reservation_model -> get_reservations($user);
		$data['reservations'] = $reservations;
		$this -> load -> view('header_view', $data);
		$this -> load -> view('reservations_view', $data);
		$this -> load -> view('footer_view', $data);
	}


	public function book_resource() {
		$starts = $this -> input -> post('start_date');
		$starts = date("Y-m-d H:i:s", strtotime($starts));
		$ends = $this -> input -> post('end_date');
		$ends = date("Y-m-d H:i:s", strtotime($ends));
		$resource = $this -> input -> post('resource_id');
		$user= $this->session->userdata('userid');
		$is_available = $this -> reservation_model -> checkAvailability($starts, $ends, $resource);
		if ($is_available) {
			$this -> reservation_model -> book_resource($starts, $ends, $resource, $user);
			echo 'booked';
		}else{
		echo 'already booked';
		}
	}

	public function checkAvailability($resource_id, $st, $end) {
		$pstart = $this -> input -> post('start_date');
		$pend = $this -> input -> post('end_date');
		//just for testing
		if (!$pstart) {
			$pstart = $st;
			$pend = $end;
		}
		//just for testing

		$is_available = $this -> reservation_model -> checkAvailability($pstart, $pend, $resource_id);
		var_dump($is_available);
	}

	/*--------------------------------------------------------------------------------------
	 -------------------------------just for testing-----------------------------------------
	 ----------------------------------------------------------------------------------------*/
	public function check($resource) {

		//$newTimestamp = mktime(0, 0, 0, $month, $day, $year);
		$start = '2013-01-10 10:13:08';
		$end = '2013-01-25 10:12:42';

		//-------------
		$timestamp = strtotime("2011-9-12 05:48:00");
		$year = date('Y', $timestamp);
		$month = date('m', $timestamp);
		$day = date('d', $timestamp);
		$newTimestamp = mktime(0, 0, 0, $month, $day, $year);
		//echo $newTimestamp;
		////////-------------
		$this -> checkAvailability($resource, $start, $end);

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
