<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mudanca extends CI_Controller {
	
	public function index()
	{
		$this->load->model ( 'MCaixa', '', TRUE );
		$data['caixas'] = $this->MCaixa->listCaixas();
		$this->load->model ( 'MVeiculo', '', TRUE );
		$data['veiculos'] = $this->MVeiculo->listVeiculos();
		$this->load->view('form_mudanca',$data);
	}

	public function calcular() {
		$this->load->model ( 'MCaixa', '', TRUE );
		$this->load->model ( 'MVeiculo', '', TRUE );
		$caixas = $this->input->post();
		$larguraTotal = 0;
		$comprimentoTotal = 0;
		$alturaTotal = 0;
		$capacidadeTotal = 0;
		$qtd = 0;
		$arr  = array();

		for($i = 0; $i < count($caixas['data'])-1; $i = $i+2) {
			$array  = array('idCaixa' => $caixas['data'][$i]['value'],
							'qtdCaixa' => $caixas['data'][$i+1]['value'] );
			array_push($arr,$array);
		}
		$idVeiculo = $caixas['data'][count($caixas['data'])-1]['value'];
		
		foreach ($arr as $caixa) {
			$infoCaixa = $this->MCaixa->getCaixa($caixa['idCaixa']);
			$infoCaixa = $infoCaixa->result();
			$capacidadeTotal += $infoCaixa[0]->capacidade * $caixa['qtdCaixa'];
			$alturaTotal += $infoCaixa[0]->altura* $caixa['qtdCaixa'];
			$comprimentoTotal += $infoCaixa[0]->comprimento* $caixa['qtdCaixa'];
			$larguraTotal += $infoCaixa[0]->largura* $caixa['qtdCaixa'];
		}
		$infoVeiculo = $this->MVeiculo->getVeiculo($idVeiculo);
		$infoVeiculo = $infoVeiculo->result();
		$qtdVeiculos = $capacidadeTotal / $infoVeiculo[0]->capacidade;
		echo ceil($qtdVeiculos);
		exit();
	}
}
