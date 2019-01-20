<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_users');
		$this->load->library('email');
	}

	public function index()
	{
		if($this->check_login())
		{
			redirect('login/securepage');
		}
		else
		{

			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('pword', 'Password', 'required|min_length[5]|max_length[8]');

			if ($this->form_validation->run() == FALSE) 
			{
				$this->load->view('login/index');
			}
			else
			{
				$user = $this->mdl_users->fetch_one('email', $this->input->post('email', TRUE));
				$login_input = [ 'email' => $this->input->post('email', TRUE),
					'password' => $this->input->post('pword', TRUE)
				];
				if($user['id'] != NULL && $this->do_login($login_input, $user))
				{
					redirect('login/securepage','refresh');
				}
				else
				{
					$err_msg = "The email id or the password you entered is incorrect please try again.";
					$this->session->set_flashdata('err_msg', $err_msg);
					redirect('login','refresh');
				}
			}
		}		
	}

	public function forgot_password()
	{

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('login/fgtpword');	
		} 
		else
		{
			$email = $this->input->post('email');
			$user_detail = $this->mdl_users->fetch_one('email', $email);

			if($user_detail != NULL)
			{
				$pass = rand(1000,9999);
				$hashed_pword = password_hash($pass, PASSWORD_DEFAULT);
				$new_detail = ['password' => $hashed_pword ];
				$this->mdl_users->edit($user_detail['id'], $new_detail);

				$this->email->from('s.keerthivasan7@gmail.com', 'Keerthivasan Sekar');
				$this->email->to($email);

				$this->email->subject('New Password');
				$this->email->message('This is a new password please do change it for your account safety'.$pass);

				$this->email->send();
				redirect('login');
			}
			else
			{
				$err_msg = "Email you have entered doesnt seems to be correct.";
				$this->session->set_flashdata('err_msg', $err_msg);
				redirect('login/forgot_password');
			}
		}
	}

	public function securepage()
	{
		if($this->check_login())
		{
			$data['users'] = $this->mdl_users->fetch_all();
			$data['loggedin_user'] = $this->session->userdata('name');
			$this->load->view('login/sec_page', $data);
		}
		else
		{
			redirect('login');
		}
	}

	public function register()
	{
		if($this->check_login())
		{
		
			$data['title'] = "New User";
			$data['page'] = "Registration";
			$data['url'] = "login/register";

			$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('mobile', 'Mobile', 'required|min_length[10]|max_length[13]|is_unique[users.mobile]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('pword', 'Password', 'required|min_length[5]|max_length[8]');
			$this->form_validation->set_rules('cfpword', 'Confirm Password', 'required|min_length[5]|max_length[8]|matches[pword]');

			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('login/register', $data);
			}
			else
			{
				$user = [
					'fullname' => $this->input->post('name'),
					'mobile' => $this->input->post('mobile'),
					'email' => $this->input->post('email'),
					'password' => password_hash($this->input->post('pword'), PASSWORD_DEFAULT),
				];
				if ($this->mdl_users->create($user))
				{
					redirect('login/securepage');
				} 
			}
		}
		else
		{
			redirect('login');
		}
	}

	public function edit($id = NULL)
	{
		if($this->check_login())
		{
			$data['title'] = "Edit User";
			$data['page'] = "Edit Details";
			$data['url'] = "login/edit/$id";

			$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('mobile', 'Mobile', 'required|min_length[10]|max_length[13]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('pword', 'Password', 'required|min_length[5]|max_length[8]');
			$this->form_validation->set_rules('cfpword', 'Confirm Password', 'required|min_length[5]|max_length[8]|matches[pword]');

			if ($this->form_validation->run() == FALSE)
			{
				$data['user'] = $this->mdl_users->fetch_one('id', $id);
				$this->load->view('login/register', $data);
			}
			else
			{
				$user = [
					'fullname' => $this->input->post('name'),
					'mobile' => $this->input->post('mobile'),
					'email' => $this->input->post('email'),
					'password' => password_hash($this->input->post('pword'), PASSWORD_DEFAULT),
				];
				$id = $this->uri->segment(3);
				if ($this->mdl_users->edit($id, $user))
				{
					redirect('login/securepage');
				}			
			}
		}
		else
		{
			redirect('login');
		}
	}

	public function delete($id = NULL)
	{
		if($this->check_login())
		{
			$this->mdl_users->remove($id);
			redirect('login/securepage','refresh');			
		}
		else
		{
			redirect('login');
		}
	}

	public function logout()
	{
		$this->do_logout();
		if($this->session->userdata('user_data') == NULL)
		{
			redirect('login','refresh');			
		}
		else
		{
			redirect('login/securepage');
		}
	}

	private function do_login($login_input, $user)
	{
		if ($login_input['email'] == $user['email'] && password_verify($login_input['password'], $user['password']))
		{
			$user_data=[ 'name' => $user['fullname'],
			'email' => $user['email'],
			'is_loggedin' => TRUE
			];
			$this->session->set_userdata($user_data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	private function do_logout()
	{
		$this->session->unset_userdata('is_loggedin');
	}

	private function check_login()
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