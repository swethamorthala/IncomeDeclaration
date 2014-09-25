<?php


class login_model extends CI_Model {

    
    //put your code here

	public function __construct()
	{
		// Create connection
		$this->load->database();
	
        }
public function getEmpfromusername($company_id, $user_name, $password) {
   
	$sql = "select * from employee where id = (SELECT employee_id FROM user WHERE  company_id = ? AND user_name = ? AND password = ?)";
		$query = $this->db->query($sql, array($company_id, $user_name, $password));
		if($query->num_rows() > 0) {
			return $query->row();
		} else {
			return FALSE;
		}
	}
public function getEmpfromemail($company_id, $email, $password) {
  
       $sql = "select * from employee where id = (SELECT employee_id FROM user WHERE  company_id = ? AND email= ? AND password = ?)";
		$query = $this->db->query($sql, array($company_id, $email, $password));
		if($query->num_rows() > 0) {
			return $query->row();
		} else {
			return FALSE;
		}      
}
}
?>

