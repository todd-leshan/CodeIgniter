<?php

class Login extends CI_Controller
{
	function Login()
	{
		parent::Controller();
		$this->load->model('study/uploadFile/users');
	}

	function register()
	{
		if(isset($_POST['username']))
		{
			$username = mysqli_real_string_escape($this->conn_id,$_POST['username']);
			$password = mysqli_real_string_escape($this->conn_id,$_POST['password']);


			$this->users->register($username,$password);

			redirect('login');
		}else
		{
			$this->load->view('register');
		}
	}
}

?>