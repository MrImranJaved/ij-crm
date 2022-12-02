<?php

class Excelmodel extends CI_Model {
    // get employee list
     function __construct()
    {
        // Call the Model constructor
        parent::__construct();
         $this->load->database();
    }
    public function employeeList($data) {
    
    	    $category = (!empty($data['category']) ? $data['category']: false);
		    $selectagent = (!empty($data['selectagent']) ? $data['selectagent']: false);
		    $email = (!empty($data['mail']) ? $data['mail'] : false);
		    $status = (!empty($data['selectstatus']) ? $data['selectstatus'] : false);
		    $fromdate= (!empty($data['fromdate']) ?date('Y-m-d', strtotime($data['fromdate'])) : false);
		    $todate=(!empty($data['todate']) ?date('Y-m-d', strtotime($data['todate'])) : false);
       
    $sql = "SELECT * FROM lead_table WHERE 1=1";
    if($selectagent)
    {
    $this->db->select('*');
    $this->db->from('region_assign_table');
    $this->db->where('region_assign_table.user_id',$selectagent);
    $leadquery = $this->db->get();
    $setregion=$leadquery->result();
    $gt='';
    foreach($setregion as $reg)
    {
     $gt.=$reg->region.',';  
    }
   $rigtspac=rtrim($gt,','); 
   $allregion = "'" . str_replace(",", "','", $rigtspac) . "'";

    }
    if($category){
        $sql.=" AND category = '".$category."'";
    }

    if($email){
        $sql.=" AND email = '".$email."'";
    }
   if($fromdate){
        $sql.=" AND `creationdate` BETWEEN '".$fromdate."' and '".$todate."'";
    }

    if($selectagent)
    {
       $sql.=" AND selectregion IN ($allregion)";
    }

    if($status){
        $sql.=" AND `status` = '".$status."'";
    }else
    {
       $sql.=" AND `status` IN ('Sample Sent','In-Progress','Kind Request','Pipeline','No Budget','Special Leads','Reminder 1','Reminder 2','Nudge','Reminder 3','Extra Discount')";
    }
    $sql.="order by lead_id DESC";
    $query = $this->db->query($sql) or die ($this->db->error);
    $result=$query->result_array();
     return $result;   
    }
    
public function excelallleads($data) {
    $login_id = $this->session->userdata('login_id');
    $fromdate= (!empty($data['fromdate']) ?date('Y-m-d', strtotime($data['fromdate'])) : false);
    $todate=(!empty($data['todate']) ?date('Y-m-d', strtotime($data['todate'])) : false);
       
    $sql = "SELECT * FROM lead_table WHERE 1=1";
    if($this->session->userdata('login_usertype')!='Admin')
	{	
    $this->db->select('*');
    $this->db->from('region_assign_table');
    $this->db->where('region_assign_table.user_id',$login_id);
    $leadquery = $this->db->get();
    $setregion=$leadquery->result();
    $gt='';
    foreach($setregion as $reg)
    {
     $gt.=$reg->region.',';  
    }
   $rigtspac=rtrim($gt,','); 
   $allregion = "'" . str_replace(",", "','", $rigtspac) . "'";

    }
 
   if($fromdate){
        $sql.=" AND `creationdate` BETWEEN '".$fromdate."' and '".$todate."'";
    }

    if($this->session->userdata('login_usertype')!='Admin')
	{
       $sql.=" AND selectregion IN ($allregion)";
    }
    $sql.="order by lead_id DESC";
    $query = $this->db->query($sql) or die ($this->db->error);
    $result=$query->result_array();
    return $result;   
}
public function todayxls($data) {
    
   $currentdate=date('Y-m-d');
     $category = (!empty($data['category']) ? $data['category']: false);
		    $selectagent = (!empty($data['selectagent']) ? $data['selectagent']: false);
		    $email = (!empty($data['mail']) ? $data['mail'] : false);
		    $status = (!empty($data['selectstatus']) ? $data['selectstatus'] : false);
		    $fromdate= (!empty($data['fromdate']) ?date('Y-m-d', strtotime($data['fromdate'])) : false);
		    $todate=(!empty($data['todate']) ?date('Y-m-d', strtotime($data['todate'])) : false);
       
    $sql = "SELECT * FROM lead_table WHERE 1=1";
    if($selectagent)
    {
    $this->db->select('*');
    $this->db->from('region_assign_table');
    $this->db->where('region_assign_table.user_id',$selectagent);
    $leadquery = $this->db->get();
    $setregion=$leadquery->result();
    $gt='';
    foreach($setregion as $reg)
    {
     $gt.=$reg->region.',';  
    }
   $rigtspac=rtrim($gt,','); 
   $allregion = "'" . str_replace(",", "','", $rigtspac) . "'";

    }
    if($category){
        $sql.=" AND category = '".$category."'";
    }

    if($email){
        $sql.=" AND email = '".$email."'";
    }
   if($fromdate){
        $sql.=" AND `creationdate` BETWEEN '".$fromdate."' and '".$todate."'";
    }

    if($selectagent)
    {
       $sql.=" AND selectregion IN ($allregion)";
    }

    if($status){
        $sql.=" AND `status` = '".$status."'";
    }else
    {
       $sql.=" AND `status` IN ('Sample Sent','In-Progress','Kind Request','Pipeline','No Budget','Special Leads','Reminder 1','Reminder 2','Nudge','Reminder 3','Extra Discount','Buy','No Interest')";
    }
    $sql.=" AND creationdate='".$currentdate."'";
    $sql.="order by lead_id DESC";
    $query = $this->db->query($sql) or die ($this->db->error);
    $result=$query->result_array();
     return $result;   
}
    
}
?>