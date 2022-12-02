<? include_once('include/loginheader.php')?>
<body class="login-bg" style="background-image:url(<?php echo base_url(); ?>/include/images/foi3.jpg)">
		<div class="error-box">

			<h2 class="inner-tittle page">
				<img src="<?php echo base_url(); ?>include/images/logo.png" height="55%" width="50%" style="margin-top: -21%;margin-bottom: 12%;margin-left: 16%;" alt="apexmarketsresearch"></h2>
				<img class"login_lb"="" src="<?php echo base_url(); ?>include/images/flogo1.png" width="60px" height="62px" style=" margin-top: -82px; margin-right:320px">
		<div class="login">
			<h3 class="inner-tittle t-inners">Forgot your password?</h3>
				<p class="p-inners">Please Enter your Registered E-mail Address</p>
		<form action="<?=base_url()?>forgotpassprocess" onsubmit="return validation()"; method="post">
																
			<input type="text" name="emailforgot" id="emailforgot" value="" style="background-color: whitesmoke;" >
			<span class="errormesage" id="email_err"></span>
			 <span class="errormesage" style="color:red"><?=$this->session->flashdata('msg');?></span>
				<div class="new">
					<button style="background-color: #8c0d36f2;" type="submit" name="submit" value="submit" class="btn btn-primary btn-block btn-flats">Submit</button>
					<div class="clearfix">
					</div>
				</div>
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
   var email=$('#emailforgot').val();
    if(email==''){
    $('#email_err').text('Kindly Enter Email');
    $('#emailforgot').focus(); 
    return false;
  }
     if(!validEmail(email)){
    $('#email_err').text('Kindly Enter Valid Email');
    $('#emailforgot').focus(); 
    return false;
    } 
  else{
    $('#email_err').text('');
  }

}
</script>
