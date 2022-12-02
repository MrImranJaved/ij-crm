<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chatcontroller extends CI_Controller {

    function __construct()
    {
     
        parent::__construct();
        $this->load->model('chatmodel');
      
    }

    public function addchat()
    {
    $submitchat=$this->input->post('submitchat');
        if($submitchat)
                 {       
                    $data = array(
                        'user_name' => $this->input->post('username'),
                        'lead_id' => $this->input->post('leadid'),
                        'comment' => $this->input->post('comment'),
                        'reply' => $this->input->post('checkboxreply')
                    );
               
                 $result1=$this->chatmodel->insertchat($data);

                        foreach ($result1 as $setcomments)
                        {
                            $output='';

                            if($setcomments->reply=='unchecked')
                        {   
                        $output.='<li class="left clearfix"><span class="chat-img pull-left">';
                            $output.='<img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" /></span>';
                           $output.='<div class="chat-body clearfix">';
                                $output.='<div class="header">';
                                    $output.='<strong class="primary-font namefont"> '.$setcomments->user_name.' </strong>';
                                $output.='</div>';
                               $output.='<p>'.$setcomments->comment.'</p>';
                               $timestamp=date('d-M-Y H:i a',strtotime($setcomments->chat_date));
                                    $day = date('l', strtotime($setcomments->chat_date));
                                    
                                $output.='<small class="pull-left text-muted chatdatetime"><span class="glyphicon glyphicon-time "></span>'.$day.' '.$timestamp.'</small>'; 
                            $output.='</div>';
                        $output.='</li>';
                        }
                        else{
                        $output.='<li class="right clearfix"><span class="chat-img pull-right">';
                        $output.='<img src="http://placehold.it/50/FA6F57/fff&text=C" alt="User Avatar" class="img-circle" /></span>';
                            $output.='<div class="chat-body clearfix">';
                                $output.='<div class="header">';
                                    $output.='<strong class="pull-right primary-font namefont">'.$setcomments->clientname.'</strong>';
                                $output.='</div><br>';
                                $output.='<p style="text-align:right">'.$setcomments->comment.'</p>';
                                    $timestamp=date('d-M-Y H:i a',strtotime($setcomments->chat_date));
                                    $day = date('l', strtotime($setcomments->chat_date));
                                $output.='<small class="pull-right text-muted chatdatetime"><span class="glyphicon glyphicon-time"></span>'.$day.' '.$timestamp.'</small>';
                            $output.='</div>';
                        $output.='</li>';
                      
                         }  
                   echo $output;
                     }
                 }
    }

}