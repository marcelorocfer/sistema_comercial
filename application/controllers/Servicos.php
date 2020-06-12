<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicos extends CI_Controller 
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
		$data['servicos'] = $this->sistema_model->GetAll('servicos');

		$this->load->template('servicos/index', $data);	
	}

	public function add()
	{
		$this->form_validation->set_rules('nome_servico', 'Nome do Serviço', 'required');
		$this->form_validation->set_rules('valor_servico', 'Valor do Serviço', 'required');

		if ($this->form_validation->run() == TRUE) {
			$dados = elements(array('nome_servico', 'valor_servico', 'ativo'), $this->input->post());
			$dados['data_cadastro'] = dataDiaDB();

			$this->sistema_model->DoInsert('servicos', $dados);

			redirect('servicos');
		} else {
			$this->load->template('servicos/add');
		}				
	}

	public function edit($id=NULL)
	{
		if ($id == NULL) {			
			set_msg('msgerro', 'Você precisa selecionar um serviço para edição', 'erro');
			redirect('servicos');
		}

		$query = $this->sistema_model->GetByID('servicos', array('id_servico'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa selecionar um serviço para edição', 'erro');
			redirect('servicos');
		}

		$this->form_validation->set_rules('nome_servico', 'Nome do Serviço', 'required');
		$this->form_validation->set_rules('valor_servico', 'Valor do Serviço', 'required');

		if ($this->form_validation->run() == TRUE) {
			$id = $this->input->post('id_servico');
			
			$dados = elements(array('nome_servico', 'valor_servico', 'ativo'), $this->input->post());
			$dados['ultima_alteracao'] = dataDiaDB();

			$this->sistema_model->DoUpdate('servicos', $dados, array('id_servico'=>$id));

			redirect('servicos');
		} else {
			$data['dados'] = $query;

			$this->load->template('servicos/edit', $data);
		}		
	}

	public function status($id=NULL)
	{
		if ($id == NULL) {			
			set_msg('msgerro', 'Você precisa selecionar um serviço para edição', 'erro');
			redirect('servicos');
		}

		$query = $this->sistema_model->GetByID('servicos', array('id_servico'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa selecionar um serviço para edição', 'erro');
			redirect('servicos');
		}

		if ($query->ativo == 1) {
			$dados['ativo'] = 2;
		} else {
			$dados['ativo'] = 1;
		}

		$this->sistema_model->DoUpdate('servicos', $dados, array('id_servico'=>$id));

		redirect('servicos');
	}

	public function del($id=NULL)
	{
		if ($id == NULL) {			
			set_msg('msgerro', 'Você precisa selecionar um serviço para edição', 'erro');
			redirect('servicos');
		}

		$query = $this->sistema_model->GetByID('servicos', array('id_servico'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa selecionar um serviço para edição', 'erro');
			redirect('servicos');
		}

		$this->sistema_model->DoDelete('servicos', array('id_servico'=>$query->id_servico));
		redirect('servicos');
	}

}

/* End of file Servicos.php */
/* Location: ./application/controllers/Servicos.php */