<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class bill_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getBill(){
		$this->db->select('*');
		$this->db->from('bill');
		return $this->db->get()->result_array();
	}
	public function gettodaysuccessBill($current_date){
		$this->db->select('bill.id as id, account.name as name, bill.address,bill.phone,bill.email, bill.status');
		$this->db->from('bill');
		$this->db->where('last_update_date =', $current_date);
		$this->db->where('status', "Đã giao hàng");
		$this->db->join('account', 'bill.account_id = account.id');
		return $this->db->get()->result_array();
	}
	public function get30daysuccessBill($last_30_day){
		$this->db->select('bill.id as id, account.name as name, bill.address,bill.phone,bill.email, bill.status');
		$this->db->from('bill');
		$this->db->where('last_update_date >=', $last_30_day);
		$this->db->where('status', "Đã giao hàng");
		$this->db->join('account', 'bill.account_id = account.id');
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
	public function changeStatus($bill_id, $status, $current_time){
		$this->db->where('id', $bill_id);
		if($status==1){
			$status="Đang xử lý";
		}else if($status==2){
			$status="Đã đóng gói";
		}else if($status==3){
			$status="Đang vận chuyển";
		}else if($status==4){
			$status="Đã giao hàng";
		}else{
			$status="Đã hủy";
		}
		$data= array(
				"status" => $status,
				"last_update_date" => $current_time
			);
		$this->db->update('bill', $data);
	}
}

/* End of file bill_model.php */
/* Location: ./application/models/bill_model.php */