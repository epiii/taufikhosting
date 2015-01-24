<?php 
	//start_session();
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='tsirkit'){
?>	
<body onLoad="comboback()">
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
                    <form class="form-horizontal cmxform" id="sirkitFR" method="get" action="proses/ptransaksi.php" autocomplete="off">
                        <input type="hidden" placeholder="idform" id="idform" />
						<input type="hidden" id="id_per_detailH" name="id_per_detailH" >
                        <input type="hidden" placeholder="id_backbone" id="id_backboneTB" name="id_backboneTB" />
                    
					<div class="form-row control-group row-fluid">
                      <label class="control-label span3">id perangkat detail</label>
                      <div class="controls span7" id="id_per_detailDV">
                      
					  </div>
                    </div>
                    
                    <div class="form-row control-group row-fluid">
                      <label class="control-label span3">Kota A</label>
                      <div class="controls span7">
                        <select id="id_linkaTB" name="id_linkaTB"  required class="span12">
						
						</select>
                      </div>
                    </div>
                    <div class="form-row control-group row-fluid">
                      <label class="control-label span3">Kota B</label>
                      <div class="controls span7">
                        <select id="id_linkbTB" name="id_linkbTB" required class="span12">
						
						</select>
                      </div>
                    </div>
                    <div class="form-row control-group row-fluid">
                      <label class="control-label span3" for="hint-field">st A</label>
                      <div class="controls span7">
                        <input id="st_aTB" name="st_aTB" minlength="3" type="text" required placeholder="st A"class="row-fluid"/>
                      </div>
                    </div>
                    <div class="form-row control-group row-fluid">
                      <label class="control-label span3" for="hint-field">st B</label>
                      <div class="controls span7">
                        <input id="st_bTB" name="st_bTB" minlength="3" type="text" required placeholder="st B"class="row-fluid"/>
                      </div>
                    </div>
                    <div class="form-row control-group row-fluid">
                      <label class="control-label span3" for="hint-field">User</label>
                      <div class="controls span7">
                        <select id="id_userTB" name="id_userTB" minlength="3" required class="row-fluid"/>
							
						</select>
                      </div>
                    </div>
                    <div class="form-row control-group row-fluid">
                      <label class="control-label span3" for="hint-field">tID</label>
                      <div class="controls span7">
                        <input id="tidTB" name="tidTB" type="text" required placeholder="tid " class="row-fluid"/>
                      </div>
                    </div>
                    
                    <div class="form-row control-group row-fluid">
                      <label class="control-label span3" for="hint-field">DIU</label>
                      <div class="controls span7">
                        <input id="diuTB" name="diuTB" type="text" required placeholder="diu " class="row-fluid"/>
                      </div>
                    </div>
                    
                    <div class="form-row control-group row-fluid">
                      <label class="control-label span3" for="hint-field">TC</label>
                      <div class="controls span7">
                        <input id="tcTB" name="tcTB" type="text" required placeholder="tcTB" class="row-fluid"/>
                      </div>
                    </div>
                    
                    <div class="form-row control-group row-fluid">
                      <label class="control-label span3" for="hint-field">DDF TC</label>
                      <div class="controls span7">
                        <input id="ddf_tcTB" name="ddf_tcTB" type="text" required placeholder="ddf_tcTB" class="row-fluid"/>
                      </div>
                    </div>
                    
                    <div class="form-row control-group row-fluid">
                      <label class="control-label span3" for="hint-field">DDF User</label>
                      <div class="controls span7">
                        <input id="ddf_userTB" name="ddf_userTB" type="text" required placeholder="DDF User" class="row-fluid"/>
                      </div>
                    </div>
                    
                    <div class="form-row control-group row-fluid">
                      <label class="control-label span3" for="hint-field">Tie Line</label>
                      <div class="controls span7">
                        <input id="tie_lineTB" name="tie_lineTB" type="text" required placeholder="tie line" class="row-fluid"/>
                      </div>
                    </div>
                    
                    <div class="form-row control-group row-fluid">
                      <label class="control-label span3" for="hint-field">kondisi</label>
                      <div class="controls span7">
                        <select id="kondisiTB" name="kondisiTB"  class="row-fluid">
							<option value="normal" >normal<option>
							<option value="rusak" >rusak<option>
						<select>
                      </div>
                    </div>
					
					<div class="form-row control-group row-fluid">
                      <label class="control-label span3" for="hint-field">Keterangan</label>
                      <div class="controls span7">
                        <input id="keteranganTB" name="keteranganTB" type="text"  placeholder="keterangan " class="row-fluid"/>
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
        <div class="box color_11">
          <div class="title">
          	<h4> <span>Data Sirkit</span>
           	</h4>&nbsp;
				backbone : 
                <select id="id_backboneSB" name="id_backboneSB" class="span4">
                </select><br>&nbsp;
                pencarian :
				<select id="kategoriTB" class="span2">
					<option value="channelida" selected="selected">channel ID A</option>
					<option value="channelidb" >channel ID B</option>
					<option value="linka">kota A</option>
					<option value="linkb">kota B</option>
					<option value="ddf_a">ddf A</option>
					<option value="ddf_b">ddf B</option>
					<option value="st_a">st A</option>
					<option value="st_b">st B</option>
					<option value="user">user</option>
					<option value="tid">tID</option>
					<option value="diu">DIU</option>
					<option value="tc">TC</option>
					<option value="ddf_tc">ddf TC</option>
					<option value="ddf_user">ddf User</option>
					<option value="tie_line">Tie Line</option>
					<option value="kondisi">Kondisi</option>
				</select>
                &nbsp;
				<input type="text" id="objekTB" class="span2" placeholder="pencarian">
                &nbsp;
				<?php if($_SESSION['leveluserMUX']=='admin'){ ?> 
					<a id="tambahBC" class="btn  btn-large" rel='tooltip' data-placement='top' data-original-title=' Tambah Data'rel='tooltip' data-placement='top' data-original-title=' Tambah Data'><i class="icon-plus"></i></a>
					<button class="btn btn-large" id="hapusBC" rel='tooltip' data-placement='top' data-original-title=' Kosongkan'><i class="icon-trash"></i></button>
				<?php } ?>                
				
                <span id="loadtabel"></span>
          </div>
          <!-- End .title -->
          <div class="content top">
            <table id="datatable_examplez" class="responsive table table-striped table-bordered" 
            	style="width:100%;margin-bottom:0; ">
                <thead>
                    <!--<tr>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="id_kapSB" placeholder="cari ID " ></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="avail2mbpsSB" placeholder="cari 2mbps" ></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="availstm1SB" placeholder="cari stm1" ></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="availstm4SB" placeholder="cari stm4" ></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="availstm64SB" placeholder="cari stm64" ></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="tglSB" placeholder="tanggal" ></th>
                        <th class="to_hide_phone ue no_sort"></th>
                    </tr>-->
					<tr>
                        <th class="to_hide_phone ue no_sort">id </th>
                        <th class="to_hide_phone ue no_sort">channel A</th><!--fix-->
                        <th class="to_hide_phone ue no_sort">channel B</th><!--fix-->
                        <th class="to_hide_phone ue no_sort">kota A</th>
                        <th class="to_hide_phone ue no_sort">kota B</th>
                        <th class="to_hide_phone ue no_sort">ddf A</th><!--fix-->
                        <th class="to_hide_phone ue no_sort">ddf B</th><!--fix-->
                        <th class="to_hide_phone ue no_sort">st A</th>
                        <th class="to_hide_phone ue no_sort">st B</th>
                        <th class="to_hide_phone ue no_sort">user</th>
                        <th class="to_hide_phone ue no_sort">tID</th>
                        <th class="to_hide_phone ue no_sort">DIU</th>
                        <th class="to_hide_phone ue no_sort">TC</th>
                        <th class="to_hide_phone ue no_sort">ddf TC</th>
                        <th class="to_hide_phone ue no_sort">ddf User</th>
                        <th class="to_hide_phone ue no_sort">Tie Line</th>
                        <th class="to_hide_phone ue no_sort">Kondisi</th>
                        <th class="to_hide_phone ue no_sort">Ket</th>
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
	var proses ='proses/ptransaksi.php';
	comboback();
	
	function comboback(){
		$.ajax({
			url:proses,
			type:'get',
			dataType:'json',
			data:'aksi=combo&menu=tsirkitc&tabel=tb_backbone',
			success:function(data){
				var optiony ='';
				$.each(data, function (id,item){
					optiony+='<option value='+item.id_backbone+'>'+item.kode+'</option>';
				});
				$('#id_backboneSB').html(optiony);
			}
		}); 
	}
	
	function combolinka(par){
		$.ajax({
			url:proses,
			type:'get',
			dataType:'json',
			data:'aksi=combo&menu=tsirkitc&tabel=tb_linka',
			success:function(data){
				var optiony ='';
				$.each(data, function (id,item){
					if(par==item.id_linka)
						optiony+='<option value='+item.id_linka+' selected="selected">'+item.nama+'</option>';
					else
						optiony+='<option value='+item.id_linka+'>'+item.nama+'</option>';
				});
				$('#id_linkaTB').html(optiony);
			}
		}); 
	}
	
	function combolinkb(par2){
		$.ajax({
			url:proses,
			type:'get',
			dataType:'json',
			data:'aksi=combo&menu=tsirkitc&tabel=tb_linkb',
			success:function(data){
				var optiony ='';
				$.each(data, function (id,item){
					if(par2==item.id_linkb)
						optiony+='<option value='+item.id_linkb+' selected="selected">'+item.nama+'</option>';
					else
						optiony+='<option value='+item.id_linkb+'>'+item.nama+'</option>';
				});
				$('#id_linkbTB').html(optiony);
			}
		}); 
	}
	
	function combouser(par){
		$.ajax({
			url:proses,
			type:'get',
			dataType:'json',
			data:'aksi=combo&menu=tsirkitc&tabel=tb_user',
			success:function(data){
				var optiony ='';
				$.each(data, function (id,item){
					if(par==item.id_user)
						optiony+='<option value='+item.id_user+' selected="selected">'+item.user+'</option>';
					else
						optiony+='<option value='+item.id_user+'>'+item.user+'</option>';
				});
				$('#id_userTB').html(optiony);
			}
		}); 
	}
	
	function comboperdet(){
		$.ajax({
			url:proses,
			type:'get',
			dataType:'json',
			data:'aksi=combo&menu=tsirkitc&tabel=tb_perangkat_detail',
			success:function(data){
				var optiony ='';
				var optionx	='';
				$.each(data, function (id,item){
					optiony+='<option value="'+item.id_per_detail+'" >perangkat:'+item.id_per+' || id port:'+item.id_per_detail+'|| backbone:'+item.kode+' </option>';
				});
				optionx+='<select id="id_per_detailTB" name="id_per_detailTB" >'+optiony+'</select>';
				$('#id_per_detailDV').html(optionx);
			}
		}); 
	}
	
	$(document).ready(function() 
	{	

	//simpan(tambah & edit)
		$('#sirkitFR').submit(function() {
			var idformx = $("#idform").val();
			var urlx 	= $(this).attr('action');
			if(idformx==''){ //tmbah data
				urlx2 = "?aksi=tambah&menu=tsirkit";
			}else{ //edit data
				urlx2 = "?aksi=tambah&menu=tsirkit&idx="+idformx;
			}
			$('#hasily').html("loading ....");
			$.ajax({
				type: 'POST',
				dataType:'json',
				url: urlx + urlx2,
				data: $(this).serialize(),
				success: function(data) {
					var statusy 		= data.status;
					var id_per_detaily	= data.id_per_detail;
					var keterangany		= data.keterangan;
					
					if(statusy=='sukses'){
						$('#myModal').modal('hide');
						kosongkan();
						$("#loadtabel").html('update <br> sirkit id : '+id_per_detaily).fadeIn(6000);
						loadData();
						$('#hasily').hide();
					}else{
						alert('gagal menyimpan operasi database');
					}
					
				}
			});
			return false;
		});
		//end of simpan(tambah & edit)
			


	/*//combo
		//var backb;
		//var arr = new Array;
		//comboback();
		
		//end of combo
		
		//function editinplace(){
			//$('#kapx_').();
			//$('tr.kapx_').live("dblclick",function() {
				//var x = $(this).attr('ok');
				//alert(x);
				//this.append('<input type=text >');
				//this.append('<button>ok</button>');
			});

		//}
		
		//var backb = $('#id_backboneSB').val();
		//var backb = $('#id_backboneSB : selected').val();
		///var backb = $('select#id_backboneSB option:selected').val();
		//$("#frm1 :input[name='kota']").val(terpilih);
		
		//loadData(1);
		//fungai loading mode "normal"
		//function loadData(backbx){*/
		loadData();
		function loadData(){
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			var dataString ='';
			var cari 	= $("input#objekTB").val();
			var combo 	= $("select#kategoriTB").val();
			var backb	= $('#id_backboneSB').val();
			
			if (combo == "id_per_detail"){
				dataString = 'id_per_detail='+ cari;
			}else if (combo == "channelida"){
				dataString = 'channelida='+ cari;
			}else if (combo == "channelidb"){
				dataString = 'channelidb='+ cari;
			}else if (combo == "linka"){
				dataString = 'linka='+ cari;
			}else if (combo == "linkb"){
				dataString = 'linkb='+ cari;
			}else if (combo == "user"){
				dataString = 'user='+ cari;
			}else if (combo == "tid"){
				dataString = 'tid='+ cari;
			}else if (combo == "diu"){
				dataString = 'diu='+ cari;
			}else if (combo == "tc"){
				dataString = 'tc='+ cari;
			}else if (combo == "ddf_a"){
				dataString = 'ddf_a='+ cari;
			}else if (combo == "ddf_b"){
				dataString = 'ddf_b='+ cari;
			}else if (combo == "ddf_tc"){
				dataString = 'ddf_tc='+ cari;
			}else if (combo == "ddf_user"){
				dataString = 'ddf_user='+ cari;
			}else if (combo == "tie_line"){
				dataString = 'tie_line='+ cari;
			}else if (combo == "kondisi"){
				dataString = 'kondisi='+ cari;
			}
			
			$.ajax({
				url	: proses+"?aksi=tampil&menu=tsirkit",
				type: "GET",
				data: dataString+'&id_backbonex='+backb,
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
			var combo = $("select#kategoriTB").val();
			var backb	= $('#id_backboneSB').val();
			
			if (combo == "id_per_detail"){
				dataString = 'starting='+page+'&id_per_detail='+ cari;
			}else if (combo == "channelida"){
				dataString = 'starting='+page+'&channelida='+ cari;
			}else if (combo == "channelidb"){
				dataString = 'starting='+page+'&channelidb='+ cari;
			}else if (combo == "linka"){
				dataString = 'starting='+page+'&linka='+ cari;
			}else if (combo == "linkb"){
				dataString = 'starting='+page+'&linkb='+ cari;
			}else if (combo == "user"){
				dataString = 'starting='+page+'&user='+ cari;
			}else if (combo == "tid"){
				dataString = 'starting='+page+'&tid='+ cari;
			}else if (combo == "diu"){
				dataString = 'starting='+page+'&diu='+ cari;
			}else if (combo == "tc"){
				dataString = 'starting='+page+'&tc='+ cari;
			}else if (combo == "ddf_tc"){
				dataString = 'starting='+page+'&ddf_tc='+ cari;
			}else if (combo == "ddf_a"){
				dataString = 'starting='+page+'&ddf_a='+ cari;
			}else if (combo == "ddf_b"){
				dataString = 'starting='+page+'&ddf_b='+ cari;
			}else if (combo == "ddf_user"){
				dataString = 'starting='+page+'&ddf_user='+ cari;
			}else if (combo == "tie_line"){
				dataString = 'starting='+page+'&tie_line='+ cari;
			}else if (combo == "kondisi"){
				dataString = 'starting='+page+'&kondisi='+ cari;
			}else{
				dataString = 'starting='+page;//+'&random='+Math.random();
			}
			
			$.ajax({
				url:proses+"?aksi=tampil&menu=tsirkit",
				data: dataString+'&id_backbonex='+backb,
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
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			$.ajax({
				url:proses,
				data:'aksi=cek&menu=tsirkit',
				dataType:'json',
				success:function(data){
					if(data.status=='full'){
						//alert('maaf perangkat telah terpakai semua, silahkan tambahkan ( MASTER DATA -> Perangkat -> Detail Perangkat ) ');
						$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
						alert('maaf port penuh ( tambah port [ MASTER DATA -> Perangkat -> Detail Perangkat ] atau hapus port yg terpakai) ');
					}else{
						kosongkan();
						comboperdet();
						combolinka();
						combolinkb();
						combouser();
						$("#titlex").html('<h4><span align=center><b>tambah data</b></span><h4>');
						$("#simpanBC").html('Simpan');
						var id_back = $('#id_backboneSB').val();
						$("#id_backboneTB").val(id_back);
						
						
						$("#id_per_detailTB").focus();
						$('#myModal').modal('show');
						$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
					}
				}
				
			});
		});
		//end of tambah 
		
		//kosongkan fields
		function kosongkan(){
			$("#idform").val('');
			$("#id_per_detailTB").val('');
			$("#id_linkaTB").val('');
			$("#id_linkbTB").val('');
			$("#st_aTB").val('');
			$("#st_bTB").val('');
			$("#id_userTB").val('');
			$("#tidTB").val('');
			$("#diuTB").val('');
			$("#tcTB").val('');
			$("#ddf_tcTB").val('');
			$("#ddf_userTB").val('');
			$("#tie_lineTB").val('');
			//$("#kondisiTB").val('');
			$("#keteranganTB").val('');
		}
		//end of kosongkan fields
		
		//action klik edit
		$('a.edit').live("click",function() {	
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			kosongkan();
			$("#titlex").html('<h4><span align=center><b>Edit Data</b></span><h4>');
			var idy 	= $(this).attr("idz");
			
			$.ajax({
				url:proses,
				data:"aksi=ambiledit&menu=tsirkit&idx="+idy,
				dataType:'json',
				type:"GET",
				success:function(data){
					var statusy			= data.status;
					var id_backboney	= data.id_backbone;
					var id_pery			= data.id_per;
					var kodey			= data.kode;
					var id_per_detaily	= data.id_per_detail;
					var id_linkay 		= data.id_linka;
					var id_linkby 		= data.id_linkb;
					var st_ay			= data.st_a;
					var st_by			= data.st_b;
					var id_usery		= data.id_user;
					var tidy			= data.tid;
					var diuy			= data.diu;
					var tcy				= data.tc;
					var ddf_tcy			= data.ddf_tc;
					var ddf_usery		= data.ddf_user;
					var tie_liney		= data.tie_line;
					var kondisiy		= data.kondisi;
					var keterangany		= data.keterangan;
					
					if(statusy=='sukses'){
						$("#id_per_detailH").val(id_per_detaily);
						$('#id_backboneTB').val(id_backboney);
						//var idperdetail = '<input class="span30" type="text" name="id_per_detailTB" readonly="readonly" id="id_per_detailTB" value="perangkat:'+id_pery+' || id port:'+id_per_detaily+' || backbone :'+kodey+'">';
						var idperdetail = '<textarea class="span30" type="text" name="id_per_detailTB" readonly="readonly" id="id_per_detailTB" >perangkat:'+id_pery+' || id port:'+id_per_detaily+' || backbone :'+kodey+'</textarea>';
						//console.log(idperdetail);
						$('#id_per_detailDV').html(idperdetail);
						$('#st_aTB').val(st_ay);
						$('#st_bTB').val(st_by);
						$('#tidTB').val(tidy);
						$('#diuTB').val(diuy);
						$('#tcTB').val(tcy);
						$('#ddf_tcTB').val(ddf_tcy);
						$('#ddf_userTB').val(ddf_usery);
						$('#tie_lineTB').val(tie_liney);
						$('#keteranganTB').val(keterangany);
						$("#idform").val(idy); //idform = id sirkit
						//$('#kondisiTB').val(kondisiy);
						//$('#channelidaTB').val(channeliday);
						//$('#channelidbTB').val(channelidby);
						//$('#ddf_aTB').val(ddf_aTy);
						//$('#ddf_bTB').val(ddf_by);
						//$('#id_linkaTB').val(linkay);
						//$('#id_linkbTB').val(linkby);
						//$('#id_userTB').val(usery);
						//$('#id_sistraTB').val(id_sistray);
						//$('#id_sistraTB').val(id_sistray);
						
						//$('#id_per_detailTB').prop({disabled:true});	
						//$('#id_per_detailTB').prop({locked:true});	
						combolinka(id_linkay);
						combolinkb(id_linkby);
						combouser(id_usery);
						//combosistra(id_sistray);
						//$('#id_per_detailDV').html('<input type="text" id="id_per_detailTB" readonly="readonly" value="'+id_per_detaily+'"name="id_per_detailTB">');
						$("#simpanBC").html('Update');
						$('#myModal').modal('show');
						$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
			
					}else{
						$('#loadtabel').html('<img src="img/w8.gif">').fadeOut();
						alert('terjadi kesalahan pada database');
					}
				}
			});
			
		});	
		//end of action klik edit
		
		//action detail
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
				data:"aksi=cetak&menu=tsirkit&idx="+idy,//+"&namax="+namay+"&lokasix="+lokasiy,
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
		$('a.hapus').live("click",function() {	
			var idy 	= $(this).attr("idz");
			//var namay	= $(this).attr("namaz");
			 
			if(confirm("lanjutkan menghapus '"+idy+"' ?"))
				$.ajax({
						type: "GET",
						dataType:"json",
						url: proses+"?aksi=hapus&menu=tsirkit",
						data:"idperdet=" + idy,
						cache: false,
						success: function(data){
								if(data.status=='gagal'){
									alert(data.status);
								}else{
								
									//var statusy		= data.status;
									//var namay 		= data.nama;
										
									$("#sirkit_"+idy).css("background","red").fadeOut(2000);
									loadData();
									//$("#loadtabel").html(namay+' terhapus').fadeIn(6000);
									$("#loadtabel").html('id : '+idy+' terhapus').fadeIn(6000);
									//$("#list_"+nim).slideUp('slow', function() {$(this).remove();});
								}
						}
				});
		});
		//end of action hapus 
		
		//hapus semua
		$('#hapusBC').click(function() {	
			if(confirm("lanjutkan menghapus semua data sirkit ?????????"))
				$.ajax({
						type: "GET",
						dataType:'json',
						url: proses,
						data:"aksi=hapussemua&menu=tsirkit",
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
</body>
<?php
		}else{
			header("location:index.php");
		}
	}else{
		header("location:index.php");
	}
?>