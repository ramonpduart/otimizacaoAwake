<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caixa extends CI_Controller {
	
	public function index()
	{
		$this->load->view('form_caixa');
	}

	public function add() {
		$this->load->model ( 'MCaixa', '', TRUE );
		$this->MCaixa->addCaixa ( $_POST );
		redirect ( 'caixa', 'refresh' );
	}
}
