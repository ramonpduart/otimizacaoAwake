<?php
class MVeiculo extends CI_Model {

	function addViculo($data) {
		//$data['VALSERV'] = floatval($data['VALSERV']);
		$this->db->insert ( 'veiculo', $data );
	}
	function listVeiculos() {
		return $this->db->get( 'veiculo' );
	}

	function getVeiculo($id) {
		return $this->db->get_where ( 'veiculo', array (
				'id' => $id 
		));
	}

	function updateVeiculo($id, $data) {
		$this->db->where ( 'idveiculo', $id );
		$data['VALSERV'] = floatval($data['VALSERV']);
		$this->db->update ( 'veiculo', $data );
	}
	function deleteVeiculo($id) {
		$data = array (
				'idveiculo' => $id 
		);
		$this->db->delete ( 'veiculo', $data );
	}
	
}
