<?php

class Upload extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
	}

	function index()
	{
		$this->load->view('study/upload_form');
	}

	function test()
	{
		$this->uploadImage();
	}

	function uploadImage()
	{
		$config['upload_path'] = 'site/images/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '5000';
		$config['max_width'] = '1920';
		$config['max_height'] = '1280';
		//$config['overwrite'] = TRUE;

		$this->load->library('upload',$config);
		if(!$this->upload->do_upload('userimage'))
		{
			$data['info'] = $this->upload->display_errors();
			$this->load->view('study/upload_result',$data);
			//return false;
		}else
		{
			$data['upload_data'] = $this->upload->data();
			//$this->_createThumb($fileInfo['file_name']);
			//$data['uploadInfo'] = $fileInfo;
			//$data['thumb_name'] =$fileInfo['raw_name'].'_thumb'.$fileInfo['file_ect '];
			
			//$image = 'site/images/'.$fileInfo['raw_name'];
			$data['info'] = 'done!!!';
			$data['image'] = 'site/images/'.$data['upload_data']['file_name'];
			$this->load->view('study/upload_result',$data);
			//return true;
		}
	}
}

?>