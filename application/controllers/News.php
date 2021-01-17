<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
	}

	public function index()
	{
		$data = array("news" => $this->news_model->getNews());

		$this->load->view('news_view', $data, FALSE);
	}
	public function view_more($id){
		$data = array("one_news" => $this->news_model->getNewsbyId($id));

		$this->load->view('view_more_view', $data, FALSE);
	}
}

/* End of file News.php */
/* Location: ./application/controllers/News.php */