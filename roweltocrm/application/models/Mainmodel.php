<?
class Mainmodel extends CI_Model {
   
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
         $this->load->database();
    }
    function adduser($data)
      {
        $query=$this->db->insert('login',$data);
       return $query;
    
      }
    function addlead($data)
    {

     $query=$this->db->insert('lead_table',$data);
     return $query;
    }
    /*User*/
public function getuserreq() 
{
    $query=$this->db->order_by('login_id','asc');
    $query=$this->db->get('login');
    $result=$query->result();
     return $result;
}
public function fetchuserdata($id)
{
    $query=$this->db->where('login_id',$id);
    $query=$this->db->get('login');
    $result=$query->result();
     return $result; 
}
public function deletesingleuser($id)
{   $query=$this->db->where('login_id',$id);
    $query=$this->db->delete('login');
     return $query;
}
/*//User*/

public function gettodayslead()
{  
    $currentdate=date('Y-m-d');
    $login_id = $this->session->userdata('login_id');
    $login_usertype = $this->session->userdata('login_usertype');
    $this->db->select('L.lead_id,L.reporttitle,L.source,L.status,L.clientname,L.email,L.country,L.category,L.creationdate,L.last_updated,L.publisher,L.flag');
    $this->db->from('region_assign_table');
    $this->db->join('lead_table L', 'L.selectregion = region_assign_table.region');
    $this->db->join('login', 'region_assign_table.user_id = login.login_id');
    if($login_usertype!='Admin')
    {
      $this->db->where(array('login.login_id'=>$login_id,'L.creationdate'=>$currentdate));
    }
    else
    {
    $this->db->where(array('L.creationdate'=>$currentdate));
    }
    
    $query= $this->db->order_by('L.lead_id','desc');
    $query=$this->db->get();  
    $result=$query->result();
     return $result;
}
 public function filtertodaylead($data) {
    $currentdate=date('Y-m-d');
    $category = (!empty($data['category']) ? $data['category']: false);
    $selectagent = (!empty($data['selectagent']) ? $data['selectagent']: false);
    $email = (!empty($data['mail']) ? $data['mail'] : false);
    $status = (!empty($data['selectstatus']) ? $data['selectstatus'] : false);
    $fromdate= (!empty($data['fromdate']) ?date('Y-m-d', strtotime($data['fromdate'])) : false);
    $todate=(!empty($data['todate']) ?date('Y-m-d', strtotime($data['todate'])) : false);
    $sql = "SELECT L.lead_id,L.reporttitle,L.source,L.status,L.clientname,L.email,L.country,L.category,L.creationdate,L.last_updated,L.publisher,L.flag FROM lead_table L WHERE 1=1";
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
    $allregion = "'" . str_replace(",", "','", $rigtspac) . "'";

}
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
   
  if($selectagent){
        if($selectagentresult[0]['login_usertype']!='Admin')
    { 
        $sql.=" AND selectregion IN ($allregion)";
      }
    }
    if($status){
        $sql.=" AND `status` = '".$status."'";
    }else
    {
       $sql.=" AND `status` IN ('Sample Sent','In-Progress','Kind Request','Pipeline','No Budget','Special Leads','Reminder 1','Reminder 2','Nudge','Reminder 3','Extra Discount','Buy','No Interest')";
    }
    $sql.=" AND creationdate = '".$currentdate."'";
    $query = $this->db->query($sql) or die ($this->db->error);
    $result=$query->result();
     return $result;   
    
 }

public function deletesinglelead($id)
    {   $query=$this->db->where('lead_id',$id);
        $query=$this->db->delete('lead_table');
         return $query;
    }
