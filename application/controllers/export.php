<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Export extends CI_Controller {
  
    public function __construct() {
        parent::__construct();
        require_once APPPATH.'third_party/PHPExcel.php';
        $this->load->library('Excel');
        $this->load->model('Export_model', 'export');
    }    
  
    public function index() {
        $data['page'] = 'export-excel';
        $data['title'] = 'Export Excel data | TechArise';
        $data['pourcentageInfo'] = $this->export->pourcentageList();
        
        $this->load->view ('header');
        $this->load->view('export', $data);
        $this->load->view ('footer');
    }
  
    public function createXLS() {
   
        $fileName = 'quiz'.'.xlsx';  
    
        $this->load->library('excel');
        $empInfo = $this->export->pourcentageList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);       
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'id_question');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'question');        
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'participant');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'juste');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'faux');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'resultat');              
     
        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['id_question']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['question']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['participant']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['juste']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['faux']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['resultat']);
            
            $rowCount++;
        }

        $objwriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="quiz resultat.xls"');
      $objwriter->save('php://output');
       
    }
    
}


?>