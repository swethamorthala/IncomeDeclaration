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
class employee_details extends CI_Controller{
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

	    $this->form_validation->set_rules('first_name', 'first name', 'min_length[3]|max_length[50]|xss_clean|trim');
	    $this->form_validation->set_rules('last_name', 'last name', 'min_length[3]|max_length[50]|xss_clean|trim');
            $this->form_validation->set_rules('employee_uid', 'employee uid', 'min_length[3]|max_length[50]|xss_clean|trim');
            $this->form_validation->set_rules('email', 'email', 'min_length[5]|max_length[100]|valid_email');
	    $this->form_validation->set_rules('user_name', 'user name', 'min_length[3]|max_length[50]|xss_clean|trim');
           
                        $company_id = $this->session->userdata('company_id');
                      
                        $id=$this->input->get('id'); 
                        if(!$id ) {
                            $id=$this->input->post('id');
                        }
               
                        if($id>0){
                            
                            $employee_id=$id;
                    
                  $query = $this->employeedetails_model->get($id);
                  
                   $query1 = $this->employeedetails_model->getuser($employee_id);
                   
                   $data = array(
			 'id' => $id,                       
			'first_name'=>$query->first_name,
                        'last_name'=>$query->last_name,
                        'employee_uid'=>$query->employee_uid,
			'email'=>$query->email,
                        'user_name'=>$query1->user_name,
				);  
                   
             }
                    
              
		if($this->form_validation->run() === FALSE) {
			$this->load->view('templates/admin_logged_header',$data);
			$this->load->view('employee/employee_details',$data);
			$this->load->view('templates/footer',$data);
		} 
                else  {
                    $save=$this->input->post('save');
                    if($save == save){
                    $parameters = array(
                        'id'=>$id,
                        'company_id' => $company_id,
			'first_name'=>$this->input->post('first_name'),
                        'last_name'=>$this->input->post('last_name'),
                        'employee_uid'=>$this->input->post('employee_uid'),
			'email'=>$this->input->post('email'),
			'user_name'=>$this->input->post('user_name'),
			);  
                    
                    $this->employeedetails_model->create($parameters);
                             
			$this->load->view('templates/admin_logged_header',$data);
			$this->load->view('employee/employee_details_success',$data);   
                        $this->load->view('templates/footer',$data);
                    }
                    
                    else{
                        redirect('/listofemployee');
                    }
         
                }
        }

}
?>

