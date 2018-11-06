<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$data = array();

		$this->template->set('title','Dashboard');
		$this->template->load('master_template','content','admin/index',$data);
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */ 