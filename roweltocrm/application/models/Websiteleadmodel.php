<?
class Websiteleadmodel extends CI_Model {
   
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
         $this->load->database();
    }
    public function addwebsitelead($data)
    {
       
      $publisherid = (!empty($data['publisher']) ? $data['publisher']: false);
      if($publisherid){
    $query=$this->db->where('publisher_id',$data['publisher']);
    $query=$this->db->get('publishers');
    $result=$query->result_array();
    $publishername=$result[0]['publisher_name'];
  }

  $country = (!empty($data['country']) ? $data['country']: false);
    if($country){
    $query1=$this->db->where('country_name',$data['country']);
    $query1=$this->db->get('country_region');
    $result1=$query1->result_array();
    $region=$result1[0]['region'];
    }

    $email = (!empty($data['email']) ? $data['email']: false);
    if($email){
    $domain=$email;
    $c2maillist=array('gmail.com','hotmail.com','yahoo.com','qq.com','rediff.com','outlook.com');
  list($user, $domain) = explode('@', $domain);
  $getdomainarray=explode('@', $domain);
  $getdomain=implode('@', $getdomainarray);
    $verify_domain = checkdnsrr($domain,'MX');
    $verify_domain?"Verified":"Not Varified";
  if(in_array($getdomain, $c2maillist))
  {
    $category='c2';
  }
  elseif($verify_domain=='Verified')
  {
   $category='c1'; 
  }
  else
  {
    $category='c3';  
  }  
}
date_default_timezone_set('Asia/karachi');
$creation_time = date('h:i:s a');
$insertdata=array(
            'selectregion' =>  $region,
            'country' => $data['country'],
            'category' => $category,
            'publisher' => $publishername,
            'enquirytype' =>  $data['enquirytype'],
            'source' =>$data['source'],
            'creationdate' => $data['creationdate'],
            'creation_time' => $creation_time,
            'reportid' => $data['reportid'],
            'reporttitle' =>$data['reporttitle'],
            'clientname' => $data['clientname'],
            'email' => $data['email'],
            'contactno' => $data['contactno'],
            'company' => $data['company'],
            'designation' =>$data['designation'],
            'message' => $data['message'],
            'urllink' =>  $data['urllink']);
$insertquery=$this->db->insert('lead_table',$insertdata);
     return $insertquery;
}
}
?>