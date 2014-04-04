<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delete extends CI_Controller {

	public function deleteSalutation() {

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


}