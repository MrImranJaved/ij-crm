<? class Loginmodel extends CI_Model {
   
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
         $this->load->database();
    }
    
    function logindata($data)
    {
       $this->db->where('login_email', $data['login_email']);
       $this->db->where('login_password', $data['login_password']);
       $query = $this->db->get('login');
       $row = $query->row();
       $cnt=$query->num_rows();
       $cnt;
        if($cnt == 1) {
         
            return  $row = $query->row();
          }
     else 
       {
      return false;
      }
        
    }
     function getleadtoday()
    {  
    $currentdate=date('Y-m-d');
    $login_id = $this->session->userdata('login_id');
    $login_usertype = $this->session->userdata('login_usertype');
    $this->db->select('creationdate');
    $this->db->from('region_assign_table');
    $this->db->join('lead_table', 'lead_table.selectregion = region_assign_table.region');
    $this->db->join('login', 'region_assign_table.user_id = login.login_id');
    if($login_usertype!='Admin')
    {
      $this->db->where(array('login.login_id'=>$login_id,'lead_table.creationdate'=>$currentdate));
    }
    else
    {
    $this->db->where(array('lead_table.creationdate'=>$currentdate));
    }
    $query=$this->db->get();  
    $cnt=$query->num_rows(); 
    return $cnt;
    }
   function getleadstatus()
    { 
    $login_id = $this->session->userdata('login_id');
    $login_usertype = $this->session->userdata('login_usertype');
    if($login_usertype=='Admin')
    {
    $this->db->select('count(B.status) as stat,A.status');
    $this->db->from('lead_table as B');
    $this->db->join('status_table as A', 'B.status = A.status','right');
    $this->db->group_by('A.status');
    $query=$this->db->get();
    }else
    {
    $sql1 ="SELECT * FROM region_assign_table where user_id='".$login_id."'";
	$queryreg = $this->db->query($sql1);
   	$gt='';
	foreach ($queryreg->result() as $getregion)
      {
        $gt.=$getregion->region.',';  
      }
    $rigtspac=rtrim($gt,','); 
    $allregion = "'" . str_replace(",", "','", $rigtspac) . "'";    
    $sql="select count(B.status) as stat,A.status from status_table as A
   LEFT JOIN
   (
   SELECT status FROM lead_table 
   WHERE selectregion IN($allregion)) B
   ON A.status = B.status
   GROUP BY A.status  "; 
    $query = $this->db->query($sql); 
    }
    $cnt=$query->result();
    return $cnt;
   
    }
    function regionwiselead()
    {    
      $sql="select A.region_name, count(B.selectregion) as region from lead_table as B
        RIGHT JOIN region_table as A on B.selectregion=A.region_name
        GROUP by A.region_name";
      $query = $this->db->query($sql); 
      $result=$query->result();
      return $result;
    }
    
    function getlastsevenday()
    {
    $sql="select 
       COALESCE((SELECT COUNT(lead_id)
                 FROM  lead_table
                 WHERE `creationdate` = a.Date), 0) as COUNT
            from (
                select curdate() - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY as Date
                from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a
                cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b
                cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c
            ) a
            where a.Date between DATE_SUB(CURDATE(), INTERVAL 6 DAY) and CURDATE()
            ORDER BY a.Date";
    	$query = $this->db->query($sql); 
    	$result=$query->result();
    	return $result;
    }
  
    function categoryleadcnt()
    { 
      $sql="select A.category_name, count(B.category) as count from lead_table as B
        RIGHT JOIN category_table as A on B.category=A.category_name
        GROUP by A.category_name";
      $query = $this->db->query($sql); 
      $result=$query->result();
      return $result;
    }
    function forgotpassword($forgotemail)
    {
      $this->db->where('login_email',$forgotemail);
      $query = $this->db->get('login');
      $cnt=$query->num_rows(); 
       $result=$query->result_array();
      
       if($cnt>=1)
      {
        return $result;
       
      }else
      {
      return $result=0; 
      }
}
}
?>