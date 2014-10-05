<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ctcfiles_model
 *
 * @author swethamorthala
 */
class ctcfiles_model  extends CI_Model {

	Public function __construct()
	{
		// Create connection
		$this->load->database();
	 }

	 public function create($parameters) {

		 $fileInfo = array(
			 'employee_id' => $parameters['employee_id'],
			 'file_path' => $parameters['file_path']
		 );
		


		$this->db->trans_start();

		$this->db->insert('company', $company);

                $companyId = mysql_insert_id();

                $employee = array(
			'company_id' => $companyId,
			'First_Name' => '',
			'Last_Name' => '',
                        'Role_Band' => 'ADMIN',
                        'Email' => $parameters['email'],
			'status' => 'ACTIVE'

		);

                $this->db->insert('employee', $employee);

                $employeeId = mysql_insert_id();

		 $user = array(
			'company_id' => $companyId,
                        'employee_id' => $employeeId,
			'user_name' => $parameters['user_name'],
			'password' => $parameters['password'],
                        'Email' => $parameters['email'],
			'status' => 'ACTIVE'

		);


		 $this->db->insert('user', $user);

		$this->db->trans_complete();

		 return;
	}
}
?>
