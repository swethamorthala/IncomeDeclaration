<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of logout
 *
 * @author swethamorthala
 */
class logout extends CI_Controller {
    //put your code here

	//This will logout the user
	public function index() {

		$this->session->unset_userdata('company_id');
		$this->session->unset_userdata('company_name');
		$this->session->unset_userdata('company_url');
		$this->session->unset_userdata('isUserLoggedIn');

		redirect('/', 'location', 301);

	}
}
?>
