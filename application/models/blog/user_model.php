<?php

class User_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');
	}

	function login($username,$password)
	{
		$userInfo = $this->getUserByName($username);

		$user = $userInfo[0];
		$user = get_object_vars($user);
		$salt = $user['salt'];

		$limit = array(
			'username'=>$username,
			'password'=>sha1(md5($password).$salt),
			//'salt'    =>$salt,
		);

		$query = $this->db->get_where('users',$limit);

		if($query->num_rows() == 1)
		{
			//$this->load->controller('blog_controller');
			//$this->blog_controller->user($username);
			return true;
		}else
		{
			$session = array(
				'login_error'=>'Invalid Username or Password!',
			);
			//$this->session->set_userdata('error','Invalid Username or Password!');
			$this->session->set_userdata($session);
			//redirect(site_url(),'refresh');
			return false;
		}
	}

	function getUserByName($username)
	{
		$condition = array(
			'username'=>$username,
		);
		$user = $this->db->get_where('users',$condition);
		if($user->num_rows == 1)
		{
			return $user->result();
		}else
		{
			echo 'error happened!';
		}
		
	}
}

?>