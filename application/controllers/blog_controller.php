<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
	}

	function index()
	{
		$data['title'] = "Todd's Blog";
		$data['h1'] = 'Welcome - Login or Sign up';
		$data['login_error'] = '';
		$session = $this->session->all_userdata('error');
		if(//if logged in)
		{
			//load user info and blog info from database then display
			$data['login_error'] = 'Invalid~';
			//$session = array('error'=>'');
			$this->session->unset_userdata($session);
		}else
		{
			$data['title'] = "Todd's Blog";
			$data['h1'] = 'Welcome - Login or Sign up';

			$this->load->view('blog/header',$data);
			$this->load->view('blog/login',$data);
			$this->load->view('blog/main');
			$this->load->view('blog/footer');
		}
		
	}

	function login()
	{
		if(isset($_POST['username']) && isset($_POST['password']))
		{
			//check and login
			$username = $_POST['username'];
			$password = $_POST['password'];

			$this->load->model('blog/User_model');
			$this->User_model->login($username,$password);
		}else
		{
			$this->index();
		}
	}

	function register()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username','Username','trim|required|xss_clean|min_length[5]|max_length[12]|is_unique[user.username]');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean|min_length[5]|max_length[12]|callback_passwordCheck');
		$this->form_validation->set_rules('passwordCon','Confirm Password','trim|required|xss_clean|min_length[5]|max_length[12]|matches[password]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
	}

	function passwordCheck($password){

	}
}