<? include_once('include/header.php');?>
							<!--//outer-wp-->
			<div class="outter-wp">
<!--/forms-->
	<div class="container forms-main" style="padding-right: 0px; padding-left: 0px;background-color: #f5fcfd6e;">
		<h2 class="inner-tittle" style="color:black"><i class="fa fa-edit"></i>&nbsp;Edit Lead</h2>
			<div class="graph-form formbg">
				<div class="form-body">
				<?
				foreach ($fetchdata as $getdata)
				{
				?>
			<form action="<?php echo base_url(); ?>updatelead?lead_id=<?=$getdata->lead_id;?>" method="post" onsubmit="return validation();" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							<label>Name*</label> 
							<select class="form-control"  name="selectregion"id="selectregion" placeholder="Select region">
								<option <?php if($getdata->selectregion=='APAC'){ ?> selected="selected" <?} ?> value="APAC">APAC</option>
								<option <?php if($getdata->selectregion=='EU'){ ?> selected="selected" <?} ?> value="EU">EU</option>
								<option <?php if($getdata->selectregion=='USA'){ ?> selected="selected" <?} ?> value="USA">USA</option>
							</select>
							<span class="errormesage" id="selectregion_err"></span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Country</label> 
								<input type="text" class="form-control" name="country" id="country" value="<? echo $getdata->country;?>"placeholder="Enter from..." maxlength=100>
								<span class="errormesage" id="country_err"></span> 
							</div> 
						</div>
					</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label>Category*</label> 
								<select class="form-control" id="category" name="category">
									<option <?php if($getdata->category=='C1'){ ?> selected="selected" <?} ?> value="C1">C1</option>
									<option <?php if($getdata->category=='C2'){ ?> selected="selected" <?} ?> value="C2">C2</option>
									<option <?php if($getdata->category=='C3'){ ?> selected="selected" <?} ?> value="C3">C3</option>
								</select>
								<span class="errormesage" id="category_err"></span>
							</div> 
						</div>
							<div class="col-md-6">
								<div class="form-group">
								<label>Publisher*</label>
								<select class="form-control" id="publisher" name="publisher">
									<option <?php if($getdata->publisher=='Apex Market Research'){ ?> selected="selected" <?} ?> value="Apex Market Research">Apex Market Research</option>
									<option <?php if($getdata->publisher=='Apex Market Research'){ ?> selected="selected" <?} ?> value="Apex Market Research">Apex Market Research</option>
									<option <?php if($getdata->publisher=='Apex Market Research'){ ?> selected="selected" <?} ?> value="Apex Market Research">Apex Market Research</option>
								</select>
								<span class="errormesage" id="publisher_err"></span>
								</div>
							</div>
						</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Enquiry Type*</label> 
								<select class="form-control" id="enquirytype" name="enquirytype">
									<option <?php if($getdata->enquirytype=='Sample'){ ?> selected="selected" <?} ?>value="Sample">Sample</option>
									<option <?php if($getdata->enquirytype=='Enquiry'){ ?> selected="selected" <?} ?>value="Enquiry">Enquiry</option>
								</select>
								<span class="errormesage" id="enquirytype_err"></span>
							</div> 
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Source*</label>
								<select class="form-control" id="source" name="source">
									<option <?php if($getdata->source=='website'){ ?> selected="selected" <?} ?> value="website">website</option>
									<option <?php if($getdata->source=='website'){ ?> selected="selected" <?} ?> value="website">website</option>
									<option <?php if($getdata->source=='website'){ ?> selected="selected" <?} ?> value="website">website</option>
								</select>
									<span class="errormesage" id="source_err"></span>
							</div>
						</div>
						</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Creation Date*</label> 
								<input type="text" class="form-control" id="creationdate"  name="creationdate" value="<? echo $getdata->creationdate;?>"placeholder="Enter from..." readonly>
								<span class="errormesage" id="creationdate_err"></span>
							</div> 
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Report Id*</label> 
								<input type="text" class="form-control" id="reportid" name="reportid" value="<? echo $getdata->reportid;?>"placeholder="Enter report id" maxlength=50>
								<span class="errormesage" id="reportid_err"></span>
							</div> 
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Report title*</label> 
									<input type="text" class="form-control" id="reporttitle" name="reporttitle" value="<? echo $getdata->reporttitle;?>" maxlength=300>
									<span class="errormesage" id="reporttitle_err"></span>
							</div> 
						</div>
					<div class="col-md-6">
				<div class="form-group">
					<label>Client name*</label> 
						<input type="text" class="form-control" id="clientname" name="clientname" value="<? echo $getdata->clientname;?>"placeholder="Enter client name.." maxlength=100>
						<span class="errormesage" id="clientname_err"></span>
				</div> 
			</div>
			</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Email*</label> 
							<input type="text" class="form-control" id="email" name="email" value="<? echo $getdata->email;?>"placeholder="Enter email.." maxlength=70>
							<span class="errormesage" id="email_err"></span>
						</div> 
					</div>
				<div class="col-md-6">
					<div class="form-group">
					<label>Contact Number*</label> 
					<input type="text" class="form-control" id="contactno" name="contactno" value="<? echo $getdata->contactno;?>"placeholder="Enter contact number.." onkeypress="return isNumericKey(event);" maxlength=12>
					<span class="errormesage" id="contactno_err"></span>
					</div> 
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Company*</label> 
							<input type="text" class="form-control" id="company" name="company" value="<? echo $getdata->company;?>"placeholder="Enter company.." maxlength=200>
							<span class="errormesage" id="company_err"></span>
					</div> 
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Designation*</label> 
							<input type="text" class="form-control" id="designation" name="designation" value="<? echo $getdata->designation;?>"placeholder="Enter designation" maxlength=200>
							<span class="errormesage" id="designation_err"></span> 
					</div> 
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
					<label>Message*</label> 
					<input type="text " class="form-control" id="message" name="message" value="<? echo $getdata->message;?>" placeholder="Enter message.." maxlength=500>
					<span class="errormesage" id="message_err"></span> 
				</div> 
			</div>
			<div class="col-md-6">
			<div class="form-group">
					<label>Report Link*</label> 
					<input type="text " class="form-control" id="urllink" name="urllink" value="<? echo $getdata->urllink;?>" placeholder="Enter Report Link..">
					<span class="errormesage" id="urllink_err"></span> 
				</div> 
			</div>
		</div>
			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">	
						<button type="cancel" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Back</button>
					</div>
				</div>
				<div class="col-xs-6 text-right">
					<div class="form-group">
						<button type="submit" name="update" value="update" class="btn btn-default"><i class="fa fa-check"></i>&nbsp;Update</button> 
					</div>
				</div>
			</div>		
			</form>	
			<?
			}
			?>		<!--//forms-->											   
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