<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Remindercontroller extends CI_Controller {

	function __construct()
    {
     
        parent::__construct();
        $this->load->model('remindermodel');
      
    }
    
    public function addreminder()
    {
	
                 if($this->input->post('submitreminder')=='submitreminder')
                 {       $reminder_date=$this->input->post('reminderdate');
                 	$creminder_date=date( "Y-m-d", strtotime($reminder_date) );
	            $data = array(
	            	    'lead_id' =>$this->input->post('leadid'),
						'reminder_date' => $creminder_date,
						'description' => $this->input->post('description')
					 );
	           
                 $result1=$this->remindermodel->insertreminder($data);
		         }
	}
	public function viewreminders()
	{
	 $result['fetchdata'] = $this->remindermodel->getreminderdata();	
	 $this->load->view('reminders',$result);	
	}
	public function updatereminders()
	{
	 	if ($this->logged === TRUE) {
       $updatereminder=$this->input->post('remindme');
        $id=$this->input->get('lead_id',true);
       
	if(isset($updatereminder))
	{
		$lead_id = $this->input->post('leadid');
		$description = $this->input->post('description');
	$data = array(
					'lead_id' => $this->input->post('leadid'),
					'description' => $this->input->post('description')
				 );
            
             $result=$this->mainmodel->updatereminder($data);
             echo json_encode(array('lead_id' => $lead_id,'description'=>$description));
			   if($result==1)
			   {
                 $this->session->set_flashdata('msg', 'Reminder Updated Sucessfully');
                
			   }
		}
           redirect('reminders');	
			
	         }else{
            redirect('login');
	      }
}
	public function deleteleadreminder()
	{
	 $id=$this->input->get('id',true);	
	 $result['deletedata'] = $this->remindermodel->deleteleadreminder($id);
	 if($result['deletedata']==1)
	 {
	   $this->session->set_flashdata('msg', 'Lead Reminder Deleted Sucessfully');	
	 }
	 redirect('viewreminders');
	}
}