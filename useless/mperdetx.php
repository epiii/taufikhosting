<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='mperdet'){
?>	

<link href="css/style-page.css" rel="stylesheet" />        
<!--<button class="btn btn-warning" id="hapusBC">Kosongkan</button>
	<button class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
        <ul class="dropdown-menu">	
            <li><a href="#">Hapus Antrian</a></li>
            <li><a href="#">Cetak Antrian</a></li>
        </ul>-->
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<a  type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/delete2.png" width="50"></a>
		<div class="modal-body">
			<div class="span7">
				<div class="box paint color_25">
					<div class="title" id="titlex">
						<!--judul form-->
                    </div>
            
            <!--<div class="content">-->
              <form class="form-horizontal cmxform" id="perdetFR" method="get" action="pmaster.php" autocomplete="off">
              	<input type="hidden" id="idform" />
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">ID Perangkat</label>
                  <div class="controls span7">
                  	<select id="id_perTB" name="id_perTB">
                    	<option value=""></option>
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
                 <?php if($_SESSION['leveluser']=='admin'){?>
						<a id="tambahBC"  class="btn " data-original-title=" Tambah Data " data-placement="top" rel="tooltip"><i class="icon-plus"></i></a>
						<button class="btn " id="hapusBC" data-original-title=" kosongkan " data-placement="top" rel="tooltip"><i class="icon-trash"></i></button>
				
                	<?php }?>
						<a id="cetakBC"  data-original-title=" Cetak Semua " data-placement="top" rel="tooltip"class="btn " href="cmaster.php?tipe=full&tabelx=tb_perangkat&judulx=per" target="_blank"><i class="icon-print"></i></a>
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
	function comboid(par){
	//alert('taek');
		$.ajax({
			url:'pmaster.php',
			type:'get',
			dataType:'json',
			data:'aksi=combo&menu=mperdetc&tabel=tb_perangkat_detail&par='+par,
			success:function(data){
				var optiony ='';
				$.each(data, function (id,item){
					if(par==item.id_per){
						optiony+='<option value='+item.id_per+' selected="selected">'+item.id_perid+' || '+item.merk+' </option>';
					}else{
						optiony+='<option value='+item.id_per+' >'+item.id_per+' || '+item.merk+' </option>';
					}
				});
				$('#id_perTB').html(optiony);
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
				url	: "pmaster.php?aksi=tampil&menu=mperdet",
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
				url:"pmaster.php?aksi=tampil&menu=mperdet",
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
			alert('pecah');
			$.ajax({
				url:'pmaster.php',
				data:'aksi=cek&menu=mperdet',
				dataType:'json',
				success:function(data){
					if(data.status=='gagal'){
						alert('maaf perangkat penuh, silahkan tambahkan ( MASTER DATA -> Perangkat ) atau hapus data "perangkat detail"  ');
					}else{
						kosongkan();
						comboid(0);
						$("#titlex").html('<h4><span align=center><b>tambah data</b></span><h4>');
						$("#simpanBC").html('Simpan');
						$('#myModal').modal('show');
					}
				}
			});
		});
		//end of tambah 
		
		//kosongkan fields
		function kosongkan(){
			$("#idform").val('');
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
							loadData();
							$("#perdet_"+idy).css("background","green");
						}
						//edit
						else{
							$('#myModal').modal('hide');
							var idy = idformx;
							$("#perdet_"+idy).css("background","blue");
							$("#loadtabel").html('update <br> perangkat : "'+id_pery+' terhapus').fadeIn(6000);
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
				url:'pmaster.php',
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
		$('i.edit').live("click",function() {	
			kosongkan();
			$("#titlex").html('<h4><span align=center><b>Edit Data</b></span><h4>');
			var idy = $(this).attr("idz");
			
			$.ajax({
				url:"pmaster.php?aksi=ambiledit&menu=mperdet",
				data:"idx="+idy,
				dataType:'json',
				type:"GET",
				success:function(data){
					var statusy		= data.status;
					var id_pery		= data.id_per;
					var ddf_ay		= data.ddf_a;
					var ddf_by		= data.ddf_b;
					var channeliday	= data.channelida;
					var channelidby	= data.channelidb;
					
					if(statusy=='sukses'){
						$("#idform").val(idy);
						$("#id_perTB").val(id_pery);
						$("#ddf_aTB").val(ddf_ay);
						$("#ddf_bTB").val(ddf_by);
						$("#channelidaTB").val(channeliday);
						$("#channelidbTB").val(channeliday);
						
						//$('#nikTB').prop({disabled:true});
						//comboid(id_pery);
						comboid(idy);
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
			var nama_pery	= $(this).attr("namaz");
			var alamaty	= $(this).attr("alamatz");
			var telpy	= $(this).attr("telpz");
			var usernamey= $(this).attr("usernamez");
			var id_levely= $(this).attr("id_levelz");
			
			$.ajax({
				type:"GET",
				dataType:'json',
				url:"pmaster.php",
				data:"aksi=cetak&menu=mperdet&idx="+idy,//+"&namax="+namay+"&alamatx="+alamaty,
				success:function(data){
					var pegy 	= data.nama;
					var alamaty	= data.alamat;
					var bodyy		='';
						bodyy		+='<div align=center><b>Detail peg (perusahaan)</b></div>';
						bodyy		+='<table align=center >';	
						bodyy		+='<tr><td>peg</td><td> :'+ pegy+'</td></tr>';
						bodyy		+='<tr><td>alamat</td><td>: '+alamaty+'</td></tr></table>';
					//$(this).target="_blank";
					//window.open($(this).prop('href'));
					//return false;//alert('hai'+data);
					var print = $('<div>', {
											id:   'cetakpeg',
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
			var idy = $(this).attr("idz");
			//var namay= $(this).attr("namaz");
			 
			if(confirm("lanjutkan menghapus '"+idy+"' ?"))
				$.ajax({
						type: "GET",
						dataType:"json",
						url: "pmaster.php?aksi=hapus&menu=mperdet",
						data:"idx=" + idy,
						cache: false,
						success: function(data){
							var statusy		= data.status;
							var nama_pery	= data.nama_per;
								
							$("#perdet_"+idy).css("background","red").fadeOut(2000);
							loadData();
							$("#loadtabel").html('perangkat detail , id: "'+idy+' terhapus').fadeIn(6000);
							//$("#list_"+nim).slideUp('slow', function() {$(this).remove();});
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
						url: "pmaster.php",
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
		
		//cetak semua
		$('#cetakBCx').click(function(){
			$.ajax({
				type:'post',
				url:'lib/tespddf.php',
				//data :'tabelx=tb_perangkat&idx=id_pegkerja',
				data :'tabelx=tb_perangkat',
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
				data: "tabelx=tb_perangkat",
				//data: "tabelx=tb_perangkat&ancur="+md5,
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