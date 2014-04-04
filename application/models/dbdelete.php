<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dbdelete extends CI_Model {
	public function deleteFrom($table_name, $column, $key)
	{
		$result = $this->db->delete($table_name, array($column => $key));
		return $result;
	}

	
}