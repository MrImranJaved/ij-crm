
<? include_once('include/header.php');?>
							<!--//outer-wp-->
			<div class="outter-wp">
					<!--/sub-heard-part-->	
					<form action="<?php echo base_url(); ?>workinglead" method="post" onsubmit="" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12" style="margin-bottom: 1%;">	
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
							             $sql ="SELECT * FROM login";
							             }else
							            {
                                          $sql ="SELECT * FROM login where login_id='".$login_id."'";
							             }
									$query = $this->db->query($sql);
									$result=$query->result();
									?>							
																	
									<select class="formcontrol_header" id="selectagent" name="selectagent" value="" placeholder="Select agent">
									<option value="">Select agent</option>
									 
									<?
									foreach ($result as $getdata)
									{

									 ?>
									<option value="<?=$getdata->login_id?>"><?=$getdata->login_name?></option>
									
									<?
									}
									?>	
									</select>
																
									<select class="formcontrol_header" id="selectstatus" name="selectstatus" value="" placeholder="Select status">
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
									<button type="button" class="btn btn-default btn-sm">
          							<span class="glyphicon glyphicon-download-alt"></span>
        							</button>
							</div>
					</div>
			</form>
		
											<!--/sub-heard-part-->	
												<!--/forms-->
			<div class="forms-main">
				<h2 class="inner-tittle" style="float: left;"><i class="fa fa-users"></i>&nbsp;Working Leads</h2>
					<button class="inner-title btn btn-default btnaddlead" type="submit"><a class="abtn"href="addlead"><i class="fa fa-edit"></i>&nbsp;Add Lead</a></button>
						<div class="graph-form">
							<div class="form-body">
								<table id="example" class="table table-striped table-bordered working-table" style="width:100%">
									<thead>
											<tr>
												<th>Sr no.</th>
												<th>ID</th>
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
										<tbody>
											<?
											$i=0;
												foreach ($fetchdata as $getdata)
													{
                                                        $i=$i+1;
														 ?>
												         <tr>
												         	<td><? echo $i;?></td>
												           <td><? echo $getdata->lead_id;?></td>
												           <input type="hidden" name="hidden_leadid<?=$i?>" id="hidden_leadid<?=$i?>" value="<? echo $getdata->lead_id;?>">
												           <td title="<? echo $getdata->reporttitle;?>"><a href="leaddetails?lead_id=<?=$getdata->lead_id;?>"><? echo $getdata->reporttitle;?></a></td>
												            <td><? echo $getdata->source;?></td>
												            	<?if($getdata->status=='Sample Sent')
												                { ?>
												            <td><button class="btn btn-success btnsample btnallstatus">Sample Sent</button></td>
												               <? }
												            elseif($getdata->status=='Kind Request'){ ?>
												            <td><button class="btn btn-default btnkindreq btnallstatus" style="background: #ea0d55ba;font-size: 13px;">Kind Request</button></td>
												                <? }
												            elseif($getdata->status=='In-Progress'){ ?>
												            <td><button class="btn btn-default btninprogres btnallstatus" style="background: #55d022;">In-progress</button></td>
												            	<? }
												            elseif($getdata->status=='Pipeline'){ ?>
												            <td><button class="btn btn-default btninprogres btnallstatus" style="background: #4d87d0; font-size: 13px">Pipeline</button></td>
												            	<? }
												            elseif($getdata->status=='No Budget'){ ?>
												            <td><button class="btn btn-default btninprogres btnallstatus" style="background: #4a1f25f5;font-size: 13px">No Budget</button></td>
												            	<? }
												            elseif($getdata->status=='Special Leads'){ ?>
												            <td><button class="btn btn-default btninprogres btnallstatus" style="background: #bb2ee8; font-size: 13px">Special Leads</button></td>
												            	<? }
												            elseif($getdata->status=='Reminder 1'){ ?>
												            <td><button class="btn btn-default btninprogres btnallstatus" style="background: #d8b226;">Reminder 1</button></td>
												            	<? }
												            elseif($getdata->status=='Reminder 2'){ ?>
												            <td><button class="btn btn-default btninprogres btnallstatus" style="background: #da1313;">Reminder 2</button></td>
												            	<? }
												            elseif($getdata->status=='Nudge'){ ?>
												            <td><button class="btn btn-default btninprogres btnallstatus" style="background: #b7aa0a; font-size: 13px">Nudge</button></td>
												            	<? }
												            elseif($getdata->status=='Reminder 3'){ ?>
												            <td><button class="btn btn-default btninprogres btnallstatus" style="background: #00d756;">Reminder 3</button></td>
												            	<? }
												            elseif($getdata->status=='Extra Discount'){ ?>
												            <td><button class="btn btn-default btninprogres btnallstatus" style="background: #00c6d7; font-size: 13px">Extra Discount</button></td>
												            	<? } ?>    
												            <td><? echo $getdata->clientname;?></td>
												            <td><? echo $getdata->email;?></td>
												            <td><? echo $getdata->country;?></td>
												            <td><? echo $getdata->category;?></td>
												            <td><? echo date( "d-m-Y", strtotime($getdata->creationdate) );?></td>
												            <td><? echo $getdata->last_updated;?></td>
												            <td><button type="button" onclick="junckmail(<?=$i?>)"class="btn btn-danger btnjunk" name="junk<?=$i?>" id="junk<?=$i?>" value="No Interest">Junk</button></td>
												         </tr>
												            <?
												        	}
												        	?>
												        </tbody>
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
<script>
function junckmail(a)	
{
var junk=$("#junk"+a).val();
var hiddenid=$("#hidden_leadid"+a).val();
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
