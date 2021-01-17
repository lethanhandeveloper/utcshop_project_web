<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class account_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getAccount(){
		$this->db->select('*');
		$this->db->from('account');
		return $this->db->get()->result_array();
	}
	public function delete($id){
		$this->db->where('id', $id);
		return $this->db->delete('account');
	}
	public function insert($name, $username, $password, $date, $gender, $email, $phone, $address, $registed_date, $role){
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
					"role" => $role
				);
		return $this->db->insert('account', $data);
	}
	public function getAccountById($id){
		$this->db->where('id', $id);
		return $this->db->get('account')->result_array();
	}
	public function edit($id, $name, $username, $password, $date, $gender, $email, $phone, $address, $registed_date, $role){
		$this->db->where('id', $id);
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
					"role" => $role
				);
		return $this->db->update('account', $data);
	}
}

/* End of file account_model.php */
/* Location: ./application/models/account_model.php */