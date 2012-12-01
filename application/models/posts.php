<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class posts extends CI_Model {
	
	public function GetNewestPosts($last_id) {
		
		$this->db->select("*");
		$this->db->from("posts p");
		$this->db->where("p.timestamp > 
			(SELECT timestamp FROM posts WHERE postID = $last_id)");
		$this->db->order_by("p.timestamp");
		
		$this->db->get();
		
		$this->db->result_array();
	}
}
