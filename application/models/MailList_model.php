<?php

class MailList_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_maillist()
	{
		$query = $this->db->get('mailing_list');
		return $query->result_array();
	}

	/*
	$row can be either an object or an array
	*/
	public function insert($row)
	{
		$this->db->insert('mailing_list',$row);
		return $this->db->insert_id();
	}
}

?>