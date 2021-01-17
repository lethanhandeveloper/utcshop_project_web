<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cart_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insertCart($account_id, $product_id, $quantity){
		$data = array(
					"account_id" =>$account_id,
					"product_id" =>$product_id,
					"quantity" =>$quantity
				);
		return $this->db->insert('cart', $data);
	}
	public function getCart($id){
		$this->db->select('product_id,cart.id as id, product.name as name, product.price as price, cart.quantity as quantity, product.image as image,product.discount as discount');
		$this->db->from('cart');
		$this->db->join('product', 'product.id = cart.product_id');
		$this->db->where('cart.account_id', $id);

		return $this->db->get()->result_array();
	}
	public function delete($id){
		$this->db->where('id', $id);
		return $this->db->delete('cart');
	}
	public function deleteAll($account_id){
		$this->db->where('account_id', $account_id);
		$this->db->delete('cart');
	}
	public function insertBill($account_id, $name, $address, $phone, $email, $method, $time){
		$this->db->where('account_id', $account_id);
		$data = array(
					'account_id' => $account_id,
					'name' => $name,
					'address' => $address,
					'phone' => $phone,
					'email' => $email,
					'method' => $method,
					'time' => $time,
					'status' => "Đang xử lý"
				);
		$this->db->insert('bill', $data);
		return $this->db->insert_id();
	}	
	public function insertbillDetail($bill_id, $product_id, $quantity){
		$data = array(
					"bill_id" => $bill_id,
					"product_id" => $product_id,
					"quantity" => $quantity
				);
		$this->db->insert('bill_detail', $data);
	}
	public function updateCart($account_id, $product_id, $quantity){
		$this->db->where('account_id', $account_id);
		$this->db->where('product_id', $product_id);

		$data = array(
					"quantity" => $quantity
				);
		return $this->db->update('cart', $data);
	}
}

/* End of file cart_model.php */
/* Location: ./application/models/cart_model.php */