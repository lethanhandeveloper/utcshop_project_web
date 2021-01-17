<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class support_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function addSupport($title, $content, $name, $phone, $email, $date){
		$data = array(
					"title" => $title,
					"content" => $content,
					"name" => $name,
					"phone" => $phone,
					"email" => $email,
					"date" => $date
				);
		$this->db->insert('support', $data);
	}
}	

/* End of file support_model.php */
/* Location: ./application/models/support_model.php */