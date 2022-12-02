<? include_once('include/header.php');?>
							<!--//outer-wp-->
			<div class="outter-wp">
					<!--/sub-heard-part-->	
											<!--/sub-heard-part-->	
												<!--/forms-->
									<div class="forms-main container addleadmainh form-w" style="">
										<h2 class="inner-tittle" style="color:black"><i class="fa fa-edit"></i>&nbsp;Add User</h2>
										 <span class="adduserherrmsg"><?=$this->session->flashdata('msg');?></span>
											<div class="graph-form formbg">
												<div class="form-body">

														<form action="<?=base_url()?>adduser" method="post" onsubmit="return validation();" enctype="multipart/form-data">
															<p>Feel free to contact us for any issues you might have with our products.</p>
															<div class="row">
																	<div class="col-md-6">
																	<div class="form-group">
																	<label>Name</label> 
																	<span class="errormesage" id="name_err"></span> 
																<input type="text" class="form-control" id="name" name="name" placeholder="Enter name..." maxlength=100>
																</div>
															</div>
														</div>
																	<div class="row">
																	<div class="col-md-6">
																		<div class="form-group">
																	<label>E-mail</label>
																	<span class="errormesage" id="email_err"></span> 
																	<input type="email" class="form-control" id="email" name="email" placeholder="Enter email.." maxlength=70>
																	</div> 
														</div>
													</div>	
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
														<label>Password</label>
														<span class="errormesage" id="password_err"></span>
														<input type="password" class="form-control" id="password" name="password">
														</div>
													</div>
												</div>
												<div class="row">
																	<div class="col-md-6">
																	<div class="form-group">
																	<label>User Type</label>
																	<span class="errormesage" id="usertype_err"></span> 
																<select class="form-control" id="usertype" name="usertype">
																	<option value="">Select user type</option>
																	<option value="Admin">Admin</option>
																	<option value="Sales">Sales</option>
																</select>
																</div>
															</div>
														</div>
												<div class="row" id="idadminaccess" style="display:none">
																	<div class="col-md-6">
																	<div class="form-group">
																	<label>Access Type</label>
																	<span class="errormesage" id=""></span> 
																<select class="form-control" id="access_type" name="access_type">
																	<option value="All">All</option>
																	<option value="Limited">Limited</option>
																</select>
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
														<button type="submit" class="btn btn-default" id="submit" name="submit"><i class="fa fa-check"></i>&nbsp;Submit</button> 
												</div>

											</div>
											</div>		

											</form>			<!--//forms-->											   
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
$('#usertype').on('change', function () {
    if(this.value === "Admin"){
        $("#idadminaccess").show();
    } else {
        $("#idadminaccess").hide();
    }
});
</script>				
<script>
  function validEmail(e) 
          {
           var filter = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
           return String(e).search (filter) != -1;
          }
function validation()
{
   var name=$('#name').val();
    if(name==''){
    $('#name_err').text('Kindly Enter Name');
    $('#name').focus(); 
    return false;
  }
  else{
  	$('#name_err').text('');
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
  var password=$('#password').val();
    if(password==''){
    $('#password_err').text('Kindly Enter Password');
    $('#password').focus(); 
    return false;
  }
  else{
  	$('#password_err').text('');
  }
  var usertype=$('#usertype').val();
    if(usertype==''){
    $('#usertype_err').text('Kindly Select User Type');
    $('#usertype').focus(); 
    return false;
  }
  else{
  	$('#usertype_err').text('');
  }

  }
  </script>				