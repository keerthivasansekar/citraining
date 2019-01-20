<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->check_login())
		{
			$data['name'] = $this->session->userdata('name');
			$this->load->view('dashboard', $data);
		}
		else
		{
			redirect('login');
		}
		
	}

}