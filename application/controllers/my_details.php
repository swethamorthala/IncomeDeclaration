<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of employee_details
 *
 * @author Red
 */
class my_details extends CI_Controller{
    //put your code here
public function  __construct() {
		parent::__construct();
                $this->load->model('employeedetails_model');
	}

	public function index() {
		$this->load->helper('form');
                $this->load->library('session');
          	$this->load->library('form_validation');
		$data['title'] = "employeedetails";

	    $this->form_validation->set_rules('first_name', 'first name', 'required|min_length[3]|max_length[50]|xss_clean|trim');
	    $this->form_validation->set_rules('last_name', 'last name', 'required|min_length[3]|max_length[50]|xss_clean|trim');
            $this->form_validation->set_rules('employee_uid', 'employee uid', 'required|min_length[3]|max_length[50]|xss_clean|trim');
            $this->form_validation->set_rules('email', 'email', 'required|min_length[5]|max_length[100]|valid_email');
	    $this->form_validation->set_rules('user_name', 'user name', 'min_length[3]|max_length[50]|xss_clean|trim');
            $this->form_validation->set_rules('password', 'password', 'min_length[7]|max_length[50]');
          
                        $company_id = $this->session->userdata('company_id');
                    $employee_id = $this->session->userdata('employee_id');
                    $role_band = $this->session->userdata('role_band');
                    
                    $data = array(
                       'company_id' => $company_id,
			'employee_id' => $employee_id,
			'first_name'=> $this->session->userdata('first_name'),
                        'last_name'=> $this->session->userdata('last_name'),                       
                        'employee_uid'=>$this->session->userdata('employee_uid'),
			'email'=>$this->session->userdata('email'),
                        'user_name'=>$this->session->userdata('user_name'),
			'password'=>md5($this->session->userdata('password'))
                            
				) ;
             
                    
                 
		if($this->form_validation->run() === FALSE) {
			$this->load->view('templates/employee_logged_header',$data);
			$this->load->view('employee/employee_details',$data);
			$this->load->view('templates/footer',$data);
		} 
                else  {
                    
                    $save=$this->input->post('save');
                   
                    if($save == save){
                    $parameters = array(
                        'id'=>$employee_id,
                        'role_band'=>$role_band,
			'first_name'=>$this->input->post('first_name'),
                        'last_name'=>$this->input->post('last_name'),
                        'employee_uid'=>$this->input->post('employee_uid'),
			'email'=>$this->input->post('email'),
			'user_name'=>$this->input->post('user_name'),
			'password'=>md5($this->input->post('password'))
		);  
                    
                    $this->employeedetails_model->create($parameters);
                            
			$this->load->view('templates/employee_logged_header');
			 
                        $this->load->view('templates/footer');
                    }
                    
                    else{
                   echo 'not updated';
                    }
                
                }
        
        }
}
?>

