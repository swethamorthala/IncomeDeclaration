<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of db_helper
 *
 * @author swethamorthala
 */
class db_helper  extends CI_Model {

	Public function __construct()
	{
		// Create connection
		$this->load->database();
	}

	public function beginTransaction() {
		$this->db->trans_start();
	}

	public function endTransaction() {
		$this->db->trans_complete();
	}

	public function createCTCFiles($parameters) {
		$fileInfo = array(
			 'employee_id' => $parameters['employee_id'],
			 'file_path' => $parameters['file_path']
		 );
		
		$this->db->insert('ctc_files', $fileInfo);
	}
}
?>
