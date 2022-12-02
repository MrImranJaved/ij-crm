<? include_once('include/header.php');?>

							<!--//outer-wp-->
	<div class="outter-wp">
					<!--/sub-heard-part-->
				
		<form action="" method="post" onsubmit="" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12" style="margin-bottom: 1.5%;">
				     <div class="modal fade myModal" id="myModal"  role="dialog">
								<div class="modal-dialog">
										    
								<!-- Modal content-->
									<div class="modal-content" style="width: 47%; padding: 0%;">
										<div class="modal-header">
										   <button type="button" class="close" data-dismiss="modal">&times;</button>
										     <h4 class="modal-title">Remind me</h4>
										</div>
									
					                 <form action="<?=base_url()?>region_assignment" method="post" enctype="multipart/form-data">
										<div class="modal-footer">
										     <button type="cancel" class="btn btn-default" data-dismiss="modal" style="margin-right: 28%;">Cancel</button>
										     <button type="submit" id="submit" class="btn btn-default" data-dismiss="modal">Remind me</button>
										       		</div>
										        </form>
										      </div>
										      
										    </div>
										  </div>
										  <?
											foreach ($fetchdata as $getdata)
										{	
										?>
					<input type="hidden" id="hidden_leadid" name="hidden_leadid" value="<?=$getdata->lead_id?>">	<button class="btn btn-default btnleaddetail" style="background: #33575d7a;" type="submit"><a href="<?php echo base_url(); ?>leadedit?lead_id=<?=$getdata->lead_id;?>">Edit</a></button>
					<button class="btn btn-default btnleaddetail remindme" id="remindme" name="remindme" type="button" data-toggle="modal" data-target="#myModal1" style="background: #4c4545;" type="submit">Remind Me</button>
								<!-- Modal -->
										  <div class="modal fade" id="myModal1" role="dialog">
										    <div class="modal-dialog">
										    
										      <!-- Modal content-->
										      <div class="modal-content">
										        <div class="modal-header">
										          <button type="button" class="close" data-dismiss="modal">&times;</button>
										          <h4 class="modal-title">CRM</h4>
										        </div>
										        <div class="modal-body">
					<form action="" method="post" onsubmit="return validation();" enctype="multipart/form-data">
										        		<div class="row">
																	<div class="col-md-12">
																	<div class="form-group">
																	<label>Reminder Date</label> 
																 <input type="text" class="form-control" id="reminderdate" value="" name="reminderdate" placeholder="Enter reminder date.." readonly>
																    	
																  		<span class="errormesage" id="reminderdate_err"></span>
																</div>
															</div>
																	<div class="col-md-12">
																		<div class="form-group">
																	<label>Description</label> 
																	<input type="text" class="form-control" id="description" value="" name="description" placeholder="Enter description..">
																  		<span class="errormesage" id="description_err"></span>
																	</div> 
														</div>
													</div>
										        <div class="modal-footer">
										          <button type="cancel" class="btn btn-default" data-dismiss="modal">Cancel</button>
										          <button type="submit" name="submitreminder" id="submitreminder" value="submitreminder" class="btn btn-default submitreminder" data-dismiss="modal">Remind</button>
										        </div>
										        </form>
										        </div>
										      </div>
										      
										    </div>
										  </div>
										  <!--//Model content-->

					<button class="btn btn-default btnleaddetail " type="button" data-toggle="modal" data-target="#myModal2" style="background: #2a8014;" type="submit">Sample Sent</button>
					<div class="modal fade" id="myModal2" role="dialog">
										    <div class="modal-dialog">
										    
										      <!-- Modal content-->
										      <div class="modal-content">
										        <div class="modal-header">
										          <button type="button" class="close" data-dismiss="modal">&times;</button>
										          <h4 class="modal-title">Make status Sample Sent</h4>
										        </div>
										        <div class="modal-body">
					<form action="" method="post" onsubmit="return validation();" enctype="multipart/form-data">
										        		<div class="row">
																	<div class="col-md-12">
																	<div class="form-group">
																	<label>Do you really want to make status Sample Sent?</label> 
																</div>
															</div>				
													</div>
										        <div class="modal-footer">
										          <button type="cancel" class="btn btn-default" data-dismiss="modal">Close</button>
										          <button type="submit" name="submitsamplesent" id="submitsamplesent" value="Sample Sent" class="btn btn-default updatestatusbtn" data-dismiss="modal" style="background: #2a8014;">Sample Sent</button>
										        </div>
										        </form>
										        </div>
										      </div>
										      
										    </div>
										  </div>
										  <!--//Model content-->
					<button class="btn btn-default btnleaddetail" type="button" data-toggle="modal" data-target="#myModal3"style="background: #ea0d55ba;" type="submit">Kind Request</button>
					<div class="modal fade" id="myModal3" role="dialog">
										    <div class="modal-dialog">
										    
										      <!-- Modal content-->
										      <div class="modal-content">
										        <div class="modal-header">
										          <button type="button" class="close" data-dismiss="modal">&times;</button>
										          <h4 class="modal-title">Make status Kind Request</h4>
										        </div>
										        <div class="modal-body">
					<form action="" method="post" onsubmit="return validation();" enctype="multipart/form-data">
										        		<div class="row">
																	<div class="col-md-12">
																	<div class="form-group">
																	<label>Do you really want to make status Kind Request?</label> 
																</div>
															</div>				
													</div>
										        <div class="modal-footer">
										          <button type="cancel" class="btn btn-default" data-dismiss="modal">Close</button>
										          <button type="submit" name="submitkindreq" id="submitkindreq" value="Kind Request" class="btn btn-default updatestatusbtn" data-dismiss="modal" style="background: #ea0d55ba;">Kind Request</button>
										        </div>
										        </form>
										        </div>
										      </div>
										      
										    </div>
										  </div>
										  <!--//Model content-->
					<button class="btn btn-default btnleaddetail" type="button" data-toggle="modal" data-target="#myModal4"style="background: #d8b226;" type="submit">R1</button>
					<div class="modal fade" id="myModal4" role="dialog">
										    <div class="modal-dialog">
										    
										      <!-- Modal content-->
										      <div class="modal-content">
										        <div class="modal-header">
										          <button type="button" class="close" data-dismiss="modal">&times;</button>
										          <h4 class="modal-title">Make status Reminder 1</h4>
										        </div>
										        <div class="modal-body">
					<form action="" method="post" onsubmit="return validation();" enctype="multipart/form-data">
										        		<div class="row">
																	<div class="col-md-12">
																	<div class="form-group">
																	<label>Do you really want to make status Reminder 1?</label> 
																</div>
															</div>				
													</div>
										        <div class="modal-footer">
										          <button type="cancel" class="btn btn-default" data-dismiss="modal">Close</button>
										          <button type="submit" name="submitr1" id="submitr1" value="Reminder 1" class="btn btn-default updatestatusbtn" data-dismiss="modal" style="background: #d8b226;">Reminder 1</button>
										        </div>
										        </form>
										        </div>
										      </div>
										      
										    </div>
										  </div>
										  <!--//Model content-->
					<button class="btn btn-default btnleaddetail" type="button" data-toggle="modal" data-target="#myModal5"style="background: #da1313;" type="submit">R2</button>
					<div class="modal fade" id="myModal5" role="dialog">
										    <div class="modal-dialog">
										    
										      <!-- Modal content-->
										      <div class="modal-content">
										        <div class="modal-header">
										          <button type="button" class="close" data-dismiss="modal">&times;</button>
										          <h4 class="modal-title">Make status Reminder 2</h4>
										        </div>
										        <div class="modal-body">
					<form action="" method="post" onsubmit="return validation();" enctype="multipart/form-data">
										        		<div class="row">
																	<div class="col-md-12">
																	<div class="form-group">
																	<label>Do you really want to make status Reminder 2?</label> 
																</div>
															</div>				
													</div>
										        <div class="modal-footer">
										          <button type="cancel" class="btn btn-default" data-dismiss="modal">Close</button>
										          <button type="submit" name="submitr2" id="submitr2" value="Reminder 2" class="btn btn-default updatestatusbtn" data-dismiss="modal" style="background: #da1313;">Reminder 2</button>
										        </div>
										        </form>
										        </div>
										      </div>
										      
										    </div>
										  </div>
					<button class="btn btn-default btnleaddetail" type="button" data-toggle="modal" data-target="#myModal6"style="background: #00d756;" type="submit">R3</button>
					<div class="modal fade" id="myModal6" role="dialog">
										    <div class="modal-dialog">
										    
										      <!-- Modal content-->
										      <div class="modal-content">
										        <div class="modal-header">
										          <button type="button" class="close" data-dismiss="modal">&times;</button>
										          <h4 class="modal-title">Make status Reminder 3</h4>
										        </div>
										        <div class="modal-body">
					<form action="" method="post" onsubmit="return validation();" enctype="multipart/form-data">
										        		<div class="row">
																	<div class="col-md-12">
																	<div class="form-group">
																	<label>Do you really want to make status Reminder 3?</label> 
																</div>
															</div>				
													</div>
										        <div class="modal-footer">
										          <button type="cancel" class="btn btn-default" data-dismiss="modal">Close</button>
										          <button type="submit" name="submitr3" id="submitr3" value="Reminder 3" class="btn btn-default updatestatusbtn" data-dismiss="modal" style="background: #00d756;">Reminder 3</button>
										        </div>
										        </form>
										        </div>
										      </div>
										      
										    </div>
										  </div>
					<button class="btn btn-default btnleaddetail" type="button" data-toggle="modal" data-target="#myModal7"style="background: #00c6d7;" type="submit">Extra Discount</button>
					<div class="modal fade" id="myModal7" role="dialog">
										    <div class="modal-dialog">
										    
										      <!-- Modal content-->
										      <div class="modal-content">
										        <div class="modal-header">
										          <button type="button" class="close" data-dismiss="modal">&times;</button>
										          <h4 class="modal-title">Make status Extra Discount</h4>
										        </div>
										        <div class="modal-body">
					<form action="" method="post" onsubmit="return validation();" enctype="multipart/form-data">
										        		<div class="row">
																	<div class="col-md-12">
																	<div class="form-group">
																	<label>Do you really want to make status Extra Discount?</label> 
																</div>
															</div>				
													</div>
										        <div class="modal-footer">
										          <button type="cancel" class="btn btn-default" data-dismiss="modal">Close</button>
										          <button type="submit" name="submitextradis" id="submitextradis" value="Extra Discount" class="btn btn-default updatestatusbtn" data-dismiss="modal" style="background: #00c6d7;">Extra Discount</button>
										        </div>
										        </form>
										        </div>
										      </div>
										      
										    </div>
										  </div>
					<button class="btn btn-default btnleaddetail" type="button" data-toggle="modal" data-target="#myModal17"style="background: #b7aa0a;" type="submit">Nudge</button>
					<div class="modal fade" id="myModal17" role="dialog">
										    <div class="modal-dialog">
										    
										      <!-- Modal content-->
										      <div class="modal-content">
										        <div class="modal-header">
										          <button type="button" class="close" data-dismiss="modal">&times;</button>
										          <h4 class="modal-title">Make status Nudge</h4>
										        </div>
										        <div class="modal-body">
					<form action="" method="post" onsubmit="return validation();" enctype="multipart/form-data">
										        		<div class="row">
																	<div class="col-md-12">
																	<div class="form-group">
																	<label>Do you really want to make status Nudge?</label> 
																</div>
															</div>				
													</div>
										        <div class="modal-footer">
										          <button type="cancel" class="btn btn-default" data-dismiss="modal">Close</button>
										          <button type="submit" name="submitrnudge" id="submitrnudge" value="Nudge" class="btn btn-default updatestatusbtn" data-dismiss="modal" style="background: #b7aa0a;">Nudge</button>
										        </div>
										        </form>
										        </div>
										      </div>
										      
										    </div>
										  </div>
					<button class="btn btn-default btnleaddetail" type="button" data-toggle="modal" data-target="#myModal8"style="background: #4d87d0;" type="submit">Pipeline</button>
					<div class="modal fade" id="myModal8" role="dialog">
										    <div class="modal-dialog">
										    
										      <!-- Modal content-->
										      <div class="modal-content">
										        <div class="modal-header">
										          <button type="button" class="close" data-dismiss="modal">&times;</button>
										          <h4 class="modal-title">Make status Pipeline</h4>
										        </div>
										        <div class="modal-body">
					<form action="" method="post" onsubmit="return validation();" enctype="multipart/form-data">
										        		<div class="row">
																	<div class="col-md-12">
																	<div class="form-group">
																	<label>Do you really want to make status Pipeline?</label> 
																</div>
															</div>				
													</div>
										        <div class="modal-footer">
										          <button type="cancel" class="btn btn-default" data-dismiss="modal">Close</button>
										          <button type="submit" name="submitpipeline" id="submitpipeline" value="Pipeline" class="btn btn-default updatestatusbtn" data-dismiss="modal" style="background: #4d87d0;">Pipeline</button>
										        </div>
										        </form>
										        </div>
										      </div>
										      
										    </div>
										  </div>
					<button class="btn btn-default btnleaddetail" type="button" data-toggle="modal" data-target="#myModal9"style="background: #bb2ee8;" type="submit">Special Leads</button>
					<div class="modal fade" id="myModal9" role="dialog">
										    <div class="modal-dialog">
										    
										      <!-- Modal content-->
										      <div class="modal-content">
										        <div class="modal-header">
										          <button type="button" class="close" data-dismiss="modal">&times;</button>
										          <h4 class="modal-title">Make status Special Leads</h4>
										        </div>
										        <div class="modal-body">
					<form action="" method="post" onsubmit="return validation();" enctype="multipart/form-data">
										        		<div class="row">
																	<div class="col-md-12">
																	<div class="form-group">
																	<label>Do you really want to make status Special Leads?</label> 
																</div>
															</div>				
													</div>
										        <div class="modal-footer">
										          <button type="cancel" class="btn btn-default" data-dismiss="modal">Close</button>
										          <button type="submit" name="submitspeciallead" id="submitspeciallead" value="Special Leads" class="btn btn-default updatestatusbtn" data-dismiss="modal" style="background: #bb2ee8;">Special Leads</button>
										        </div>
										        </form>
										        </div>
										      </div>
										      
										    </div>
										  </div>
					<button class="btn btn-default btnleaddetail" type="button" data-toggle="modal" data-target="#myModal10"style="background:black;" type="submit">Not Interested</button>
					<div class="modal fade" id="myModal10" role="dialog">
										    <div class="modal-dialog">
										    
										      <!-- Modal content-->
										      <div class="modal-content">
										        <div class="modal-header">
										          <button type="button" class="close" data-dismiss="modal">&times;</button>
										          <h4 class="modal-title">Make status Not Interested</h4>
										        </div>
										        <div class="modal-body">
					<form action="" method="post" onsubmit="return validation();" enctype="multipart/form-data">
										        		<div class="row">
																	<div class="col-md-12">
																	<div class="form-group">
																	<label>Do you really want to make status Not Interested?</label> 
																</div>
															</div>				
													</div>
										        <div class="modal-footer">
										          <button type="cancel" class="btn btn-default" data-dismiss="modal">Close</button>
										          <button type="submit" name="submitnotintrest" id="submitnotintrest" value="No Interest" class="btn btn-default updatestatusbtn" data-dismiss="modal" style="background: black;">Not Interested</button>
										        </div>
										        </form>
										        </div>
										      </div>
										      
										    </div>
										  </div>
					<button class="btn btn-default btnleaddetail" type="button" data-toggle="modal" data-target="#myModal11"style="background: #4baf4a;" type="submit">Buy</button>
					<div class="modal fade" id="myModal11" role="dialog">
										    <div class="modal-dialog">
										    
										      <!-- Modal content-->
										      <div class="modal-content">
										        <div class="modal-header">
										          <button type="button" class="close" data-dismiss="modal">&times;</button>
										          <h4 class="modal-title">Make status Buy</h4>
										        </div>
										        <div class="modal-body">
					<form action="" method="post" onsubmit="return validation();" enctype="multipart/form-data">
										        		<div class="row">
																	<div class="col-md-12">
																	<div class="form-group">
																	<label>Do you really want to make status Buy?</label> 
																</div>
															</div>				
													</div>
										        <div class="modal-footer">
										          <button type="cancel" class="btn btn-default" data-dismiss="modal">Close</button>
										          <button type="submit" name="submitbuy" id="submitbuy" value="Buy" class="btn btn-default updatestatusbtn" data-dismiss="modal" style="background: #4baf4a;">Buy</button>
										        </div>
										        </form>
										        </div>
										      </div>
										      
										    </div>
										  </div>
					<button class="btn btn-default btnleaddetail" type="button" data-toggle="modal" data-target="#myModal12" style="background: #1c80ae;" type="submit">Junk</button>
					<div class="modal fade" id="myModal12" role="dialog">
										    <div class="modal-dialog">
										    
										      <!-- Modal content-->
										      <div class="modal-content">
										        <div class="modal-header">
										          <button type="button" class="close" data-dismiss="modal">&times;</button>
										          <h4 class="modal-title">Make status Junk</h4>
										        </div>
										        <div class="modal-body">
					<form action="" method="post" onsubmit="return validation();" enctype="multipart/form-data">
										        		<div class="row">
																	<div class="col-md-12">
																	<div class="form-group">
																	<label>Do you really want to make status Junk?</label> 
																</div>
															</div>				
													</div>
										        <div class="modal-footer">
										          <button type="cancel" class="btn btn-default" data-dismiss="modal">Close</button>
										          <button type="submit" name="submitjunk" id="submitjunk" value="No Interest" class="btn btn-default updatestatusbtn" data-dismiss="modal" style="background: #1c80ae;">Junk</button>
										        </div>
										        </form>
										        </div>
										      </div>
										      
										    </div>
										  </div>
				</div>
													</div>
												</form>
											<!--/sub-heard-part-->	
												<!--/forms-->
									<div class="forms-main">
										<h2 class="inner-tittle"><i class="fa fa-edit"></i>&nbsp;Lead Details</h2>
										<span class="leaddetailherrmsg"><?=$this->session->flashdata('msg');?></span>
											<div class="graph-form" id="style-2"  style= "padding:0.1em 1em; overflow-y:scroll;">
												<div class="form-body">

														
															<h4><b>Report Title:</b> <? echo $getdata->reporttitle;?></h4>
														<table class="table" style="background-color:#848f9017">
															
													          <tr>
														        <td>Report Id : <b><? echo $getdata->reportid;?></b></td>
														        <td>Sales User :<b><? echo $getdata->login_name; ?></b></td>
														        <td>Publisher : <b><? echo $getdata->publisher;?></b></td>
														      </tr>
														       <tr>
														        <td>Region : <b><? echo $getdata->selectregion;?></b></td>
														        <td>Country :<b><? echo $getdata->country;?></b></td>
														        <td>Source : <b><? echo $getdata->source;?></b></td>
														      </tr>
														       <tr>
														        <td>Category : <b><? echo $getdata->category;?></b></td>
														        <td>Status :<b style="color:red"><span id="statusc"><? echo $getdata->status;?></span></b></td>
														        <td>Enquiry Type: <b><? echo $getdata->enquirytype;?></b></td>
														      </tr>
														       <tr>
														        <td>Creation Date:<b><? echo date( "d-m-Y", strtotime($getdata->creationdate));?></b></td>
														        <td>Creation at: <b><? echo $getdata->creation_time;?></b></td>
														        <td>Last Updated at: <b><? echo date( "d-m-Y H:i a", strtotime($getdata->last_updated));?></b></td>
														      </tr>
														       <tr>
														        <td>Client Name :<b><? echo $getdata->clientname;?></b></td>
														        <td>Email :<b><? echo $getdata->email;?></b></td>
														        <td>Contact No : <b><? echo $getdata->contactno;?></b></td>
														      </tr>
														       <tr>
														        <td>Company :<b><? echo $getdata->company;?></b></td>
														        <td>Designation : <b><? echo $getdata->designation;?></b></td>
														      </tr>
														       <tr>
														        <td colspan="3">Message : <b><? echo $getdata->message;?></b></td>
														      </tr>
														      <tr>
														        <td colspan="3">URL: <a target="_blank" href="<? echo $getdata->urllink;?>"><b style="color:red"><? echo $getdata->urllink;?></b></a></td>
														      </tr>
														      	
														  </table>	

													<!--//forms-->											   
									</div>
											<!--//outer-wp-->
										</div>
									 
								</div>
								<?
								 }
								?>

    <div class="row" style="margin-bottom:20px">
    	<div class="col-md-4">
    		<div class="panel panel-primary">
                <div class="panel-heading" id="accordion1">
                    <span class="glyphicon glyphicon-comment"></span> Comment
                </div> 
                <form action="" method="post" onsubmit="return validation();" enctype="multipart/form-data">
                  <div class="panel-collapse collapse" id="" style="display:block; height: 313px;">  
                  	  <div class="panel-body" style="overflow: hidden;height: 313px;">
							<div class="form-group">
							<label for="exampleInputEmail1">Name</label> 
							<input type="text" class="form-control" id="username" name="username" value="<? echo $this->session->userdata('login_name');?>"readonly>
						 </div>
						<div class="form-group checkbox" style="margin-bottom: 0px;">
      					<label><input type="checkbox" style="margin-top: 9px;" name="checkbox" id="checkbox" value="checked">Is a client reply</label>
    					</div>
						<div class="form-group"> 	 
						<label>Comment</label>&nbsp;<span class="errormesage" id="comment_err"></span>
						<textarea class="form-control" rows="4" name="comment" id="comment"  name="comment" maxlength=500></textarea>
						</div> 
						<div class="text-right"style="margin-bottom: 12px;">
							<button class="btn btn-default btnleaddetail" style="background: #005058;" type="button" name="submitchat" id="submitchat" value="submitchat"><i class="fa fa-arrow-circle-up"></i>&nbsp;Send</button>
						</div>
						<button class="btn btn-default btnleaddetail" style="background: #b93026; margin-top: -96px;" type="reset"><a href="">Clear</a></button>
				   </div>
					</div>
				</form>
				   </div>
                  </div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading" id="accordion">
                    <span class="glyphicon glyphicon-comment"></span> Comment for Leads
                    <div class="btn-group pull-right">
                    </div>
                </div>
                <?
             
							$sql ="SELECT c.chat_id, c.lead_id, c.user_name, c.comment, c.reply, c.chat_date, l.clientname, l.lead_id from chat_table c join lead_table l ON c.lead_id=l.lead_id where c.lead_id='".$_GET['lead_id']."' order by c.chat_id desc";
									$query = $this->db->query($sql);
									$getcomments=$query->result();
									?>

            <div class="panel-collapse collapse" id="" style="display:block; height: 313px;">
                <div class="panel-body cate" id="style-2" style="height: 313px;">
                    <ul class="chat" id="chatid">
                    	<?
						foreach ($getcomments as $setcomments)
						{
						if($setcomments->reply=='unchecked')
						{	
						?>
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font namefont"> <?=$setcomments->user_name?> </strong>
                                </div>
                                <p>
                                   <?=$setcomments->comment?> 
                                </p>
                                <? $timestamp=date('d-M-Y H:i a',strtotime($setcomments->chat_date));
									$day = date('l', strtotime($setcomments->chat_date));
									?>
                                <small class="pull-left text-muted chatdatetime"><span class="glyphicon glyphicon-time "></span><?=$day?> <?=$timestamp?></small> 
                            </div>
                        </li>
                        <? }else{ ?>
                        <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&text=C" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="pull-right primary-font namefont"><?=$setcomments->clientname?></strong>
                                </div><br>
                                <p style="text-align:right">
                                    <?=$setcomments->comment?> 
                                </p>
                                <? $timestamp=date('d-M-Y H:i a',strtotime($setcomments->chat_date));
									$day = date('l', strtotime($setcomments->chat_date));
									?>
                                <small class="pull-right text-muted chatdatetime"><span class="glyphicon glyphicon-time"></span><?=$day?> <?=$timestamp?></small>
                            </div>
                        </li>
                        <?
                         }
                         }  
                         ?>
                 
                    </ul>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

							</div>
							<? include_once('include/footer.php'); ?>

