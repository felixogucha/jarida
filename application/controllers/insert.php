<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Insert extends CI_Controller {

	public function addSalutation() {

		$result = $this->db->insert('salutation', $_POST);
		if ($result) {
			$newdata = array('add_sal'  => 'y');
			$this->session->set_userdata($newdata);
		} else {
			$newdata = array('add_sal'  => 'n');
			$this->session->set_userdata($newdata);
		}
		
		redirect('jarida/salutation');
	}

	public function addPublisher() {

		//publisher
		$publisher = array('publisher_name' => $_POST['publisher_name'],
			'email_address' => $_POST['publisher_email'],
			'phone_number' => $_POST['publisher_phone'],
			'box_number' => $_POST['box_number'],
			'postal_code' => $_POST['postal_code'],
			'physical_location' => $_POST['physical_location'],
			'status_id' => $_POST['status_id'],
			'contact_person' => $_POST['contact_person']
		 );

		$result = $this->db->insert('publisher', $publisher);
		if ($result)
		{
			$this->load->model('select');
			$publisher_id = $this->select->getPublisherId($_POST['publisher_email'], $_POST['publisher_phone']);

			$this->db->where('user_id', $_POST['contact_person']);
			$update_user = $this->db->update('users', array('publisher_id' => $publisher_id));

			$newdata = array('add_publisher'  => 'y');
			$this->session->set_userdata($newdata);
		}
		else
		{
		    $newdata = array('add_publisher'  => 'n');
			$this->session->set_userdata($newdata);
		}
		redirect('jarida/publishers');

	}

	public function createPermission(){
		$result = $this->db->insert('permissions', $_POST);
		if ($result) {
			$newdata = array('add_perm'  => 'y');
			$this->session->set_userdata($newdata);
		} else {
			$newdata = array('add_perm'  => 'n');
			$this->session->set_userdata($newdata);
		}
		
		redirect('jarida/permissions');
	}

	public function addStatus() {
		$result = $this->db->insert('status', $_POST);
		if ($result) {
			$newdata = array('add_status'  => 'y');
			$this->session->set_userdata($newdata);
		} else {
			$newdata = array('add_status'  => 'n');
			$this->session->set_userdata($newdata);
		}
		
		redirect('jarida/status');
	}

	public function createRole(){
		$role_data = array(
			'role_name' => $_POST['role_name'],
			'role_desc' => $_POST['role_desc'],
			'added_on' => $_POST['added_on']
			);
		$result = $this->db->insert('roles', $role_data);
		if ($result) {
			if (!empty($_POST['permission'])) {
				$this->load->model('select');
				$role_id = $this->select->getRoleId($_POST['role_name'], $_POST['role_desc'], $_POST['added_on']);

				foreach($_POST['permission'] as $permission_id)
				{
					$rolePermission = array('role_id' => $role_id, 'permission_id' => $permission_id);
			    	$add_rps = $this->db->replace('role_permissions', $rolePermission);
			    	if ($add_rps) {
						$newdata = array('add_role'  => 'y');
						$this->session->set_userdata($newdata);
					} else {
						$newdata = array('add_role'  => 'n');
						$this->session->set_userdata($newdata);
					}
				}
				
			} else {
				$newdata = array('add_role'  => 'y');
				$this->session->set_userdata($newdata);
			}
			
		} else {
			$newdata = array('add_role'  => 'n');
			$this->session->set_userdata($newdata);
		}
		
		redirect('jarida/roles');
	}

	public function createUserGroups()
	{
		$group_data = array(
			'group_name' => $_POST['group_name'],
			'group_desc' => $_POST['group_desc'],
			'added_on' => date('Y-m-d')
			);
		$result = $this->db->insert('groups', $group_data);
		if ($result) {
			if (!empty($_POST['role'])) {
				$this->load->model('select');
				$group_id = $this->select->getGroupId($_POST['group_name'], $_POST['group_desc'], $_POST['added_on']);

				foreach($_POST['role'] as $role_id)
				{
					$groupRole = array('group_id' => $group_id, 'role_id' => $role_id);
			    	$add_grs = $this->db->insert('group_role', $groupRole);
			    	if ($add_grs) {
						$newdata = array('add_group'  => 'y');
						$this->session->set_userdata($newdata);
					}
				}
				
			} else {
				$newdata = array('add_group'  => 'y');
				$this->session->set_userdata($newdata);
			}
			
		} else {
			$newdata = array('add_group'  => 'n');
			$this->session->set_userdata($newdata);
		}
		
		redirect('jarida/userGroups');
	}

	public function createUser()
	{
		$added_on = date('Y-m-d');
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
			'password' => sha1($_POST['password']),
			'added_on' => $added_on,
			'status_id' => $_POST['status_id']
			);
		$result = $this->db->insert('users', $user_data);
		if ($result) {
			if (!empty($_POST['group'])) {
				$this->load->model('select');
				$user_id = $this->select->getUserId($_POST['phone_number'], $_POST['surname'], $_POST['other_names'], $added_on);

				foreach($_POST['group'] as $group_id)
				{
					$userGroup = array('user_id' => $user_id, 'group_id' => $group_id);
			    	$add_ugs = $this->db->insert('users_groups', $userGroup);
			    	if ($add_ugs) {
						$newdata = array('add_user'  => 'y');
						$this->session->set_userdata($newdata);
					}
				}
				
			} else {
				$newdata = array('add_user'  => 'y');
				$this->session->set_userdata($newdata);
			}
		} else {
			$newdata = array('add_user'  => 'n');
			$this->session->set_userdata($newdata);
		}
		
		redirect('jarida/users');

	}

	public function notice(){
		$notice_date = array(
			'notice_title' => $_POST['notice_title'],
			'notice_details' => $_POST['notice_details'],
			'due_date' => $_POST['date_due'],
			'due_time' => $_POST['time_due'],
			'added_by' => $_POST['added_by'],
			'added_on' => date('Y-m-d')
			);
		$result = $this->db->insert('noticeboard', $notice_date);
		if ($result) {
			$newdata = array('add_notice'  => 'y');
			$this->session->set_userdata($newdata);
		} else {
			$newdata = array('add_notice'  => 'n');
			$this->session->set_userdata($newdata);
		}
		
		redirect('jarida/noticeboard');
	}

	public function addMagazineCategory(){
		$category_details = array(
			'category' => $_POST['category'],
			'added_by' => $_POST['added_by'],
			'added_on' =>  date('Y-m-d')
			);
		$result = $this->db->insert('category', $category_details);
		if ($result) {
			$newdata = array('add_category'  => 'y');
			$this->session->set_userdata($newdata);
		} else {
			$newdata = array('add_category'  => 'n');
			$this->session->set_userdata($newdata);
		}
		
		redirect('jarida/magCategory');
	}

	public function addMagazine(){
		$mag_details = array(
			'category_id' => $_POST['category_id'],
			'magazine_name' => $_POST['magazine_name'],
			'magazine_desc' => $_POST['magazine_desc'],
			'added_by' => $_POST['added_by'],
			'publisher_id' => $_POST['publisher_id'],
			'status_id' => '2',
			'added_on' => date('Y-m-d')
			);
		
		$result = $this->db->insert('magazine', $mag_details);
		if ($result) {
			$newdata = array('add_mag'  => 'y');
			$this->session->set_userdata($newdata);
		} else {
			$newdata = array('add_mag'  => 'n');
			$this->session->set_userdata($newdata);
		}
		
		redirect('jarida/magazines');
	}

	public function upload()
	{
		$mag_issue['upload_path'] = './mag_issues';
		$mag_issue['allowed_types'] = 'pdf|doc|docx';
		$mag_issue['max_size'] = '0';
		//$mag_issue['file_name'] = $magazine_name.'_'.$this->input->post('issue_no');

		$this->load->library('upload', $mag_issue);
		$upload = $this->upload->do_upload('issue_url');
		$file_data = $this->upload->data();
		$file_url = $file_data['file_name'];
		echo $file_url;
		print_r($file_data);
	}

	public function addIssue()
	{
		//echo $this->input->post('magazine_id');
		$this->load->model('select');
		$magazine = $this->select->getSpecific('magazine', 'magazine_id', $this->input->post('magazine_id'));
		if (!is_null($magazine)) {
			$magazine_name = $magazine->magazine_name;
			$mag_issue['upload_path'] = './mag_issues';
			$mag_issue['allowed_types'] = 'pdf|doc|docx';
			$mag_issue['max_size'] = '0';
			$mag_issue['file_name'] = $magazine_name.'_'.$this->input->post('issue_no');

			$this->load->library('upload', $mag_issue);
			$upload = $this->upload->do_upload('issue_url');
			$file_data = $this->upload->data();
			$file_url = $file_data['file_name'];
			$issue_url = base_url().'mag_issues/'.$file_url;
			if (isset($issue_url)) {
				$issue_data = array(
					'magazine_id' => $this->input->post('magazine_id'),
					'issue_no' => $this->input->post('issue_no'),
					'headline' => $this->input->post('headline'),
					'description' => $this->input->post('description'),
					'price' => $this->input->post('price'),
					'admin_publish_status' => '0',
					'price' => $this->input->post('price'),
					'price' => $this->input->post('price'),
					'tag_id' => $this->input->post('tag_id'),
					'file_name' => $file_url,
					'issue_url' => $issue_url,
					'created_on' => $this->input->post('created_on'),
					'added_by' => $this->session->userdata('user_id'),
					'added_on' => date('Y-m-d'),
					'status_id' => '2'
					);
				$this->load->model('insert_model');
				$insert = $this->insert_model->dbInsert('mag_issues', $issue_data);
				if ($insert) {
					$newdata = array('add_issue'  => 'y');
					$this->session->set_userdata($newdata);
					redirect('jarida/issues');
				} else {
					$newdata = array('add_issue'  => 'n');
					$this->session->set_userdata($newdata);
					redirect('jarida/issues');
					//echo $insert;
				}
			}
			else {
				$newdata = array('add_issue'  => 'n');
				$this->session->set_userdata($newdata);
				redirect('jarida/issues');
				//echo $issue_url;
			}
		} else {
			$newdata = array('add_issue'  => 'n');
			$this->session->set_userdata($newdata);
			redirect('jarida/issues');
			//echo 'mag_id'. $magazine;
		}
		
	}

	public function addMagazineTag()
	{
		$tag = array(
			'tag_name' => $this->input->post('tag_name'),
			'added_by' => $this->session->userdata('user_id'),
			'added_on' => date('Y-m-d')
			);
		$this->load->model('insert_model');
		$insert = $this->insert_model->dbInsert('tag', $tag);
		if ($insert) {
			$newdata = array('add_tag'  => 'y');
			$this->session->set_userdata($newdata);
		} else {
			$newdata = array('add_tag'  => 'n');
			$this->session->set_userdata($newdata);
		}
		redirect('jarida/magTag');
	}


}