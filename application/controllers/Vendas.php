<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendas extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		
		if (!$this->ion_auth->logged_in()) {
        	set_msg('msgerro', 'Erro: É preciso estar logado no sistema!', 'erro');
        	redirect('login','refresh');
        }  

        $this->load->library('form_validation');
        $this->load->model('Vendas_model', 'vendas');
	}

	public function index()
	{
		$data['vendas'] = $this->vendas->GetAllVendas();

		$this->load->template('vendas/index', $data);	
	}

	public function add()
	{
		$this->form_validation->set_rules('id_cliente', 'Cliente', 'required');
		$this->form_validation->set_rules('data_emissao', 'Data de Emissão', 'required');

		if ($this->form_validation->run() == TRUE) {
			$dados = elements(array(
				'id_cliente', 
				'tipo', 
				'valor_entrada', 
				'valor_desconto',
				'id_pagamento',
				'id_vendedor'

			), $this->input->post());

			$dados['valor_total'] = $this->input->post('total_pagar');
			$dados['data_emissao'] = formataDataDB($this->input->post('data_emissao'));

			$this->sistema_model->DoInsert('vendas', $dados, TRUE);
			$id_venda = $this->session->userdata('last_id');

			$id_produto 	= $this->input->post('id_produto');
			$quantidade 	= $this->input->post('qtde');
			$valor_total 	= $this->input->post('valor_total');
			$valor_unitario = $this->input->post('valor_unit');

			$q_produto = count($id_produto);

			for ($i=0; $i < $q_produto; $i++) { 
				$produto['id_produto'] 	   = $id_produto[$i];
				$produto['quantidade'] 	   = $quantidade[$i];
				$produto['valor_unitario'] = $valor_unitario[$i];
				$produto['valor_total']    = $valor_total[$i];
				$produto['id_venda'] 	   = $id_venda;

				$this->sistema_model->DoInsert('venda_produtos', $produto);
			}

			redirect('vendas/imprimir/'.$id_venda,'refresh');
		} else {
			$data['vendedores'] = $this->sistema_model->GetAll('vendedores');
            $data['formas']     = $this->vendas->GetFormaPagamentos();
            $data['js']         = 'js/js_tela_venda.js';

			$this->load->template('vendas/add', $data);
		}				
	}

	public function edit($id=NULL)
	{
		$query = $this->vendas->getVendasById($id);

		if ($id && $query) {

			$this->form_validation->set_rules('id_cliente', 'Cliente', 'required');
			$this->form_validation->set_rules('data_emissao', 'Data de Emissão', 'required');

			if ($this->form_validation->run() == TRUE) {
				$dados = elements(array(
					'id_cliente', 
					'tipo', 
					'valor_entrada', 
					'valor_desconto',
					'id_pagamento',
					'id_vendedor'

				), $this->input->post());

				$dados['valor_total'] 	   = $this->input->post('total_pagar');
				$dados['data_emissao'] 	   = formataDataDB($this->input->post('data_emissao'));
				$dados['ultima_alteracao'] = dataDiaDB();

				$this->sistema_model->DoUpdate('vendas', $dados, array('id_venda' => $this->input->post('id_venda')));

				$this->vendas->apagarProdutos($query->id_venda);

				$id_produto 	= $this->input->post('id_produto');
				$quantidade 	= $this->input->post('qtde');
				$valor_total 	= $this->input->post('valor_total');
				$valor_unitario = $this->input->post('valor_unit');

				$q_produto = count($id_produto);

				for ($i=0; $i < $q_produto; $i++) { 
					$produto['id_produto'] 	   = $id_produto[$i];
					$produto['quantidade'] 	   = $quantidade[$i];
					$produto['valor_unitario'] = $valor_unitario[$i];
					$produto['valor_total']    = $valor_total[$i];
					$produto['id_venda'] 	   = $query->id_venda;

					$this->sistema_model->DoInsert('venda_produtos', $produto);
				}

				redirect('vendas/imprimir/'.$query->id_venda,'refresh');

			} else {

                $data['dados']      = $query;
                $data['formas']     = $this->vendas->GetFormaPagamentos();
                $data['produtos']   = $this->vendas->GetAllProdutosByIdVenda($query->id_venda);
                $data['vendedores'] = $this->sistema_model->GetAll('vendedores');
                $data['js']         = 'js/js_tela_venda.js';

                $this->load->template('vendas/edit', $data);
			}	

		} else {
			set_msg('msgerro', 'Você precisa selecionar uma conta a pagar para edição', 'erro');
			redirect('vendas');
		}
	}

	public function del($id=NULL)
	{
		$query = $this->sistema_model->GetByID('vendas', array('id_venda'=>$id));

		if ($id && $query) {

            $this->sistema_model->DoDelete('vendas', array('id_venda'=>$query->id_venda));
            redirect('vendas');

		} else {

            set_msg('msgerro', 'Você precisa passar um id', 'erro');
            redirect('vendas');
        }
	}

	public function imprimir($id=NULL)
	{
		$query = $this->sistema_model->GetByID('vendas', array('id_venda'=>$id));

		if ($id && $query) {
			$data['dados'] = $query; 
			$this->load->template('vendas/imprimir', $data);
		} else {
			set_msg('msgerro', 'Venda não encontrada.', 'erro');
			redirect('vendas','refresh');	
		}
	}

	public function pdf($id=NULL)
	{

		$venda = $this->vendas->GetVendaPDF($id);

		if ($id && $venda) {
			$empresa = $this->sistema_model->GetByID('configuracoes', array('id_config'=>1));
			$this->load->helper('dompdf');
			$nome_arquivo = 'arquivo_venda_'.now().rand(0, 9999);

			$html = '<p align="center" style="font: bold">
						'.$empresa->nome_fantasia.'<br>
						'.$empresa->cnpj.' - '.$empresa->ie.'<br>
						'.$empresa->endereco.', '.$empresa->numero.'<br>
						'.$empresa->telefone.'
					</p>';
			$html .= '<hr>';

			$html .= '<p align="center" style="font: bold;">VENDA</p>';
			$html .= 'Nome do Cliente: '.$venda->nome.'<br>';
			$html .= 'CPF: '.$venda->cpf_cnpj.'<br>';
			$html .= 'Telefone: '.$venda->telefone.'<br>';
			$html .= '<hr><br>';

			$html .= '<table style="border: solid #000;">';
				$html .= '<tr style="background-color: #BBB; font: bold;">';
					$html .= '<td align="center">Quantidade</td>';
					$html .= '<td align="center">Descrição</td>';
					$html .= '<td align="center">Valor Unitário</td>';
					$html .= '<td align="center">Valor Total</td>';
				$html .= '</tr>';

				$produtos = $this->vendas->GetAllProdutos($venda->id_venda);
				$total_produtos = 0;

				foreach ($produtos as $produto) :
					$html .= '<tr style="background-color: #DDD;">';
						$html .= '<td align="center">'.$produto->quantidade.'</td>';
						$html .= '<td>'.$produto->nome.'</td>';
						$html .= '<td align="right">'.formatoMoeda($produto->valor_unitario).'</td>';
						$html .= '<td align="right">'.formatoMoeda($produto->valor_total).'</td>';
					$html .= '</tr>';

					$total_produtos = $total_produtos + $produto->valor_total;
				endforeach;

				$html .= '<tr style="background-color: #CCC;">';
					$html .= '<td align="center" style="font: bold;" colspan="3">Valor Total dos Produtos:</td>';
					$html .= '<td align="right">'.formatoMoeda($total_produtos).'</td>';
				$html .= '</tr>';

			$html .= '</table>';

			$html .= '<br><hr>';

			$html .= '<p>Forma de Pagamento: ';
				switch ($venda->id_pagamento) :
					case '1':
						$html .= "Dinheiro";
						break;
					case '2':
						$html .= "Cheque";
						break;
					case '3':
						$html .= "Boleto";
						break;
					case '4':
						$html .= "Cartão";
						break;
					default:
						break;
				endswitch;
			$html .= '</p>';

		} else {
			set_msg('msgerro', 'Venda não encontrada.', 'erro');
			redirect('vendas','refresh');
		}

		pdf_create($html, $nome_arquivo);
	}

}

/* End of file Vendas.php */
/* Location: ./application/controllers/Vendas.php */