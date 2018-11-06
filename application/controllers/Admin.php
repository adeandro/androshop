<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$data = array();
		$data['user'] = $this->ion_auth->user()->row();

		$this->template->set('title','Dashboard');
		$this->template->load('master_template','content','admin/index',$data);
	}

	public function user_list()
	{
		
	}

	public function logout()
	{
		$this->ion_auth->logout();
		redirect('auth','refresh');
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */ 