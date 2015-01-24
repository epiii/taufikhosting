<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='lreg'){
		include 'lib/koneks.php';
?>	
	<link href="css/style-page.css" rel="stylesheet" />        
	<script language="javascript" type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script> 
	<link href="js/plugins/chosen/chosen/chosen.css" rel="stylesheet">

	<div class="row-fluid">
		<div class="box ">
			<div class="title">
				<h4> <span>Laporan Data Sirkit Kanal (Regional)</span></h4>
				&nbsp;
                <select name="id_backboneTB" id="id_backboneTB">
					<option value="">pilih backbone</option>
					<?php
						$sqlb	= "select * from tb_backbone where kode like 'zte%' order by kode";
						$exeb	= mysql_query($sqlb);
						while($resb = mysql_fetch_assoc($exeb)){
							echo "<option value='$resb[id_backbone]'>$resb[kode]</option>";
						}
					?>
				</select>
				<select name="tahunTB" required id="tahunTB">
					<option value="">pilih tahun ..</option>
					<?php
						$nowz = getdate();
						$tahun = $nowz['year'];	
						for($x = $tahun; $x>=1997; $x--){
							echo "<option value=$x>$x</option>";
						}
					?>
				</select>                  
                <select id="bulanTB" required>
					<option value="" selected="selected">pilih bulan</option>
					<option value="12">Desember</option>
					<option value="11">Nopember</option>
					<option value="10">Oktober</option>
					<option value="9">September</option>
					<option value="8">Agustus</option>
					<option value="7">Juli</option>
					<option value="6">Juni</option>
					<option value="5">Mei</option>
					<option value="4">April</option>
					<option value="3">Maret</option>
					<option value="2">Februari</option>
					<option value="1">Januari</option>
				</select>&nbsp;
                <input type="button" class="btn" id="lihatBC" value="cetak"/>
				  
				<!--<select id="tahunTB" required>
					<option value="" selected="selected">pilih tahun</option>
					<?php 
						/*$sql="select year(tgl_kejadian) as tahun from tb_kecelakaan";
						$kue=mysql_query($sql);
						while($hasil=mysql_fetch_assoc($kue)){*/
					?>
                    	<option value="<?php #echo $hasil['tahun']?>"><?php #echo $hasil['tahun']?></option>
					<?php #} ?>
            	</select>&nbsp;-->
				
                <xinput type="text" id="objekTB" placeholder="pencarian">&nbsp;
				<span id="loadtabel"></span>
			</div>
			
            <div class="content top"></div>
		</div>
	</div>
<script language="javascript" type="text/javascript" src="js/plugins/chosen/chosen/chosen.jquery.min.js"></script> 

<script type="text/javascript">
    $(document).ready(function(){
		$('#lihatBC').click(function() {	
			$(this).target = "_blank";
			var tahuny 	= $('#tahunTB').val();
			var bulany	= $('#bulanTB').val();
			var backby	= $('#id_backboneTB').val();
			
			if(tahuny==''){
				alert('pilih tahun');
				$('#tahunTB').focus();
			}else if(bulany==''){
				alert('pilih bulan');
				$('#bulanTB').focus();
			}else if(backby==''){
				alert('pilih backbonne');
				$('#id_backboneTB').focus();
			}else {
				var ruwet = encode64(bulany+'ruwet'+tahuny);
				//window.open("lztePrint.php?tahun="+tahuny+"&bulan="+bulany+"&ruwet="+ruwet);
				//window.open("claporan.php?tahun="+tahuny+"&bulan="+bulany+"&ruwet="+ruwet);
				window.open("czte.php?backb="+backby+"&tahun="+tahuny+"&bulan="+bulany+"&ruwet="+ruwet);
			}//return false;
		});//end of action detail
		
    });




</script>

<?php
		}else{
			header("location:index.php");
		}
	}else{
		header("location:index.php");
	}
?>