<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		session_start();
	}

	public function index()
	{
		if(isset($_SESSION['authorized']))
		{
			$data['title'] = 'Personal Profile';
			$data['head'] = 'Welcome back!';
			$this->load->view('message/header',$data);
			//load data from database
			$this->load->view('message/info');
			$this->load->view('message/footer');
		}else
		{
			$data['title'] = 'My MessageBoard';
			$data['head'] = 'Welcome to message board!';

			
			$this->load->helper('form');
			$this->load->view('message/header',$data);
			$this->load->view('message/login_form');
			//load message from database
			//$this->load->view('message/message');
			$this->load->view('message/info');
			$this->load->view('message/footer');
		}

		
	}

	public function login()
	{
		$this->load->library('form_validation');

		//$data['title'] = 'Personal Profile';
		//$data['head'] = 'Welcome back!';

		$this->form_validation->set_rules('username','Username','required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('password','Password','required|min_length[5]|max_length[12]');

		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
			//$data['title'] = 'Failed to log in!';
			//$data['head'] = 'Please try again!';
			//$this->load->helper('form');
			//$this->load->view('message/header',$data);
			//$this->load->view('message/login_form');
			//$this->load->view('message/message');
			//$this->load->view('message/info');
			//$this->load->view('message/footer');
			//$this->index();
			header("Location:index.php");
		}else
		{
			if(true)//log in successfully
			{
				$_SESSION['authorized'] = 'userID';
				echo 'Well Done!';
			}else
			{

			}
			
			
		}
	}
}

?>