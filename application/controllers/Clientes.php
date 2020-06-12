<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->logged_in()) {
        	set_msg('msgerro', 'Erro: É preciso estar logado no sistema!', 'erro');
        	redirect('login','refresh');
        }  

        $this->load->library('form_validation');
	}

	public function index()
	{
		$data['clientes'] = $this->sistema_model->GetAll('clientes');

		$this->load->template('clientes/index', $data);		
	}

	public function add()
	{
		$this->form_validation->set_rules('nome', 'Nome', 'required');

		if ($this->form_validation->run() == TRUE) {
			$dados = elements(array('tipo', 'nome', 'cpf_cnpj', 'email', 'cep', 'rg_ie', 'endereco', 'bairro', 'numero', 'complemento', 'telefone', 'cidade', 'estado', 'nome_pai', 'nome_mae', 'obs', 'ativo'), $this->input->post());
			$dados['data_nascimento'] = formataDataDB($this->input->post('data_nascimento'));
			$dados['data_cadastro'] = dataDiaDB();

			$this->sistema_model->DoInsert('clientes', $dados);

			redirect('clientes/add');
		} else {
			$this->load->template('clientes/add');
		}				
	}

	public function edit($id=NULL)
	{
		if ($id == NULL) {			
			set_msg('msgerro', 'Você precisa selecionar um cliente para edição', 'erro');
			redirect('clientes');
		}

		$query = $this->sistema_model->GetByID('clientes', array('id_cliente'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa selecionar um cliente para edição', 'erro');
			redirect('clientes');
		}

		$this->form_validation->set_rules('nome', 'Nome', 'required');
		if ($this->form_validation->run() == TRUE) {
			$id = $this->input->post('id_cliente');
			$dados = elements(array('tipo', 'nome', 'cpf_cnpj', 'email', 'cep', 'rg_ie', 'endereco', 'bairro', 'numero', 'complemento', 'telefone', 'cidade', 'estado', 'nome_pai', 'nome_mae', 'obs', 'ativo'), $this->input->post());
			$dados['data_nascimento'] = formataDataDB($this->input->post('data_nascimento'));

			$this->sistema_model->DoUpdate('clientes', $dados, array('id_cliente'=>$id));

			redirect('clientes');
		} else {
			$data['dados'] = $query;

			$this->load->template('clientes/edit', $data);
		}		
	}

	public function status($id=NULL)
	{
		if ($id == NULL) {			
			set_msg('msgerro', 'Você precisa selecionar um usuário para edição', 'erro');
			redirect('clientes');
		}

		$query = $this->sistema_model->GetByID('clientes', array('id_cliente'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa selecionar um usuário para edição', 'erro');
			redirect('clientes');
		}

		if ($query->ativo == 1) {
			$dados['ativo'] = 2;
		} else {
			$dados['ativo'] = 1;
		}

		$this->sistema_model->DoUpdate('clientes', $dados, array('id_cliente'=>$id));

		redirect('clientes');
	}

	public function del($id=NULL)
	{
		if ($id == NULL) {			
			set_msg('msgerro', 'Você precisa selecionar um usuário para edição', 'erro');
			redirect('clientes');
		}

		$query = $this->sistema_model->GetByID('clientes', array('id_cliente'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa selecionar um usuário para edição', 'erro');
			redirect('clientes');
		}

		$this->sistema_model->DoDelete('clientes', array('id_cliente'=>$query->id_cliente));
		redirect('clientes');
	}

}

/* End of file Config.php */
/* Location: ./application/controllers/Config.php */