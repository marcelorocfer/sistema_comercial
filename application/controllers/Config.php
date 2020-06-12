<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->logged_in()) {
        	set_msg('msgerro', 'Erro: É preciso estar logado no sistema!', 'erro');
        	redirect('login','refresh');
        }  

        if (!$this->ion_auth->in_group(1)) {
			set_msg('msgerro', 'Erro: Você não tem permissão de acesso à essa página!', 'erro');
			redirect('principal');
		} 
		
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('razao', 'Razão', 'required');

		if ($this->form_validation->run()) {
			
			$id = $this->input->post('id_config');

			$dados = elements(
				array
				(
					'razao',
					'nome_fantasia',
					'cnpj',
					'ie',
					'im',
					'cep',
					'endereco',
					'numero',
					'bairro',
					'complemento',
					'cidade',
					'estado',
					'telefone',
					'email',
					'site',
					'logotipo',
					'txt_ordem_servico',
					'txt_venda'
				),

				$this->input->post()
			);

			$dados['ultima_alteracao'] = dataDiaDB();

			$this->sistema_model->DoUpdate('configuracoes', $dados, array('id_config' => $id));
			redirect('config');

			/*
				echo "<pre>";
				print_r ($dados);
				echo "</pre>";
			*/
		} else {
			$data['dados'] = $this->sistema_model->GetByID('configuracoes', array('id_config' => 1));
			$this->load->template('config/index', $data);
		}			
	}

}

/* End of file Config.php */
/* Location: ./application/controllers/Config.php */