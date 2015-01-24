<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='tsafetyp'){
?>	

<link href="css/style-page.css" rel="stylesheet" />        
<a data-toggle="modal" id="tambahBC" class="btn btn-info btn-large">Tambah Data</a>
<!--<a id="cetakBC" class="btn btn-info btn-large" href="pcetak.php?tabelx=tb_detilsafetyp&judulx=Shift Kerja" target="_blank">Cetak Semua</a>-->
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
            <!--<div class="content">-->
              <form class="form-horizontal cmxform" id="safetypFR" method="get" action="ptransaksi.php" autocomplete="off">
              	<input type="hidden" id="idform" />
               
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Tahun</label>
                  <div class="controls span7">
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
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Bulan</label>
                  <div class="controls span7">
                  <select name="bulanTB" placeholder="bulan " required id="bulanTB">
                  	<option value="">Pilih Bulan ... </option>
                  	<option value="1">Januari</option>
                  	<option value="2">Februari</option>
                  	<option value="3">Maret</option>
                  	<option value="4">April</option>
                  	<option value="5">Mei</option>
                  	<option value="6">Juni</option>
                  	<option value="7">Juli</option>
                  	<option value="8">Agustus</option>
                  	<option value="9">September</option>
                  	<option value="10">Oktober</option>
                  	<option value="11">November</option>
                  	<option value="12">Desember</option>
                  </select>
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">Jam Kerja Normal</label>
                  <div class="controls span7">
    	               	<input type="text" placeholder="jam kerja aman (wajib diisi)" required id="jam_normalTB" name="jam_normalTB"/>
                   </div>
                </div>                
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">Jam Kerja Lembur</label>
                  <div class="controls span7">
    	               	<input type="text" placeholder="jam kerja lembur(wajib diisi)" required id="jam_lemburTB" name="jam_lemburTB"/>
                   </div>
                </div> 
                               
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">Jam Kerja Absen</label>
                  <div class="controls span7">
    	               	<input type="text" placeholder="jam kerja absen (wajib diisi)" required id="jam_absenTB" name="jam_absenTB"/>
                   </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">Fatality</label>
                  <div class="controls span7">
    	               	<input type="text" placeholder="fatality (wajib diisi)" required id="fatalityTB" name="fatalityTB"/>
                   </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">UAC</label>
                  <div class="controls span7">
    	               	<input type="text" placeholder="UAC (wajib diisi)" required id="uacTB" name="uacTB"/>
                   </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">Near Miss</label>
                  <div class="controls span7">
    	               	<input type="text" placeholder="near miss(wajib diisi)" required id="near_missTB" name="near_missTB"/>
                   </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">ldwc</label>
                  <div class="controls span7">
    	               	<input type="text" placeholder="lost duty work case (wajib diisi)" required id="ldwcTB" name="ldwcTB"/>
                   </div>
                </div>
                
                
                <!--<div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">UAC</label>
                  <div class="controls span7">
	                  <input type="text" name="uacTB" placeholder="UAC (wajib diisi)" required id="uacTB" />
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Near Miss</label>
                  <div class="controls span7">
						<input type="text" name="near_missTB" placeholder="Near Miss (wajib diisi)" required id="near_missTB" />
                  </div>
                </div>-->
                
                <div class="form-actions row-fluid">
				  <div class="span7 offset3">
                    <button type="submit" class="btn btn-secondary" id="simpanBC">simpan</button>
                    <!--<button type="button" class="btn btn-secondary">Cancel</button>-->
                  </div>
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
            <h4> <span>Data Transaksi - Safety Performance </span>
           </h4>&nbsp;
				<select id="kategoriTB">
					<option value="jam_normal" selected="selected">aspek safety performance</option>
					<option value="realisasi_bln">realisasi bulanan</option>
					<option value="tahun">tahun</option>
					<option value="bulan">bulan</option>
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
                        <th class="to_hide_phone ue no_sort">Jam Kerja Aman</th>
                        <th class="to_hide_phone ue no_sort">Fatality</th>
                        <th class="to_hide_phone ue no_sort">UAC</th>
                        <th class="to_hide_phone ue no_sort">Near Miss</th>
                        <th class="to_hide_phone ue no_sort">Lost Duty Work Case</th>
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
      <!-- End .row-fluid --> 
  <!--</div>-->
      
<script src="js/jquery.js" type="text/javascript"> </script> 
<!--<script src="js/plugins/enquire.min.js" type="text/javascript"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/jquery.sparkline.min.js"></script> 
<script src="js/plugins/excanvas.compiled.js" type="text/javascript"></script> -->
<!--Modal Concept -->
<!--<script src="js/bootstrap-transition.js" type="text/javascript"></script> 
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
<script language="javascript" type="text/javascript" src="js/plugins/chosen/chosen/chosen.jquery.min.js"></script> -->

<!-- Data tables plugin --> 

<!-- Custom made scripts for this template --> 
<script type="text/javascript">
    $(document).ready(function(){	
		$('.realisasi_blnTB').keyup(function() {
			$('span.editangkanya').hide();
			var inputVal = $(this).val();
			var numericReg = /^\d*[0-9](|.\d*[0-9]|,\d*[0-9])?$/;
			if(!numericReg.test(inputVal)) {
			alert('angka saja');//	$(this).after('<span class="editangkanya">Hanya boleh diisi Angka.</span>');
			}
		});
	
		loadData();
		//fungai loading mode "normal"
		function loadData(){
			//$('#loadtabel').html('<img src="img/ajax-loaderz.gif">').fadeIn();
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			var dataString;
			var cari 	= $("input#objekTB").val();
			var combo 	= $("select#kategoriTB").val();
			
			if (combo == "jam_normal"){
				dataString = 'jam_normal='+ cari;
			}
			else if (combo == "bulan"){
				dataString = 'bulan='+ cari;
			}
			else if (combo == "tahun"){
				dataString = 'tahun='+ cari;
			}
			else if (combo == "ralisasi_bln"){
				dataString = 'realisasi_bln='+ cari;
			}
			
			$.ajax({
				url	: "ptransaksi.php?aksi=tampil&menu=tsafetyp",
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
			//$('#loadtabel').html('<img src="img/ajax-loaderz.gif">').fadeIn();
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			var cari = $("input#objekTB").val();
			var combo = $("select#kategoriTB").val();
			
			if (combo == "jam_normal"){
				dataString = 'starting='+page+'&jam_normal='+cari;//+'&random='+Math.random();
			}
			else if (combo == "tahun"){
				dataString = 'starting='+page+'&tahun='+cari;//+'&random='+Math.random();
			}
			else if (combo == "bulan"){
				dataString = 'starting='+page+'&bulan='+cari;//+'&random='+Math.random();
			}
			else if (combo == "realisasi_bln"){
				dataString = 'starting='+page+'&realisasi_bln='+cari;//+'&random='+Math.random();
			}
			else{
				dataString = 'starting='+page;//+'&random='+Math.random();
			}
			
			$.ajax({
				url:"ptransaksi.php?aksi=tampil&menu=tsafetyp",
				data: dataString,
				type:"GET",
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
		
		//cari bulanTB 
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
			$('#bulanTB').val('');	
			$('#tahunTB').val('');	
			$('#jam_normalTB').val('');	
			$('#jam_lemburTB').val('');	
			$('#jam_absenTB').val('');	
		}
		//klik tambah 
		$("#tambahBC").click(function(){
			kosongkan();
			//aspeksafetyp();
			$("#titlex").html('<h4><span align=center><b>tambah data</b></span><h4>');
			$('#myModal').modal('show');
		});
		//end of tambah 
		
		//simpan(tambah & edit)
		$('#safetypFR').submit(function() {
			var idformx = $("#idform").val();
			var urlx = $(this).attr('action');

			if(idformx==''){ //tmbah data
				urlx2 = "?aksi=tambah&menu=tsafetyp";
			}else{ //edit data
				urlx2 = "?aksi=ubah&menu=tsafetyp&idx="+idformx;
			}
			$('#hasily').html("loading ....");
			$.ajax({
				type: 'POST',
				dataType:'json',
				url: urlx + urlx2,
				data: $(this).serialize(),
				success: function(data){
					$('#hasily').html("");
					var statusy 	= data.status;
					var bulany		= data.bulan;
					var tahuny		= data.tahun;
					var jam_normaly	= data.jam_normal;
					var jam_lembury	= data.jam_lembur;
					var jam_abseny	= data.jam_absen;
					var fatality	= data.fatality;
					var uacy 		= data.uac;
					var near_missy 	= data.near_miss;
					var ldwcy		= data.ldwc;
					
					if(statusy=='sukses'){
						if(idformx==''){
							kosongkan();
							var idy = data.id;
							loadData();
							$("#tsafetyp_"+idy).css("background","green");
							$('#myModal').modal('hide');
						}
						else{
							var idy = idformx;
							$("#tsafetyp_"+idy).css("background","blue");
							$("#loadtabel").html('update <br> jam kerja normal : "'+jam_normaly +'" <br> jam lembur : '+jam_lembury+'<br> jam absen:'+jam_abseny+'<br> bulan :'+ bulany +'<br> tahun : '+tahuny ).fadeIn(6000);
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
			$("#titlex").html(' <h4><span align=center><b>Edit Data</b></span><h4>');
			var idy = $(this).attr("idz");
			$.ajax({
				url:"ptransaksi.php?aksi=ambiledit&menu=tsafetyp",
				data: "idx="+idy,
				dataType:'json',
				type:"GET",
				success:function(data){
					var statusy		= data.status;
					var tahuny		= data.tahun;
					var bulany		= data.bulan;
					var fatalityy	= data.fatality;
					var uacy		= data.uac;
					var ldwcy		= data.ldwc;
					var near_missy	= data.near_miss;
					var jam_normaly	= data.jam_normal;
					var jam_lembury	= data.jam_lembur;
					var jam_abseny	= data.jam_absen;
					if(statusy=='sukses'){
						$("#idform").val(idy);
						$("#tahunTB").val(tahuny);
						$("#bulanTB").val(bulany);
						$("#uacTB").val(uacy);
						$("#fatalityTB").val(fatalityy);
						$("#near_missTB").val(near_missy);
						$("#uacTB").val(uacy);
						$("#ldwcTB").val(ldwcy);
						$("#jam_normalTB").val(jam_normaly);
						$("#jam_lemburTB").val(jam_lembury);
						$("#jam_absenTB").val(jam_abseny);
						$("#simpanBC").html('Update');
						$('#myModal').modal('show');
						//$('#myModal').modal('show');
					}else{
						alert('terjadi kesalahan pada database');
					}
					//$('#isi').hide().html(data).fadeIn(1000);
					//$("#loadtabel").fadeOut();
				}
			});
			
		});	
		//end of action klik edit
		
		
/*		//action hapus 
		$('i.gicon-remove').live("click",function() {	
			var idy = $(this).attr("idz");
			var namay= $(this).attr("namaz");
			 
			if(confirm("lanjutkan menghapus '"+namay+"' ?"))
				$.ajax({
						type: "GET",
						dataType:"json",
						url: "pmaster.php?aksi=hapus&menu=mbagian",
						data:"idx=" + idy,
						cache: false,
						success: function(data){
							var statusy		= data.status;
							var keterangany	= data.keterangan;
							var namay 		= data.nama_bagian;
								
							$("#bagian_"+idy).css("background","red").fadeOut(2000);
							loadData();
							$("#loadtabel").html('bagian : "'+namay+'", keterangan : '+keterangany+' terhapus').fadeIn(6000);
							//$("#list_"+nim).slideUp('slow', function() {$(this).remove();});
						}
				});
		});
		//end of action hapus 
*/
	
		//action hapus 
		$('i.gicon-remove').live("click",function() {	
			var idy = $(this).attr("idz");
			 
			if(confirm("lanjutkan menghapus id: '"+idy+"' ?"))
				$.ajax({
					type: "GET",
					dataType:"json",
					url: "ptransaksi.php?aksi=hapus&menu=tsafetyp",
					data:"idx=" + idy,
					cache: false,
					success: function(data){
						var statusy		= data.status;
						var fatality	= data.fatality;
						var uacy		= data.uac;
						var ldwcy		= data.ldwc;
						var near_missy	= data.near_missy;
						var jam_normaly	= data.jam_normal;
						var jam_abseny	= data.jam_absen;
						var jam_lembury	= data.jam_lembur;
							
						$("#safetyp_"+idy).css("background","red").fadeOut(2000);
						loadData();
						//$("#loadtabel").html('safety performance: "'+namay+'", bulan : '+bulany+' , tahun : '+tahuny+' terhapus').fadeIn(6000);
					}
				});
		});
		//end of action hapus 
		
		//hapus semua
		$('#hapusBC').click(function() {	
			if(confirm("lanjutkan menghapus semua shift  ?"))
				$.ajax({
						type: "GET",
						dataType:'json',
						url: "ptransaksi.php",
						data:"aksi=hapussemua&menu=tsafetyp",
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
				//data :'tabelx=tb_detilsafetyp&idx=id_shiftkerja',
				data :'tabelx=tb_detilsafetyp',
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
				data: "tabelx=tb_detilsafetyp",
				//data: "tabelx=tb_detilsafetyp&ancur="+md5,
				contentType: "application/pdf; charset=utf-8",
				success: function(data)
				{
				alert(data);
				}
			});
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