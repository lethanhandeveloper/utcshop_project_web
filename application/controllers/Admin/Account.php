<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin/account_model');
		if(!$this->session->has_userdata('adminid')){ 	
			redirect(base_url());
		}
	}

	public function index()
	{
		$data= array(
				"accounts" => $this->account_model->getAccount()
			);
		$this->load->view('admin/account_view', $data, FALSE);
	}
	public function delete($id){
		if($this->account_model->delete($id)){
			echo 'Xóa thành công';
		}else{
			echo 'Xóa thất bại';
		}
	}
	public function add_account(){
		$this->load->view('admin/add_account_view');
	}
	public function add(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$name = $this->input->post('name');
		$date = $this->input->post('date');
		$gender = $this->input->post('gender');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$address = $this->input->post('address');
		$registed_date= date('Y-m-d');
		$role=$this->input->post('role');

		if($this->account_model->insert($name, $username, $password, $date, $gender, $email, $phone, $address, $registed_date, $role)){
			echo 'Thêm thành công';
		}else{
			echo 'Thêm thất bại';
		}
	}
	public function edit_account($id){
		$data = array(
					"account" => $this->account_model->getAccountById($id)
				);
		$this->load->view('admin/edit_account_view', $data, FALSE);
	}
	public function edit(){
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$name = $this->input->post('name');
		$date = $this->input->post('date');
		$gender = $this->input->post('gender');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$address = $this->input->post('address');
		$registed_date= date('Y-m-d');
		$role=$this->input->post('role');

		if($this->account_model->edit($id,$name, $username, $password, $date, $gender, $email, $phone, $address, $registed_date, $role)){
			echo 'Sửa thành công';
		}else{
			echo 'Sửa thất bại';
		}
	}
}

/* End of file account.php */
/* Location: ./application/controllers/account.php */