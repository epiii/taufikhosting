<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Flot Examples: Categories</title>
	<link href="../css/jquery.flot2.css" rel="stylesheet" type="text/css">
	<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="../../excanvas.min.js"></script><![endif]-->
	<script language="javascript" type="text/javascript" src="../js/jquery.js"></script>
	<script language="javascript" type="text/javascript" src="../js/plugins/flot/jquery.flot2.js"></script>
	<script language="javascript" type="text/javascript" src="../js/plugins/flot/jquery.flot2.categories.js"></script>
	<script type="text/javascript">

	$(function() {

		var data = [ ["January", 10], ["February", 8], ["March", 4], ["April", 13], ["May", 17], ["June", 9] ];
		var data2 = [ ["January", 120], ["February", 9], ["March", 14], ["April", 13], ["May", 2], ["June", 19] ];

		$.plot("#placeholder", [ data,data2 ], {
		//$.plot("#placeholder", [ {data},{data2} ], {
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
		});

		// Add the Flot version string to the footer

		//$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	});

	</script>
</head>
<body>

	<div id="header">
		<h2>Categories</h2>
	</div>

	<div id="content">

		<div class="demo-container">
			<div id="placeholder" class="demo-placeholder"></div>
		</div>

		<p>With the categories plugin you can plot categories/textual data easily.</p>

	</div>

	<div id="footer">
		Copyright &copy; 2007 - 2013 IOLA and Ole Laursen
	</div>

</body>
</html>





