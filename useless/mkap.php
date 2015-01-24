<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='mkap'){
?>	
<body onLoad="comboback()">
<link href="css/style-page.css" rel="stylesheet" />        
<a data-toggle="modal" id="tambahBC" href="#myModal" class="btn btn-info btn-large">Tambah Data</a>
<a id="cetakBC" class="btn btn-info btn-large" href="cmaster.php?tipe=full&tabelx=tb_kapasitas&judulx=alat" target="_blank">Cetak Semua</a>
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
                    <form class="form-horizontal cmxform" id="kapFR" method="get" action="pmaster.php" autocomplete="off">
                        <input type="hidden" id="idform" />
                    <div class="form-row control-group row-fluid">
                      <label class="control-label span3">Backbone</label>
                      <div class="controls span7">
                        <select id="id_backboneTB" name="id_backboneTB">
                            <option value=""></option>
                        </select>
                      </div>
                    </div>
                    <div class="form-row control-group row-fluid">
                      <label class="control-label span3">id kapasitas</label>
                      <div class="controls span7">
                        <input id="id_kapTB" name="id_kapTB" placeholder="id kapasitas (wajib diisi)" type="text" required class="span12"/>
                      </div>
                    </div>
                    <div class="form-row control-group row-fluid">
                      <label class="control-label span3">2mbps</label>
                      <div class="controls span7">
                        <input id="avail2mbpsTB" name="avail2mbpsTB" placeholder="2mbps (wajib diisi)" type="text" required class="span12"/>
                      </div>
                    </div>
                    <div class="form-row control-group row-fluid">
                      <label class="control-label span3" for="hint-field">STM 1</label>
                      <div class="controls span7">
                        <input id="availstm1TB" name="availstm1TB" minlength="3" type="text" required placeholder="stm1"class="row-fluid"/>
                      </div>
                    </div>
                    <div class="form-row control-group row-fluid">
                      <label class="control-label span3" for="hint-field">STM 2</label>
                      <div class="controls span7">
                        <input id="availstm4TB" name="availstm4TB" minlength="3" type="text" required placeholder="kegunaan"class="row-fluid"/>
                      </div>
                    </div>
                    <div class="form-row control-group row-fluid">
                      <label class="control-label span3" for="hint-field">STM 64(Lambda)</label>
                      <div class="controls span7">
                        <input id="availstm64TB" name="availstm64TB" minlength="3" type="text" required placeholder="merk (wajib diisi)" class="row-fluid"/>
                      </div>
                    </div>
                    <!--<div class="form-row control-group row-fluid">
                      <label class="control-label span3" for="hint-field">Jumlah</label>
                      <div class="controls span7">
                        <input id="jmlTB" name="jmlTB" minlength="3" type="text" required placeholder="jumlah" class="row-fluid"/>
                      </div>
                    </div>-->
                    
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
        <div class="box ">
          <div class="title">
          	<h4> <span>Data Master - kapasitas</span>
           	</h4>&nbsp;
				backbone : 
                <select id="id_backboneSB" name="id_backboneSB">
                    <?php
						/*include 'lib/koneksi.php';
						$sql	= 'select * from tb_backbone order by id_backbone asc';
                    	//var_dump($sql);exit();
						$kue	= mysql_query($sql);
                    	while($res = mysql_fetch_assoc($kue)){
							echo "<option value='$res[id_backbone]'>$res[kode]</option>";
						}*/
					?>
                    <!--<option value="1">satu</option>
                    <option value="2">dua</option>
                    <option value="3">tiga</option>-->
                </select>
                <span id="loadtabel"></span>
          </div>
          <!-- End .title -->
          <div class="content top">
            <table id="datatable_examplez" class="responsive table table-striped table-bordered" 
            	style="width:100%;margin-bottom:0; ">
                <thead>
                    <tr>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="id_kapSB" placeholder="cari ID " ></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="avail2mbpsSB" placeholder="cari 2mbps" ></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="availstm1SB" placeholder="cari stm1" ></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="availstm4SB" placeholder="cari stm4" ></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="availstm64SB" placeholder="cari stm64" ></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="tglSB" placeholder="tanggal" ></th>
                        <th class="to_hide_phone ue no_sort"></th>
                    </tr>
					<tr>
                        <th class="to_hide_phone ue no_sort">ID per</th>
                        <th class="to_hide_phone ue no_sort">2 MBPS</th>
                        <th class="to_hide_phone ue no_sort">STM 1</th>
                        <th class="to_hide_phone ue no_sort">STM 4</th>
                        <th class="to_hide_phone ue no_sort">STM 64</th>
                        <th class="to_hide_phone ue no_sort">tanggal</th>
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
    function comboback(){
		$.ajax({
			url:'pmaster.php',
			type:'get',
			dataType:'json',
			data:'aksi=combo&menu=mkapc&tabel=tb_backbone',
			success:function(data){
				var optiony ='';
				$.each(data, function (id,item){
					optiony+='<option value='+item.id_backbone+'>'+item.kode+'</option>';
				});
				$('#id_backboneSB').html(optiony);
				//backb = $('#id_backboneSB').find("option:selected").val();
				//alert(backb);
			}
		}); 
	}function comboback2(){
		$.ajax({
			url:'pmaster.php',
			type:'get',
			dataType:'json',
			data:'aksi=combo&menu=mkapc&tabel=tb_backbone',
			success:function(data){
				var optiony ='';
				$.each(data, function (id,item){
					optiony+='<option value='+item.id_backbone+'>'+item.kode+'</option>';
				});
				$('#id_backboneTB').html(optiony);
			}
		}); 
	}
	$(document).ready(function() 
	{	
		//combo
		//var backb;
		//var arr = new Array;
		//comboback();
		
		//end of combo
		
		//function editinplace(){
			//$('#kapx_').();
			/*$('tr.kapx_').live("dblclick",function() {
				var x = $(this).attr('ok');
				alert(x);
				//this.append('<input type=text >');
				this.append('<button>ok</button>');
			});*/	

		//}
		
		//var backb = $('#id_backboneSB').val();
		//var backb = $('#id_backboneSB : selected').val();
		///var backb = $('select#id_backboneSB option:selected').val();
		//$("#frm1 :input[name='kota']").val(terpilih);
		
		//loadData(1);
		loadData();
		//fungai loading mode "normal"
		//function loadData(backbx){
		function loadData(){
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			
			var backb	= $('#id_backboneSB').val();
			var id_kap	= $('#id_kapSB').val();
			var _2mbps	= $('#avail2mbpsSB').val();
			var stm1	= $('#availstm1SB').val();
			var stm4 	= $('#availstm4SB').val();
			var stm64	= $('#availstm64SB').val();
				
			var dataString ='';
				dataString 	+= 'id_backbonex='+backb
							+'&id_kapx='+id_kap
							+'&avail2mbpsx='+_2mbps
							+'&availstm1x='+stm1
							+'&availstm4x='+stm4
							+'&availstm64x='+stm64;
			$.ajax({
				url	: "pmaster.php?aksi=tampil&menu=mkap",
				type: "GET",
				data: dataString,
				success:function(data){
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
			//var cari = $("input#objekTB").val();
			//var combo = $("select#kategoriTB").val();
			
			/*if (combo == "nama"){
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
			}*/
			
			var backb	= $('#id_backboneSB').val();
			var id_kap	= $('#id_kapSB').val();
			var _2mbps	= $('#avail2mbpsSB').val();
			var stm1	= $('#availstm1SB').val();
			var stm4 	= $('#availstm4SB').val();
			var stm64	= $('#availstm64SB').val();
			
			//var dataString = 'starting='+page+'&id_backbonex='+backb+'&avail2mbpsx='+_2mbps+'&availstm1x='+stm1+'&availstm4x='+stm4+'&availstm64x='+stm64;
			
			var dataString ='';
				dataString 	+='starting='+page
							+'id_kapx='+id_kap
							+'id_backbonex='+backb
							+'&avail2mbpsx='+_2mbps
							+'&availstm1x='+stm1
							+'&availstm4x='+stm4
							+'&availstm64x='+stm64;
			
			$.ajax({
				url:"pmaster.php?aksi=tampil&menu=mkap",
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
		//var back
		$('#id_backboneSB').change(function(){
			loadData();
		});
		
		$('#id_kapSB').keyup(function(){
			loadData();
		});
		$('#avail2mbpsSB').keyup(function(){
			loadData();
		});
		$('#availstm1SB').keyup(function(){
			loadData();
		});
		$('#availstm4SB').keyup(function(){
			loadData();
		});
		$('#availstm64SB').keyup(function(){
			loadData();
		});
		//cari availstm1TB 
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
			kosongkan();
			comboback2();
			$("#titlex").html('<h4><span align=center><b>tambah data</b></span><h4>');
			$("#simpanBC").html('Simpan');
			$("#avail2mbpsTB").focus();
		});
		//end of tambah 
		
		//kosongkan fields
		function kosongkan(){
			$("#idform").val('');
			$("#id_alatTB").val('');
			$("#avail2mbpsTB").val('');
			$("#availstm1TB").val('');
			$("#availstm4TB").val('');
			$("#availstm64TB").val('');
			$("#jmlTB").val('');
			$("#kondisiTB").val('');
			$("#thn_operTB").val('');
		}
		//end of kosongkan fields
		
		//simpan(tambah & edit)
		$('#kapFR').submit(function() {
			var idformx = $("#idform").val();
			var urlx 	= $(this).attr('action');

			if(idformx==''){ //tmbah data
				urlx2 = "?aksi=tambah&menu=mkap";
			}else{ //edit data
				urlx2 = "?aksi=ubah&menu=mkap&idx="+idformx;
			}
			$('#hasily').html("loading ....");
			$.ajax({
				type: 'POST',
				dataType:'json',
				url: urlx + urlx2,
				data: $(this).serialize(),
				success: function(data) {
					var statusy 	= data.status;
					var id_kapy		= data.id_kap;
					var avail2mbpsy	= data.avail2mbps;
					var availstm1y	= data.availstm1;
					var availstm4y	= data.availstm4;
					var availstm64y	= data.availstm64;
					var tgly		= data.tgl;
					
					if(statusy=='sukses'){
						//add
						if(idformx==''){
							$('#myModal').modal('hide');
							var idy = data.id;
							//alert(idy);
							loadData();
							$("#kap_"+idy).css("background","green");
						}
						//edit
						else{
							$('#myModal').modal('hide');
							var idy = idformx;
							$("#kap_"+idy).css("background","blue");
							$("#loadtabel").html('update <br> alat : "'+namay+'" <br> lokasi : '+lokasiy).fadeIn(6000);
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
		//$('i.gicon-edit').live("click",function() {	
		/*$('i.edit').live("click",function() {	
			kosongkan();
			$("#titlex").html('<h4><span align=center><b>Edit Data</b></span><h4>');
			var idy = $(this).attr("idz");
			//alert(idy);
			
			$.ajax({
				url:"pmaster.php?aksi=ambiledit&menu=mkap",
				data:"idx="+idy,
				dataType:'json',
				type:"GET",
				success:function(data){
					var statusy		= data.status;
					var id_alaty	= data.id_alat;
					var namay 		= data.nama;
					var lokasiy		= data.lokasi;
					var kegunaany	= data.kegunaan;
					var merky		= data.merk;
					var jmly		= data.jml;
					var thn_opery	= data.thn_oper;
					var kondisiy	= data.kondisi;
					
					if(statusy=='sukses'){
						$("#idform").val(idy);
						$("#id_alatTB").val(id_alaty);
						$("#avail2mbpsTB").val(namay);
						$("#availstm1TB").val(lokasiy);
						$("#availstm4TB").val(kegunaany);
						$("#availstm64TB").val(merky);
						$("#kondisiTB").val(kondisiy);
						$("#thn_operTB").val(thn_opery);
						$("#jmlTB").val(jmly);
						$("#kondisiTB").val(kondisiy);
						
						//$('#id_alatTB').prop({disabled:true});
						$("#simpanBC").html('Update');
						$('#myModal').modal('show');

					}else{
						alert('terjadi kesalahan pada database');
					}
				}
			});
			
		});	
		*/
		$('i.edit').live("click",function() {	
			//kosongkan();
			//$("#titlex").html('<h4><span align=center><b>Edit Data</b></span><h4>');
			var idy = $(this).attr("idz");
			//alert(idy);
			
			$.ajax({
				//url:"pmaster.php?aksi=ambiledit&menu=mkap",
				url:"pmaster.php?aksi=tambah&menu=mkapczx",
				data:"idx="+idy,
				dataType:'json',
				type:"GET",
				success:function(data){
					var statusy		= data.status;
					var id_alaty	= data.id_alat;
					var namay 		= data.nama;
					var lokasiy		= data.lokasi;
					var kegunaany	= data.kegunaan;
					var merky		= data.merk;
					var jmly		= data.jml;
					var thn_opery	= data.thn_oper;
					var kondisiy	= data.kondisi;
					
					if(statusy=='sukses'){
						$("#idform").val(idy);
						$("#id_alatTB").val(id_alaty);
						$("#avail2mbpsTB").val(namay);
						$("#availstm1TB").val(lokasiy);
						$("#availstm4TB").val(kegunaany);
						$("#availstm64TB").val(merky);
						$("#kondisiTB").val(kondisiy);
						$("#thn_operTB").val(thn_opery);
						$("#jmlTB").val(jmly);
						$("#kondisiTB").val(kondisiy);
						
						//$('#id_alatTB').prop({disabled:true});
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
				url:"pmaster.php",
				data:"aksi=cetak&menu=mkap&idx="+idy,//+"&namax="+namay+"&lokasix="+lokasiy,
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
		//$('i.gicon-remove').live("click",function() {	
		$('i.hapus').live("click",function() {	
			var idy 	= $(this).attr("idz");
			var namay	= $(this).attr("namaz");
			 
			if(confirm("lanjutkan menghapus '"+namay+"' ?"))
				$.ajax({
						type: "GET",
						dataType:"json",
						url: "pmaster.php?aksi=hapus&menu=mkap",
						data:"idx=" + idy,
						cache: false,
						success: function(data){
							var statusy		= data.status;
							var namay 		= data.nama;
								
							$("#kap_"+idy).css("background","red").fadeOut(2000);
							loadData();
							$("#loadtabel").html(namay+' terhapus').fadeIn(6000);
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
						url: "pmaster.php",
						data:"aksi=hapussemua&menu=mkap",
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
		
		//cetak semua
		$('#cetakBCx').click(function(){
			$.ajax({
				type:'post',
				url:'lib/tespddf.php',
				//data :'tabelx=tb_kapasitas&idx=id_alatkerja',
				data :'tabelx=tb_kapasitas',
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
				data: "tabelx=tb_kapasitas",
				//data: "tabelx=tb_kapasitas&ancur="+md5,
				contentType: "application/pdf; charset=utf-8",
				success: function(data)
				{
					alert(data);
				}
			});
		});
	});
</script>
</body>
<?php
		}else{
			header("location:index.php");
		}
	}else{
		header("location:index.php");
	}
?>