<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendas_model extends CI_Model 
{

	public function GetAllVendas()
	{
		$this->db->select('vendas.*, clientes.nome, vendedores.nome_vendedor');
		$this->db->from('vendas');
		$this->db->join('clientes', 'clientes.id_cliente = vendas.id_cliente');
		$this->db->join('vendedores', 'vendedores.id_vendedor = vendas.id_vendedor', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	public function GetVendaPDF($id=NULL)
	{
		if ($id) {
			$this->db->select('vendas.*, clientes.*, vendedores.nome_vendedor');
			$this->db->from('vendas');
			$this->db->join('clientes', 'clientes.id_cliente = vendas.id_cliente');
			$this->db->join('vendedores', 'vendedores.id_vendedor = vendas.id_vendedor', 'left');
			$this->db->where('vendas.id_venda', $id);
			$query = $this->db->get();
			return $query->row();
		}		
	}

	public function GetAllProdutos($id=NULL)
	{
		if ($id) {
			$this->db->select('venda_produtos.*, produtos.nome');
			$this->db->from('venda_produtos');
			$this->db->join('produtos', 'venda_produtos.id_produto = produtos.id_produto');
			$this->db->where('venda_produtos.id_venda', $id);
			$query = $this->db->get();
			return $query->result();
		}
	}

	public function getVendasById($id=NULL)
    {
        if ($id) {
            $this->db->select('vendas.*, clientes.nome, clientes.id_cliente');
            $this->db->from('vendas');
            $this->db->join('clientes', 'clientes.id_cliente = vendas.id_cliente');
            $this->db->where('vendas.id_venda', $id);
            $query = $this->db->get();
            return $query->row();
        }
    }

    public function apagarProdutos($id=NULL)
    {
        if ($id) {
            $this->db->delete('venda_produtos', array('id_venda' => $id));
        }
    }

    public function GetAllProdutosByIdVenda($id=NULL)
    {
        if ($id) {
            $this->db->select('venda_produtos.*, produtos.nome');
            $this->db->from('venda_produtos');
            $this->db->join('produtos', 'venda_produtos.id_produto = produtos.id_produto');
            $this->db->where('venda_produtos.id_venda', $id);
            $query = $this->db->get();
            return $query->result();
        }
    }

    public function GetFormaPagamentos()
    {
        $query = $this->db->get('forma_pagamentos');
        return $query->result();
    }

    /*public function getVendedores()
	{
		$query = $this->db->get('users');
		return $query->result();
	}*/

}

/* End of file Vendas_model.php */
/* Location: ./application/models/Vendas_model.php */