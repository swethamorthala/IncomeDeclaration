<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of update
 *
 * @author Red
 */
class upload extends CI_Controller{
   function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
             $this->load->view('templates/admin_logged_header');
            $this->load->view('upload/upload_form', array('error' => ' ' ));
	    $this->load->view('templates/footer');
            
        }

	function do_upload()
	{
		$config['upload_path'] = '.././uploads/';
		$config['allowed_types'] = 'xls|xlsx|pdf';
		$config['overwrite'] = 'TRUE';


		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
                        $this->load->view('templates/admin_logged_header');
			$this->load->view('upload/upload_form', $error);
                        $this->load->view('templates/footer');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			//$file_info = $this->upload->data();
			//echo "File saved at ".$file_info['full_path'];
                        $this->load->view('templates/admin_logged_header');                       
			$this->load->view('upload/upload_success', $data);
                        $this->load->view('templates/footer');
		}
	}

}
?>

