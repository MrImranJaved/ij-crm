<?
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Excelcontroller extends CI_Controller {
	// construct
    public function __construct() {
        parent::__construct();

		$this->load->database();
		//$this->load->library('PHPExcel');
		$this->load->library('Excel');
		//$this->load->library('PHPExcel/IOFactory');
		$this->load->model('excelmodel');
    }    
	 // export xlsx|xls file
    public function index() {
        $data['page'] = 'export-excel';
        $data['title'] = 'Export Excel data | TechArise';
        $data['employeeInfo'] = $this->excelmodel->employeeList();
		// load view file for output
        $this->load->view('working_lead', $data);
    }
	// create xlsx
    public function createXLS() {

        $data = array(
                        'category' => $this->input->post('category'),
                        'selectagent' => $this->input->post('selectagent'),
                        'selectstatus' => $this->input->post('selectstatus'),
                        'mail' => $this->input->post('mail'),
                        'fromdate' => $this->input->post('fromdate'),
                        'todate' => $this->input->post('todate') 
                     );

		// create file name
        $fileName = 'data-'.time().'.xlsx';  
		// load excel library
        $this->load->library('excel');
        $empInfo = $this->excelmodel->employeeList($data);
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Select Region');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Country');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Publisher');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Enquiry Type'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Source');  
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Creation Date');  
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Report Id');  
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Report Title');        
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Client Name');  
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Email');  
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Contact No');  
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Company');  
        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Designation');  
        $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Message'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Updated Date'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Status'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('R1', 'URL');  
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $element['selectregion']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $element['country']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $element['category']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $element['publisher']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $element['enquirytype']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $element['source']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $element['creationdate']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $element['reportid']);
            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $element['reporttitle']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $element['clientname']);
            $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $element['email']);
            $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $element['contactno']);
            $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $element['company']);
            $objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $element['designation']);
            $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $element['message']);
            $objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, $element['last_updated']);
            $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, $element['status']);
            $objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, $element['urllink']);
            $rowCount++;
        }
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objWriter->save('exceldata/'.$fileName);
		// download file
		header("Content-Type: application/vnd.ms-excel");
		//redirect(site_url().$fileName);
        echo json_encode(array('url' => site_url().'exceldata/'.$fileName));
    }
     public function excelallleads() {

        $data = array(
                        'category' => $this->input->post('category'),
                        'selectagent' => $this->input->post('selectagent'),
                        'selectstatus' => $this->input->post('selectstatus'),
                        'mail' => $this->input->post('mail'),
                        'fromdate' => $this->input->post('fromdate'),
                        'todate' => $this->input->post('todate') 
                     );

		// create file name
        $fileName = 'data-'.time().'.xlsx';  
		// load excel library
        $this->load->library('excel');
        $empInfo = $this->excelmodel->excelallleads($data);
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Select Region');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Country');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Publisher');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Enquiry Type'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Source');  
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Creation Date');  
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Report Id');  
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Report Title');        
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Client Name');  
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Email');  
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Contact No');  
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Company');  
        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Designation');  
        $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Message'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Updated Date'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Status'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('R1', 'URL');  
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $element['selectregion']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $element['country']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $element['category']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $element['publisher']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $element['enquirytype']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $element['source']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $element['creationdate']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $element['reportid']);
            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $element['reporttitle']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $element['clientname']);
            $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $element['email']);
            $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $element['contactno']);
            $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $element['company']);
            $objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $element['designation']);
            $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $element['message']);
            $objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, $element['last_updated']);
            $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, $element['status']);
            $objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, $element['urllink']);
            $rowCount++;
        }
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objWriter->save('exceldata/'.$fileName);
		// download file
		header("Content-Type: application/vnd.ms-excel");
		//redirect(site_url().$fileName);
        echo json_encode(array('url' => site_url().'exceldata/'.$fileName));
    }
    
    public function buycreatexls() {

        $data = array(
                        'category' => $this->input->post('category'),
                        'selectagent' => $this->input->post('selectagent'),
                        'selectstatus' => $this->input->post('selectstatus'),
                        'mail' => $this->input->post('mail'),
                        'fromdate' => $this->input->post('fromdate'),
                        'todate' => $this->input->post('todate') 
                     );

        // create file name
        $fileName = 'data-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        $empInfo = $this->excelmodel->employeeList($data);
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Select Region');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Country');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Publisher');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Enquiry Type'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Source');  
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Creation Date');  
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Report Id');  
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Report Title');        
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Client Name');  
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Email');  
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Contact No');  
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Company');  
        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Designation');  
        $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Message'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Updated Date'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Status'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('R1', 'URL');  
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $element['selectregion']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $element['country']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $element['category']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $element['publisher']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $element['enquirytype']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $element['source']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $element['creationdate']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $element['reportid']);
            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $element['reporttitle']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $element['clientname']);
            $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $element['email']);
            $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $element['contactno']);
            $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $element['company']);
            $objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $element['designation']);
            $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $element['message']);
            $objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, $element['last_updated']);
            $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, $element['status']);
            $objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, $element['urllink']);
            $rowCount++;
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('exceldata/'.$fileName);
        // download file
        // $objWriter->unlink(base_url().data-1545381376);
        header("Content-Type: application/vnd.ms-excel");
        //redirect(site_url().$fileName);
        echo json_encode(array('url' => site_url().'exceldata/'.$fileName));

    }
    public function nointercreatexls() {

        $data = array(
                        'category' => $this->input->post('category'),
                        'selectagent' => $this->input->post('selectagent'),
                        'selectstatus' => $this->input->post('selectstatus'),
                        'mail' => $this->input->post('mail'),
                        'fromdate' => $this->input->post('fromdate'),
                        'todate' => $this->input->post('todate') 
                     );

        // create file name
        $fileName = 'data-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        $empInfo = $this->excelmodel->employeeList($data);
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Select Region');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Country');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Publisher');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Enquiry Type'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Source');  
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Creation Date');  
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Report Id');  
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Report Title');        
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Client Name');  
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Email');  
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Contact No');  
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Company');  
        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Designation');  
        $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Message'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Updated Date'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Status'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('R1', 'URL');  
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $element['selectregion']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $element['country']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $element['category']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $element['publisher']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $element['enquirytype']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $element['source']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $element['creationdate']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $element['reportid']);
            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $element['reporttitle']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $element['clientname']);
            $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $element['email']);
            $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $element['contactno']);
            $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $element['company']);
            $objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $element['designation']);
            $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $element['message']);
            $objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, $element['last_updated']);
            $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, $element['status']);
            $objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, $element['urllink']);
            $rowCount++;
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('exceldata/'.$fileName);
        // download file
        header("Content-Type: application/vnd.ms-excel");
        //redirect(site_url().$fileName);
        echo json_encode(array('url' => site_url().'exceldata/'.$fileName));
    }

    public function todayexel() {

      $data = array(
                        'category' => $this->input->post('category'),
                        'selectagent' => $this->input->post('selectagent'),
                        'selectstatus' => $this->input->post('selectstatus'),
                        'mail' => $this->input->post('mail'),
                        'fromdate' => $this->input->post('fromdate'),
                        'todate' => $this->input->post('todate') 
                     );

        // create file name
        $fileName = 'data-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        $empInfo = $this->excelmodel->todayxls($data);
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Select Region');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Country');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Publisher');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Enquiry Type'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Source');  
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Creation Date');  
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Report Id');  
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Report Title');        
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Client Name');  
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Email');  
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Contact No');  
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Company');  
        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Designation');  
        $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Message'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Updated Date'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Status'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('R1', 'URL');  
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $element['selectregion']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $element['country']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $element['category']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $element['publisher']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $element['enquirytype']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $element['source']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $element['creationdate']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $element['reportid']);
            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $element['reporttitle']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $element['clientname']);
            $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $element['email']);
            $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $element['contactno']);
            $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $element['company']);
            $objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $element['designation']);
            $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $element['message']);
            $objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, $element['last_updated']);
            $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, $element['status']);
            $objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, $element['urllink']);
            $rowCount++;
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('exceldata/'.$fileName);
        // download file
        header("Content-Type: application/vnd.ms-excel");
        //redirect(site_url().$fileName);
        echo json_encode(array('url' => site_url().'exceldata/'.$fileName));
    }
    

}
?>