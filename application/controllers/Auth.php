<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->ion_auth->logged_in()) {
			if ($this->ion_auth->is_admin()) {
				redirect('admin','refresh');
			}else{
				redirect('member','refresh');
			}
		}
	}

	public function index()
	{
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run() == True) {
			$email 		= $this->input->post('email');
			$password 	= $this->input->post('password');

			if ($this->ion_auth->login($email, $password)) {
				
				if ($this->ion_auth->is_admin()) {
					$this->session->set_flashdata('message', 'Selamat datang..');
					redirect('admin','refresh');
				}else{
					$this->session->set_flashdata('message', 'Selamat datang..');
					redirect('member','refresh');
				}
			}

		}

		$this->load->view('auth/login');
	}

	public function register()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[6]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

		if ($this->form_validation->run() == TRUE) {
			$username 			= $this->input->post('username');
			$email 				= $this->input->post('email');
			$password 			= $this->input->post('password');
			$additional_data	= array('id_level' => 2);

			if ($this->ion_auth->register($username, $password, $email, $additional_data)) {
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

	public function logout()
	{
		$this->ion_auth->logout();
		redirect('/','refresh');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */ 