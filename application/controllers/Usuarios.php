<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->logged_in()) {
        	set_msg('msgerro', 'Erro: É preciso estar logado no sistema!', 'erro');
        	redirect('login', 'refresh');
        }  

        if (!$this->ion_auth->in_group(1)) {
			set_msg('msgerro', 'Erro: Você não tem permissão de acesso à essa página!', 'erro');
			redirect('principal');
		} 

		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['users'] = $this->ion_auth->users()->result();

		$this->load->template('usuarios/index', $data);	
	}

	public function add()
	{
		$this->form_validation->set_rules('nome_usuario', 'Nome', 'required|min_length[3]|max_length[20]');
		$this->form_validation->set_rules('email_usuario', 'E-mail', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('senha_usuario', 'Senha', 'required|min_length[3]|max_length[32]');
		$this->form_validation->set_rules('senha_usuario2', 'Conferir Senha', 'required|matches[senha_usuario]', array('matches' => 'A senha de confirmação não confere'));

		if ($this->form_validation->run() == TRUE) {
			$username = $this->input->post('nome_usuario');
			$password = $this->input->post('senha_usuario');
			$email = $this->input->post('email_usuario');
			$tipo = $this->input->post('tipo_usuario');

			$additional_data = array('username' => $username);
			$group = array($tipo);
			$this->ion_auth->register($username, $password, $email, $additional_data, $group);
			set_msg('msgsuccess', 'Cadastro realizado com sucesso!', 'sucesso');
			redirect('usuarios','refresh');
		} else {
			$this->load->template('usuarios/add');	
		}
	}

	public function edit($id = NULL)
	{
		if ($id == NULL) {
			set_msg('msgerro', 'Você precisa selecionar um usuário para alterar!', 'erro');
			redirect('usuarios','refresh');
		}

		$user = $this->ion_auth->user($id)->row();

		if ($user == NULL) {
			set_msg('msgerro', 'Você precisa selecionar um usuário para alterar!', 'erro');
			redirect('usuarios','refresh');
		}

		$this->form_validation->set_rules('nome_usuario', 'Nome', 'required|min_length[3]|max_length[20]');
		$this->form_validation->set_rules('email_usuario', 'E-mail', 'required|valid_email');

		if ($this->input->post('senha_usuario')) {
			$this->form_validation->set_rules('senha_usuario', 'Senha', 'min_length[3]|max_length[32]');
			$this->form_validation->set_rules('senha_usuario2', 'Conferir Senha', 'matches[senha_usuario]', array('matches' => 'A senha de confirmação não confere'));
		}
		
		if ($this->form_validation->run() == TRUE) {
			$id = $this->input->post('id_usuario');
			$tipo = $this->input->post('tipo_usuario');
			$dados['username'] = $this->input->post('nome_usuario');
			$dados['email'] = $this->input->post('email_usuario');

			if ($this->input->post('senha_usuario')) {
				$dados['password'] = $this->input->post('senha_usuario');
			}
			
			$this->ion_auth->update($id, $dados);

			if ($tipo) {
				$this->ion_auth->remove_from_group(NULL, $id);
				$this->ion_auth->add_to_group($tipo, $id);
			}			

			set_msg('msgsuccess', 'Os dados do usuário '.$this->input->post('nome_usuario').' foram atualizados com sucesso!', 'sucesso');
			redirect('Usuarios','refresh');
		} else {
			$group = $this->ion_auth->get_users_groups($user->id)->row();

			$data['group'] = $group->id;
			$data['user'] = $user;

			$this->load->template('usuarios/edit', $data);
		}			
	}

	public function del($id=NULL)
	{
		if ($id == NULL or $id == 1 or $this->session->user_id == $id) {
			set_msg('msgerro', 'Você precisa selecionar um usuário para excluir!', 'erro');
			redirect('usuarios','refresh');
		}

		$user = $this->ion_auth->user($id)->row();

		if ($user == NULL) {
			set_msg('msgerro', 'Você precisa selecionar um usuário para excluir!', 'erro');
			redirect('usuarios','refresh');
		}

		if ($this->ion_auth->delete_user($user->id)) {
			set_msg('msgsuccess', 'Usuário excluído com sucesso!', 'sucesso');
			redirect('usuarios','refresh');
		} else {
			set_msg('msgerro', 'Ocorreu algum erro, tente novamente!', 'erro');
			redirect('usuarios','refresh');	
		}
	}

	public function active($id=NULL)
	{
		if ($this->session->user_id == 1) {
			if ($id == NULL) {
				set_msg('msgerro', 'Você precisa selecionar um usuário para alterar!', 'erro');
				redirect('usuarios','refresh');
			}

			$user = $this->ion_auth->user($id)->row();

			if ($user == NULL) {
				set_msg('msgerro', 'Você precisa selecionar um usuário para alterar!', 'erro');
				redirect('usuarios','refresh');
			}

			if ($user->active == 1) {
				$dados['active'] = 0;
			} else {
				$dados['active'] = 1;	
			}

			if ($this->ion_auth->update($id, $dados))  {
				set_msg('msgsuccess', 'Status do usuário alterado com sucesso!', 'sucesso');
				redirect('usuarios','refresh');
			} else {
				set_msg('msgerro', 'Houve um erro ao alterar o status do usuário!', 'erro');
				redirect('usuarios','refresh');
			}
		} else {
			set_msg('msgerro', 'Você não tem permissão para alterar o status!', 'erro');
			redirect('usuarios','refresh');	
		}
	}
}
