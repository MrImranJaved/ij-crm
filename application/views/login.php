<? include_once('include/loginheader.php')?>
<body class="login-bg" style="background-image:url(<?php echo base_url(); ?>include/images/business-2253456_1920.jpg)">
					<div class="error-top">
						<h2 class="inner-tittle page">
							<img src="<?php echo base_url(); ?>include/images/logo.png" height="55%" width="50%" style="margin-top: -22%;margin-bottom: 12%;margin-left: 50%;" alt="Markets N Research"></h2>
									<img class"login_lb"="" src="<?php echo base_url(); ?>/include/images/lg.png" width="60px" height="62px" style=" margin-top: -82px; margin-right:320px">
								<div class="login">
							 <span class="errormesage" style="color:red"><?=$this->session->flashdata('msg');?></span>
							 <form action="<?=base_url()?>loginprocess" method="post" onsubmit="return validation();">
							<input type="text" name="email" id="email" class="text" value="<? if($this->input->cookie('email',true) !=''){echo  $this->input->cookie('email',true); }?>" style="background-color: whitesmoke;" >
										<span class="errormesage" id="email_err"></span>
								<input type="password" name="password" id="password" value="<? if($this->input->cookie('password',true) !=''){echo  $this->input->cookie('password',true); }?>" style="background-color: whitesmoke;">
										<span class="errormesage" id="password_err"></span>
              <div style="margin-bottom: 0px;">
                <label class="labelremember"><input type="checkbox" style="margin-top: 5px;" name="remembermecheck" id="remembermecheck" value="remembermecheck"<?php if($this->input->cookie('remembermecheck',true) !='') { ?> checked <?php } ?>>Remember me</label>
                <button style="background-color: #b93026;" type="submit" name="submit" value="submit" class="btn btn-primary btn-block btn-flat">Login</button>
              </div>
							<!--	<div class="new" style="float:right">										
									<a href="forgotpassword">Forgot Password ?</a>										
									
										<div class="clearfix">
										</div>
								</div>-->
									</form>
								</div>





														
							</div> 
</body>
<? include_once('include/loginfooter.php')?>
<script>
  function validEmail(e) 
          {
           var filter = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
           return String(e).search (filter) != -1;
          }
function validation()
{
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
 
  }
</script>	