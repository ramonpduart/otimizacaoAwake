<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Veiculo extends CI_Controller {
	
	public function index()
	{
		$this->load->model ( 'MVeiculo', '', TRUE );
		$data['veiculos'] = $this->MVeiculo->listVeiculos ();
		$this->load->view('form_veiculo',$data);
	}

	public function add() {
		$this->load->model ( 'MVeiculo', '', TRUE );
		$this->MVeiculo->addVeiculo ( $_POST );
		redirect ( 'veiculo', 'refresh' );
	}
}
