<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller 
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
		$data['produtos'] = $this->sistema_model->GetAll('produtos');

		$this->load->template('produtos/index', $data);		
	}

	public function add()
	{
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('preco_venda', 'Preço de Venda', 'required');

		if ($this->form_validation->run() == TRUE) {
			$dados = elements(array(

					'nome',
					'unidade',
					'codigo_barras',
					'ncm',
					'preco_custo',
					'preco_venda',
					'estoque_minimo',
					'quantidade_estoque',
					'ativo',
					'id_categoria',
					'id_marca',
					'id_fornecedor'

				), $this->input->post());
			
			$dados['data_cadastro'] = dataDiaDB();

			$this->sistema_model->DoInsert('produtos', $dados);

			redirect('produtos/add');
		} else {
			$data['categorias'] = $this->sistema_model->GetAll('categorias', array('ativo' => 1));
			$data['marcas'] = $this->sistema_model->GetAll('marcas', array('ativo' => 1));
			$data['fornecedores'] = $this->sistema_model->GetAll('fornecedores', array('ativo' => 1));

			$this->load->template('produtos/add', $data);
		}				
	}

	public function edit($id=NULL)
	{
		if ($id == NULL) {			
			set_msg('msgerro', 'Você precisa selecionar um produto para edição', 'erro');
			redirect('produtos');
		}

		$query = $this->sistema_model->GetByID('produtos', array('id_produto'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa selecionar um produto para edição', 'erro');
			redirect('produtos');
		}

		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('preco_venda', 'Preço de Venda', 'required');

		if ($this->form_validation->run() == TRUE) {
			$dados = elements(array(

				'nome',
				'unidade',
				'codigo_barras',
				'ncm',
				'preco_custo',
				'preco_venda',
				'estoque_minimo',
				'quantidade_estoque',
				'ativo',
				'id_categoria',
				'id_marca',
				'id_fornecedor'

			), $this->input->post());
			
			$dados['ultima_alteracao'] = dataDiaDB();
			$id = $this->input->post('id');

			$this->sistema_model->DoUpdate('produtos', $dados, array('id_produto'=>$id));

			redirect('produtos');
		} else {
			$data['dados'] = $query;

			$data['categorias'] = $this->sistema_model->GetAll('categorias', array('ativo' => 1));
			$data['marcas'] = $this->sistema_model->GetAll('marcas', array('ativo' => 1));
			$data['fornecedores'] = $this->sistema_model->GetAll('fornecedores', array('ativo' => 1));

			$this->load->template('produtos/edit', $data);
		}		
	}
	
	public function status($id=NULL)
	{
		if ($id == NULL) {			
			set_msg('msgerro', 'Você precisa selecionar um usuário para edição', 'erro');
			redirect('produtos');
		}

		$query = $this->sistema_model->GetByID('produtos', array('id_produto'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa selecionar um usuário para edição', 'erro');
			redirect('produtos');
		}

		if ($query->ativo == 1) {
			$dados['ativo'] = 2;
		} else {
			$dados['ativo'] = 1;
		}

		$this->sistema_model->DoUpdate('produtos', $dados, array('id_produto'=>$id));

		redirect('produtos');
	}

	public function del($id=NULL)
	{
		if ($id == NULL) {			
			set_msg('msgerro', 'Você precisa selecionar um usuário para edição', 'erro');
			redirect('produtos');
		}

		$query = $this->sistema_model->GetByID('produtos', array('id_produto'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa selecionar um usuário para edição', 'erro');
			redirect('produtos');
		}

		$this->sistema_model->DoDelete('produtos', array('id_produto'=>$query->id_produto));
		redirect('produtos');
	}

}

/* End of file Config.php */
/* Location: ./application/controllers/Config.php */