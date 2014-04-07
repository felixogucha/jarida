<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Select extends CI_Model {

	public function doLogin($username, $password)
	{
		$sql = "SELECT user_id, city, email, other_names, username, phone_number, residence, surname, nationality, sex, status, salutation, publisher_id FROM viewallusers WHERE username = ? AND password = ?";
		$query = $this->db->query($sql, array($username, sha1($password)));
		//$query = $this->db->get_where('users', array('username' => $username, 'password' => sha1($password)));
		if($query->num_rows() > 0){
			$rows = $query->row();
			return $rows;
		}
	}

	public function getSalutation()
	{
		$query = $this->db->get('salutation');
		if($query->num_rows() > 0){
			foreach ($query->result() as $rows) {
				$data[] = $rows;
			}
			return $data;
		}
	}

	public function getAll($db) {
		$query = $this->db->get($db);
		if($query->num_rows() > 0){
			foreach ($query->result() as $rows) {
				$data[] = $rows;
			}
			return $data;
		}
	}

	public function getAllSpecific($db, $column, $id) {
		$query = $this->db->get_where($db, array($column => $id));
		if($query->num_rows() > 0){
			foreach ($query->result() as $rows) {
				$data[] = $rows;
			}
			return $data;
		}
	}

	public function getIssuesInAMagazine($magazine_id) {
		$query = $this->db->get_where('mag_issues', array('magazine_id' => $magazine_id));
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $rows) {
				$data[] = $rows;
			}
			return $data;
		}
	}

	public function getSpecific($table_name, $column, $key)
	{
		$query = $this->db->get_where($table_name, array($column => $key));
		if($query->num_rows() > 0){
			$rows = $query->row();
			return $rows;
		}
	}

	public function getRolePermissions($role_id) {
		$query = $this->db->get_where('role_permissions', array('role_id' => $role_id));
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $rows) {
				$data[] = $rows;
			}
			return $data;
		}
	}

	public function getRoleId($role_name, $role_desc, $added_on)
	{
		$sql = "SELECT * FROM roles WHERE role_name = ? AND role_desc = ? AND added_on = ?"; 
		$db_res = $this->db->query($sql, array($role_name, $role_desc, $added_on));
		if($db_res->num_rows() > 0){
			$row = $db_res->row();
			return $row->role_id;
		}
	}

	public function getGroupId($group_name, $group_desc, $added_on)
	{
		$sql = "SELECT * FROM groups WHERE group_name = ? AND group_desc = ? AND added_on = ?"; 
		$db_res = $this->db->query($sql, array($group_name, $group_desc, $added_on));
		if($db_res->num_rows() > 0){
			$row = $db_res->row();
			return $row->group_id;
		}
	}

	public function getGroupRoles($group_id) {
		$query = $this->db->get_where('group_role', array('group_id' => $group_id));
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $rows) {
				$data[] = $rows;
			}
			return $data;
		}
	}

	public function getUserId($phone, $surname, $other_names, $added_on)
	{
		$sql = "SELECT * FROM users WHERE phone_number = ? AND surname = ? AND other_names = ? AND added_on = ?"; 
		$db_res = $this->db->query($sql, array($phone, $surname, $other_names, $added_on));
		if($db_res->num_rows() > 0){
			$row = $db_res->row();
			return $row->user_id;
		}
	}

	public function getPublisherId($email, $phone)
	{
		$sql = "SELECT * FROM publisher WHERE email_address = ? AND phone_number = ?"; 
		$db_res = $this->db->query($sql, array($email, $phone));
		if($db_res->num_rows() > 0){
			$row = $db_res->row();
			return $row->publisher_id;
		}
	}

	public function myProfile()
	{
		$query = $this->db->get_where('viewallusers', array('user_id' => $this->session->userdata('user_id')));
		if($query->num_rows() > 0){
			$row = $query->row();
			return $row;
		}
	}

	public function magazineRange($limit, $offset)
	{
		$this->db->select("*");
		$this->db->from("viewmagazines");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $rows) {
				$data[] = $rows;
			}
			return $data;
		}
	}

	public function pageRange($issue_id, $limit, $offset)
	{
		$this->db->select("*");
		$this->db->from("issue_pages");
		$this->db->where('issue_id', $issue_id);
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		//$query = $this->db->query($sql, array($issue_id, $from, $to));

		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $rows) {
				$data[] = $rows;
			}
			return $data;
		}
	}


	public function specificMagazine($magazine_id, $limit, $offset)
	{
		$this->db->select("*");
		$this->db->from("viewmagazines");
		$this->db->where('magazine_id', $magazine_id);
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		//$query = $this->db->query($sql, array($issue_id, $from, $to));

		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $rows) {
				$data[] = $rows;
			}
			return $data;
		}
	}

	/*
	public function settings()
	{
		$query = $this->db->get('system_settings');
		if($query->num_rows() > 0){
			$row = $query->row();
			return $row;
		}
	}

	public function getStatus()
	{
		$query = $this->db->get('status');
		if($query->num_rows() > 0){
			foreach ($query->result() as $rows) {
				$data[] = $rows;
			}
			return $data;
		}
	}
	*/

}