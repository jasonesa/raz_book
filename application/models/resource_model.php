<?php
class Resource_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
   }

   //This function returns the list of all resources, specify a parameter to define the maximun of resources to be retreived
    function get_resources($limit=false) {
        if($limit)
		$this->db->select('name,username,position,idresource');
        $this->db->limit($limit, 0);
		$this->db->order_by('name','random');
        $users = $this->db->get('resource');
        return $users;
    }



	//This function returns an array of resources that are booked in a specific reservation
  public function get_by_reservation($reservation_id){
        $this->db->select('*');
        $this->db->from('resource');
        $this->db->join('resource_has_reservation','resource_idresource=resource.idresource');
        $this->db->where("reservation_idreservation",$reservation_id);
        $resource=$this->db->get();
        $resource=$resource->result();
        return $resource;
   }

	//This function retrieves data of a specific user
    public function get_resource($id){
		$this->db->select('idresource,name,username,position');
        $this->db->where("idresource",$id);
        $resource=$this->db->get("resource");
        return $resource;
    }
   
   
   //This function checks if a specific resource is available in a date range
   public function checkAvailability($start_date, $end_date, $resource_id) {
		$nstart = mysql_to_unix($start_date);
		$nend = mysql_to_unix($end_date);
		$not_available = $this -> get_busy_dates($resource_id);
		foreach ($not_available as $busy_range) {
			$starts = mysql_to_unix($busy_range -> start_date);
			$ends = mysql_to_unix($busy_range -> end_date);
			if ((($nstart >= $starts && $nstart <= $ends) || ($nend <= $ends && $nend >= $starts)) || (($starts >= $nstart && $starts <= $nend) || ($ends <= $nend && $ends >= $nstart))) {
				return false;
			}
		}
		return true;
	}
   
   
   //This function retrieves date ranges between a specific resource is booked
   public function get_busy_dates($resource_id) {
		$this -> db -> select("reservation.start_date, reservation.end_date");
		$this -> db -> from('reservation');
		$this -> db -> join('resource_has_reservation', 'resource_has_reservation.reservation_idreservation = reservation.idreservation');
		$this -> db -> where('resource_has_reservation.resource_idresource', $resource_id);
		$dates = $this -> db -> get() -> result();
		return $dates;
	}
   
   
   
   
   //Returns an array with the resources available between a date range
   public function get_available_resources($start_date, $end_date) {
		$statement = "SELECT resource.idresource, resource.name, resource.position, resource.table_id_team FROM resource  WHERE resource.idresource NOT IN(
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
   

   
   
   
}
 
 
