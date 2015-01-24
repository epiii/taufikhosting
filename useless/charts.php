<?php 
	include 'lib/koneks.php';
	include 'lib/sesi.php';
	?>
<!DOCTYPE html>
<html Xclass="Xsidebar_default no-jsx" lang="en">
<head>
<meta charset="utf-8">
<title>GRAFIK TELKOM </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="css/images/favicon.png">

<link href="css/twitter/bootstrap.css" rel="stylesheet">
<link href="css/base.css" rel="stylesheet">
<link href="css/twitter/responsive.css" rel="stylesheet">
<link href="css/jquery-ui-1.8.23.custom.css" rel="stylesheet">
<script src="xjs/plugins/modernizr.custom.32549.js"></script>
</head>
<style>
	#mainx{
		width:100%;
	}
</style>
<body>
	<div id="loading"><img src="img/ajax-loader.gif"></div>
	<!--<div id="mainx">-->
		<div><br>&nbsp;</div>
		<div class="container">
			<div class="row-fluid">
				<!--GRAFIK BIG BAR CHART-->
				<div class="box paint">
					<div class="title">
						<h4> <i class="icon-globe"></i> <span>big bar chart</span> </h4>
					</div>
					<div class="content">
						<div id="placeholder2" style="width:100%;height:350px;">
							tempat grafiknya
						</div>
					</div>
				</div>
				<!--end of GRAFIK BIG BAR CHART-->
				
				<!--GRAFIK medium BAR CHART-->
				<div class="row-fluid">
					<div class="span8">
						<div class="box gradient">
							<div class="title">
								<h4> <i class="icon-globe"></i> <span>medium bar chart</span> </h4>
							</div>
							<div class="content"> 
								<div id="bar-chart" class="simple-chart" style="width:100%;height:250px;">
									tempat grafiknya
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end of GRAFIK medium BAR CHART-->
      
				<!--GRAFIK X
				<div class="row-fluid">
					<div class="span8">
						<div class="box gradient">iki line chart ok
							<div class="content"> iki line chart
								<div id="line-chart" class="simple-chart" style="width:100%;height:250px;">
									TEMPAT GRAFIKNYA
								</div>
							</div>
						</div>
					</div>
				</div>
				end of GRAFIK X-->

				<!-- CHART XX
				<div class="row-fluid">
					<!--
					<div class="span8">
						<div class="box gradient">
							<div class="content">
								<div id="real-time" style="width:100%;height:250px;"></div>
							</div>
						</div>
					</div>
				</div>
				END OF GRAFIK XX-->
			
			</div><!--END OF ROW FLUID-->
		</div><!-- End #container --> 
	<!--</div>--><!-- END OF MAIN  --> 

<!--
<script src="Xjs/plugins/enquire.min.js" type="text/javascript"></script> 
<script src="Xjs/bootstrap-scrollspy.js" type="text/javascript"></script> 
<script src="Xjs/bootstrap-popover.js" type="text/javascript"></script> 
<script src="Xjs/bootstrap-collapse.js" type="text/javascript"></script> 
<script src="Xjs/bootstrap-typeahead.js" type="text/javascript"></script> 
<script src="Xjs/bootstrap-affix.js" type="text/javascript"></script> 
<script language="javascript" type="text/javascript" src="Xjs/plugins/jquery.tinyscrollbar.min.js"></script> 
<script language="javascript" type="text/javascript" src="Xjs/jnavigate.jquery.min.js"></script> 
<script language="javascript" type="text/javascript" src="Xjs/jquery.touchSwipe.min.js"></script> 
<script language="javascript" type="text/javascript" src="Xjs/plugins/jquery.peity.min.js"></script> 
<script language="javascript" type="text/javascript" src="Xjs/plugins/flot/jquery.flot.stack.js"></script> 
<script language="javascript" type="text/javascript" src="Xjs/plugins/flot/jquery.flot.pie.js"></script> 
<script src="Xjs/plugins/highcharts/highcharts.js"></script> 
<script src="Xjs/plugins/highcharts/modules/exporting.js"></script> 
<script src="Xjs/plugins/justGage.1.0.1/resources/js/raphael.2.1.0.min.js"></script> 
<script src="Xjs/plugins/justGage.1.0.1/resources/js/justgage.1.0.1.min.js"></script> 

<script src="js/plugins/jquery.sparkline.min.js" language="javascript" type="text/javascript" ></script> 
<script src="js/plugins/excanvas.compiled.js" type="text/javascript"></script> 
<script src="js/jquery-ui-1.8.23.custom.min.js" type="text/javascript"></script> 
<script src="js/bootstrap-tooltip.js" type="text/javascript"></script> 
<script src="js/bootstrap-button.js" type="text/javascript"></script> 
<script src="js/fileinput.jquery.js" type="text/javascript"></script> 
<script src="js/jquery.touchdown.js" type="text/javascript"></script> 
<script language="javascript" type="text/javascript" src="Xjs/plugins/knockout-2.0.0.js"></script> 
<script src="Xjs/scripts.js" type="text/javascript"></script> 
-->

<!-- Flot charts Jumware plugins for charts http://www.jumware.com/Includes/jquery/Flot/Examples/index.html --> 
<script src="js/jquery.js" type="text/javascript"> </script> 
<script language="javascript" type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/flot/jquery.flot.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/flot/jquery.flot.crosshair.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/flot/jquery.flot.resize.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/flot/jquery.flot.spider.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/jquery.peity.min.js"></script> 