<script>	
function  validation()
{
   var comment=$('#comment').val();
    if(comment==''){
    $('#comment_err').text('Kindly Enter Comment');
    $('#comment').focus(); 
    return false;
  }
  else{
  	$('#comment_err').text('');
  }
 }

$("#submitreminder").click(function(){
   
   var reminderdate=$('#reminderdate').val();
    if(reminderdate==''){
    $('#reminderdate_err').text('Kindly Enter Reminder Date');
    $('#reminderdate').focus(); 
    return false;
  }
  else{
  	$('#reminderdate_err').text('');
  }
var description=$('#description').val();
    if(description==''){
    $('#description_err').text('Kindly Enter Description');
    $('#description').focus(); 
    return false;
  }
  else{
  	$('#description_err').text('');
  }
  var leadid=$('#hidden_leadid').val();
  var submitreminder=$('#submitreminder').val();
  var dataString = {'reminderdate': reminderdate , 'description': description, 'submitreminder': submitreminder, 'leadid': leadid};
  // console.log(dataString);
    $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>addreminder",
                    data: dataString,
                    success:function(){
                    window.location.href='viewreminders';
                        //console.log('aaa');
                    }
                });
    });	
</script>
<script>
$("#submitchat").click(function(){

  var username=$('#username').val();
  var comment=$('#comment').val();
  var leadid=$('#hidden_leadid').val();
  var comment=$('#comment').val();
  var submitchat=$('#submitchat').val();
  if($('#checkbox').prop("checked") == true){

            	var checkboxreply='checked';
            }
            else if($('#checkbox').prop("checked") == false){
               var checkboxreply='unchecked';
            }
  var dataString = {'username': username , 'comment': comment, 'leadid': leadid, 'submitchat': submitchat, 'checkboxreply': checkboxreply};
  // console.log(dataString);
    $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>addchat",
                    data: dataString,
                    success:function(html){
                    	$('#chatid').html(html);   
                    	$('#comment').val("");
                    }
                });
         
});	
</script>
<script>
$("#submitsamplesent").click(function(){
	
  var status=$('#submitsamplesent').val();
  var leadid=$('#hidden_leadid').val();
  var username=$('#username').val();
  var statusc=$('#statusc').text();
  var comment='Status changed from ' +statusc+ ' to Sample Sent';
  var dataString = {'status': status, 'leadid':leadid, 'username': username, 'statusc': statusc,'comment': comment};
  // console.log(dataString);
    $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>updatestatus",
                    data: dataString,
                    success:function(html){
                    var html_arr = html.split('##$$##');
                    $('#statusc').text(html_arr[0]);
                    $('#chatid').html(html_arr[1]);
                    }
                });       
});
</script>
<script>
$("#submitkindreq").click(function(){
	
 var status=$('#submitkindreq').val();
 var leadid=$('#hidden_leadid').val();
 var username=$('#username').val();
 var statusc=$('#statusc').text();
 var comment='Status changed from ' +statusc+ ' to Kind Request';
 var dataString = {'status': status, 'leadid':leadid, 'username': username, 'statusc': statusc,'comment': comment};
  // console.log(dataString);
    $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>updatestatus",
                    data: dataString,
                      success:function(html){
                    var html_arr = html.split('##$$##');
                    $('#statusc').text(html_arr[0]);
                    $('#chatid').html(html_arr[1]);
                    }
                });        
});	
$("#submitr1").click(function(){
	
 var status=$('#submitr1').val();
 var leadid=$('#hidden_leadid').val();
 var username=$('#username').val();
 var statusc=$('#statusc').text();
  var comment='Status changed from ' +statusc+ ' to Reminder 1';
 var dataString = {'status': status, 'leadid':leadid, 'username': username, 'statusc': statusc,'comment': comment};
  // console.log(dataString);
    $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>updatestatus",
                    data: dataString,
                     success:function(html){
                    var html_arr = html.split('##$$##');
                    $('#statusc').text(html_arr[0]);
                    $('#chatid').html(html_arr[1]);
                    }
                });        
});	
$("#submitr2").click(function(){
  var status=$('#submitr2').val();
  var leadid=$('#hidden_leadid').val();
  var username=$('#username').val();
  var statusc=$('#statusc').text();
  var comment='Status changed from ' +statusc+ ' to Reminder 2';
  var dataString = {'status': status, 'leadid':leadid, 'username': username, 'statusc': statusc,'comment': comment};
  // console.log(dataString);
    $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>updatestatus",
                    data: dataString,
                    success:function(html){
                    var html_arr = html.split('##$$##');
                    $('#statusc').text(html_arr[0]);
                    $('#chatid').html(html_arr[1]);
                    }
                });        
});	
$("#submitr3").click(function(){
  var status=$('#submitr3').val();
  var leadid=$('#hidden_leadid').val();
  var username=$('#username').val();
  var statusc=$('#statusc').text();
  var comment='Status changed from ' +statusc+ ' to Reminder 3';
  var dataString = {'status': status, 'leadid':leadid, 'username': username, 'statusc': statusc,'comment': comment};
  // console.log(dataString);
    $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>updatestatus",
                    data: dataString,
                     success:function(html){
                    var html_arr = html.split('##$$##');
                    $('#statusc').text(html_arr[0]);
                    $('#chatid').html(html_arr[1]);
                    }
                });        
});
$("#submitextradis").click(function(){
  var status=$('#submitextradis').val();
  var username=$('#username').val();
  var leadid=$('#hidden_leadid').val();
  var statusc=$('#statusc').text();
  var comment='Status changed from ' +statusc+ ' to Extra Discount';
  var dataString = {'status': status, 'leadid':leadid, 'username': username, 'statusc': statusc,'comment': comment};
  // console.log(dataString);
    $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>updatestatus",
                    data: dataString,
                    success:function(html){
                    var html_arr = html.split('##$$##');
                    $('#statusc').text(html_arr[0]);
                    $('#chatid').html(html_arr[1]);
                    }
                });        
});
$("#submitrnudge").click(function(){
  var status=$('#submitrnudge').val();
  var leadid=$('#hidden_leadid').val();
  var username=$('#username').val();
  var statusc=$('#statusc').text();
  var comment='Status changed from ' +statusc+ ' to Nudge';
  var dataString = {'status': status, 'leadid':leadid, 'username': username, 'statusc': statusc,'comment': comment};
  // console.log(dataString);
    $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>updatestatus",
                    data: dataString,
                    success:function(html){
                    var html_arr = html.split('##$$##');
                    $('#statusc').text(html_arr[0]);
                    $('#chatid').html(html_arr[1]);
                    }
                });        
});
$("#submitpipeline").click(function(){
  var status=$('#submitpipeline').val();
  var leadid=$('#hidden_leadid').val();
  var username=$('#username').val();
  var statusc=$('#statusc').text();
  var comment='Status changed from ' +statusc+ ' to Pipeline';
  var dataString = {'status': status, 'leadid':leadid, 'username': username, 'statusc': statusc,'comment': comment};
  // console.log(dataString);
    $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>updatestatus",
                    data: dataString,
                     success:function(html){
                    var html_arr = html.split('##$$##');
                    $('#statusc').text(html_arr[0]);
                    $('#chatid').html(html_arr[1]);
                    }
                });        
});	
$("#submitspeciallead").click(function(){
var status=$('#submitspeciallead').val();
var leadid=$('#hidden_leadid').val();
var username=$('#username').val();
var statusc=$('#statusc').text();
var comment='Status changed from ' +statusc+ ' to Special Leads';
var dataString = {'status': status, 'leadid':leadid, 'username': username, 'statusc': statusc,'comment': comment};
  // console.log(dataString);
    $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>updatestatus",
                    data: dataString,
                    success:function(html){
                    var html_arr = html.split('##$$##');
                    $('#statusc').text(html_arr[0]);
                    $('#chatid').html(html_arr[1]);
                    }
                });        
});
$("#submitnotintrest").click(function(){
  var status=$('#submitnotintrest').val();
  var leadid=$('#hidden_leadid').val();
  var username=$('#username').val();
  var statusc=$('#statusc').text();
  var comment='Status changed from ' +statusc+ ' to Not Interested';
 var dataString = {'status': status, 'leadid':leadid, 'username': username, 'statusc': statusc,'comment': comment};
  // console.log(dataString);
    $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>updatestatus",
                    data: dataString,
                    success:function(html){
                    var html_arr = html.split('##$$##');
                    $('#statusc').text(html_arr[0]);
                    $('#chatid').html(html_arr[1]);
                    }
                });        
});
$("#submitbuy").click(function(){
  var status=$('#submitbuy').val();
  var leadid=$('#hidden_leadid').val();
  var username=$('#username').val();
  var statusc=$('#statusc').text();
  var comment='Status changed from ' +statusc+ ' to Buy';
 var dataString = {'status': status, 'leadid':leadid, 'username': username, 'statusc': statusc,'comment': comment};
  // console.log(dataString);
    $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>updatestatus",
                    data: dataString,
                    success:function(html){
                    var html_arr = html.split('##$$##');
                    $('#statusc').text(html_arr[0]);
                    $('#chatid').html(html_arr[1]);
                    }
                });        
});
$("#submitjunk").click(function(){
  var status=$('#submitjunk').val();
  var leadid=$('#hidden_leadid').val();
  var username=$('#username').val();
  var statusc=$('#statusc').text();
  var comment='Status changed from ' +statusc+ ' to Junk';
  var dataString = {'status': status, 'leadid':leadid, 'username': username, 'statusc': statusc,'comment': comment};
  // console.log(dataString);
    $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>updatestatus",
                    data: dataString,
                    success:function(html){
                    var html_arr = html.split('##$$##');
                    $('#statusc').text('Junk');
                    $('#chatid').html(html_arr[1]);
                    }
                });        
});		
</script>

<script>
$(".remindme1").click(function(){

  var leadid=$('#hidden_leadid').val();
  var description=$('#description').val();
  var dataString = {'leadid':leadid, 'description': description};
  // console.log(dataString);
    $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>updatereminders",
                    data: dataString,
                    success:function(data){
                    	$('#leadid').val("lead_id");
                    	$('#description').val("description");
                    	 window.location.reload(true);
                    }
                });
        });
  
</script>
