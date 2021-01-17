<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//phan quyen
		$this->load->library('session');
		if(!$this->session->has_userdata('adminid')){ 	
			redirect(base_url());
		}
		$this->load->model('admin/category_model');
		$this->load->helper(array('form','url'));
		$config['upload_path']= 'img/category';
		//upload file
		// xulyfile
		$config['encrypt_name'] = TRUE;
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
	}

	public function index()
	{
		$data=array('categories'=> $this->category_model->getCategory());
		$this->load->view('admin/category_view.php', $data, FALSE);
	}
	//view
	public function add_category()
	{
		$this->load->view('admin/add_category_view.php');
	}
	public function edit_view()
	{
		$data=array("category" => $this->category_model->getCategoryById($this->input->get('id')));		
		$this->load->view('admin/edit_category_view', $data ,FALSE );
	}
	//function
	public function add()
	{
		$name = $this->input->post('name');
		
		$this->upload->do_upload('image');
		//lay ten da upload
		$upload_data = $this->upload->data(); 
		$image = $upload_data['file_name'];
		$category = $this->input->post('category');
		//
		$this->category_model->insert_Category($name,$image,$category);

	}
	public function delete()
	{
		$this->category_model->delete_category($this->input->get('id'));
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function edit(){
		$name = $this->input->post('name');
		$id = $this->input->post('id');
		$image = "";
		$level = $this->input->post('level');
		if($_FILES["image"]["name"]==""){
			$image = $this->input->post('old-image');
		}else{
			$this->upload->do_upload('image');
			//lay ten da upload
			$upload_data = $this->upload->data(); 
			$image = $upload_data['file_name'];
		}
		$this->category_model->edit_Category($id, $name, $image, $level);
		redirect($_SERVER['HTTP_REFERER']);
		redirect($_SERVER['HTTP_REFERER']);
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */