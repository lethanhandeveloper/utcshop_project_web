<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class category_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getCategory()
	{
		$this->db->select('*');
		return $this->db->get('category')->result_array();
	}
	public function getCategoryById($id){
		$this->db->select('*');
		$this->db->where('id', $id);
		return $this->db->get('category')->result_array();
	}
	public function insert_Category($name,$image,$category)
	{
		$data = array(
        	'name'=>$name,
        	'image'=>$image,
        	'level' =>$category
    	);
		if($this->db->insert('category', $data)){
			echo "Thành công";
		}
	}
	public function delete_Category($id){
		$this->db->where('id', $id);
		$this->db->delete('category');
	}
	public function edit_Category($id, $name, $image, $level){
		$this->db->where('id', $id);
		$data = array(
        	'name'=>$name,
        	'image'=>$image,
        	'level' =>$level
    	);
		$this->db->update('category', $data);
	}
}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */