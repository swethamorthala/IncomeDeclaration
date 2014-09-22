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

			$this->db->insert_batch('ctc_details',$ctcDetails);

		}

}
?>
