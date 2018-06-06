<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caixa extends CI_Controller {
	
	public function index()
	{
		$this->load->model ( 'MCaixa', '', TRUE );
		$data['caixas'] = $this->MCaixa->listCaixas();
		$this->load->view('form_caixa',$data);
	}

	public function add() {
		$this->load->model ( 'MCaixa', '', TRUE );
		$this->MCaixa->addCaixa ( $_POST );
		redirect ( 'caixa', 'refresh' );
	}
}
