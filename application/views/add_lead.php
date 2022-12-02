<? include_once('include/header.php');?>
							<!--//outer-wp-->
			<div class="outter-wp">
<!--/forms-->
	<div class="container forms-main addleadmainh">
		<h2 class="inner-tittle" style="color:black;"><i class="fa fa-edit"></i>&nbsp;Add Lead</h2>
		 <span class="addleadherrmsg"><?=$this->session->flashdata('msg');?></span>
			<div class="graph-form formbg">
				<div class="form-body">

				<form action="<?=base_url()?>addlead" method="post" onsubmit="return validation();" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							<label for="exampleInputEmail1">Region*</label> 
							<span class="errormesage" id="selectregion_err"></span>
							<select class="form-control"  name="selectregion"id="selectregion" placeholder="Select region">
								<option value="">Select region</option>
								<option value="APAC">APAC</option>
								<option value="EU">EU</option>
								<option value="USA">USA</option>
							</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Country</label> 
								<span class="errormesage" id="country_err"></span> 
								<input type="text" class="form-control" name="country" id="country" value=""placeholder="Enter from..." maxlength=100>
							</div> 
						</div>
					</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label>Category*</label>
								<span class="errormesage" id="category_err"></span> 
								<select class="form-control" id="category" name="category">
									<option value="">Select category</option>
									<option value="C1">C1</option>
									<option value="C2">C2</option>
									<option value="C3">C3</option>
								</select>
							</div> 
						</div>		
									<? 
                                    $sql ="SELECT publisher_name FROM publishers";
									$query = $this->db->query($sql);
									$getuser=$query->result();
									?>
							<div class="col-md-6">
								<div class="form-group">
								<label>Publisher*</label>
								<span class="errormesage" id="publisher_err"></span>
								<select class="form-control" id="publisher" name="publisher">	
									 <option value="">Select Publisher</option>
									<? 
									foreach ($getuser as $getdata)
									{
									?>
									<option value="<?=$getdata->publisher_name?>"><?=$getdata->publisher_name?></option>
									<?
									}
									?>
								</select>
								</div>
							</div>
						</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Enquiry Type*</label> 
								<span class="errormesage" id="enquirytype_err"></span>
								<select class="form-control" id="enquirytype" name="enquirytype">
									<option value="">Select enquiry type</option>
									<option value="Sample">Sample</option>
									<option value="Enquiry">Enquiry</option>
									<option value="Checkout">Checkout</option>
									<option value="Contact">Contact</option>
								</select>
							</div> 
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Source*</label>
								<span class="errormesage" id="source_err"></span>
								<select class="form-control" id="source" name="source">
									<option value="">Select source</option>
									<option value="Markets N Research">Markets N Research</option>
									<option value="Email">Email</option>
									<option value="Call">Call</option>
									<option value="Contact">Contact</option>
								</select>	
							</div>
						</div>
						</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Creation Date*</label> 
								<span class="errormesage" id="creationdate_err"></span>
								<input type="text" class="form-control" id="creationdate"  name="creationdate" value=""placeholder="Enter from..." readonly>
							</div> 
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Report Id*</label>
								<span class="errormesage" id="reportid_err"></span> 
								<input type="text" class="form-control" id="reportid" name="reportid" value=""placeholder="Enter report id" maxlength=50>
							</div> 
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Report title*</label> 
								<span class="errormesage" id="reporttitle_err"></span>
									<input type="text" class="form-control" id="reporttitle" name="reporttitle" value=""placeholder="Enter report title.." maxlength=300>
							</div> 
						</div>
					<div class="col-md-6">
				<div class="form-group">
					<label>Client name*</label> 
					<span class="errormesage" id="clientname_err"></span>
						<input type="text" class="form-control" id="clientname" name="clientname" value=""placeholder="Enter client name.." maxlength=100>
				</div> 
			</div>
			</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Email*</label>
							<span class="errormesage" id="email_err"></span> 
							<input type="text" class="form-control" id="email" name="email" value=""placeholder="Enter email.." maxlength=70>
						</div> 
					</div>
				<div class="col-md-6">
					<div class="form-group">
					<label>Contact Number*</label> 
					<span class="errormesage" id="contactno_err"></span>
					<input type="text" class="form-control" id="contactno" name="contactno" value=""placeholder="Enter contact number.." onkeypress="return isNumericKey(event);" maxlength=12>
					</div> 
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Company*</label> 
						<span class="errormesage" id="company_err"></span>
							<input type="text" class="form-control" id="company" name="company" value=""placeholder="Enter company.." maxlength=200>
					</div> 
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Designation*</label>
						<span class="errormesage" id="designation_err"></span>  
							<input type="text" class="form-control" id="designation" name="designation" value=""placeholder="Enter designation" maxlength=200>
					</div> 
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
					<label>Message*</label>
					<span class="errormesage" id="message_err"></span> 
					<input type="text" class="form-control" id="message" name="message" value="" placeholder="Enter message.." maxlength=500>
				</div> 
			</div> 
			<div class="col-md-6">
					<div class="form-group">
					<label>Report Link*</label>
					<span class="errormesage" id="urllink_err"></span> 
					<input type="text " class="form-control" id="urllink" name="urllink" value="" placeholder="Enter Report Link..">
				</div> 
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
						<button type="submit" name="submit" value="submit" class="btn btn-default"><i class="fa fa-check"></i>&nbsp;Submit</button> 
					</div>
				</div>
			</div>		
			</form>			<!--//forms-->											   
		</div>
