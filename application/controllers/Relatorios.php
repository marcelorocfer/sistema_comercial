<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		if (!$this->ion_auth->logged_in()) {
        	set_msg('msgerro', 'Erro: É preciso estar logado no sistema!', 'erro');
        	redirect('login','refresh');
        }  

        $this->load->library('form_validation'); 
        $this->load->model('Relatorios_model', 'relatorios'); 
    }

	public function index()
	{
		redirect('/', 'refresh');
	}

    public function vendas()
    {
        $this->form_validation->set_rules('data_inicial', 'Data Inicial',
        'required');
        if ($this->form_validation->run() == TRUE) {

        	if ($this->input->post('data_inicial')) {
        		$data_inicial = formataDataDB($this->input->post('data_inicial'));
        	} else {
        		$data_inicial = NULL;
        	}        	

        	if ($this->input->post('data_final')) {
        		$data_final = formataDataDB($this->input->post('data_final'));
        	} else {
        		$data_final = NULL;
        	}
        	
            $vendas = $this->relatorios->getVendas($data_inicial, $data_final);
            $empresa = $this->sistema_model->GetByID('configuracoes', array('id_config'=>1));

			$this->load->helper('dompdf');
			$nome_arquivo = 'relatorio_vendas_'.now().rand(0, 9999);

			$html = '<p align="center" style="font: bold">
						'.$empresa->nome_fantasia.'<br>
						'.$empresa->cnpj.' - '.$empresa->ie.'<br>
						'.$empresa->endereco.', '.$empresa->numero.'<br>
						'.$empresa->telefone.'
					</p>';
			$html .= '<hr>';

			$html .= '<p align="center" style="font: bold;">RELATÓRIO DE VENDAS</p>';

			$html .= '<table style="border: solid #000;" width="100%">';
				$html .= '<tr style="background-color: #BBB; font: bold;">';
					$html .= '<td align="center">Data de Emissão</td>';
					$html .= '<td align="center">Nome do Cliente</td>';
					$html .= '<td align="center">Forma de Pagamento</td>';
					$html .= '<td align="center">Valor</td>';
				$html .= '</tr>';

				$total_vendas = 0;

				foreach ($vendas as $venda) :
					$html .= '<tr style="background-color: #DDD;">';
						$html .= '<td align="center">'.formataDataView($venda->data_emissao).'</td>';
						$html .= '<td>'.$venda->nome.'</td>';
						$html .= '<td align="center">'.$venda->forma_pagamento.'</td>';
						$html .= '<td align="right">'.formatoMoeda($venda->valor_total).'</td>';
					$html .= '</tr>';

					$total_vendas = $total_vendas + $venda->valor_total;
				endforeach;

				$html .= '<tr style="background-color: #B0C4DE;">';
					$html .= '<td align="center" style="font: bold;" colspan="3">Valor Total das Vendas:</td>';
					$html .= '<td align="right" style="font: bold;">'.formatoMoeda($total_vendas).'</td>';
				$html .= '</tr>';

			$html .= '</table>';

			$html .= '<br><hr>';

			pdf_create($html, $nome_arquivo);

        } else {
        	$this->load->template('relatorios/vendas');
        }
    }

    public function os()
    {
    	$this->form_validation->set_rules('data_inicial', 'Data Inicial',
        'required');
        if ($this->form_validation->run() == TRUE) {

        	if ($this->input->post('data_inicial')) {
        		$data_inicial = formataDataDB($this->input->post('data_inicial'));
        	} else {
        		$data_inicial = NULL;
        	}        	

        	if ($this->input->post('data_final')) {
        		$data_final = formataDataDB($this->input->post('data_final'));
        	} else {
        		$data_final = NULL;
        	}

        	$ordens = $this->relatorios->getOs($data_inicial, $data_final);

        	$empresa = $this->sistema_model->GetByID('configuracoes', array('id_config'=>1));

        	$this->load->helper('dompdf');
			$nome_arquivo = 'relatorio_os_'.now().rand(0, 9999);

			$html = '<p align="center" style="font: bold">
						'.$empresa->nome_fantasia.'<br>
						'.$empresa->cnpj.' - '.$empresa->ie.'<br>
						'.$empresa->endereco.', '.$empresa->numero.'<br>
						'.$empresa->telefone.'
					</p>';
			$html .= '<hr>';

			$html .= '<p align="center" style="font: bold;">RELATÓRIO DE ORDEM DE SERVIÇO</p>';

			$html .= '<table style="border: solid #000;" width="100%">';
				$html .= '<tr style="background-color: #BBB; font: bold;">';
					$html .= '<td align="center">Data de Emissão</td>';
					$html .= '<td align="center">Nome do Cliente</td>';
					$html .= '<td align="center">Forma de Pagamento</td>';
					$html .= '<td align="center">Valor</td>';
				$html .= '</tr>';

				$total_os = 0;

				foreach ($ordens as $ordem) :
					$html .= '<tr style="background-color: #DDD;">';
						$html .= '<td align="center">'.formataDataView($ordem->data_emissao).'</td>';
						$html .= '<td>'.$ordem->nome.'</td>';
						$html .= '<td align="center">'.$ordem->forma_pagamento.'</td>';
						$html .= '<td align="right">'.formatoMoeda($ordem->total_ordem).'</td>';
					$html .= '</tr>';

					$total_os = $total_os + $ordem->total_ordem;
				endforeach;

				$html .= '<tr style="background-color: #B0C4DE;">';
					$html .= '<td align="center" style="font: bold;" colspan="3">Valor Total das Ordens de Serviço:</td>';
					$html .= '<td align="right" style="font: bold;">'.formatoMoeda($total_os).'</td>';
				$html .= '</tr>';

			$html .= '</table>';

			$html .= '<br><hr>';

			pdf_create($html, $nome_arquivo);
        	
        } else {
        	$this->load->template('relatorios/os');
        }        
    }

    public function listar_produtos()
    {
    	$produtos = $this->relatorios->getProdutos();

    	$empresa = $this->sistema_model->GetByID('configuracoes', array('id_config'=>1));

    	$this->load->helper('dompdf');
		$nome_arquivo = 'relatorio_produtos_'.now().rand(0, 9999);

		$html = '<p align="center" style="font: bold">
					'.$empresa->nome_fantasia.'<br>
					'.$empresa->cnpj.' - '.$empresa->ie.'<br>
					'.$empresa->endereco.', '.$empresa->numero.'<br>
					'.$empresa->telefone.'
				</p>';
		$html .= '<hr>';

		$html .= '<p align="center" style="font: bold;">RELATÓRIO DE PRODUTOS</p>';

		$html .= '<table style="border: solid #000;" width="100%">';
			$html .= '<tr style="background-color: #BBB; font: bold;">';
				$html .= '<td align="center">Nome do Produto</td>';
				$html .= '<td align="center">Data de Cadastro</td>';
				$html .= '<td align="center">Qtde. em Estoque</td>';
				$html .= '<td align="center">Preço de Custo</td>';
				$html .= '<td align="center">Preço de Venda</td>';
			$html .= '</tr>';

			$t_produto = 0;

			foreach ($produtos as $produto) :
				$html .= '<tr style="background-color: #DDD;">';
					$html .= '<td>'.$produto->nome.'</td>';
					$html .= '<td align="center">'.formataDataView($produto->data_cadastro).'</td>';
					$html .= '<td align="center">'.$produto->quantidade_estoque.'</td>';
					$html .= '<td align="center">'.formatoMoeda($produto->preco_custo).'</td>';
					$html .= '<td align="center">'.formatoMoeda($produto->preco_venda).'</td>';
				$html .= '</tr>';
				$t_produto++;
			endforeach;

			$html .= '<tr style="background-color: #B0C4DE;">';
				$html .= '<td style="font: bold;" colspan="5">Quantidade de Produtos: '.$t_produto.'</td>';
			$html .= '</tr>';

		$html .= '</table>';

		$html .= '<br><hr>';

		pdf_create($html, $nome_arquivo);
    }

    public function lista_conferencia()
    {
    	$produtos = $this->relatorios->getProdutos();

    	$empresa = $this->sistema_model->GetByID('configuracoes', array('id_config'=>1));

    	$this->load->helper('dompdf');
		$nome_arquivo = 'relatorio_lista_conferencia_'.now().rand(0, 9999);

		$html = '<p align="center" style="font: bold">
					'.$empresa->nome_fantasia.'<br>
					'.$empresa->cnpj.' - '.$empresa->ie.'<br>
					'.$empresa->endereco.', '.$empresa->numero.'<br>
					'.$empresa->telefone.'
				</p>';
		$html .= '<hr>';

		$html .= '<p align="center" style="font: bold;">RELATÓRIO DE CONFERÊNCIA DE PRODUTOS</p>';

		$html .= '<table style="border: solid #000;" width="100%">';
			$html .= '<tr style="background-color: #BBB; font: bold;">';
				$html .= '<td align="center">Nome do Produto</td>';
				$html .= '<td align="center">Data de Cadastro</td>';
				$html .= '<td align="center">Qtde. Mínima em Estoque</td>';
				$html .= '<td align="center">Qtde. em Estoque</td>';
				$html .= '<td align="center">Conferência</td>';
			$html .= '</tr>';

			$t_produto = 0;

			foreach ($produtos as $produto) :
				$html .= '<tr style="background-color: #DDD;">';
					$html .= '<td>'.$produto->nome.'</td>';
					$html .= '<td align="center">'.formataDataView($produto->data_cadastro).'</td>';
					$html .= '<td align="center">'.$produto->estoque_minimo.'</td>';
				if ($produto->quantidade_estoque > $produto->estoque_minimo) :
					$html .= '<td align="center">'.$produto->quantidade_estoque.'</td>';
				else:
					$html .= '<td align="center" style="color: red">'.$produto->quantidade_estoque.'</td>';
				endif;					
					$html .= '<td align="center"></td>';
				$html .= '</tr>';
				$t_produto++;
			endforeach;

			$html .= '<tr style="background-color: #B0C4DE;">';
				$html .= '<td style="font: bold;" colspan="5">Quantidade de Produtos: '.$t_produto.'</td>';
			$html .= '</tr>';

		$html .= '</table>';

		$html .= '<br><hr>';

		pdf_create($html, $nome_arquivo);
    }

    public function lista_lucro()
    {
    	$produtos = $this->relatorios->getCusto();

		$empresa = $this->sistema_model->GetByID('configuracoes', array('id_config'=>1));

    	$this->load->helper('dompdf');
		$nome_arquivo = 'relatorio_lista_lucro'.now().rand(0, 9999);

		$html = '<p align="center" style="font: bold">
					'.$empresa->nome_fantasia.'<br>
					'.$empresa->cnpj.' - '.$empresa->ie.'<br>
					'.$empresa->endereco.', '.$empresa->numero.'<br>
					'.$empresa->telefone.'
				</p>';
		$html .= '<hr>';

		$html .= '<p align="center" style="font: bold;">RELATÓRIO DE LUCROS</p>';

		$html .= '<table style="border: solid #000;" width="100%">';
			$html .= '<tr style="background-color: #BBB; font: bold;">';
				$html .= '<td align="center">Nome do Produto</td>';
				$html .= '<td align="center">Preço de Venda</td>';
				$html .= '<td align="center">Preço de Custo</td>';
				$html .= '<td align="center">Lucro</td>';
			$html .= '</tr>';

			$t_produto = 0;
			$venda_produto = 0;
			$custo_produto = 0;

			foreach ($produtos as $produto) :
				$html .= '<tr style="background-color: #DDD;">';
					$html .= '<td>'.$produto->nome.'</td>';
					$html .= '<td align="center">'.formatoMoeda($produto->preco_venda).'</td>';
					$html .= '<td align="center">'.formatoMoeda($produto->preco_custo).'</td>';
					$html .= '<td align="center">'.formatoMoeda($produto->preco_venda - $produto->preco_custo).'</td>';
				$html .= '</tr>';

				$t_produto++;
				$venda_produto += $produto->preco_venda;
				$custo_produto += $produto->preco_custo;
			endforeach;

			$html .= '<tr style="background-color: #B0C4DE;">';
				$html .= '<td colspan="4">Quantidade de Produtos: '.$t_produto.'</td>';
			$html .= '</tr>';
			$html .= '<tr style="background-color: #B0C4DE;">';
				$html .= '<td colspan="4">Total do Preço de Venda: '.formatoMoeda($venda_produto).'</td>';
			$html .= '</tr>';
			$html .= '<tr style="background-color: #B0C4DE;">';
				$html .= '<td colspan="4">Total do Preço de Custo: '.formatoMoeda($custo_produto).'</td>';
			$html .= '</tr>';
			$html .= '<tr style="background-color: #B0C4DE;">';
				$html .= '<td colspan="4">Lucro Total: '.formatoMoeda($venda_produto - $custo_produto).'</td>';
			$html .= '</tr>';

		$html .= '</table>';

		$html .= '<br><hr>';

		pdf_create($html, $nome_arquivo);    	
    }

    public function receber()
    {
    	$this->form_validation->set_rules('tipo_conta', 'Tipo de Conta', 'required');
    	if ($this->form_validation->run() == TRUE) {

    		$empresa = $this->sistema_model->GetByID('configuracoes', array('id_config'=>1));

	    	$this->load->helper('dompdf');
			$nome_arquivo = 'relatorio_contas_receber_'.now().rand(0, 9999);

			$html = '<p align="center" style="font: bold">
						'.$empresa->nome_fantasia.'<br>
						'.$empresa->cnpj.' - '.$empresa->ie.'<br>
						'.$empresa->endereco.', '.$empresa->numero.'<br>
						'.$empresa->telefone.'
					</p>';
			$html .= '<hr>';

			$tipo 	= $this->input->post('tipo_conta'); 

			if ($this->input->post('data_inicial')) {
        		$data_inicial = formataDataDB($this->input->post('data_inicial'));
        	} else {
        		$data_inicial = NULL;
        	}        	

        	if ($this->input->post('data_final')) {
        		$data_final = formataDataDB($this->input->post('data_final'));
        	} else {
        		$data_final = NULL;
        	}

			$contas = $this->relatorios->getContasReceber($tipo, $data_inicial, $data_final);
			
			$html .= '<p align="center" style="font: bold;">RELATÓRIO DE CONTAS A RECEBER '.($tipo == 1 ? "(VENCIDAS)" : "(A VENCER)").'</p>';

			$html .= '<table style="border: solid #000;" width="100%">';
			$html .= '<tr style="background-color: #BBB; font: bold;">';
				$html .= '<td align="center">Data do Cadastro</td>';
				$html .= '<td align="center">Data do Vencimento</td>';
				$html .= '<td align="center">Status</td>';
				$html .= '<td align="center">Nome do Cliente</td>';
				$html .= '<td align="center">Valor</td>';
			$html .= '</tr>';

			$total = 0;
			foreach ($contas as $conta) :
				$html .= '<tr style="background-color: #DDD;">';
					$html .= '<td align="center">'.formataDataView($conta->data_cadastro).'</td>';
					$html .= '<td align="center">'.formataDataView($conta->vencimento).'</td>';
					$html .= '<td align="center">'.($conta->status == 1 ? "<span style='color:red'>A Receber</span>" : "Quitada").'</td>';
					$html .= '<td>'.$conta->nome.'</td>';
					$html .= '<td align="center">'.formatoMoeda($conta->valor).'</td>';
				$html .= '</tr>';

				$total += $conta->valor;				
			endforeach;		

			$html .= '<tr style="background-color: #B0C4DE;">';
				$html .= '<td align="center" style="font: bold;" colspan="4">Total:</td>';
				$html .= '<td align="center" style="font: bold;" colspan="4">'.formatoMoeda($total).'</td>';
			$html .= '</tr>';

			pdf_create($html, $nome_arquivo);


    	} else {
    		$this->load->template('relatorios/receber'); 
    	}
    }

    public function pagar()
    {
    	$this->form_validation->set_rules('tipo_conta', 'Tipo de Conta', 'required');
    	if ($this->form_validation->run() == TRUE) {

    		$empresa = $this->sistema_model->GetByID('configuracoes', array('id_config'=>1));

	    	$this->load->helper('dompdf');
			$nome_arquivo = 'relatorio_contas_pagar_'.now().rand(0, 9999);

			$html = '<p align="center" style="font: bold">
						'.$empresa->nome_fantasia.'<br>
						'.$empresa->cnpj.' - '.$empresa->ie.'<br>
						'.$empresa->endereco.', '.$empresa->numero.'<br>
						'.$empresa->telefone.'
					</p>';
			$html .= '<hr>';

    		$tipo = $this->input->post('tipo_conta');

			if ($this->input->post('data_inicial')) {
        		$data_inicial = formataDataDB($this->input->post('data_inicial'));
        	} else {
        		$data_inicial = NULL;
        	}        	

        	if ($this->input->post('data_final')) {
        		$data_final = formataDataDB($this->input->post('data_final'));
        	} else {
        		$data_final = NULL;
        	}

    		$contas = $this->relatorios->getContasPagar($tipo, $data_inicial, $data_final);	
			
			$html .= '<p align="center" style="font: bold;">RELATÓRIO DE CONTAS A RECEBER '.($tipo == 1 ? "(VENCIDAS)" : "(A VENCER)").'</p>';

			$html .= '<table style="border: solid #000;" width="100%">';
			$html .= '<tr style="background-color: #BBB; font: bold;">';
				$html .= '<td align="center">Data do Cadastro</td>';
				$html .= '<td align="center">Data do Vencimento</td>';
				$html .= '<td align="center">Status</td>';
				$html .= '<td align="center">Nome do Fornecedor</td>';
				$html .= '<td align="center">Valor</td>';
			$html .= '</tr>';

			$total = 0;
			foreach ($contas as $conta) :
				$html .= '<tr style="background-color: #DDD;">';
					$html .= '<td align="center">'.formataDataView($conta->data_cadastro).'</td>';
					$html .= '<td align="center">'.formataDataView($conta->vencimento).'</td>';
					$html .= '<td align="center">'.($conta->status == 1 ? "<span style='color:red'>A Pagar</span>" : "Quitada").'</td>';
					$html .= '<td>'.($conta->nome_fantasia != NULL ? $conta->nome_fantasia : '').' - '.$conta->razao.'</td>';
					$html .= '<td align="center">'.formatoMoeda($conta->valor).'</td>';
				$html .= '</tr>';

				$total += $conta->valor;				
			endforeach;		

			$html .= '<tr style="background-color: #B0C4DE;">';
				$html .= '<td align="center" style="font: bold;" colspan="4">Total:</td>';
				$html .= '<td align="center" style="font: bold;" colspan="4">'.formatoMoeda($total).'</td>';
			$html .= '</tr>';

			pdf_create($html, $nome_arquivo);

    	} else {
    		$this->load->template('relatorios/pagar');
    	}
    }
}

/* End of file Relatorios.php */
/* Location: ./application/controllers/Relatorios.php */