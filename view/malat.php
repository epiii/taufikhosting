<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='malat'){
?>	

<link href="css/style-page.css" rel="stylesheet" />        

	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<a  type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/delete2.png" width="50"></a>
		<div class="modal-body">
			<div class="span7">
				<div class="box paint color_11">
					<div class="title" id="titlex">
						<!--judul form-->
                    </div>
            
            <!--<div class="content">-->
              <form class="form-horizontal cmxform" id="alatFR" method="get" action="proses/pmaster.php" autocomplete="off">
              	<input type="hidden" id="idform" />
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">ID</label>
                  <div class="controls span7">
                    <input id="id_alatTB" name="id_alatTB" placeholder="id_alat(wajib diisi)" type="text" required class="span12"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Lokasi</label>
                  <div class="controls span7">
                    <input id="lokasiTB" name="lokasiTB" minlength="3" type="text" required placeholder="lokasi"class="row-fluid"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Kegunaan</label>
                  <div class="controls span7">
                    <input id="kegunaanTB" name="kegunaanTB" minlength="3" type="text" required placeholder="kegunaan"class="row-fluid"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Merk</label>
                  <div class="controls span7">
                    <input id="merkTB" name="merkTB" minlength="3" type="text" required placeholder="merk (wajib diisi)" class="row-fluid"/>
                  </div>
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
                  <label class="control-label span3" for="hint-field">Kondisi</label>
                  <div class="controls span7">
                    <!--<input id="thn_operTB" name="thn_operTB" minlength="3" type="text" required placeholder="level" class="row-fluid"/>-->
                    <select id="kondisiTB" name="kondisiTB">
                    	<option value="rusak">rusak</option>
                    	<option value="baik">baik</option>
                    </select>
                  </div>
                </div>
                
                <div id="hasily"></div>
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
        <div class="box color_11">
          <div class="title">
            <h4> <span>Data Master - Alat</span>
           </h4>&nbsp;
				<select id="kategoriTB">
					<option value="id_alat" >ID</option>
					<option value="lokasi">lokasi</option>
					<option value="kegunaan">kegunaan</option>
					<option value="merk">merk</option>
					<option value="thn_oper">tahun operation</option>
					<option value="jml">jumlah</option>
					<option value="kondisi">kondisi</option>
				</select>
                &nbsp;
				<input type="text" id="objekTB" placeholder="pencarian">
                &nbsp;
                <?php if($_SESSION['leveluserMUX']=='admin'){?>
						<a id="tambahBC" class="btn " data-original-title=" Tambah Data " data-placement="top" rel="tooltip"><i class="icon-plus"></i></a>
						<button class="btn " id="hapusBC" data-original-title=" kosongkan " data-placement="top" rel="tooltip"><i class="icon-trash"></i></button>
					<?php }?>
						<a id="cetakBC"  data-original-title=" Cetak Semua " data-placement="top" rel="tooltip"class="btn " href="report/cmaster.php?tipe=full&tabelx=tb_alat&judulx=alat" target="_blank"><i class="icon-print"></i></a>
                <span id="loadtabel"></span>
                </div>
          <!-- End .title -->
          <div class="content top">
            <table id="datatable_examplez" class="responsive table table-striped table-bordered" 
            	style="width:100%;margin-bottom:0; ">
                <thead>
                    <tr>
                        <th class="to_hide_phone  no_sort">ID Alat</th>
                        <th class="to_hide_phone ue no_sort">Lokasi</th>
                        <th class="to_hide_phone ue no_sort">Kegunaan</th>
                        <th class="to_hide_phone ue no_sort">Merk</th>
                        <th class="to_hide_phone ue no_sort">Tahun Operasi</th>
                        <th class="to_hide_phone ue no_sort">Kondisi</th>
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
		//combo
		function combothn(par){
			$.ajax({
				url:proses,
				type:'get',
				dataType:'json',
				data:'aksi=combo&menu=mkoordc&tabel=tb_peg',
				success:function(data){
					var optiony ='';
						$.each(data, function (id,item){
							if(par==item.nik)
								optiony+='<option value='+item.nik+' selected="selected">'+item.nama+'</option>';
							else
								optiony+='<option value='+item.nik+'>'+item.nama+'</option>';
							
						});
						$('#nikTB').html(optiony);
				}
			});
		}
		//end of combo
		
		loadData();
		//fungai loading mode "normal"
		function loadData(){
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			var dataString;
			var cari 	= $("input#objekTB").val();
			var combo 	= $("select#kategoriTB").val();
			
			if (combo == "nama"){
				dataString = 'nama='+ cari;
			}else if (combo == "lokasi"){
				dataString = 'lokasi='+ cari;
			}else if (combo == "id_alat"){
				dataString = 'id_alat='+ cari;
			}else if (combo == "kegunaan"){
				dataString = 'kegunaan='+ cari;
			}else if (combo == "merk"){
				dataString = 'merk='+ cari;
			}else if (combo == "thn_oper"){
				dataString = 'thn_oper='+ cari;
			}else if (combo == "jml"){
				dataString = 'jml='+ cari;
			}else if (combo == "kondisi"){
				dataString = 'kondisi='+ cari;
			}
			
			$.ajax({
				url	: proses+"?aksi=tampil&menu=malat",
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
			}else if (combo == "lokasi"){
				dataString = 'starting='+page+'&lokasi='+cari;//+'&random='+Math.random();
			}else if (combo == "id_alat"){
				dataString = 'starting='+page+'&id_alat='+cari;//+'&random='+Math.random();
			}else if (combo == "kegunaan"){
				dataString = 'starting='+page+'&kegunaan='+cari;//+'&random='+Math.random();
			}else if (combo == "merk"){
				dataString = 'starting='+page+'&merk='+cari;//+'&random='+Math.random();
			}else if (combo == "thn_oper"){
				dataString = 'starting='+page+'&thn_oper='+cari;//+'&random='+Math.random();
			}else if (combo == "jml"){
				dataString = 'starting='+page+'&jml='+cari;//+'&random='+Math.random();
			}else if (combo == "kondisi"){
				dataString = 'starting='+page+'&kondisi='+cari;//+'&random='+Math.random();
			}else{
				dataString = 'starting='+page;//+'&random='+Math.random();
			}
			
			$.ajax({
				url:proses+"?aksi=tampil&menu=malat",
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
		
		//cari lokasiTB 
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
			$("#namaTB").focus();
			$('#myModal').modal('show');
			$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
		
		});
		//end of tambah 
		
		//kosongkan fields
		function kosongkan(){
			$("#idform").val('');
			$("#id_alatTB").val('');
			$("#lokasiTB").val('');
			$("#kegunaanTB").val('');
			$("#merkTB").val('');
			$("#kondisiTB").val('');
			$("#thn_operTB").val('');
			$("#id_alatTB").prop({readonly:false});
		}
		//end of kosongkan fields
		
		//simpan(tambah & edit)
		$('#alatFR').submit(function() {
			var idformx = $("#idform").val();
			var urlx 	= $(this).attr('action');

			if(idformx==''){ //tmbah data
				urlx2 = "?aksi=tambah&menu=malat";
			}
			else{ //edit data
				urlx2 = "?aksi=ubah&menu=malat&idx="+idformx;
			}
			$('#hasily').html("loading ....");
			$.ajax({
				type: 'POST',
				dataType:'json',
				url: urlx + urlx2,
				data: $(this).serialize(),
				success: function(data) {
					var statusy 	= data.status;
					var id_alaty	= data.id_alat;
					var lokasiy 	= data.lokasi;
					var kegunaany	= data.kegunaan;
					var merky		= data.merk;
					var thn_opery	= data.thn_oper;
					var kondisiy	= data.kondisi;
					
					if(statusy=='sukses'){
						//add
						if(idformx==''){
							$('#myModal').modal('hide');
							var idy = data.id;
							//alert(idy);
							loadData();
							$("#alat_"+idy).css("background","green");
						}
						//edit
						else{
							$('#myModal').modal('hide');
							var idy = idformx;
							$("#alat_"+idy).css("background","blue");
							$("#loadtabel").html('update <br> alat : '+id_alaty).fadeIn(6000);
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
				url:proses+"?aksi=ambiledit&menu=malat",
				data:"idx="+idy,
				dataType:'json',
				type:"GET",
				success:function(data){
					$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
		
					var statusy		= data.status;
					var id_alaty	= data.id_alat;
					var lokasiy		= data.lokasi;
					var kegunaany	= data.kegunaan;
					var merky		= data.merk;
					var thn_opery	= data.thn_oper;
					var kondisiy	= data.kondisi;
					
					if(statusy=='sukses'){
						$("#idform").val(idy);
						$("#id_alatTB").val(id_alaty);
						$("#lokasiTB").val(lokasiy);
						$("#kegunaanTB").val(kegunaany);
						$("#merkTB").val(merky);
						$("#kondisiTB").val(kondisiy);
						$("#thn_operTB").val(thn_opery);
						$("#kondisiTB").val(kondisiy);
						
						$('#id_alatTB').prop({readonly:true});
						$("#simpanBC").html('Update');
						$('#myModal').modal('show');

					}else{
						alert('terjadi kesalahan pada database');
					}
				}
			});
			
		});	
		//end of action klik edit
		
		//action detail
		//$('i.gicon-eye-open').live("click",function() {	
		$('i.view').live("click",function() {	
			var idy 		= $(this).attr("idz");
			var id_alaty	= $(this).attr("id_alatz");
			var namay		= $(this).attr("namaz");
			var lokasiy		= $(this).attr("lokasiz");
			var kegunaany	= $(this).attr("kegunaanz");
			var merky		= $(this).attr("merkz");
			var thn_opery	= $(this).attr("thn_operz");
			
			$.ajax({
				type:"GET",
				dataType:'json',
				url:proses,
				data:"aksi=cetak&menu=malat&idx="+idy,//+"&namax="+namay+"&lokasix="+lokasiy,
				success:function(data){
					var alaty 	= data.nama;
					var lokasiy	= data.lokasi;
					var bodyy		='';
						bodyy		+='<div align=center><b>Detail alat (perusahaan)</b></div>';
						bodyy		+='<table align=center >';	
						bodyy		+='<tr><td>alat</td><td> :'+ alaty+'</td></tr>';
						bodyy		+='<tr><td>lokasi</td><td>: '+lokasiy+'</td></tr></table>';
					//$(this).target="_blank";
					//window.open($(this).prop('href'));
					//return false;//alert('hai'+data);
					var print = $('<div>', {
											id:   'cetakalat',
											html: bodyy,
											css:  {
												/*backgroundColor:'#fff',*/
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
		$('a.hapus').live("click",function() {	
			var idy 	= $(this).attr("idz");
			
			if(confirm("lanjutkan menghapus '"+idy+"' ?"))
				$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
		
				$.ajax({
						type: "GET",
						dataType:"json",
						url: proses+"?aksi=hapus&menu=malat",
						data:"idx=" + idy,
						cache: false,
						success: function(data){
							$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
		
							var statusy		= data.status;
							var idy 		= data.id;
								
							$("#alat_"+idy).css("background","yellow").fadeOut(2000);
							loadData();
							$("#loadtabel").html(idy+' terhapus').fadeIn(6000);
							//$("#list_"+nim).slideUp('slow', function() {$(this).remove();});
						}
				});
		});
		//end of action hapus 
		
		//hapus semua
		$('#hapusBC').click(function() {	
			if(confirm("lanjutkan menghapus semua alat  ?"))
				$.ajax({
						type: "GET",
						dataType:'json',
						url: proses,
						data:"aksi=hapussemua&menu=malat",
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