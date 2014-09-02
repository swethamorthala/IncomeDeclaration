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
		$company = array(

			'url' => $parameters['url'],
			'company_name' => $parameters['company_name'],
			'status' => 'ACTIVE'

		);

		
		$this->db->trans_start();
		 $this->db->insert('company', $company);


		 $employee = array(
			'company_id' => mysql_insert_id(),
			'First_Name' => $parameters['First_Name'],
			'Last_Name' => $parameters['Last_Name'],
                        'Employee_Id' => $parameters['Employee_Id'],
                        'Role_Band' => $parameters['Role_Band'],
                        'Email' => $parameters['Email'],
			'status' => 'ACTIVE'

		);

		 
		 $this->db->insert('employee', $employee);

		$this->db->trans_complete();

                return;
	}

}
?>
