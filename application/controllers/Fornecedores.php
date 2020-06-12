<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Fornecedores extends CI_Controller 
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
		$data['fornecedores'] = $this->sistema_model->GetAll('fornecedores');

		$this->load->template('fornecedores/index', $data);		
	}

	public function add()
	{
		$this->form_validation->set_rules('razao', 'Razão Social', 'required');

		if ($this->form_validation->run() == TRUE) {
			$dados = elements(array(

				'razao',
				'nome_fantasia',
				'cnpj',
				'ie',
				'telefone',
				'celular',
				'cep',
				'endereco',
				'numero',
				'bairro',
				'complemento',
				'cidade',
				'estado',
				'email',
				'contato',
				'obs',
				'ativo'

			), $this->input->post());
			
			$this->sistema_model->DoInsert('fornecedores', $dados);

			redirect('fornecedores/add');
		} else {
			$this->load->template('fornecedores/add');
		}				
	}

	public function edit($id=NULL)
	{
		if ($id == NULL) {			
			set_msg('msgerro', 'Você precisa selecionar um fornecedor para edição', 'erro');
			redirect('clientes');
		}

		$query = $this->sistema_model->GetByID('fornecedores', array('id_fornecedor'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa selecionar um fornecedor para edição', 'erro');
			redirect('fornecedores');
		}

		$this->form_validation->set_rules('razao', 'Razão Social', 'required');

		if ($this->form_validation->run() == TRUE) {
			$dados = elements(array(

				'razao',
				'nome_fantasia',
				'cnpj',
				'ie',
				'telefone',
				'celular',
				'cep',
				'endereco',
				'numero',
				'bairro',
				'complemento',
				'cidade',
				'estado',
				'email',
				'contato',
				'obs',
				'ativo'

			), $this->input->post());

			$id = $this->input->post('id');

			$this->sistema_model->DoUpdate('fornecedores', $dados, array('id_fornecedor'=>$id));

			redirect('fornecedores');
		} else {
			$data['dados'] = $query;

			$this->load->template('fornecedores/edit', $data);
		}		
	}

	public function status($id=NULL)
	{
		if ($id == NULL) {			
			set_msg('msgerro', 'Você precisa selecionar um fornecedor para edição', 'erro');
			redirect('fornecedores');
		}

		$query = $this->sistema_model->GetByID('fornecedores', array('id_fornecedor'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa selecionar um fornecedor para edição', 'erro');
			redirect('fornecedores');
		}

		if ($query->ativo == 1) {
			$dados['ativo'] = 2;
		} else {
			$dados['ativo'] = 1;
		}

		$this->sistema_model->DoUpdate('fornecedores', $dados, array('id_fornecedor'=>$id));

		redirect('fornecedores');
	}

	public function del($id=NULL)
	{
		if ($id == NULL) {			
			set_msg('msgerro', 'Você precisa selecionar um fornecedor para edição', 'erro');
			redirect('fornecedores');
		}

		$query = $this->sistema_model->GetByID('fornecedores', array('id_fornecedor'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa selecionar um fornecedor para edição', 'erro');
			redirect('fornecedores');
		}

		$this->sistema_model->DoDelete('fornecedores', array('id_fornecedor'=>$query->id_fornecedor));
		redirect('fornecedores');
	}

}

/* End of file Config.php */
/* Location: ./application/controllers/Config.php */