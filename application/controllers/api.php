<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class api extends MY_Controller {
		
	function __construct()
	{
	    parent::__construct();
		$this->load->model("posts");
	}
	
	public function index()
	{	
		
		
	}
	
	public function pollnew($is_dev = false)
	{
		
		if (!$this->input->is_ajax_request() && !$is_dev)
		{
			$this->session->set_flashdata("errors", "You cannot request that resource");
			$this->url->redirect("/home/");
		}
		
		$last_id = $this->input->post("last_id");
		
		$newest_posts = $this->posts->GetNewestPosts($last_id);
		
		header('Content-Type: application/x-json; charset=utf-8');
   		echo json_encode($newest_posts);
		
	}
	
}