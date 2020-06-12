<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendedores extends CI_Controller 
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
		$data['vendedores'] = $this->sistema_model->GetAll('vendedores');

		$this->load->template('vendedores/index', $data);	
	}

	public function add()
	{
		$this->form_validation->set_rules('nome_vendedor', 'Nome', 'required');

		if ($this->form_validation->run() == TRUE) {
			$dados = elements(array('nome_vendedor', 'cpf', 'email', 'cep', 'endereco', 'bairro', 'numero', 'complemento', 'telefone', 'celular', 'cidade', 'estado', 'obs', 'ativo'), $this->input->post());
			$dados['data_cadastro'] = dataDiaDB();

			$this->sistema_model->DoInsert('vendedores', $dados);

			redirect('vendedores/index');
		} else {
			$this->load->template('vendedores/add');
		}				
	}

	public function edit($id=NULL)
	{
		if ($id == NULL) {			
			set_msg('msgerro', 'Você precisa selecionar um vendedor para edição', 'erro');
			redirect('vendedores');
		}

		$query = $this->sistema_model->GetByID('vendedores', array('id_vendedor'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa selecionar um vendedor para edição', 'erro');
			redirect('vendedores');
		}

		$this->form_validation->set_rules('nome_vendedor', 'Nome', 'required');
		if ($this->form_validation->run() == TRUE) {
			$id = $this->input->post('id_vendedor');
			$dados = elements(array('nome_vendedor', 'cpf', 'email', 'cep', 'endereco', 'bairro', 'numero', 'complemento', 'telefone', 'celular', 'cidade', 'estado', 'obs', 'ativo'), $this->input->post());

			$this->sistema_model->DoUpdate('vendedores', $dados, array('id_vendedor'=>$id));

			redirect('vendedores');
		} else {
			$data['dados'] = $query;

			$this->load->template('vendedores/edit', $data);
		}		
	}

	public function status($id=NULL)
	{
		if ($id == NULL) {			
			set_msg('msgerro', 'Você precisa selecionar um vendedor para edição', 'erro');
			redirect('vendedores');
		}

		$query = $this->sistema_model->GetByID('vendedores', array('id_vendedor'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa selecionar um vendedor para edição', 'erro');
			redirect('vendedores');
		}

		if ($query->ativo == 1) {
			$dados['ativo'] = 2;
		} else {
			$dados['ativo'] = 1;
		}

		$this->sistema_model->DoUpdate('vendedores', $dados, array('id_vendedor'=>$id));

		redirect('vendedores');
	}

	public function del($id=NULL)
	{
		if ($id == NULL) {			
			set_msg('msgerro', 'Você precisa selecionar um vendedor para edição', 'erro');
			redirect('vendedores');
		}

		$query = $this->sistema_model->GetByID('vendedores', array('id_vendedor'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa selecionar um vendedor para edição', 'erro');
			redirect('vendedores');
		}

		$this->sistema_model->DoDelete('vendedores', array('id_vendedor'=>$query->id_vendedor));
		redirect('vendedores');
	}

}

/* End of file Config.php */
/* Location: ./application/controllers/Config.php */