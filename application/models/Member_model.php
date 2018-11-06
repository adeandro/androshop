<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {

	public function create_member($username, $email, $password)
	{
		$object = [
			'username'	=> $username,
			'email'		=> $email,
			'password'	=> md5($password),
			'level'		=> 'user'
		];

		if ($this->db->insert('member', $object)) {
			return TRUE;
		}else{
			return FALSE;
		}
	}


}

/* End of file Member_model.php */
/* Location: ./application/models/Member_model.php */ 