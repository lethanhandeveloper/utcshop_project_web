<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/news_model');
		$this->load->helper(array('form','url'));
		$config['upload_path']= 'img/news';
		//upload file
		// xulyfile
		$config['encrypt_name'] = TRUE;
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
	}

	public function index()
	{
		$this->load->view('admin/news_view');
		
	}
	public function add_news(){
		$this->load->view('admin/add_news_view');
	}
	public function add(){
		$title = $this->input->post('title');
		$short_content = $this->input->post('short_content');
		$content = $this->input->post('content');
		$author = $this->input->post('author');
		$time = date("Y/m/d");

		$this->upload->do_upload('image');
		//lay ten da upload
		$upload_data = $this->upload->data(); 
		$image = $upload_data['file_name'];

		$this->news_model->addNews($title, $short_content, $content, $image,$time, $author);
	}
}

/* End of file News.php */
/* Location: ./application/controllers/News.php */