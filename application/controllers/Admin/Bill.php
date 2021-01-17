<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bill extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if(!$this->session->has_userdata('adminid')){ 	
			redirect(base_url());
		}
		$this->load->model('admin/bill_model');
	}

	public function index()
	{
		$data = array(
			"bills" => $this->bill_model->getBill()
		);
		$this->load->view('admin/bill_view', $data, FALSE);
	}
	public function bill_detail($id){
		$data =array(
			"detail_bills" => $this->bill_model->getdetailBill($id)
		);
		
		$this->load->view('admin/bill_detail_view', $data, FALSE);
	}
	public function changestatus($bill_id, $status){
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$time = date("Y/m/d");
		$time_stamp = strtotime($time);
		
		$current_time=(int)$time_stamp;
	
		$this->bill_model->changeStatus($bill_id, $status, $current_time);

		echo "<script>
		window.history.back();
		</script>
		';";
	}
	public function print(){
		$id=$this->input->get('id');
		$data =array(
			"detail_bill" => $this->bill_model->getdetailBill($id)
		);
		
		$this->load->view('admin/print_view', $data, FALSE);
	}
	
	
}

/* End of file Bill.php */
/* Location: ./application/controllers/Bill.php */