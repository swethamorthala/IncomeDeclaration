<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Register
 *
 * @author swethamorthala
 */
class IDRegister extends CI_Controller {
    //put your code here

	public function  __construct() {
		parent::__construct();
		$this->load->model('register_model');
	}


	public function index() {
		$this->load->helper('form');
	    $this->load->library('form_validation');
		$data['title'] = "Register";

		$this->form_validation->set_rules('company_name', 'Company Name', 'required|min_length[3]|max_length[50]|xss_clean|trim');
	    $this->form_validation->set_rules('email', 'Email', 'required|min_length[5]|max_length[100]|valid_email');
		$this->form_validation->set_rules('user_name', 'User Name', 'required|min_length[7]|max_length[50]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[7]|max_length[50]');

		$url = preg_replace("/[^A-Za-z0-9]/", '',  $this->input->post('company_name'));



		$parameters = array(
			'url'=>$url,
			'company_name'=>$this->input->post('company_name'),
			'email'=>$this->input->post('email'),
			'user_name'=>$this->input->post('user_name'),
			'password'=>md5($this->input->post('password'))
		);

		if($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('register/register', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$this->register_model->create($parameters);
			
			$company = $this->register_model->getCompany($url);

			$this->session->set_userdata('company_id',$company->id);
			$this->session->set_userdata('company_name',$company->company_name);
			$this->session->set_userdata('url',$company->url);

			$data['company_url'] =$url;

			$this->load->view('templates/header', $data);
			$this->load->view('register/register_success', $data);
			$this->load->view('templates/footer', $data);
		}

		



		
	}

}
?>
