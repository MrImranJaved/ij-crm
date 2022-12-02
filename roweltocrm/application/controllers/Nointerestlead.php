<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class Nointerestlead extends CI_Controller {  
      //functions  
      
      function __construct()
    {
     
        parent::__construct();
        $this->load->model('Nointerestlead_model');
        $this->logged = $this->session_check();
    }	  
	function index(){  
           if ($this->logged === TRUE) {
           $this->load->view('no_interest'); 
		   }
           else	
		   {
			redirect('login');   
		   }			   
      } 
      function fetchnointerest_lead(){ 
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
			
		$fetch_data=$this->Nointerestlead_model->makefilter_datatables($data);
		$getalldata=$this->Nointerestlead_model->get_allfilter_data($data);
        $filterdata=$this->Nointerestlead_model->get_searchfiltered_data($data);
		}else
		{
        $fetch_data = $this->Nointerestlead_model->make_datatables(); 
        $getalldata=$this->Nointerestlead_model->get_all_data();
        $filterdata=$this->Nointerestlead_model->get_filtered_data();		
		}   
           $data = array();  
		   $i=0;
           foreach($fetch_data as $row)  
           {    $i=$i+1;
                $sub_array = array();  
					$sub_array[] = $i; 
					$sub_array[] ='<span title="'.$row->reporttitle.'" data-id="'.$row->lead_id.'" class="flag" id="flag'.$i.'" onclick="flagchange('.$i.');">'.substr($row->reporttitle,0,25).'...</span>';
					$sub_array[] =$row->source;
					if($row->status=='No Interest')
					{ 
					$sub_array[]='<button class="btn btn-warning btnjunk btnallstatus" style="background: black;font-size: 13px;">No Interest</button>';
					}
		            $sub_array[]=$row->clientname;
					$sub_array[]='<span title="'.$row->email.'">'.substr ($row->email,0,15).'</span>';
					$sub_array[]= $row->country;
					$sub_array[]=$row->category;
					$sub_array[]= date( "d-m-Y", strtotime($row->creationdate) );
					$sub_array[]=date( "d-m-Y H:i:s", strtotime($row->last_updated));
					if($this->session->userdata('login_usertype')=='Admin' AND $this->session->userdata('access_type')=='All')
                	{
					$sub_array[]='<a href="javascript:void(0);"Onclick="detadel('.$row->lead_id.')"><i class="fa fa-trash fadelete" style="font-size:30px;"></i></a>';
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