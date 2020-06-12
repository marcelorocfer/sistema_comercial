<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function set_msg($id, $msg, $tipo)
{
	if ($id) {

		$CI =& get_instance();

		switch ($tipo) {
			case 'erro':
				$CI->session->set_flashdata($id, '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$msg.'</div>');
				break;
			
			case 'sucesso':
				$CI->session->set_flashdata($id, '<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$msg.'</div>');
				break;
		}
	}

	return FALSE;
}

function get_msg($id, $printar = TRUE)
{
	$CI =& get_instance();
	if ($CI->session->flashdata($id)) {
		if ($printar) {
			echo $CI->session->flashdata($id);
			return TRUE;
		}
	}
}

function erros_validacao()
{
	if (validation_errors()) {
		echo '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>';
		echo validation_errors('<p>', '</p>');
		echo '</div>';
	}
}

function dataDiaDB()
{
	$format = 'DATE_W3C';
	$time 	= time();
	return standard_date($format, $time);
}

function dataDia()
{
    date_default_timezone_set('America/Sao_Paulo');
    $stringdedata = "%d/%m/%Y";
    $data = time();
    $data = mdate($stringdedata, $data);
    return $data;
}

function formataDataDB($data)
{
	if ($data) {

		$data = explode("/", $data);

		$dia = $data[0];
		$mes = $data[1];
		$ano = $data[2];

		$data = $ano ."-". $mes ."-". $dia;

		return $data;
	}
}

function formataDataView($data)
{
	if ($data) {

		$data = explode("-", $data);

		$dia = $data[2];
		$mes = $data[1];
		$ano = $data[0];

		$data = $dia ."/". $mes ."/". $ano;

		return $data;
	}
}

function formatoMoeda($value=NULL)
{
	if ($value != NULL) {
		$valor = 'R$ '. number_format($value, 2, ',', '.');

		return $valor;
	}
}