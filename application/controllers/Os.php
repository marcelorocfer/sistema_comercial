<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Os extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		
		if (!$this->ion_auth->logged_in()) {
        	set_msg('msgerro', 'Erro: É preciso estar logado no sistema!', 'erro');
        	redirect('login','refresh');
        }  

        $this->load->library('form_validation');
        $this->load->model('Os_model', 'os');
	}

	public function index()
	{
		$data['ordens'] = $this->os->getAllOs();

		/*echo "<pre>";
		print_r ($data['ordens']);
		echo "</pre>";*/

		$this->load->template('os/index', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('id_cliente', 'Cliente', 'required');
		$this->form_validation->set_rules('data_emissao', 'Data de Emissão', 'required');

		if ($this->form_validation->run() == TRUE) {
			$dados = elements(array(
				'id_cliente', 
				'status',
				'equipamento',
				'marca',
				'modelo',
				'acessorios',
                'defeito'

			), $this->input->post());

			$dados['data_emissao'] = formataDataDB($this->input->post('data_emissao'));

			$this->sistema_model->DoInsert('ordem_servicos', $dados, TRUE);
			$id_os = $this->session->userdata('last_id');

			redirect('os/imprimir/'.$id_os,'refresh');
		} else {
            $data['formas'] = $this->os->getFormaPagamentos();
            $data['js']     = 'js/js_tela_os.js';

			$this->load->template('os/add', $data);
		}				
	}

	public function edit($id=NULL)
	{
		$query = $this->os->getOsById($id);

		if ($id && $query) {

            $this->form_validation->set_rules('id_cliente', 'Cliente', 'required');
            $this->form_validation->set_rules('data_emissao', 'Data de Emissão', 'required');

            if ($this->form_validation->run() == TRUE) {
                $dados = elements(array(
                    'id_cliente', 
                    'status', 
                    'equipamento', 
                    'marca',
                    'modelo',
                    'acessorios',
                    'defeito',
                    'valor_desconto',
                    'valor_entrada',
                    'id_pagamento'

                ), $this->input->post());

                $dados['total_ordem']      = $this->input->post('total_pagar');
				$dados['data_emissao'] 	   = formataDataDB($this->input->post('data_emissao'));
				$dados['ultima_alteracao'] = dataDiaDB();


				$this->sistema_model->DoUpdate('ordem_servicos',
                    $dados, array('id_ordem' => $this->input->post('id_ordem')));

				$this->os->apagarServicos($query->id_ordem);

                $id_servico = $this->input->post('id_servico');
                $valor_servico = $this->input->post('valor_total');

                $t_servicos = count($id_servico);

                for ($i=0; $i < $t_servicos; $i++) { 
                    $servico['id_servico']      = $id_servico[$i]; 
                    $servico['valor_servico']   = $valor_servico[$i]; 
                    $servico['id_ordem']        = $this->input->post('id_ordem'); 
                    $servico['quantidade']      = 1; 

                    $this->sistema_model->DoInsert('os_servicos', $servico);
                }

				redirect('os/imprimir/'.$query->id_ordem.'','refresh');

			} else {

                $data['dados']      = $query;
                $data['formas']     = $this->os->getFormaPagamentos();
                $data['servicos']   = $this->os->getAllServicosByIdOs($query->id_ordem);
                $data['js']         = 'js/js_tela_os.js';

                $this->load->template('os/edit', $data);
			}	

		} else {
			set_msg('msgerro', 'Você precisa selecionar uma ordem de serviço para edição', 'erro');
			redirect('os');
		}
	}

	public function del($id=NULL)
	{
		$query = $this->sistema_model->GetByID('ordem_servicos', array('id_ordem'=>$id));

		if ($id && $query) {

            $this->sistema_model->DoDelete('ordem_servicos', array('id_ordem'=>$query->id_ordem));
            redirect('os');

		} else {

            set_msg('msgerro', 'Você precisa passar um id', 'erro');
            redirect('os');
        }
	}

	public function imprimir($id=NULL)
	{
		$query = $this->sistema_model->GetByID('ordem_servicos', array('id_ordem'=>$id));

		if ($id && $query) {
			$data['dados'] = $query; 
			$this->load->template('os/imprimir', $data);
		} else {
			set_msg('msgerro', 'Venda não encontrada.', 'erro');
			redirect('os','refresh');
		}
	}

	public function pdf($id=NULL)
	{

		$os = $this->os->getOsPDF($id);

		if ($os) {
			$empresa = $this->sistema_model->GetByID('configuracoes', array('id_config'=>1));
			$this->load->helper('dompdf');
			$nome_arquivo = 'arquivo_os_'.now().rand(0, 9999);

			$html = '<p align="center" style="font: bold">
						'.$empresa->nome_fantasia.'<br>
						'.$empresa->cnpj.' - '.$empresa->ie.'<br>
						'.$empresa->endereco.', '.$empresa->numero.'<br>
						'.$empresa->telefone.'
					</p>';
			$html .= '<hr>';

			$html .= '<p align="center" style="font: bold;">Ordem de Serviço Nº '.$os->id_ordem.' - '.formataDataView($os->data_emissao).'</p>';
            $html .= 'Nome do Cliente: '.$os->nome.'<br>';
            $html .= 'CPF: '.$os->cpf_cnpj.'<br>';
            $html .= 'Telefone: '.$os->telefone.'<br>';
			$html .= '<hr><br>';

			$html .= 'Informações da OS';
            $html .= '<hr>';

            $html .= '<table style="border: solid #000; width: 100%">';
                $html .= '<tr style="background-color: #BBB; font: bold;">';
                    $html .= '<td align="center">Equipamento</td>';
                    $html .= '<td align="center">Marca</td>';
                    $html .= '<td align="center">Modelo</td>';
                $html .= '</tr>';

                $html .= '<tr style="background-color: #DDD;">';
                    $html .= '<td align="center">'.$os->equipamento.'</td>';
                    $html .= '<td align="center">'.$os->marca.'</td>';
                    $html .= '<td align="center">'.$os->modelo.'</td>';
                $html .= '</tr>';
            $html .= '</table>';

            $html .= '<br>';

            $html .= '<table style="border: solid #000; width: 100%">';
                $html .= '<tr style="background-color: #BBB; font: bold;">';
                    $html .= '<td align="center">Acessórios</td>';
                    $html .= '<td align="center">Defeito</td>';
                $html .= '</tr>';

                $html .= '<tr style="background-color: #DDD;">';
                    $html .= '<td align="center">'.$os->acessorios.'</td>';
                    $html .= '<td align="center">'.$os->defeito.'</td>';
                $html .= '</tr>';
            $html .= '</table>';

            $html .= '<br>';

            if ($os->status == 2) {
                $html .= '<table style="border: solid #000; width: 100%">';
                    $html .= '<tr style="background-color: #BBB; font: bold;">';
                        $html .= '<td align="center">Descrição</td>';
                        $html .= '<td align="center">Valor do Serviço</td>';
                    $html .= '</tr>';

                $servicos = $this->os->getAllServicos($os->id_ordem);
                $total_servicos = 0;

                    foreach ($servicos as $servico) :
                        $html .= '<tr style="background-color: #DDD;">';
                            $html .= '<td align="center">'.$servico->nome_servico.'</td>';
                            $html .= '<td align="center">'.formatoMoeda($servico->valor_servico).'</td>';
                        $html .= '</tr>';

                        $total_servicos = $total_servicos + $servico->valor_servico;
                    endforeach;

                $html .= '</table>';

                $html .= '<br>';

                $html .= '<table style="border: solid #000; width: 100%">';
                    $html .= '<tr style="background-color: #b0c5cc;">';
                        $html .= '<td align="center" style="font: bold;">Valor Total:</td>';
                        $html .= '<td align="center">'.formatoMoeda($total_servicos).'</td>';
                    $html .= '</tr>';
                $html .= '</table>';

                $html .= '<br><hr>';

                $html .= '<p>Forma de Pagamento: ';
                switch ($os->id_pagamento) :
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
            }

            $html .= '<br><br>';
            $html .= '<br><br>';
            $html .= '<br><br>';
            $html .= '<br><br>';
            $html .= '<br><br>';
            $html .= '<br><br>';
            $html .= '<br><br>';

            $html .= '<div align="center">________________________________________</div>';
            $html .= '<div align="center">'.$os->nome.'</div>';
            $html .= '<br><br><hr>';
            $html .= '<p>Marcelo Infotech - http://marceloinfotech.com/</p>';

		} else {
			set_msg('msgerro', 'Venda não encontrada.', 'erro');
			redirect('vendas','refresh');
		}

		pdf_create($html, $nome_arquivo);
	}

}

/* End of file Vendas.php */
/* Location: ./application/controllers/Os.php */