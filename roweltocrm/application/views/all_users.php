<? include_once('include/header.php');?>
							<!--//outer-wp-->
			<div class="outter-wp">
					<!--/sub-heard-part-->	
											<!--/sub-heard-part-->	
												<!--/forms-->
									<div class="forms-main">
									    	<div class="col-md-12 form-top">
										<h2 class="inner-tittle" style="float: left;"><i class="fa fa-users"></i>&nbsp;All Users</h2>
							<span class="regionmainherrmsg" style="color:red"><?=$this->session->flashdata('msg');?></span>
										<button class="inner-title btn btn-default btnaddlead" type="submit" style="float:right"><a href="adduser" style="color: #fff;"><i class="fa fa-edit"></i>&nbsp;Add User</a></button>
											</div>
											<div class="graph-form">
												<div class="form-body">
															<table id="example" class="table table-striped table-bordered" style="width:100%">
												        <thead>
												            <tr>
												            	<th>Sr no.</th>
												                <th>Name</th>
												                <th>Email</th>
												                <th>Role</th>
												                <th>Acess</th>
												                <th>Updated At</th>
												                <th>Edit</th>
												                <th>Delete</th>	
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
												                <td><? echo $getdata->login_email;?></td>
												                <td><? echo $getdata->login_usertype;?></td>
												                <td><? echo $getdata->access_type;?></td>
												                <td><? echo date( "d-m-Y H:i:s", strtotime($getdata->creation_date) );?></td>
												                <td><a style="color:#005058;" href="<?php echo base_url(); ?>edituser?login_id=<?=$getdata->login_id;?>"><i class="fa fa-edit" style="font-size:30px;"></i></a></td>
												                <td><a href="javascript:void(0);"Onclick="detadel(<? echo $getdata->login_id;?>)"><i class="fa fa-trash fadelete" style="font-size:30px;"></i></a></td>
												                
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
			window.location.href="deleteuser?id="+id;
		}
	}
</script>        