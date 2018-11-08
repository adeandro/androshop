<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('product_model');

		if (!$this->ion_auth->logged_in()) {
			$this->session->set_flashdata('message', 'Anda harus login untuk mengakses halaman product');
			redirect('auth','refresh');
		}
	}


	//bagian tampilan

	public function index()
	{
		$data = array();

		$data['products'] = $this->product_model->get_product()->result();

		$this->template->set('title','Product List');
		$this->template->load('master_template','content','product/index',$data);
	}

	public function create_product()
	{
		$data = array();
		$data['kategory'] = $this->product_model->get_kategory()->result();

		$rules = [
			[
				'field' 	=> 'nama',
				'label'		=> 'Nama',
				'rules'		=> 'required',
				'errors'	=> [
					'required'	=> 'Nama Product harus di isi'
				]
			],
			[
				'field' 	=> 'harga',
				'label'		=> 'Harga',
				'rules'		=> 'required',
				'errors'	=> [
					'required'	=> 'Harga Product harus di isi'
				]
			],
			[
				'field' 	=> 'kategory',
				'label'		=> 'Kategory',
				'rules'		=> 'required',
				'errors'	=> [
					'required'	=> 'Kategory Product belum di pilih'
				]
			],
			[
				'field' 	=> 'deskripsi',
				'label'		=> 'Deskripsi',
				'rules'		=> 'required',
				'errors'	=> [
					'required'	=> 'Deskripsi Product harus di isi'
				]
			]
		];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$nama 		= $this->input->post('nama');
			$harga 		= $this->input->post('harga');
			$kategory 	= $this->input->post('kategory');
			$deskripsi 	= $this->input->post('deskripsi');

			if ($this->product_model->insert_product($nama, $harga, $kategory, $deskripsi) == TRUE) {
					$this->session->set_flashdata('success', 'Produk berhasil di tambahkan');
					redirect('product','refresh');
				}else{
					$this->session->set_flashdata('error', 'Product Gagal di tambahkan');
					redirect('product/create_product','refresh');
				}
		}

		$this->template->set('title','Tambah Product');
		$this->template->load('master_template','content','product/create',$data);	
	}

	public function edit($id)
	{
		$data = array();

		$data['product'] = $this->product_model->get_product_by_id($id)->row();

		$data['kategory'] = $this->product_model->get_kategory()->result();

		$rules = [
			[
				'field' 	=> 'nama',
				'label'		=> 'Nama',
				'rules'		=> 'required',
				'errors'	=> [
					'required'	=> 'Nama Product harus di isi'
				]
			],
			[
				'field' 	=> 'harga',
				'label'		=> 'Harga',
				'rules'		=> 'required',
				'errors'	=> [
					'required'	=> 'Harga Product harus di isi'
				]
			],
			[
				'field' 	=> 'kategory',
				'label'		=> 'Kategory',
				'rules'		=> 'required',
				'errors'	=> [
					'required'	=> 'Kategory Product belum di pilih'
				]
			],
			[
				'field' 	=> 'deskripsi',
				'label'		=> 'Deskripsi',
				'rules'		=> 'required',
				'errors'	=> [
					'required'	=> 'Deskripsi Product harus di isi'
				]
			]
		];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$id 		= $this->input->post('id');
			$nama 		= $this->input->post('nama');
			$harga 		= $this->input->post('harga');
			$kategory 	= $this->input->post('kategory');
			$deskripsi 	= $this->input->post('deskripsi');

			if ($this->product_model->update_product($id, $nama, $harga, $kategory, $deskripsi)) {
					$this->session->set_flashdata('success', 'Update Data berhasil');
					redirect('product','refresh');
				}else{
					$this->session->set_flashdata('error', 'Update data gagal');
					redirect('product','refresh');
				}
		}

		$this->template->set('title','Ubah Data');
		$this->template->load('master_template','content','product/edit',$data);
	}

	public function delete($id)
	{
		if ($this->product_model->delete_product($id)) {
			$this->session->set_flashdata('success', 'Product berhasil di hapus');
			redirect('product','refresh');
		}else{
			$this->session->set_flashdata('error', 'Product tidak di hapus');
			redirect('product','refresh');
		}
	}

	// function kategory
	public function kategory()
	{
		$data = array();
		$data['kategory'] = $this->product_model->get_kategory()->result();

		$this->form_validation->set_rules('nama', 'Nama', 'required');

		if ($this->form_validation->run() == TRUE) {
			$kategory = $this->input->post('nama');

			if ($this->product_model->insert_kategory($kategory) == TRUE) {
				$this->session->set_flashdata('success', 'Kategory Berhasil di Simpan');
				redirect('product/kategory','refresh');
			}else{
				$this->session->set_flashdata('error', 'Kategory Gagal di Simpan');
				redirect('product/kategory','refresh');
			}
		}

		$this->template->set('title','Kategory Product');
		$this->template->load('master_template','content','product/kategory',$data);
	}

	public function update_kategory()
		{
			$this->form_validation->set_rules('nama', 'Nama', 'required');

			if ($this->form_validation->run() == TRUE) {
				$kategory = $this->input->post('nama');
				$id_kategory = $this->input->post('kategory');

				if ($this->product_model->update_kategory($kategory, $id_kategory) == TRUE) {
					$this->session->set_flashdata('success', 'Kategory Berhasil di perbarui');
					redirect('product/kategory','refresh');
				}else{
					$this->session->set_flashdata('error', 'Kategory Gagal di perbarui');
					redirect('product/kategory','refresh');
				}
			}
		}
	public function delete_kategory($id)
	{
		if ($this->product_model->delete_kategory($id)) {
			$this->session->set_flashdata('success', 'Kategory Berhasil di hapus');
			redirect('product/kategory','refresh');
		}else{
			$this->session->set_flashdata('error', 'Kategory tidak di hapus');
			redirect('product/kategory','refresh');
		}
	}

}

/* End of file Product.php */
/* Location: ./application/controllers/Product.php */ 