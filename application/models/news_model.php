<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class news_model extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		
	}
	public function getNews(){
		$this->db->select('*');
		return $this->db->get('news')->result_array();
	}
	public function getNewsbyId($id){
		$this->db->select('*');
		$this->db->from('news');
		$this->db->where('id', $id);
		return $this->db->get()->result_array();
	}
}

/* End of file news_model.php */
/* Location: ./application/models/news_model.php */