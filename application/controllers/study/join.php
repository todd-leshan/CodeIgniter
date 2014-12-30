<?php

class Join extends CI_Controller
{
	//if want to make sure that variables are available to anything inside of your controller, create a constructor
	//everything in here is available through the whole class
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MailList_model');
	}

	//create functions for each of the views that we want to display

	public function index()
	{
		$this->load->helper('form');
		$data['title'] = 'I love sydney!';
		$this->load->view('header',$data);
		$this->load->view('join/form');
		$this->load->view('footer');
	}

	public function name($str)
	{
		$data['title'] = $str;
		$this->load->library('parser');
		$this->parser->parse('theader',$data);
		$this->parser->parse('footer',$data);
		echo 'Welcome '.$str;
	}

	public function save()
	{
		//load a class
		$this->load->library('form_validation');
		
		$data['title'] = "Thanks for leaving a message!";
		
		$this->form_validation->set_rules('last_name','Last Name', 'required');
		$this->form_validation->set_rules('email','Email', 'trim|required|valid_email');
		
		if ( $this->form_validation->run() == FALSE )
		{
			$this->load->view('header', $data);
			$this->load->view('join/form');
			$this->load->view('footer');
		}
		else
		{
			//when the following line doesn't work, everything 
			//seems ok as when it works
			//https://ellislab.com/codeigniter/user-guide/helpers/url_helper.html
			$this->load->helper('url');
			$postdata = array(
				'first_name'	=> $this->input->post('first_name'),
				'last_name'		=> $this->input->post('last_name'),
				'email'			=> $this->input->post('email'),
				'address'		=> $this->input->post('address'),
				'state_code'	=> $this->input->post('state_code'),
				'zip_postal'	=> $this->input->post('zip_postal'),
				'username'		=> $this->input->post('username'),
				'password'		=> $this->input->post('password'),
				'bio'			=> $this->input->post('bio'),
				'num_tours'		=> $this->input->post('num_tours'),
				'interests'		=> $this->input->post('interests'),
			);
			$this->MailList_model->insert($postdata);
			
			$this->load->view('header', $data);
			$this->load->view('join/saved');
			$this->load->view('footer');
		}
	}
}

?>