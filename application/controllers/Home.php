<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('product_model');
	}

	public function index()
	{
		$products=array(
					"new_products" => $this->product_model->getnewProduct(),	
					"hot_products" => $this->product_model->gethotProduct()
				);
		
		$this->load->view('home_view',$products,FALSE);
	}
	
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */