<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logincontroller extends CI_Controller {

	function __construct()
    {
     
        parent::__construct();
        $this->load->model('loginmodel');
        $this->logged = $this->session_check();
        $this->load->helper('cookie');
        $this->load->library('email');
    }
    	public function index()
	{
	    redirect('login');
	}
	public function login()
	{
	 $this->load->view('login');	
	}
    
    public function loginprocess()
	{
      $submit=$this->input->post('submit');
		if(isset($submit))
		{
		$data = array(
						'login_email' => $this->input->post('email'),
						'login_password' => $this->input->post('password'),
                        'remembermecheck' =>$this->input->post('remembermecheck')
					 );
        $email=$this->input->post('email');
        $password= $this->input->post('password');
        $remembermecheck=$this->input->post('remembermecheck');
		$result=$this->loginmodel->logindata($data);
		$array = json_decode(json_encode($result), True);
	       if ($result != false) {
                if($remembermecheck!=''){
                  setcookie('email', $email, time() + (86400 * 30), "/");
                  setcookie('password', $password, time() + (86400 * 30), "/");
                  setcookie('remembermecheck', $remembermecheck, time() + (86400 * 30), "/");
                }
                else {
                if($this->input->cookie('email',true)!='') {
                    delete_cookie ("email");
                }
               if($this->input->cookie('password',true)!='') {
                    delete_cookie ("password");
                }
                if($this->input->cookie('remembermecheck',true)!='') {
                    delete_cookie ("remembermecheck");
                }
            }   
            }
            else
            {
           $this->session->set_flashdata('msg', 'Incorrect Username Or Password');
	       redirect('login');   
            }
         $this->session->set_userdata($array);
  		 redirect('dashboard');
	     }
	     else
	     {
	     	$this->session->set_flashdata('msg', 'Incorrect Username Or Password');
	       redirect('login');
	     }
	 }
	
	public function forgotpassword()
	{
	 $this->load->view('forgotpassword');	
	}
public function dashboard()
	{
	if ($this->logged === TRUE) {
             //$array = json_decode(json_encode($sesdata), True);
             //$this->session->set_userdata($array);
             $data['gettodaylead'] =$this->loginmodel->getleadtoday();
             $data['getleadstatus'] =$this->loginmodel->getleadstatus();
             $data['region']=$this->loginmodel->regionwiselead();
             $data['lastseven']=$this->loginmodel->getlastsevenday();
             $data['catagorycnt']=$this->loginmodel->categoryleadcnt();
             $this->load->view('index',$data);
          } 
          else
         {
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

	public function logout() 
	{
	  $this->session->sess_destroy();	
	  redirect('login');
	}
    public function forgotpassprocess()
    {
      $submitforgot=$this->input->post('submit');
      if(isset($submitforgot)){ 
    $forgotemail=$this->input->post('emailforgot'); 

    }
  
    $resultdata=$this->loginmodel->forgotpassword($forgotemail);
    if($resultdata!=0)
    {
    foreach($resultdata as $row) {
              $login_name=$row['login_name'];
              $login_email=$row['login_email'];
             $login_password=$row['login_password'];
             $login_usertype=$row['login_usertype'];
             } 
  
$message='<table style="border-collapse: collapse;border: 1px solid black;">';
$message .='<tr>';
$message .='<th style="border: 1px solid black;">Login Name</th>';
$message .='<th style="border: 1px solid black;">Login E-mail</th>';
$message .='<th style="border: 1px solid black;">Login Password</th>';
$message .='</tr>';
$message .='<tr>';
$message .='<td style="border: 1px solid black;">'.$login_name.'</td>';
$message .='<td style="border: 1px solid black;">'.$login_email.'</td>';
$message .='<td style="border: 1px solid black;">'.$login_password.'</td>';
$message .='</tr>';
$message .='</table>';
$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
$this->email->set_header('Content-type', 'text/html');  
$email_setting  = array('mailtype'=>'html');
$this->email->initialize($email_setting);
$this->email->from('deepak.y@apexmarketsresearch.com');
$this->email->to($login_email);
$this->email->subject('Forgot APEX CRM Password');
$this->email->message($message);
$this->email->send();
redirect('login');
}else
{
  	$this->session->set_flashdata('msg', 'Kindly Enter Registerd Email Address');    
  redirect('forgotpassword');  
}
}

}