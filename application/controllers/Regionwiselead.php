<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class Regionwiselead extends CI_Controller {  
 
      function __construct()
    {
        parent::__construct();
         $this->load->library('session');
        $this->load->model('Regionwiselead_model');
        $this->logged = $this->session_check();
    }	  
	function index(){  
           if ($this->logged === TRUE) {
               
           $regiond=$this->input->get('region',true);
           $this->session->set_userdata('region', $regiond);
           $this->load->view('regionwiselead'); 
		   }
           else	
		   {
			redirect('login');   
		   }			   
      } 
      function fetchregion_lead(){ 
        $fetch_data = $this->Regionwiselead_model->make_datatables(); 
        $getalldata=$this->Regionwiselead_model->get_all_data();
        $filterdata=$this->Regionwiselead_model->get_filtered_data();		
	  
           $data = array();  
		   $i=0;
           foreach($fetch_data as $row)  
               {    $i=$i+1;
                    $sub_array = array();  
                    
					$sub_array[] = $i; 
					$sub_array[] ='<span title="'.$row->reporttitle.'" data-id="'.$row->lead_id.'" class="flag" id="flag'.$i.'" onclick="flagchange('.$i.');">'.substr($row->reporttitle,0,25).'...</span>';
					$sub_array[] =$row->selectregion;
					$sub_array[] =$row->source;
					if($row->status=='Sample Sent')
					{ 
					$sub_array[]='<button class="btn btn-success btnsample btnallstatus">Sample Sent</button>';
					}
					elseif($row->status=='Kind Request')
					{ 
					$sub_array[]='<button class="btn btn-default btnkindreq btnallstatus" style="background: #ea0d55ba;font-size: 0.9em;">Kind Request</button>';
					}
					elseif($row->status=='In-Progress')
					{
					$sub_array[]='<button class="btn btn-default btninprogres btnallstatus" style="background: #55d022;">In-progress</button>';
					 }
					elseif($row->status=='Pipeline')
					{
					$sub_array[]='<button class="btn btn-default btninprogres btnallstatus" style="background: #4d87d0; font-size: 0.9em">Pipeline</button>';
					}
					elseif($row->status=='No Budget')
					{ 
					$sub_array[]='<button class="btn btn-default btninprogres btnallstatus" style="background: #4a1f25f5;font-size: 0.9em">No Budget</button>';
					}
					elseif($row->status=='Special Leads')
					{ 									
					$sub_array[]='<button class="btn btn-default btninprogres btnallstatus" style="background: #bb2ee8; font-size: 0.9em">Special Leads</button>';
					}
					elseif($row->status=='Reminder 1')
					{ 
					$sub_array[]='<button class="btn btn-default btninprogres btnallstatus" style="background: #d8b226;">Reminder 1</button>';
					}
					elseif($row->status=='Reminder 2'){ 
					$sub_array[]='<button class="btn btn-default btninprogres btnallstatus" style="background: #da1313;">Reminder 2</button>';
					}
					elseif($row->status=='Nudge')
					{
					$sub_array[]='<button class="btn btn-default btninprogres btnallstatus" style="background: #b7aa0a; font-size: 0.9em">Nudge</button>';
					}
					elseif($row->status=='Reminder 3')
					{
					$sub_array[]='<button class="btn btn-default btninprogres btnallstatus" style="background: #00d756;">Reminder 3</button>';
					 }
					elseif($row->status=='Extra Discount')
					{ 
					$sub_array[]='<button class="btn btn-default btninprogres btnallstatus" style="background: #00c6d7; font-size:0.9em">Extra Discount</button>';
					}
					elseif($row->status=='Buy')
					{ 
					$sub_array[]='<button class="btn btn-default btninprogres btnallstatus" style="background: #00c6d7; font-size:0.9em">Extra Discount</button>';
					}
					elseif($row->status=='No Interest')
					{ 
					$sub_array[]='<button class="btn btn-default btninprogres btnallstatus" style="background: #4baf4a; font-size: 13px">Buy</button>';
					}
		            $sub_array[]=$row->clientname;
					$sub_array[]='<span title="'.$row->email.'">'.substr ($row->email,0,15).'</span>';
					$sub_array[]= $row->country;
					$sub_array[]=$row->category;
					$sub_array[]= date( "d-m-Y", strtotime($row->creationdate) );
					$sub_array[]=date( "d-m-Y H:i:s", strtotime($row->last_updated));
				
                    $data[] = $sub_array;  
           }  
                $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $getalldata,  
                "recordsFiltered"     =>        $filterdata,  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      }  
	   public function session_check()
    {
        if($this->session->userdata('login_email') != null)
            return TRUE;
        else
            return FALSE;
    }
 }  
 ?>