<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog extends CI_Controller
{
    function __construct()
    {
        parent::__construct();         
        $this->load->model('study/blog/blog_model');
        $this->load->helper('url');
    }
 
    function index()
    {
        //this function will retrive all entry in the database
        $data['query'] = $this->blog_model->get_all_posts();
        $this->load->view('study/blog/index',$data);
    }
 
    function add_new_entry()
    {
        $this->load->helper('form');
        $this->load->library(array('form_validation','session'));
 
        //set validation rules
        $this->form_validation->set_rules('entry_name', 'Title', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('entry_body', 'Body', 'required|xss_clean');
 
        if ($this->form_validation->run() == FALSE)
        {
            //if not valid
            $this->load->view('study/blog/add_new_entry');
        }
        else
        {
            //if valid
            $name = $this->input->post('entry_name');
            $body = $this->input->post('entry_body');
            $this->blog_model->add_new_entry($name,$body);
            $this->session->set_flashdata('message', '1 new entry added!');
            redirect('study/blog/add_new_entry');
        }
    }

    //this function will retrive a post
    public function post($id)
    {
        $data['query'] = $this->blog_model->get_post($id);
        $data['comments'] = $this->blog_model->get_post_comment($id);
        $data['post_id'] = $id;
        $data['total_comments'] = $this->blog_model->total_comments($id);
         
        $this->load->helper('form');
        $this->load->library(array('form_validation','session'));
         
        //set validation rules
        $this->form_validation->set_rules('commentor', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('comment', 'Comment', 'required');
         
        if($this->blog_model->get_post($id))
        {
            foreach($this->blog_model->get_post($id) as $row)
            {
                //set page title
                $data['title'] = $row->entry_name;
            }
             
            if ($this->form_validation->run() == FALSE)
            {
                //if not valid
                $this->load->view('study/blog/post',$data);
            }
            else
            {
                //if valid
                $name = $this->input->post('commentor');
                $email = strtolower($this->input->post('email'));
                $comment = $this->input->post('comment');
                $post_id = $this->input->post('post_id');
                 
                $this->blog_model->add_new_comment($post_id,$name,$email,$comment);
                $this->session->set_flashdata('message', '1 new comment added!');
                //this may need change,,,see what happen next
                redirect('post/'.$id);
            }
        }
        else
            show_404();
    }
}
 
/* End of file blog.php */
/* Location: ./application/controllers/blog.php */