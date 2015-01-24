<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='mper'){
?>	

<link href="css/style-page.css" rel="stylesheet" />        

	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<a  type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/delete2.png" width="50"></a>
		<div class="modal-body">
			<div class="span7">
				<div class="box paint color_25">
					<div class="title" id="titlex">
						<!--judul form-->
                    </div>
            
            <!--<div class="content">-->
              <form class="form-horizontal cmxform" id="perFR" method="get" action="proses/pmaster.php" autocomplete="off">
              	<input type="hidden" id="idform" />
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">ID</label>
                  <div class="controls span7">
                    <input id="idTB" name="idTB" placeholder="ID" type="text" required class="span12"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Merk</label>
                  <div class="controls span7">
                    <input style="text-transform:uppercase" id="merkTB" name="merkTB" minlength="3" type="text" required placeholder="merk"class="row-fluid"/>
                  </div>
				  <div id="kodeinfo" class="control span7" style="color:yellow; font-weight:bold;"> 
                  
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Type</label>
                  <div class="controls span7">
                    <input id="typeTB" name="typeTB" minlength="3" type="text" required placeholder="type " class="row-fluid"/>
                  </div>
                </div>
                <!--<div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Jumlah Port</label>
                  <div class="controls span7">
                    <input id="jumMaxTB" name="jumMaxTB" minlength="3" type="text" placeholder="jumlah port " class="row-fluid"/>
                  </div>-->
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Tahun Operasi</label>
                  <div class="controls span7">
                    <!--<input id="thn_operTB" name="thn_operTB" minlength="3" type="text" required placeholder="level" class="row-fluid"/>-->
                    <select id="thn_operTB" name="thn_operTB">
                    	<?php
							$now 	= getdate();
                        	$yearx	= $now['year'];
							for($i=$yearx; $i>=1990; $i--){
								echo '<option value='.$i.'>'.$i.'</option>';	
							}
						?></select>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Tahun Non Operasi</label>
                  <div class="controls span7">
                    <!--<input id="thn_operTB" name="thn_operTB" minlength="3" type="text" required placeholder="level" class="row-fluid"/>-->
                    <select id="thn_noperTB" name="thn_noperTB"><option value=''>pilih tahun</option>
                    	<?php
							$now 	= getdate();
                        	$yearx	= $now['year'];
							for($i=$yearx; $i>=1990; $i--){
								echo '<option value='.$i.'>'.$i.'</option>';	
							}
						?></select>
                  </div>
                </div>
                <!--<div class="form-row control-group row-fluid">
                  	<label class="control-label span3" for="hint-field">Kanal</label>
                  	<div class="controls span7">
                    	<input id="kanalTB" name="kanalTB" minlength="3" type="text" required placeholder="kanal " class="row-fluid"/>
					</div>
                </div>-->
                
                <div id="hasily"></div>
				<div class="form-actions row-fluid">
				  <div class="span7 offset3">
                    <button type="submit" class="btn btn-secondary" id="simpanBC">simpan</button>
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
        <div class="box color_25">
          <div class="title">
            <h4> <span>Data Master - Perangkat</span>
           </h4>&nbsp;
				<select id="kategoriTB">
					<option value="id" >ID</option>
					<option value="merk">merk</option>
					<option value="type">type</option>
					<option value="thn_oper">Tahun Operasi</option>
					<option value="thn_noper">Tahun Non Operasi</option>
					<!--<option value="kanal">kanal</option>-->
				</select>
                &nbsp;
				<input type="text" id="objekTB" placeholder="pencarian">
                &nbsp;
                 <?php if($_SESSION['leveluserMUX']=='admin'){?>
						<a id="tambahBC" class="btn " data-original-title=" Tambah Data " data-placement="top" rel="tooltip"><i class="icon-plus"></i></a>
						<button class="btn " id="hapusBC" data-original-title=" kosongkan " data-placement="top" rel="tooltip"><i class="icon-trash"></i></button>
					<?php }?>
						<a id="cetakBC"  data-original-title=" Cetak Semua " data-placement="top" rel="tooltip"class="btn " href="report/cmaster.php?tipe=full&tabelx=tb_perangkat&judulx=PERANGKAT" target="_blank"><i class="icon-print"></i></a>
                        <a data-original-title=" Perangkat Detail " data-placement="top" rel="tooltip"class="btn " href="?hlm=bXBlcmRldA=="><i class="icon-arrow-right"></i></a>
                        
                <span id="loadtabel"></span>
          </div>
          <!-- End .title -->
          <div class="content top">
            <table id="datatable_examplez" class="responsive table table-striped table-bordered" 
            	style="width:100%;margin-bottom:0; ">
                <thead>
                    <tr>
                        <th class="to_hide_phone  no_sort">ID Perangkat</th>
                        <th class="to_hide_phone ue no_sort">Merk</th>
                        <th class="to_hide_phone ue no_sort">Type</th>
                       <!-- <th class="to_hide_phone ue no_sort">Jml Port</th>-->
                        <th class="to_hide_phone ue no_sort">Thn Operasi</th>
                        <th class="to_hide_phone ue no_sort">Thn non Operasi</th>
                              	<th class="ms no_sort ">Aksi</th>
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
<script language="javascript" type="text/javascript" src="js/plugins/avgrund.js"></script> 
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
<script type="text/javascript" language="javascript" src="js/plugins/datatables/js/jquery.dataTables.js"></script> 

<!-- Custom made scripts for this template --> 
<script type="text/javascript">
	var proses = 'proses/pmaster.php';
    $('#merkTB').keypress(function(e){
		if(e.which=== 32){
			//$('#kodeinfo').toggle();
			$('#kodeinfo').html('tanpa spasi');
			setTimeout(function(){
				//$('#kodeinfo').fadeOut(function(){
					$('#kodeinfo').html('');
				//});
			},1000);
			return false;
		}	
	});

	$(document).ready(function(){	
		loadData();
		//fungai loading mode "normal"
		function loadData(){
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			var dataString;
			var cari 	= $("input#objekTB").val();
			var combo 	= $("select#kategoriTB").val();
			
			if (combo == "id"){
				dataString = 'id='+ cari;
			}
			else if (combo == "merk"){
				dataString = 'merk='+ cari;
			}
			else if (combo == "type"){
				dataString = 'type='+ cari;
			}
			else if (combo == "jumMax"){
				dataString = 'jumMax='+ cari;
			}
			else if (combo == "thn_oper"){
				dataString = 'thn_oper='+ cari;
			}
			else if (combo == "thn_noper"){
				dataString = 'thn_noper='+ cari;
			}
			
			$.ajax({	
				url	: proses+"?aksi=tampil&menu=mper",
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
			
			if (combo == "id"){
				dataString = 'starting='+page+'&id='+cari;//+'&random='+Math.random();
			}
			else if (combo == "merk"){
				dataString = 'starting='+page+'&merk='+cari;//+'&random='+Math.random();
			}
			else if (combo == "type"){
				dataString = 'starting='+page+'&type='+cari;//+'&random='+Math.random();
			}
			else if (combo == "jumMax"){
				dataString = 'starting='+page+'&jumMax='+cari;//+'&random='+Math.random();
			}
			else if (combo == "thn_oper"){
				dataString = 'starting='+page+'&thn_oper='+cari;//+'&random='+Math.random();
			}
			else if (combo == "thn_noper"){
				dataString = 'starting='+page+'&thn_noper='+cari;//+'&random='+Math.random();
			}
			else{
				dataString = 'starting='+page;//+'&random='+Math.random();
			}
			
			$.ajax({
				url:proses+"?aksi=tampil&menu=mper",
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
		
		//cari alamatTB 
		$("#kategoriTB").change(function(){
			var cari = $("input#objekTB").val();
			var combo = $("select#kategoriTB").val();
			if (cari.replace(/\s/g,"") != ""){ // mengecek field text kosong atau tidak)
				loadData();
			}else if ((cari.replace(/\s/g,"") == "") && (combo != "semua") ){
			  $("input#objekTB").focus();
				loadData();
			}else{
			  loadData();
			}return false;
		});
		
		//cari objekTB
		$("#objekTB").keyup(function(){
			var cari 	= $("input#objekTB").val();
			var combo 	= $("select#kategoriTB").val();
			if (cari.replace(/\s/g,"") != ""){ // mengecek field text kosong atau tidak)
				loadData();
			}else if ((cari.replace(/\s/g,"") == "") && (combo != "semua") ){
				$("input#objekTB").focus();
				loadData();
			}else{
			  loadData();
			}return false;	
		});
		
		//klik tambah 
		$("#tambahBC").click(function(){
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			kosongkan();
			$("#titlex").html('<h4><span align=center><b>tambah data</b></span><h4>');
			$("#simpanBC").html('Simpan');
			$("#nama_perTB").focus();
			idperauto();
		});
		//end of tambah 
		
		function idperauto(){
			$.ajax({
				type: "GET",
				dataType:"json",
				url: proses,
				data:"aksi=cek&menu=mper",
				cache: false,
				success: function(data){
					if(data.status=='gagal'){
						$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
						alert('maaf tidak dapat mengambil id terbaru(error database)');
					}else{
						var statusy	= data.status;
						var idy		= data.id;
						
						$('#idTB').val(idy).attr('readonly',true);
						$('#myModal').modal('show');
						$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
					}
				}
			});
		}
		
		//kosongkan fields
		function kosongkan(){
			$("#idform").val('');
			$("#jumMaxTB").val('');
			$("#idTB").val('');
			$("#merkTB").val('');
			$("#typeTB").val('');
			$("#thn_operTB").val('');
			$("#thn_noperTB").val('');
			$("#idTB").prop({readonly:false});
		}
		//end of kosongkan fields
		
		//simpan(tambah & edit)
		$('#perFR').submit(function() {
			var idformx = $("#idform").val();
			var urlx 	= $(this).attr('action');

			if(idformx==''){ //tmbah data
				urlx2 = "?aksi=tambah&menu=mper";
			}
			else{ //edit data
				urlx2 = "?aksi=ubah&menu=mper&idx="+idformx;
			}
			$('#hasily').html("loading ....");
			$.ajax({
				type: 'POST',
				dataType:'json',
				url: urlx + urlx2,
				data: $(this).serialize(),
				success: function(data) {
					var statusy 	= data.status;
					var idy			= data.id;
					var merky		= data.merk;
					var typey		= data.type;
					var thn_opery	= data.thn_oper;
					var thn_nopery	= data.thn_noper;
							
					if(statusy=='sukses'){
						//add
						if(idformx==''){
							$('#myModal').modal('hide');
							var idy = data.id;
							//alert(idy);
							loadData();
							$("#per_"+idy).css("background","green");
						}
						//edit
						else{
							$('#myModal').modal('hide');
							var idy = idformx;
							$("#per_"+idy).css("background","blue");
							$("#loadtabel").html('update <br> perangkat : "'+merky+' berhasil di update').fadeIn(6000);
							loadData();
						}
						kosongkan();
						$('#hasily').hide();
					}else{
						alert('gagal menyimpan operasi database');
					}
					
				}
			});
			return false;
		});
		//end of simpan(tambah & edit)
		
		//action klik edit
		$('a.edit').live("click",function() {	
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			kosongkan();
			$("#titlex").html('<h4><span align=center><b>Edit Data</b></span><h4>');
			var idy = $(this).attr("idz");
			//alert(idy);
			
			$.ajax({
				url:proses+"?aksi=ambiledit&menu=mper",
				data:"idx="+idy,
				dataType:'json',
				type:"GET",
				success:function(data){
					$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
			
					var statusy		= data.status;
					var idy			= data.id;
					var merky		= data.merk;
					var typey		= data.type;
					var jumMaxy		= data.jumMax;
					var thn_opery	= data.thn_oper;
					var thn_nopery	= data.thn_noper;
										
					if(statusy=='sukses'){
						$("#idform").val(idy);
						$("#idTB").val(idy).attr('readonly',true);
						$("#merkTB").val(merky);
						$("#typeTB").val(typey);
						$("#jumMaxTB").val(jumMaxy);
						$("#thn_operTB").val(thn_opery);
						$("#thn_noperTB").val(thn_nopery);
												
						$('#idTB').prop({readonly:true});
						
						$("#simpanBC").html('Update');
						$('#myModal').modal('show');

					}else{
						alert('terjadi kesalahan pada database');
					}
				}
			});
			
		});	
		//end of action klik edit
		
		
		//action hapus 
		$('a.hapus').live("click",function() {	
			var idy = $(this).attr("idz");
			 
			if(confirm("lanjutkan menghapus '"+idy+"' ?")){
				$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
				$.ajax({
						type: "GET",
						dataType:"json",
						url: proses+"?aksi=hapus&menu=mper",
						data:"idx=" + idy,
						cache: false,
						success: function(data){
							$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
							if(data.status=='gagal'){
								alert('maaf '+idy+' telah terpakai (hapus dahulu data terkait di Perangkat detail)');
							}else{
								var statusy	= data.status;
								var merky	= data.merk;
								var typey	= data.type;
									
								$("#per_"+idy).css("background","yellow").fadeOut(3000);
								$("#loadtabel").html('perangkat : "'+merky+'", type : '+typey+' terhapus').fadeIn(6000);
								loadData();
							}
						}
				});
			}
		});
		//end of action hapus 
		
		//hapus semua
		$('#hapusBC').click(function() {	
			if(confirm("lanjutkan menghapus semua peg  ?"))
				$.ajax({
						type: "GET",
						dataType:'json',
						url: proses,
						data:"aksi=hapussemua&menu=mper",
						success: function(data){
							if(data.status=='sukses'){
								loadData();
							}else{
								alert('terjadi kesalahan pada proses database');
							}
						}
				});
		});
		//end of hapus semua
		
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