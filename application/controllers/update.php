<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Update extends CI_Controller {

	public function salutation() {
		$salutation_id = $_POST['salutation_id'];
		$salutation = $_POST['salutation'];
		$salutation_description = $_POST['salutation_description'];

		$data = array(
               'salutation' => $salutation,
               'salutation_description' => $salutation_description
            );

		$this->db->where('salutation_id', $salutation_id);
		$res = $this->db->update('salutation', $data);
		if ($res) {
			$newdata = array('ed_sal'  => 'y');
			$this->session->set_userdata($newdata);
		} else {
			$newdata = array('ed_sal'  => 'n');
			$this->session->set_userdata($newdata);
		}
		
		redirect('jarida/salutation');
	}

	//Look at this
	public function publisher() {
		$publisher_id = $_POST['publisher_id'];
		$publisher_name = $_POST['publisher_name'];
		$publisher_email = $_POST['publisher_email'];
		$publisher_phone = $_POST['publisher_phone'];
		$box_number = $_POST['box_number'];
		$postal_code = $_POST['postal_code'];
		$physical_location = $_POST['physical_location'];
		$status_id = $_POST['status_id'];

		$person_id = $_POST['person_id'];
		$surname = $_POST['surname'];
		$other_names = $_POST['other_names'];
		$publisher_id = $publisher_id;
	    $person_phone = $_POST['person_phone'];
		$person_email = $_POST['person_email'];
		$salutation_id = $_POST['salutation_id'];

		$publisher = array(
			'publisher_name' => $publisher_name,
			'email_address' => $publisher_email,
			'phone_number' => $publisher_phone,
			'box_number' => $box_number,
			'postal_code' => $postal_code,
			'physical_location' => $physical_location,
			'status_id' => $status_id
		 );

		$contactPerson = array(
			'surname' => $surname,
			'other_names' => $other_names,
			'publisher_id' => $publisher_id,
	    	'phone_number' => $person_phone,
		    'email_address' => $person_email,
		    'salutation_id' => $salutation_id
		 );

		//$this->db->trans_begin();
		$this->db->where('publisher_id', $publisher_id);
		$res_publisher = $this->db->update('publisher', $publisher);

		$this->db->where('person_id', $person_id);
		$res_person = $this->db->update('contact_persons', $contactPerson);
		//$this->db->trans_complete();

		if ($res_publisher && $res_person) {
			//$this->db->trans_rollback();
			$newdata = array('ed_publisher'  => 'y');
			$this->session->set_userdata($newdata);
		} else {
			//$this->db->trans_commit();
			$newdata = array('ed_publisher'  => 'n');
			$this->session->set_userdata($newdata);
		}
		
		redirect('jarida/publishers');
	}

	public function permission()
	{
		$data = array(
			'permission_name' => $_POST['permission_name'],
			'permission_desc' => $_POST['permission_desc'],
			'edited_on' => $_POST['edited_on']
			);

		$this->db->where('permission_id', $_POST['permission_id']);
		$res = $this->db->update('permissions', $data);
		if ($res) {
			$newdata = array('ed_perm'  => 'y');
			$this->session->set_userdata($newdata);
		} else {
			$newdata = array('ed_perm'  => 'n');
			$this->session->set_userdata($newdata);
		}
		redirect('jarida/permissions');
	}

	public function role()
	{
		$data = array(
			'role_name' => $_POST['role_name'],
			'role_desc' => $_POST['role_desc'],
			'edited_on' => $_POST['edited_on']
			);
		$this->db->where('role_id', $_POST['role_id']);
		$res = $this->db->update('roles', $data);
		if ($res) {
			if (empty($_POST['permission'])) {
				$resl = $this->db->delete('role_permissions', array('role_id' => $_POST['role_id']));
				if($resl) {
					$newdata = array('edit_role'  => 'y');
					$this->session->set_userdata($newdata);
				} else {
					$newdata = array('edit_role'  => 'n');
					$this->session->set_userdata($newdata);
				}
				
			} else {
				$resl = $this->db->delete('role_permissions', array('role_id' => $_POST['role_id']));
				foreach($_POST['permission'] as $permission_id)
				{
					$rolePermission = array('role_id' => $_POST['role_id'], 'permission_id' => $permission_id);
			    	$add_rps = $this->db->insert('role_permissions', $rolePermission);
			    	if ($add_rps) {
						$newdata = array('edit_role'  => 'y');
						$this->session->set_userdata($newdata);
					} else {
						$newdata = array('edit_role'  => 'n');
						$this->session->set_userdata($newdata);
					}
				}
			}

		} else {
			$newdata = array('edit_role'  => 'n');
			$this->session->set_userdata($newdata);
		}
		redirect('jarida/roles');
	}

	public function userGroup()
	{
		$group_data = array(
			'group_name' => $_POST['group_name'],
			'group_desc' => $_POST['group_desc'],
			'edited_on' => $_POST['edited_on']
			);
		$this->db->where('group_id', $_POST['group_id']);
		$result = $this->db->update('groups', $group_data);		
		if ($result) {
			if (empty($_POST['role'])) {
				$resl = $this->db->delete('group_role', array('group_id' => $_POST['group_id']));
				if($resl) {
					$newdata = array('edit_group'  => 'y');
					$this->session->set_userdata($newdata);
				} else {
					$newdata = array('edit_group'  => 'n');
					$this->session->set_userdata($newdata);
				}
				
			}
			else {
				$resl = $this->db->delete('group_role', array('group_id' => $_POST['group_id']));
				foreach($_POST['role'] as $role_id)
				{
					$groupRole = array('group_id' => $_POST['group_id'], 'role_id' => $role_id);
			    	$add_grs = $this->db->insert('group_role', $groupRole);
			    	if ($add_grs) {
						$newdata = array('edit_group'  => 'y');
						$this->session->set_userdata($newdata);
					} else {
						$newdata = array('edit_group'  => 'n');
						$this->session->set_userdata($newdata);
					}
				}
			}
			
		} else {
			$newdata = array('edit_group'  => 'n');
			$this->session->set_userdata($newdata);
		}
		
		redirect('jarida/userGroups');
	}

	public function user()
	{
		$edited_on = date('Y-m-d');
		$user_data = array(
			'salutation_id' => $_POST['salutation_id'],
			'surname' => $_POST['surname'],
			'other_names' => $_POST['other_names'],
			'phone_number' => $_POST['phone_number'],
			'email' => $_POST['email'],
			'sex_id' => $_POST['sex_id'],
			'nationality_id' => $_POST['nationality_id'],
			'city' => $_POST['city'],
			'residence' => $_POST['residence'],
			'username' => $_POST['username'],
			'edited_on' => $edited_on,
			'status_id' => $_POST['status_id']
			);
		$this->db->where('user_id', $_POST['user_id']);
		$result = $this->db->update('users', $user_data);

		if ($result) {
			if (empty($_POST['group'])) {
				$resl = $this->db->delete('users_groups', array('user_id' => $_POST['user_id']));
				if($resl) {
					$newdata = array('edit_group'  => 'y');
					$this->session->set_userdata($newdata);
				} else {
					$newdata = array('edit_group'  => 'n');
					$this->session->set_userdata($newdata);
				}
				
			}
			else {
				$resl = $this->db->delete('users_groups', array('user_id' => $_POST['user_id']));
				foreach($_POST['group'] as $group_id)
				{
					$userGroup = array('user_id' => $_POST['user_id'], 'group_id' => $group_id);
			    	$add_ugs = $this->db->insert('users_groups', $userGroup);
			    	if ($add_ugs) {
						$newdata = array('edit_user'  => 'y');
						$this->session->set_userdata($newdata);
					} else {
						$newdata = array('edit_user'  => 'n');
						$this->session->set_userdata($newdata);
					}
				}
			}
			
		} else {
			$newdata = array('edit_user'  => 'n');
			$this->session->set_userdata($newdata);
		}
		
		redirect('jarida/users');

	}
	public function updatePassword(){
		$query = $this->db->get_where('users', array('user_id' => $this->session->userdata('user_id'), 'password' => sha1($_POST['password'])));
		if($query->num_rows() == 1){
			$edited_on = date('Y-m-d');
			$user_data = array(
				'password' => sha1($_POST['new_password']),
				);
			$this->db->where('user_id', $this->session->userdata('user_id'));
			$result = $this->db->update('users', $user_data);
			if ($result) {
				$newdata = array('change_p'  => 'y');
				$this->session->set_userdata($newdata);
			} else {
				$newdata = array('change_p'  => 'n');
				$this->session->set_userdata($newdata);
			}
		} else {
			$newdata = array('change_p'  => 't');
			$this->session->set_userdata($newdata);
		}
		redirect('jarida/myProfile');
	}

	public function firstLoginUpdate()
	{
		$query = $this->db->get_where('users', array('user_id' => $this->session->userdata('user_id'), 'password' => sha1($_POST['password'])));
		if($query->num_rows() == 1){
			$edited_on = date('Y-m-d');
			$user_data = array(
				'password' => sha1($_POST['new_password']),
				);
			$this->db->where('user_id', $this->session->userdata('user_id'));
			$result = $this->db->update('users', $user_data);
			if ($result) {
				$this->session->unset_userdata('mep');
				$newdata = array('fl'  => 'y');
				$this->session->set_userdata($newdata);
			} else {
				$newdata = array('fl'  => 'n');
				$this->session->set_userdata($newdata);
			}
		} else {
			$newdata = array('fl'  => 't');
			$this->session->set_userdata($newdata);
		}
		redirect('jarida/dashboard');
	}

	public function notice(){
		$notice_date = array(
			'notice_title' => $_POST['notice_title'],
			'notice_details' => $_POST['notice_details'],
			'due_date' => $_POST['date_due'],
			'due_time' => $_POST['due_time'],
			'edited_by' => $_POST['edited_by'],
			'edited_on' => date('Y-m-d')
			);
		$this->db->where('notice_id', $_POST['notice_id']);
		$result = $this->db->update('noticeboard', $notice_date);
			if ($result) {
				$newdata = array('edit_notice'  => 'y');
				$this->session->set_userdata($newdata);
			} else {
				$newdata = array('edit_notice'  => 'n');
				$this->session->set_userdata($newdata);
			}
			redirect('jarida/noticeboard');
			
	}

	public function magCategory(){
		$category_details = array(
			'category' => $_POST['category'],
			'edited_by' => $_POST['edited_by'],
			'edited_on' => date('Y-m-d')
			);
		$this->db->where('category_id', $_POST['category_id']);
		$result = $this->db->update('category', $category_details);
			if ($result) {
				$newdata = array('edit_category'  => 'y');
				$this->session->set_userdata($newdata);
			} else {
				$newdata = array('edit_category'  => 'n');
				$this->session->set_userdata($newdata);
			}
			redirect('jarida/magCategory');
			
	}

	public function magazine()
	{
		$mag_details = array(
			'category_id' => $_POST['category_id'],
			'magazine_name' => $_POST['magazine_name'],
			'magazine_desc' => $_POST['magazine_desc'],
			'edited_by' => $_POST['edited_by'],
			'edited_on' => date('Y-m-d'),
			);
		$this->db->where('magazine_id', $_POST['magazine_id']);
		$result = $this->db->update('magazine', $mag_details);
			if ($result) {
				$newdata = array('edit_mag'  => 'y');
				$this->session->set_userdata($newdata);
			} else {
				$newdata = array('edit_mag'  => 'n');
				$this->session->set_userdata($newdata);
			}
			redirect('jarida/magazines');
	}

	public function updateTag()
	{
		$tag_data = array(
		'tag_name' => $this->input->post('tag_name'),
		'edited_by' => $this->session->userdata('user_id'),
		'edited_on' => date('Y-m-d')
		);
		$this->load->model('dbupdate');
		$res_update = $this->dbupdate->updateData('tag', 'tag_id', $this->input->post('tag_id'), $tag_data);
		if ($res_update) {
			$newdata = array('edit_tag'  => 'y');
			$this->session->set_userdata($newdata);
		} else {
			$newdata = array('edit_tag'  => 'n');
			$this->session->set_userdata($newdata);
		}
		redirect('jarida/magTag');
		
	}


	public function updateIssue()
	{
		$data = array(
			'headline' => $_POST['headline'],
			'description' => $_POST['description'],
			'price' => $_POST['price'],
			'tag_id' => $_POST['tag_id'],
			'edited_by' => $this->session->userdata('user_id'),
			'edited_on' => date('Y-m-d')
			);

		$this->db->where('issue_id', $_POST['issue_id']);
		$res = $this->db->update('mag_issues', $data);
		if ($res) {
			$newdata = array('edit_issue'  => 'y');
			$this->session->set_userdata($newdata);
		} else {
			$newdata = array('edit_issue'  => 'n');
			$this->session->set_userdata($newdata);
		}
		redirect('jarida/issues');
	}

}