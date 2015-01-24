<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='temisi'){
?>	

</style>
<link href="js/plugins/chosen/chosen/chosen.css" rel="stylesheet">
<link href="css/twitter/bootstrap.css" rel="stylesheet">
<link href="css/base.css" rel="stylesheet">
<link href="css/twitter/responsive.css" rel="stylesheet">
<link href="css/jquery-ui-1.8.23.custom.css" rel="stylesheet">
<link href="css/style-page.css" rel="stylesheet" />        
<a data-toggle="0" id="tambahBC" class="btn btn-info btn-large">Tambah Data</a>
<a id="cetakBC" class="btn btn-info btn-large" href="pcetak.php?tabelx=tb_emisi&judulx=Emisi Gas" target="_blank">Cetak Semua</a>
<button class="btn btn-warning" id="hapusBC">Kosongkan</button>
	<button class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="#">Hapus Antrian</a></li>
            <li><a href="#">Cetak Antrian</a></li>
        </ul>
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<a  type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/delete2.png" width="50"></a>
		<div class="modal-body">
			<div class="span7">
				<div class="box paint color_2">
					<div class="title" id="titlex">
						<!--judul form-->
                    </div>
                    <form class="form-horizontal cmxform" id="validateForm" method="get" action="ptransaksi.php" autocomplete="on">
                        <input type="hidden" id="idform" />
                                                <div class="form-row control-group row-fluid">
                            <label class="control-label span3">Pemantauan</label>
                            <div class="controls span7">
                                <select data-placeholder="Pilih Parameter" required  
                                id="authorTB" name="authorTB"class="chzn-select">
                                    <option value="internal">Internal</option>
                                    <option value="eksternal">Eksternal</option>
								</select>
                            </div>
						</div>
                        <div class="form-row control-group row-fluid">
                            <label class="control-label span3">Pabrik</label>
                            <div class="controls span7">
                                <select data-placeholder="Pilih Parameter" required  
                                id="pabrikTB" name="pabrikTB"class="chzn-select">
                                    <option value="">pilih Pabrik...</option>
                                    <option value="I">Pabrik I</option>
                                    <option value="II A">Pabrik II A</option>
                                    <option value="II B">Pabrik II B</option>
                                    <option value="III">Pabrik III</option>
								</select>
                            </div>
						</div>
                            

                        <div class="form-row control-group row-fluid">
                            <label class="control-label span3">Tahun</label>
                            <div class="controls span7">
                                <select data-placeholder="Pilih Parameter" required  
                                id="tahunTB" name="tahunTB"class="chzn-select">
                                    <option value="">pilih tahun...</option>
                                    <?php 
										$start=1990;
										$skrg=getdate();
										$thn=$skrg['year'];
										for($i=$thn; $i>=$start; $i--){
									?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php } ?>
                                    </select>
                            </div>
						</div>
                        <div class="form-row control-group row-fluid">
                            <label class="control-label span3">Bulan</label>
                            <div class="controls span7">
                                <select data-placeholder="Pilih Bulan" required  id="bulanTB" name="bulanTB"class="chzn-select">
                                    <option value="">pilih perusahaan dahulu ..</option>
                                    <!--<option value="3">Maret</option>
                                    <option value="7">Juli</option>
                                    <option value="11">Nopember</option>-->
                                </select>
	                        </div>
                        </div>
                        
                        <div class="form-row control-group row-fluid">
                            <label class="control-label span3">Tempat Sample</label>
                            <div class="controls span7">
                                <select data-placeholder="Pilih sample Tempat " required id="id_tempatsamplingTB" 
                                name="id_tempatsamplingTB" class="chzn-select">
	                                <option value="">pilih tahun dan bulan dahulu..</option>
                                </select>
                            </div>
						</div>
                        <div class="form-row control-group row-fluid">
                            <label class="control-label span3" for="hint-field">Kadar </label>
                            <div class="controls span3">
                                <span><input id="kadarTB" name="kadarTB"  
                                type="number" required placeholder="kadar gas (wajib diisi)"class="row-fluid"/> Mg / m<sup>3</sup></span>
                            </div>
                        </div>
                        
                        <div id="hasily"></div>
                        <div class="form-actions row-fluid">
                            <button type="submit" class="btn btn-secondary" id="simpanBC">simpan</button>
                        </div>
                    </form>
            </div>
          </div>
          <!-- End .box --> 
        </div>
        <!-- End .span8 -->
       	<!--en dof formx-->
		</div>
		</div>

<div class="avgrund-cover"></div>
<script language="javascript" type="text/javascript" src="js/plugins/avgrund.js"></script> 
		<div class="row-fluid">
        <div class="box ">
          <div class="title">
            <h4> <span>Data Transaksi - Emisi Udara</span>
           </h4>&nbsp;
				<select id="kategoriTB">
					<option value="nama_tempatsampling" selected="selected">Tempat</option>
					<option value="nama_gas">Parameter</option>
					<option value="kadar">Kadar</option>
					<option value="bulan">Bulan</option>
					<option value="tahun">Tahun</option>
				</select>
                &nbsp;
				<input type="text" id="objekTB" placeholder="pencarian">
                &nbsp;
                <span id="loadtabel"></span>
          </div>
          <!-- End .title -->
          <div class="content top">
            <table id="datatable_examplez" class="responsive table table-striped table-bordered" 
            	style="width:100%;margin-bottom:0; ">
                <thead>
                    <tr>
                        <th class="jv no_sort">
                            <label class="checkbox ">
	                            <input type="checkbox">
                            </label></th>
                        <th class="to_hide_phone  no_sort">no</th>
                        <th class="to_hide_phone ue no_sort">Perusahaan</th>
                        <th class="to_hide_phone ue no_sort">Pabrik</th>
                        <th class="to_hide_phone ue no_sort">Tempat</th>
                        <th class="to_hide_phone ue no_sort">Parameter</th>
                        <th class="to_hide_phone ue no_sort">Kadar(Mg/M<sup>3</sup>)</th>
                        <th class="to_hide_phone ue no_sort">Bulan</th>
                        <th class="to_hide_phone ue no_sort">Tahun</th>
                        <th class="ms no_sort ">aksi</th>
                    </tr>
                </thead>
                <tbody id="isi"> 
                	<!--grid tabel-->
                </tbody>
               
            </table>
          </div>
          <!-- End .content --> 
        </div>
        <!-- End box --> 
      </div>
      
 
<script src="js/jquery.js" type="text/javascript"> </script> 
<script language="javascript" type="text/javascript" src="js/plugins/avgrund.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/chosen/chosen/chosen.jquery.min.js"></script> 
<script type="text/javascript" language="javascript" src="js/plugins/datatables/js/jquery.dataTables.js"></script> 
<script type="text/javascript">
    $(document).ready(function(){	
		$('#authorTB').change(function(){
			var authory = $(this).val();
			combobulan(authory);
		});
		
		var bulany	='';
			bulany	+='<option value="1">Januari</option>'; 
			bulany	+='<option value="2">Februari</option>'; 
			bulany	+='<option value="3">Maret</option>'; 
			bulany	+='<option value="4">April</option>'; 
			bulany	+='<option value="5">Mei</option>'; 
			bulany	+='<option value="6">Juni</option>'; 
			bulany	+='<option value="7">Juli</option>'; 
			bulany	+='<option value="8">Agustus</option>'; 
			bulany	+='<option value="9">September</option>'; 
			bulany	+='<option value="10">Oktober</option>'; 
			bulany	+='<option value="11">November</option>'; 
			bulany	+='<option value="12">Desember</option>'; 
		
		var bulan2y	='';
			bulan2y	+='<option value="3">Maret</option>'; 
			bulan2y	+='<option value="7">Juli</option>'; 
			bulan2y	+='<option value="11">November</option>'; 
		
		function combobulan(x){	
			if(x == 'internal'){
				$('#bulanTB').html(bulany);
			}else{
				$('#bulanTB').html(bulan2y);
			}
		}
		
		function combosamplingemisi(param1,param2, param3){
			//alert(param2);
			var author 	= $('#authorTB').val();
			var pabrik 	= $('#pabrikTB').val();
			var tahun 	= $('#tahunTB').val();
			var bulan 	= $('#bulanTB').val();
			if(tahun=='' || bulan==''){
				$('#id_tempatsamplingTB').html('<option value=>silahkan pilih tahun dan bulan dahulu ..</option>');
			}else{
				$.ajax({
					url:'ptransaksi.php',
					type:'get',
					dataType:'json',
					data:'aksi=combo&menu=temisi&tabel=tb_samplingemisi&tahun='+tahun+'&bulan='+bulan+'&author='+author+'&pabrik='+pabrik,
					success:function(data){
						var optiony='';
							$.each(data, function (id,item){
								optiony+='<option value='+item.id_samplingemisi+'>'+item.nama_tempatsampling+'-'+item.nama_gas+'</option>';
							});
							if(param1==''){
								$('#id_tempatsamplingTB').html('<option value=>Pilih Sampling Tempat</option>'+optiony);
							}else{
								$('#id_tempatsamplingTB').html('<option value="'+param1+'">'+param2+'-'+param3+'</option>'+optiony);
							}
					}
				});
			}
		}
		
		
		$('#tambahBC').click(function(){
			combobulan('internal');
			$('#myModal').modal('show');
		});
		loadData();
		
		$('#id_tempatsamplingTB').focus(function(){
			combosamplingemisi();
		});
		
		//fungai loading mode "normal"
		function loadData(){
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			var dataString;
			var cari 	= $("input#objekTB").val();
			var combo 	= $("select#kategoriTB").val();
			
			if (combo == "nama_tempatsampling"){
				dataString = 'nama_tempatsampling='+cari;//+'&random='+Math.random();
			}
			else if (combo == "nama_gas"){
				dataString = 'nama_gas='+cari;//+'&random='+Math.random();
			}
			else if (combo == "kadar"){
				dataString = 'kadar='+cari;//+'&random='+Math.random();
			}
			else if (combo == "bulan"){
				dataString = 'bulan='+cari;//+'&random='+Math.random();
			}
			else if (combo == "tahun"){
				dataString = 'tahun='+cari;//+'&random='+Math.random();
			}
			
			$.ajax({
				url	: "ptransaksi.php?aksi=tampil&menu=temisi",
				type: "GET",
				data: dataString,
				success:function(data){
					//$('#divPageData').html(data);
					$("#loadtabel").fadeOut(1000);
					$('#isi').hide().html(data).fadeIn(1000);
				}
			});
		}
		
		//fungsi loading mode "paging"
		var page;
		function pagination(page){
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			var cari = $("input#objekTB").val();
			var combo = $("select#kategoriTB").val();
			
			if (combo == "nama_tempatsampling"){
				dataString = 'starting='+page+'&nama_tempatsampling='+cari;//+'&random='+Math.random();
			}
			else if (combo == "nama_gas"){
				dataString = 'starting='+page+'&nama_gas='+cari;//+'&random='+Math.random();
			}
			else if (combo == "kadar"){
				dataString = 'starting='+page+'&kadar='+cari;//+'&random='+Math.random();
			}
			else if (combo == "bulan"){
				dataString = 'starting='+page+'&bulan='+cari;//+'&random='+Math.random();
			}
			else if (combo == "tahun"){
				dataString = 'starting='+page+'&tahun='+cari;//+'&random='+Math.random();
			}
			else{
				dataString = 'starting='+page;//+'&random='+Math.random();
			}
			
			$.ajax({
				url	: "ptransaksi.php?aksi=tampil&menu=temisi",
				type: "GET",
				data: dataString,
				success:function(data){
					$("#loadtabel").fadeOut();
					$('#isi').hide().html(data).fadeIn(1000);
					
				}
			});
		}
		//end of fungsi loading mode "paging"
		
		//action klik paging
		$('li.nextpaging').live('click',function(){
			var pg = $(this).attr('pg');
			pagination(pg);
			});
		$('li.prevnext').live('click',function(){
			var pg = $(this).attr('pg');
			pagination(pg);
			});
		//action klik paging
		
		//cari kadarTB 
		$("#kategoriTB").change(function(){
			var cari = $("input#objekTB").val();
			var combo = $("select#kategoriTB").val();
			if (cari.replace(/\s/g,"") != ""){ // mengecek field text kosong atau tidak)
				loadData();
			}
			else if ((cari.replace(/\s/g,"") == "") && (combo != "semua") ){
			  $("input#objekTB").focus();
				loadData();
			}
			else{
			  loadData();
			}
			return false;
		});
		//cari objekTB
		$("#objekTB").keyup(function(){
			var cari = $("input#objekTB").val();
			var combo = $("select#kategoriTB").val();
			if (cari.replace(/\s/g,"") != ""){ // mengecek field text kosong atau tidak)
				loadData();
			}
			else if ((cari.replace(/\s/g,"") == "") && (combo != "semua") ){
				$("input#objekTB").focus();
				loadData();
			}
			else{
			  loadData();
			}
			return false;	
		});
				
		function kosongkan(){
			$("#pabrikTB").val('');
			$("#authorTB").val('');
			$("#id_tempatsamplingTB").val('');
			$("#id_gasTB").val('');
			$("#kadarTB").val('');
			$("#bulanTB").val('');
			$("#tahunTB").val('');
			$('#fieldset3').empty();
		}
		
		//klik tambah 
		$("#tambahBC").click(function(){
			kosongkan();
			$("#titlex").html('<h4><span align=center><b>tambah data</b></span><h4>');
			$("#idform").val('');
			$("#simpanBC").html('Simpan');
			
			$('#myModal').modal('show');
		});
		//end of tambah 
		
		//simpan(tambah & edit)
		$('#validateForm').submit(function() {
			var idformx = $("#idform").val();
			var urlx = $(this).attr('action');

			if(idformx==''){ //tmbah data
				urlx2 = "?aksi=tambah&menu=temisi";
			}
			else{ //edit data
				urlx2 = "?aksi=ubah&menu=temisi&idx="+idformx;
			}
			$('#hasily').html("loading ....");
			$.ajax({
				type: 'POST',
				dataType:'json',
				url: urlx + urlx2,
				data: $(this).serialize(),
				success: function(data){
					$('#hasily').html("");
					var statusy = data.status;
					var id_samplingemisiy= data.id_samplingemisi;
					var kadary 	= data.kadar;
					var bulany 	= data.bulan;
					var tahuny 	= data.tahun;
					
					if(statusy=='sukses'){
						if(idformx==''){
							var idy = data.id;
							loadData();
							$("#emisi_"+idy).css("background","green");
							kosongkan();
							$('#myModal').modal('hide');
						}else{
							var idy = idformx;
							$("#emisi_"+idy).css("background","blue");
							$("#loadtabel").html('update <br> emisi : berhaisl di ubah').fadeIn(6000);
							loadData();
							kosongkan();
							$('#myModal').modal('hide');
						}
					}else{
						alert('gagal menyimpan operasi database');
						}
					
				}
			});
			return false;
		});
		//end of simpan(tambah & edit)
		
		//action klik edit
		$('i.gicon-edit').live("click",function() {	
			kosongkan();
			//combotempatsampling();
			$("#titlex").html(' <h4><span align=center><b>Edit Data</b></span><h4>');
			var idy = $(this).attr("idz");
			
			$.ajax({
				url:"ptransaksi.php?aksi=ambiledit&menu=temisi",
				data: "idx="+idy,
				dataType:'json',
				type:"GET",
				success:function(data){
					var statusy= data.status;
					var id_samplingemisiy= data.id_samplingemisi;
					var gasy= data.nama_gas;
					var tempaty= data.nama_tempat;
					var kadary= data.kadar;
					var bulany= data.bulan;
					var tahuny= data.tahun;
					
					if(statusy=='sukses'){
						$("#idform").val(idy);
						$("#id_tempatsamplingTB").val(id_samplingemisiy);
						combosamplingemisi(id_samplingemisiy,tempaty,gasy);
						$("#kadarTB").val(kadary);
						$("#bulanTB").val(bulany);
						$("#tahunTB").val(tahuny);
						$("#simpanBC").html('Update');
						
						$('#myModal').modal('show');
					}else{
						alert('terjadi kesalahan pada database');
					}
					//$('#isi').hide().html(data).fadeIn(1000);
					//$("#loadtabel").fadeOut();
				}
			});
			
		});	
		//end of action klik edit
		
		//action detail
		$('i.gicon-eye-open').live("click",function() {	
			var idy = $(this).attr("idz");
			var namay= $(this).attr("namaz");
			var keterangany= $(this).attr("keteranganz");
			
			$.ajax({
				type:"GET",
				dataType:'json',
				url:"ptransaksi.php",
				data:"aksi=cetak&menu=temisi&idx="+idy,//+"&namax="+namay+"&keteranganx="+keterangany,
				success:function(data){
					var tempaty		=data.tempat;
					var parametery	=data.parameter;
					var kadary		=data.kadar;
					var bulany		=data.bulan;
					var tahuny		=data.tahun;
					
					var bodyy		='';
						bodyy		+='<div align=center><b>Detail Emisi </b></div>';
						bodyy		+='<table align=center >';	
						bodyy		+='<tr><td>tempat</td><td> : '+tempaty+'</td></tr>';
						bodyy		+='<tr><td>parameter</td><td> : '+parametery+'</td></tr>';
						bodyy		+='<tr><td>kadar</td><td> : '+kadary+' Mg/m<sup>3</sup></td></tr>';
						bodyy		+='<tr><td>bulan</td><td> : '+bulany+'</td></tr>';
						bodyy		+='<tr><td>tahun</td><td> : '+tahuny+'</td></tr></table>';
						
					var print = $('<div>', {
											id:   'cetakemisi',
											html: bodyy,
											css:  {
												margin:'50px',
												color:    '#000',
												width:    '100%',
												height:   '200px'
											}
									}),
					opener = $('<div>').append(print);
					window.open('data:text/html;charset=utf-8,' + opener.html());
				}
			});
		});	
		//end of action detail
		
		//action hapus 
		/*
		$('i.gicon-remove').live("click",function() {	
			var idy = $(this).attr("idz");
			if(confirm("lanjutkan menghapus '"+idy+"' ?")){
				$.ajax({
						type: "GET",
						dataType:"json",
						url: "ptransaksi.php?aksi=hapus&menu=temisi",
						data:"idx=" + idy,
						//cache: true,
						success: function(data){
							var statusy	= data.status;
							var bulany 	= data.bulan;
							var tahuny	= data.tahun;	
							alert("ok");
						}
				});
			}
		});
		*/
		$('i.gicon-remove').live("click",function() {	
			var idy = $(this).attr("idz");
			if(confirm("lanjutkan menghapus '"+idy+"' ?"))
				$.ajax({
						type: "GET",
						dataType:"json",
						url: "ptransaksi.php?aksi=hapus&menu=temisi",
						data:"idx="+idy,
						//cache: false,
						success: function(data){
							$("#emisi_"+idy).css("background","red").fadeOut(2000);
							loadData();
							$("#loadtabel").html('bagian : "'+namay+'", keterangan : '+keterangany+' terhapus').fadeIn(6000);
							//$("#list_"+nim).slideUp('slow', function() {$(this).remove();});
						}
				});
		});
		//end of action hapus 
		
		//hapus semua
		$('#hapusBC').click(function() {	
			if(confirm("lanjutkan menghapus semua emisi  ?"))
				$.ajax({
						type: "GET",
						dataType:'json',
						url: "ptransaksi.php",
						data:"aksi=hapussemua&menu=temisi",
						success: function(data){
							if(data.status=='sukses'){
								loadData();}
							else{
								alert('terjadi kesalahan pada proses database');}
						}
				});
		});
		//hapus
		
		//cetak semua
		$('#cetakBCx').click(function(){
			$.ajax({
				type:'post',
				url:'lib/tespddf.php',
				//data :'tabelx=tb_emisi&idx=id_emisikerja',
				data :'tabelx=tb_emisi',
				success:function(data){
					//opener = $('<div>').append(print);
					//window.open('data:text/html;charset=utf-8,' + opener.html(data));
					
					}
				});
			})
		//end of cetak semua
		
		$('#cetakBCz').click(function(e) {
			e.preventDefault(); // if you have a URL in the link
			jQuery.ajax({
				type: "GET",
				processData: false,
				url: "lib/tespddf.php",
				data: "tabelx=tb_emisi",
				//data: "tabelx=tb_emisi&ancur="+md5,
				contentType: "application/pdf; charset=utf-8",
				success: function(data)
				{
				alert(data);
				}
			});
		});
		
		 // Chosen select plugin
        (".chzn-select").chosen({
          disable_search_threshold: 3
        });
        
		
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