<? include_once('include/header.php');?>
							<!--//outer-wp-->
			<div class="outter-wp">
					<!--/sub-heard-part-->	
					
						<div class="row">
							<div class="col-md-12" style="margin-bottom: 1.5%;">	
									<select class="formcontrol_header" id="selectcategory" name="selectcategory" value="selectcategory" placeholder="Select category">
									<option value="">Select category</option>
									<option value="C1">C1</option>
									<option value="C2">C2</option>
									<option value="C3">C3</option>
									</select>
									<? 
									 $login_id = $this->session->userdata('login_id');
									   if($this->session->userdata('login_usertype')=='Admin')
										 {
							             $sql ="SELECT login_id,login_name FROM login where login_usertype!='Admin'";
							             }else
							            {
                                          $sql ="SELECT login_id,login_name FROM login where login_id='".$login_id."'";
							            }
									$query = $this->db->query($sql);
									$getuser=$query->result();
									?>						
									<select class="formcontrol_header" id="selectagent" name="selectagent" placeholder="Select agent">
									  <?
								    if($this->session->userdata('login_usertype')=='Admin')
								      { ?>		
									 <option value="">Select agent</option>
									<? }
									foreach ($getuser as $getdata)
									{
									 ?>
									<option value="<?=$getdata->login_id?>"><?=$getdata->login_name?></option>
									
									<?
									}
									?>	
									</select>
																
									<select class="formcontrol_header" id="selectstatus" name="selectstatus" placeholder="Select status">
									<option value="">Select status</option>
									<option value="In-progress">In-progress</option>
									<option value="Pipeline">Pipeline</option>
									<option value="No Budget">No Budget</option>
									<option value="Special Leads">Special Leads</option>
									<option value="Sample Sent">Sample Sent</option>
									<option value="Reminder 1">Reminder 1</option>
									<option value="Reminder 2">Reminder 2</option>
									<option value="Nudge">Nudge</option>
									<option value="Kind Request">Kind Request</option>
									<option value="Reminder 3">Reminder 3</option>
									<option value="Extra Discount">Extra Discount</option>
									</select>
																
									<input type="email" class="formcontrol_header" id="mail" name="mail" value="" placeholder="Enter email.."> 
																	
									<input type="text" class="formcontrol_header" id="fromdate" name="fromdate" value=""placeholder="Enter from.."> 
									<span>to</span>
									<input type="text" class="formcontrol_header" id="todate" name="todate" value=""placeholder="Enter to..">
																	
									<button class="btn btn-default" style="margin-left: 1%; padding: 4px 15px; background: #da1313;" type="submit" name="filter" id="filter" value="filter">Filter</button>
									<button type="button" class="btn btn-default btn-sm" id="exceldwn">
          							<span class="glyphicon glyphicon-download-alt"></span>
        							</button>
							</div>
					</div>
		
			<div class="forms-main">
			    <div class="col-md-12 form-top">
				<h2 class="inner-tittle" style="float: left;"><i class="fa fa-users"></i>&nbsp;Working Leads</h2>
					<button class="inner-title btn btn-default btnaddlead" type="submit" style="float:right"><a class="abtn"href="addlead"><i class="fa fa-edit"></i>&nbsp;Add Lead</a></button>
			    </div>		
					<div class="graph-form">
							<div class="form-body">
								<table id="user_data" class="table table-striped table-bordered working-table" style="width:100%">
									<thead>
											<tr>
												<th>Sr no.</th>
												<th>Report_Title</th>
												<th>Source</th>
												<th>Status</th>
												<th>Client_Name</th>
												<th>Client_Email</th>
												<th>Country</th>
												<th>Cat</th>
												<th>Creation_Date</th>
												<th>Last Update</th>
												<th>Action</th>
											</tr>
									</thead>
								</table>
											<!--//forms-->											   
									</div>
											<!--//outer-wp-->
								</div>
									 <!--footer section start-->
										
									<!--footer section end-->
								</div>
							</div>

