<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of employee_model
 *
 * @author Red
 */
class Employee_Model extends CI_Model {
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
			'First_Name' => $parameters['First_Name'],
			'Last_Name' => $parameters['Last_Name'],
                        'employee_uid'=>$parameters['employee_uid'],
                        'Role_Band' =>'EMPLOYEE',
                        'password' => $parameters['password'],
                        'Email' => $parameters['Email'],            
			'status' => 'ACTIVE'

		);
                 $this->db->insert('employee', $employee);

            $employeeId = mysql_insert_id();
         
		 $user = array(
                       'company_id' => $parameters['company_id'],
                       'employee_id' => $employeeId,
		       'user_name' => '',
		       'password' => $parameters['password'],
                       'Email' => $parameters['Email'],
		       'status' => 'ACTIVE'

		);

		 $this->db->insert('user', $user);
		 	 
		$this->db->trans_complete();

                return;
	}
}
?>
