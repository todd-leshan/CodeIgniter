<?php

class Users extends CI_Model
{
	function register($username,$password)
	{
		$new_user = array(
			'username'=>$username,
			'password'=>sha1(md5($password))
		);

		$this->db->insert('users',$new_user);

		return true;
	}
}

?>