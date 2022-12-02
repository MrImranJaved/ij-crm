
<? include_once('include/header.php');?>
							<!--//outer-wp-->
			<div class="outter-wp">
												<!--/forms-->
					<div class="forms-main">
						<h2 class="inner-tittle"><i class="fa fa-users"></i>&nbsp;Reminders</h2>
                                <span class="regionmainherrmsg" style="color:red"><?=$this->session->flashdata('msg');?></span>
								<div class="graph-form">
									<div class="form-body">
										<table id="example" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>Reminder Date</th>
												<th>Description</th>
												<th>Updated At</th>
												<th>Action</th>
												<? if($this->session->userdata('login_usertype')=='Admin' AND $this->session->userdata('access_type')=='All')
                								{
                                                ?> 
												<th>Action</th>
											  <? }?>
											</tr>
										</thead>
										<tbody>
											<?
												foreach ($fetchdata as $getdata)
													{
														 ?>
												         <tr><td><? echo date( "d-m-Y", strtotime($getdata->reminder_date) );?></td>
												            <td><? echo $getdata->description;?></td>
												            <td><? echo date( "d-m-Y H:i:s", strtotime($getdata->updated_at) );?></td>
												            <td><a href="leaddetails?lead_id=<?=$getdata->lead_id;?>"><button class="btn btn-danger btnjunk">Lead Details</button></a></td>
												           <? if($this->session->userdata('login_usertype')=='Admin' AND $this->session->userdata('access_type')=='All')
                										       {
                                                               ?> 
												                <td><a href="javascript:void(0);"Onclick="detadel(<? echo $getdata->lead_id;?>)"><i class="fa fa-trash fadelete" style="font-size:30px;"></i></a></td>
												             <? }?>
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
function detadel(id){
		
		var conf = confirm("Are you sure want to delete?");
		if(conf==true){
			window.location.href="deleteleadreminder?id="+id;
		}
	}
</script>
