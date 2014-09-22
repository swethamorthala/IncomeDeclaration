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

class upload extends CI_Controller{
   function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
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

			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$file_info = $this->upload->data();

			echo "File saved at ".$file_info['full_path'];

			$this->load->view('upload_success', $data);

			$objPHPExcel = PHPExcel_IOFactory::load($file_info['full_path']);

			$worksheet = $objPHPExcel->getSheet(0);

			 $highestRow         = $worksheet->getHighestRow();

			 $highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
			 
    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
    $nrColumns = ord($highestColumn) - 64;
    echo "<br>The worksheet ".$worksheetTitle." has ";
    echo $nrColumns . ' columns (A-' . $highestColumn . ') ';
    echo ' and ' . $highestRow . ' row.';
    echo '<br>Data: <table border="1"><tr>';
    for ($row = 1; $row <= $highestRow; ++ $row) {
        echo '<tr>';
        for ($col = 0; $col < $highestColumnIndex; ++ $col) {
            $cell = $worksheet->getCellByColumnAndRow($col, $row);
            $val = $cell->getValue();
            $dataType = PHPExcel_Cell_DataType::dataTypeForValue($val);
            echo '<td>' . $val . '<br>(Typ ' . $dataType . ')</td>';
        }
        echo '</tr>';
    }
    echo '</table>';

			//var_dump($objPHPExcel);


		}
	}

}
?>

