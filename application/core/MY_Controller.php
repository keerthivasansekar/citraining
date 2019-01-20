<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	protected function check_login()
	{
		$status = $this->session->userdata('is_loggedin');

		if($status == TRUE)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}		
	}

}