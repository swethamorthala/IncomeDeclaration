<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Companies
 *
 * @author swethamorthala
 */
class Companies extends CI_Controller {
    //put your code here

	public function  __construct() {
		parent::__construct();
		$this->load->model('register_model');
	}

	public function index() {
		//$this->load->helper('url');
		$this->load->library('form_validation');

		$currenturl =$this->uri->segment(1);

		$company = $this->register_model->getCompany($currenturl);

		$data['company_id'] = $company->id;
		$data['company_name'] = $company->company_name;
		$data['submission_url'] = $currenturl.'/login';

		$this->form_validation->set_rules('user_name', 'User Name or Email', 'required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('login/login', $data);
			$this->load->view('templates/footer', $data);
		} else {
			//Check if the username is email or user name
			//If username call getEmployee with username and password
			//If email call getEmployee with username and password
			//If employee is null, then show errors saying invalid username or password
			//If employee exists then save employee into the session
			//Need to return the employee here so that we can decide what is his user type and save the employee info in session
			$loggedin = $this->register_model->login($company->id, $this->input->post('user_name'), md5($this->input->post('password')));
			if($loggedin) {
				$this->load->library('session');
				$this->session->set_userdata('company_id',$company->id);
				$this->session->set_userdata('company_name',$company->company_name);
				$this->session->set_userdata('company_url',$currenturl);
				$this->session->set_userdata('isUserLoggedIn',TRUE);

		
				
				
				redirect('/'.$currenturl.'/profile', 'location', 301);
			} else {
				$data['login_failed'] = 'true';
				$this->load->view('templates/header', $data);
				$this->load->view('login/login', $data);
				$this->load->view('templates/footer', $data);
			}

		}

		
	}
}
?>
