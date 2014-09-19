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

		//echo "Company url " . $company_url;

		if(! $company_url) {
			//User is not logged in

			if(! $seg1) {
				//Home page no probs
			}else if($seg1 == 'register'||$seg1 == 'aboutus'||$seg1 == 'contactus' || $seg1 == 'upload') {
				//No probs

			} else if ($seg2 == 'login') {
				//No probls
			} else {
				if($seg1) {
					//redirect('/'.$seg1, 'location', 301);
				} else {
					redirect('/', 'location', 301);
				}
				
			}

		}
	}
}
?>
