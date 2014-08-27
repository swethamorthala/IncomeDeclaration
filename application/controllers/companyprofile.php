<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CompanyProfile
 *
 * @author swethamorthala
 */
class CompanyProfile extends CI_Controller {
    //put your code here

	public function index() {
		$this->load->library('session');

		$company_id = $this->session->userdata('company_name');
		$data['company_id'] = $company_id;
		
		$this->load->view('templates/admin_logged_header', $data);
		$this->load->view('company/profile', $data);
		$this->load->view('templates/footer', $data);
	}
}
?>
