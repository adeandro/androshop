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

		$data['products'] = $this->product_model->get_product()->result();

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
		$data = array();
		$data['carts'] = $this->product_model->get_cart()->result();

		$id_user 		= $this->input->post('id_user');
		$id_product		= $this->input->post('id_product');
		$harga			= $this->input->post('harga');
		$qty			= $this->input->post('qty');

		$this->product_model->insert_cart($qty, $id_user, $id_product, $harga);

		$this->template->set('title','Cart');
		$this->template->load('home_template','content','cart', $data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */ ?>