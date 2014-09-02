<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class addemployee extends CI_Controller {
    //put your code here

	public function  __construct() {
		parent::__construct();
                $this->load->model('employee_model');
	}

	public function index() {
		$this->load->helper('form');
	    $this->load->library('form_validation');
		$data['title'] = "employee";

		$this->form_validation->set_rules('first_name', 'first Name', 'required|min_length[3]|max_length[50]|xss_clean|trim');
	    $this->form_validation->set_rules('last_name', 'last Name', 'optional|min_length[3]|max_length[50]|xss_clean|trim');
                $this->form_validation->set_rules('email', 'Email', 'required|min_length[5]|max_length[100]|valid_email');
		
            $url = preg_replace("/[^A-Za-z0-9]/", '',  $this->input->post('first_name'));



		$parameters = array(
			'url'=>$url,
			'first_name'=>$this->input->post('first_name'),
			'last_name'=>$this->input->post('last_name'),
			'email'=>$this->input->post('email'),
			);

		if($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('employee/add employee', $data);
			$this->load->view('templates/footer', $data);
		} 
                else {
		$this->employee_model->create($parameters);
			
			$company = $this->employee_model->getCompany($url);

			$this->session->set_userdata('company_id',$company->id);
			$this->session->set_userdata('company_name',$company->company_name);
			$this->session->set_userdata('url',$company->url);
                        
			$data['company_url'] =$url;
			$this->load->view('templates/header', $data);
			$this->load->view('employee/add employee success', $data);
			$this->load->view('templates/footer', $data);
		}

	
	}

}
?>

