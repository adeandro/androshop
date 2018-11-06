<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('member_model');
		
	}

	public function index()
	{
		$this->load->view('auth/login');
	}

	public function register()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[6]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

		if ($this->form_validation->run() == TRUE) {
			$username 	= $this->input->post('username');
			$email 		= $this->input->post('email');
			$password 	= $this->input->post('password');

			if ($this->member_model->create_member($username, $email, $password) == TRUE) {
					$this->session->set_flashdata('message', 'Berhasil mendaftar, silahkan login');
					redirect('auth','refresh');
				}else{
					$this->session->set_flashdata('message', 'Gagal mendaftar, silahkan cek kembali');
					redirect('auth/register','refresh');
				}
		} 

		$this->load->view('auth/register');
	}

	public function login()
	{
		
	}

	public function create_member()
	{

	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */ 