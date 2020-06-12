<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistema_model extends CI_Model 
{

	public function GetAll($table=NULL, $condicao=NULL)
	{
		if ($table) {
			if (is_array($condicao)) {
				$this->db->where($condicao);
			}

			$query = $this->db->get($table);
			return $query->result();
		} else {
			return false;
		}
	}

	public function GetByID($table=NULL, $condicao=NULL)
	{
		if ($table && is_array($condicao)) {
			$this->db->where($condicao);
			$this->db->limit(1);
			$query = $this->db->get($table);
			return $query->row();
		} else {
			return false;
		}
	}	

	public function DoInsert($table=NULL, $dados=NULL, $getID=NULL)
	{
		if ($table && is_array($dados)) {	
			$this->db->insert($table, $dados);

			if ($getID) :
				$last_id = $this->db->insert_id();
				$this->session->set_userdata('last_id', $last_id);
			endif;

			if ($this->db->affected_rows() > 0) {
				set_msg('msgsuccess', 'Cadastro realizado com sucesso!', 'sucesso');
			} else {
				set_msg('msgerro', 'Ocorreu um erro ao tentar cadastrar, tente novamente!', 'erro');
			}

		} else {
			return false;
		}
	}

	public function DoUpdate($table=NULL, $dados=NULL, $condicao=NULL) {
		if ($table && is_array($dados) && is_array($condicao)) {
			$this->db->update($table, $dados, $condicao);

			if ($this->db->affected_rows() > 0) {
				set_msg('msgsuccess', 'Cadastro atualizado com sucesso!', 'sucesso');
			} else {
				set_msg('msgerro', 'Ocorreu um erro ao tentar atualizar, tente novamente!', 'erro');
			}

		} else {
			return false;
		}
	}

	public function DoDelete($table=NULL, $condicao=NULL)
	{
		if ($table && is_array($condicao)) {
			$this->db->delete($table, $condicao);

			if ($this->db->affected_rows() > 0) {
				set_msg('msgsuccess', 'Registro excluído com sucesso!', 'sucesso');
			} else {
				set_msg('msgerro', 'Ocorreu um erro ao tentar excluir o registro, tente novamente!', 'erro');
			}
		} else {
			return false;
		}
	}

	public function autocompleteCliente($busca=NULL)
	{
		if ($busca) {
			$this->db->like('nome', $busca, 'after');
			$query = $this->db->get('clientes');
			return $query->result();
		} else {
			return false;
		}
	}

	public function autocompleteProduto($busca=NULL)
	{
		if ($busca) {
			$this->db->like('nome', $busca, 'after');
			$query = $this->db->get('produtos');
			return $query->result();
		} else {
			return false;
		}
	}

	public function autocompleteServico($busca=NULL)
	{		
		if ($busca) {							
			$this->db->like('nome_servico', $busca, 'after');
			$this->db->where('ativo', 1);
			$query = $this->db->get('servicos');
			return $query->result();
		} else {
			return false;
		}
	}
}

/* End of file Sistema_model.php */
/* Location: ./application/models/Sistema_model.php */