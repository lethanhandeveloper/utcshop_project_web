<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statistic extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/bill_model');
	}

	public function index()
	{
		
		$current_date=$this->getcurrentDate();

		$bills = $this->bill_model->gettodaysuccessBill($current_date);
		$profit = $this->getProfit($bills);
		
		$data = array(
			"bills" => $bills,
			"profit" => $profit,
			"selected" => 1
		);

		$this->load->view('admin/statistic_view', $data, FALSE);
	}
	//lay ngay hien tai
	public function getcurrentDate(){
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y/m/d");
		$time_stamp = strtotime($time);
		return (int)$time_stamp;
	}
	//tinh doanh thu trong cac bills
	public function getProfit($bills){
		$profit=0;
		$detail_bills = array();

		foreach ($bills as $value) {
			$detail_bills[] = $this->bill_model->getdetailBill($value['id']);
		}
		foreach ($detail_bills as $key=> $value) {
			foreach ($value as $key1 => $value1) {
				$profit += $value1['price']*((100-$value1['discount'])/100)*$value1['quantity'];
			}
		}
		return $profit;
	}
	public function statistic_by_criteria(){
		$criteria = $this->input->get('criteria');
		// if($criteria==1){
		// 	$data = array(
		// 		"bills" => $bills,
		// 		"profit" => $profit,
		// 		"selected" => 1
		// 	);
		// }else if($criteria==2){
		// 	$data = array(
		// 		"bills" => $bills,
		// 		"profit" => $profit,
		// 		"selected" => 2
		// 	);
		// }
		switch ($criteria) {
			case 1:
			$current_date=$this->getcurrentDate();

			$bills = $this->bill_model->gettodaysuccessBill($current_date);
			$profit = $this->getProfit($bills);

			$data = array(
				"bills" => $bills,
				"profit" => $profit,
				"selected" => 1
			);
			$this->load->view('admin/statistic_view', $data, FALSE);
			break;
			case 2:
			$current_date=$this->getcurrentDate();
			$last_30_day = $current_date-60*60*24*30;

			$bills = $this->bill_model->get30daysuccessBill($last_30_day);
			$profit = $this->getProfit($bills);
			
			$data = array(
				"bills" => $bills,
				"profit" => $profit,
				"selected" => 2
			);
			$this->load->view('admin/statistic_view', $data, FALSE);
			break;
			default:
				echo 'Hãy chọn tiêu chí thống kê';
			break;
		}

		
	}

}

/* End of file Statistic.php */
/* Location: ./application/controllers/Statistic.php */