<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jarida extends CI_Controller {
	var $app_title;

	 public function Jarida()
       {
            parent::__construct();
            $this->app_title['title_message'] = 'Jarida Information Management System';
       }

	public function index()
	{
		//redirect('jarida/dashboard');
		$this->session->sess_destroy();
		$data['main_content'] = 'login';
		$data['title'] = "login | ".$this->app_title['title_message'];
		$data['name'] = "login";
		$this->load->view('login', $data);
	}

	public function api()
	{
		$this->load->view('jarida_apis');
	}

	public function firstLogin()
	{
		$this->load->model('select');
		$data['my_details'] = $this->select->myProfile();
		$data['title'] = "my profile | ".$this->app_title['title_message'];
		$data['name'] = "my profile";
		$this->load->view('first_login', $data);
	}

	public function login()
	{
		$this->session->sess_destroy();
		$data['main_content'] = 'login';
		$data['title'] = "login | ".$this->app_title['title_message'];
		$data['name'] = "login";
		$this->load->view('login', $data);
	}

	public function dashboard()
	{
		$this->load->model('select');
		$data['all_notices'] = $this->select->getAll('noticeboard');
		$data['main_content'] = 'dashboard';
		$data['title'] = "dashboard | ".$this->app_title['title_message'];
		$data['name'] = "jarida";
		$this->load->view('includes/template', $data);
	}

	public function publishers()
	{
		$this->load->model('select');
		$data['all_publishers'] = $this->select->getAll('view_publishers');
		$data['all_users'] = $this->select->getAll('viewallusers');
		$data['all_status'] = $this->select->getAll('status');
		$data['main_content'] = 'publishers';
		$data['title'] = "publishers | ".$this->app_title['title_message'];
		$data['name'] = "publishers";
		$this->load->view('includes/template', $data);
	}

	public function editPublisher(){
		$this->load->model('select');
		$data['all_publishers'] = $this->select->getAll('view_publishers');
		$data['all_salutations'] = $this->select->getAll('salutation');
		$data['all_status'] = $this->select->getAll('status');
		$data['all_users'] = $this->select->getAll('viewallusers');
		$data['main_content'] = 'edit/publishers';
		$data['title'] = "publishers | ".$this->app_title['title_message'];
		$data['name'] = "publishers";
		$this->load->view('includes/template', $data);
	}

	public function deletePublisher() {
		$delete_publisher = $this->db->delete('publisher', array('publisher_id' => $this->input->get('key')));
		if($delete_publisher) {
			$newdata = array('del_publisher'  => 'y');
			$this->session->set_userdata($newdata);
		} else {
			$newdata = array('del_publisher'  => 'n');
			$this->session->set_userdata($newdata);
		}
		redirect('jarida/publishers');
	}

	public function magazines()
	{
		$this->load->model('select');
		$data['all_categories'] = $this->select->getAll('category');
		$data['all_publishers'] = $this->select->getAll('view_publishers');
		$data['all_status'] = $this->select->getAll('mag_status');
		$data['all_magazines'] = $this->select->getAllSpecific('viewmagazines', 'user_id', $this->session->userdata('user_id'));
		$data['main_content'] = 'magazines';
		$data['title'] = "magazine | ".$this->app_title['title_message'];
		$data['name'] = "magazine";
		$this->load->view('includes/template', $data);
	}

	public function editMagazine(){
		$this->load->model('select');
		$data['all_categories'] = $this->select->getAll('category');
		$data['all_publishers'] = $this->select->getAll('view_publishers');
		$data['all_status'] = $this->select->getAll('mag_status');
		$data['all_magazines'] = $this->select->getAllSpecific('viewmagazines', 'user_id', $this->session->userdata('user_id'));
		$data['main_content'] = 'edit/magazines';
		$data['title'] = "magazine | ".$this->app_title['title_message'];
		$data['name'] = "magazine";
		$this->load->view('includes/template', $data);
	}

	public function unpublishMagazine()
	{
		$this->load->model('select');
		$res = $this->select->getSpecific('mag_status', 'status', 'un published');
		$status_id = $res->status_id;

		$mag_details = array(
			'status_id' => $status_id,
			'suppressed_by' => $this->session->userdata('user_id'),
			'suppressed_on' => date('Y-m-d')
			);

		$this->db->where('magazine_id', $_GET['key']);
		$result = $this->db->update('magazine', $mag_details);
			if ($result) {
				$rs = true;
				$all_issues = $this->select->getIssuesInAMagazine($_GET['key']);
				if (!is_null($all_issues)) {
					foreach ($all_issues as $al_issues) {
						if ($al_issues->status_id != $status_id) {
							$issue_details = array(
							'status_id' => $status_id,
							'date_suppressed' => date('Y-m-d'),
							'issue_suppressed_by' => $this->session->userdata('user_id')
							);
						$this->db->where('issue_id', $al_issues->issue_id);
						$result = $this->db->update('mag_issues', $issue_details);
						if (!$result) {
							$rs = false;
						}
						}
					}
				}
				if ($rs) {
					$newdata = array('publish_mag'  => 'y');
					$this->session->set_userdata($newdata);
				} else {
					$newdata = array('publish_mag'  => 'n');
					$this->session->set_userdata($newdata);
				}
			} else {
				$newdata = array('publish_mag'  => 'n');
				$this->session->set_userdata($newdata);
			}
			redirect('jarida/magazines');
	}

	public function publishMagazine()
	{
		$this->load->model('select');
		$res = $this->select->getSpecific('mag_status', 'status', 'published');
		$status_id = $res->status_id;

		$mag_details = array(
			'status_id' => $status_id,
			'published_on' => date('Y-m-d'),
			'published_by' => $this->session->userdata('user_id')
			);

		$this->db->where('magazine_id', $_GET['key']);
		$result = $this->db->update('magazine', $mag_details);
			if ($result) {
				$newdata = array('publish_mag'  => 'y');
				$this->session->set_userdata($newdata);
			} else {
				$newdata = array('publish_mag'  => 'n');
				$this->session->set_userdata($newdata);
			}
			redirect('jarida/magazines');
	}

	public function deleteMagazine()
	{
		$res = $this->db->delete('magazine', array('magazine_id' => $_GET['key']));
		if($res) {
			$newdata = array('del_mag'  => 'y');
			$this->session->set_userdata($newdata);
		} else {
			$newdata = array('del_mag'  => 'n');
			$this->session->set_userdata($newdata);
		}
		redirect('jarida/magazines');
	}

	public function magTag()
	{
		$this->load->model('select');
		$data['all_tags'] = $this->select->getAll('tag');
		$data['main_content'] = 'mag_tag';
		$data['title'] = "magazine tag | ".$this->app_title['title_message'];
		$data['name'] = "magazine tag";
		$this->load->view('includes/template', $data);
	}

	public function editMagTag()
	{
		$this->load->model('select');
		$data['all_tags'] = $this->select->getAll('tag');
		$data['main_content'] = 'edit/mag_tag';
		$data['title'] = "magazine tag | ".$this->app_title['title_message'];
		$data['name'] = "magazine tag";
		$this->load->view('includes/template', $data);
	}

	public function deleteMagTag()
	{
		$this->load->model('dbdelete');
		$res = $this->dbdelete->deleteFrom('tag', 'tag_id', $this->input->get('key'));
		if($res) {
			$newdata = array('del_tag'  => 'y');
			$this->session->set_userdata($newdata);
		} else {
			$newdata = array('del_tag'  => 'n');
			$this->session->set_userdata($newdata);
		}
		redirect('jarida/magTag');
	}

	public function magCategory()
	{
		$this->load->model('select');
		$data['all_categories'] = $this->select->getAll('category');
		$data['main_content'] = 'mag_category';
		$data['title'] = "magazine categories | ".$this->app_title['title_message'];
		$data['name'] = "magazine categories";
		$this->load->view('includes/template', $data);
	}

	public function editMagCategory()
	{
		$this->load->model('select');
		$data['all_categories'] = $this->select->getAll('category');
		$data['main_content'] = 'edit/mag_category';
		$data['title'] = "magazine categories | ".$this->app_title['title_message'];
		$data['name'] = "magazine categories";
		$this->load->view('includes/template', $data);
	}

	public function deleteMagCategory()
	{
		$res = $this->db->delete('category', array('category_id' => $_GET['key']));
		if($res) {
			$newdata = array('del_category'  => 'y');
			$this->session->set_userdata($newdata);
		} else {
			$newdata = array('del_category'  => 'n');
			$this->session->set_userdata($newdata);
		}
		redirect('jarida/magCategory');
	}

	public function upload() {		
		$data['main_content'] = 'upload';
		$data['title'] = "upload | ".$this->app_title['title_message'];
		$data['name'] = "upload";
		$this->load->view('includes/template', $data);
	}

	public function getAllMagazines()
	{
		$this->load->model('select');
		$res = $this->select->getAllMagazines();
		//print_r($res);
	}

	public function issues()
	{
		$this->load->model('select');
		$data['image_name'] = '';
		$data['all_magazines'] = $this->select->getAllSpecific('viewmagazines', 'user_id', $this->session->userdata('user_id'));
		$data['all_tags'] = $this->select->getAll('tag');
		$data['all_issues'] = $this->select->getAll('viewallissues');
		$data['main_content'] = 'issues';
		$data['title'] = "magazine issues | ".$this->app_title['title_message'];
		$data['name'] = "issues";
		$this->load->view('includes/template', $data);
	}

	public function editMagIssue()
	{
		$this->load->model('select');
		$data['image_name'] = '';
		$data['all_magazines'] = $this->select->getAllSpecific('viewmagazines', 'user_id', $this->session->userdata('user_id'));
		$data['all_tags'] = $this->select->getAll('tag');
		$data['all_issues'] = $this->select->getAll('viewallissues');
		$data['main_content'] = 'edit/issues';
		$data['title'] = "magazine issues | ".$this->app_title['title_message'];
		$data['name'] = "issues";
		$this->load->view('includes/template', $data);
	}

	public function publishIssue()
	{

	$this->load->model('select');
	$magazine = $this->select->getSpecific('mag_issues', 'issue_id', $this->input->get('key'));
		if ($magazine) {
			$file_name = $magazine->file_name;
			$magazine_id = $magazine->magazine_id;
			$gen_issuepages = $this->generateIssueImages($file_name, $this->input->get('key'), $magazine_id);
			if ($gen_issuepages) {
				$update_info = array(
					'status_id' => '1',
					'issue_published_by' => $this->session->userdata('user_id'),
					'published_on' => date('Y-m-d')
					);
				$this->load->model('dbupdate');
				$update = $this->dbupdate->updateData('mag_issues', 'issue_id', $this->input->get('key'), $update_info);
				if ($update) {
					if ($this->input->get('ajax')) {
						echo 'y';
					} else {
						$newdata = array('publish_iss'  => 'y');
						$this->session->set_userdata($newdata);
						redirect('jarida/issues');
					}
				} else {
					if ($this->input->get('ajax')) {
						echo 'n';
					} else {
						$newdata = array('publish_iss'  => 'n');
						$this->session->set_userdata($newdata);
						redirect('jarida/issues');
					}
				}
			} else {
				if ($this->input->get('ajax')) {
					echo 't';
				} else {
					$newdata = array('publish_iss'  => 't');
					$this->session->set_userdata($newdata);
					redirect('jarida/issues');
				}
			}
			
		}
		
	}

	public function generateIssueImages($file_name, $issue_id, $magazine_id){
		$ret = true;
		$result = $this->generateImages($file_name, $issue_id);
		if (!is_null($result)) {
			$i = '1';
			foreach ($result as $key => $value) {
				$exp = explode('-', $value);
				$path = $exp[0];
				$image_url = base_url().'mag_issues/'.$path.'/'.$value;
				if ($i == 1) {
					$this->db->where('issue_id', $issue_id);
					$res = $this->db->update('mag_issues', array('title_image' => $image_url));
					if (!$res) {
						$ret = false;
						exit;
					} else {
						$this->db->where('magazine_id', $magazine_id);
						$update_mag = $this->db->update('magazine', array('image' => $image_url));
						if (!$update_mag) {
							$ret = false;
							exit;
						}
					}
				}
				$this->load->model('insert_model');
				$insert = $this->insert_model->dbInsert('issue_pages', array('no_image' => $image_url, 'page_no' => $i, 'issue_id' => $this->input->get('key')));
				if (!$insert) {
					$ret = false;
				}
				$i++;
			}
		}
		else {
			$ret = false;
		}
		return $ret;
	}

	public function unpublishIssue()
	{
		//delete its issue_pages from database
		$ret = true;
		$this->load->model('dbdelete');
		$delete_issue_pages = $this->dbdelete->deleteFrom('issue_pages', 'issue_id', $this->input->get('key'));
		$magazine_id = '';
		if ($delete_issue_pages) {
			//delete its issue pages from hdd
			$this->load->model('select');
			$issue_details = $this->select->getSpecific('mag_issues', 'issue_id', $this->input->get('key'));
			if ($issue_details) {
				$magazine_id = $issue_details->magazine_id;
				$file_name = $issue_details->file_name;
				$exp = explode('.', $file_name);
				$dir = realpath(base_url().'mag_issues').'./mag_issues/'.$exp[0];
				$this->rmdir_recursive($dir);

				//updating magazine issue details
				$update_info = array(
					'status_id' => '2',
					'issue_suppressed_by' => $this->session->userdata('user_id'),
					'suppressed_on' => date('Y-m-d'),
					'title_image' => ''
					);
				$this->load->model('dbupdate');
				$update = $this->dbupdate->updateData('mag_issues', 'issue_id', $this->input->get('key'), $update_info);
				if ($update) {
					$sql = "SELECT * FROM mag_issues WHERE title_image != '' and magazine_id = '".$magazine_id."';";
					$query = $this->db->query($sql);
					$data = array();
					if($query->num_rows() > 0){
						foreach ($query->result() as $rows) {
							$data[] = $rows->title_image;
						}
						$title_image = end($data);
						$this->db->where('magazine_id', $magazine_id);
						$update_mag = $this->db->update('magazine', array('image' => $title_image));
					} else {
						$this->db->where('magazine_id', $magazine_id);
						$update_mag = $this->db->update('magazine', array('image' => ''));
					}
				} else {
					$ret = false;;
				}
				
			}
			else  {
				$ret = false;
			}
		} else {
			$ret = false;
		}

		if ($ret) {
			$newdata = array('unpublish_iss'  => 'y');
			$this->session->set_userdata($newdata);
		} else {
			$newdata = array('unpublish_iss'  => 'n');
			$this->session->set_userdata($newdata);
		}
		redirect('jarida/issues');
	}

	public function deleteMagIssue()
	{
		$this->load->model('select');
		$issue_details = $this->select->getSpecific('mag_issues', 'issue_id', $this->input->get('key'));
		$magazine_id = '';
		if ($issue_details) {
			$file_name = $issue_details->file_name;
			$magazine_id = $issue_details->magazine_id;
			$exp = explode('.', $file_name);
			$dir = realpath(base_url().'mag_issues').'./mag_issues/'.$exp[0];
			$this->rmdir_recursive($dir);

			$this->load->model('dbdelete');
			$delete_issue_pages = $this->dbdelete->deleteFrom('issue_pages', 'issue_id', $this->input->get('key'));
			if ($delete_issue_pages) {
				//$this->load->model('dbdelete');
				$res = $this->dbdelete->deleteFrom('mag_issues', 'issue_id', $this->input->get('key'));
				if($res) {
					$sql = "SELECT * FROM mag_issues WHERE title_image != '' and magazine_id = '".$magazine_id."';";
					$query = $this->db->query($sql);
					$data = array();
					if($query->num_rows() > 0){
						foreach ($query->result() as $rows) {
							$data[] = $rows->title_image;
						}
						$title_image = end($data);
						$this->db->where('magazine_id', $magazine_id);
						$update_mag = $this->db->update('magazine', array('image' => $title_image));
						
						$newdata = array('del_issue'  => 'y');
						$this->session->set_userdata($newdata);
					} else {
						$this->db->where('magazine_id', $magazine_id);
						$update_mag = $this->db->update('magazine', array('image' => ''));

						$newdata = array('del_issue'  => 'y');
						$this->session->set_userdata($newdata);
					}
				} else {
					$newdata = array('del_issue'  => 'n');
					$this->session->set_userdata($newdata);
				}
			} else {
				$newdata = array('del_issue'  => 'n');
				$this->session->set_userdata($newdata);
			}
		} else {
			$this->load->model('dbdelete');
			$delete_issue_pages = $this->dbdelete->deleteFrom('issue_pages', 'issue_id', $this->input->get('key'));
			if ($delete_issue_pages) {
				$newdata = array('del_issue'  => 'y');
				$this->session->set_userdata($newdata);
			} else {
				$newdata = array('del_issue'  => 'n');
				$this->session->set_userdata($newdata);
			}
		}
		redirect('jarida/issues');
	}

	public function myProfile(){
		$this->load->model('select');
		$data['my_details'] = $this->select->myProfile();
		//$data['my_permissions'] = $this->select->getAll('view_publishers');
		$data['main_content'] = 'my_profile';
		$data['title'] = "my profile | ".$this->app_title['title_message'];
		$data['name'] = "my profile";
		$this->load->view('includes/template', $data);
	}

	public function systemDetails(){
		$data['main_content'] = 'sys_details';
		$data['title'] = "system settings | ".$this->app_title['title_message'];
		$data['name'] = "system settings";
		$this->load->view('includes/template', $data);
	}

	public function status(){
		$this->load->model('select');
		$data['all_status'] = $this->select->getAll('status');
		$data['main_content'] = 'status';
		$data['title'] = "system settings | ".$this->app_title['title_message'];
		$data['name'] = "system settings";
		$this->load->view('includes/template', $data);
	}

	public function permissions(){
		$this->load->model('select');
		$data['all_permissions'] = $this->select->getAll('permissions');
		$data['main_content'] = 'permissons';
		$data['title'] = "user permissons | ".$this->app_title['title_message'];
		$data['name'] = "user permissons";
		$this->load->view('includes/template', $data);
	}

	public function editPermissions(){
		$this->load->model('select');
		$data['all_permissions'] = $this->select->getAll('permissions');
		$data['main_content'] = 'edit/permissons';
		$data['title'] = "user permissons | ".$this->app_title['title_message'];
		$data['name'] = "user permissons";
		$this->load->view('includes/template', $data);
	}

	public function deletePermission()
	{
		$res = $this->db->delete('permissions', array('permission_id' => $_GET['key']));
		if($res) {
			$newdata = array('del_perm'  => 'y');
			$this->session->set_userdata($newdata);
		} else {
			$newdata = array('del_perm'  => 'n');
			$this->session->set_userdata($newdata);
		}
		redirect('jarida/permissions');
	}

	public function roles() {
		$this->load->model('select');
		$data['all_permissions'] = $this->select->getAll('permissions');
		$data['all_roles'] = $this->select->getAll('roles');
		$data['main_content'] = 'roles';
		$data['title'] = "user roles | ".$this->app_title['title_message'];
		$data['name'] = "user roles";
		$this->load->view('includes/template', $data);
	}
	public function editRole() {
		$this->load->model('select');
		$data['all_permissions'] = $this->select->getAll('permissions');
		$data['all_roles'] = $this->select->getAll('roles');
		$data['all_rps'] = $this->select->getRolePermissions($_GET['key']);
		$data['main_content'] = 'edit/roles';
		$data['title'] = "user roles | ".$this->app_title['title_message'];
		$data['name'] = "user roles";
		$this->load->view('includes/template', $data);
	}

	public function deleteRole()
	{
		$rps = $this->db->delete('role_permissions', array('role_id' => $_GET['key']));
		$res = $this->db->delete('roles', array('role_id' => $_GET['key']));
		if($res && $rps) {
			$newdata = array('del_roles'  => 'y');
			$this->session->set_userdata($newdata);
		} else {
			$newdata = array('del_roles'  => 'n');
			$this->session->set_userdata($newdata);
		}
		redirect('jarida/roles');
	}

	public function userGroups() {
		$this->load->model('select');
		$data['all_roles'] = $this->select->getAll('roles');
		$data['all_groups'] = $this->select->getAll('groups');
		$data['main_content'] = 'user_groups';
		$data['title'] = "user groups | ".$this->app_title['title_message'];
		$data['name'] = "user groups";
		$this->load->view('includes/template', $data);
	}
	public function editGroup() {
		$this->load->model('select');
		$data['all_roles'] = $this->select->getAll('roles');
		$data['all_groups'] = $this->select->getAll('groups');
		$data['all_grs'] = $this->select->getGroupRoles($_GET['key']);
		$data['main_content'] = 'edit/user_groups';
		$data['title'] = "user groups | ".$this->app_title['title_message'];
		$data['name'] = "user groups";
		$this->load->view('includes/template', $data);
	}

	public function deleteGroup(){
		$rps = $this->db->delete('group_role', array('group_id' => $_GET['key']));
		$res = $this->db->delete('groups', array('group_id' => $_GET['key']));
		if($res && $rps) {
			$newdata = array('del_group'  => 'y');
			$this->session->set_userdata($newdata);
		} else {
			$newdata = array('del_group'  => 'n');
			$this->session->set_userdata($newdata);
		}
		redirect('jarida/userGroups');
	}

	public function users() {
		$this->load->model('select');
		$data['all_users'] = $this->select->getAll('viewallusers');
		$data['all_groups'] = $this->select->getAll('groups');
		$data['all_nationality'] = $this->select->getAll('nationality');
		$data['all_status'] = $this->select->getAll('status');
		$data['all_gender'] = $this->select->getAll('sex');
		$data['all_salutations'] = $this->select->getAll('salutation');
		$data['main_content'] = 'users';
		$data['title'] = "users | ".$this->app_title['title_message'];
		$data['name'] = "users";
		$this->load->view('includes/template', $data);
	}

	public function editUser() {
		$this->load->model('select');
		$data['all_users'] = $this->select->getAll('viewallusers');
		$data['all_groups'] = $this->select->getAll('groups');
		$data['all_ugs'] = $this->select->getAll('users_groups');
		$data['all_nationality'] = $this->select->getAll('nationality');
		$data['all_status'] = $this->select->getAll('status');
		$data['all_gender'] = $this->select->getAll('sex');
		$data['all_salutations'] = $this->select->getAll('salutation');
		$data['main_content'] = 'edit/users';
		$data['title'] = "users | ".$this->app_title['title_message'];
		$data['name'] = "users";
		$this->load->view('includes/template', $data);
	}

	public function deleteUser(){
		$rps = $this->db->delete('users_groups', array('user_id' => $_GET['key']));
		$res = $this->db->delete('users', array('user_id' => $_GET['key']));
		if($res && $rps) {
			$newdata = array('del_user'  => 'y');
			$this->session->set_userdata($newdata);
		} else {
			$newdata = array('del_user'  => 'n');
			$this->session->set_userdata($newdata);
		}
		redirect('jarida/users');
	}

	public function backup() {
		$data['main_content'] = 'backup';
		$data['title'] = "system backup | ".$this->app_title['title_message'];
		$data['name'] = "system backup";
		$this->load->view('includes/template', $data);
	}

	public function noticeboard(){
		$this->load->model('select');
		$data['all_notices'] = $this->select->getAll('noticeboard');
		$data['main_content'] = 'notice_board';
		$data['title'] = "noticeboard | ".$this->app_title['title_message'];
		$data['name'] = "noticeboard";
		$this->load->view('includes/template', $data);
	}

	public function editNotice(){
		$this->load->model('select');
		$data['all_notices'] = $this->select->getAll('noticeboard');
		$data['main_content'] = 'edit/notice_board';
		$data['title'] = "noticeboard | ".$this->app_title['title_message'];
		$data['name'] = "noticeboard";
		$this->load->view('includes/template', $data);
	}

	public function deleteNotice(){
		$res = $this->db->delete('noticeboard', array('notice_id' => $_GET['key']));
		if($res) {
			$newdata = array('del_notice'  => 'y');
			$this->session->set_userdata($newdata);
		} else {
			$newdata = array('del_notice'  => 'n');
			$this->session->set_userdata($newdata);
		}
		redirect('jarida/noticeboard');
	}

	public function salutation(){
		$this->load->model('select');
		$data['all_salutations'] = $this->select->getAll('salutation');
		$data['main_content'] = 'salutation';
		$data['title'] = "salutation | ".$this->app_title['title_message'];
		$data['name'] = "salutation";
		$this->load->view('includes/template', $data);
	}

	public function editSalutation(){
		$this->load->model('select');
		$data['all_salutations'] = $this->select->getAll('salutation');
		$data['main_content'] = 'edit/salutation';
		$data['title'] = "salutation | ".$this->app_title['title_message'];
		$data['name'] = "salutation";
		$this->load->view('includes/template', $data);
	}

	public function deleteSalutation(){
		$salutation_id = $_GET['key'];
		$res = $this->db->delete('salutation', array('salutation_id' => $salutation_id));
		if($res) {
			$newdata = array('del_sal'  => 'y');
			$this->session->set_userdata($newdata);
		} else {
			$newdata = array('del_sal'  => 'n');
			$this->session->set_userdata($newdata);
		}
		redirect('jarida/salutation');
	}

	public function publishersReport(){
		$data['main_content'] = 'publishers_report';
		$data['title'] = "publishers report | ".$this->app_title['title_message'];
		$data['name'] = "publishers report";
		$this->load->view('includes/template', $data);
	}

	public function usersReport(){
		$data['main_content'] = 'users_report';
		$data['title'] = "pusers report | ".$this->app_title['title_message'];
		$data['name'] = "users report";
		$this->load->view('includes/template', $data);
	}

	public function magReports(){
		$data['main_content'] = 'mag_reports';
		$data['title'] = "magazines report | ".$this->app_title['title_message'];
		$data['name'] = "magazines report";
		$this->load->view('includes/template', $data);
	}

	public function issuesReport(){
		$data['main_content'] = 'issues_report';
		$data['title'] = "magazine issues report | ".$this->app_title['title_message'];
		$data['name'] = "magazine issue report";
		$this->load->view('includes/template', $data);
	}

	public function doLogout(){
		$this->session->sess_destroy();
		redirect('jarida/login');
	}

	public function doLogin()
	{
		$this->load->model('select');
		$result = $this->select->doLogin($_POST['username'], $_POST['password']);
		if (!is_null($result)) {
			if ($_POST['password'] == 'jarida') {
				if (isset($result->publisher_id)) {
					$newdata = array(
	               'username'  => $result->username,
	               'surname'     => $result->surname,
	               'user_id' => $result->user_id,
	               'publisher_id' => $result->publisher_id,
	               'mep' => 'y'
	           		);
					$this->session->set_userdata($newdata);
					redirect('jarida/dashboard');
				} else {
					$newdata = array(
	               'username'  => $result->username,
	               'surname'     => $result->surname,
	               'user_id' => $result->user_id,               
	               'mep' => 'y'
	           		);
					$this->session->set_userdata($newdata);
					redirect('jarida/dashboard');
				}
				
				
			} else {
				if (isset($result->publisher_id)) {
					$newdata = array(
               		'username'  => $result->username,
               		'surname'     => $result->surname,
               		'publisher_id' => $result->publisher_id,
               		'user_id' => $result->user_id
               		);
					$this->session->set_userdata($newdata);
					redirect('jarida/dashboard', $newdata);
				} else {
					$newdata = array(
               		'username'  => $result->username,
               		'surname'     => $result->surname,
               		'user_id' => $result->user_id
               		);
					$this->session->set_userdata($newdata);
					redirect('jarida/dashboard', $newdata);
				}
				
			}
		} else {
			$this->session->sess_destroy();
			$data['error_info'] = "Invalid login details.";
			$data['main_content'] = 'login';
			$data['title'] = "login | ".$this->app_title['title_message'];
			$data['name'] = "login";
			$this->load->view('login', $data);
		}
	}

	public function resetPassword(){
		$user_data = array(
			'password' => sha1('jarida')
			);

		$this->db->where('email', $_POST['email']);
		$result = $this->db->update('users', $user_data);
		if ($result) {
			$newdata = array('reset'  => 'y');
			$this->session->set_userdata($newdata);
		} else {
			$newdata = array('reset'  => 'n');
			$this->session->set_userdata($newdata);
		}
		redirect('jarida/login');
	}

	public function dirToArray($dir) {
		$result = array();
		$cdir = scandir($dir);
		foreach ($cdir as $key => $value)
		{
			if (!in_array($value,array(".","..")))
			{ 
	         if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
	         {
	         	$result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value); 
	         } 
	         else 
	         { 
	            $result[] = $value; 
	         }
	     } 
	   } 
	   
	   return $result; 
	}

	public function magic(){
		$result = $this->generateImages('Home_coming_15.pdf', 0);
		if (!is_null($result)) {
			$i = '1';
			foreach ($result as $key => $value) {
				echo $i .'='. $value.'</br>';
				$i++;
			}
		} else {
			echo 'no';
		}
		
	}

	public function generateImages($file_name, $issue_id) {
		$data = explode('.', $file_name); //split('.', $src_url);
		$dest_dir = '';
		foreach ($data as $key => $value) {
			if ($key == 0) {
				$dest_dir = $value;
			}
		}
		$dest_path = realpath(base_url().'mag_issues').'./mag_issues/'.$dest_dir;
		if (!file_exists($dest_path)) {
		    mkdir($dest_path);
			$src = realpath(base_url().'mag_issues').'./mag_issues/'.$file_name;
			$dest = $dest_path.'/'.$dest_dir.'.jpg';
			exec("convert -density 120 ".$src." -quality 80 ".$dest);
			//exec("convert ".$src_file." ".$dest_file);

			$result = array();
			$cdir = scandir($dest_path);
			foreach ($cdir as $key => $value)
			{
				if (!in_array($value,array(".","..")))
				{ 
					$result[] = $value;
		     } 
		   } 
		} else {
			$this->rmdir_recursive($dest_path);
			$this->db->delete('issue_pages', array('issue_id' => $issue_id));
		    mkdir($dest_path);
			$src = realpath(base_url().'mag_issues').'./mag_issues/'.$file_name;
			$dest = $dest_path.'/'.$dest_dir.'.jpg';
			exec("convert -density 120 ".$src." -quality 80 ".$dest);
			//exec("convert ".$src_file." ".$dest_file);

			$result = array();
			$cdir = scandir($dest_path);
			foreach ($cdir as $key => $value)
			{
				if (!in_array($value,array(".","..")))
				{ 
					$result[] = $value;
		     } 
		   } 
		}
	   return $result;
	}

	public function dialog(){
		$this->load->view('dialog');
	}
	public function dir()
	{
		$dir = realpath(base_url().'mag_issues').'./mag_issues/fellowuo';
		$this->rmdir_recursive($dir);
	}

	public function rename()
	{
		$dir = 'D:/xampp/htdocs/jarida/mag_issues/';
		rename('/mag_issues/The_Duty_12.pdf', '/mag_issues/The_Duty_120.pdf');
	}

	public function rmdir_recursive($dir) {
	    foreach(scandir($dir) as $file) {
	        if ('.' === $file || '..' === $file) continue;
	        if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
	        else unlink("$dir/$file");
	    }
	    rmdir($dir);
	}

	public function scan()
	{
		$dest_path = realpath(base_url().'mag_issues').'./mag_issues/Home_coming_15';
		$cdir = scandir($dest_path);
		if (!is_null($cdir)) {
			$i = '1';
			foreach ($cdir as $key => $value) {
				echo $i .'='. $value.'</br>';
				$i++;
			}
		} else {
			echo 'no';
		}
	}

	public function replace()
	{
		$str = 'http:\/\/localhost\/jarida\/mag_issues\/Home_coming_15\/Home_coming_15-0.jpg';
		echo str_replace('\\

			', '', $str);
	}

	public function apppath()
	{
		echo FCPATH.'mag_images/adt';
	}

}