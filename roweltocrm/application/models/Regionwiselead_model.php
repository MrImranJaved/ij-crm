<?php  
 class Regionwiselead_model extends CI_Model  
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
    $region=$this->session->userdata('region');
    $this->db->select('L.lead_id,L.reporttitle,L.source,L.status,L.clientname,L.email,L.country,L.category,L.creationdate,L.last_updated,L.selectregion');
    $this->db->from('lead_table as L');
    $this->db->where('selectregion',$region);
   
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
 }  
 ?>