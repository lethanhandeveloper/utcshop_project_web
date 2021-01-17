<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Support extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/support_model');
	}

	public function index()
	{
		$data = array(
					"supports" => $this->support_model->getSupport()
				);
		$this->load->view('admin/support_view', $data, FALSE);
	}

}

/* End of file Support.php */
/* Location: ./application/controllers/Support.php */