<?php
class Reservation_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

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

	public function get_by_user($resource_id) {
		$this -> db -> select("reservation.start_date, reservation.end_date");
		$this -> db -> from('reservation');
		$this -> db -> join('resource_has_reservation', 'resource_has_reservation.reservation_idreservation = reservation.idreservation');
		$this -> db -> where('resource_has_reservation.resource_idresource', $resource_id);
		$dates = $this -> db -> get() -> result();
		return $dates;

	}

	public function checkAvailability($start_date, $end_date, $resource_id) {

		$nstart = mysql_to_unix($start_date);
		$nend = mysql_to_unix($end_date);
		$not_available = $this -> get_by_user($resource_id);
		foreach ($not_available as $busy_range) {
			$starts = mysql_to_unix($busy_range -> start_date);
			$ends = mysql_to_unix($busy_range -> end_date);
			if ((($nstart >= $starts && $nstart <= $ends) || ($nend <= $ends && $nend >= $starts)) || (($starts >= $nstart && $starts <= $nend) || ($ends <= $nend && $ends >= $nstart))) {
				return false;
			}
		}
		return true;
	}

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
              ORDER BY resource.position";

		$query = $this -> db -> query($statement);
		$result = $query -> result();
		return $result;

	}

	public function get_reservation($reservation_id) {
		$this -> db -> where("idreservation", $reservation_id);
		$reservation = $this -> db -> get("reservation");

		return $reservation;
	}

	public function get_reservations() {
		//$this->db->where();
		$reservations = $this -> db -> get("reservation");

		return $reservations -> result();
	}

	private function add_resource($resource_id, $reservation_id) {
		$data = array('resource_idresource' => $resource_id, 'reservation_idreservation' => $reservation_id);
		$this -> db -> insert('resource_has_reservation', $data);
	}

	public function book_resource($start, $end, $resource,$user_id) {
		$this -> db -> trans_start();
		$this -> create_reservation($start, $end,$user_id);
		$reservation_id = $this -> db -> insert_id();
		$data = array('resource_idresource' => $resource, 'reservation_idreservation' => $reservation_id);
		$this -> db -> insert('resource_has_reservation', $data);
		$this -> db -> trans_complete();

	}

	public function create_reservation($start, $end,$user) {
		$data = array('start_date' => $start, 'end_date' => $end, 'description' => 'TBD', 'user_id' => $user);
		$this -> db -> insert('reservation', $data);

	}

}
