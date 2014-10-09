<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ctc_details
 *
 * @author Red
 */
class ctc_details extends CI_Controller{   
    //put your code here
    public function __construct() {
        parent::__construct();
        
       $this->load->model('ctcdetails_model');
         
       
         }
    public function index(){
        $this->load->library('table');
        $this->load->helper('html');
       
             
             $data['table']= $this->ctcdetails_model->ctcdetail_getall();
         
         
        $this->load->view('templates/admin_logged_header');
        $this->load->view('employee/list_of_employees',$data);
        $this->load->view('templates/footer');   
       
    }
    

}

?>

