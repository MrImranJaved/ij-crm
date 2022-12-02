<?
class Remindermodel extends CI_Model {
   
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
         $this->load->database();
    }
    
   public function insertreminder($data)
  {
    $query=$this->db->insert('reminder_table',$data);
     return $query;
  } 
   public function getreminderdata()
  {
    $login_id = $this->session->userdata('login_id');
    $login_usertype = $this->session->userdata('login_usertype');

    $this->db->select('reminder_table.reminder_id,reminder_table.reminder_date,reminder_table.updated_at,reminder_table.description,lead_table.lead_id');
    $this->db->from('reminder_table');
    $this->db->join('lead_table', 'lead_table.lead_id = reminder_table.lead_id');
    
    if($login_usertype!='Admin')
    {
      $this->db->join('region_assign_table', 'lead_table.selectregion = region_assign_table.region');
      $this->db->join('login', 'region_assign_table.user_id = login.login_id');
      $this->db->where('login.login_id',$login_id);
    }
    $this->db->order_by('reminder_table.reminder_id','desc');
     $query=$this->db->get();  
     $result=$query->result();
     return $result;
  }
  public function updatereminder($data)
  {
     $query=$this->db->where('lead_id',$data['lead_id']);
     $query=$this->db->update('reminder_table', $data['description']);
     return $query;
  }
 public function deleteleadreminder($id)
    {   $query=$this->db->where('lead_id',$id);
        $query=$this->db->delete('reminder_table');
         return $query;
    }
}
?>