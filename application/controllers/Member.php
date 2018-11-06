<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function index()
	{
		echo "";
	}

	public function logout()
	{
		$this->ion_auth->logout();
	}

}

/* End of file Member.php */
/* Location: ./application/controllers/Member.php */ 