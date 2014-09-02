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

		 $user = array(
			'company_id' => mysql_insert_id(),
			'first_name' => $parameters['first_name'],
			'last_name' => $parameters['last_name'],
                        'email' => $parameters['email'],
			'status' => 'ACTIVE'

		);

		 
		 $this->db->insert('user', $user);

		$this->db->trans_complete();

		 return;
	}

}
?>
