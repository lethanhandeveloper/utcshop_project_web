<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->load->model('product_model');
	}

	public function index($level)
	{
		$data = array(
			"categories" => $this->product_model->getCategorybyLevel($level),
			"new_products" => $this->product_model->getnewProductbyCategoryLevel($level),
			"category_type" =>$level
		);
		$this->load->view('home_product_view', $data, FALSE);
	}

	public function viewbycategory($category_type, $category_id, $page){
		$limit=8;
		$start = ($page-1)*$limit;

		$data = array(
			"categories" => $this->product_model->getCategorybyLevel($category_type),
			"current_category" =>$this->product_model->getCategorybyId($category_id),
			"products"=>$this->product_model->getProductbyCategory($category_id, $start, $limit),
			"page_total"=>ceil(($this->product_model->count_all($category_id)/$limit)),
			"category_type" => $category_type,
			"current_page" => $page,
			"category_id" => $category_id
		);
		
		$this->load->view('by_category_view', $data, FALSE);
	}
	public function detail($id){
		$data = array(
			"product"=>$this->product_model->getProductById($id),
			"comments" =>$this->product_model->getCommentbyId($id)
		);
		$this->load->view('detail', $data, FALSE);
	}
	public function search(){
		$content = $this->input->get('content');
		$option_price = $this->input->get('price');
		$query_price="";
		if(empty($option_price)){
			$data =array(
				"products" => $this->product_model->getProductbyKeyword($content),
				"content" => $content
			);
		}else{
			switch ($option_price) {
				case "1":
					$query_price="price<1000000";
					break;
				case "2":
					$query_price="price BETWEEN 1000000 AND 3000000";
					break;
				case "3":
					$query_price="price BETWEEN 3000000 AND 5000000";
					break;
				case "4":
					$query_price="price BETWEEN 5000000 AND 8000000";
					break;
				case "5":
					$query_price="price BETWEEN 8000000 AND 10000000";
					break;
				case "6":
					$query_price="price >10000000";
					break;	
			}
			$data =array(
				"products" => $this->product_model->getProductbyPrice($content, $query_price),
				"content" => $content
			);
		}
				
		$this->load->view('search_view', $data, FALSE);
	}
	public function comment_handler(){
		$name=$_SESSION['name'];
		$idnd = $_SESSION['userid'];
		$idsp = $this->input->post('product_id');
		$title = $this->input->post('title');
		$content = $this->input->post('content');
		$time =	date('Y-m-d H:i:s');

		$this->product_model->addComment($idnd, $idsp, $title, $content, $time);

		$str='<div class="row">';
		$str.='<div class="col-sm-3">';
		$str.= '<div class="review-block-name font-weight-bold">'.$name.'</div>';
		$str.=	'<div class="review-block-date">'.$time.'</div>';
		$str.='</div>';
		$str.='<div class="col-sm-9">';
		$str.=	'<div class="review-block-title">'.$title.'</div>';
		$str.=	'<div class="review-block-description">'.$content.'</div>';
		$str.='</div>';
		$str.='</div>';
		echo $str;
	}
}

/* End of file Product.php */
/* Location: ./application/controllers/Product.php */