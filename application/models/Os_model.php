<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Os_model extends CI_Model
{

	public function getAllOs()
	{
		$this->db->select('ordem_servicos.*, clientes.nome');
		$this->db->from('ordem_servicos');
		$this->db->join('clientes', 'clientes.id_cliente = ordem_servicos.id_cliente');
		$query = $this->db->get();
		return $query->result();
	}

    public function getAllServicos($id=NULL)
    {
        if ($id) {
            $this->db->select('os_servicos.*, servicos.*');
            $this->db->from('os_servicos');
            $this->db->join('servicos', 'servicos.id_servico = os_servicos.id_servico');
            $this->db->where('os_servicos.id_ordem', $id);
            $query = $this->db->get();
            return $query->result();
        }
    }

    public function getAllServicosByIdOs($id=NULL)
    {
        if ($id) {
            $this->db->select('os_servicos.*, servicos.nome_servico');
            $this->db->from('os_servicos');
            $this->db->join('servicos', 'servicos.id_servico = os_servicos.id_servico');
            $this->db->where('os_servicos.id_ordem', $id);
            $query = $this->db->get();
            return $query->result();
        }
    }

    public function getFormaPagamentos()
    {
        $query = $this->db->get('forma_pagamentos');
        return $query->result();
    }

    public function getOsById($id=NULL)
    {
        if ($id) {
            $this->db->select('ordem_servicos.*, clientes.nome');
            $this->db->from('ordem_servicos');
            $this->db->join('clientes', 'clientes.id_cliente = ordem_servicos.id_cliente');
            $this->db->where('id_ordem', $id);
            $query = $this->db->get();
            return $query->row();
        }
    }

    public function getOsPDF($id=NULL)
    {
        if ($id) {
            $this->db->select('ordem_servicos.*, clientes.*');
            $this->db->from('ordem_servicos');
            $this->db->join('clientes', 'clientes.id_cliente = ordem_servicos.id_cliente');
            $this->db->where('id_ordem', $id);
            $query = $this->db->get();
            return $query->row();
        }
    }

    public function apagarServicos($id=NULL)
    {
        if ($id) {
            $this->db->delete('os_servicos', array('id_ordem' => $id));
        }
    }

}

/* End of file Os_model.php */
/* Location: ./application/models/Os_model.php */