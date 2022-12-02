<? include_once('include/header.php');?>
							<!--//outer-wp-->
			<div class="outter-wp">
					<!--/sub-heard-part-->	
											<!--/sub-heard-part-->	
												<!--/forms-->
									<div class="forms-main container form-w" style="padding-right: 0px;padding-left: 0px; background-color: #f5fcfd6e;">
										<h2 class="inner-tittle" style="color:black"><i class="fa fa-edit"></i>&nbsp;Edit</h2>
										 <span class="" style="color:red"><?=$this->session->flashdata('msg');?></span>
											<div class="graph-form formbg">
												<div class="form-body">
                                                        <?
                                                        foreach($fetch as $getdata)
                                                        {
                                                        ?>
                                                      
														<form action="<?=base_url()?>updateregion?region_id=<?=$getdata->region_id?>" method="post" onsubmit="return validation();" enctype="multipart/form-data">			
												<div class="row">
																	<div class="col-md-6">
																	<div class="form-group">
																	<label>Select User</label> 
																<select class="form-control" id="selectuser" name="selectuser">
																	
																	<option <?php if($getdata->login_id==$getdata->login_id){ ?> selected="selected" <?} ?> value="<?=$getdata->login_id?>"><?=$getdata->login_name?></option>
																</select>
																<span class="errormesage" id="selectuser_err"></span> 
																</div>
															</div>
														</div>
														<div class="row">
																	<div class="col-md-6">
																	<div class="form-group">
																	<label>Select Region</label> 
																<select class="form-control" id="selectregion" name="selectregion">
																	<option <?php if($getdata->region=='APAC'){ ?> selected="selected" <?} ?>value="APAC">APAC</option>
																	<option <?php if($getdata->region=='EU'){ ?> selected="selected" <?} ?>value="EU">EU</option>
																	<option <?php if($getdata->region=='USA'){ ?> selected="selected" <?} ?>value="USA">USA</option>
																</select>
																<span class="errormesage" id="selectregion_err"></span> 
																</div>
															</div>
														</div>
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
var selectregion=$('#selectregion').val();
    if(selectregion==''){
    $('#selectregion_err').text('Kindly Select Region');
    $('#selectregion').focus(); 
    return false;
  }
  else{
  	$('#selectregion_err').text('');
  }

  }
  </script>				