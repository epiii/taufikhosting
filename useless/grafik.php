<?php 
	session_start();
	include '../lib/koneks.php';
	include '../lib/sesi.php';
?>

<!DOCTYPE html>
<html class="sidebar_default no-js" lang="en">
<head>
<meta charset="utf-8">
<title>Grafik Telkom</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="./css/images/favicon.png">
<!-- Le styles -->
<link href="../css/twitter/bootstrap.css" rel="stylesheet">
<link href="../css/base.css" rel="stylesheet">
<link href="../css/twitter/responsive.css" rel="stylesheet">
<link href="../css/jquery-ui-1.8.23.custom.css" rel="stylesheet">
<script src="../js/plugins/modernizr.custom.32549.js"></script>
</head>

<body>
<div id="loading"><img src="../img/ajax-loader.gif"></div>

<div id="main">
  <div class="container">
    
    <div id="main_container">
      <div class="row-fluid">
        <div class=" box color_3 title_big height_big paint">
          <div class="content"  style="padding-top:35px;">
            <div id="placeholder" style="width:100%;height:240px;"> </div>
          </div>
        </div>
      </div>
      <!-- End .box --> 
    </div>
    <!-- End row-fluid -->
    <div class="row-fluid">
      <div class="box paint">
        <!-- End title -->
        <div class="content">
          <div id="placeholder2" style="width:100%;height:350px;"></div>
        </div>
      </div>
      
	  <!-- End .row-fluid -->
      <div class="row-fluid">
        
		<div class="span8">
          <div class="box gradient">
            <div class="title">
              <h4> <i class="icon-globe"></i> <span>Bar chart okokok</span> </h4>
            </div>
            <div class="content">looop 
				<div id="bar-chart" class="simple-chart" style="width:100%;height:250px;">
					tempat grafiknya
				</div>
            </div>
          </div>
          <!-- End .box --> 
        </div>
        <!-- End .span6 -->
        
        <!-- End .span6 --> 
        
      </div>
      <!-- End row-fluid -->
      <div class="row-fluid">
        <div class="span8">
          <div class="box gradient">iki line chart ok
            <div class="content"> iki line chart
              <div id="line-chart" class="simple-chart" style="width:100%;height:250px;"></div>
            </div>
            <!-- End content --> 
            <!-- End content --> 
          </div>
          <!-- End .box --> 
        </div>
        <!-- End .span8 -->
        
       
        <!-- End .span8 --> 
      </div>
      <!-- End row-fluid -->
      <div class="row-fluid">
        
        <!-- End .span4 -->
        
        <div class="span8">
          <div class="box gradient">
            
            <div class="content">
              <div id="real-time" style="width:100%;height:250px;"></div>
            </div>
            <!-- End content --> 
          </div>
          <!-- End .box --> 
        </div>
        <!-- End .span8 --> 
      </div>
      <!-- End row-fluid --> 
      
    </div>
    <!-- End #container --> 
  </div>
</div>
<div class="background_changer dropdown">
  <div class="dropdown" id="colors_pallete"> <a data-toggle="dropdown" data-target="drop4" class="change_color"></a>
    <ul  class="dropdown-menu pull-left" role="menu" aria-labelledby="drop4">
      <!--<li><a data-color="color_0" class="color_0" tabindex="-1">1</a></li>
      <li><a data-color="color_1" class="color_1" tabindex="-1">1</a></li>
      <li><a data-color="color_2" class="color_2" tabindex="-1">2</a></li>
      <li><a data-color="color_3" class="color_3" tabindex="-1">3</a></li>
      <li><a data-color="color_4" class="color_4" tabindex="-1">4</a></li>
      <li><a data-color="color_5" class="color_5" tabindex="-1">5</a></li>
      <li><a data-color="color_6" class="color_6" tabindex="-1">6</a></li>
      <li><a data-color="color_7" class="color_7" tabindex="-1">7</a></li>
      <li><a data-color="color_8" class="color_8" tabindex="-1">8</a></li>
      <li><a data-color="color_9" class="color_9" tabindex="-1">9</a></li>
      <li><a data-color="color_10" class="color_10" tabindex="-1">10</a></li>
      <li><a data-color="color_11" class="color_11" tabindex="-1">10</a></li>
      <li><a data-color="color_12" class="color_12" tabindex="-1">12</a></li>
      <li><a data-color="color_13" class="color_13" tabindex="-1">13</a></li>
      <li><a data-color="color_14" class="color_14" tabindex="-1">14</a></li>
      <li><a data-color="color_15" class="color_15" tabindex="-1">15</a></li>
      <li><a data-color="color_16" class="color_16" tabindex="-1">16</a></li>
      <li><a data-color="color_17" class="color_17" tabindex="-1">17</a></li>
      <li><a data-color="color_18" class="color_18" tabindex="-1">18</a></li>
      <li><a data-color="color_19" class="color_19" tabindex="-1">19</a></li>
      <li><a data-color="color_20" class="color_20" tabindex="-1">20</a></li>
      <li><a data-color="color_21" class="color_21" tabindex="-1">21</a></li>
      <li><a data-color="color_22" class="color_22" tabindex="-1">22</a></li>
      <li><a data-color="color_23" class="color_23" tabindex="-1">23</a></li>
      <li><a data-color="color_24" class="color_24" tabindex="-1">24</a></li>
      <li><a data-color="color_25" class="color_25" tabindex="-1">25</a></li>-->
    </ul>
  </div>
