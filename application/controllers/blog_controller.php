<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('blog/blog_model');
		$this->load->model('blog/user_model');
	}

	function index()
	{
		$data['title'] = "Todd's Blog System";
		$data['h1'] = 'Welcome - Login or Sign up';
		$data['login_error'] = '';
		

		//$session = $this->session->all_userdata('error');
		if(/*if logged in*/2>3)
		{
			//load user info and blog info from database then display
			$data['login_error'] = 'Invalid~';
			//$session = array('error'=>'');
			$this->session->unset_userdata($session);
		}else
		{
			$data['title'] = "Todd's Blog System";
			$data['h1'] = 'Welcome - Login or Sign up';
			$data['body'] = $this->blog_model->getBlog();

			$this->load->view('blog/header',$data);
			$this->load->view('blog/login',$data);
			$this->load->view('blog/main',$data);
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
			$login = $this->User_model->login($username,$password);

			if($login>0)
			{
				$this->user($username);
			}else
			{
				$this->index();
			}

		}else
		{
			//$this->index();
			//check and login
			$username = $_POST['username'];
			$password = $_POST['password'];

			$this->load->model('blog/User_model');
			$login = $this->User_model->login($username,$password);
			if($login)
			{
				$this->user($username);
			}else
			{
				$this->index();
			}
		}
	}

	function user($username)
	{
		$blogArray = $this->blog_model->getBlogByUser($username);
		$user      = $this->user_model->getUserByName($username);

		$userInfo = $user[0];
		$data = array(
			'title'    =>"Todd's Blog System",
			'h1'       =>"Welcome back: $username",
			'user'     =>$userInfo,
			'body'     =>$blogArray,
			'username' =>$username,
		);

		$this->load->view('blog/header',$data);
		$this->load->view('blog/user',$data);
		$this->load->view('blog/user_blog',$data);
		$this->load->view('blog/footer');
	}

	function register_form()
	{
		$data['title'] = "Sign up with Todd's Blog System";
		$data['h1'] = 'Sign up';
		$data['login_error'] = '';
		$data['register_error'] = '';

		$this->load->view('blog/header',$data);
		$this->load->view('blog/login',$data);
		$this->load->view('blog/register',$data);
		$this->load->view('blog/footer');
	}

	function register()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username','Username','trim|required|xss_clean|min_length[5]|max_length[12]|is_unique[users.username]');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean|min_length[5]|max_length[12]|callback_passwordCheck');
		$this->form_validation->set_rules('passwordCon','Confirm Password','trim|required|xss_clean|min_length[5]|max_length[12]|matches[password]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		//$this->form_validation->set_rules('userimage','Profile Image','callback_uploadImage');

		if($this->form_validation->run() == false)
		{
			$data['title'] = "Sign up with Todd's Blog";
			$data['h1'] = 'Sign up';
			$data['login_error'] = '';
			$data['register_error'] = '';
			//$data['register_error'] = $this->session->userdata('error');			

			$this->load->view('blog/header',$data);
			$this->load->view('blog/login',$data);
			$this->load->view('blog/register',$data);
			$this->load->view('blog/footer');
		}else
		{
			if($this->uploadImage())
			{
				$this->new_user();
			}else
			{
				$data['title'] = "Sign up with Todd's Blog";
				$data['h1'] = 'Sign up';
				$data['login_error'] = '';
				//$data['register_error'] = '';
				//$data['register_error'] = $this->session->userdata('error');			

				$this->load->view('blog/header',$data);
				$this->load->view('blog/login',$data);
				$this->load->view('blog/register',$data);
				$this->load->view('blog/footer');
			}
			
		}
	}

	function new_user()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$email = $this->input->post('email');
		$introduction = $this->input->post('introduction');

		$this->load->model('blog/encrypt_model');
		$salt = $this->encrypt_model->genRndSalt();
		$encrypt_password = $this->encrypt_model->encryptUserPwd($password,$salt);

		$image = $this->session->userdata('image');
		//$this->session->unset_userdata('image');
		$new_user = array(
			'username'=>$username,
			'password'=>$encrypt_password,
			'email'=>$email,
			'introduction'=>$introduction,
			'image'=>$image,
			'salt'=>$salt
		);

		if($this->db->insert('users',$new_user))
		{
			redirect('blog_controller/index','refresh');
		}else
		{
			$data['title'] = "Sign up with Todd's Blog";
			$data['h1'] = 'Sign up';
			$data['login_error'] = '';
			$data['register_error'] = 'Sign up failed!';

			$this->load->view('blog/header',$data);
			$this->load->view('blog/login',$data);
			$this->load->view('blog/register',$data);
			$this->load->view('blog/footer');
		}
	}

	function passwordCheck($password)
	{
		if(preg_match('/[0-9a-zA-Z]+/', $password))
		{
			return true;
		}

		$this->form_validation->set_message('passwordCheck','Invalid password','Check your password!');
		return false;
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
			/*$error = array(
				'error'=> $this->upload->display_errors()
			);
			$this->session->set_userdata($error);
			*/
			$data['register_error'] = $this->upload->display_errors();
			return false;
		}else
		{
			$file['image'] = $this->upload->data();
			$image = array(
				'image'=>'site/images/'.$file['image']['file_name']
			);
			$this->session->set_userdata($image);
			
			//
			//$data['image'] = 'site/images/'.$file['image']['file_name'];
			return true;
		}
	}
}