<?php
class Skill_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
   }




    public function get_skills($resource_id){
        $this->db->select("skill.skillname");
        $this->db->join('resource_has_skill', 'resource_has_skill.skill_idskill = skill.idskill');
        $this->db->where("resource_has_skill.resource_idresource",$resource_id);
        $this->db->group_by('skill.idskill');
        $resource=$this->db->get("skill");

        return $resource;
    }
   
   
   
}
 
 
