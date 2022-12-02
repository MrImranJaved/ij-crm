<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Websiteleadcontroller extends CI_Controller {

	function __construct()
    {
     
        parent::__construct();
        $this->load->model('websiteleadmodel');
    }
	public function addLeadThroghWebsite()
	{
	     
$enquiry_type_id=$this->input->post('enquiry_type_id');
if($enquiry_type_id==1){
$enquirytype='Enquiry';
}
else{
  $enquirytype='Sample';
}
$source_id=$this->input->post('source_id');
switch($source_id)
{
case 1:
$source='Apex Market Reports';
break;
case 4:
$source='Eminent Market';
break;
case 5:
$source='Accord Market';
break;   
case 6:
$source='Apex Market Research';
break;
  }
      $c_date=date('Y-m-d');
       $creation_date=date( "Y-m-d", strtotime($c_date) );
    $data = array(
            'country' => $this->input->post('enquiry_country'),
            'publisher' => $this->input->post('publisher_id'),
            'enquirytype' =>$enquirytype,
            'source' => $source,
            'creationdate' => $creation_date,
            'creation_time' => $creation_time,
            'reportid' =>$this->input->post('report_id'),
            'reporttitle' => $this->input->post('report_title'),
            'clientname' => $this->input->post('enquiry_name'),
            'email' => $this->input->post('enquiry_email'),
            'contactno' => $this->input->post('enquiry_phone'),
            'company' => $this->input->post('enquiry_company'),
            'designation' => $this->input->post('enquiry_title'),
            'message' => $this->input->post('enquiry_description'),
            'urllink' => $this->input->post('urllink')
           );
    $result=$this->websiteleadmodel->addwebsitelead($data);

} 
}