</div>
<!-- End .background_changer -->
</div>
<!-- /container --> 

<!-- Le javascript
    ================================================== --> 
<!-- General scripts --> 
<script src="../js/jquery.js" type="text/javascript"> </script> 
<!--[if !IE]> -->
<script src="js/plugins/enquire.min.js" type="text/javascript"></script> 
<!-- <![endif]-->
<script language="javascript" type="text/javascript" src="js/plugins/jquery.sparkline.min.js"></script> 
<script src="../js/plugins/excanvas.compiled.js" type="text/javascript"></script> 
<script src="../js/bootstrap-transition.js" type="text/javascript"></script> 
<script src="../js/bootstrap-alert.js" type="text/javascript"></script> 
<script src="../js/bootstrap-modal.js" type="text/javascript"></script> 
<script src="../js/bootstrap-dropdown.js" type="text/javascript"></script> 
<script src="../js/bootstrap-scrollspy.js" type="text/javascript"></script> 
<script src="../js/bootstrap-tab.js" type="text/javascript"></script> 
<script src="../js/bootstrap-tooltip.js" type="text/javascript"></script> 
<script src="../js/bootstrap-popover.js" type="text/javascript"></script> 
<script src="../js/bootstrap-button.js" type="text/javascript"></script> 
<script src="../js/bootstrap-collapse.js" type="text/javascript"></script> 
<script src="../js/bootstrap-carousel.js" type="text/javascript"></script> 
<script src="../js/bootstrap-typeahead.js" type="text/javascript"></script> 
<script src="../js/bootstrap-affix.js" type="text/javascript"></script> 
<script src="../js/fileinput.jquery.js" type="text/javascript"></script> 
<script src="../js/jquery-ui-1.8.23.custom.min.js" type="text/javascript"></script> 
<script src="../js/jquery.touchdown.js" type="text/javascript"></script> 
<script language="javascript" type="text/javascript" src="../js/plugins/jquery.uniform.min.js"></script> 
<script language="javascript" type="text/javascript" src="../js/plugins/jquery.tinyscrollbar.min.js"></script> 
<script language="javascript" type="text/javascript" src="../js/jnavigate.jquery.min.js"></script> 
<script language="javascript" type="text/javascript" src="../js/jquery.touchSwipe.min.js"></script> 
<script language="javascript" type="text/javascript" src="../js/plugins/jquery.peity.min.js"></script> 

<!-- Flot charts --> 
<script language="javascript" type="text/javascript" src="../js/plugins/flot/jquery.flot.js"></script> 
<script language="javascript" type="text/javascript" src="../js/plugins/flot/jquery.flot.crosshair.js"></script> 
<script language="javascript" type="text/javascript" src="../js/plugins/flot/jquery.flot.stack.js"></script> 
<script language="javascript" type="text/javascript" src="../js/plugins/flot/jquery.flot.pie.js"></script> 
<script language="javascript" type="text/javascript" src="../js/plugins/flot/jquery.flot.resize.js"></script> 
<!-- Jumware plugins for charts http://www.jumware.com/Includes/jquery/Flot/Examples/index.html --> 
<script language="javascript" type="text/javascript" src="../js/plugins/flot/jquery.flot.spider.js"></script> 
<script language="javascript" type="text/javascript" src="../js/plugins/jquery.peity.min.js"></script> 
<script src="../js/plugins/highcharts/highcharts.js"></script> 
<script src="../js/plugins/highcharts/modules/exporting.js"></script> 
<script src="../js/plugins/justGage.1.0.1/resources/js/raphael.2.1.0.min.js"></script> 
<script src="../js/plugins/justGage.1.0.1/resources/js/justgage.1.0.1.min.js"></script> 

