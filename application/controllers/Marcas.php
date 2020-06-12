<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marcas extends CI_Controller 
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
		$data['marcas'] = $this->sistema_model->GetAll('marcas');

		$this->load->template('marcas/index', $data);
	}

	public function add()
	{
		$this->getForm('add');
	}

	public function edit($id=NULL)
	{
		if ($id == NULL) {
			set_msg('msgerro', 'Você precisa selecionar uma marca para edição', 'erro');
			redirect('marcas');
		}

		$this->getForm('edit', $id);
	}

	public function store()
	{
		$this->form_validation->set_rules('marca', 'Nome da Marca', 'required');

		if ($this->form_validation->run() == TRUE) {
			$dados = elements(array('marca', 'ativo'), $this->input->post());

			if ($this->input->post('id')) {
				//Editar
				$id = $this->input->post('id');
				$this->sistema_model->DoUpdate('marcas', $dados, array('id_marca'=>$id));
				redirect('marcas');
			} else {
				//Adicionar
				$this->sistema_model->DoInsert('marcas', $dados);
				redirect('marcas/add');
			}
		} 
	}

	public function del($id=NULL)
	{
		if ($id == NULL) {			
			set_msg('msgerro', 'Você precisa selecionar uma marca para edição', 'erro');
			redirect('marcas');
		}

		$query = $this->sistema_model->GetByID('marcas', array('id_marca'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa selecionar uma marca para edição', 'erro');
			redirect('marcas');
		}

		$this->sistema_model->DoDelete('marcas', array('id_marca'=>$query->id_marca));
		redirect('marcas');
	}

	public function status($id=NULL)
	{
		if ($id == NULL) {			
			set_msg('msgerro', 'Você precisa selecionar uma marca para edição', 'erro');
			redirect('marcas');
		}

		$query = $this->sistema_model->GetByID('marcas', array('id_marca'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa selecionar uma marca para edição', 'erro');
			redirect('marcas');
		}

		if ($query->ativo == 1) {
			$dados['ativo'] = 2;
		} else {
			$dados['ativo'] = 1;
		}

		$this->sistema_model->DoUpdate('marcas', $dados, array('id_marca'=>$id));

		redirect('marcas');
	}

	private function getForm($form=NULL, $id=NULL)
	{
		if ($form == 'add' && $id == NULL) {
			//Carrega Form adicionar
			$data['titulo'] 	= 'Nova Marca';
			$data['marca']	= NULL;
			$data['ativo']		= NULL;
		} else {
			//Carrega Form editar
			$query = $this->sistema_model->GetByID('marcas', array('id_marca'=>$id));

			if ($query == NULL) {
				set_msg('msgerro', 'Você precisa selecionar uma marca para edição', 'erro');
				redirect('marcas');
			}

			$data['form'] ='add';
			$data['titulo'] 	= 'Editar Categoria';
			$data['marca']	= $query->marca;
			$data['ativo']		= $query->ativo;
			$data['id']			= $query->id_marca;
		}

		//Carrega as views
		$this->load->template('marcas/marcas_form', $data);
	}
}

/* End of file Marcas.php */
/* Location: ./application/controllers/Marcas.php */