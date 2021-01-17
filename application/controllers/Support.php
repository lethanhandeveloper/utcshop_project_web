<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Support extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('support_model');
	}

	public function index()
	{
		$this->load->view('support_view');
	}
	public function add(){
		$name = $this->input->post('name');
		$title = $this->input->post('title');
		$content = $this->input->post('content');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$date = date("Y/m/d");

		$this->support_model->addSupport($title, $content, $name, $phone, $email, $date);
	}
}

/* End of file Support.php */
/* Location: ./application/controllers/Support.php */