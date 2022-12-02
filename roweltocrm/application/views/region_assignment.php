<? include_once('include/header.php');?>
							<!--//outer-wp-->
			<div class="outter-wp">
					<!--/sub-heard-part-->	
											<!--/sub-heard-part-->	
												<!--/forms-->
									<div class="forms-main">
										<div class="col-md-12 form-top">
										<h2 class="inner-tittle" style="float:left"><i class="fa fa-file-text-o"></i>&nbsp;Region Assignment</h2>
										<span class="regionmainherrmsg"><?=$this->session->flashdata('msg');?></span>
										<span class="regionmainherrmsg"><?=$this->session->flashdata('msg1');?></span>
										<?						
									     if($this->session->userdata('login_usertype')=='Admin' AND $this->session->userdata('access_type')=='All')
						                  {					                   
									     ?>
										<button class="inner-title btn btn-default btnaddleadsregion pull-right" type="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i>&nbsp;Assign Region</button>
									   <? }?>
									</div>
										<!-- Modal -->
										  <div class="modal fade" id="myModal" role="dialog">
										    <div class="modal-dialog">
										    
										      <!-- Modal content-->
										      <div class="modal-content">
										        <div class="modal-header">
										          <button type="button" class="close" data-dismiss="modal">&times;</button>
										          <h4 class="modal-title">CRM</h4>
										        </div>
										        <div class="modal-body">
					                                    <form action="<?=base_url()?>regionassign" method="post" enctype="multipart/form-data">
										        		<div class="row">
																	<div class="col-md-12">
																	<div class="form-group">
																	<label>Select user</label>
																	<span class="errormesage" id="selectuser_err"></span> 
																	<? 
																	$sql ="SELECT * FROM login where login_usertype!='Admin'";
																	$query = $this->db->query($sql);
																	$getuser=$query->result();
																	?>
																 <select class="form-control" id="selectuser" name="selectuser" placeholder="Select user">

																    	<option value="">Select user</option>
																    	<?
																			foreach ($getuser as $setdata){
																		?>
																    	<option value="<?=$setdata->login_id?>"><?=$setdata->login_name?></option>
																    <? }?>
																  </select>
																  		
																</div>
															</div>
																	<div class="col-md-12">
																		<div class="form-group">
																	<label>Select region</label>
																	<span class="errormesage" id="selectregion_err"></span>
																	<select class="form-control" id="selectregion" name="selectregion" placeholder="Select region">
																    	<option value="">Select region</option>
																    	<option value="EU">EU</option>
																    	<option value="USA">USA</option>
																    	<option value="APAC">APAC</option>
																  		</select>
																	</div> 
														</div>
													</div>
										        <div class="modal-footer">
										          <button type="cancel" class="btn btn-default" data-dismiss="modal">Cancel</button>
										          <button type="submit" id="submit" value="submit" class="btn btn-default" data-dismiss="modal">Add</button>
										        </div>
										        </form>
										        </div>
										      </div>
										      
										    </div>
										  </div>
										  <!--//Model content>
										<!-Main form-->
											<div class="graph-form">
												<div class="form-body">
															<table id="example" class="table table-striped table-bordered" style="width:100%">
												        <thead>
												            <tr>
												            	<th>Sr no.</th>
												            	<th>User</th>
												                <th>Region</th>
												                <th>Updated At</th>
												                <?
                                                             if($this->session->userdata('login_usertype')=='Admin' AND $this->session->userdata('access_type')=='All')
						                                       {
                                                               ?>   
												                <th>Edit</th>
												                <th>Delete</th>
												             <? }?>
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
												                <td><? echo $getdata->login_name;?></td>
												                <td><? echo $getdata->region;?></td>
												                <td><? echo date("d-m-Y H:i:s", strtotime($getdata->updation_date));?></td>
												                <?
												               if($this->session->userdata('login_usertype')=='Admin' AND $this->session->userdata('access_type')=='All')
                										       {
                                                               ?>   
												                <td><a style="color:#005058;" href="<?php echo base_url(); ?>editregion?region_id=<?=$getdata->region_id;?>"><i class="fa fa-edit" style="font-size:30px;"></i></a></td>
												                <td><a href="javascript:void(0);"Onclick="detadel(<? echo $getdata->region_id;?>)"><i class="fa fa-trash fadelete" style="font-size:30px;"></i></td>
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
$("#submit").click(function(){

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
  var submit=$('#submit').val();
  var dataString = {'selectuser': selectuser , 'selectregion': selectregion, 'submit': submit};
   //console.log(dataString);
    $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>regionassign",
                    data: dataString,
                    success:function(){
                    window.location.reload();
                        //console.log('aaa');
                    }
                });
});
  </script>
  <script>
function detadel(id){
		
		var conf = confirm("Are you sure want to delete?");
		if(conf==true){
			window.location.href="deleteregionassign?id="+id;
		}
	}
	</script>  