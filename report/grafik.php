<?php 
	include '../lib/koneks.php';
	include '../lib/sesi.php';
	
	if(!isset($_GET['tahun'],$_GET['bulan'],$_GET['menu'],$_GET['ruwet'])){
			echo "<script>alert('access denied');window.close();</script>";
	}else{
		$ruwet = base64_encode($_GET['bulan'].$_GET['menu'].$_GET['tahun']);
		//var_dump($ruwet);exit();
		if($_GET['ruwet']!=$ruwet){
			echo "<script>alert('dilarang merubah URL');window.close();</script>";
		}else{
	
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<body onload="loading();">
	<style>.info{
		text-transform:capitalize;
		text-align:center;
		color:grey;
	}</style>
	<div class="info" id="header">
		<h2><?php echo 'grafik '.$_GET['menu'];?></h2>
		<h4><?php 
			$bln = array('januari','februari','maret','april','mei','juni','juli','agustus','september','oktober','november','desember');
			echo $bln[$_GET['bulan']-1].' '.$_GET['tahun'];
		
		?></h4>
		
	</div>
	<input type="hidden" id="tahunTB" value="<?php echo $_GET['tahun'];?>">
	<input type="hidden" id="bulanTB" value="<?php echo $_GET['bulan'];?>">
	<input type="hidden" id="menuTB" value="<?php echo $_GET['menu'];?>">
	
	<div id="content">
		<div class="demo-container">
			<div id="placeholder" class="demo-placeholder"><img src="../img/w8.gif"></div>
		</div>
		
		<div id='keterangan'>
			<center> <h2>Keterangan </h2></center>
			<table   width="100%" class="table ">
				<tr  style="background-color:black;color:white;">
					<td>id</td>
					<td>backbone</td>
				</tr>
				<?php
					$sql 	= "select id_backbone , kode from tb_backbone order by id_backbone asc";
					$exe	= mysql_query($sql);
					while($res=mysql_fetch_assoc($exe)){
						echo "<tr  ><td>$res[id_backbone]</td><td>= $res[kode]</td><tr>";
					}
				?>
			</table>
		</div>

	</div>
	<div id="footer">
		Copyright &copy; 2013 - 2014 OPIK (TELKOM-INDONESIA)
	</div>

</body>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo 'grafik '.$_GET['menu'].' '.$bln[$_GET['bulan']-1].' '.$_GET['tahun'];?></title>
	<link href="../css/jquery.flot2.css" rel="stylesheet" type="text/css">
	<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="../../excanvas.min.js"></script><![endif]-->
	<script language="javascript" type="text/javascript" src="../js/jquery.js"></script>
	<script language="javascript" type="text/javascript" src="../js/plugins/flot/jquery.flot2.js"></script>
	<script language="javascript" type="text/javascript" src="../js/plugins/flot/jquery.flot2.categories.js"></script>
	<script type="text/javascript">
		//$(document).ready(function(){
		function loading(){
			$('#placeholder').html('<img src="../img/loading2.gif">').fadeIn();
		}	
		//});
		var th 	= $('#tahunTB').val();
		var bl	= $('#bulanTB').val();
		var mn 	= $('#menuTB').val();
		var dt = new Array;
		var dt2 = new Array;
		$.ajax({
			url :'../proses/pgrafik.php?data',
			data:'menu='+mn+'&tahun='+th+'&bulan='+bl,
			type:'get',
			dataType:'json',
			cache:false,
			success:function(data){
			
				//var i =0;
				$.each(data, function (id,item){
		
					///#dt.push([ item.linka , item.diu ]);
					///dt.push([ item.tid , item.diu ]);
					//dt2.push([ data.data2[id][0],data.data2[id][1] ]);
					dt.push([ item.data1[0],item.data1[1] ]);
					dt2.push([ item.data2[0],item.data2[1] ]);
				});
				//$.each(data, function (id,item){
					//dt.push([ item.linka , item.diu ]);
				//});
				console.log(dt,dt2);
				//console.log(dt,dt2);
				//return false;
				//console.log(dt2);
				//bigBarChart(data);
				
				$('img').fadeOut(function(){
					barChart(dt,dt2);
					//barChart(dt,dt2);
				});
			}
		});

	//$(function() {

		//var data = [ ["January", 2], ["February", 4], ["March", 8], ["April", 6], ["May", 10], ["June", 9] ];
		//var data2 = [ ["January", 12], ["February", 9], ["March", 11], ["April", 13], ["May", 14], ["June", 19] ];
		
		//function barChart(data,data2){
		function barChart(data,data2){
			//var data2 = [ ["January", 12], ["February", 9], ["March", 11], ["April", 13], ["May", 14], ["June", 19] ];
		//function barChart(data,data2){
			/*$.plot("#placeholder", [ data,data2 ], {
				series: {
					bars: {
						show: true,
						barWidth: 0.6,
						align: "center"
					},
					lines:{
						show:true,
					}
				},
				xaxis: {
					mode: "categories",
					tickLength: 0
				}
			});*/

			
			//$.plot("#placeholder", [ data,data2 ], {
			$.plot("#placeholder", [{
					data:data2,
					label:'tersedia',
					color:'yellow',
				},{
					data:data,
					label:'terpakai',
					color:'green',
				}
				],{
				series: {
					bars: {
						show: true,
						//barWidth: 0.6,
						barWidth: 1,
						align: "center"
					},
					lines:{
						show:false,
					},
					points:{
						show:true,
					}
				},
				/*legend:{
					backgroundColor: 'green',//null or color
					backgroundOpacity: 0.7,//number between 0 and 1
				},*/
				grid: { 
					backgroundColor: { colors: ["#000", "#999"] },
					//autoHighlight: false, 
					//borderWidth:4, 
					hoverable: true, 
					clickable: true, 
					autoHighlight: true, 
					borderWidth:0, 
					//color: '#ffffff' 
					color: '#000000' 
				},
				
				xaxis: {
					mode: "categories",
					tickLength: 0
				}
			});	
		}
	//});

	</script>
</head>

</html>
<?php
	}
}
?>