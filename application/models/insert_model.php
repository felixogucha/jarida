<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Insert_model extends CI_Model {

	public function createUser($user_data)
	{
		$endres = '';
		$result = $this->db->insert('users', $user_data);
		if ($result) {
			$this->load->model('select');
			$sql = "SELECT * FROM users WHERE phone_number = ? AND surname = ? AND other_names = ? AND added_on = ?"; 
			$db_res = $this->db->query($sql, array($user_data->phone_number, $user_data->surname, $user_data->other_names, $user_data->added_on));
			if($db_res->num_rows() > 0){
				$row = $db_res->row();
				$user_id = $row->user_id;
				$userGroup = array('user_id' => $user_id, 'group_id' => $group_id);
		    	$add_ugs = $this->db->insert('users_groups', $userGroup);
		    	if ($add_ugs) {
					$endres = 'y';
				} else {
					$endres = 'n';
				}
			}
		} else {
			$endres = 'n';
		}
		return $endres;
	}

	public function dbInsert($table_name, $data)
	{
		$insertData = $this->db->insert($table_name, $data);
		if ($insertData) {
			return $insertData;
		} else {
			return (!$insertData);
		}

	}

}

