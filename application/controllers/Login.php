<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();	

		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('login_email', 'E-mail', 'required');
		$this->form_validation->set_rules('login_senha', 'Senha', 'required');

		if ($this->form_validation->run() == TRUE) {
			$identity = $this->input->post('login_email');
			$password = $this->input->post('login_senha');

			$remember = TRUE;

			if ($this->ion_auth->login($identity, $password, $remember) || $this->ion_auth->logged_in()) {
				redirect('principal','refresh');
			} else {
				set_msg('msgerro', 'Os dados de acesso estão incorretos.', 'erro');
				redirect('login','refresh');
			}
		} else {
			$this->load->template('login/index');
		}		
	}

	public function logout()
	{
		$logout = $this->ion_auth->logout();
		redirect('login','refresh');
	}
}
