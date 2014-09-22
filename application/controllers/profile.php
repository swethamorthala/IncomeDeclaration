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
		//get the employee from the session
		//check if the employee is admin or not
		//If admin show him admin page
		//If regular employee show him welcome page for employee (creater)
		//Need to create separate header for employee (employee_logged_header)
		//employee profile
		
		$company_id = $this->session->userdata('company_name');
		$data['company_id'] = $company_id;

		$this->load->view('templates/header', $data);
		$this->load->view('company/profile', $data);
		$this->load->view('templates/footer', $data);
	}
}
?>
