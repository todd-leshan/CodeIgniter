<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AddBlog_controller extends CI_Controller
{
	//$data['title'] = "Todd's Blog System";
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation');
	}

	function index()
	{
		$this->form_validation->set_rules('username','*Username:','reim|required|xss_clean|max_length[30]');
		$this->form_validation->set_rules('title','*Title:','reim|required|xss_clean|max_length[50]');
		$this->form_validation->set_rules('content','*Content:','reim|required|xss_clean|max_length[200]');
		if($this->form_validation->run() == false)
		{
			$this->load->controller('blog_controller');
		}else
		{
			$this->uploadImage();

			$username = $this->input->post('username');
			$title    = $this->input->post('title');
			$content  = $this->input->post('content');
			$image    = $this->session->userdata('image');

			$new_blog = array(
				'title'=>$title,
				'content'=>$content,
				'image'=>$image,
				'username'=>$username,
			);

			$this->load->model('blog/blog_model');
			$this->blog_model->addBlog($new_blog);
		}
	}

	function uploadImage()
	{
		$config['upload_path'] = 'site/images/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '5000';
		$config['max_width'] = '1920';
		$config['max_height'] = '1280';

		$this->load->library('upload',$config);
		if(!$this->upload->do_upload('image'))
		{
			//$data['register_error'] = $this->upload->display_errors();
			$image = array(
				'image'=>'',
			);
			$this->session->set_userdata($image);
			//return false;
		}else
		{
			$file['image'] = $this->upload->data();
			$image = array(
				'image'=>'site/images/'.$file['image']['file_name']
			);
			$this->session->set_userdata($image);
			
			//return true;
		}
	}
	
}

?>