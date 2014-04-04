<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mobile extends CI_Model {
	public function login($email_address, $password)
	{
		$query = $this->db->get_where('viewallusers', array('username' => $email_address, 'password' => sha1($password)));
		if($query->num_rows() > 0){
			$rows = $query->row();
			return $rows;
		}
		//$email_address, $password
	}	
}