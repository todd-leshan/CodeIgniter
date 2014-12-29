<?php
//a full featured login and register system
?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Study1 extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('study/study1/CI_auth');
		$this->load->model('study/study1/CI_menu');
	}

	function index()
	{
		$data = array(
			'menu_top' =>$this->CI_menu->menu_top(),
			);

		$this->load->view('study/study1/welcome',$data);
	}
}