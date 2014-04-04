<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dbupdate extends CI_Model {
	public function updateData($table_name, $column, $key, $data)
	{
		$this->db->where($column, $key);
		$result = $this->db->update($table_name, $data);
		return $result;
		
	}
}