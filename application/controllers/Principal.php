<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();

        if (!$this->ion_auth->logged_in()) {
        	set_msg('msgerro', 'Erro: É preciso estar logado no sistema!', 'erro');
        	redirect('login','refresh');
        }        

        $this->load->model('Principal_model', 'principal');    
	}

	public function index()
	{
		$dados['total_vendas'] = $this->principal->getTotalVendas();
		$dados['total_servicos'] = $this->principal->getTotalServicos();
		$dados['total_receber'] = $this->principal->getTotalReceber();
		$dados['total_pagar'] = $this->principal->getTotalPagar();
		$dados['pagar_dia'] = $this->principal->PagarDia();
		$dados['receber_dia'] = $this->principal->ReceberDia();

		$this->load->template('principal/index', $dados);
	}

}
