<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	function blog_comment()
	{
		$blogID = $this->uri->segment(3);

		$data['title']       = "Todd's Blog System";
		$data['h1']          = 'Welcome!!!';
		$data['login_error'] = '';
		$data = array(
			'error105'=>'No Comments found!',
		);

		$this->load->model('blog/blog_model');
		$data['blogArray']    = $this->blog_model->getBlogByID($blogID);
		$data['commentArray'] = $this->blog_model->getCommentByblogID($blogID);

		$this->load->view('blog/header',$data);
		$this->load->view('blog/login',$data);
		$this->load->view('blog/blog',$data);
		$this->load->view('blog/footer');

	}
}

?>