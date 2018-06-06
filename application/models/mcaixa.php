<?php
class MCaixa extends CI_Model {

	function addCaixa($data) {
		$data['capacidade'] = floatval($data['capacidade']);
		$data['altura'] = floatval($data['altura']);
		$data['comprimento'] = floatval($data['comprimento']);
		$data['largura'] = floatval($data['largura']);
		$this->db->insert ( 'caixa', $data );
	}
	function listCaixas() {
		return $this->db->get( 'caixa' );
	}

	function getCaixa($id) {
		return $this->db->get_where ( 'caixa', array (
				'id' => $id 
		));
	}

	function updatecaixa($id, $data) {
		$this->db->where ( 'idcaixa', $id );
		$data['VALSERV'] = floatval($data['VALSERV']);
		$this->db->update ( 'caixa', $data );
	}
	function deletecaixa($id) {
		$data = array (
				'idcaixa' => $id 
		);
		$this->db->delete ( 'caixa', $data );
	}
	
}
