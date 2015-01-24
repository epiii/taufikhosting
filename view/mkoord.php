<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='mkoord'){
?>	

<link href="css/style-page.css" rel="stylesheet" />        
<div id="myModal" class="modal hide fade" tambindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<a  type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/delete2.png" width="50"></a>
		<div class="modal-body">
			<div class="span7">
				<div class="box paint color_11">
					<div class="title" id="titlex">
						<!--judul form-->
                    </div>
            
            <!--<div class="content">-->
              <form class="form-horizontal cmxform" id="koordFR" method="get" action="proses/pmaster.php" autocomplete="off">
              
              	<input type="hidden" id="idform" />
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">Nama</label>
                  <div class="controls span7">
                  	<select id="id_pegTB" name="id_pegTB">
                   	
                    </select>		
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">Lokasi Kerja</label>
                  <div class="controls span7">
					<select id="id_lokerTB" name="id_lokerTB" required>
						
					</select>
                    <!--<input id="lokerTB" name="lokerTB" placeholder="lokasi kerja (wajib diisi)" type="text" required class="span12"/>-->
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Telp 1</label>
                  <div class="controls span7">
                    <input id="telpTB" name="telpTB" minlength="3" type="text" required placeholder="Telp 1(wajib diisi)"class="row-fluid"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Telp 2</label>
                  <div class="controls span7">
                    <input id="telp2TB" name="telp2TB" minlength="3" type="text" required placeholder="Telp 2(wajib diisi)" class="row-fluid"/>
                  </div>
                </div>
                
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
        <div class="box color_11 ">
          <div class="title">
            <h4> <span>Data Master - Koordinasi Pegawai</span>
           </h4>&nbsp;
				<select id="kategoriTB">
					<option value="nama" selected="selected">nama</option>
					<option value="loker">lokasi kerja</option>
					<option value="telp">telp 1</option>
					<option value="telp2">telp 2</option>
				</select>
                &nbsp;
				<input type="text" id="objekTB" placeholder="pencarian">
                &nbsp;
                <?php if($_SESSION['leveluserMUX']=='admin'){?>
						<a id="tambahBC"  class="btn " data-original-title=" Tambah Data " data-placement="top" rel="tooltip"><i class="icon-plus"></i></a>
						<button class="btn " id="hapusBC" data-original-title=" kosongkan " data-placement="top" rel="tooltip"><i class="icon-trash"></i></button>
				<?php }?>
						<a id="cetakBC"  data-original-title=" Cetak Semua " data-placement="top" rel="tooltip"class="btn " href="report/cmaster.php?tipe=full&tabelx=tb_koordinasi&judulx=koordinasi" target="_blank"><i class="icon-print"></i></a>

          <span id="loadtabel"></span>
          </div>
          <!-- End .title -->
          <div class="content top">
            <table id="datatable_examplez" class="responsive table table-striped table-bordered" 
            	style="width:100%;margin-bottom:0; ">
                <thead>
                    <tr>
                        <th class="to_hide_phone  no_sort">Nama</th>
                        <th class="to_hide_phone ue no_sort">Lokasi Kerja</th>
                        <th class="to_hide_phone ue no_sort">Telp 1</th>
                        <th class="to_hide_phone ue no_sort">Telp 2</th>
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
    $(document).ready(function()
	{	
		function comboid(par){
			$.ajax({
				url:proses,
				type:'get',
				dataType:'json',
				data:'aksi=combo&menu=mkoordc&tabel=tb_peg&par='+par,
				success:function(data){
					var optiony ='';
					$.each(data, function (id,item){
						if(par==item.id_peg){
							optiony+='<option value='+item.id_peg+' selected="selected">'+item.nama+' ( NIK : '+item.nik+' )</option>';
						}else{
							optiony+='<option value='+item.id_peg+'>'+item.nama+' ( NIK : '+item.nik+' )</option>';	
						}
					});
					$('#id_pegTB').html(optiony);
				}
			}); 
		}	
	
		function comboloker(par){
			$.ajax({
				url:proses,
				type:'get',
				dataType:'json',
				data:'aksi=combo&menu=mkoordc&tabel=tb_loker&par='+par,
				success:function(data){
					var optiony ='';
					$.each(data, function (id,item){
						if(par==item.id_loker){
							optiony+='<option value='+item.id_loker+' selected="selected">'+item.loker+'</option>';
						}else{
							optiony+='<option value='+item.id_loker+'>'+item.loker+'</option>';	
						}
					});
					$('#id_lokerTB').html(optiony);
					$('#myModal').modal('show');
					$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
				}
			}); 
		}	

		loadData();
		//fungai loading mode "normal"
		function loadData(){
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			var dataString;
			var cari 	= $("input#objekTB").val();
			var combo 	= $("select#kategoriTB").val();
			
			if (combo == "nama"){
				dataString = 'nama='+ cari;
			}
			else if (combo == "loker"){
				dataString = 'loker='+ cari;
			}
			else if (combo == "telp"){
				dataString = 'telp='+ cari;
			}
			else if (combo == "telp2"){
				dataString = 'telp2='+ cari;
			}
			else if (combo == "channelidb"){
				dataString = 'channelidb='+ cari;
			}
			
			$.ajax({	
				url	: proses+"?aksi=tampil&menu=mkoord",
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
			
			if (combo == "nama"){
				dataString = 'starting='+page+'&nama='+cari;//+'&random='+Math.random();
			}
			else if (combo == "loker"){
				dataString = 'starting='+page+'&loker='+cari;//+'&random='+Math.random();
			}
			else if (combo == "telp"){
				dataString = 'starting='+page+'&telp='+cari;//+'&random='+Math.random();
			}
			else if (combo == "telp2"){
				dataString = 'starting='+page+'&telp2='+cari;//+'&random='+Math.random();
			}
			else if (combo == "channelidb"){
				dataString = 'starting='+page+'&channelidb='+cari;//+'&random='+Math.random();
			}
			else{
				dataString = 'starting='+page;//+'&random='+Math.random();
			}
			
			$.ajax({
				url:proses+"?aksi=tampil&menu=mkoord",
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
			comboid(0);
			comboloker(0);
			$("#titlex").html('<h4><span align=center><b>tambah data</b></span><h4>');
			$("#simpanBC").html('Simpan');
		});
		//end of tambah 
		
		//kosongkan fields
		function kosongkan(){
			$("#idform").val('');
			//$("#id_pegTB").val('');
			$("#lokerTB").val('');
			$("#telpTB").val('');
			$("#telp2TB").val('');
		}
		//end of kosongkan fields
		
		//simpan(tambah & edit)
		$('#koordFR').submit(function() {
			var idformx = $("#idform").val();
			var urlx 	= $(this).attr('action');

			if(idformx==''){ //tmbah data
				urlx2 = "?aksi=tambah&menu=mkoord";
			}
			else{ //edit data
				urlx2 = "?aksi=ubah&menu=mkoord&idx="+idformx;
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
					var id_pegy		= data.id_peg;
					var id_lokery	= data.id_loker;
					var telpy		= data.telp;
					var telp2y		= data.telp2;
					
					if(statusy=='sukses'){
						//add
						if(idformx==''){
							$('#myModal').modal('hide');
							var idy = data.id;
							//alert(idy);
							loadData();
							$("#koord_"+idy).css("background","green");
						}
						//edit
						else{
							$('#myModal').modal('hide');
							var idy = idformx;
							$("#koord_"+idy).css("background","blue");
							$("#loadtabel").html('update <br> perangkat : "'+id_pegy+' terhapus').fadeIn(6000);
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
		
		function comboper(par){
			$.ajax({
				url:proses,
				type:'get',
				dataType:'json',
				data:'aksi=combo&menu=mkoordc&tabel=tb_koordinasi',
				success:function(data){
					var optiony ='';
						$.each(data, function (id,item){
							if(par==item.id)
								optiony+='<option value='+item.id+' selected="selected">'+item.id+'</option>';
							else
								optiony+='<option value='+item.id+'>'+item.id+'</option>';
							
						});
						$('#nikTB').html(optiony);
				}
			});
		}
		
		//action klik edit
		$('a.edit').live("click",function() {
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
		
			kosongkan();
			$("#titlex").html('<h4><span align=center><b>Edit Data</b></span><h4>');
			var idy = $(this).attr("idz");
			
			$.ajax({
				url:proses+"?aksi=ambiledit&menu=mkoord",
				data:"idx="+idy,
				dataType:'json',
				type:"GET",
				success:function(data){
					var statusy	= data.status;
					var id_pegy	= data.id_peg;
					var id_lokery= data.id_loker;
					var lokery	= data.loker;
					var telpy	= data.telp;
					var telp2y	= data.telp2;
					
					if(statusy=='sukses'){
						$("#idform").val(idy);
						$("#id_pegTB").val(id_pegy);
						$("#lokerTB").val(lokery);
						$("#telpTB").val(telpy);
						$("#telp2TB").val(telp2y);
						
						comboid(id_pegy);
						comboloker(id_lokery);
						$("#simpanBC").html('Update');
						//$('#myModal').modal('show');
					}else{
						$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
						alert('terjadi kesalahan pada database');
					}
				}
			});
			
		});	
		//end of action klik edit
		
		//action hapus 
		$('a.hapus').live("click",function() {	
			var idy = $(this).attr("idz");
			//var namay= $(this).attr("namaz");
			 
			if(confirm("lanjutkan menghapus '"+idy+"' ?")){
				$.ajax({
						type: "GET",
						dataType:"json",
						url: proses+"?aksi=hapus&menu=mkoord",
						data:"idx=" + idy,
						cache: false,
						success: function(data){
							var statusy	= data.status;
							//var id_	= data.nama;
								
							$("#koord_"+idy).css("background","yellow").fadeOut(2000);
							loadData();
							$("#loadtabel").html('id : "'+idy+' terhapus').fadeIn(6000);
							//$("#list_"+nim).slideUp('slow', function() {$(this).remove();});
						}
				});
			}else{
				$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
			}
		});
		//end of action hapus 
		
		//hapus semua
		$('#hapusBC').click(function() {	
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();

			if(confirm("lanjutkan menghapus semua perangkat data koordinasi pegawai ?"))
				$.ajax({
						type: "GET",
						dataType:'json',
						url: proses,
						data:"aksi=hapussemua&menu=mkoord",
						success: function(data){
							$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();

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