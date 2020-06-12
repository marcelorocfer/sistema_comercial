<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios_model extends CI_Model 
{	
	public function getVendas($data_inicial, $data_final)
    {
    	$this->db->select('
    	    vendas.id_venda, 
    	    vendas.data_emissao,
    	    vendas.valor_total,
    	    clientes.nome,
    	    forma_pagamentos.nome as forma_pagamento
    	');
    	$this->db->from('vendas');
    	$this->db->join('clientes', 'clientes.id_cliente = vendas.id_cliente');
    	$this->db->join('forma_pagamentos', 'forma_pagamentos.id_pagamento = vendas.id_pagamento');

    	if ($data_inicial && $data_final) {
    		$this->db->where(
    			'vendas.data_emissao BETWEEN "
    			'.date('Y-m-d', strtotime($data_inicial)).'" 
    			AND "
    			'.date('Y-m-d', strtotime($data_final)).'"');
    	} else {
    		$this->db->where('vendas.data_emissao', $data_inicial);
    	}
    	
    	$query = $this->db->get();
    	return $query->result();
    }

    public function getOs($data_inicial, $data_final)
    {
    	$this->db->select('
    	    ordem_servicos.id_ordem, 
    	    ordem_servicos.data_emissao,
    	    ordem_servicos.total_ordem,
    	    clientes.nome,
    	    forma_pagamentos.nome as forma_pagamento
    	');
    	$this->db->from('ordem_servicos');
    	$this->db->join('clientes', 'clientes.id_cliente = ordem_servicos.id_cliente');
    	$this->db->join('forma_pagamentos', 'forma_pagamentos.id_pagamento = ordem_servicos.id_pagamento');
    	$this->db->where('ordem_servicos.status', 2);
    	
    	if ($data_inicial && $data_final) {
    		$this->db->where(
    			'ordem_servicos.data_emissao BETWEEN "
    			'.date('Y-m-d', strtotime($data_inicial)).'" 
    			AND "
    			'.date('Y-m-d', strtotime($data_final)).'"');
    	} else {
    		$this->db->where('ordem_servicos.data_emissao', $data_inicial);
    	}
    	
    	$query = $this->db->get();
    	return $query->result();
    }

    public function getProdutos()
    {
        $this->db->select('
            produtos.nome,
            produtos.preco_custo,            
            produtos.preco_venda,        
            produtos.quantidade_estoque,            
            produtos.estoque_minimo,            
            produtos.data_cadastro        
        ');
        $this->db->from('produtos');
        $this->db->where('produtos.ativo', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function getCusto()
    {
        $this->db->select('
            produtos.nome,
            produtos.preco_custo,            
            produtos.preco_venda,            
        ');
        $this->db->from('produtos');
        $this->db->where('produtos.ativo', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function getContasReceber($tipo, $data_inicial, $data_final)
    {
        if ($tipo) {
            $this->db->select('contas_receber.*, clientes.nome');
            $this->db->from('contas_receber');
            $this->db->join('clientes', 'clientes.id_cliente = contas_receber.id_cliente');
            $this->db->order_by('data_cadastro', 'asc');

            if ($tipo == 1) {
                // Contas Vencidas
                $this->db->where('vencimento <', dataDiaDB());
            } elseif ($tipo == 2) {
                // Contas a Vencer
                $this->db->where('vencimento > ', dataDiaDB());
            }

            if ($data_inicial && $data_final) {
                $this->db->where(
                    'contas_receber.vencimento BETWEEN "
                    '.date('Y-m-d', strtotime($data_inicial)).'" 
                    AND "
                    '.date('Y-m-d', strtotime($data_final)).'"');
            } 

            $query = $this->db->get();
            return $query->result();   
        }        
    }

    public function getContasPagar($tipo, $data_inicial, $data_final)
    {
        if ($tipo) {
            $this->db->select('contas_pagar.*, fornecedores.razao, fornecedores.nome_fantasia');
            $this->db->from('contas_pagar');
            $this->db->join('fornecedores', 'fornecedores.id_fornecedor = contas_pagar.id_fornecedor');
            $this->db->order_by('data_cadastro', 'asc');

            if ($tipo == 1) {
                // Contas Vencidas
                $this->db->where('vencimento <', dataDiaDB());
            } elseif ($tipo == 2) {
                // Contas a Vencer
                $this->db->where('vencimento >', dataDiaDB());
            }

            if ($data_inicial && $data_final) {
                $this->db->where(
                    'contas_pagar.vencimento BETWEEN "
                    '.date('Y-m-d', strtotime($data_inicial)).'" 
                    AND "
                    '.date('Y-m-d', strtotime($data_final)).'"');
            } 

            $query = $this->db->get();
            return $query->result();   
        }
    }
}

/* End of file Relatorios_model.php */
/* Location: ./application/models/Relatorios_model.php */