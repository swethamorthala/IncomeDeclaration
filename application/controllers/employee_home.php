<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of employee_home
 *
 * @author Red
 */
class employee_home extends CI_Controller {
    
     public function index()
    {
     $this->load->library('session');
    
    $employee_id = $this->session->userdata('employee_id'); 
      $role_band = $this->session->userdata('role_band'); 
    
  
       
         if($role_band == 'ADMIN')
      {
                        $this->load->view('templates/admin_logged_header');
                  	$this->load->view('templates/footer');
      
       }  
        else {
              $this->load->view('templates/employee_logged_header');
              $this->load->view('templates/footer');
              }
                        
            
   
    }
    
}

?>
