<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('account_model');
		$this->load->model('bill_model');
		$this->load->model('cart_model');
		$this->load->library("cart");
		$this->load->library('session');
		$this->load->library('user_agent');
	}

	public function index()
	{
		$this->load->view('login_view');
	}
	public function login()
	{
		$username=$this->input->post('username');
		$password=md5($this->input->post('password'));
		$data = $this->account_model->getAccount($username, $password);

		foreach ($data as $key => $value) {
			$name=$value['name'];
			$id=$value['id'];
			$role=$value['role'];
		}
		if(count($data)){
			$_SESSION['name']=$name;
			$_SESSION['userid']=$id;
			if($role==1){
				$_SESSION['adminid']=$id;
			}
			// chuyen gio hang vao csdl 
			if(!empty($this->cart->contents())){
				foreach($this->cart->contents() as $item){
					$this->cart_model->insertCart($_SESSION['userid'], $item['id'], $item['qty']);
				}
				$this->cart->destroy();
			}
			header("Location:". base_url());
		}else{
			echo "ĐNTB";
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('userid');
		if($this->session->has_userdata('adminid')){ 	
			$this->session->unset_userdata('adminid');
		}
		
		redirect(base_url(),'refresh');
	}
	public function register(){
		$this->load->view('register_view');
	}
	public function new_register(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$name = $this->input->post('name');
		$date = $this->input->post('date');
		$gender = $this->input->post('gender');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$address = $this->input->post('address');
		$registed_date= date('Y-m-d');

		if($this->account_model->checkExist($username)){
			echo "Tài khoản đã tổn tại";
		}
		else{
			if($this->account_model->insertAccount($name, $username, $password, $date, $gender, $email, $phone, $address, $registed_date)){
				echo 'Thành công';
			}else{
				echo 'Thất bại';
			}
		}
		
	}
	public function bill_info(){
		$data = array(
			"bills" => $this->bill_model->getBillbyUserId($_SESSION['userid'])
		);
		$this->load->view('bill_info_view', $data, FALSE);
	}
	public function detail_bill($id){
		$data =array(
			"detail_bills" => $this->bill_model->getdetailBill($id),
			"id" => $id
		);
		

		$this->load->view('bill_detail_info_view', $data, FALSE);
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */