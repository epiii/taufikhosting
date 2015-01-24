<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='smenu'){
?>	
    <link href="css/style-page.css" rel="stylesheet" />        
    <a data-toggle="modal" id="tambahBC" class="btn btn-info btn-large">Tambah Data</a>
    <a id="cetakBC" class="btn btn-info btn-large" href="pcetak.php?tabelx=tb_menu&judulx=Menu " target="_blank">Cetak Semua</a>
    <button class="btn btn-warning" id="hapusBC">Kosongkan</button>
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <a  type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/delete2.png" width="50"></a>
        <div class="modal-body">
            <div class="span7">
                <div class="box paint color_2">
                    <div class="title" id="titlex"></div>
                        <form class="form-horizontal cmxform" id="levelFR" method="get" action="pseting.php" autocomplete="off">
                            <input type="hidden" id="idform" />
                            <div class="form-row control-group row-fluid">
                                <label class="control-label span3">menu </label>
                                <div class="controls span7">
                                    <input id="nama_menuTB" name="nama_menuTB" placeholder="nama menu (wajib diisi)" type="text" required class="span12"/>
                                </div>
                            </div>

                            <div class="form-row control-group row-fluid">
                                <label class="control-label span3">link</label>
                                <div class="controls span7">
                                    <input id="linkTB" name="linkTB" placeholder="link (wajib diisi)" type="text" required class="span12"/>
                                </div>
                            </div>
                            <div class="form-row control-group row-fluid">
                                <label class="control-label span3">sub</label>
                                <div class="controls span7">
                                    <select  id="subTB"name="subTB" required>
                                    	<option value=""></option>
                                    </select>
                                </div>
                            </div>
        
                            <div id="hasily" style="visibility:hidden;">Loading...</div>
                            <div class="form-actions row-fluid">
                                <div class="span7 offset3">
                                    <button type="submit" class="btn btn-secondary" id="simpanBC">simpan</button>
                                </div>
                            </div>
                            
                        </form>
                	</div>
            	</div>
        	</div>
    	</div>

	<div class="row-fluid">
        <div class="box ">
          <div class="title">
            <h4> <span>Data Setting - Menu  </span>
           </h4>
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
                        <th class="to_hide_phone ue no_sort">menu</th>
                      	<th class="to_hide_phone ue no_sort">link</th>
                      	<th class="to_hide_phone ue no_sort">sub dari</th>
                      
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
<script language="javascript" type="text/javascript" src="js/plugins/avgrund.js"></script> 
<script type="text/javascript" language="javascript" src="js/plugins/datatables/js/jquery.dataTables.js"></script> 
<!-- Custom made scripts for this template --> 
<script type="text/javascript">
    $(document).ready(function(){	
		function combosub(){
			$.ajax({
				url:'pseting.php',
				data:'aksi=combo&menu=smenus&tabel=tb_menu',
				dataType:'json',
				success:function(data){
					var optiony ='';
						$.each(data, function(id,item){
							optiony+='<option value='+item.id_menu+'>'+item.nama_menu+'</option>';
						});
						$('#subTB').html('<option value=>pilih menu</option>'+optiony);
					//$('#myModal').modal('show');
				}
			});
		}
		loadData();
		function loadData(){
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			var dataString;
			var cari 	= $("input#objekTB").val();
				dataString = 'nama_menu='+ cari;
			$.ajax({
				url	: "pseting.php?aksi=tampil&menu=smenu",
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
			var dataString = 'starting='+page+'&nama_menu='+cari;//+'&random='+Math.random();
			
			$.ajax({
				url:"pseting.php?aksi=tampil&menu=smenu",
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
		
		//cari objekTB
		$("#objekTB").keyup(function(){
			var cari = $("input#objekTB").val();
			if (cari.replace(/\s/g,"") != ""){ // mengecek field text kosong atau tidak)
				loadData();
			}else{
			  loadData();
			}
			return false;	
		});
		
		function kosongkan(){
			$('#nama_menuTB').val('').focus();
			$('#linkTB').val('');
			$('#subTB').val('');
		}
		//klik tambah 
		$("#tambahBC").click(function(){
			kosongkan();
			combosub();
			$("#titlex").html('<h4><span align=center><b>tambah data</b></span><h4>');
			$("#idform").val('');
			$("#simpanBC").html('Simpan');
			$('#myModal').modal('show');
		});
		//end of tambah 
		
		//simpan(tambah & edit)
		$('#levelFR').submit(function() {
			var idformx = $("#idform").val();
			var urlx = $(this).attr('action');

			if(idformx==''){ //tmbah data
				urlx2 = "?aksi=tambah&menu=smenu";
			}else{ //edit data
				urlx2 = "?aksi=ubah&menu=smenu&idx="+idformx;
			}
			$('#hasily').show();
			$.ajax({
				type: 'POST',
				dataType:'json',
				url: urlx + urlx2,
				data: $(this).serialize(),
				success: function(data){
					var statusy = data.status;
					var nama_menuy = data.nama_menu;
					if(statusy=='sukses'){
						if(idformx==''){
							$('#hasily').hide();
							kosongkan();
							$('#myModal').modal('hide');
							var idy = data.id;
							loadData();
							$("#level_"+idy).css("background","green");
						}else{
							$('#hasily').hide();
							kosongkan();
							$('#myModal').modal('hide');
							$("#idform").val('');
							var idy = idformx;
							$("#level_"+idy).css("background","blue");
							$("#loadtabel").html('update <br> level: "'+nama_menuy).fadeIn(6000);
							loadData();
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
			//kosongkan();
			combosub();
			$("#titlex").html(' <h4><span align=center><b>Edit Data</b></span><h4>');
			var idy = $(this).attr("idz");
			$.ajax({
				url:"pseting.php?aksi=ambiledit&menu=smenu",
				data: "idx="+idy,
				dataType:'json',
				type:"GET",
				success:function(data){
					var statusy=data.status;
					var nama_menuy=data.nama_menu;
					var linky=data.linkx;
					var suby=data.subx;
					if(statusy=='sukses'){
						$("#idform").val(idy);
						$("#nama_menuTB").val(nama_menuy);
						$("#linkTB").val(linky);
						$("#subTB").val(suby);
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
		$('i.gicon-eye-open').live("click",function() {	
			var idy = $(this).attr("idz");
			var nama_menuy= $(this).attr("namaz");
			var keterangany= $(this).attr("keteranganz");
			
			$.ajax({
				type:"GET",
				dataType:'json',
				url:"pseting.php",
				data:"aksi=cetak&menu=smenu&idx="+idy,//+"&namax="+nama_menuy+"&keteranganx="+keterangany,
				success:function(data){
					var nama_menuy	= data.nama_menu;
					var bodyy		='';
						bodyy		+='<div align=center><b>Menu </b></div>';
						bodyy		+='<table align=center >';	
						bodyy		+='<tr><td>Menu </td><td> : '+ nama_menuy+'</td></tr></table>';
					var print = $('<div>', {
											id:   'cetaklevel',
											html: bodyy,
											css:  {
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
		$('i.gicon-remove').live("click",function() {	
			var idy = $(this).attr("idz");
			 
			if(confirm("lanjutkan menghapus '"+idy+"' ?"))
				$.ajax({
						type: "GET",
						dataType:"json",
						url: "pseting.php?aksi=hapus&menu=smenu",
						data:"idx=" + idy,
						cache: false,
						success: function(data){
							var statusy		= data.status;
							var nama_menuy = data.nama_menu;
								
							$("#level_"+idy).css("background","red").fadeOut(2000);
							loadData();
							$("#loadtabel").html('level : "'+nama_menuy+'", terhapus').fadeIn(6000);
						}
				});
		});
		//end of action hapus 
		
		//hapus semua
		$('#hapusBC').click(function() {	
			if(confirm("lanjutkan menghapus semua level  ?"))
				$.ajax({
						type: "GET",
						dataType:'json',
						url: "pseting.php",
						data:"aksi=hapussemua&menu=smenu",
						success: function(data){
							if(data.status=='sukses'){
								loadData();}
							else{
								alert('terjadi kesalahan pada proses database');}
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