<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contas_receber extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		
		if (!$this->ion_auth->logged_in()) {
        	set_msg('msgerro', 'Erro: É preciso estar logado no sistema!', 'erro');
        	redirect('login','refresh');
        }  

        $this->load->library('form_validation');
        $this->load->model('Receber_model', 'receber');
	}

	public function index()
	{
		$data['contas'] = $this->receber->GetAllContasReceber();

		$this->load->template('receber/index', $data);	
	}

	public function add()
	{
		$this->form_validation->set_rules('vencimento', 'Vencimento', 'required');
		$this->form_validation->set_rules('valor', 'Valor', 'required');
		$this->form_validation->set_rules('id_cliente', 'Cliente', 'required');

		if ($this->form_validation->run() == TRUE) {
			$dados = elements(array('valor', 'status', 'obs', 'id_cliente'), $this->input->post());
			$dados['data_cadastro'] = dataDiaDB();
			$dados['vencimento'] = formataDataDB($this->input->post('vencimento'));

			$this->sistema_model->DoInsert('contas_receber', $dados);

			redirect('contas_receber/add');
		} else {
			$this->load->template('receber/add');
		}				
	}

	public function edit($id=NULL)
	{
		if ($id == NULL) {			
			set_msg('msgerro', 'Você precisa selecionar uma conta a receber para edição', 'erro');
			redirect('contas_receber');
		}

		$query = $this->sistema_model->GetByID('contas_receber', array('id_receber'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa selecionar uma conta a receber para edição', 'erro');
			redirect('contas_receber');
		}

		$this->form_validation->set_rules('vencimento', 'Vencimento', 'required');
		$this->form_validation->set_rules('valor', 'Valor', 'required');
		$this->form_validation->set_rules('id_cliente', 'Cliente', 'required');

		if ($this->form_validation->run() == TRUE) {
			$id = $this->input->post('id_receber');
			$dados = elements(array('valor', 'status', 'obs', 'id_cliente'), $this->input->post());
			$dados['vencimento'] = formataDataDB($this->input->post('vencimento'));
			$dados['ultima_alteracao'] = dataDiaDB();

			$this->sistema_model->DoUpdate('contas_receber', $dados, array('id_receber'=>$id));

			redirect('contas_receber');
		} else {
			$data['dados'] = $query;

			$this->load->template('receber/edit', $data);
		}		
	}

	public function del($id=NULL)
	{
		if ($id == NULL) {			
			set_msg('msgerro', 'Você precisa selecionar um serviço para exclusão', 'erro');
			redirect('contas_receber');
		}

		$query = $this->sistema_model->GetByID('contas_receber', array('id_receber'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa selecionar um serviço para exclusão', 'erro');
			redirect('contas_receber');
		}

		$this->sistema_model->DoDelete('contas_receber', array('id_receber'=>$query->id_receber));
		redirect('contas_receber');
	}

}

/* End of file Contas_receber.php */
/* Location: ./application/controllers/Contas_receber.php */