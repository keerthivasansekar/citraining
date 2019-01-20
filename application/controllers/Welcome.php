<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function items()
	{
		$data['items'] = [
			['1','Laptops'],
			['2','Cameras'],
			['3','Mobile Phones'],
			['4','Tablets']
		];

		$this->load->view('items', $data);
	}

	public function details()
	{
		$data['detail'] = [
			['1','Apple'],
			['2','Microsoft'],
			['3','Acer'],
			['4','MSI']
		];

		$this->load->view('details', $data);
	}
}
