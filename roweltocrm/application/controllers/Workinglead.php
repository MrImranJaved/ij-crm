<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class Workinglead extends CI_Controller {  
      //functions  
      
      function __construct()
    {
        parent::__construct();
        $this->load->model('workinglead_model');
        $this->logged = $this->session_check();
    }	  
	function index(){  
           if ($this->logged === TRUE) {
           $this->load->view('working_leads'); 
		   }
           else	
		   {
			redirect('login');   
		   }			   
      } 
      function fetch_lead(){ 
	    //echo $filter = $this->input->post('filter');
		if($this->input->post('filter')=='filter')
		{
		$data = array(
						'category' => $this->input->post('selectcategory'),
						'selectagent' => $this->input->post('selectagent'),
						'selectstatus' => $this->input->post('selectstatus'),
						'mail' => $this->input->post('mail'),
						'fromdate' => $this->input->post('fromdate'),
						'todate' => $this->input->post('todate') 
					 );
			
		$fetch_data=$this->workinglead_model->makefilter_datatables($data);
		$getalldata=$this->workinglead_model->get_allfilter_data($data);
        $filterdata=$this->workinglead_model->get_searchfiltered_data($data);
		}else
		{
        $fetch_data = $this->workinglead_model->make_datatables(); 
        $getalldata=$this->workinglead_model->get_all_data();
        $filterdata=$this->workinglead_model->get_filtered_data();		
		}   
           $data = array();  
		   $i=0;
           foreach($fetch_data as $row)  
           {    $i=$i+1;
                $sub_array = array();  
                    if($row->flag==0)
					{
						
					$sub_array[] ='<span class="flagcolor">'.$i.'</span>'; 
					$sub_array[] ='<span title="'.$row->reporttitle.'" data-id="'.$row->lead_id.'" class="flag flagcolor" id="flag'.$i.'" onclick="flagchange('.$i.');">'.substr($row->reporttitle,0,25).'...</span>';
					$sub_array[] ='<span class="flagcolor">'.$row->source.'</span>'; 
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
					$sub_array[]='<span class="flagcolor">'.$row->clientname.'</span>';
					$sub_array[]='<span title="'.$row->email.'" class="flagcolor">'.substr ($row->email,0,15).'</span>';
					$sub_array[]= '<span class="flagcolor">'.$row->country.'</span>';
					$sub_array[]='<span class="flagcolor">'.$row->category.'</span>';
					$sub_array[]= '<span class="flagcolor">'.date( "d-m-Y", strtotime($row->creationdate) ).'</span>';
					$sub_array[]='<span class="flagcolor">'.date( "d-m-Y H:i:s", strtotime($row->last_updated)).'</span>';
					$sub_array[]='<button type="button" onclick="junckmail('.$i.')" class="btn btn-danger btnjunk" name="junk'.$i.'" id="junk'.$i.'" value="No Interest">Junk</button>';
					}else{
					$sub_array[] = $i; 
					$sub_array[] ='<span title="'.$row->reporttitle.'" data-id="'.$row->lead_id.'" class="flag" id="flag'.$i.'" onclick="flagchange('.$i.');">'.substr($row->reporttitle,0,25).'...</span>';
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
		            $sub_array[]=$row->clientname;
					$sub_array[]='<span title="'.$row->email.'">'.substr ($row->email,0,15).'</span>';
					$sub_array[]= $row->country;
					$sub_array[]=$row->category;
					$sub_array[]= date( "d-m-Y", strtotime($row->creationdate) );
					$sub_array[]=date( "d-m-Y H:i:s", strtotime($row->last_updated));
					$sub_array[]='<button type="button" onclick="junckmail('.$i.')" class="btn btn-danger btnjunk" name="junk'.$i.'" id="junk'.$i.'" value="No Interest">Junk</button>';					
					}
			
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