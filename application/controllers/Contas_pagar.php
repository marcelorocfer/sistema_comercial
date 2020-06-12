<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contas_pagar extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		
		if (!$this->ion_auth->logged_in()) {
        	set_msg('msgerro', 'Erro: É preciso estar logado no sistema!', 'erro');
        	redirect('login','refresh');
        }  

        $this->load->library('form_validation');
        $this->load->model('Pagar_model', 'pagar');
	}

	public function index()
	{
		$data['contas'] = $this->pagar->GetAllContasPagar();

		$this->load->template('pagar/index', $data);	
	}

	public function add()
	{
		$this->form_validation->set_rules('vencimento', 'Vencimento', 'required');
		$this->form_validation->set_rules('valor', 'Valor', 'required');
		$this->form_validation->set_rules('id_fornecedor', 'Fornecedor', 'required');

		if ($this->form_validation->run() == TRUE) {
			$dados = elements(array('valor', 'status', 'obs', 'id_fornecedor'), $this->input->post());
			$dados['data_cadastro'] = dataDiaDB();
			$dados['vencimento'] = formataDataDB($this->input->post('vencimento'));

			$this->sistema_model->DoInsert('contas_pagar', $dados);

			redirect('contas_pagar');
		} else {
			$this->load->template('pagar/add');
		}				
	}

	public function edit($id=NULL)
	{
		if ($id == NULL) {			
			set_msg('msgerro', 'Você precisa selecionar uma conta a pagar para edição', 'erro');
			redirect('contas_pagar');
		}

		$query = $this->sistema_model->GetByID('contas_pagar', array('id_conta'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa selecionar uma conta a pagar para edição', 'erro');
			redirect('contas_pagar');
		}

		$this->form_validation->set_rules('vencimento', 'Vencimento', 'required');
		$this->form_validation->set_rules('valor', 'Valor', 'required');
		$this->form_validation->set_rules('id_fornecedor', 'Fornecedor', 'required');

		if ($this->form_validation->run() == TRUE) {
			$id_conta = $this->input->post('id_conta');

			$dados = elements(array('valor', 'status', 'obs', 'id_fornecedor'), $this->input->post());
			$dados['vencimento'] = formataDataDB($this->input->post('vencimento'));
			$dados['ultima_alteracao'] = dataDiaDB();

			$this->sistema_model->DoUpdate('contas_pagar', $dados, array('id_conta'=>$id_conta));

			redirect('contas_pagar');
		} else {
			$data['dados'] = $query;

			$this->load->template('pagar/edit', $data);
		}		
	}

	public function del($id=NULL)
	{
		if ($id == NULL) {			
			set_msg('msgerro', 'Você precisa selecionar um serviço para exclusão', 'erro');
			redirect('contas_pagar');
		}

		$query = $this->sistema_model->GetByID('contas_pagar', array('id_conta'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa selecionar um serviço para exclusão', 'erro');
			redirect('contas_pagar');
		}

		$this->sistema_model->DoDelete('contas_pagar', array('id_conta'=>$query->id_conta));
		redirect('contas_pagar');
	
	}

}

/* End of file Contas_pagar.php */
/* Location: ./application/controllers/Contas_pagar.php */