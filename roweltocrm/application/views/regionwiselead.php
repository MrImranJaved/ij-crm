<? include_once('include/header.php');?>
							<!--//outer-wp-->
			<div class="outter-wp">
					<!--/sub-heard-part-->	
			<div class="forms-main">
				<h2 class="inner-tittle" style="float: left;"><i class="fa fa-users"></i>&nbsp;Region Wise Leads</h2>
					<button class="inner-title btn btn-default btnaddlead" style="margin-left: 72%;" type="submit"><a class="abtn"href="addlead"><i class="fa fa-edit"></i>&nbsp;Add Lead</a></button>
						<div class="graph-form">
							<div class="form-body">
									<table id="user_data" class="table table-striped table-bordered working-table" style="width:100%">
									<thead>
											<tr>
												<th>Sr no.</th>
												<th>Report_Title</th>
												<th>Region</th>
												<th>Source</th>
												<th>Status</th>
												<th>Client_Name</th>
												<th>Client_Email</th>
												<th>Country</th>
												<th>Cat</th>
												<th>Creation_Date</th>
												<th>Last Update</th>
											</tr>
									</thead>
								</table>								   
									</div>
											<!--//outer-wp-->
								</div>
									 <!--footer section start-->
										
									<!--footer section end-->
								</div>
							</div>

<? include_once('include/footer.php'); ?>
<script>
 $(document).ready(function(){
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
               'url': '<?php echo base_url() . 'Regionwiselead/fetchregion_lead'; ?>',
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 3, 4],  
                     "orderable":false,  
                },  
           ],  
      });
 });
</script>