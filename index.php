<?php 
session_start();
//error_reporting(0);
include "lib/timeout.php";
include"lib/fungsi_indotgl.php";
if($_SESSION['loginMUX']==1){
	if(!cek_login()){
		$_SESSION['loginMUX'] = 0;
	}
}
//$x = $_SESSION['loginMUX'];
//var_dump($x);exit();
if($_SESSION['loginMUX']==0){
	header('location:logout.php');
}
else{
	if (empty($_SESSION['usernameMUX']) AND empty($_SESSION['passuserMUX']) AND $_SESSION['loginMUX']==0){
		echo "<script>window.location='default.php'</script>";
	}else{
		#echo "<script>alert($_SESSION[leveluser])</ script>";

?>
<!DOCTYPE html>
<html class="sidebar_hover  no-js" lang="en"><head>
		<meta charset="utf-8">
		<title>Arnet SBB</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="css/images/favicon.png">
		<!-- Le styles -->
		<!--<link href="js/plugins/chosen/chosen/chosen.css" rel="stylesheet">-->

		<link href="css/twitter/bootstrap.css" rel="stylesheet">
		<link href="css/base.css" rel="stylesheet">
		<link href="css/twitter/responsive.css" rel="stylesheet">

		<link href="css/jquery-ui-1.8.23.custom.css" rel="stylesheet">
		<script src="js/base64.js"></script>
		<script src="js/plugins/modernizr.custom.32549.js"></script>
		<script src="js/jquery.js"></script>
		<script type="text/javascript" src="js/script.js"></script>

		<link href="css/login.css" rel="stylesheet" type="text/css" />
	<!--login box-->
		
	</head>

	<body bgcolor="#0000FF">

	<!--<div id="loading"><img src="img/ajax-loader.gif"></div>
	<div id="responsive_part">
	  <div class="logo"> <a href="index.php"><span>Start</span><span class="icon"></span></a> </div>
	  <ul class="nav responsive">
		<li>
		  <button class="btn responsive_menu icon_item" data-toggle="collapse" data-target=".overview"> <i class="icon-reorder"></i> </button>
		</li>
	  </ul>
	</div>-->
	<!-- Responsive part -->

	<?php include "menu.php";?>

	<div id="main">
	<div id="loading"><img xsrc="img/ajax-loader.gif"></div>
	  <div class="container">
		<center><img src="img/header2.jpg"></center>
		<div class="header row-fluid">
			<!--<div class="logo"> 
				<a href="index.php">
					<span>Start</span>
					<span class="icon"></span>
				</a> 
			</div>-->
			
			<div class="top_right">
			<ul class="nav nav_menu">
				<li class="dropdown"> 
                    <a class="dropdown-toggle administrator" id="dLabel" role="button" data-toggle="dropdown" 
                    data-target="#" href="../../page.html">
                        <div class="title">
                        	<span class="name">
                            	<?php echo $_SESSION['namalengkapMUX']; ?>
							</span>
                            <span class="subtitle">( <?php echo $_SESSION['leveluserMUX']; ?> )</span>
                        </div>
                        <span class="icon">
                            <?php //echo"<img src='img/users/$_SESSION[fotouser]' width='98'>"; ?>
                        </span>
					</a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                        <li><a href="?hlm=<?php echo enkrip('suser');?>" class="menu"><i class=" icon-cog"></i>Settings</a></li>
                        <li><a href="logout.php" class="menu"><i class=" icon-unlock"></i>Log Out</a></li>
                        <!--<li><a href="search.html" class="menu"><i class=" icon-flag"></i>Help</a></li>-->
                    </ul>
				</li>
			</ul>
		  </div>
		  <!-- End top-right --> 
		</div>
		
		<!--<div id="loadingx">Loading . . .<img src="img/ajax-loader.gif"></div>-->
		<div id="main_container">
		<?php 
			//via php request
			$hlmx=$_GET['hlm'];
			$hlm = dekrip($hlmx);
			//echo $hlm;
			//var_dump($hlm);
			//exit();
			switch ($hlm){
				case 'home':
					include 'view/home.php';
				break;

				#master
				case 'mlinka':
					include 'view/mlinka.php';
				break;
				case 'mlinkb':
					include 'view/mlinkb.php';
				break;
				case 'mpeg':
					include 'view/mpeg.php';
				break;
				case 'muser':
					include 'view/muser.php';
				break;
				case 'mback':
					include 'view/mback.php';
				break;
				case 'msistra':
					include 'view/msistra.php';
				break;
				case 'mper':
					include 'view/mper.php';
				break;
				case 'mperdet':
					include 'view/mperdet.php';
				break;
				case 'mkap':
					include 'view/mkap.php';
				break;
				case 'mloker':
					include 'view/mloker.php';
				break;
				#end of master
				
				#transaksi	
				case 'tggn':
					include 'view/tggn.php';
				break;
				case 'tsirkit':
					include 'view/tsirkit.php';
				break;
				case 'timport':
					include 'view/timport.php';
				break;
				case 'mkoord':
					include 'view/mkoord.php';
				break;
				case 'malat':
					include 'view/malat.php';
				break;
				#end of transaksi
				
				#laporan
				case 'ldapot':
					include 'view/ldapot.php';
				break;
				case 'lsirkit':
					include 'view/lsirkit.php';
				break;
				#end of laporan
				
				#setting
				case 'suser':
					include 'view/suser.php';
				break;
				#end of setting
				
				default:
					include 'view/home.php';
			}
			
			#via ajax
			//include"home.php";
		?>
		<!-- End #container --> 
		</div>
	  <div id="footer">
		<p> &copy;M.Opik @ 2013 </p>
		<!--<span class="company_logo"><a href="../../../../www.pixelgrade.com/default.htm"></a></span> </div>-->	
	</div>
	<div class="background_changer dropdown">
	  <div class="dropdown" id="colors_pallete"> <a data-toggle="dropdown" data-target="drop4" class="change_color"></a>
		<ul  class="dropdown-menu pull-left" role="menu" aria-labelledby="drop4">
		  <li><a data-color="color_0" class="color_0" tabindex="-1">1</a></li>
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
		  <li><a data-color="color_25" class="color_25" tabindex="-1">25</a></li>
		</ul>
	  </div>
	</div>
	<!-- End .background_changer -->
	</div>
	<!-- /container --> 

	<!-- Le javascript
		================================================== --> 
        
	<script language="javascript" type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
	<script language="javascript" type="text/javascript" src="js/plugins/wysihtml5-0.3.0.min.js"></script> 
	<script language="javascript" type="text/javascript" src="js/plugins/bootstrap-wysihtml5.js"></script> 
	<script language="javascript" type="text/javascript" src="js/plugins/textarea-autogrow.js"></script> 
	<script language="javascript" type="text/javascript" src="js/plugins/character-limit.js"></script> 
	<script language="javascript" type="text/javascript" src="js/plugins/jquery.maskedinput-1.3.js"></script> 
<!--	<script language="javascript" type="text/javascript" src="js/plugins/chosen/chosen/chosen.jquery.min.js"></script> 
-->	<!--<script language="javascript" type="text/javascript" src="js/plugins/bootstrap-datepicker.js"></script>--> 
	<script language="javascript" type="text/javascript" src="js/plugins/bootstrap-colorpicker.js"></script> 

	<!-- Validation plugin --> 
	<!--<script src="js/plugins/validation/dist/jquery.validate.min.js" type="text/javascript"></script>--> 

	<!-- General scripts --> 
	<script src="js/jquery.js" type="text/javascript"> </script> 
	<script src="js/plugins/enquire.min.js" type="text/javascript"></script> 
	<script language="javascript" type="text/javascript" src="js/plugins/jquery.sparkline.min.js"></script> 
	<script src="js/plugins/excanvas.compiled.js" type="text/javascript"></script> 
	<script src="js/bootstrap-transition.js" type="text/javascript"></script> 
	<script src="js/bootstrap-alert.js" type="text/javascript"></script> 
	<script src="js/bootstrap-modal.js" type="text/javascript"></script> 
	<script src="js/bootstrap-dropdown.js" type="text/javascript"></script> 
	<script src="js/bootstrap-scrollspy.js" type="text/javascript"></script> 
	<script src="js/bootstrap-tab.js" type="text/javascript"></script> 
	<script src="js/bootstrap-tooltip.js" type="text/javascript"></script> 
	<script src="js/bootstrap-popover.js" type="text/javascript"></script> 
	<script src="js/bootstrap-button.js" type="text/javascript"></script> 
	<script src="js/bootstrap-collapse.js" type="text/javascript"></script> 
	<script src="js/bootstrap-carousel.js" type="text/javascript"></script> 
	<script src="js/bootstrap-typeahead.js" type="text/javascript"></script> 
	<script src="js/bootstrap-affix.js" type="text/javascript"></script> 
	<script src="js/fileinput.jquery.js" type="text/javascript"></script> 
	<script src="js/jquery-ui-1.8.23.custom.min.js" type="text/javascript"></script> 
	<script src="js/jquery.touchdown.js" type="text/javascript"></script> 
	<script language="javascript" type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script> 
	<script language="javascript" type="text/javascript" src="js/plugins/jquery.tinyscrollbar.min.js"></script> 
	<script language="javascript" type="text/javascript" src="js/jnavigate.jquery.min.js"></script> 
	<script language="javascript" type="text/javascript" src="js/jquery.touchSwipe.min.js"></script> 
	<script language="javascript" type="text/javascript" src="js/plugins/jquery.peity.min.js"></script> 

	<!-- Flot charts --> 
	<script language="javascript" type="text/javascript" src="js/plugins/flot/jquery.flot.js"></script> 
	<script language="javascript" type="text/javascript" src="js/plugins/flot/jquery.flot.stack.js"></script> 
	<script language="javascript" type="text/javascript" src="js/plugins/flot/jquery.flot.pie.js"></script> 
	<script language="javascript" type="text/javascript" src="js/plugins/flot/jquery.flot.resize.js"></script> 

	<!-- Data tables --> 
	<script type="text/javascript" language="javascript" src="js/plugins/datatables/js/jquery.dataTables.js"></script> 

	<!-- Task plugin --> 
	<script language="javascript" type="text/javascript" src="js/plugins/knockout-2.0.0.js"></script> 
	<script language="javascript" type="text/javascript" src="js/plugins/wizard-master/jquery.bootstrap.wizard.js"></script> 

	<!-- Custom made scripts for this template --> 
	<script src="js/scripts.js" type="text/javascript"></script> 
	<!--autocomplete-->
    <link rel="stylesheet" href="js/jquery-ui.css"/>
    <script src="js/jquery-ui.js"></script>

	<script type="text/javascript">
	$(document).ready(function() {
/*		$('#NIKTB').val('');
		$('#nama_bagianTB').val('');
		$('#nama_departmentTB').val('');
		$('#nama_shiftkerjaTB').val('');
		$('#nama_jabatanTB').val('');
		$('#nama_statuskerja').val('');
		$('#nama_pekerjaTB').val('');
		
			$("#nama_pekerjaTB").autocomplete({
				minLength: 1,
				maxHeight: 100, 
				overflow: 'auto',
				source: "./proses.php",
				focus: function( event, ui ) {
					$( "#nama_pekerjaTB" ).val( ui.item.nama_pekerja);
					return false;
				},
				select: function( event, ui ){
					$( "#nama_pekerjaTB" ).val( ui.item.nama_pekerja);
					$( "#NIKTB" ).val( ui.item.NIK);
					$( "#nama_jabatanTB" ).val( ui.item.nama_jabatan);
					$( "#nama_bagianTB" ).val( ui.item.nama_bagian);
					$( "#nama_departmentTB" ).val( ui.item.nama_department);
					$( "#nama_shiftkerjaTB" ).val( ui.item.nama_shiftkerja);
					$( "#nama_statuskerjaTB" ).val( ui.item.nama_statuskerja);
					return false;
				}
			})
			.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
				return $( "<li>" )
				.append( "<a>" + item.nama_pekerja+ "<br> jkelamin :" + item.jkelamin+ "<img src='delete2.png' width='20'></a>" )
				.appendTo( ul );
			};
*/
	})
	var data = [
	{id: 1, title: "<i class='gicon-gift icon-white'><\/i>Have tea with the Queen", isDone: false},
	{id: 2, title: "<i class='gicon-briefcase icon-white'><\/i>Steal  James Bond car", isDone: true},
	{id: 3, title: "<i class='gicon-heart icon-white'><\/i>Confirm that this template is awesome", isDone: false},
	{id: 4, title: "<i class='gicon-thumbs-up icon-white'><\/i>Nothing", isDone: false},  
	{id: 5, title: "<i class='gicon-fire icon-white'><\/i>Play solitaire", isDone: false}         
	];


	function Task(data) {
	  this.title = ko.observable(data.title);
	  this.isDone = ko.observable(data.isDone);
	  this.isEditing = ko.observable(data.isEditing);

	  this.startEdit = function (event) {
		  console.log("editing");
		  this.isEditing(true);
	  }

	  this.updateTask = function (task) {
		  this.isEditing(false);
	  }
	}

	function TaskListViewModel() {
			  // Data
			  var self = this;
			  self.tasks = ko.observableArray([]);
			  self.newTaskText = ko.observable();
			  self.incompleteTasks = ko.computed(function() {
				  return ko.utils.arrayFilter(self.tasks(), 
					function(task) { 
					  return !task.isDone() && !task._destroy;
				  });
			  });

			  self.completeTasks = ko.computed(function(){
				  return ko.utils.arrayFilter(self.tasks(), 
					function(task) { 
					  return task.isDone() && !task._destroy;
				  });
			  });

			  // Operations
			  self.addTask = function() {
				  self.tasks.push(new Task({ title: this.newTaskText(), isEditing: false }));

				  self.newTaskText("");

			  };
			  self.removeTask = function(task) { self.tasks.destroy(task) };

			  self.removeCompleted = function(){
				  self.tasks.destroyAll(self.completeTasks());
			  };

			  /* Load the data */
			  var mappedTasks = $.map(data, function(item){
				  return new Task(item);
			  });

			  self.tasks(mappedTasks);      
		  }

		  ko.applyBindings(new TaskListViewModel());  
		  //End Todo Plugin

		  </script>
		  <script type="text/javascript">
		  //Chart - Campaigns
		  $(function () {
			var d4 = [[1,10], [2,9], [3,8], [4,6], [5,5], [6,3], [7,9], [8,10],[9,12],[10,14],[11,15],[12,13],[13,11],[14,10],[15,9],[16,8],[17,12],[18,14],[19,16],[20,19],[21,20],[22,20],[23,19],[24,17],[25,15],[25,14],[26,12],[27,10],[28,8],[29,10],[30,12],[31,10], [32,9], [33,8], [34,6], [35,5], [36,3], [37,9], [38,10],[39,12],[40,14],[41,15],[42,13],[43,11],[44,10],[45,9],[46,8],[47,12],[48,14],[49,16],[50,12],[51,10], [52,9], [53,8], [54,6], [55,5], [56,3], [57,9], [58,10],[59,12],[60,14],[61,15],[62,13],[63,11],[64,10],[65,9],[66,8],[67,12],[68,14],[69,16]];
			var d5 = [[1,12], [2,10], [3,9], [4,8], [5,8], [6,8], [7,8], [8,8],[9,9],[10,9],[11,10],[12,11],[13,12],[14,11],[15,10],[16,10],[17,9],[18,10],[19,11],[20,11],[21,12],[22,13],[23,14],[24,13],[25,12],[25,12],[26,11],[27,10],[28,9],[29,8],[30,7],[31,7], [32,8], [33,8], [34,7], [35,6], [36,6], [37,7], [38,8],[39,8],[40,9],[41,10],[42,11],[43,11],[44,12],[45,12],[46,11],[47,10],[48,9],[49,8],[50,8],[51,9], [52,10], [53,11], [54,12], [55,12], [56,12], [57,13], [58,13],[59,12],[60,11],[61,10],[62,9],[63,8],[64,7],[65,7],[66,6],[67,5],[68,4],[69,3]];

			var plot = $.plot($("#placeholder"),
				[ { data: d4, color:"rgba(0,0,0,0.2)", shadowSize:0, 
				bars: {
				  show: true,
				  lineWidth: 0,
				  fill: true,

				  fillColor: { colors: [ { opacity: 1 }, { opacity: 1 } ] },
			  }
		  } , 
		  { data: d5, 

			  color:"rgba(255,255,255, 0.4)", 
			  shadowSize:0,
			  lines: {show:true, fill:false}, points: {show:false},
			  bars: {show:false},
		  },  
		  ],     
		  {
			series: {
			 bars: {show:true, barWidth: 0.6}
		 },
		 grid: { show:false, hoverable: true, clickable: false, autoHighlight: true, borderWidth:0,   },
		 yaxis: { min: 0, max: 20 },

	 });

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
						x);
				  }
			  }
		  });

			 //Fundraisers chart
			 var d6 = [[1,10], [2,9], [3,8], [4,6], [5,5], [6,3], [7,9], [8,10],[9,12],[10,14],[11,15],[12,13],[13,11],[14,10],[15,9],[16,8],[17,12],[18,14],[19,16],[20,19],[21,20],[22,20],[23,19],[24,17],[25,15],[25,14],[26,12],[27,10],[28,8],[29,10],[30,12],[31,10], [32,9], [33,8], [34,6], [35,5], [36,3], ];
			 $.plot($("#placeholder2"),
			   [ { data: d6, color:"#fff", shadowSize:0, 
			   bars: {
				  show: true,
				  lineWidth: 0,
				  fill: true,
				  highlight: {
					opacity: 0.3
				},
				fillColor: { colors: [ { opacity: 1 }, { opacity: 1 } ] },
			},
		} , 
		],     
		{
		   series: {
			 bars: {show:true, barWidth: 0.6}
		 },
		 grid: { show:false, hoverable: true, clickable: false, autoHighlight: true, borderWidth:0,   },
		 yaxis: { min: 0, max: 23 },

	 });

			 function showTooltip2(x, y, contents) {
			  $('<div id="tooltip"><div class="title ">'+x*2+'</div><div class="description">Impressions</div></div>').css( {
				position: 'absolute',
				display: 'none',
				top: y - 58,
				left: x - 40,
				border: '0px solid #ccc',
				padding: '2px 6px',
				'background-color': '#fff',
				opacity: 10
			}).appendTo("body").fadeIn(200);
		  }

		  var previousPoint = null;
		  $("#placeholder2").bind("plothover", function (event, pos, item) {
			  $("#x").text(pos.x.toFixed(2));
			  $("#y").text(pos.y.toFixed(2));
			  if (item) {
				if (previousPoint != item.dataIndex) {
				  previousPoint = item.dataIndex;
				  $("#tooltip").remove();
				  var x = item.datapoint[0].toFixed(2),
				  y = item.datapoint[1].toFixed(2);
				  showTooltip2(item.pageX, item.pageY,
					x);
			  }
		  }
	  });
		//Envato chart
		$.plot($("#placeholder3"),
		   [ { data: d6, color:"rgba(0,0,0,0.2)", shadowSize:0, 
		   bars: {

			  lineWidth: 0,
			  fill: true,

			  fillColor: { colors: [ { opacity: 1 }, { opacity: 1 } ] },
		  },
		  lines: {show:false, fill:true}, points: {show:false},
	  } , 
	  ],     
	  {
	   series: {
		 bars: {show:true, barWidth: 0.6}
	 },
	 grid: { show:false, hoverable: true, clickable: false, autoHighlight: true, borderWidth:0,   },
	 yaxis: { min: 0, max: 23 },

	});
		//Facebook chart
		$.plot($("#placeholder4"),
		   [ { data: d6, color:"rgba(0,0,0,0.2)", shadowSize:0, 
		   bars: {

			  lineWidth: 0,
			  fill: true,

			  fillColor: { colors: [ { opacity: 1 }, { opacity: 1 } ] },
		  },
		  lines: {show:false, fill:true}, points: {show:false},
	  } , 
	  ],     
	  {
	   series: {
		 bars: {show:true, barWidth: 0.6}
	 },
	 grid: { show:false, hoverable: true, clickable: false, autoHighlight: true, borderWidth:0,   },
	 yaxis: { min: 0, max: 23 },

	});
		// End Fundraiser chart
	});

	</script>

	</body>
</html>
<?php 
	}
} 
?>