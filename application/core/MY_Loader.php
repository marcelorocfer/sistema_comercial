<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends CI_Loader 
{

	public function template($nome, $dados = array())
	{
		$this->view('layout/header');
		$this->view($nome, $dados);
		$this->view('layout/footer');
	}

}