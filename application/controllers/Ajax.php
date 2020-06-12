<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			set_msg('msgerro', 'Erro: Você precisa estar logado no sistema!', 'erro');
			redirect('login','refresh');
		}

		$this->load->model('Principal_model', 'principal');
	}

	public function index()
	{
		redirect('/','refresh');
	}

	public function clientes()
	{
		$busca = $this->input->post('term');
		$data['response'] = 'false';

		$query = $this->sistema_model->autocompleteCliente($busca);

		if ($query) {
			$data['response'] = 'true';
			$data['message'] = array();

			foreach ($query as $row) {
				$data['message'][] = array(
					'id' 	=> $row->id_cliente,
					'value' => $row->nome,
				);
			}

			echo json_encode($data);
		} else {
			echo json_encode($data);
		}
	}

	public function produtos()
	{
		$busca = $this->input->post('term');
		$data['response'] = 'false';

		$query = $this->sistema_model->autocompleteProduto($busca);

		if ($query) {
			$data['response'] = 'true';
			$data['message'] = array();

			foreach ($query as $row) {
				$data['message'][] = array(
					'id_produto' => $row->id_produto,
					'venda' 	 => $row->preco_venda,
					'value' 	 => $row->nome,
				);
			}

			echo json_encode($data);
		} else {
			echo json_encode($data);
		}
	}

	public function servicos()
	{		
		$busca = $this->input->post('term');
		$data['response'] = 'false';

		$query = $this->sistema_model->autocompleteServico($busca);

		if ($query) {
			
			$data['response'] = 'true';
			$data['message'] = array();

			foreach ($query as $row) {				
				$data['message'][] = array(
					'id_servico' => $row->id_servico,
					'valor' 	 => $row->valor_servico,
					'value' 	 => $row->nome_servico,
				);
			}

			echo json_encode($data);
		} else {
			echo json_encode($data);
		}
	}

	public function grafico()
	{
		$total_vendas 	= $this->principal->getTotalVendas();
		$total_servicos = $this->principal->getTotalServicos();
		$total_receber 	= $this->principal->getTotalReceber();
		$total_pagar 	= $this->principal->getTotalPagar();

		$data['titulo'] = array('Total de Vendas', 'Total de Serviços', 'Total a Receber', 'Total a Pagar');
		$data['valores'] = array($total_vendas, $total_servicos, $total_receber, $total_pagar);

		echo json_encode($data);
	}
}

/* End of file Ajax.php */
/* Location: ./application/controllers/Ajax.php */