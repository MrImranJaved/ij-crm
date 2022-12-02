 <!--footer section start-->
										<footer class="footer" style="text-align:center; color:#fff";>© 2022 MNR CRM. All rights reserved | Markets N Research
              							</footer>
              							<!--js -->
<!-- Bootstrap Core JavaScript -->
 <script src="<?php echo base_url(); ?>include/js/bootstrap.min.js"></script>
    <!--//content-inner-->
				
				<script>
							$(document).ready(function() {
    							$('#example').dataTable( {
  									"scrollX": true,
  									"ordering": false
								} );
    						});
		        </script>
		                                 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
										   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
										  <script>
										  $( function() {
										    $( "#fromdate" ).datepicker({
                                                maxDate: 0
                                            });
										  } );
										  </script>
										  <script>
										  $( function() {
										    $( "#todate" ).datepicker({
                                                maxDate: 0
                                            });
										  } );
  										</script>	
  <script>
										  $( function() {
										    $( "#creationdate" ).datepicker({
                                                maxDate: 0
                                            });
										  } );
										  </script>
										    <script>
										  $( function() {
										    $( "#reminderdate" ).datepicker({
                                                minDate: 0
                                            });
										  } );
										  </script>
										  <script>
										  $( function() {
										    $( "#lead_from_date" ).datepicker({
                                                maxDate: 0
                                            });
										  } );
										 
										  $( function() {
										    $( "#lead_to_date" ).datepicker({
                                                maxDate: 0
                                            });
										  } );
  										</script>	
<script>
function isNumericKey(e)
        {
	  if (window.event) 
		{ 
		var charCode = window.event.keyCode; 
		}
        else if (e) 
		{ 
	      var charCode = e.which; 
	    }
        else 
		{ 
		  return true; 
		}
        if (charCode > 31 && (charCode < 48 || charCode > 57)) 
		{ 
	    return false; 
	    }
        return true;
       }
	
</script>	
<script>
$("input").on("keypress", function(e) {
    var startPos = e.currentTarget.selectionStart;
    if (e.which === 32 && startPos==0)
        e.preventDefault();
});
</script>

<script>
function goBack() {
  window.history.back()
}
</script>