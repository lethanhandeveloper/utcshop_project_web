<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getCategoryById($id){
		$this->db->select('name');
		$this->db->where('id', $id);
		return $this->db->get('category')->result_array();
	}
	public function getCategorybyLevel($level){
		$this->db->select('*');
		$this->db->where('level', $level);
		return $this->db->get('category')->result_array();
	}
	public function getProductbyId($id){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('id', $id);

		return $this->db->get()->result_array();
	}
	public function getProduct()
	{
		$this->db->select('*');
		$dulieu=$this->db->get('product');
		return $dulieu->result_array();
	}
	public function getCategory(){
		$this->db->select('*');
		return $this->db->get('category')->result_array();
	}
	public function getnewProduct(){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->limit(8	,0);
		$this->db->order_by("id", "desc");
		
		return $this->db->get()->result_array();
	}
	public function gethotProduct(){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->limit(8	,0);
		$this->db->order_by("sold", "desc");

		return $this->db->get()->result_array();
	}
	public function getnewProductbyCategoryLevel($category_level){
		$this->db->select('product.id,product.name,product.image,product.price,product.discount');
		$this->db->from('product');
		$this->db->join('category', 'product.category_id = category.id');
		$this->db->where('category.level', $category_level);
		$this->db->limit(8,0);
		$this->db->order_by("product.id", "desc");
		
		return $this->db->get()->result_array();
	}
	public function getProductbyCategory($category_id,$start,$limit){
		$start= (int)$start;
		$limit= (int)$limit;
		
		$this->db->select('*');
		$this->db->from('product');
		$this->db->limit($limit, $start);
		$this->db->where('category_id', $category_id);
		
		return $this->db->get()->result_array();
		
	}
	public function count_all($category_id){
		$this->db->select('*');
		$this->db->where('category_id', $category_id);
		$result=$this->db->get('product');
        return $result->num_rows();
    }
    public function getProductbyKeyword($content){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->like('name', $content, 'BOTH');
		return $this->db->get()->result_array();
	}
	public function getProductbyPrice($content, $query_price){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->like('name', $content, 'BOTH');
		$this->db->where("$query_price");
		return $this->db->get()->result_array();
	}
	public function getlimitProduct($start, $limit){
		$this->db->select('*');
		$this->db->limit($start,$limit);
		if($this->db->get("product")->result_array()){
			return $this->db->get("product")->result_array();
		}
		return false;
	}
	public function get_total()
	{
		return $this->db->count_all("product");
	}
	public function getCommentbyId($product_id){
		$this->db->select('*');
		$this->db->from('comment');
		$this->db->join('account', 'comment.account_id = account.id');
		$this->db->where('comment.product_id', $product_id);
		$this->db->order_by('comment.id', 'desc');

		return $this->db->get()->result_array();
	}
	public function addComment($idnd, $idsp, $title, $content, $time){
		$this->db->where('innd', $idnd);
		$data = array(
					'account_id' =>$idnd,
					'product_id' => $idsp,
					'title' => $title,
					'content' => $content,
					'time' => $time
				);
		$this->db->insert('comment', $data);
	}
	public function updatequantityProduct($product_id ,$sold){
		$this->db->where('id', $product_id);
		$data = array(
					"sold" => $sold
				);
		$this->db->update('product', $data);
	}
}	

/* End of file Product_model.php */
/* Location: ./application/models/Product_model.php */