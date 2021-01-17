<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getProduct()
	{
		// $this->db->select('*');
		// return $this->db->get('product')->result_array();
		$this->db->select('product.id,product.name,product.image,description,quantity,sold,price,discount,promotion,category_id,
			updated_date,category.id as category_id,category.name as category_name,category.image as category_image,level');    
		$this->db->from('product'); 
		$this->db->join('category', 'category.id = product.category_id'); 
		return $this->db->get()->result_array(); 
	}
	public function insertProduct($name, $image, $description, $quantity, $sold, $price, $discount ,$promotion, $category_id, $updated_date){
		$data = array(
			'name'=>$name,
			'image'=>$image,
			'description' =>$description,
			'quantity'=>$quantity,
			'sold' =>$sold,
			'price'=>$price,
			'discount'=>$discount,
			'promotion'=>$promotion,
			'category_id'=>$category_id,
			'updated_date'=>$updated_date
		);
		return $this->db->insert('product', $data);
	}
	public function deleteProduct($id){
		$this->db->where('id', $id);
		$this->db->delete('product');
	}
	public function getProductbyId($id){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('id', $id);

		return $this->db->get()->result_array();
	}
	public function updateProductbyId($id, $name, $image, $description, $quantity, $sold, $price, $discount ,$promotion, $category_id, $updated_date){
		$data = array(
			'name'=>$name,
			'image'=>$image,
			'description' =>$description,
			'quantity'=>$quantity,
			'price'=>$price,
			'sold' =>$sold,
			'discount'=>$discount,
			'promotion'=>$promotion,
			'category_id'=>$category_id,
			'updated_date'=>$updated_date
		);

		$this->db->where('id', $id);
		return $this->db->update('product', $data);
	}
	public function getlimitProduct($start, $limit){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->limit($start,$limit);
		if($this->db->get()->result_array()){
			return $this->db->get()->result_array();
		}
		return false;
	}
	public function get_total()
	{
		return $this->db->count_all("product");
	}
	
	
}

/* End of file product_model.php */
/* Location: ./application/models/product_model.php */