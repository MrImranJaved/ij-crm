<?php  
 class Nointerestlead_model extends CI_Model  
 {  
     // var $table = "lead_table";  
      //var $select_column = array("lead_id", "reporttitle", "clientname", "email");  
      var $order_column = array(null, "reporttitle", "clientname", null, null);
 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
         $this->load->database();
    }	  
    function make_query()  
    {  
    $login_id = $this->session->userdata('login_id');
    $login_usertype = $this->session->userdata('login_usertype');
    $data=array('No Interest');
    $this->db->select('L.lead_id,L.reporttitle,L.source,L.status,L.clientname,L.email,L.country,L.category,L.creationdate,L.last_updated,L.flag');
    $this->db->from('lead_table as L');
   
     if($login_usertype!='Admin')
    {
    $this->db->join('region_assign_table', 'L.selectregion = region_assign_table.region');
    $this->db->join('login', 'region_assign_table.user_id = login.login_id');
    //$this->db->where_in('lead_table.status',$data);
      $this->db->where('login.login_id',$login_id);
    }  
     $this->db->where_in('L.status',$data);
	 if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("L.reporttitle", $_POST["search"]["value"]);  
                //$this->db->or_like("L.clientname", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('L.lead_id', 'DESC');  
           }  
      }  
      function make_datatables(){  
           $this->make_query();  
           if(isset($_POST["length"]) && $_POST["length"] != -1) 
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get(); 
           return $query->result();  
      }  
      function get_filtered_data(){  
           $this->make_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data()  
      {  
            $this->make_query();  
     return $this->db->count_all_results();  
      }

    function makefilter_datatables($data){  
     $category = (!empty($data['category']) ? $data['category']: false);
    $selectagent = (!empty($data['selectagent']) ? $data['selectagent']: false);
    $email = (!empty($data['mail']) ? $data['mail'] : false);
    $status = (!empty($data['selectstatus']) ? $data['selectstatus'] : false);
    $fromdate= (!empty($data['fromdate']) ?date('Y-m-d', strtotime($data['fromdate'])) : false);
    $todate=(!empty($data['todate']) ?date('Y-m-d', strtotime($data['todate'])) : false);
    if($selectagent)
    {
    $selectagentquery=$this->db->where('login_id',$selectagent);
    $selectagentquery=$this->db->get('login');
    $selectagentresult=$selectagentquery->result_array();
    if($selectagentresult[0]['login_usertype']!='Admin')
    { 
    $sql1 ="SELECT * FROM region_assign_table where user_id='".$selectagent."'";
	$query = $this->db->query($sql1);
   	$gt='';
	foreach ($query->result() as $getregion)
      {
        $gt.=$getregion->region.',';  
      }
    $rigtspac=rtrim($gt,',');
    $allregion = explode(',', $rigtspac);
    //$allregion = "'" . str_replace(",", "','", $rigtspac) . "'";

   }
   }
	$data=array('No Interest');
    $login_id = $this->session->userdata('login_id');
    $login_usertype = $this->session->userdata('login_usertype');

    $this->db->select('L.lead_id,L.reporttitle,L.source,L.status,L.clientname,L.email,L.country,L.category,L.creationdate,L.last_updated,L.publisher,L.flag');
    $this->db->from('lead_table as L');
	 if($category){
		 $this->db->where('category',$category);
    }

    if($email){
		 $this->db->where('email',$email);
    }
   if($fromdate){
	   $this->db->where('creationdate BETWEEN "'.$fromdate.'" and "'.$todate.'"');
    }

    if($status)
	{		
		 $this->db->where('status',$status);
    }else
    {
		  $this->db->where_in('status',$data); 
    }
	 if($selectagent){
        if($selectagentresult[0]['login_usertype']!='Admin')
    { 
		$this->db->where_in('selectregion',$allregion);
      }
    }
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("reporttitle", $_POST["search"]["value"]);  
                //$this->db->or_like("L.clientname", $_POST["search"]["value"]);  
           }  
		   
    
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('L.lead_id', 'DESC');  
           }   
           if(isset($_POST["length"]) && $_POST["length"] != -1) 
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get(); 
           return $query->result();  
      }  
    function get_searchfiltered_data($data){  
    $category = (!empty($data['category']) ? $data['category']: false);
    $selectagent = (!empty($data['selectagent']) ? $data['selectagent']: false);
    $email = (!empty($data['mail']) ? $data['mail'] : false);
    $status = (!empty($data['selectstatus']) ? $data['selectstatus'] : false);
    $fromdate= (!empty($data['fromdate']) ?date('Y-m-d', strtotime($data['fromdate'])) : false);
    $todate=(!empty($data['todate']) ?date('Y-m-d', strtotime($data['todate'])) : false);
    if($selectagent)
    {
    $selectagentquery=$this->db->where('login_id',$selectagent);
    $selectagentquery=$this->db->get('login');
    $selectagentresult=$selectagentquery->result_array();
    if($selectagentresult[0]['login_usertype']!='Admin')
    { 
    $sql1 ="SELECT * FROM region_assign_table where user_id='".$selectagent."'";
	$query = $this->db->query($sql1);
   	$gt='';
	foreach ($query->result() as $getregion)
      {
        $gt.=$getregion->region.',';  
      }
    $rigtspac=rtrim($gt,','); 
    //$allregion = "'" . str_replace(",", "','", $rigtspac) . "'";
    $allregion = explode(',', $rigtspac);
   }
   }
	$data=array('No Interest');
    $login_id = $this->session->userdata('login_id');
    $login_usertype = $this->session->userdata('login_usertype');

    $this->db->select('L.lead_id,L.reporttitle,L.source,L.status,L.clientname,L.email,L.country,L.category,L.creationdate,L.last_updated,L.publisher,L.flag');
    $this->db->from('lead_table as L');
	 if($category){
		 $this->db->where('category',$category);
    }

    if($email){
		 $this->db->where('email',$email);
    }
   if($fromdate){
	   $this->db->where('creationdate BETWEEN "'.$fromdate.'" and "'.$todate.'"');
    }
   
  if($selectagent){
        if($selectagentresult[0]['login_usertype']!='Admin')
    { 
       $this->db->where_in('selectregion',$allregion);
      }
    }
    if($status)
	{		
		 $this->db->where('status',$status);
    }else
    {
		  $this->db->where_in('status',$data); 
    }
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("reporttitle", $_POST["search"]["value"]);  
                //$this->db->or_like("L.clientname", $_POST["search"]["value"]);  
           }  
		   
    
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('L.lead_id', 'DESC');  
           }  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_allfilter_data($data)  
      {  
           $category = (!empty($data['category']) ? $data['category']: false);
    $selectagent = (!empty($data['selectagent']) ? $data['selectagent']: false);
    $email = (!empty($data['mail']) ? $data['mail'] : false);
    $status = (!empty($data['selectstatus']) ? $data['selectstatus'] : false);
    $fromdate= (!empty($data['fromdate']) ?date('Y-m-d', strtotime($data['fromdate'])) : false);
    $todate=(!empty($data['todate']) ?date('Y-m-d', strtotime($data['todate'])) : false);
    if($selectagent)
    {
    $selectagentquery=$this->db->where('login_id',$selectagent);
    $selectagentquery=$this->db->get('login');
    $selectagentresult=$selectagentquery->result_array();
    if($selectagentresult[0]['login_usertype']!='Admin')
    { 
    $sql1 ="SELECT * FROM region_assign_table where user_id='".$selectagent."'";
	$query = $this->db->query($sql1);
   	$gt='';
	foreach ($query->result() as $getregion)
      {
        $gt.=$getregion->region.',';  
      }
    $rigtspac=rtrim($gt,','); 
    //$allregion = "'" . str_replace(",", "','", $rigtspac) . "'";
    $allregion = explode(',', $rigtspac);
   }
   }
	$data=array('No Interest');
    $login_id = $this->session->userdata('login_id');
    $login_usertype = $this->session->userdata('login_usertype');

    $this->db->select('L.lead_id,L.reporttitle,L.source,L.status,L.clientname,L.email,L.country,L.category,L.creationdate,L.last_updated,L.publisher,L.flag');
    $this->db->from('lead_table as L');
	 if($category){
		 $this->db->where('category',$category);
    }

    if($email){
		 $this->db->where('email',$email);
    }
   if($fromdate){
	   $this->db->where('creationdate BETWEEN "'.$fromdate.'" and "'.$todate.'"');
    }
   
  if($selectagent){
        if($selectagentresult[0]['login_usertype']!='Admin')
    { 
       $this->db->where_in('selectregion',$allregion);
    }
    }
    if($status)
	{		
		 $this->db->where('status',$status);
    }else
    {
		  $this->db->where_in('status',$data); 
    }
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("reporttitle", $_POST["search"]["value"]);  
                //$this->db->or_like("L.clientname", $_POST["search"]["value"]);  
           }  
		   
    
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('L.lead_id', 'DESC');  
           }    
     return $this->db->count_all_results();  
      }  	  
 }  
 ?>