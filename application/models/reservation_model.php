<?php
class Reservation_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	//Returns an array with the 10 most recent reservations
	function get_recent() {
		$this -> db -> select("reservation.description, reservation.idreservation, user.name");
		//$this->db->where("active", 1);
		$this -> db -> from('reservation');
		$this -> db -> join('user', 'user.iduser = reservation.user_id');
		$this -> db -> limit(10, 0);
		$this -> db -> order_by("start_date", "desc");
		$reservations = $this -> db -> get();
		return $reservations;
	}
	
	/**insert ignoring if exists a constraint
	$insert_query = $this->db->insert_string('my_table', $data);
	$insert_query = str_replace('INSERT INTO','INSERT IGNORE INTO',$insert_query);
	$this->db->query($insert_query);
	**/


	/***************************************MOVE TO RESOURCE_MODEL***************************************************
	//Returns an array with the resources available between a date range
	public function get_available_resources($start_date, $end_date) {
		$statement = "SELECT resource.idresource, resource.name, resource.position FROM resource  WHERE resource.idresource NOT IN(
              SELECT resource.idresource
              FROM resource
              JOIN resource_has_reservation ON resource_idresource = resource.idresource
              JOIN reservation ON idreservation = reservation_idreservation
              WHERE 
              (
              (('$start_date'>=start_date AND '$start_date' <=end_date) OR ('$end_date' <= end_date AND  '$end_date' >=start_date))
              OR
              ((start_date>='$start_date' AND start_date<='$end_date') OR ( end_date<='$end_date' AND end_date>= '$start_date'))
              )
              GROUP BY resource.idresource
              )
              ORDER BY resource.table_id_team";
		$query = $this -> db -> query($statement);
		$result = $query -> result();
		return $result;

	}
	**************************************************************************************************************/
	

	public function get_reservation($reservation_id) {
		$this -> db -> where("idreservation", $reservation_id);
		$reservation = $this -> db -> get("reservation");

		return $reservation;
	}

	public function get_reservations($user_id) {
		$this -> db -> where('user_id', $user_id);
		$reservations = $this -> db -> get("reservation");
		return $reservations -> result();
	}

	private function add_resource($resource_id, $reservation_id) {
		$data = array('resource_idresource' => $resource_id, 'reservation_idreservation' => $reservation_id);
		$this -> db -> insert('resource_has_reservation', $data);
	}

	public function book_resource($start, $end, $resource, $user_id, $reservation_name) {
		$this -> db -> trans_start();
		$this -> create_reservation($start, $end, $user_id, $reservation_name);
		$reservation_id = $this -> db -> insert_id();
		$this -> book_resourcex($resource, $reservation_id);
		$this -> db -> trans_complete();

	}

	public function book_resourcex($id_resource, $reservation_id) {
		$data = array('resource_idresource' => $id_resource, 'reservation_idreservation' => $reservation_id);
		$this -> db -> insert('resource_has_reservation', $data);

	}

	public function create_reservation($start, $end, $user, $name) {
		$data = array('start_date' => $start, 'end_date' => $end, 'description' => $name, 'user_id' => $user);
		$this -> db -> insert('reservation', $data);

	}

}
