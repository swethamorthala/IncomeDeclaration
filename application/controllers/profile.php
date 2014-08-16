<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of profile
 *
 * @author swethamorthala
 */
class profile extends CI_Controller {
    public function index() {
		$this->load->library('session');

		$company_id = $this->session->userdata('company_name');
		$data['company_id'] = $company_id;

		$this->load->view('templates/header', $data);
		$this->load->view('company/profile', $data);
		$this->load->view('templates/footer', $data);
	}
}
?>
