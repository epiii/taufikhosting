<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='mloker'){
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
              <form class="form-horizontal cmxform" id="lokerFR" method="get" action="proses/pmaster.php" autocomplete="off">
              	<input type="hidden" id="idform" />
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">loker </label>
                  <div class="controls span7">
                    <input id="lokerTB" name="lokerTB" placeholder="nama lokasi kerja" type="text" required class="span12"/>
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
            <h4> <span>Data Master - Lokasi Kerja </span>
           </h4>&nbsp;
				<input type="text" id="objekTB" placeholder="pencarian">
                &nbsp;
                 <?php if($_SESSION['leveluserMUX']=='admin'){?>
						<a id="tambahBC" class="btn " data-original-title=" Tambah Data " data-placement="top" rel="tooltip"><i class="icon-plus"></i></a>
						<button class="btn " id="hapusBC" data-original-title=" kosongkan " data-placement="top" rel="tooltip"><i class="icon-trash"></i></button>
					<?php }?>
						<a id="cetakBC"  data-original-title=" Cetak Semua " data-placement="top" rel="tooltip"class="btn " href="report/cmaster.php?tipe=full&tabelx=tb_loker&judulx=loker" target="_blank"><i class="icon-print"></i></a>
                <span id="loadtabel"></span>
          </div>
          <!-- End .title -->
          <div class="content top">
            <table id="datatable_examplez" class="responsive table table-striped table-bordered" 
            	style="width:100%;margin-bottom:0; ">
                <thead>
                    <tr>
                        <th class="to_hide_phone  no_sort">No</th>
                        <th class="to_hide_phone ue no_sort">Lokasi Kerja</th>
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
    $(document).ready(function(){	
		loadData();
		//fungai loading mode "normal"
		function loadData(){
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			var cari 	= $("input#objekTB").val();
			var dataString = 'loker='+ cari;
						
			$.ajax({
				url	: proses+"?aksi=tampil&menu=mloker",
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
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			var cari = $("input#objekTB").val();
			var	dataString = 'starting='+page+'&loker='+cari;//+'&random='+Math.random();
			
			$.ajax({
				url: proses+"?aksi=tampil&menu=mloker",
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
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			$("#titlex").html('<h4><span align=center><b>tambah data</b></span><h4>');
			$("#idform").val('');
			$("#lokerTB").val('');
			$("#simpanBC").html('Simpan');
			$("#lokerTB").focus();
			$('#myModal').modal('show');
			$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
		});
		//end of tambah 
		
		//kosongkan fields
		function kosongkan(){
			$("#idform").val('');
			$("#lokerTB").val('');
			}
		//end of kosongkan fields
		
		//simpan(tambah & edit)
		$('#lokerFR').submit(function() {
			var idformx = $("#idform").val();
			var urlx 	= $(this).attr('action');

			if(idformx==''){ //tmbah data
				urlx2 = "?aksi=tambah&menu=mloker";
			}else{ //edit data
				urlx2 = "?aksi=ubah&menu=mloker&idx="+idformx;
			}
			$('#hasily').html("loading ....");
			$.ajax({
				type: 'POST',
				dataType:'json',
				url: urlx + urlx2,
				data: $(this).serialize(),
				success: function(data) {
					var statusy = data.status;
					var lokery 	= data.loker;
					if(statusy=='sukses'){
						//add
						if(idformx==''){
							$('#myModal').modal('hide');
							var idy = data.id;
							loadData();
							$("#loker_"+idy).css("background","green");
						}
						//edit
						else{
							$('#myModal').modal('hide');
							var idy = idformx;
							$("#loker_"+idy).css("background","blue");
							$("#loadtabel").html('update <br> loker : "'+lokery).fadeIn(6000);
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
		//$('i.edit').live("click",function() {	
			$('a.edit').live("click",function() {
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			kosongkan();
			$("#titlex").html('<h4><span align=center><b>Edit Data</b></span><h4>');
			var idy = $(this).attr("idz");
			//alert(idy);
			
			$.ajax({
				url: proses+"?aksi=ambiledit&menu=mloker",
				data:"idx="+idy,
				dataType:'json',
				type:"GET",
				success:function(data){
					$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
					var statusy		= data.status;
					var lokery 		= data.loker;
					if(statusy=='sukses'){
						$("#idform").val(idy);
						$("#lokerTB").val(lokery);
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
		//end of action detail
		
		//action hapus 
		//$('i.gicon-remove').live("click",function() {	
		//$('i.hapus').live("click",function() {	
			$('a.hapus').live("click",function() {
			var idy = $(this).attr("idz");
			var lokery= $(this).attr("namaz");
			 
			if(confirm("lanjutkan menghapus '"+lokery+"' ?"))
						$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
				$.ajax({
						type: "GET",
						dataType:"json",
						url: proses+"?aksi=hapus&menu=mloker",
						data:"idx=" + idy,
						cache: false,
						success: function(data){
							$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
							var statusy		= data.status;
							var lokery 		= data.loker;
								
							$("#loker_"+idy).css("background","yellow").fadeOut(2000);
							loadData();
							$("#loadtabel").html('loker : "'+lokery+' terhapus').fadeIn(6000);
							//$("#list_"+nim).slideUp('slow', function() {$(this).remove();});
						}
				});
		});
		//end of action hapus 
		
		//hapus semua
		$('#hapusBC').click(function() {	
			if(confirm("lanjutkan menghapus semua lokasi kerja  ?"))
				$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
				$.ajax({
						type: "GET",
						dataType:'json',
						url: proses,
						data:"aksi=hapussemua&menu=mloker",
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