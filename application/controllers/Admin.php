<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			$this->session->set_flashdata('message', 'Anda harus login untuk mengakses halaman admin');
			redirect('auth','refresh');
		}
		if (!$this->ion_auth->is_admin()) {
			redirect('auth','refresh');
		}
	}

	public function index()
	{
		$data = array();

		$this->template->set('title','Dashboard');
		$this->template->load('master_template','content','admin/index',$data);
	}

	public function user_list()
	{
		$data = array();
		$data['users'] = $this->ion_auth->users('members')->result();

		$this->template->set('title','List Users');
		$this->template->load('master_template','content','admin/user_list', $data);
	}

	public function logout()
	{
		$this->ion_auth->logout();
		redirect('auth','refresh');
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */ 