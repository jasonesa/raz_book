<?php
class Resource_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
   }

   
    function get_resources($limit=false) {
        if($limit)
		$this->db->select('name,username,position,idresource');
        $this->db->limit($limit, 0);
		$this->db->order_by('name','random');
        $users = $this->db->get('resource');
        return $users;
    }




  public function get_by_reservation($project_id){
        $this->db->select('*');
        $this->db->from('resource');
        $this->db->join('resource_has_reservation','resource_idresource=resource.idresource');
        $this->db->where("reservation_idreservation",$project_id);
        $resource=$this->db->get();
        $resource=$resource->result();
       // var_dump($resource);
        return $resource;
   }


    public function get_resource($id){
		$this->db->select('idresource,name,username,position');
        $this->db->where("idresource",$id);
        $resource=$this->db->get("resource");
        return $resource;
    }
   

   
   
   
}
 
 
