<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of employeedetails_model
 *
 * @author Red
 */
class employeedetails_model extends CI_Model {

    //put your code here
   Public function __construct()
	{
		// Create connection
		$this->load->database();
	 }

	public function create($parameters) {
		

		$this->db->trans_start();

               
		 $employee = array(
                      'company_id' => $parameters['company_id'],
			'first_name' => $parameters['first_name'],
			'last_name' => $parameters['last_name'],
                        'employee_uid'=>$parameters['employee_uid'],
                        'email' => $parameters['email'], 
			'status' => 'ACTIVE'
		);
                 
            
              // $this->db->where('id',$id);
                $this->db->update('employee', $employee, array('id' => $parameters['id']));
               
                
		 $user = array(
                      'company_id' => $parameters['company_id'],
                       'user_name' => $parameters['user_name'],
                       'email' => $parameters['email'],
			
		);

		 $this->db->update('user',$user,array('employee_id' => $parameters['id']));
		 	 
		$this->db->trans_complete();

                return ;
        }
                public function get($id)
                {
                $query=$this->db->query('select * from employee where id=\''.$id.'\'') ;			
			if($query->num_rows() > 0) {
			return $query->row();
		} else {
			return null;
		}
		
		}
                
                   public function getuser($employee_id)
                {
                $query=$this->db->query('select * from user where employee_id=\''.$employee_id.'\'') ;			
			if($query->num_rows() > 0) {
			return $query->row();
		} else {
			return null;
		}
		
		}
	     
		
                
	
}
?>