public function getregionassireq()
{
                  $login_id = $this->session->userdata('login_id');
                  $login_usertype = $this->session->userdata('login_usertype');

                  $this->db->select('*');
                  $this->db->from('login');
                  $this->db->join('region_assign_table', 'region_assign_table.user_id = login.login_id');
                  if($login_usertype!='Admin')
                  {
                    $this->db->where('login.login_id',$login_id);
                  }
                  $query= $this->db->order_by('region_assign_table.region_id','desc');
                  $query=$this->db->get();  
                  $result=$query->result();
                   return $result;

}
public function deletesingleregion($id)
{   $query=$this->db->where('region_id',$id);
    $query=$this->db->delete('region_assign_table');
     return $query;
}
public  function addregionassign($data)
  {
    
    $query=$this->db->insert('region_assign_table',$data);
   return $query;
 }
  public function getsingleleaddetail($id)
{   
    
    $this->db->select('*');
    $this->db->from('region_assign_table');
    $this->db->join('lead_table', 'lead_table.selectregion = region_assign_table.region');
    $this->db->join('login', 'region_assign_table.user_id = login.login_id');
    $query=$this->db->where('lead_table.lead_id',$id);
    $query = $this->db->get();
    $result=$query->result();
    return $result;
}
public function formfetchlead($id)
{
    $query=$this->db->where('lead_id',$id);
    $query=$this->db->get('lead_table');
    $result=$query->result();
     return $result;  
}
public function statusfetchlead($data)
{   
    $lead_id=$data['lead_id'];
    $status=$data['status'];
    $lead_value=array('status'=>$status);
    $query=$this->db->where('lead_id',$lead_id);
    $query=$this->db->update('lead_table',$lead_value);

    $chatdata=array('lead_id'=>$lead_id,
                      'user_name'=>$data['user_name'],
                      'comment'=>$data['comment'],
                      'reply'=>'unchecked'
                    );
    $insertquery=$this->db->insert('chat_table',$chatdata);
    $this->db->from('chat_table');
    $this->db->join('lead_table', 'chat_table.lead_id = lead_table.lead_id');
    $query1=$this->db->where('chat_table.lead_id',$lead_id);
    $query1=$this->db->order_by('chat_table.chat_id','DESC');
    $query1= $this->db->get();
    $result=$query1->result();
    return $result;
}
public function updateleaddata($id,$data)
{
     $query=$this->db->where('lead_id', $id);
     $query=$this->db->update('lead_table', $data);
     return $query;  
}
public function fetchregiondata($id)
{
    $this->db->select('*');
    $this->db->from('region_assign_table');
    $this->db->join('login', 'login.login_id = region_assign_table.user_id');
    $query=$this->db->where('region_assign_table.region_id',$id);
    $query = $this->db->get();
    $result=$query->result();
    return $result;
}

public function updateregion($id,$data)
{
    $query=$this->db->where('region',$data['region']);
    $query = $this->db->get('region_assign_table');
    $cnt=$query->num_rows();
    if($cnt==0)
    {
     $query=$this->db->where('region_id', $id);
     $query=$this->db->update('region_assign_table', $data);
     return $query; 
    }else
    {
      return $query=0;   
    }
}
public function updateuser($id,$data)
{
     $query=$this->db->where('login_id', $id);
     $query=$this->db->update('login', $data);
     return $query;
}
public function insertjunk($data,$id)
  {
    $status=array('status'=>$data);
    $query=$this->db->where('lead_id', $id);
     $query=$this->db->update('lead_table',$status);
     return $query;
  } 
 public function filtersection($data) {
    
    $category = (!empty($data['category']) ? $data['category']: false);
    $selectagent = (!empty($data['selectagent']) ? $data['selectagent']: false);
    $email = (!empty($data['mail']) ? $data['mail'] : false);
    $status = (!empty($data['selectstatus']) ? $data['selectstatus'] : false);
    $fromdate= (!empty($data['fromdate']) ?date('Y-m-d', strtotime($data['fromdate'])) : false);
    $todate=(!empty($data['todate']) ?date('Y-m-d', strtotime($data['todate'])) : false);
    $sql = "SELECT L.lead_id,L.reporttitle,L.source,L.status,L.clientname,L.email,L.country,L.category,L.creationdate,L.last_updated,L.publisher,L.flag FROM lead_table as L WHERE 1=1";
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
    $allregion = "'" . str_replace(",", "','", $rigtspac) . "'";

}
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
   
  if($selectagent){
        if($selectagentresult[0]['login_usertype']!='Admin')
    { 
        $sql.=" AND selectregion IN ($allregion)";
      }
    }
    if($status){
        $sql.=" AND `status` = '".$status."'";
    }else
    {
       $sql.=" AND `status` IN ('Sample Sent','In-Progress','Kind Request','Pipeline','No Budget','Special Leads','Reminder 1','Reminder 2','Nudge','Reminder 3','Extra Discount')";
    }
    $sql.="order by lead_id DESC";
    $query = $this->db->query($sql) or die ($this->db->error);
    $result=$query->result();
     return $result;   
    
 }
public function changeflagmodel($id)
{
  if($this->session->userdata('login_usertype')=='Admin' AND $this->session->userdata('access_type')=='All')
  {
   return 0;
  }
  else{
     $flag=array('flag'=>1);
     $query=$this->db->where('lead_id', $id);
     $query=$this->db->update('lead_table', $flag);
     return $query;
  }
}
}
?>