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

require_once '/Users/swethamorthala/Documents/workspace/DK/CodeIgniter_2.2.0/application/Classes/PHPExcel/IOFactory.php';

class upload extends CI_Controller {
	function __construct() {

		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('ctcdetails_model');
	}


	function index()
	{
             $this->load->view('templates/admin_logged_header');
            $this->load->view('upload/upload_form', array('error' => ' ' ));
	    $this->load->view('templates/footer');
            
        }


	function do_upload() {
		$config['upload_path'] = '.././uploads/';
		$config['allowed_types'] = 'xls|xlsx|pdf';
		$config['overwrite'] = 'TRUE';


		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload()) {
			$error = array('error' => $this->upload->display_errors());
                        $this->load->view('templates/admin_logged_header');
			$this->load->view('upload/upload_form', $error);
                        $this->load->view('templates/footer');
		}
		else {
			$data = array('upload_data' => $this->upload->data());

			$file_info = $this->upload->data();

			//echo "File saved at ".$file_info['full_path'];



			$this->load->view('upload_success', $data);

			$ctcDetails = array();

			$objPHPExcel = PHPExcel_IOFactory::load($file_info['full_path']);

			$worksheet = $objPHPExcel->getSheet(0);

			$highestRow         = $worksheet->getHighestRow();

			$highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'

			$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

			$nrColumns = ord($highestColumn) - 64;

			for ($row = 1; $row <= $highestRow; ++ $row) {
				$component = array();
				$component['employee_id'] = 1234;


				for ($col = 0; $col < $highestColumnIndex; ++ $col) {

					$cell = $worksheet->getCellByColumnAndRow($col, $row);
					$val = $cell->getValue();
					if($col == 0) {
						$component['ctc_name'] =  $val;
					} else if($col == 1) {
						$component['ctc_value'] =  $val;
					}
					$dataType = PHPExcel_Cell_DataType::dataTypeForValue($val);

				}
				$ctcDetails[$row-1] = $component;

			}


			$this->ctcdetails_model->createCTCDetails($ctcDetails);

			//var_dump($objPHPExcel);

		}
	}

}
?>

