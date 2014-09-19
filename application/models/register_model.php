<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Register_Model
 *
 * @author swethamorthala
 */
class Register_Model extends CI_Model {
    //put your code here

	public function __construct()
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

	public function getCompany($url) {
		$query = $this->db->query('select * from company where url =\''.$url.'\'');
		if($query->num_rows() > 0) {
			return $query->row();
		} else {
			return null;
		}
	}

	public function login($company_id, $user_name, $password) {
		$sql = "SELECT * FROM user WHERE company_id = ? AND  user_name = ? AND password = ?";
		$query = $this->db->query($sql, array($company_id, $user_name, $password));
		if($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
?>
