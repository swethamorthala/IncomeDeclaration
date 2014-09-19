<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of listofemployee_model
 *
 * @author Red
 */
class listofemployee_model extends CI_Model{

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
         $this->load->database();
    }
  
    public function employee_getall()
    {
       $this->load->library('table');
       $this->table->set_heading('Employee id', 'Name', 'Email','Status','Role Band');
             
  $query = $this->db->query('select concat("<a href=\'employeedetails?id= ", concat(id),"\'/>",id, " </a> "), concat(first_name," ",last_name) as name,email,status,role_band from employee');
 
  return $this->table->generate($query);

 
         }
   
   
}

?>

