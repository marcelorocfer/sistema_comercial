<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller 
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
		$data['categorias'] = $this->sistema_model->GetAll('categorias');

		$this->load->template('categorias/index', $data);		
	}

	public function add()
	{
		$this->getForm('add');
	}

	public function edit($id=NULL)
	{
		if ($id == NULL) {
			set_msg('msgerro', 'Você precisa selecionar uma categoria para edição', 'erro');
			redirect('categorias');
		}

		$this->getForm('edit', $id);
	}

	public function store()
	{
		$this->form_validation->set_rules('categoria', 'Nome da Categoria', 'required');

		if ($this->form_validation->run() == TRUE) {
			$dados = elements(array('categoria', 'ativo'), $this->input->post());

			if ($this->input->post('id')) {
				//Editar
				$id = $this->input->post('id');
				$this->sistema_model->DoUpdate('categorias', $dados, array('id_categoria'=>$id));
				redirect('categorias');
			} else {
				//Adicionar
				$this->sistema_model->DoInsert('categorias', $dados);
				redirect('categorias/add');
			}
		} 
	}

	public function del($id=NULL)
	{
		if ($id == NULL) {			
			set_msg('msgerro', 'Você precisa selecionar uma categoria para edição', 'erro');
			redirect('categorias');
		}

		$query = $this->sistema_model->GetByID('categorias', array('id_categoria'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa selecionar uma categoria para edição', 'erro');
			redirect('categorias');
		}

		$this->sistema_model->DoDelete('categorias', array('id_categoria'=>$query->id_categoria));
		redirect('categorias');
	}

	public function status($id=NULL)
	{
		if ($id == NULL) {			
			set_msg('msgerro', 'Você precisa selecionar uma categoria para edição', 'erro');
			redirect('categorias');
		}

		$query = $this->sistema_model->GetByID('categorias', array('id_categoria'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa selecionar uma categoria para edição', 'erro');
			redirect('categorias');
		}

		if ($query->ativo == 1) {
			$dados['ativo'] = 2;
		} else {
			$dados['ativo'] = 1;
		}

		$this->sistema_model->DoUpdate('categorias', $dados, array('id_categoria'=>$id));

		redirect('categorias');
	}

	private function getForm($form=NULL, $id=NULL)
	{
		if ($form == 'add' && $id == NULL) {
			//Carrega Form adicionar
			$data['titulo'] 	= 'Nova Categoria';
			$data['categoria']	= NULL;
			$data['ativo']		= NULL;
		} else {
			//Carrega Form editar
			$query = $this->sistema_model->GetByID('categorias', array('id_categoria'=>$id));

			if ($query == NULL) {
				set_msg('msgerro', 'Você precisa selecionar uma categoria para edição', 'erro');
				redirect('categorias');
			}

			$data['form'] ='add';
			$data['titulo'] 	= 'Editar Categoria';
			$data['categoria']	= $query->categoria;
			$data['ativo']		= $query->ativo;
			$data['id']			= $query->id_categoria;
		}

		//Carrega as views
		$this->load->template('categorias/categorias_form', $data);
	}
}

/* End of file Categorias.php */
/* Location: ./application/controllers/Categorias.php */