<!-- Task plugin --> 
<script language="javascript" type="text/javascript" src="../js/plugins/knockout-2.0.0.js"></script> 

<!-- Custom made scripts for this template --> 
<script src="../js/scripts.js" type="text/javascript"></script> 
<script type="text/javascript">
/*$(function () {
    // we use an inline data source in the example, usually data would
    // be fetched from a server
    var data = [], totalPoints = 250;
    function getRandomData() {
        if (data.length > 0)
            data = data.slice(1);
        // do a random walk
        while (data.length < totalPoints) {
            var prev = data.length > 0 ? data[data.length - 1] : 20;
            var y = prev + Math.random() * 10 - 5;
            if (y < 0)
                y = 0;
            if (y > 100)
                y = 100;
            data.push(y);
        }
        // zip the generated y values with the x values
        var res = [];
        for (var i = 0; i < data.length; ++i)
            res.push([i, data[i]])
        return res;
    }
    // setup control widget
    var updateInterval = 100;
    // setup plot
    var options = {
        series: {
                  shadowSize: 0,
                   lines: { show: true, fill:true, },
                   points: { show: false, fill:true },
               }, // drawing is faster without shadows
        yaxis: { min: 0, max: 20 },
        xaxis: { show: false },
        grid: { hoverable: true, clickable: true, autoHighlight: false, borderWidth:0,  color: '#ffffff'},
        colors: ["#a1d14d"]
    };
    var plot = $.plot($("#real-time"), [ { data: getRandomData()} ], options);
    function update() {
        plot.setData([ getRandomData() ]);
        // since the axes don't change, we don't need to call plot.setupGrid()
        plot.draw();
        setTimeout(update, updateInterval);
    }
    update();
});*/
</script> 
<script type="text/javascript">
   $(window).load(function() {
     $('#loading').fadeOut();
    });
    $(function () {
       //Chart - Campaigns
        var d4 = [[1,10], [2,9], [3,8], [4,6], [5,5], [6,3], [7,9], [8,10],[9,12],[10,14],[11,15],[12,13],[13,11],[14,10],[15,9],[16,8],[17,12],[18,14],[19,16],[20,19],[21,20],[22,20],[23,19],[24,17],[25,15],[25,14],[26,12],[27,10],[28,8],[29,10],[30,12],[31,10], [32,9], [33,8], [34,6], [35,5], [36,3], [37,9], [38,10],[39,12],[40,14],[41,15],[42,13],[43,11],[44,10],[45,9],[46,8],[47,12],[48,14],[49,16],[50,12],[51,10], [52,9], [53,8], [54,6], [55,5], [56,3], [57,9], [58,10],[59,12],[60,14],[61,15],[62,13],[63,11],[64,10],[65,9],[66,8],[67,12],[68,14],[69,16]];
        var d5 = [[1,12], [2,10], [3,9], [4,8], [5,8], [6,8], [7,8], [8,8],[9,9],[10,9],[11,10],[12,11],[13,12],[14,11],[15,10],[16,10],[17,9],[18,10],[19,11],[20,11],[21,12],[22,13],[23,14],[24,13],[25,12],[25,12],[26,11],[27,10],[28,9],[29,8],[30,7],[31,7], [32,8], [33,8], [34,7], [35,6], [36,6], [37,7], [38,8],[39,8],[40,9],[41,10],[42,11],[43,11],[44,12],[45,12],[46,11],[47,10],[48,9],[49,8],[50,8],[51,9], [52,10], [53,11], [54,12], [55,12], [56,12], [57,13], [58,13],[59,12],[60,11],[61,10],[62,9],[63,8],[64,7],[65,7],[66,6],[67,5],[68,4],[69,3]];

        var plot = $.plot($("#placeholder"),
            [ 
				{ 
					data: d4, 
					color:"rgba(0,0,0,0.2)", 
					shadowSize:0, 
					bars: {
						show: true,
						lineWidth: 0,
						fill: true,
						fillColor: { 
							colors: [ { 
								opacity: 1 
							}, { 
								opacity: 1 
							} ] 
						},
					}
				},{ 
					data: d5, 
					color:"rgba(255,255,255, 0.4)", 
					shadowSize:0,
					lines: {show:true, fill:false}, points: {show:false},
					bars: {show:true},
					//bars: {show:false},
				}  
			],{
				series: {
					bars: {
						show:true, 
						barWidth: 0.6
					}
				},
				grid: { 
					show:false, 
					hoverable: true, 
					clickable: false, 
					autoHighlight: true, 
					borderWidth:0,   
				},
				yaxis: { 
					min: 0, 
					max: 20 
				},
			});

    // Big Bar Chart
	//var plot = $("#placeholder").plot(data, options).data("plot");
	
	var tes = new Array;
	$.ajax({
		url :'proses.php?data',
		type:'get',
		dataType:'json',
		success:function(data){
			var i =0;
			$.each(data, function (id,item){
				tes.push([ item.tid , item.diu ]);
				//tes.push([ data[id][0],data[id][1] ]);
			});
			console.log(tes);
			chartx(tes);
		}
	});
	//alert(tes);
	var sin = [], cos = [];//, tes = [['0','8'],['1','4.23']];
    for (var i = 0; i < 14; i += 1) {
        //sin.push([i, Math.sin(i)*Math.random()*0.9]);
        sin.push([i, Math.random()*10]);
        cos.push([i, Math.cos(i)*Math.random()*1.4]);
        //tes.push([i, Math.cos(i)*Math.random()*0.4]);
        //tes.push([i, Math.random()*10]);
        //tes.push([i, Math.random()*10]);
    }
	
	$("#placeholder2").bind("plothover", function (event, pos, item) {
		showTooltip(2, 33, 'oke');
	});
	function chartx(datax){
		var plot = $.plot($("#placeholder2"),
			[
				{ 
					//data: sin, 
					data: datax, 
					label:'kuota',
					//color:"#ef4723", 
					color:"yellow", 
					shadowSize:0 
				},/*{ 
					data: cos,  
					color:"#a1d14d", 
					shadowSize:0
				},*/
				{ 
					data: tes,
					label:'kapasitas terpakai',					
					color:"green", 
					//color:"#4a8cf7", 
					shadowSize:2,
					//shadowSize:0 
				} 
			],
			{
				series: {
					lines: { 
						show: false, 
						//fill:true 
						fill:false
					},
					points: { 
						show: true, 
						//fill:false
						fill:true 
					},
					bars: { 
						show: true, 
						//fill:false
						fill:true 
					},
				},
				grid: { 
					//backgroundColor: { colors: ["#000", "#999"] },
					hoverable: true, 
					clickable: true, 
					autoHighlight: true, 
					//autoHighlight: false, 
					//borderWidth:4, 
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
					noColumns: 10,//number
					position: "ne" ,//or "nw" or "se" or "sw"
					//margin: number of pixels or [x margin, y margin]
					backgroundColor: 'green',//null or color
					backgroundOpacity: 0.7,//number between 0 and 1
					//container: null or jQuery object/DOM element/jQuery expression
					//sorted: null/false, true, "ascending", "descending", "reverse", or a comparator
				}
            });
		}
		
			
	function showTooltip(x, y, contents) {
            $('<div id="tooltip"><div class="date">12 Nov 2012<\/div><div class="title text_color_3">'+x/10+'%<\/div> <div class="description text_color_3">CTR<\/div><div class="title ">'+x*12+'<\/div><div class="description">Impressions<\/div><\/div>').css( {
                position: 'absolute',
                display: 'none',
                top: y - 125,
                left: x - 40,
                border: '0px solid #ccc',
                padding: '2px 6px',
                'background-color': '#fff',
                opacity: 10
            }).appendTo("body").fadeIn(200);
        }
    var previousPoint = null;
    $("#placeholder").bind("plothover", function (event, pos, item) {
        $("#x").text(pos.x.toFixed(2));
        $("#y").text(pos.y.toFixed(2));
            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;
                    $("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2);
                    showTooltip(item.pageX, item.pageY,
                                item.series.label + " of " + x + " = " + y);
                }
        }
    });
    // Line chart
    //var sin2 = [];
	//var	cos2 = [];
    //for (var i = 0; i < 14; i += 0.5) {
      //  sin2.push([i, Math.sin(i)]);
        //cos2.push([i, Math.cos(i)]);
    //}
    var sin2 = [];
	//var	cos2 = [];
    for (var i = 0; i < 14; i += 100) {
        sin2.push([i, Math.random(i)]);
        //cos2.push([i, Math.cos(i)]);
    }
     var plot = $.plot($("#line-chart"),
				[  
					{ 
						data: sin2, 
						color:"#ef4723", 
						//shadowSize:0 
						shadowSize:10 
					}, 
					/*{ 
						data: cos2,  
						color:"#a1d14d", 
						shadowSize:0
					} */
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
						//autoHighlight: false, 
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
			);
//----------------------------------------------------------------------------------------------------------------			 
			 
     // Bar chart
	var d11 = [];
    for (var i = 0; i <= 30; i += 1)
    //for (var i = 0; i <= 20; i += 1)
        d11.push([i, parseInt(Math.random() * 30)]);
    /*var d22 = [];
    for (var i = 0; i <= 20; i += 1)
        d22.push([i, parseInt(Math.random() * 30)]);
    */var d33 = [];
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
});

