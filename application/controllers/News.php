<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_news');
	}

	public function index()
	{
		$data['news'] = $this->mdl_news->get_news();
		$this->load->view('news/list', $data);
	}

	public function view($slug = NULL)
	{
		$data['news_item'] = $this->mdl_news->get_news($slug);
        if (empty($data['news_item']))
        {
            show_404();
        }

        $data['title'] = $data['news_item']['title'];
        $this->load->view('news/view', $data);
	}

	public function create()
	{
		$data['title'] = 'Create a news item';
		$data['action'] = 'news/create';

    	$this->form_validation->set_rules('title', 'Title', 'required');
    	$this->form_validation->set_rules('text', 'Text', 'required');

    	if ($this->form_validation->run() === FALSE)
    	{
        	$this->load->view('news/add', $data);

	    }
    	else
    	{
        	$this->mdl_news->set_news();
        	redirect('news','refresh');
    	}
	}

	public function edit($slug = NULL)
	{
		$data['news_item'] = $this->mdl_news->get_news($slug);
        $data['title'] = "Edit - ".$data['news_item']['title'];
        $data['action'] = 'news/edit/'.$data['news_item']['id'];

    	$this->form_validation->set_rules('title', 'Title', 'required');
    	$this->form_validation->set_rules('text', 'Text', 'required');

    	if ($this->form_validation->run() === FALSE)
    	{
	        if (empty($data['news_item']))
    	    {
        	    show_404();
        	}
        	$this->load->view('news/add', $data);
	    }
    	else
    	{
        	$this->mdl_news->edit_news();
        	redirect('news','refresh');
    	}

	}

	public function delete($slug = NULL)
	{
		$data['news_item'] = $this->mdl_news->get_news($slug);
		$data['title'] = "Delete News";
    	if ($this->input->post('answer') == FALSE)
    	{
	        if (empty($data['news_item']))
    	    {
        	    show_404();
        	}
			$this->load->view('news/delete', $data);
	    }
    	else
    	{
        	$this->mdl_news->delete_news();
        	redirect('news','refresh');
    	}

	}
}