<? include_once('include/footer.php'); ?>
<script type="text/javascript" language="javascript" >  
  $(document).ready(function(){
 var selectcategory=$("#selectcategory").val();
  var selectagent=$("#selectagent").val();
  var selectstatus=$("#selectstatus").val();
  var mail=$("#mail").val();
  var fromdate=$("#fromdate").val();
  var todate=$("#todate").val();
  var filter=$("#filter").val();
  var utype='<?echo $this->session->userdata('login_usertype')?>';
  if(utype=='Admin')
  {	  
 if(selectcategory=='' && selectagent=='' && selectstatus=='' && mail=='' && fromdate=='' && todate=='')
 {
	  var dataTable = $('#user_data').DataTable({  
           "processing":true,  
           "serverSide":true,
           "scrollX": true,
  		 "ordering": false,
           "bDestroy": true,
           "bJQueryUI": true,		   
           "order":[],  
           "ajax":{  
              'type': 'POST',
               'url': '<?php echo base_url() . 'workinglead/fetch_lead'; ?>',
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 3, 4],  
                     "orderable":false,  
                },  
           ],  
      });
 }
}else
{
  var selectcategory=$("#selectcategory").val();
  var selectagent=$("#selectagent").val();
  var selectstatus=$("#selectstatus").val();
  var mail=$("#mail").val();
  var fromdate=$("#fromdate").val();
  var todate=$("#todate").val();
  var filter=$("#filter").val();	 
      var dataTable = $('#user_data').DataTable({  
           "processing":true,  
           "serverSide":true,
           "scrollX": true,
  		   "ordering": false,
           "bDestroy": true,
           "bJQueryUI": true,		   
           "order":[],  
           "ajax":{  
              'type': 'POST',
               'url': '<?php echo base_url() . 'workinglead/fetch_lead'; ?>',
               'data': { 'selectcategory': selectcategory,'selectagent': selectagent,'selectstatus': selectstatus,'mail': mail,'fromdate': fromdate,'todate': todate,'filter':filter,
           // etc..
        },		
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 3, 4],  
                     "orderable":false,  
                },  
           ],  
      });	
}
	 $("#filter").click(function(){
  var selectcategory=$("#selectcategory").val();
  var selectagent=$("#selectagent").val();
  var selectstatus=$("#selectstatus").val();
  var mail=$("#mail").val();
  var fromdate=$("#fromdate").val();
  var todate=$("#todate").val();
  var filter=$("#filter").val();	 
      //alert(selectcategory);
      var dataTable = $('#user_data').DataTable({  
           "processing":true,  
           "serverSide":true,
           "scrollX": true,
  		   "ordering": false,
           "bDestroy": true,
           "bJQueryUI": true,		   
           "order":[],  
           "ajax":{  
              'type': 'POST',
               'url': '<?php echo base_url() . 'workinglead/fetch_lead'; ?>',
               'data': { 'selectcategory': selectcategory,'selectagent': selectagent,'selectstatus': selectstatus,'mail': mail,'fromdate': fromdate,'todate': todate,'filter':filter,
           // etc..
        },		
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 3, 4],  
                     "orderable":false,  
                },  
           ],  
      });
 }); 
}); 	  



 
 
</script>

<script>
function junckmail(a)	
{
var junk=$("#junk"+a).val();
var hiddenid=$("#flag"+a).data("id");
//alert(hiddenid);
var dataString = {'junk': junk,'hiddenid': hiddenid};
  // console.log(dataString);
    $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>addjunk",
                    data: dataString,
                    success:function(){
                    window.location.reload();
                        //console.log('aaa');
                    }
                });
          
}	
</script>

<script>
$("#exceldwn").click(function(){

   var category=$("#selectcategory").val();
  var selectagent=$("#selectagent").val();
  var selectstatus=$("#selectstatus").val();
  var mail=$("#mail").val();
  var fromdate=$("#fromdate").val();
  var todate=$("#todate").val();
 // var filter=$("#filter").val();	
 // console.log(selectagent);
  var dataString = {'category': category,'selectagent': selectagent,'selectstatus': selectstatus,'mail': mail,'fromdate': fromdate,'todate': todate};
 // console.log(dataString);
    $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>createXLS",
                    data: dataString,
                    success:function(res){
                    //window.location.reload();
                    var obj = JSON.parse(res);
                     console.log(res);
                     console.log('ddddd');
                    window.location.href=""+obj.url;  
                    }
                });

});
  </script>       
  <script>
function flagchange(a){
  var leadid=$("#flag"+a).data("id");
  var dataString = {'leadid': leadid};
  //console.log(dataString);
    $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>updateflag",
                    data: dataString,
                    success:function(res){
                     window.open('leaddetails?lead_id='+leadid,'_blank');    
                    //window.location.href="leaddetails?lead_id="+leadid,'_blank';  
                    }
                });

}
  </script>  