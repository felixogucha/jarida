<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DbOperations extends CI_Model {

	public function addSalutation() {
		$data = array('salutation'  => $_POST['salutation'], 'salutation_description' => $_POST['salutation_description']);
		$this->db->insert('salutation', $data);
	}

}