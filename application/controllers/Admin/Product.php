<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		
		parent::__construct();
		//phan quyen
		$this->load->library('session');
		if(!$this->session->has_userdata('adminid')){ 	
			redirect(base_url());
		}
		
		$this->load->model('admin/product_model');
		$this->load->model('admin/category_model');
		$this->load->helper(array('form','url'));
		$config['upload_path']= 'img/product';
		//upload file
		// xulyfile
		$config['encrypt_name'] = TRUE;
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
	}

	public function index()
	{
		$data=array(
			'products'=> $this->product_model->getProduct()
		);
		$this->load->view('admin/product_view', $data, FALSE);
	}
	
	public function add_product(){
		$data=array('categories'=> $this->category_model->getCategory());
		$this->load->view('admin/add_product_view', $data, FALSE);
	}
	public function add(){
		$name=$this->input->post('name');

		$this->upload->do_upload('image');
		//lay ten da upload
		$upload_data = $this->upload->data(); 
		$image = $upload_data['file_name'];

		$description=$this->input->post('description');
		$quantity=$this->input->post('quantity');
		$sold=$this->input->post('sold');
		$price=$this->input->post('price');
		$discount=$this->input->post('discount');
		$promotion=$this->input->post('promotion');
		$category_id=$this->input->post('category_id');
		$updated_date=date('Y-m-d H:i:s');
	
		if($this->product_model->insertProduct($name, $image, $description, $quantity, $sold, $price, $discount ,$promotion, $category_id, $updated_date)){
			"Thêm sản phẩm thành công";
		}
	}
	public function delete(){
		$id = $this->input->get('id');
		$this->product_model->deleteProduct($id);
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function edit_product(){
		$id = $this->input->get('id');
		$data =array(
				"products"=> $this->product_model->getProductbyId($id),
				'categories'=> $this->category_model->getCategory()
			);
		
		$this->load->view('admin/edit_product_view', $data, FALSE);

	}
	public function update(){
		$id =$this->input->post('id');
		$name=$this->input->post('name');

		if($_FILES["image"]["name"]==""){
			$image = $this->input->post('old-image');
		}else{
			$this->upload->do_upload('image');
			//lay ten da upload
			$upload_data = $this->upload->data(); 
			$image = $upload_data['file_name'];
		}

		$description=$this->input->post('description');
		$quantity=$this->input->post('quantity');
		$sold=$this->input->post('sold');
		$price=$this->input->post('price');
		$discount=$this->input->post('discount');
		$promotion=$this->input->post('promotion');
		$category_id=$this->input->post('category_id');
		$updated_date=date('Y-m-d H:i:s');
		
		if($this->product_model->updateProductbyId($id, $name, $image, $description, $quantity, $sold, $price, $discount ,$promotion, $category_id, $updated_date)){
			echo "Sản phẩm đã được cập nhật";
		}
	}
}

/* End of file Product.php */
/* Location: ./application/controllers/Product.php */