$(function () {
  var data = [];
  var series = Math.floor(Math.random()*5)+1;
  data[0] = { data:42, color: "#cb4b4b" };
  data[1] = {  data:27, color: "#4da74d"};
  data[2] = {  data:9, color: "#edc240"};
  data[3] = {  data:22, color: "#5e96ea"};
  // Pie Chart
    $.plot($("#donut"), data, 
  {
      series: {
        pie: { 
          label: {
            show: true,
            radius: 1,
            formatter: function(label, series){
                return '<div class="chart-label">'+label+'&nbsp;'+Math.round(series.percent)+'%</div>';
            }
          },
          show: true,
          radius:1,
          highlight: {
            opacity: 0.3
          },
          legend: {
            show: false
          },
        }
      }
    });
    // Donut Chart
    $.plot($("#donut2"), data,
    {
            series: {
            pie: { 
              show: true,
              innerRadius: 0.42,
              highlight: {
                opacity: 0.3
              },
              radius: 1,
              stroke: {
                color: '#fff',
                width: 4
              },
              startAngle: 0,
              combine: {
                          color: '#353535',
                          threshold: 0.05
              },
              label: {
                          show: true,
                          radius: 1,
                          formatter: function(label, series){
                              return '<div class="chart-label">'+label+'&nbsp;'+Math.round(series.percent)+'%</div>';
                          }
                      }
              },
              grow: { active: false}
              },
              legend:{show:true},
              grid: {
                      hoverable: true,
                      clickable: true
              },
    });
});
   // Spider chart
      var p1,p2,data,options;
      $(function () {
          var d1 = [ [0,10], [1,20], [2,80], [3,70], [4,60] ];
              var d2 = [ [0,30], [1,25], [2,50], [3,60], [4,95] ];
              var d3 = [ [0,50], [1,40], [2,60], [3,95], [4,30] ];
              options = { series:
                                  { spider:
                                              { active: true
                           ,highlight: {mode: "area"}
                           ,legs: { data: [{label: "Scalability"}
                                            ,{label: "Stability"}
                                            ,{label: "Accuracy"}
                                            ,{label: "Flexibility"}
                                            ,{label: "Quality"}
                                          ]
                                          , legScaleMax: 1, legScaleMin:0.8}
                           ,spiderSize: 0.9 }
                          }
                         ,grid:
                                          { hoverable: true
                                               ,clickable: true
                                               ,tickColor: "rgba(0,0,0,0.2)"
                                               ,mode: "radar"
                                              }
                        };
              data = [ {   data: d1, spider: {show: true, color: "#cb4b4b"} }
                      ,{    data: d2, spider: {show: true, color: "#a1d14d"} }
                      ,{     data: d3, spider: {show: true,  color: "#5e96ea"} }
                     ];
          p1 = $.plot($("#spider"), data , options);
      });
</script> 
<script type="text/javascript">
  /**** Specific JS for this page ****/



</script>
</body>
</html>