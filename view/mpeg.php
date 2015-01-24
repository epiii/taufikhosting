<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='mpeg'){
?>	

<link href="css/style-page.css" rel="stylesheet" />        

	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<a  type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/delete2.png" width="50"></a>
		<div class="modal-body">
			<div class="span7">
				<div class="box paintx color_25">
					<div class="title" id="titlex">
						<!--judul form-->
					</div>
            
            <!--<div class="content">-->
              <form class="form-horizontal cmxform" id="pegFR" method="get" action="proses/pmaster.php" autocomplete="off">
              	<input type="hidden" id="idform" />
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">NIK</label>
                  <div class="controls span7">
                    <input id="nikTB" name="nikTB" placeholder="NIK(wajib diisi)" maxlength="6" type="text" required class="span12"/>
					<span ><p id="nikinfo"></p></span>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">Nama</label>
                  <div class="controls span7">
                    <input id="namaTB" name="namaTB" placeholder="nama lengkap(wajib diisi)" type="text" required class="span12"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Alamat</label>
                  <div class="controls span7">
                    <input id="alamatTB" name="alamatTB" minlength="3" type="text" required placeholder="alamat"class="row-fluid"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Level</label>
                  <div class="controls span7">
                    <!--<input id="id_levelTB" name="id_levelTB" minlength="3" type="text" required placeholder="level" class="row-fluid"/>-->
                    <select id="id_levelTB" name="id_levelTB">
                    	<option value="admin">admin</option>
                    	<option value="user">user</option>
                    	<option value="public">public</option>
                    </select>
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid" id="userDV">
                  <!--<label class="control-label span3" for="hint-field">Username</label>
                  <div class="controls span7">
                    <input id="usernameTB" name="usernameTB" minlength="3" type="text" required placeholder="username (waib diisi)" class="row-fluid"/>
                  </div>-->
                </div>
                
				<div class="form-row control-group row-fluid" id="passDV">
                  <!--<label class="control-label span3" for="hint-field">Password</label>
                  <div class="controls span7">
                    <input id="passwordTB" name="passwordTB" minlength="3" type="password" required placeholder="password (wajib diisi)" class="row-fluid"/>
				  </div>-->
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
<script language="javascript" type="text/javascript" src="../js/plugins/avgrund.js"></script> 
	<div class="row-fluid">
        <div class="box color_25">
          <div class="title">
            <h4> <span>Data Master - Pegawai</span>
           </h4>&nbsp;
				<select id="kategoriTB">
					<option value="nik" >NIK</option>
					<option value="nama" selected="selected">nama</option>
					<option value="alamat">alamat</option>
					<?php if($_SESSION['leveluserMUX']=='admin'){?>
                        <option value="username">username</option>
					<?php } ?>
                    <option value="id_level">level</option>
				</select>
                &nbsp;
				<input type="text" id="objekTB" placeholder="pencarian">
                &nbsp;
					<?php if($_SESSION['leveluserMUX']=='admin'){?>
						<a data-toggle="modal" id="tambahBC" xhref="#myModal" class="btn " data-original-title=" Tambah Data " data-placement="top" rel="tooltip"><i class="icon-plus"></i></a>
						<button class="btn " id="hapusBC" data-original-title=" kosongkan " data-placement="top" rel="tooltip"><i class="icon-trash"></i></button>
					<?php }?>
						<a id="cetakBC"  data-original-title=" Cetak Semua " data-placement="top" rel="tooltip"class="btn " href="report/cmaster.php?tipe=full&tabelx=tb_peg&judulx=PEGAWAI" target="_blank"><i class="icon-print"></i></a>

                <span id="loadtabel"></span>
          </div>
          <!-- End .title -->
          <div class="content top">
            <table id="datatable_examplez" class="responsive table table-striped table-bordered" 
            	style="width:100%;margin-bottom:0; ">
                <thead>
                    <tr>
                        <th class="to_hide_phone  no_sort">no</th>
                        <th class="to_hide_phone ue no_sort">NIK</th>
                        <th class="to_hide_phone ue no_sort">Nama</th>
                        <th class="to_hide_phone ue no_sort">Alamat</th>
                        <?php if($_SESSION['leveluserMUX']=='admin'){?>
                        	<th class="to_hide_phone ue no_sort">Username</th>
						<?php } ?>
                        <th class="to_hide_phone ue no_sort">Level</th>
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
      
 
<script src="../js/jquery.js" type="text/javascript"> </script> 
<!--<script src="js/plugins/enquire.min.js" type="text/javascript"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/jquery.sparkline.min.js"></script> 
<script src="js/plugins/excanvas.compiled.js" type="text/javascript"></script> -->
<!--Modal Concept -->
<script language="javascript" type="text/javascript" src="../js/plugins/avgrund.js"></script> 
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
    //action klik edit
	var proses = 'proses/pmaster.php'; 
		function ambilData(tipey,idy){
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			$.ajax({
				url:proses+'?aksi=ambiledit&menu=mpeg',
				data:"idx="+idy,
				dataType:'json',
				type:"GET",
				success:function(data){
					var statusy		= data.status;
					var niky		= data.nik;
					var namay 		= data.nama;
					var alamaty		= data.alamat;
					var telpy		= data.telp;
					var usernamey	= data.username;
					var passwordy	= data.password;
					var id_levely	= data.id_level;
					var id_sessiony	= data.id_session;
					
					if(statusy=='sukses'){
						if(tipey=='edit'){
							kosongkan();
							$("#titlex").html('<h4><span align=center style="color:white;"><b>Edit Data</b></span><h4>');
				
							if(id_sessiony==''){ //(user/public) belum pernah login
								//alert(id_sessiony);
								$('#userDV').html('<label class="control-label span3" for="hint-field">Username</label>'
												  +'<div class="controls span7">'
													+'<input id="usernameTB" name="usernameTB" minlength="3" type="text" required placeholder="username (waib diisi)" class="row-fluid"/>'
												  +'</div>');
								$('#passDV').html('<label class="control-label span3" for="hint-field">Password</label>'
											  +'<div class="controls span7">'
												+'<input id="passwordTB" name="passwordTB" minlength="3" type="password" required placeholder="password (wajib diisi)" class="row-fluid"/>'
											  +'</div>').fadeIn();
							}else{ //(user/public) pernah login	
								//$('#usernameTB').val(usernamey).attr('readonly',true);
								$('#userDV').html('<label class="control-label span3" for="hint-field">Username</label>'
													+'<div class="controls span7">'
														+'<input type="hidden" name="usernameTB" value="'+usernamey+'" id="userenameTB">'
													+usernamey+'</div>');
								$('#passDV').html('<label class="control-label span3" for="hint-field"></label>'
											  +'<div class="controls span7">user telah aktif</div>');
							}
							
							$("#idform").val(idy);
							$("#nikTB").val(niky);
							$("#namaTB").val(namay);
							$("#alamatTB").val(alamaty);
							$("#telpTB").val(telpy);
							//$("#usernameTB").val(usernamey);
							//$("#passwordTB").val(passwordy);
							$("#id_levelTB").val(id_levely);
							
							//$('#nikTB').prop({disabled:true});
							$("#simpanBC").html('Update');
							$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
							$('#myModal').modal('show');
						}else{
							window.open("cpeg.php?tabelx=tb_peg&judulx=DATA PEGAWAI&id_peg="+idy);
						}
					}else{
						alert('terjadi kesalahan pada database');
					}
				}
			});
		}	
		//end of action klik edit

		//kosongkan fields
		function kosongkan(){
			$("#idform").val('');
			$("#nikTB").val('');
			$("#namaTB").val('');
			$("#alamatTB").val('');
			$("#telpTB").val('');
			$("#usernameTB").val('');
			$("#passwordTB").val('');
			$("#id_levelTB").val('');
		}
		//end of kosongkan fields
		
	//valid angka
	function cekNIK(nik){
		var digit = $('#nikTB').val().length;
		if( $('#nikTB').val() != $('#nikTB').val().replace(/[^0-9]/g, '')){ // cek hanya angka 
			$('#nikTB').val($('#nikTB').val().replace(/[^0-9]/g, ''));
			$('#nikinfo').html('<span class="label label-inverse">hanya angka</span>').fadeIn();
			setTimeout(function(){
				$('#nikinfo').html('');
			},3000);
		}else if(digit<6){ // cek 18 digit
			$('#nikinfo').html('<span class="label label-inverse">harus 6 digit</span>');
		}else{ //sudah 18 digit -> cek k db
			$.ajax({
				url:'proses/pmaster.php',
				type:'get',
				data:'aksi=cek&menu=mpeg&nik='+nik,
				dataType:'json',
				success:function(data){
					if(nik==''){
						$('#nikinfo').html('<span class="label label-inverse">harus diisi (hanya angka)</span>');
					}else if(data.status=='used'){
						$('#nikinfo').html('<span class="label label-inverse">"'+nik+'" telah digunakan</span>');
						$('#nikTB').val('');
						return false;
					}else{
						$('#nikinfo').html('<span class="label label-success"><i class="icon-ok"></i></span>');
					}
				}
			});
		}
	}
		
	$(document).ready(function(){
		$('#nikTB').on('keyup',function(){
			var nik = $(this).val();
			cekNIK(nik);
		});
		//action edit
		$('a.edit').live("click",function() {
			var idy 	= $(this).attr("idz");
			var tipey	= $(this).attr("tipez");
			ambilData(tipey,idy);
		});		
		
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
			else if (combo == "alamat"){
				dataString = 'alamat='+ cari;
			}
			else if (combo == "nik"){
				dataString = 'nik='+ cari;
			}
			else if (combo == "telp"){
				dataString = 'telp='+ cari;
			}
			else if (combo == "username"){
				dataString = 'username='+ cari;
			}
			else if (combo == "id_level"){
				dataString = 'id_level='+ cari;
			}
			
			$.ajax({
				url	: proses+"?aksi=tampil&menu=mpeg",
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
			else if (combo == "alamat"){
				dataString = 'starting='+page+'&alamat='+cari;//+'&random='+Math.random();
			}
			else if (combo == "nik"){
				dataString = 'starting='+page+'&nik='+cari;//+'&random='+Math.random();
			}
			else if (combo == "telp"){
				dataString = 'starting='+page+'&telp='+cari;//+'&random='+Math.random();
			}
			else if (combo == "username"){
				dataString = 'starting='+page+'&username='+cari;//+'&random='+Math.random();
			}
			else if (combo == "id_level"){
				dataString = 'starting='+page+'&id_level='+cari;//+'&random='+Math.random();
			}
			else{
				dataString = 'starting='+page;//+'&random='+Math.random();
			}
			
			$.ajax({
				url: proses+"?aksi=tampil&menu=mpeg",
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
			$("#namaTB").focus();
			$('#userDV').html('<label class="control-label span3" for="hint-field">Username</label>'
							  +'<div class="controls span7">'
								+'<input id="usernameTB" name="usernameTB" minlength="3" type="text" required placeholder="username (waib diisi)" class="row-fluid"/>'
							  +'</div>');
			$('#passDV').html('<label class="control-label span3" for="hint-field">Password</label>'
						  +'<div class="controls span7">'
							+'<input id="passwordTB" name="passwordTB" minlength="3" type="password" required placeholder="password (wajib diisi)" class="row-fluid"/>'
						  +'</div>').fadeIn();

			$('#myModal').modal('show');
			$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
		});
		//end of tambah 
		
		
		//simpan(tambah & edit)
		$('#pegFR').submit(function() {
			var idformx = $("#idform").val();
			var urlx 	= $(this).attr('action');

			if(idformx==''){ //tmbah data
				urlx2 = "?aksi=tambah&menu=mpeg";
			}
			else{ //edit data
				urlx2 = "?aksi=ubah&menu=mpeg&idx="+idformx;
			}
			$('#hasily').html("loading ....");
			$.ajax({
				type: 'POST',
				dataType:'json',
				url: urlx + urlx2,
				data: $(this).serialize(),
				success: function(data) {
					var statusy = data.status;
					var niky	= data.nik;
					var namay 	= data.nama;
					var alamaty = data.alamat;
					var usernamey= data.username;
					var passwordy= data.password;
					var id_levely= data.id_level;
					
					if(statusy=='sukses'){
						//add
						if(idformx==''){
							$('#myModal').modal('hide');
							var idy = data.id;
							//alert(idy);
							loadData();
							$("#peg_"+idy).css("background","green");
						}
						//edit
						else{
							$('#myModal').modal('hide');
							var idy = idformx;
							$("#peg_"+idy).css("background","blue");
							$("#loadtabel").html('update <br> peg : "'+namay+'" <br> alamat : '+alamaty).fadeIn(6000);
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
		
		//action hapus 
		$('a.hapus').live("click",function() {	
			var idy = $(this).attr("idz");
			var namay= $(this).attr("namaz");
			 
			if(confirm("lanjutkan menghapus '"+namay+"' ?")){
				$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
				$.ajax({
						type: "GET",
						dataType:"json",
						url: proses+"?aksi=hapus&menu=mpeg",
						data:"idx=" + idy,
						cache: false,
						success: function(data){
		
							var statusy		= data.status;
							var namay 		= data.nama;
							if(statusy=='gagal'){	
								$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
								alert('tidak dapat dihapus, data terkait dengan data yang lain');
							}else{
								$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
								$("#peg_"+idy).css("background","yellow").fadeOut(2000);
								loadData();
								$("#loadtabel").html(namay+'" terhapus').fadeIn(6000);
							}
						}
				});
			}else{
				$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
			}
		});
		//end of action hapus 
		
		//hapus semua
		$('#hapusBC').click(function() {	
			if(confirm("lanjutkan menghapus semua peg  ?"))
				$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
		
				$.ajax({
						type: "GET",
						dataType:'json',
						url: proses,
						data:"aksi=hapussemua&menu=mpeg",
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
		
		//cetak semua
		$('#cetakBCx').click(function(){
			$.ajax({
				type:'post',
				url:'lib/tespddf.php',
				//data :'tabelx=tb_peg&idx=id_pegkerja',
				data :'tabelx=tb_peg',
				success:function(data){
					//opener = $('<div>').append(print);
					//window.open('data:text/html;charset=utf-8,' + opener.html(data));
					
					}
				});
			})
		//end of cetak semua
		
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