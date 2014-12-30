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
		$limit = array(
			'username'=>$username,
			'password'=>sha1(md5($password))
		);

		$query = $this->db->get_where('users',$limit);

		if($query->num_rows() == 1)
		{
			echo 'welcome';
		}else
		{
			$session = array('error','Invalid Username or Password!');
			//$this->session->set_userdata('error','Invalid Username or Password!');
			$this->session->set_userdata($session);
			redirect(site_url(),'refresh');
		}
	}
}

?>