<script type="text/javascript">
	$(window).load(function() {
		$('#loading').fadeOut();
	});
    
	//line & bar chart ==================
	$(function () {
		
		//call BIG BAR CHART
		var dt = new Array;
		$.ajax({
			url :'proses.php?data',
			type:'get',
			dataType:'json',
			success:function(data){
				//var i =0;
				$.each(data, function (id,item){
					dt.push([ item.tid , item.diu ]);
					//dt.push([ data[id][0],data[id][1] ]);
				});
				console.log(dt);
				bigBarChart(dt);
			}
		});
		//call BIG BAR CHART
		
		//FUNCTION big bar chart ====================================
		function bigBarChart(data1){
		//function bigBarChart(data1,data2){
			var plot = $.plot($("#placeholder2"),
				[
					/*{ 
						data: cos,  
						color:"#a1d14d", 
						shadowSize:0
					},*/
					{ 
						//data: sin, 
						//color:"#ef4723", 
						data: data1, 
						label:'kuota',
						color:"yellow", 
						shadowSize:0 
					},
					/*{ 
						//color:"#4a8cf7", 
						//shadowSize:0 
						data: data2,
						label:'kapasitas terpakai',					
						color:"green", 
						shadowSize:2,
					} */
				],
				{
				series: {
					lines: { 
						//fill:true 
						show: false, 
						fill:false
					},
					points: { 
						//fill:false
						show: true, 
						fill:true 
					},
					bars: { 
						//fill:false
						show: true, 
						fill:true 
					},
				},
				grid: { 
					//backgroundColor: { colors: ["#000", "#999"] },
					//autoHighlight: false, 
					//borderWidth:4, 
					hoverable: true, 
					clickable: true, 
					autoHighlight: true, 
					borderWidth:0, 
					color: '#ffffff' 
				},
				yaxis: { 
					//min: -1.5, 
					//max: 1.5 
					min: 0,
					label:'opp',					
					max: 10 
				},
				legend: {
					//show: boolean,
					//labelFormatter: null ,//or (fn: string, series object -> string)
					//labelBoxBorderColor: color
					//container: null or jQuery object/DOM element/jQuery expression
					//sorted: null/false, true, "ascending", "descending", "reverse", or a comparator
					//margin: number of pixels or [x margin, y margin]
					noColumns: 10,//number
					position: "ne" ,//or "nw" or "se" or "sw"
					backgroundColor: 'green',//null or color
					backgroundOpacity: 0.7,//number between 0 and 1
				}
            });
		}
		//end of FUNCTION big bar chart ============================

		//BAR CHART ================================================
		var d11 = [];
		for (var i = 0; i <= 30; i += 1)
		//for (var i = 0; i <= 20; i += 1)
			d11.push([i, parseInt(Math.random() * 30)]);
		//var d22 = [];
		//for (var i = 0; i <= 20; i += 1)
			//d22.push([i, parseInt(Math.random() * 30)]);
		var d33 = [];
		for (var i = 0; i <= 20; i += 1)
			d33.push([i, parseInt(Math.random() * 30)]);
	
		var plot = $.plot($("#bar-chart"),
			[
				{ 	
					data: d11, 
					color:"#ef4723", 
					shadowSize:0 
				},
				/*{ 
					data: d22, 
					//color:"#a1d14d", 
					color:"yellow", 
					shadowSize:0
				}, 
				*/{ 
					data: d33, 
					color:"#4a8cf7", 
					shadowSize:0 
				} 
			], {
					series: {
						//stack: 0,
						stack: 0.5,
						lines: { show: true, fill:false },
						points: { show: true, fill:true },
						bars: {show:true, barWidth: 0.3}
						//bars: {show:true, barWidth: 0.6}
					},
					grid: { 
						hoverable: true, 
						clickable: true, 
						//autoHighlight: false, 
						autoHighlight: true, 
						borderWidth:0,  
						color: 'yellow' 
						//color: '#ffffff' 
					},
				}
		);
		//end of BAR CHART ==========================================
		
		// BIG BAR CHART ==============================================
		//var plot = $("#placeholder").plot(data, options).data("plot");
		//var sin = [], cos = [], tes = [];//[['0','8'],['1','4.23']];
		////for (var i = 0; i < 14; i += 1) {
			//sin.push([i, Math.sin(i)*Math.random()*0.9]);
			//cos.push([i, Math.cos(i)*Math.random()*1.4]);
			//tes.push([i, Math.random()*10]);
		//}
		
		
		// Line chart ===============================================
		/*var sin2 = [];
		var	cos2 = [];
		for (var i = 0; i < 14; i += 0.5) {
			sin2.push([i, Math.sin(i)]);
			cos2.push([i, Math.cos(i)]);
		}
		var sin2 = [];
		var	cos2 = [];
		for (var i = 0; i < 14; i += 100) {
			sin2.push([i, Math.random(i)]);
			cos2.push([i, Math.cos(i)]);
		}
		var plot = $.plot($("#line-chart"),
				[  
					{ 
						shadowSize:0 
						data: sin2, 
						color:"#ef4723", 
						shadowSize:10 
					}, 
					{ 
						data: cos2,  
						color:"#a1d14d", 
						shadowSize:0
					} 
				], 
				{
					series: {
						lines: { 
							show: true, 
							fill:false 
						},
						points: { 
							show: true, 
							fill:true 
						},
					},
					grid: { 
						hoverable: true, 
						clickable: true, 
						autoHighlight: false, 
						autoHighlight: true, 
						borderWidth:0,  
						color: '#ffffff' 
					},
					yaxis: { 
						//min: -1.5, 
						min: 0, 
						//max: 1.5 
						max: 100 
					},
				}
			);*/
		// end of Line chart ========================================
	
	});
	</script> 
</body>
</html>