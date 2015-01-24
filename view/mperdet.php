<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='mperdet'){
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
              <form class="form-horizontal cmxform" id="perdetFR" method="get" action="proses/pmaster.php" autocomplete="off">
              	<input type="hidden" id="idform" />
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">ID Perangkat</label>
                  <div class="controls span7">
                  	<select id="id_perTB" required name="id_perTB">
                    	<option value=""></option>
                    </select>		
                    <!--<input id="id_perTB" name="id_perTB" placeholder="id perangkat" type="text" required class="span12"/>-->
                  </div>
                </div>
				
				<div class="form-row control-group row-fluid">
                  <label class="control-label span3">Backbone</label>
                  <div class="controls span7">
                  	<select id="id_backboneTB" name="id_backboneTB" required>
                    	<option value="">silahkan pilih perangkat(merk) ...</option>
                    </select>		
                    <!--<input id="id_perTB" name="id_perTB" placeholder="id perangkat" type="text" required class="span12"/>-->
                  </div>
                </div>
				
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">DDF A</label>
                  <div class="controls span7">
                    <input id="ddf_aTB" name="ddf_aTB" placeholder="DDF A(wajib diisi)" type="text" required class="span12"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">DDF B</label>
                  <div class="controls span7">
                    <input id="ddf_bTB" name="ddf_bTB" minlength="3" type="text" required placeholder="DDF B(wajib diisi)"class="row-fluid"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Channel A</label>
                  <div class="controls span7">
                    <input id="channelidaTB" name="channelidaTB" minlength="3" type="text" required placeholder="channel B" class="row-fluid"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Channel B</label>
                  <div class="controls span7">
                    <input id="channelidbTB" name="channelidbTB" minlength="3" type="text" required placeholder="channel B" class="row-fluid"/>
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
        <div class="box color_25 ">
          <div class="title">
            <h4> <span>Data Master - Detail Perangkat</span>
           </h4>&nbsp;
				<select id="kategoriTB">
					<option value="id_per" selected="selected">ID perangkat</option>
					<option value="ddf_a">DDF A</option>
					<option value="ddf_b">DDF B</option>
					<option value="channelida">channel A</option>
					<option value="channelidb">channel B</option>
				</select>
                &nbsp;
				<input type="text" id="objekTB" placeholder="pencarian">
                &nbsp;
                 <?php if($_SESSION['leveluserMUX']=='admin'){?>
						<a id="tambahBC"  class="btn " data-original-title=" Tambah Data " data-placement="top" rel="tooltip"><i class="icon-plus"></i></a>
						<button class="btn " id="hapusBC" data-original-title=" kosongkan " data-placement="top" rel="tooltip"><i class="icon-trash"></i></button>
					<?php }?>
						<a id="cetakBC"  data-original-title=" Cetak Semua " data-placement="top" rel="tooltip"class="btn " href="report/cmaster.php?tipe=full&tabelx=tb_perangkat&judulx=PERANGKAT" target="_blank"><i class="icon-print"></i></a>
                         <a id="cetakBC"  data-original-title=" Perangkat" data-placement="top" rel="tooltip"class="btn" href="?hlm=bXBlcg=="><i class="icon-arrow-left"></i></a>
                <span id="loadtabel"></span>
          </div>
          <!-- End .title -->
          <div class="content top">
            <table id="datatable_examplez" class="responsive table table-striped table-bordered" 
            	style="width:100%;margin-bottom:0; ">
                <thead>
                    <tr>
                        <th class="to_hide_phone  no_sort">ID Perangkat</th>
                        <th class="to_hide_phone ue no_sort">Backbone</th>
                        <th class="to_hide_phone ue no_sort">DDF A</th>
                        <th class="to_hide_phone ue no_sort">DDF B</th>
                        <th class="to_hide_phone ue no_sort">Channel A</th>
                        <th class="to_hide_phone ue no_sort">Channel B</th>
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
	var proses ='proses/pmaster.php';
	
	function comboid(idper,idback){
		//console.log(idper+'-'+idback);
		//return false;
		
		$.ajax({
			url:proses,
			type:'get',
			dataType:'json',
			cache:false,
			data:'aksi=combo&menu=mperdetc&tabel=tb_perangkat_detail',
			success:function(data){
				$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
				var optiony ='';
				$.each(data, function (id,item){
					if(idper==item.id_per){
						optiony+='<option value='+item.id_per+'|'+item.merk+' selected="selected">'+item.id_per+' || '+item.merk+' </option>';
					}else{
						optiony+='<option value='+item.id_per+'|'+item.merk+'>'+item.id_per+' || '+item.merk+' </option>';
					}
				});
				$('#id_perTB').html('<option value="">silahkan pilih perangkat</optionn>'+optiony);
				//var merk = $(this).val();
				//comboback(idper,idback);
				comboback(idback);
				console.log(optiony);
				//$("#titlex").html(titlex);
				//$("#simpanBC").html('Simpan');
			}
		}); 
	}	
	function comboback(idbackx){
	//function comboback(merkx,idbackx){
		//console.log(merkx+':'+idbackx);
		//return false;
		if(idbackx==0){ //pd kosong
			titlex	= '<h4><span align=center><b>tambah data</b></span><h4>';
		}else{ //pd ada
			titlex	= '<h4><span align=center><b>edit data</b></span><h4>';
		}
		
		var merkx = $('#id_perTB').val();
		
		var merk = merkx.substr(merkx.indexOf('|')+1); 
		
		$.ajax({
			url:proses,
			type:'get',
			dataType:'json',
			cache:false,
			data:'aksi=combo&menu=mperdetc&tabel=tb_backbone&merk='+merk,
			success:function(data){
				$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
				var optiony ='';
				$.each(data, function (id,item){
					if(idbackx==item.id_backbone){
						optiony+='<option value="'+item.id_backbone+'" selected="selected">'+item.kode+' </option>';
					}else{
						optiony+='<option value="'+item.id_backbone+'" >'+item.kode+' </option>';
					}
				});
				console.log(optiony);
				$('#id_backboneTB').html('<option value="">silahkan pilih backbone</option>'+optiony);
				$('#titlex').html(titlex);
				$('#myModal').modal('show');
			}
		}); 
	}	

    $(document).ready(function()
	{	
		$('#id_perTB').change(function(){
			//comboback($(this).val(),0);
			comboback(0);
		});
		loadData();
		//fungai loading mode "normal"
		function loadData(){
			//$('#loadtabel').html('<img src="img/ajax-loaderz.gif">').fadeIn();
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			var dataString;
			var cari 	= $("input#objekTB").val();
			var combo 	= $("select#kategoriTB").val();
			
			if (combo == "id_per"){
				dataString = 'id_per='+ cari;
			}
			else if (combo == "ddf_a"){
				dataString = 'ddf_a='+ cari;
			}
			else if (combo == "ddf_b"){
				dataString = 'ddf_b='+ cari;
			}
			else if (combo == "channelida"){
				dataString = 'channelida='+ cari;
			}
			else if (combo == "channelidb"){
				dataString = 'channelidb='+ cari;
			}
			
			$.ajax({	
				url	: proses+"?aksi=tampil&menu=mperdet",
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
			
			if (combo == "id_per"){
				dataString = 'starting='+page+'&id_per='+cari;//+'&random='+Math.random();
			}
			else if (combo == "ddf_a"){
				dataString = 'starting='+page+'&ddf_a='+cari;//+'&random='+Math.random();
			}
			else if (combo == "ddf_b"){
				dataString = 'starting='+page+'&ddf_b='+cari;//+'&random='+Math.random();
			}
			else if (combo == "channelida"){
				dataString = 'starting='+page+'&channelida='+cari;//+'&random='+Math.random();
			}
			else if (combo == "channelidb"){
				dataString = 'starting='+page+'&channelidb='+cari;//+'&random='+Math.random();
			}
			else{
				dataString = 'starting='+page;//+'&random='+Math.random();
			}
			
			$.ajax({
				url:proses+"?aksi=tampil&menu=mperdet",
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
			comboid(0,0);
			/*$.ajax({
				url:proses,
				data:'aksi=cek&menu=mperdet',
				dataType:'json',
				success:function(data){
					if(data.status=='no_perangkat'){ //g ada perangkat
						alert('maaf perangkat kosong, tambahkan : [MASTER DATA -> PERANGKAT]');
						$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
						//alert('cek-p_kosong');
					}else{ //ada perangkat
						if(data.status=='no_per_detail'){ // g ada perangkat detail
							//alert('cek-pd_kosong');
							//alert('no per detail');//alert('maaf perangkat penuh, silahkan tambahkan ( MASTER DATA -> Perangkat ) atau hapus data "perangkat detail"  ');
							kosongkan();
							comboid('no_pd');
						}else{ //ada perngkat detail 
							//alert('cek-pd_ada');
							kosongkan();
							comboid(0);
						}
					}
				}
			});*/
		});
		//end of tambah 
		
		//kosongkan fields
		function kosongkan(){
			$("#idform").val('');
			$("#id_backboneTB").val('');
			$("#id_perTB").val('');
			$("#ddf_aTB").val('');
			$("#ddf_bTB").val('');
			$("#channelidaTB").val('');
			$("#channelidbTB").val('');
			$("#thn_noperTB").val('');
		}
		//end of kosongkan fields
		
		//simpan(tambah & edit)
		$('#perdetFR').submit(function() {
			var idformx = $("#idform").val();
			var urlx 	= $(this).attr('action');

			if(idformx==''){ //tmbah data
				urlx2 = "?aksi=tambah&menu=mperdet";
			}
			else{ //edit data
				urlx2 = "?aksi=ubah&menu=mperdet&idx="+idformx;
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
					var id_pery		= data.id_per;
					var ddf_ay		= data.ddf_a;
					var ddf_by		= data.ddf_b;
					var channeliday	= data.channelida;
					var channelidby	= data.channelidb;
					
					if(statusy=='sukses'){
						//add
						if(idformx==''){
							$('#myModal').modal('hide');
							var idy = data.id;
							//alert(idy);
							$("#perdet_"+idy).css("background","green");
							loadData();
						}
						//edit
						else{
							$('#myModal').modal('hide');
							var idy = idformx;
							$("#perdet_"+idy).css("background","blue");
							$("#loadtabel").html('perangkat : "'+id_pery+' berhasil di update').fadeIn(6000);
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
				data:'aksi=combo&menu=mperdetc&tabel=tb_perangkat',
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
				url:proses+"?aksi=ambiledit&menu=mperdet",
				data:"idx="+idy,
				dataType:'json',
				cache:false,
				type:"GET",
				success:function(data){
					var statusy		= data.status;
					var id_pery		= data.id_per;
					var ddf_ay		= data.ddf_a;
					var ddf_by		= data.ddf_b;
					var channeliday	= data.channelida;
					var channelidby	= data.channelidb;
					var id_backboney= data.id_backbone;
					
					if(statusy=='sukses'){
						$("#idform").val(idy);
						$("#ddf_aTB").val(ddf_ay);
						$("#ddf_bTB").val(ddf_by);
						$("#channelidaTB").val(channeliday);
						$("#channelidbTB").val(channeliday);
						comboid(id_pery,id_backboney);
						$("#titlex").html('<h4><span align=center><b>edit data</b></span><h4>');
						$("#simpanBC").html('Update');
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
			 
			if(confirm("lanjutkan menghapus data ?"))
				$.ajax({
						type: "GET",
						dataType:"json",
						url: proses+"?aksi=hapus&menu=mperdet",
						data:"idx=" + idy,
						cache: false,
						success: function(data){
							var statusy		= data.status;
							var nama_pery	= data.nama_per;
								
							$("#perdet_"+idy).css("background","yellow").fadeOut(2000);
							loadData();
							$("#loadtabel").html('berhasil terhapus').fadeIn(6000);
						}
				});
		});
		//end of action hapus 
		
		//hapus semua
		$('#hapusBC').click(function() {	
			if(confirm("lanjutkan menghapus semua perangkat detail?"))
				$.ajax({
						type: "GET",
						dataType:'json',
						url: proses,
						data:"aksi=hapussemua&menu=mperdet",
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