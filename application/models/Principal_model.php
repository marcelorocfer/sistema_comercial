<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal_model extends CI_Model 
{
	public function getTotalVendas()
	{
		$query = $this->db->get('vendas')->result();
		$total = 0;
		foreach ($query as $vendas) :
			$total += $vendas->valor_total;
		endforeach;
		return $total;
	}

	public function getTotalServicos()
	{
		$query = $this->db->get('ordem_servicos')->result();
		$total = 0;
		foreach ($query as $servico) :
			$total += $servico->total_ordem;
		endforeach;
		return $total;
	}

	public function getTotalReceber()
	{
		$this->db->where('status', 1);
		$query = $this->db->get('contas_receber')->result();
		$total = 0;
		foreach ($query as $receber) :
			$total += $receber->valor;
		endforeach;
		return $total;
	}

	public function getTotalPagar()
	{
		$this->db->where('status', 1);
		$query = $this->db->get('contas_pagar')->result();
		$total = 0;
		foreach ($query as $pagar) :
			$total += $pagar->valor;
		endforeach;
		return $total;
	}

	public function ReceberDia()
	{
		$this->db->select('contas_receber.valor, clientes.nome');
		$this->db->from('contas_receber');
		$this->db->join('clientes', 'clientes.id_cliente = contas_receber.id_cliente');
		$this->db->where('contas_receber.vencimento', formataDataDB(dataDia()));
		$query = $this->db->get();
		return $query->result();
	}

	public function PagarDia()
	{
		$this->db->select('contas_pagar.valor, fornecedores.razao, fornecedores.nome_fantasia');
		$this->db->from('contas_pagar');
		$this->db->join('fornecedores', 'fornecedores.id_fornecedor = contas_pagar.id_fornecedor');
		$this->db->where('contas_pagar.vencimento', formataDataDB(dataDia()));
		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file Principal_model.php */
/* Location: ./application/models/Principal_model.php */