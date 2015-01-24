<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='tggn'){
?>	
<link href="css/style-page.css" rel="stylesheet" />        
	<link href="css/bootstrap-combined.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" media="screen"href="css/bootstrap-datetimepicker.min.css">
	<script src="js/jquery.js" type="text/javascript"> </script> 
	<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>

	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<a  type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/delete2.png" width="50"></a>
		<div class="modal-body">
			<div class="span7">
				<div class="box paint color_14">
					<div class="title" id="titlex">
						<!--judul form-->
                    </div>
            
            <!--<div class="content">-->
              <form class="form-horizontal cmxform" id="ggnFR" method="get" action="ptransaksi.php" autocomplete="off">
              	<input type="hidden" id="idform" />
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">Sistra</label>
                  <div class="controls span7">
                    <input id="sistraTB" name="sistraTB" placeholder="sistra (wajib diisi)" type="text" required class="span12"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">Link</label>
                  <div class="controls span7">
                    <input id="linkxTB" name="linkxTB" placeholder="link (wajib diisi)" type="text" required class="span12"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Lokasi</label>
                  <div class="controls span7">
                    <input id="lokasiTB" name="lokasiTB" minlength="3" type="text" required placeholder="lokasi"class="row-fluid"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Uraian</label>
                  <div class="controls span7">
                    <input id="uraianTB" name="uraianTB" minlength="3" type="text" required placeholder="uraian"class="row-fluid"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">tgl</label>
                  <div class="controls span7">
                    <input id="tglTB" name="tglTB" minlength="3" type="text" required placeholder="tanggal (wajib diisi)" class="row-fluid"/>
                  </div>
                </div>

				<div id="jmATB" class="input-append date >
					<label class="control-label span3" for="hint-field">Jam A</label>
					<div class="controls span7">
						<input type="text" data-format="hh:mm" id="jmATB"></input>
						<span class="add-on">
							<i data-time-icon="icon-time" data-date-icon="icon-calendar" ></i>
						</span>
					</div>
				</div>

				<div id="jmBTB" class="input-append date >
					<label class="control-label span3" for="hint-field">Jam B</label>
					<input type="text" data-format="hh:mm" id="jmATB"></input>
					<span class="add-on">
						<i data-time-icon="icon-time" data-date-icon="icon-calendar" ></i>
					</span>
				</div>

                <!--<div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">jam A</label>
                  <div class="controls span7">
                    <input id="jmATB" name="jmATB" minlength="3" type="text" required placeholder="hh:mm" class="row-fluid"/>
                  </div>
                </div>
				
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">jam B</label>
                  <div class="controls span7">
                    <input id="jmBTB" name="jmBTB" minlength="3" type="text" required placeholder="jam B" class="row-fluid"/>
                  </div>
                </div>
				-->
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Pet</label>
                  <div class="controls span7">
                    <input id="petTB" name="petTB" minlength="3" type="text" required placeholder="pet" class="row-fluid"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Solver</label>
                  <div class="controls span7">
                    <select id="id_koordinasiTB" name="id_koordinasiTB">
                    	<option value=""></option>
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
        <div class="box color_14">
          <div class="title">
            <h4><span>Data - Gangguan Pelanggan</span></h4>&nbsp;
				<select id="kategoriTB">
					<option value="sistra">sistra</option>
					<option value="link">link</option>
					<option value="lokasi">lokasi</option>
					<option value="uraian">uraian</option>
					<option value="tgl">tanggal</option>
					<option value="jmA">jam A</option>
					<option value="jmB">jam B</option>
					<option value="pet">pet</option>
					<option value="pet">pet</option>
				</select>
                &nbsp;
				<input type="text" id="objekTB" placeholder="pencarian">
                &nbsp;
                 <?php if($_SESSION['leveluser']=='admin'){?>
						<a id="tambahBC" class="btn " data-original-title=" Tambah Data " data-placement="top" rel="tooltip"><i class="icon-plus"></i></a>
						<button class="btn " id="hapusBC" data-original-title=" kosongkan " data-placement="top" rel="tooltip"><i class="icon-trash"></i></button>
				<?php }elseif($_SESSION['leveluser']=='user'){ ?>
					<a id="tambahBC" class="btn btn-info btn-large">Tambah Data</a>
<?php } ?>
					<a id="cetakBC"  data-original-title=" Cetak Semua " data-placement="top" rel="tooltip"class="btn " href="cmaster.php?tipe=full&tabelx=tb_ggn&judulx=gangguan pelanggan" target="_blank"><i class="icon-print"></i></a>
                <span id="loadtabel"></span>
          </div>
          <!-- End .title -->
          <div class="content top">
            <table id="datatable_examplez" class="responsive table table-striped table-bordered" 
            	style="width:100%;margin-bottom:0; ">
                <thead>
                    <tr>
                        <th class="to_hide_phone  no_sort">Sistra</th>
                      	<th class="to_hide_phone ue no_sort">Link</th>
                        <th class="to_hide_phone ue no_sort">Lokasi</th>
                        <th class="to_hide_phone ue no_sort">Uraian</th>
                        <th class="to_hide_phone ue no_sort">Tanggal</th>
                        <th class="to_hide_phone ue no_sort">Jam A</th>
                        <th class="to_hide_phone ue no_sort">Jam B</th>
                        <th class="to_hide_phone ue no_sort">Pet</th>
                        <th class="to_hide_phone ue no_sort">Solver</th>
                       	<?php if($_SESSION['leveluser']=='admin' or $_SESSION['leveluser']=='user' ){?> 
                       		<th class="ms no_sort ">Aksi</th>
                    	<?php } ?>
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
      
 
<script language="javascript" type="text/javascript" src="js/plugins/avgrund.js"></script> 
<!-- Data tables plugin --> 
<script type="text/javascript" language="javascript" src="js/plugins/datatables/js/jquery.dataTables.js"></script> 
<!-- Custom made scripts for this template --> 
<script type="text/javascript">
   	///combokoord(0);
	function combokoord(par){
		$.ajax({
			url:'ptransaksi.php',
			type:'get',
			dataType:'json',
			data:'aksi=combo&menu=tggnc&tabel=tb_koordinasi&par='+par,
			success:function(data){
				var optiony ='';
				$.each(data, function (id,item){
					if(par==item.id_koordinasi){
						optiony+='<option value='+item.id_koordinasi+' selected="selected">'+item.nama+' ( lokasi : :'+item.loker+') </option>';
					}else{
						optiony+='<option value='+item.id_koordinasi+' >'+item.nama+' ( lokasi : '+item.loker+' ) </option>';
					}
				});
				$('#id_koordinasiTB').html(optiony);
			}
		}); 
	}	

	$('#jmATB').datetimepicker({
		maskInput: true,  
		pickDate: false,            // disables the date picker
		pickTime: true,            // disables de time picker
		pick12HourFormat: false,   // enables the 12-hour format time picker
		pickSeconds: false         // disables seconds in the time picker
		//startDate: -Infinity,      // set a minimum date
		//endDate: Infinity//format: 'dd/MM/yyyy hh:mm:ss',
		//format: 'dd/MM/yyyy hh:mm:ss',
		//language: 'pt-BR'
	});
	$('#jmBTB').datetimepicker({
		maskInput: true,  
		pickDate: false,            // disables the date picker
		pickTime: true,            // disables de time picker
		pick12HourFormat: false,   // enables the 12-hour format time picker
		pickSeconds: false         // disables seconds in the time picker
		//startDate: -Infinity,      // set a minimum date
		//endDate: Infinity//format: 'dd/MM/yyyy hh:mm:ss',
		//format: 'dd/MM/yyyy hh:mm:ss',
		//language: 'pt-BR'
	});

	$(document).ready(function() 
	{	
		$('#tglTB').datepicker({
          //format: 'mm-dd-yyyy'
        //  format: 'yyyy-mm-dd'
        });
		/*var timeTxt = $("#jmATB").setMask('time');
		var placeholder = timeTxt.attr('placeholder');

		timeTxt.val(placeholder).focus(function(){
			if(this.value === placeholder){
				this.value = '';
			}
		}).blur(function(){
			if(!this.value){
				this.value = placeholder;
			}

		});*/

		/*$('#jmATB').timepicker({
			minuteStep: 5,
			showInputs: false,
			disableFocus: true
		});*/
        
		//combo
		function combothn(par){
			$.ajax({
				url:'pmaster.php',
				type:'get',
				dataType:'json',
				data:'aksi=combo&menu=mkoordc&tabel=tb_ggn',
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
			//$('#loadtabel').html('<img src="img/ajax-loaderz.gif">').fadeIn();
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			var dataString;
			var cari 	= $("input#objekTB").val();
			var combo 	= $("select#kategoriTB").val();
			
			if (combo == "sistra"){
				dataString = 'sistra='+ cari;
			}else if (combo == "link"){
				dataString = 'link='+ cari;
			}else if (combo == "lokasi"){
				dataString = 'lokasi='+ cari;
			}else if (combo == "uraian"){
				dataString = 'uraian='+ cari;
			}else if (combo == "tgl"){
				dataString = 'tgl='+ cari;
			}else if (combo == "jmA"){
				dataString = 'jmA='+ cari;
			}else if (combo == "jmB"){
				dataString = 'jmB='+ cari;
			}else if (combo == "pet"){
				dataString = 'pet='+ cari;
			}
			
			$.ajax({
				url	: "ptransaksi.php?aksi=tampil&menu=tggn",
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
			
			if (combo == "sistra"){
				dataString = 'starting='+page+'&sistra='+cari;//+'&random='+Math.random();
			}else if (combo == "link"){
				dataString = 'starting='+page+'&link='+cari;//+'&random='+Math.random();
			}else if (combo == "lokasi"){
				dataString = 'starting='+page+'&lokasi='+cari;//+'&random='+Math.random();
			}else if (combo == "uraian"){
				dataString = 'starting='+page+'&uraian='+cari;//+'&random='+Math.random();
			}else if (combo == "tgl"){
				dataString = 'starting='+page+'&tgl='+cari;//+'&random='+Math.random();
			}else if (combo == "jmA"){
				dataString = 'starting='+page+'&jmA='+cari;//+'&random='+Math.random();
			}else if (combo == "jmB"){
				dataString = 'starting='+page+'&jmB='+cari;//+'&random='+Math.random();
			}else if (combo == "pet"){
				dataString = 'starting='+page+'&pet='+cari;//+'&random='+Math.random();
			}else{
				dataString = 'starting='+page;//+'&random='+Math.random();
			}
			
			$.ajax({
				url:"ptransaksi.php?aksi=tampil&menu=tggn",
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
			kosongkan();
			combokoord(0);
			$("#titlex").html('<h4><span align=center><b>tambah data</b></span><h4>');
			$("#simpanBC").html('Simpan');
			$("#linkxTB").focus();
			$('#myModal').modal('show');
			});
		//end of tambah 
		
		//kosongkan fields
		function kosongkan(){
			$("#idform").val('');
			$("#sistraTB").val('');
			$("#linkxTB").val('');
			$("#lokasiTB").val('');
			$("#uraianTB").val('');
			$("#tglTB").val('');
			$("#jmATB").val('');
			$("#jmBTB").val('');
			$("#petTB").val('');
		}
		//end of kosongkan fields
		
		//simpan(tambah & edit)
		$('#ggnFR').submit(function() {
			
				//	var  x = tgly.substrig(2);
					//alert(tgly);
					//return false;
					
			var idformx = $("#idform").val();
			var urlx 	= $(this).attr('action');

			if(idformx==''){ //tmbah data
				urlx2 = "?aksi=tambah&menu=tggn";
			}else{ //edit data
				urlx2 = "?aksi=ubah&menu=tggn&idx="+idformx;
			}
			//alert(urlx2);
			$('#hasily').html("loading ....");
			$.ajax({
				type: 'POST',
				dataType:'json',
				url: urlx + urlx2,
				data: $(this).serialize(),
				success: function(data) {
					var statusy 	= data.status;
					var sistra		= data.sistra;
					var linkxy		= data.linkx;
					var lokasiy 	= data.lokasi;
					var uraiany		= data.uraian;
					var tgly		= data.tgl;
					var jmAy		= data.jmA;
					var jmBy		= data.jmB;
					var pety		= data.pet;
				
					if(statusy=='sukses'){
						//add
						if(idformx==''){
							$('#myModal').modal('hide');
							var idy = data.id;
							loadData();
							$("#alat_"+idy).css("background","green");
						}
						//edit
						else{
							$('#myModal').modal('hide');
							var idy = idformx;
							$("#alat_"+idy).css("background","blue");
							$("#loadtabel").html('id : "'+idy+' berhasil di edit').fadeIn(6000);
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
		$('i.edit').live("click",function() {	
			kosongkan();
			$("#titlex").html('<h4><span align=center><b>Edit Data</b></span><h4>');
			var idy = $(this).attr("idz");
			//alert(idy);
			
			$.ajax({
				url:"ptransaksi.php?aksi=ambiledit&menu=tggn",
				data:"idx="+idy,
				dataType:'json',
				type:"GET",
				success:function(data){
					var statusy			= data.status;
					var sistray			= data.sistra;
					var lokasiy			= data.lokasi;
					var linkxy			= data.linkx;
					var uraiany			= data.uraian;
					var tgly			= data.tgl;
					var jmAy			= data.jmA;
					var jmBy			= data.jmB;
					var pety			= data.pet;
					var id_koordinasiy	= data.id_koordinasi;
					
					if(statusy=='sukses'){
						$("#idform").val(idy);
						$("#sistraTB").val(sistray);
						$("#linkxTB").val(linkxy);
						$("#lokasiTB").val(lokasiy);
						$("#uraianTB").val(uraiany);
						$("#tglTB").val(tgly);
						$("#jmATB").val(jmAy);
						$("#jmBTB").val(jmBy);
						$("#petTB").val(pety);
						//$("#id_koordinasiTB").val(id_koordinasiy);
						
						//$('#sistraTB').prop({disabled:true});
						combokoord(id_koordinasiy);
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
				url:"ptransaksi.php",
				data:"aksi=cetak&menu=tggn&idx="+idy,//+"&namax="+namay+"&lokasix="+lokasiy,
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
						url: "ptransaksi.php?aksi=hapus&menu=tggn",
						data:"idx=" + idy,
						cache: false,
						success: function(data){
							//var statusy		= data.status;
							$("#tggn_"+idy).css("background","red").fadeOut(2000);
							loadData();
							$("#loadtabel").html('dataa gangguan id : '+idy+' telah terhapus').fadeIn(6000);
						}
				});
		});
		//end of action hapus 
		
		//hapus semua
		$('#hapusBC').click(function() {	
			if(confirm("lanjutkan menghapus semua data gangguan ?"))
				$.ajax({
						type: "GET",
						dataType:'json',
						url: "ptransaksi.php",
						data:"aksi=hapussemua&menu=tggn",
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
				//data :'tabelx=tb_ggn&idx=id_alatkerja',
				data :'tabelx=tb_ggn',
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
				data: "tabelx=tb_ggn",
				//data: "tabelx=tb_ggn&ancur="+md5,
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