</div>
		</div>
		</div>
	<? include_once('include/footer.php'); ?>
<script>
  function validEmail(e) 
          {
           var filter = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
           return String(e).search (filter) != -1;
          }
function validation()
{
   var selectregion=$('#selectregion').val();
    if(selectregion==''){
    $('#selectregion_err').text('Kindly Select Region');
    $('#selectregion').focus(); 
    return false;
  }
  else{
  	$('#selectregion_err').text('');
  }
   var country=$('#country').val();
    if(country==''){
    $('#country_err').text('Kindly Enter Country');
    $('#country').focus(); 
    return false;
  }
  else{
  	$('#country_err').text('');
  }
  var category=$('#category').val();
    if(category==''){
    $('#category_err').text('Kindly Select Category');
    $('#category').focus(); 
    return false;
  }
  else{
  	$('#category_err').text('');
  }
  var publisher=$('#publisher').val();
    if(publisher==''){
    $('#publisher_err').text('Kindly Select Publisher');
    $('#publisher').focus(); 
    return false;
  }
  else{
  	$('#publisher_err').text('');
  }
 var enquirytype=$('#enquirytype').val();
    if(enquirytype==''){
    $('#enquirytype_err').text('Kindly Select Enquiry type');
    $('#enquirytype').focus(); 
    return false;
  }
  else{
  	$('#enquirytype_err').text('');
  }
  var source=$('#source').val();
    if(source==''){
    $('#source_err').text('Kindly Select Source');
    $('#source').focus(); 
    return false;
  }
  else{
  	$('#source_err').text('');
  }
  var creationdate=$('#creationdate').val();
    if(creationdate==''){
    $('#creationdate_err').text('Kindly Enter Date');
    $('#creationdate').focus(); 
    return false;
  }
  else{
  	$('#creationdate_err').text('');
  }
  var reportid=$('#reportid').val();
    if(reportid==''){
    $('#reportid_err').text('Kindly Enter Reportid');
    $('#reportid').focus(); 
    return false;
  }
  else{
  	$('#reportid_err').text('');
  }
  var reporttitle=$('#reporttitle').val();
    if(reporttitle==''){
    $('#reporttitle_err').text('Kindly Enter Report title');
    $('#reporttitle').focus(); 
    return false;
  }
  else{
  	$('#reporttitle_err').text('');
  }
  var clientname=$('#clientname').val();
    if(clientname==''){
    $('#clientname_err').text('Kindly Enter Client name');
    $('#clientname').focus(); 
    return false;
  }
  else{
  	$('#clientname_err').text('');
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
  var contactno=$('#contactno').val();
    if(contactno==''){
    $('#contactno_err').text('Kindly Enter Contact no.');
    $('#contactno').focus(); 
    return false;
  }
  else{
  	$('#contactno_err').text('');
  }
  var company=$('#company').val();
    if(company==''){
    $('#company_err').text('Kindly Enter Company');
    $('#company').focus(); 
    return false;
  }
  else{
  	$('#company_err').text('');
  }
   var designation=$('#designation').val();
    if(designation==''){
    $('#designation_err').text('Kindly Enter Designation');
    $('#designation').focus(); 
    return false;
  }
  else{
  	$('#designation_err').text('');
  }
  var message=$('#message').val();
    if(message==''){
    $('#message_err').text('Kindly Enter Message');
    $('#message').focus(); 
    return false;
  }
  else{
  	$('#message_err').text('');
  } 
  var urllink=$('#urllink').val();
    if(urllink==''){
    $('#urllink_err').text('Kindly Enter Report Link');
    $('#urllink').focus(); 
    return false;
  }
  else{
  	$('#urllink_err').text('');
  }     
  }
</script>				
				<!--//content-inner-->