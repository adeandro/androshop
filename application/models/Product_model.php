<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

	public function insert_product($nama, $harga, $kategory, $deskripsi)
	{
		$data = [
			'nama_product'	=> $nama,
			'harga'			=> $harga,
			'deskripsi'		=> $deskripsi,
			'id_kategory'	=> $kategory
		];

		$this->db->insert('product', $data);
		return TRUE;
	}

	public function update_product($id, $nama, $harga, $kategory, $deskripsi)
	{
		$data = [
			'nama_product'	=> $nama,
			'harga'			=> $harga,
			'deskripsi'		=> $deskripsi,
			'id_kategory'	=> $kategory
		];

		$this->db->where('id', $id);
		$this->db->update('product', $data);
		return TRUE;
	}

	public function get_product()
	{
		$this->db->select('*');
		$this->db->from('product');
		$this->db->join('kategory','product.id_kategory = kategory.id_kategory','left');
		$data = $this->db->get();
		return $data;
	}

	public function get_product_desc()
	{
		$this->db->select('*');
		$this->db->from('product');
		$this->db->join('kategory','product.id_kategory = kategory.id_kategory','left');
		$this->db->order_by('id','DESC');
		$data = $this->db->get();
		return $data;
	}

	public function get_product_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('product');
		$this->db->join('kategory','kategory.id_kategory = product.id_kategory');
		$this->db->where('product.id',$id);
		$data = $this->db->get();
		return $data;
	}

	public function delete_product($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('product');
		return TRUE;
	}

	// model kategory

	public function insert_kategory($kategory)
	{
		$this->db->insert('kategory',['nama_kategory' => $kategory]);
		return TRUE;
	}

	public function update_kategory($kategory, $id_kategory)
	{
		$this->db->where('id_kategory', $id_kategory);
		$this->db->update('kategory', ['nama_kategory' => $kategory]);
		return TRUE;
	}

	public function get_kategory()
	{
		$data = $this->db->get('kategory');
		return $data;
	}

	public function delete_kategory($id)
	{
		$this->db->where('id_kategory', $id);
		$this->db->delete('kategory');
		return TRUE;
	}


	// model cart

	public function insert_cart($qty, $id_user, $id_product, $harga)
	{
		$data = [
			'qty'		=> $qty,
			'id_user'	=> $id_user,
			'id_product'=> $id_product,
			'harga'		=> $harga
		];

		$this->db->insert('cart', $data);
		return TRUE;
	}

	public function get_cart()
	{
		
		$data = $this->db->query('SELECT * FROM product a INNER JOIN cart b ON a.id = b.id_product INNER JOIN users c on b.id_user = c.id');
		return $data;
	}

	public function cart_count()
	{
		
	}

}

/* End of file Product_model.php */
/* Location: ./application/models/Product_model.php */ 