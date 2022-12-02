<?
class Chatmodel extends CI_Model {
   
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
         $this->load->database();
    }
    
   public function insertchat($data)
  {
    $lead_id=$data['lead_id'];
    $query=$this->db->insert('chat_table',$data);
    
     $this->db->select('*');
    $this->db->from('chat_table');
    $this->db->join('lead_table', 'chat_table.lead_id = lead_table.lead_id');
    $query=$this->db->where('chat_table.lead_id',$lead_id);
    $query=$this->db->order_by('chat_table.chat_id','DESC');
    $query = $this->db->get();
    $result=$query->result();
    return $result;
  } 
}
?>