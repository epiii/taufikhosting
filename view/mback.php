<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='mback'){
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
              <form class="form-horizontal cmxform" id="backFR" method="get" action="proses/pmaster.php" autocomplete="off">
              	<input type="hidden" id="idform" />
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">Perangkat(Merk)</label>
                  <div class="controls span7">
                    <select id="merkTB" name="merkTB"required >
                    	
                    </select>
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">kode</label>
                  <div class="controls span7">
                    <input id="kodeTB" name="kodeTB" placeholder="kode backbone(tanpa spasi)" type="text" 
                    required class="span12"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">keterangan </label>
                  <div class="controls span7">
                    <input id="keteranganTB" name="keteranganTB" minlength="3" type="text"  placeholder="keterangan "class="row-fluid"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">sistra</label>
                  <div class="controls span7">
                    <select id="id_sistraTB" name="id_sistraTB" class="row-fluid" required/>
					
					</select>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">2mbps</label>
                  <div class="controls span7">
                    <input id="avail2mbpsTB" name="avail2mbpsTB"  type="text" placeholder="2 mbps"class="row-fluid"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">stm1</label>
                  <div class="controls span7">
                    <input id="availstm1TB" name="availstm1TB"  type="text" placeholder="stm1"class="row-fluid"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">stm4</label>
                  <div class="controls span7">
                    <input id="availstm4TB" name="availstm4TB"  type="text" placeholder="stm4 "class="row-fluid"/>
                      </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">stm16</label>
                  <div class="controls span7">
                    <input id="availstm16TB" name="availstm16TB"  type="text" placeholder="stm16 "class="row-fluid"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">stm64</label>
                  <div class="controls span7">
                    <input id="availstm64TB" name="availstm64TB"  type="text" placeholder="stm64/Lamda"class="row-fluid"/>
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
        <div class="box color_25">
          <div class="title">
            <h4> <span>Data Master - Backbone</span>
           </h4>&nbsp;
				<select id="kategoriTB">
					<option value="kode" selected="selected">kode</option>
					<option value="keterangan">keterangan</option>
				</select>
                &nbsp;
				<input type="text" id="objekTB" placeholder="pencarian">
                &nbsp;
                <?php if($_SESSION['leveluserMUX']=='admin'){?>
						<a id="tambahBC" class="btn " data-original-title=" Tambah Data " data-placement="top" rel="tooltip"><i class="icon-plus"></i></a>
						<button class="btn " id="hapusBC" data-original-title=" kosongkan " data-placement="top" rel="tooltip"><i class="icon-trash"></i></button>
					<?php }?>
						<a id="cetakBC"  data-original-title=" Cetak Semua " data-placement="top" rel="tooltip"class="btn " href="report/cmaster.php?tipe=full&tabelx=tb_backbone&judulx=back" target="_blank"><i class="icon-print"></i></a>
                <span id="loadtabel"></span>
          </div>
          <!-- End .title -->
          <div class="content top">
            <table id="datatable_examplez" class="responsive table table-striped table-bordered" 
            	style="width:100%;margin-bottom:0; ">
                <thead>
                    <tr>
                        <th class="to_hide_phone  no_sort">no</th>
                        <th class="to_hide_phone ue no_sort">Backbone</th>
                      	<th class="to_hide_phone ue no_sort">Keterangan</th>
                      	<th class="to_hide_phone ue no_sort">Sistra</th>
                        <th class="to_hide_phone ue no_sort">2mbps</th>
                        <th class="to_hide_phone ue no_sort">stm1</th>
                        <th class="to_hide_phone ue no_sort">stm4</th>
                        <th class="to_hide_phone ue no_sort">stm16</th>
                        <th class="to_hide_phone ue no_sort">stm64</th>
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
    $('#kodeTB').keypress(function(e){
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

	function comboper(idback,merk,idsis){
		//alert(idback+','+merk+','+idsis);
		//return false;
		$.ajax({
			url:proses,
			type:'get',
			dataType:'json',
			data:'aksi=combo&menu=mback&tabel=tb_perangkat',
			success:function(data){
				//if()
				var optionm ='';
				$.each(data, function (id,item){
					//if(idback>0){//edit
						if(merk==item.merk)
							{optionm+='<option value="'+item.merk+'" selected="selected">'+item.merk+'</option>';}
						else
							{optionm+='<option value="'+item.merk+'">'+item.merk+'</option>';}
					//}else{//add
						//optionm+='<option value="'+item.merk+'">'+item.merk+'</option>';
					//}
				});
				$('#merkTB').html(optionm);
				combosis(idsis);
				//console.log('merk:'+optionm);
				//return false;
				//return false;
				///$('#myModal').modal('show');
			}
		}); 
	}
	
	function combosis(idsis){
		//alert(idsis);
		//return false;
		
		$.ajax({
			url:proses,
			type:'get',
			dataType:'json',
			data:'aksi=combo&menu=mback&tabel=tb_sistra',
			success:function(data){
				//if()
				var options='';
				$.each(data, function (id,item){
					//if(idsis>0){ //edit
						if(idsis==item.id_sistra)
							options+='<option value="'+item.id_sistra+'" selected="selected">'+item.sistra+'</option>';
						else
							options+='<option value="'+item.id_sistra+'">'+item.sistra+'</option>';
					//}else{ // add
						//options+='<option value='+item.id_sistra+'>'+item.sistra+'</option>';
					//}
				});
				//console.log('sis :'+options);
				//return false;
				$('#id_sistraTB').html(options);
				$('#myModal').modal('show');
			}
		}); 
	}
	
	$(document).ready(function() 
	{	
		loadData();
		//fungai loading mode "normal"
		function loadData(){
			//$('#loadtabel').html('<img src="img/ajax-loaderz.gif">').fadeIn();
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			var dataString;
			var cari 	= $("input#objekTB").val();
			var combo 	= $("select#kategoriTB").val();
			
			if (combo == "kode"){
				dataString = 'kode='+ cari;
			}
			else if (combo == "keterangan"){
				dataString = 'keterangan='+ cari;
			}
			
			$.ajax({
				url	: proses+"?aksi=tampil&menu=mback",
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
			
			if (combo == "kode"){
				dataString = 'starting='+page+'&kode='+cari;//+'&random='+Math.random();
			}
			else if (combo == "keterangan"){
				dataString = 'starting='+page+'&keterangan='+cari;//+'&random='+Math.random();
			}
			else{
				dataString = 'starting='+page;//+'&random='+Math.random();
			}
			
			$.ajax({
				url: proses+"?aksi=tampil&menu=mback",
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
		
		//cari keteranganTB 
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
			$("#titlex").html('<h4><span align=center><b>tambah data</b></span><h4>');
			kosongkan();
			comboper(0,'',0); //idback,merk,idsis
			$("#simpanBC").html('Simpan');
			$("#kodeTB").focus();
		});
		//end of tambah 
		
		//kosongkan fields
		function kosongkan(){
			$("#idform").val('');
			$("#kodeTB").val('');
			$("#avail2mbpsTB").val('');
			$("#availstm1TB").val('');
			$("#availstm4TB").val('');
			$("#availstm16TB").val('');
			$("#availstm64TB").val('');
			$("#keteranganTB").val('');
		}
		//end of kosongkan fields
		
		//simpan(tambah & edit)
		$('#backFR').submit(function() {
			var idformx = $("#idform").val();
			var urlx 	= $(this).attr('action');

			if(idformx==''){ //tmbah data
				urlx2 = "?aksi=tambah&menu=mback";
			}
			else{ //edit data
				urlx2 = "?aksi=ubah&menu=mback&idx="+idformx;
			}
			$('#hasily').html("loading ....");
			$.ajax({
				type: 'POST',
				dataType:'json',
				url: urlx + urlx2,
				data: $(this).serialize(),
				success: function(data) {
					var statusy 	= data.status;
					var kodey 		= data.kode;
					var keterangany = data.keterangan;
					if(statusy=='sukses'){
						//add
						if(idformx==''){
							$('#myModal').modal('hide');
							var idy = data.id;
							//alert(idy);
							loadData();
							$("#back_"+idy).css("background","green");
						}
						//edit
						else{
							$('#myModal').modal('hide');
							var idy = idformx;
							$("#back_"+idy).css("background","blue");
							$("#loadtabel").html('backbone dengan kode : "'+kodey+'" berhasil diubah').fadeIn(6000);
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
				url: proses+"?aksi=ambiledit&menu=mback",
				data:"idx="+idy,
				dataType:'json',
				type:"GET",
				success:function(data){
					$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
					var statusy		= data.status;
					var keterangany	= data.keterangan;
					var avail2mbpsy	= data.avail2mbps;
					var availstm1y	= data.availstm1;
					var availstm4y	= data.availstm4;
					var availstm16y	= data.availstm16;
					var availstm64y	= data.availstm64;
					var keterangany	= data.keterangan;
					var id_sistray	= data.id_sistra;
					var merky		= data.merk;
					var kodey 		= data.kode;
					
					//alert(id_sistray);
					if(statusy=='sukses'){
						$("#idform").val(idy);
						$("#kodeTB").val(kodey);
						$("#avail2mbpsTB").val(avail2mbpsy);
						$("#availstm1TB").val(availstm1y);
						$("#availstm4TB").val(availstm4y);
						$("#availstm16TB").val(availstm16y);
						$("#availstm64TB").val(availstm64y);
						$("#keteranganTB").val(keterangany);
						$("#simpanBC").html('Update');
						comboper(idy,merky,id_sistray); //idback,merk,idsis
						//$('#myModal').modal('show');
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
			var kodey= $(this).attr("namaz");
			 
			if(confirm("lanjutkan menghapus '"+kodey+"' ?"))
				$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
				$.ajax({
						type: "GET",
						dataType:"json",
						url: proses+"?aksi=hapus&menu=mback",
						data:"idx=" + idy,
						cache: false,
						success: function(data){
							$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
							var statusy		= data.status;
							var keterangany	= data.keterangan;
							var kodey 		= data.kode;
								
							$("#back_"+idy).css("background","yellow").fadeOut(2000);
							loadData();
							$("#loadtabel").html('back : "'+kodey+'", keterangan : '+keterangany+' terhapus').fadeIn(6000);
							//$("#list_"+nim).slideUp('slow', function() {$(this).remove();});
						}
				});
		});
		//end of action hapus 
		
		//hapus semua
		$('#hapusBC').click(function() {	
			if(confirm("lanjutkan menghapus semua back  ?"))
				$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
				$.ajax({
						type: "GET",
						dataType:'json',
						url: proses,
						data:"aksi=hapussemua&menu=mback",
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