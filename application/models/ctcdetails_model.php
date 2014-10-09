<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ctcdetails_model
 *
 * @author swethamorthala
 */
class ctcdetails_model extends CI_Model {
    //put your code here
	Public function __construct()
	{
		// Create connection
		$this->load->database();
	 }
	 
	public function createCTCDetails( $ctcDetails) {

			//First delete existing ctc detials

			$this->db->trans_start();

			$this->db->insert_batch('ctcdetails',$ctcDetails);

			$this->db->trans_complete();

		}
    public function ctcdetail_getall()
    {
       $this->load->library('table');
       $this->table->set_heading('Id', 'CTC_Name', 'CTC_Value','Employee_uid');
             
      $query = $this->db->query('select * from ctcdetails ');
 
       return $this->table->generate($query); 
       	

         }  
         
          public function ctcdetailsget($employee_id)
                {
                $query=$this->db->query('select employee_uid from employee where id=\''.$employee_id.'\'') ;			
			if($query->num_rows() > 0) {
			return $query->row();
		} else {
			return null;
		}
                }
    
}
?>
