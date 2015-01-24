<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='ldapot'){
?>	
	<link href="css/style-page.css" rel="stylesheet" />        
	<script language="javascript" type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script> 
	<link href="js/plugins/chosen/chosen/chosen.css" rel="stylesheet">

	<div class="row-fluid ">
		<div class="box color_2">
			<div class="title">
				<h4> <span>Laporan Data Potensi (DAPOT)</span></h4>
				<span id="loadtabel"></span>
			</div>
            
			<div class="content top">
				<div class="form-row control-group row-fluid">
					<label class="control-label span1"> Tahun :</label>
					<div class="controls span7">
						<select name="tahunTB" class="span4" required id="tahunTB">
							<option value="">pilih tahun ..</option>
							<?php
								$nowz 	= getdate();
								$tahun 	= $nowz['year'];	
								$sql 	= "SELECT min(year(tgl_update))as tahun from tb_sirkit ";
								$exe	= mysql_query($sql);
								$res	= mysql_fetch_assoc($exe);
								for($x = $tahun; $x>=$res['tahun']; $x--){
									echo "<option value=$x>$x</option>";
								}
							?>
						</select>
					</div>
				</div>
                <div class="form-row control-group row-fluid">
					<label class="control-label span1"> Bulan :</label>
					<div class="controls span7">
						 <select class="span4" id="bulanTB" required>
							<option value="">pilih bulan</option>
							<!--<option value="12">Desember</option>
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
							<option value="1">Januari</option>-->
						</select>
					</div>
				</div>	
				<div class="form-row control-group row-fluid">
					<span label class="span1"> Format :</span>
					<div class="controls span7">
						<a id="tabularBC" class="btn btn-large " data-original-title=" Tabular " data-placement="bottom" rel="tooltip">
							<i class="icon-th-list"></i>
						</a>
						<a xhref="charts.php" xtarget="_blank" id="grafikBC" class="btn btn-large" data-original-title=" Grafik " data-placement="bottom" rel="tooltip">
							<i class="icon-bar-chart"></i>
						</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>
<script language="javascript" type="text/javascript" src="js/plugins/chosen/chosen/chosen.jquery.min.js"></script> 

<script type="text/javascript">
    $(document).ready(function(){
	
		function comboThn(tahun){
			$.ajax({
				url:'proses/plaporan.php',
				type:'get',
				dataType:'json',
				data:'aksi=combo&menu=ldapotc&tahun='+tahun,
				success:function(data){
					var optiony ='';
					if(data.status=='gagal'){
						optiony+='<option value="">data masih kosong</option>';
					}else{
						$.each(data, function (id,item){
							optiony+='<option value='+item.bulan+'>'+item.bulan+'</option>';
						});
					}
					
					$('#bulanTB').html('<option value="">pilih bulan...</option>'+optiony);
				}
			}); 
		}
	
		$('#tahunTB').on('change',function(){
			var tahun = $('#tahunTB').val();
			comboThn(tahun);
		});
		//action cetak
		$('#tabularBC').click(function() {	
			$(this).target = "_blank";
			var tahuny 	= $('#tahunTB').val();
			var bulany	= $('#bulanTB').val();
			
			if(tahuny==''){
				alert('pilih tahun');
				$('#tahunTB').focus();
			}else if(bulany==''){
				alert('pilih bulan');
				$('#bulanTB').focus();
			}else {
				var ruwet = encode64(bulany+'dapot'+tahuny);
				window.open("report/cdapot.php?tahun="+tahuny+"&bulan="+bulany+"&ruwet="+ruwet);
			}//return false;
		});//end of action detail
		
		$('#grafikBC').click(function() {	
			$(this).target = "_blank";
			var tahuny 	= $('#tahunTB').val();
			var bulany	= $('#bulanTB').val();
			
			if(tahuny==''){
				alert('pilih tahun');
				$('#tahunTB').focus();
			}else if(bulany==''){
				alert('pilih bulan');
				$('#bulanTB').focus();
			}else {
				var ruwet = encode64(bulany+'dapot'+tahuny);
				window.open("report/grafik.php?menu=dapot&tahun="+tahuny+"&bulan="+bulany+"&ruwet="+ruwet);
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