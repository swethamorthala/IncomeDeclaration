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
                $this->load->library('session');
	    $this->load->library('form_validation');
		$data['title'] = "employee";

	    $this->form_validation->set_rules('First_Name', 'First Name', 'required|min_length[3]|max_length[50]|xss_clean|trim');
	    $this->form_validation->set_rules('Last_Name', 'Last Name', 'required|min_length[3]|max_length[50]|xss_clean|trim');
            $this->form_validation->set_rules('employee_uid', 'employee uid', 'required|min_length[3]|max_length[50]|xss_clean|trim');
            $this->form_validation->set_rules('Role_Band', 'Role Band', 'required|min_length[3]|max_length[50]|xss_clean|trim'); 
            $this->form_validation->set_rules('Email', 'Email', 'required|min_length[5]|max_length[100]|valid_email');
	    $this->form_validation->set_rules('password', 'Password', 'required|min_length[7]|max_length[50]');
          
           $company_id = $this->session->userdata('company_id'); 
               
             
           
		$parameters = array(
			'company_id'=>$company_id,
			'First_Name'=>$this->input->post('First_Name'),
			'Last_Name'=>$this->input->post('Last_Name'),
                        'employee_uid'=>$this->input->post('employee_uid'),
                        'Role_Band'=>$this->input->post('Role_Band'),
			'Email'=>$this->input->post('Email'),
                        'password'=> md5($this->input->post('password'))
			);
              
		if($this->form_validation->run() === FALSE) {
			$this->load->view('templates/admin_logged_header');
			$this->load->view('employee/add_employee');
			$this->load->view('templates/footer');
		} 
                else {
                    $this->employee_model->create($parameters);
                                   
			$this->load->view('templates/admin_logged_header');
			$this->load->view('employee/add_employee_success');
			$this->load->view('templates/footer');
		}

	
	}

}
?>

