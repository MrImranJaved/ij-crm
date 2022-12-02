<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maincontroller extends CI_Controller {

	function __construct()
    {
     
        parent::__construct();
        $this->load->model('mainmodel');
        $this->logged = $this->session_check();
      
    }
	public function addlead()
	{
		if ($this->logged === TRUE) {
       $submit=$this->input->post('submit');

		if(isset($submit))
		{
		$c_date=$this->input->post('creationdate');
		$creation_date=date( "Y-m-d", strtotime($c_date) );
       date_default_timezone_set('Asia/karachi');
        $creation_time = date('h:i:s a');
		$data = array(
						'selectregion' => $this->input->post('selectregion'),
						'country' => $this->input->post('country'),
						'category' => $this->input->post('category'),
						'publisher' => $this->input->post('publisher'),
						'enquirytype' => $this->input->post('enquirytype'),
						'source' => $this->input->post('source'),
						'creationdate' => $creation_date,
						'creation_time' => $creation_time,
						'reportid' => $this->input->post('reportid'),
						'reporttitle' => $this->input->post('reporttitle'),
						'clientname' => $this->input->post('clientname'),
						'email' => $this->input->post('email'),
						'contactno' => $this->input->post('contactno'),
						'company' => $this->input->post('company'),
						'designation' => $this->input->post('designation'),
						'message' => $this->input->post('message'),
						'urllink' => $this->input->post('urllink')
					 );
                
                 $result=$this->mainmodel->addlead($data);
				  
				   if($result==1)
				   {
                     $this->session->set_flashdata('msg', 'Lead Added Sucessfully');
	                
				   }
				}
	                 $this->load->view('add_lead');	
				
		         }else{
                redirect('login');
		      }  
				  
		  }
    
    public function adduser()
	{
	
	 if ($this->logged === TRUE) {
	 $submit=$this->input->post('submit');
		if(isset($submit))
		{
		$data = array(
						'login_name' => $this->input->post('name'),
						'login_email' => $this->input->post('email'),
						'login_password' => $this->input->post('password'),
						'login_usertype' => $this->input->post('usertype'),
						'access_type' => $this->input->post('access_type')
					 );
		              $result=$this->mainmodel->adduser($data);
		         
		           if($result==1)
				    {
                     $this->session->set_flashdata('msg', 'User Added Sucessfully');
	                 }  
		}
		$this->load->view('add_user');
		}else{
        redirect('login');
		     }  
    
	}

	public function deletelead()
	{
	 $id=$this->input->get('id',true);	
	 $result['deletedata'] = $this->mainmodel->deletesinglelead($id);
	 if($result['deletedata']==1)
	 {
	   $this->session->set_flashdata('msg', 'Lead Deleted Sucessfully');	
	 }
	 redirect('nointerest');
	}
public function todayleads()
	{
    if ($this->logged === TRUE) {
    $filter = $this->input->post('filter');
		if(isset($filter))
		{
		$data = array(
						'category' => $this->input->post('selectcategory'),
						'selectagent' => $this->input->post('selectagent'),
						'selectstatus' => $this->input->post('selectstatus'),
						'mail' => $this->input->post('mail'),
						'fromdate' => $this->input->post('fromdate'),
						'todate' => $this->input->post('todate') 
					 );
		$result['fetchdata']=$this->mainmodel->filtertodaylead($data);
		$result['filtervalue']=$data;
		 $this->load->view('todayleads',$result);
	    }else{
       $data = array(	'category' =>'',
						'selectagent' =>'',
						'selectstatus' => '',
						'mail' => '',
						'fromdate' =>'',
						'todate' =>'');
        
	$result['fetchdata'] = $this->mainmodel->gettodayslead();
	$result['filtervalue']=$data;
	 $this->load->view('todayleads',$result);	
	}
	}else
	 {
      redirect('login');
	 }
 }

	public function regionassign()
	{
	if ($this->logged === TRUE) {
        if($this->input->post('submit')=='submit')
            {
	        $data = array(
			'user_id' => $this->input->post('selectuser'),
			'region' => $this->input->post('selectregion')
			);
          $result1=$this->mainmodel->addregionassign($data);
          $this->session->set_flashdata('msg', 'Region Assign Successfully');	
           
        }else{
		$result['fetchdata'] = $this->mainmodel->getregionassireq();
	    $this->load->view('region_assignment',$result);	
    	}
				
    	}else{
            redirect('login');
    	}
    	}
public function deleteregionassign()
	{
	 $id=$this->input->get('id',true);	
	 $result['deletedata'] = $this->mainmodel->deletesingleregion($id);
	 if($result['deletedata']==1)
	 {
	   $this->session->set_flashdata('msg', 'Region Deleted Sucessfully');	
	 }
	 redirect('regionassign');
	}
public function allusers()
	{
	  $result['fetchdata'] = $this->mainmodel->getuserreq();
	 $this->load->view('all_users',$result);	
	}
public function edituser()
	{
       $id=$this->input->get('login_id',true);
       
        $data['fetch']=$this->mainmodel->fetchuserdata($id);
        $this->load->view('edit_user',$data);
	    
	}
public function updateuser()
	{
     if ($this->logged === TRUE) {
       $update=$this->input->post('update');

        $id=$this->input->get('login_id',true);
       
		if(isset($update))
		{
		$data = array(
						'login_name' => $this->input->post('selectuser'),
						'login_email' => $this->input->post('email'),
						'login_usertype' => $this->input->post('usertype'),
						'access_type' => $this->input->post('access_type')
					 );
                
                 $result=$this->mainmodel->updateuser($id,$data);
				 
				   if($result==1)
				   {
                     $this->session->set_flashdata('msg', 'User Updated Sucessfully');
	                
				   }
				}
	                 redirect('allusers');	
				
		         }else{
                redirect('login');
		      }  

	    
	}

public function deleteuser()
	{
	 $id=$this->input->get('id',true);	
	 $result['deletedata'] = $this->mainmodel->deletesingleuser($id);
	 if($result['deletedata']==1)
	 {
	   $this->session->set_flashdata('msg', 'User Deleted Sucessfully');	
	 }
	 redirect('allusers');
	}

public function leaddetails()
	{
	    if ($this->logged === TRUE) {
		$id=$this->input->get('lead_id',true);
		$result['fetchdata'] = $this->mainmodel->getsingleleaddetail($id);
	    $this->load->view('lead_details',$result);
	     }
	}

public function leadedit()
	{ if ($this->logged === TRUE) {
		$id=$this->input->get('lead_id',true);
		$result['fetchdata'] = $this->mainmodel->formfetchlead($id);
	 $this->load->view('lead_edit',$result);
	}
	}
public function updatelead()
	{
		if ($this->logged === TRUE) {
       $update=$this->input->post('update');

        $id=$this->input->get('lead_id',true);
       
		if(isset($update))
		{
		$c_date=$this->input->post('creationdate');
       $creation_date=date( "Y-m-d", strtotime($c_date) );
		$data = array(
						'selectregion' => $this->input->post('selectregion'),
						'country' => $this->input->post('country'),
						'category' => $this->input->post('category'),
						'publisher' => $this->input->post('publisher'),
						'enquirytype' => $this->input->post('enquirytype'),
						'source' => $this->input->post('source'),
						'creationdate' => $creation_date,
						'reportid' => $this->input->post('reportid'),
						'reporttitle' => $this->input->post('reporttitle'),
						'clientname' => $this->input->post('clientname'),
						'email' => $this->input->post('email'),
						'contactno' => $this->input->post('contactno'),
						'company' => $this->input->post('company'),
						'designation' => $this->input->post('designation'),
						'message' => $this->input->post('message'),
						'urllink' => $this->input->post('urllink')
					 );
                
                 $result=$this->mainmodel->updateleaddata($id,$data);
				 // print_r($result);
				   if($result==1)
				   {
                     $this->session->set_flashdata('msg', 'Lead Updated Sucessfully');
	                
				   }
				}
	                 redirect('leaddetails?lead_id='.$id);	
				
		         }else{
                redirect('login');
		      }  
				  
		  }
public function updatestatus()
	{
		$data = array(
						'lead_id' =>$this->input->post('leadid'),
						'status' =>$this->input->post('status'),
						'user_name' =>$this->input->post('username'),
						'comment' =>$this->input->post('comment')
					);
		$status=$this->input->post('status');
		$result = $this->mainmodel->statusfetchlead($data);
		$output1='';
		foreach ($result as $setcomments)
                        {
                            $output='';

                            if($setcomments->reply=='unchecked')
                        {   
                        $output.='<li class="left clearfix"><span class="chat-img pull-left">';
                            $output.='<img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" /></span>';
                           $output.='<div class="chat-body clearfix">';
                                $output.='<div class="header">';
                                    $output.='<strong class="primary-font namefont"> '.$setcomments->user_name.' </strong>';
                                $output.='</div>';
                               $output.='<p>'.$setcomments->comment.'</p>';
                               $timestamp=date('d-M-Y H:i a',strtotime($setcomments->chat_date));
                                    $day = date('l', strtotime($setcomments->chat_date));
                                    
                                $output.='<small class="pull-left text-muted chatdatetime"><span class="glyphicon glyphicon-time "></span>'.$day.' '.$timestamp.'</small>'; 
                            $output.='</div>';
                        $output.='</li>';
                        }
                        else{
                        $output.='<li class="right clearfix"><span class="chat-img pull-right">';
                        $output.='<img src="http://placehold.it/50/FA6F57/fff&text=C" alt="User Avatar" class="img-circle" /></span>';
                            $output.='<div class="chat-body clearfix">';
                                $output.='<div class="header">';
                                    $output.='<strong class="pull-right primary-font namefont">'.$setcomments->clientname.'</strong>';
                                $output.='</div><br>';
                                $output.='<p style="text-align:right">'.$setcomments->comment.'</p>';
                                    $timestamp=date('d-M-Y H:i a',strtotime($setcomments->chat_date));
                                    $day = date('l', strtotime($setcomments->chat_date));
                                $output.='<small class="pull-right text-muted chatdatetime"><span class="glyphicon glyphicon-time"></span>'.$day.' '.$timestamp.'</small>';
                            $output.='</div>';
                        $output.='</li>';
                      
                         }
                        $output1 .=$output;
                     }
                     //echo $output;
                     echo  $status.'##$$##'.$output1;
		//echo json_encode(array('status' => $status,'chatid'=>$output1));
		
	}
	
    public function editregion()
	{
       $id=$this->input->get('region_id',true);
        $data['fetch']=$this->mainmodel->fetchregiondata($id);
        $this->load->view('edit_region',$data);
	    
	}
	 public function updateregion()
	{
     if ($this->logged === TRUE) {
       $update=$this->input->post('update');

       $id=$this->input->get('region_id',true);
       
		if(isset($update))
		{
		$data = array(
						'user_id' => $this->input->post('selectuser'),
						'region' => $this->input->post('selectregion')
						
					 );
                
                 $result=$this->mainmodel->updateregion($id,$data);
				 
				   if($result==0)
				   {
                     $this->session->set_flashdata('msg', 'Region Already Assigned');
	                
				   }
				   else
				   {
				     $this->session->set_flashdata('msg', 'Region Updated Sucessfully');
	                  
				   }
				}
	                 redirect('regionassign');	
				
		         }else{
                redirect('login');
		      }  

	    
	}

	 public function session_check()
    {
        if($this->session->userdata('login_email') != null)
            return TRUE;
        else
            return FALSE;
    }
    public function addjunk()
    {
	$junk=$this->input->post('junk');
		if($junk)
                 {       
	            	
	            	$data=$this->input->post('junk');
	            	$id=$this->input->post('hiddenid');
	           
                 $result1=$this->mainmodel->insertjunk($data,$id);
		         }
	}
	public function updateflag()
    {
	$leadid=$this->input->post('leadid');
    $result=$this->mainmodel->changeflagmodel($leadid);
    if($result){
   	$flag=1;
    echo json_encode(array('leadid' => $leadid,'flag'=>$flag));
  
    }
	}
	
}