<? include_once('include/header.php');?>
							<!--//outer-wp-->
			<div class="outter-wp">
									<div class="forms-main container form-w" style="padding-right: 0px;padding-left: 0px; background-color: #f5fcfd6e;">
										<h2 class="inner-tittle"><i class="fa fa-edit"></i>&nbsp;Edit</h2>
										 <span class="errormesage" style="color:red"><?=$this->session->flashdata('msg');?></span>
											<div class="graph-form formbg">
												<div class="form-body">
                                                        <? foreach($fetch as $getdata)
                                                        {
                                                         ?>
                                                      
														<form action="<?=base_url()?>updateuser?login_id=<?=$getdata->login_id?>" method="post" onsubmit="return validation();" enctype="multipart/form-data">			
												<div class="row">
																	<div class="col-md-6">
																	<div class="form-group">
																	<label>Select User</label>
																	<span class="errormesage" id="selectuser_err"></span> 
																<select class="form-control" id="selectuser" name="selectuser">
																	<option <?php if($getdata->login_name==$getdata->login_name){ ?> selected="selected" <?} ?> value="<?=$getdata->login_name?>"><?=$getdata->login_name?></option>
																</select>
																</div>
															</div>
														</div>
														<div class="row">
																	<div class="col-md-6">
																		<div class="form-group">
																	<label>E-mail</label> 
																	<span class="errormesage" id="email_err"></span>
																	<input type="email" class="form-control" id="email" name="email" value="<? echo $getdata->login_email;?>"placeholder="Enter email.." maxlength=70>
																	</div> 
														          </div>
													    </div>
													         <div class="row">
																	<div class="col-md-6">
																	<div class="form-group">
																	<label>User Type</label>
																	<span class="errormesage" id=""></span>  
																<select class="form-control" id="usertype" name="usertype">
																	<option <?php if($getdata->login_usertype=='Admin'){ ?> selected="selected" <?} ?> value="Admin">Admin</option>
																	<option <?php if($getdata->login_usertype=='Sales'){ ?> selected="selected" <?} ?>value="Sales">Sales</option>
																</select>
																</div>
															</div>
														</div>
														<?if($getdata->login_usertype=='Admin'){ ?>
														<div class="row" id="idadminaccess" >
																	<div class="col-md-6">
																	<div class="form-group">
																	<label>Access Type</label>
																	<span class="errormesage" id="usertype_err"></span> 
																<select class="form-control" id="access_type" name="access_type">
																	<option <?php if($getdata->access_type=='All'){ ?> selected="selected" <?} ?>value="All">All</option>
																	<option <?php if($getdata->access_type=='Limited'){ ?> selected="selected" <?} ?> value="Limited">Limited</option>
																</select>
																</div>
															</div>
												</div>
												<? }?>
												<div class="row">
													<div class="col-xs-6">
														<div class="form-group">	
													<button onclick="goBack()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Back</button>
												</div>
											</div>
													<div class="col-xs-6 text-right">
														<div class="form-group">
														<button type="submit" class="btn btn-default" id="update" name="update" value="update"><i class="fa fa-check"></i>&nbsp;Update</button> 
												</div>

											</div>
											</div>		

											</form>	
											<?
											} 
											?>		<!--//forms-->											   
									</div>
											<!--//outer-wp-->
										</div>
									 <!--footer section start-->
										
									<!--footer section end-->
								</div>
							</div>
				<!--//content-inner-->
				<? include_once('include/footer.php'); ?>
<script>
  function validEmail(e) 
          {
           var filter = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
           return String(e).search (filter) != -1;
          }
function validation()
{
   
  var selectuser=$('#selectuser').val();
    if(selectuser==''){
    $('#selectuser_err').text('Kindly Select User');
    $('#selectuser').focus(); 
    return false;
  }
  else{
  	$('#selectuser_err').text('');
  }
var email=$('#email').val();
    if(email==''){
    $('#email_err').text('Kindly Enter Email');
    $('#email').focus(); 
    return false;
  }
  if(!validEmail(email)){
    $('#email_err').text('Kindly Enter Valid Email');
    $('#email').focus(); 
    return false;
    }
  else{
  	$('#email_err').text('');
  }

  }
  </script>				