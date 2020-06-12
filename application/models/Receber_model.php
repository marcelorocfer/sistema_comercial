<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receber_model extends CI_Model 
{

	public function GetAllContasReceber()
	{
		$this->db->select('contas_receber.*, clientes.nome');
		$this->db->from('contas_receber');
		$this->db->join('clientes', 'clientes.id_cliente = contas_receber.id_cliente', 'left');
		$query = $this->db->get();
		return $query->result();
	}	
}

/* End of file Sistema_model.php */
/* Location: ./application/models/Sistema_model.php */