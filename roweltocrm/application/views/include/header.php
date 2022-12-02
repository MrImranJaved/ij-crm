        <!DOCTYPE HTML>
        <html>
          <head>
            <title>Rowelto Associates CRM</title>
             <meta name="viewport" content="width=device-width, initial-scale=1">
               <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                 <meta name="keywords" content="" />
                      <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
                         <!-- Bootstrap Core CSS -->
                        <link href="<?php echo base_url(); ?>include/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
                         <!-- Graph CSS -->
                         <link href="<?php echo base_url(); ?>include/css/font-awesome.css" rel="stylesheet"> 
                          <!-- jQuery -->
                        <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
                        <!-- lined-icons -->
                       <link rel="stylesheet" href="<?php echo base_url(); ?>include/css/icon-font.min.css" type='text/css' />
                     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                     <!-- //lined-icons -->
                     <!--<script src="<?php echo base_url(); ?>include/js/jquery-1.10.2.min.js"></script>-->
                  <script src="<?php echo base_url(); ?>include/js/amcharts.js"></script>
                 <!--<script src="<?php echo base_url(); ?>include/js/amcharts1.js"></script>-->	
               <script src="<?php echo base_url(); ?>include/js/serial.js"></script>	
             <script src="<?php echo base_url(); ?>include/js/light.js"></script>	
           <script src="<?php echo base_url(); ?>include/js/skycons.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <link href="<?php echo base_url(); ?>include/css/style.css" rel="stylesheet" type="text/css" media="all" />
    </head> 
    <body>
			<div class="header-section">
						<!--menu-right-->
						<div class="top_menu">
							<!--/profile_details-->
							<div class="profile_details_right">
							    <h3>Rowelto CRM</h3>
							</div>    
								<div class="profile_details_left">
									<ul class="nofitications-dropdown">
					         	<?  	
    						      $currentdate=date('Y-m-d');
    							  if($this->session->userdata('login_usertype')=='Admin')
    						      {	
    							  $sql ="SELECT count(R.reminder_date) as remind,R.reminder_date FROM reminder_table as R where R.reminder_date='".$currentdate."'";
    						      $query = $this->db->query($sql);
							     }else
    							   {
    							  	 $login_id = $this->session->userdata('login_id');
            					     $this->db->select('count(R.reminder_date) as remind,R.reminder_date');
    							     $this->db->from('reminder_table as R');
    							     $this->db->join('lead_table', 'lead_table.lead_id = R.lead_id');
    							     $this->db->join('region_assign_table', 'lead_table.selectregion = region_assign_table.region');
    							     $this->db->join('login', 'region_assign_table.user_id = login.login_id');
    							     $this->db->where(array('login.login_id' => $login_id, 'R.reminder_date' => $currentdate));							  
    							     $query=$this->db->get();  
    
    							   }
							   $remindercnt=$query->result();
							   $todayreminder = json_decode(json_encode($remindercnt), True);
							   //print_r($todayreminder);
								?>
							<li class="dropdown note">
								<a href="<?php echo base_url();?>viewreminders" class="dropdown-toggle"><i class="fa fa-bell-o"></i> <span class="badge"><?=$todayreminder[0]['remind']?></span></a>
							</li>
										<li class="headermenu"><a href="dashboard"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
										 <li class="headermenu"><a href="<?php echo base_url(); ?>addlead"><i class="fa fa-file-text-o"></i> <span>Add Lead</span></a></li>
										 <li class="headermenu"><a href="<?php echo base_url(); ?>workinglead"><i class="fa fa-clock-o"></i> <span>Working Leads</span></a></li>
									     <li class="headermenu"><a href="<?php echo base_url(); ?>regionassign"><i class="fa fa-file-text-o"></i> <span>Region Assignment</span></a></li>
									     <?						
									     if($this->session->userdata('login_usertype')=='Admin' AND $this->session->userdata('access_type')=='All')
						                  {					                   
									     ?>
									      <li class="headermenu">
									     <div class="dropdown">
							 <button class="dropbtn"><i class="fa fa-user-o"></i>&nbsp;User&nbsp;&nbsp;<i class="fa fa-caret-down"></i></button>
										  <div class="dropdown-content">
										  	<a href="<?php echo base_url(); ?>allusers">All User</a>
										    <a href="<?php echo base_url(); ?>adduser">Add User</a>
										 </div>
										</div>
									</li>
								      <? }?>
						    <li class="dropdown note">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i></a>
										<ul class="dropdown-menu two">
										<li><a href="workinglead">
											<div class="task-info">
												<span class="task-desc">Working Leads</span><span class="percentage"></span>
											   <div class="clearfix"></div>	
											</div>
										   
											<div class="progress progress-striped active">
												 <div class="bar green" style="width:0%;"></div>
											</div>
										</a></li>
										<li><a href="Buylead">
											<div class="task-info">
												<span class="task-desc">Completed Leads</span><span class="percentage"></span>
												<div class="clearfix"></div>	
											</div>
										   <div class="progress progress-striped active">
												 <div class="bar red" style="width: 0%;"></div>
											</div>
										</a></li>
										<li><a href="Nointerestlead">
											<div class="task-info">
												<span class="task-desc">Cancel Leads</span><span class="percentage"></span>
											   <div class="clearfix"></div>	
											</div>
											<div class="progress progress-striped active">
												 <div class="bar  blue" style="width: 0%;"></div>
											</div>
										</a></li>
									</ul>
							</li>
							<li class="headermenu"><span class="glyphicon glyphicon-download-alt header-down" data-toggle="modal" data-target="#myModalall"></span></li>
			            	<li class="dropdown note" style="border-right: 1px solid rgb(0, 80, 88);">
											<a href="logout"><i class="fa fa-power-off"></i></a>
							</li>

								<li class="headermenu">
									     <div class="dropdown">
							 <button class="dropbtn">Welcome <? echo substr($this->session->userdata('login_name'),0,6);?>&nbsp;&nbsp;<i class="fa fa-caret-down"></i></button>
										  <div class="dropdown-content">
										  	<a href="<?php echo base_url(); ?>logout">Admin User</a>
										    <a href="<?php echo base_url(); ?>logout">Sales User</a>
										 </div>
										</div>
									</li>

							<div class="clearfix"></div>	
								</ul>
							</div>
							<div class="clearfix"></div>	
							<!--//profile_details-->
						</div>
						<!--//menu-right-->
					<div class="clearfix"></div>
				</div>
					<!-- //header-ends -->
				  <div class="modal fade" id="myModalall" role="dialog">
										    <div class="modal-dialog">
										    
										      <!-- Modal content-->
										      <div class="modal-content">
										        <div class="modal-header">
										          <button type="button" class="close" data-dismiss="modal">&times;</button>
										          <h4 class="modal-title">CRM</h4>
										        </div>
										        <div class="modal-body">
				                             	<form action="<?=base_url()?>excelallleads" method="post" enctype="multipart/form-data">
										        		<div class="row">
																	<div class="col-md-6">
																	<div class="form-group">
																	<label>Select From Date</label>
																	<span class="errormesage" id="lead_from_date_err"></span> 
																    <input class="form-control" type="text" name="lead_from_date" id="lead_from_date" value="">
																   </div>
															       </div>
														  <div class="col-md-6">
															<div class="form-group">
														    <label>Select To Date</label>
														     <span class="errormesage" id="lead_to_date_err"></span>
														      <input class="form-control" type="text" name="lead_to_date" id="lead_to_date" value="">
														    </div> 
														 </div>
													  </div>
										         <div class="modal-footer">
										          <button type="cancel" style="float:left" class="btn btn-default" data-dismiss="modal">Cancel</button>
										          <button type="submit" id="allleaddwn" value="submit" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-download-alt header-down"></span>&nbsp;Download</button>
										        </div>
										        </form>
										        </div>
										      </div>
										    </div>
										  </div>
			<script>
            $("#allleaddwn").click(function(){
              var fromdate=$('#lead_from_date').val();
               if(fromdate==''){
                $('#lead_from_date_err').text('Kindly Select From Date');
                $('#lead_from_date').focus(); 
                return false;
              }
              else{
              	$('#lead_from_date_err').text('');
              }
              var todate=$('#lead_to_date').val();
             if(todate==''){
                $('#lead_to_date_err').text('Kindly Select To Date');
                $('#lead_to_date').focus(); 
                return false;
              }
              else{
              	$('#lead_to_date_err').text('');
              }
              var dataString = {'fromdate': fromdate,'todate': todate};
              //console.log(dataString);
                $.ajax({
                                type: "POST",
                                url: "<?php echo base_url()?>excelallleads",
                                data: dataString,
                                success:function(res){
                                //window.location.reload();
                                var obj = JSON.parse(res);
                                window.location.href=""+obj.url;  
                                }
                            });
            
            });
        </script>       							  