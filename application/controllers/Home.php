<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
	}

	public function index()
	{
		$data = array();

		$this->template->set('title','Home');
		$this->template->load('home_template','content','home',$data);
	}

	public function show_product($id)
	{
		$data = array();
		$data['product'] = $this->product_model->get_product_by_id($id)->row();
		$data['user'] = $this->ion_auth->user()->row();

		$this->template->set('title',$data['product']->nama_product);
		$this->template->load('home_template','content','show',$data);
	}

	public function chart()
	{
		
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */ ?>