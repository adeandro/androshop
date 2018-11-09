<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			$this->session->set_flashdata('message', 'Anda harus login terlebih dahulu');
			redirect('auth','refresh');
		}
	}

	public function index()
	{
		$data = array();

		$this->template->set('title', 'Member Page');
		$this->template->load('member_template','content','member/index',$data);
	}

	public function logout()
	{
		$this->ion_auth->logout();
		redirect('auth','refresh');
	}

}

/* End of file Member.php */
/* Location: ./application/controllers/Member.php */ 