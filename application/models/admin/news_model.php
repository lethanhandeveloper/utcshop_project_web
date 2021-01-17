<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class news_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function addNews($title, $short_content, $content, $image,$time, $author){
		$data = array(
					"title" => $title,
					"short_content" => $short_content,
					"content" => $content,
					"image" => $image,
					"time" => $time,
					"author" => $author
				);
		$this->db->insert('news', $data);
	}
}

/* End of file news_model.php */
/* Location: ./application/models/news_model.php */