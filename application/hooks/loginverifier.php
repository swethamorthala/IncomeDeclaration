<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loginverifier
 *
 * @author swethamorthala
 */
class loginverifier extends CI_Controller {
    //put your code here

	public function index() {
		$seg1 =$this->uri->segment(1);
		$seg2 = $this->uri->segment(2);

		$company_url = $this->session->userdata('company_url');

		if(! $company_url) {
			//User is not logged in

			if(! $seg1) {
				//Home page no probs
			}else if($seg1 == 'register') {
				//No probs

			} else if ($seg2 == 'login') {
				//No probls
			} else {
				redirect('/', 'location', 301);
			}

		}
	}
}
?>
