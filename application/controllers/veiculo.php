<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Veiculo extends CI_Controller {
	
	public function index()
	{
		$this->load->view('form_veiculo');
	}
}
