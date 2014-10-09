<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of listofemployee
 *
 * @author Red
 */
class listofemployee  extends CI_Controller{   
    //put your code here
    public function __construct() {
        parent::__construct();
        
       $this->load->model('listofemployee_model');
       
    }
    public function index()
    {
        $this->load->library('table');
        $this->load->helper('html');
        $this->load->library('pagination'); 
        
         
         $per_page=20;
         
  
          $config['base_url'] =$this->config->site_url().'/listofemployee/';
          $config['total_rows'] = $this->listofemployee_model->countAll();
          $config['per_page'] = $per_page; 
          $config['num_links'] =10;
          
        $this->pagination->initialize($config);
      
                  
        $data['table']= $this->listofemployee_model->employee_getall($per_page,$this->uri->segment(3));
        $data["links"] = $this->pagination->create_links();
 
         
        $this->load->view('templates/admin_logged_header');
        $this->load->view('employee/list_of_employees',$data);
        $this->load->view('templates/footer');   
       
    }
    

}

?>
