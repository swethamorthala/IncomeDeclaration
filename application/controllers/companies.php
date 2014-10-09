
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

	public function  __construct()
         {
		parent :: __construct();
		
                $this->load->model('register_model');
                $this->load->model('login_model');
                
	}

	public function index()
        {
		$this->load->helper('url');
		$this->load->library('form_validation');

		$currenturl =$this->uri->segment(1);

		$company = $this->register_model->getCompany($currenturl);

		$data['company_id'] = $company->id;
		$data['company_name'] = $company->company_name;
		$data['submission_url'] = $currenturl.'/login';
                $user_name=  $this->input->post('user_name');
                    
		$this->form_validation->set_rules('user_name', 'Username', 'xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
                if($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('login/login', $data);
			$this->load->view('templates/footer', $data);
		} 
                else {
                    
          $Isemail=$this->Isemail($user_name);
    if($Isemail){
      
        $employee = $this->login_model->getEmpfromemail($company->id, $user_name,$password=md5($this->input->post('password')));                  
                  
              }    
     else{
         $employee = $this->login_model->getEmpfromusername($company->id, $user_name,$password=md5($this->input->post('password')));
             }                   
                
       if($employee && $employee->id) {
				$this->load->library('session');
                        	
                               
				$this->session->set_userdata('company_id',$company->id);
				$this->session->set_userdata('company_name',$company->company_name);
				$this->session->set_userdata('company_url',$currenturl);
			        $this->session->set_userdata('isUserLoggedIn',TRUE); 
                                $this->session->set_userdata('employee_id',$employee->id);
                                $this->session->set_userdata('first_name',$employee->first_name);
                                $this->session->set_userdata('last_name',$employee->last_name);
                                $this->session->set_userdata('employee_uid',$employee->employee_uid);
                                $this->session->set_userdata('email',$employee->email);                                   
                                $this->session->set_userdata('role_band',$employee->role_band);
                                                            
                                 
                                   redirect('/employeehome');
                                  
                    }
          
       
                        else 
                  
                           {
                               $data['login_failed'] = 'True';
				$this->load->view('templates/header', $data);
				$this->load->view('login/login', $data);
				$this->load->view('templates/footer', $data);
			}

             }
        

        }
    public  function Isemail($user_name ){
      if(filter_var($user_name, FILTER_VALIDATE_EMAIL)) 
        { 
          return true;
        } 
        else
            { return false; }
    }
 
}
?>