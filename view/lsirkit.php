<?php 
	// session_start();
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='lsirkit'){
		include 'lib/koneks.php';
?>	
	<link href="css/style-page.css" rel="stylesheet" />        
	<script language="javascript" type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script> 
	<link href="js/plugins/chosen/chosen/chosen.css" rel="stylesheet">

	<div class="row-fluid">
            <div class="box color_2">
                <div class="title">
                    <h4> <span>Laporan Data Sirkit Kanal Transport SBB</span></h4>
                    <span id="loadtabel"></span>
			</div>
            
			<div class="content top">
	                    <?php
                    	$sql = 'select *  from tb_peg where id_peg = '.$_SESSION['id_userMUX'];
						#var_dump($sql);exit();
						$exe =mysql_query($sql);
						$ambil=mysql_fetch_array($exe);
						$idsesi=$ambil['id_session'];
					?>
                        <input type="hidden" id="sesiTB"value="<?php echo $idsesi;?>" />
                    &nbsp;
                    <div class="form-row control-group row-fluid">
                        <label class="control-label span1">Backbone:</label>
                        <div class="controls span7">
                            <select name="merkTB" required id="merkTB">
                                <option value="" selected>pilih merk ....</option>
                                <?php
                                    $sql	= "SELECT
												p.merk
												FROM
												tb_perangkat p
												LEFT JOIN tb_perangkat_detail pd ON pd.id_per = p.id
												LEFT JOIN tb_sirkit s ON s.id_per_detail
												GROUP BY
												p.merk";
									//var_dump($sql);exit();
						
                                    $exe	= mysql_query($sql);
                                    while($res	= mysql_fetch_assoc($exe)){
                                        echo "<option value='$res[merk]'>$res[merk]</option>";
                                    }
                                ?>
                            </select>
							<select name="id_backboneTB" id="id_backboneTB" required >
                                <option value="">pilih merk dahulu ....</option>
                            </select>
                        </div>
                    </div>
                    
					<!--
                    <div class="form-row control-group row-fluid">
                        <label class="control-label span1">Backbone:</label>
                        <div class="controls span7">
                            <select name="id_backboneTB" id="id_backboneTB" required >
                                <option value="">pilih Perangkat dahulu ..</option>
                            </select>
                        </div>
                    </div>-->
                                        
                    <div class="form-row control-group row-fluid">
                        <label class="control-label span1">Tahun:</label>
                        <div class="controls span7">
                            <select name="tahunTB" required id="tahunTB" required >
                                <option value="">pilih backbone dahulu ..</option>
                            </select>
                       </div>                  
                    </div>
                    
                    <div class="form-row control-group row-fluid">
                        <label class="control-label span1">Bulan:</label>
                        <div class="controls span7">
                            <select id="bulanTB" name="bulanTB" required>
                                <option value="">pilih tahun dahulu  ..</option>
                                
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row control-group row-fluid">
					<span label class="span1"></span>
					<div class="controls span7">
						<a id="tabularBC" class="btn btn-large " data-original-title=" cetak pdf " data-placement="bottom" rel="tooltip">
							<i class="icon-th-list"></i> Lihat
						</a>
						<!--<a id="grafikBC" class="btn btn-large" data-original-title=" Grafik " data-placement="bottom" rel="tooltip">
							<i class="icon-bar-chart"></i>
						</a>-->
					</div>
				</div>
			</div>
			
		</div>
	</div>
                    <span id="loadtabel"></span>
                </div>
			</div>
            			
            <div class="content top"></div>
		</div>
	</div>
<script language="javascript" type="text/javascript" src="js/plugins/chosen/chosen/chosen.jquery.min.js"></script> 

<script type="text/javascript">

	function comboback(kodex){
		$.ajax({
			url:'proses/plaporan.php',
			type:'get',
			dataType:'json',
			data:'aksi=combo&menu=lsirkitc&tabel=tb_backbonex&kode='+kodex,
			success:function(data){
				var optiony ='';
				$.each(data, function (id,item){
					optiony+='<option value='+item.id_backbone+'>'+item.kode+'</option>';
				});
				$('#id_backboneTB').html('<option value="">pilih backbone ...</option>'+optiony);
			}
		}); 
	}
	
	function combotahun(idback){
		$.ajax({
			url:'proses/plaporan.php',
			type:'get',
			dataType:'json',
			data:'aksi=combo&menu=lsirkitc&tabel=tb_sirkitx&idback='+idback,
			success:function(data){
				var optiony ='';
				if(data.status=='gagal'){
					optiony+='<option value="">data masih kosong</option>';
				}else{
					$.each(data, function (id,item){
						optiony+='<option value='+item.tahun+'>'+item.tahun+'</option>';
					});
				}
				$('#tahunTB').html('<option value="">pilih tahun ...</option>'+optiony);
			}
		}); 
	}
	function combobulan(idback,tahun){
		$.ajax({
			url:'proses/plaporan.php',
			type:'get',
			dataType:'json',
			data:'aksi=combo&menu=lsirkitc&tabel=tb_sirkit2x&tahun='+tahun+'&idback='+idback,
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
	
	$(document).ready(function(){
		$('#merkTB').change(function(){
			comboback($(this).val());
		});
		$('#id_backboneTB').change(function(){
			combotahun($(this).val());
		});
		$('#tahunTB').change(function(){
			combobulan($('#id_backboneTB').val(), $(this).val());
		});
		
		$('#tabularBC').click(function() {
			$(this).target = "_blank";
			//alert('');
			var sesiy	= $('#sesiTB').val();
			var merky	= $('#merkTB').val();
			var backby	= $('#id_backboneTB').val();
			var tahuny 	= $('#tahunTB').val();
			var bulany	= $('#bulanTB').val();
			
			if(merky==''){
				alert('pilih merk perangkat');
				$('#merkTB').focus();
			}else if(backby==''){
				alert('pilih backbonne');
				$('#id_backboneTB').focus();
			}else if(tahuny==''){
				alert('pilih tahun');
				$('#tahunTB').focus();
			}else if(bulany==''){
				alert('pilih bulan');
				$('#bulanTB').focus();
			}else {
				var ruwet = encode64(sesiy+backby+tahuny+bulany);
				window.open("report/csirkit.php?backb="+backby+"&tahun="+tahuny+"&bulan="+bulany+"&ruwet="+ruwet);
			}
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