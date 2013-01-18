<?php
class Auth_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
   }

   public function verify_user($email, $password)
   {
      $q = $this
            ->db
            ->where('username', $email)
            ->where('password', sha1($password))
            ->limit(1)
            ->get('user');

      if ( $q->num_rows > 0 ) {
         // person has account with us
         return $q->row();
      }
      return false;
   }
}