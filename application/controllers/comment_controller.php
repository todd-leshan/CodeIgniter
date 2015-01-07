<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('blog/blog_model');
	}

	function blog_comment()
	{
		$blogID = $this->uri->segment(3);

		$data = array(
			'title'       =>"Todd's Blog System",
			'h1'          =>'Welcome!!!',
			'login_error' =>'',
			'error105'    =>'No Comments found!',
		);

		$data['blogArray']    = $this->blog_model->getBlogByID($blogID);
		$data['commentArray'] = $this->blog_model->getCommentByblogID($blogID);

		$this->load->view('blog/header',$data);
		$this->load->view('blog/login',$data);
		$this->load->view('blog/blog',$data);
		$this->load->view('blog/footer');

	}

	function addComment()
	{
		$blogID = $this->uri->segment(3);
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username','*Username:','reim|required|xss_clean|max_length[30]');
		$this->form_validation->set_rules('content','*Comment:','reim|required|xss_clean|max_length[200]');

		if($this->form_validation->run()  == false)
		{
			$this->load->controller("comment_controller/blog_comment/$blogID");
		}else
		{
			$username = $this->input->post('username');
			$content  = $this->input->post('content');

			$new_comment = array(
				'content' =>$content,
				'username'=>$username,
				'blogID'  =>$blogID,
			);

			$this->blog_model->addComment($new_comment);
		}
	}
}

?>