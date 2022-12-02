<? include_once('include/header.php');
$todayleadcnt = json_decode(json_encode($gettodaylead), True);
$statusleadcnt = json_decode(json_encode($getleadstatus), True);
$workingleads=$statusleadcnt[1]['stat']+$statusleadcnt[2]['stat']+$statusleadcnt[3]['stat']+$statusleadcnt[4]['stat']+$statusleadcnt[6]['stat']
+$statusleadcnt[7]['stat']+$statusleadcnt[8]['stat']+$statusleadcnt[9]['stat']+$statusleadcnt[10]['stat']+$statusleadcnt[11]['stat']+$statusleadcnt[12]['stat'];
?>
						<div class="outter-wp" style="background-color:#f1f1f1">
								<!--custom-widgets-->
												<div class="custom-widgets">
												   <div class="row-one">
														<div class="col-md-3 widget">
															<a href="todayleads"><div class="stats-left ">
																<i class="fa fa-clock-o falogo" aria-hidden="true"></i><h5>Today's</h5>
																<h3 class="h3menu">Leads</h3>
															</div></a>
															<div class="stats-right">
																<label><?=$todayleadcnt?></label>
															</div>
															<div class="clearfix"> </div>	
														</div>
														<div class="col-md-3 widget states-mdl">
															<a href="workinglead"><div class="stats-left">
																<i class="fa fa-spinner falogo fa-spin"></i>
																<h5>Working</h5>
																<h3 class="h3menu" style="margin-right:40px;">Leads</h3>
															</div></a>
															<div class="stats-right">
																<label><?=$workingleads?></label>
															</div>
															<div class="clearfix"> </div>	
														</div>
														<div class="col-md-3 widget states-thrd">
														<a href="Buylead"><div class="stats-left">
																<i class="fa fa-money falogo"></i>
																<h5>Buy</h5>
																<h3 class="h3menu" style="margin-right: 25px;">Leads</h3>
															</div></a>
															<div class="stats-right">
																<label><?=$statusleadcnt[0]['stat']?></label>
															</div>
															<div class="clearfix"> </div>	
														</div>
														<div class="col-md-3 widget states-last">
														    <a href="Nointerestlead">
															<div class="stats-left">
																<i class="fa fa-ban falogo"></i>
																<h5>Cancel</h5>
																<h3 class="h3menu">Leads</h3>
															</div></a>
															<div class="stats-right">
																<label><?=$statusleadcnt[5]['stat']?></label>
															</div>
															<div class="clearfix"> </div>	
														</div>
														<div class="clearfix"> </div>	
													</div>
												</div>
												<?
                                             $leadcnt = json_decode(json_encode($lastseven), True);
                                             $beforeseven=date('M-d', strtotime('-6 days'));
                                             $beforesix=date('M-d', strtotime('-5 days'));
                                             $beforefive=date('M-d', strtotime('-4 days'));
                                             $beforefour=date('M-d', strtotime('-3 days'));
                                             $beforethree=date('M-d', strtotime('-2 days'));
                                             $beforetwo=date('M-d', strtotime('-1 days'));
                                             $beforeone=date('M-d', strtotime('0 days'));
                                             
                                              ?>
												<!--/charts-->
												<div class="charts">
												  <div class="chrt-inner">
												    <div class="chrt-bars">
														<div class="col-md-6 chrt-three amchartarea" style="">
														    <div class="" style="">
															<h3 class="sub-tittle">Last Seven Days Leads</h3>
																<div id="chartdiv"></div>	
																			<script>
																			   var chart = AmCharts.makeChart( "chartdiv", {
																					  "type": "serial",
																					  "theme": "light",
																					  "dataProvider": [ {
															"month":'<? echo $beforeseven;?>',
																"Leads": <?=$leadcnt[0]['COUNT']?>
																					  }, {
															"month": '<? echo $beforesix;?>',
															"Leads": <?=$leadcnt[1]['COUNT']?>
																					  }, {
															"month": '<? echo $beforefive;?>',
															"Leads": <?=$leadcnt[2]['COUNT']?>
																					  }, {
															"month": '<? echo $beforefour;?>',
															"Leads": <?=$leadcnt[3]['COUNT']?>
																					  }, {
															"month": '<? echo $beforethree;?>',
															"Leads": <?=$leadcnt[4]['COUNT']?>
																					  },{
															"month": '<? echo $beforetwo;?>',
															"Leads": <?=$leadcnt[5]['COUNT']?>
																					  },{
															"month": '<? echo $beforeone;?>',
															"Leads": <?=$leadcnt[6]['COUNT']?>
																					  } ],
																					  "balloon": {
																						"textAlign": "left"
																					  },
																					  "valueAxes": [ {
																						"id": "v1",
																						"axisAlpha": 0
																					  } ],
																					  "startDuration": 1,
																					  "graphs": [ {
																						"balloonText": "Leads:<b>[[Leads]]</b>",
																						
																						"bulletSize": 10,
																						"errorField": "error",
																						"lineThickness": 2,
																						"valueField": "Leads",
																						"bulletAxis": "v1",
																						"fillAlphas": 0
																					  }, {
																						"bullet": "round",
																						"bulletBorderAlpha": 1,
																						"bulletBorderColor": "#FFFFFF",
																						"lineAlpha": 0,
																						"lineThickness": 2,
																						"showBalloon": false,
																						"valueField": "Leads"

																					  } ],
																					  "chartCursor": {
																						"cursorAlpha": 0,
																						"cursorPosition": "mouse",
																						"graphBulletSize": 1,
																						"zoomable": false
																					  },
																					  "categoryField": "month",
																					  "categoryAxis": {
																						"gridPosition": "start",
																						"axisAlpha": 0
																					  },
																					  "export": {
																						"enabled": true
																					  }
																					} );
																			</script>
																</div>
																</div>
                                                <?
                                            $regioncnt = json_decode(json_encode($region), True);
                                            $totalregincnt=$regioncnt[0]['region']+$regioncnt[1]['region']+$regioncnt[2]['region'];
                                            if($totalregincnt==0)
                                            {
                                            $apaclead=0;
                                            $usalead=0;
                                            $eulead=0;
                                            }
                                            else{
                                            $apaclead=$regioncnt[0]['region']*100/$totalregincnt;
                                            $usalead=$regioncnt[2]['region']*100/$totalregincnt;
                                            $eulead=$regioncnt[1]['region']*100/$totalregincnt;
                                            }
                                            if($this->session->userdata('login_usertype')!='Admin')
                                            {
										    $login_id = $this->session->userdata('login_id');  	
											$sql ="SELECT * FROM region_assign_table where user_id='".$login_id."'";
											$query = $this->db->query($sql);
										//	$getregion=$query->row();
										$gt='';
											foreach ($query->result() as $getregion)
                                              {
                                                $gt.=$getregion->region.',';  
                                              }
                                             
                                             $cnvt= explode(',',$gt);
                                              //print_r($cnvt);
											}
                                              ?>
											<div class="col-md-3 chrt-three region_sec">
									         	<h3 class="sub-tittle">Region wise Leads</h3>
											<div class="col-md-12 dev-col">
                                            <div class="dev-widget dev-widget-transparent">
                                                <!--<h2 class="inner one">APAC Region</h2>-->
                                                <p>Total Leads of APAC region</p>
                                                <div class="dev-stat t_r_lead"><span class="counter"><?=round($apaclead)?></span>%</div>
                                                <div class="dev-stat"><span class="counter"><?=$regioncnt[0]['region']?></span></div>
                                                                                                                                
                                                <div class="progress progress-bar-xs">
                                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?=$apaclead?>%;"></div>
                                                </div>
                                                <?
                                                if($this->session->userdata('login_usertype')=='Admin')
										       {
                                               ?>                                     
                                                <a href="<?php echo base_url(); ?>regionwiselead?region=APAC" class="dev-drop">Take a closer look <span class="fa fa-angle-right pull-right"></span></a>
                                            <? }else if(in_array("APAC", $cnvt)){
                                            	?>
                                            	<a href="<?php echo base_url(); ?>regionwiselead?region=APAC" class="dev-drop">Take a closer look <span class="fa fa-angle-right pull-right"></span></a>
                                            	<? } ?>
                                            </div>

                                        </div>
                                        		<div class="col-md-12 dev-col">                                    

                                            <div class="dev-widget dev-widget-transparent dev-widget-success">
                                                <!-- <h3 class="inner">EU Region</h3>-->
                                                <p>Total Leads of EU region</p>                                        
                                         <div class="dev-stat t_r_lead"><span class="counter"><?=round($eulead)?></span>%</div> 
                                         <div class="dev-stat"><span class="counter"><?=$regioncnt[1]['region']?></span></div>
                                                <div class="progress progress-bar-xs">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?=$eulead?>%;"></div>
                                                </div>  
                                                <?
                                            if($this->session->userdata('login_usertype')=='Admin')
										       {
                                               ?>                  
                                                <a href="<?php echo base_url(); ?>regionwiselead?region=EU" class="dev-drop">Take a closer look <span class="fa fa-angle-right pull-right"></span></a>

                                            <? }else if(in_array("EU", $cnvt)){
                                            	?>
                                                 <a href="<?php echo base_url(); ?>regionwiselead?region=EU" class="dev-drop">Take a closer look <span class="fa fa-angle-right pull-right"></span></a>
                                             <? }?>
                                            </div>

                                        </div>
                                        		<div class="col-md-12 dev-col">                                    

                                            <div class="dev-widget dev-widget-transparent dev-widget-danger">
                                                <!-- <h3 class="inner">USA Region</h3>-->
                                                <p>Total Leads of USA region</p>
                                                <div class="dev-stat t_r_lead">
                                                <span class="counter"><?=round($usalead)?></span>%</div> 
                                                <div class="dev-stat"><span class="counter"><?=$regioncnt[2]['region']?></span></div>
                                                <div class="progress progress-bar-xs">
                                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?=$usalead?>%;"></div>
                                                </div> 
                                                <?
                                              if($this->session->userdata('login_usertype')=='Admin')
										       {
                                               ?>                                           
                                                <a href="<?php echo base_url(); ?>regionwiselead?region=USA" class="dev-drop">Take a closer look <span class="fa fa-angle-right pull-right"></span></a>
                                                <? }else if(in_array("USA", $cnvt)){
                                            	?>
                                                 <a href="<?php echo base_url(); ?>regionwiselead?region=USA" class="dev-drop">Take a closer look <span class="fa fa-angle-right pull-right"></span></a>
                                               <? }?>                                          
                                            </div>
                                           </div>
                                        </div>
                                        <? 
                                        $catagrycnt = json_decode(json_encode($catagorycnt), True);                         
                                        ?>
                                                   <div class="col-md-3 chrt-two c-chart" style="">
													    <div class="" style="">
														 <h3 class="sub-tittle">Category Chart</h3>
														 	<div id="piechart"></div>

													<script type="text/javascript" src="<?php echo base_url(); ?>include/js/loader.js"></script>

													<script type="text/javascript">
													// Load google charts
													google.charts.load('current', {'packages':['corechart']});
													google.charts.setOnLoadCallback(drawChart);

													// Draw the chart and set the chart values
													function drawChart() {
													  var data = google.visualization.arrayToDataTable([
													  ['Task', 'Hours per Day'],
													  ['C1', <?=$catagrycnt[0]['count']?>],
													  ['C2', <?=$catagrycnt[1]['count']?>],
													  ['C3', <?=$catagrycnt[2]['count']?>]
													]);

													  // Optional; add a title and set the width and height of the chart
													  var options = {'title':'Category in Percentage', 'width':440, 'height':400};

													  // Display the chart inside the <div> element with id="piechart"
													  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
													  chart.draw(data, options);
													}
													</script>
  														</div>		
														</div>		
																<div class="clearfix"> </div>
															</div>	
									</div>
									<!--/charts-inner-->
									</div>
										<!--//outer-wp-->
									</div> 
								</div>
							</div>
				<!--//content-inner-->
			            
			             <? include_once('include/footer.php'); ?>