<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Magzine extends CI_Controller 
{
	//index page for magzine controller
	public function index()
	{
		$data = array();

		$this->load->model('magzine/Publication');
		$publication = new Publication();
		$publication->load(1);
		$data['publication'] = $publication;

		$this->load->model('magzine/Issue');
		$issue = new Issue();
		$issue->load(1);
		$data['issue'] = $issue;

		$this->load->view('magzine/magzines');
		$this->load->view('magzine/magzine',$data);
	}
	// add a magzine
	public function add() {
        // Populate publications.
        $this->load->model('magzine/Publication');
        $publications = $this->Publication->get();
        $publication_form_options = array();
        foreach ($publications as $id => $publication) {
            $publication_form_options[$id] = $publication->publication_name;
        }
        $this->load->view('magzine/mag+zine_form', array(
            'publication_form_options' => $publication_form_options, 
        ));
    }
}