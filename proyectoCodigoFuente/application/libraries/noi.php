<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */




require_once  APPPATH."/third_party/PHPExcel.php";
/** PHPExcel_IOFactory */
require_once  APPPATH.'/third_party/PHPExcel/IOFactory.php';



class noi
{
	

	function export($table,$empresa)
	{

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

/** Include PHPExcel */


/** PHPExcel_IOFactory */

 
 




// Create new PHPExcel object

$objPHPExcel = new PHPExcel();

// Set document properties

$objPHPExcel->getProperties()->setCreator("Fernando Martinez")
							 ->setLastModifiedBy("Fernando Martinez")
							 ->setTitle("PHPExcel Test Document")
							 ->setSubject("PHPExcel Test Document")
							 ->setDescription("Test document for PHPExcel, generated using PHP classes.")
							 ->setKeywords("office PHPExcel php")
							 ->setCategory("Test result file");


	$column = 0;
    	$row = 1;
		
	
  $objActSheet = $objPHPExcel->getActiveSheet(); 
 
    $objStyleA5 = $objActSheet ->getStyle('A');
   $objStyleA5 ->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT); 

  
  
	
		
    	foreach ($table as $record)
    	{
		
		
    		foreach ($record as $value)
		
    		{
					
    			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row, $value);
    			$column++;
    		}
    		$column = 0;
    		$row++;
    	}
$objPHPExcel->getActiveSheet()->setTitle('AltaNOI');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file

$callStartTime = microtime(true);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', $empresa.'.xlsx', __FILE__));
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;


$objPHPExcel->disconnectWorksheets();
unset($objPHPExcel);



header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.basename(str_replace('.php', $empresa.'.xlsx', __FILE__)));
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize(str_replace('.php',$empresa. '.xlsx', __FILE__)));
ob_clean();
flush();
readfile(str_replace('.php', $empresa.'.xlsx', __FILE__));
exit;

	}
}