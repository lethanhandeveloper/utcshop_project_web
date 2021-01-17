<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class bill_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getBillbyUserId($id){
		$this->db->select('*');
		$this->db->from('bill');
		$this->db->where('account_id', $id);
		return $this->db->get()->result_array();
	}

	public function getdetailBill($id){
		$this->db->select(
			'
			product.name as name,product.price as price,product.discount as discount, 
			bill_detail.quantity as quantity,bill.id as bill_id, bill.status as status,
			bill.name as custom_name,bill.address as address,bill.phone as phone,bill.email as email,bill.method,
			bill.time
			');
		$this->db->from('bill_detail');

		$this->db->join('product', 'product.id = bill_detail.product_id');
		$this->db->join('bill', 'bill.id = bill_detail.bill_id');

		$this->db->where('bill.id', $id);

		return $this->db->get()->result_array();
	}
}

/* End of file bill_model.php */
/* Location: ./application/models/bill_model.php */