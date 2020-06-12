<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagar_model extends CI_Model 
{

	public function GetAllContasPagar()
	{
		$this->db->select('contas_pagar.*, fornecedores.razao, fornecedores.nome_fantasia');
		$this->db->from('contas_pagar');
		$this->db->join('fornecedores', 'fornecedores.id_fornecedor = contas_pagar.id_fornecedor', 'left');
		$query = $this->db->get();
		return $query->result();
	}	
}

/* End of file Receber_model.php */
/* Location: ./application/models/Receber_model.php */