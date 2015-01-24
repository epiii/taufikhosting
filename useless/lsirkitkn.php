<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='lsirkitkn'){
		include 'lib/koneks.php';
?>	
	<link href="css/style-page.css" rel="stylesheet" />        
	<script language="javascript" type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script> 
	<link href="js/plugins/chosen/chosen/chosen.css" rel="stylesheet">

	<div class="row-fluid">
		<div class="box ">
			<div class="title">
				<h4> <span>Laporan Data Sirkit Kanal Transport SBB</span></h4>
				&nbsp;
                <select name="id_perangkatTB" id="id_perangkatTB">
					<option value="">--pilih perangkat--</option>
					<?php
					//mengambil nama nama yang ada di tabel perangkat
						$perangkat	= mysql_query("select * from tb_perangkat order 								by merk"); 
						while($p=mysql_fetch_array($perangkat)){
echo "<option value=\"$p[id]\">$p[merk]</option>\n";

						}
					?>
				</select>
                 <select name="id_backboneTB" id="id_backboneTB">
					<option value="">--pilih backbone--</option>
					<?php
					//mengambil nama nama backbone yang ada di tabel backbone
					
					$backbone = mysql_query("select * from tb_backbone order by kode");
					while($p=mysql_fetch_array($backbone)){
echo "<option value=\"$p[id_backbone]\">$p[kode]</option>\n";
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
var htmlobjek;
$(document).ready(function(){
	// apabila terjadi event on change thdp objek <select id=perangkat>
	$("#perangkat").change(function()(
		var perangkat = $("#perangkat").val();
		$.ajax({
				url: "ambilbackbone.php",
       		 	data: "perangkat="+perangkat,
        		cache: false,
       			success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#backbone").html(msg);
        }
    });
  });
  
  $("#backbone").change(function(){
    var kota = $("#backbone").val();
    $.ajax({
        url: "",
        data: "perangkat="+perangkat,
        cache: false,
        success: function(msg){
            $("#").html(msg);
        }
    });
  });
});


	/*function comboback(idx){
		$.ajax({
			url:'ptransaksi.php',
			type:'get',
			dataType:'json',
			data:'aksi=combo&menu=tsirkitc&tabel=tb_backbonex&idx='+idx,
			success:function(data){
				var optiony ='';
				$.each(data, function (id,item){
					optiony+='<option value='+item.id_backbone+'>'+item.kode+'</option>';
				});
				$('#id_backboneTB').html(optiony);
			}
		}); 
	}
	
	$(document).ready(function(){
		$('#id_perangkatTB').change(function(){
			var idx = $('select#id_perangkatTB:[selected]').text();
			alert(idx);
			comboback(idx);
		}); */
		
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