<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class support_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getSupport(){
		$this->db->select('*');
		$this->db->from('support');
		return $this->db->get()->result_array();
	}
}

/* End of file support_model.php */
/* Location: ./application/models/support_model.php */