<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo">
					<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a><a href="index.html"><span id="logo"><img class="indexlogo" src="images/logo.png" alt="apexmarketsresearch"></h2> 
					<!--<img id="logo" src="" alt="Logo"/>--> 
				  </a> 
				</header>
			<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
			<!--/down-->
							<div class="down">	
									  <a href="profile.php"><img src="images/admin.jpg"></a>
									  <span class=" name-caret">Jasmin Leo</span>
									 <p>System Administrator</p>
									 <ul>
									<li><a class="tooltips" href="profile.php"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
									<li><a class="tooltips" href="index.php"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
										</ul>
									</div>
							   <!--//down-->
                           <div class="menu" id="style-2">
                           		<ul id="menu" >
										<li><a href="index.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
										 <li><a href="add_lead.php"><i class="fa fa-file-text-o"></i> <span>Add Lead</span></a></li>
										 <li><a href="working_leads.php"><i class="fa fa-clock-o"></i> <span>Working Leads</span></a></li>
									<li><a href="buy_leads.php"><i class="fa fa-money"></i> <span>Buy Leads</span></a></li>
									<li><a href="no_interest.php"><i class="fa fa-archive"></i> <span>Junk/Not Interested</span></a></li>
									 <li><a href="#"><i class="fa fa-user-o"></i> <span>User</span><span class="fa fa-angle-right" style="float: right"></span></a>
									   <ul>
										<li><a href="all_users.php"><i class="users"></i>&nbsp;All User</a></li>
										<li><a href="add_user.php"><i class="user"></i>&nbsp;Add User</a></li>
									  </ul>
									</li>
							        <li><a href="region_assignment.php"><i class="fa fa-file-text-o"></i> <span>Region Assignment</span></a></li>
								  </ul>

								</div>
							  </div>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<link rel="stylesheet" href="css/vroom.css">
<script type="text/javascript" src="js/vroom.js"></script>
<script type="text/javascript" src="js/TweenLite.min.js"></script>
<script type="text/javascript" src="js/CSSPlugin.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
 <script src="js/bootstrap.min.js"></script>
    <!--//content-inner-->
				
				<script>
							$(document).ready(function() {
    							$('#example').DataTable();
    						});
		        </script>
		                                 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
										   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
										  <script>
										  $( function() {
										    $( "#fromdate" ).datepicker();
										  } );
										  </script>
										  <script>
										  $( function() {
										    $( "#todate" ).datepicker();
										  } );
  										</script>	
  <script>
										  $( function() {
										    $( "#creationdate" ).datepicker();
										  } );
										  </script>
</body>
</html>