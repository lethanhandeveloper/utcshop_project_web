<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class account_model extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		
	}
	public function getAccountbyId($id){
		$this->db->where('id', $id);
		return $this->db->get('account')->result_array();
	}
	public function getAccount($username, $password)
	{
		$this->db->select('*');
		$this->db->from('account');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get() ->result_array();
	}
	public function checkExist($username){
		$this->db->select('*');
		$this->db->from('account');
		$this->db->where('username', $username);
		return $this->db->get()->result_array();
	}
	public function insertAccount($name, $username, $password, $date, $gender, $email, $phone, $address, $registed_date){
		$data = array(
					"name" =>$name,
					"username" =>$username,
					"password" =>$password,
					"date_of_birth" =>$date,
					"gender" =>$gender,
					"email" =>$email,
					"phone_number" =>$phone,
					"address" =>$address,
					"registered_date" =>$registed_date,
					"role" =>0
				);
		return $this->db->insert('account', $data);
	}


}
/* End of file login_model.php */
/* Location: ./application/models/login_model.php */