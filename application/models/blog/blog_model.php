<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//get all blogs and return a two_d array
	function getBlog()
	{
		$query = $this->db->get('blog');
		return $query->result();
	}

	function addBlog($new_blog)
	{
		$this->db->insert('blog', $new_blog);
		redirect('blog_controller','refresh');
	}

	function getBlogByID($blogID)
	{
		$condition = array(
			'blogID'=>$blogID
		);
		$blog = $this->db->get_where('blog',$condition);
		return $blog->result();
	}

	function getCommentByblogID($blogID)
	{
		$condition = array(
			'blogID'=>$blogID
		);
		$comment = $this->db->get_where('comment',$condition);
		return $comment->result();
	}

	function addComment($new_comment)
	{
		$this->db->insert('comment',$new_comment);
		$blogID = $new_comment['blogID'];
		redirect("comment_controller/blog_comment/$blogID",'refresh');
	}
}

?>