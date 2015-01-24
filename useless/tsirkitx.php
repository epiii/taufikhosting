<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='tsirkit'){
?>	
	<div>
        Backbone : <select id="id_backboneSM" name="id_backboneSM"></select>
    </div>
<link href="css/style-page.css" rel="stylesheet" />        
<a data-toggle="modal" id="tambahBC" href="#myModal" class="btn btn-info btn-large">Tambah Data</a>
<a id="cetakBC" class="btn btn-info btn-large" href="cmaster.php?tipe=full&tabelx=tb_sirkit&judulx=sirkit" target="_blank">Cetak Semua</a>
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
              <form class="form-horizontal cmxform" id="sirkitFR" method="get" action="ptransaksi.php" autocomplete="off">
              	<input type="hidden" id="idform" />
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">ID perangkat detail</label>
                  <div class="controls span7">
                    <input id="id_per_detailTB" name="id_per_detailTB" placeholder="id perangkat detail(wajib diisi)" type="text" required class="span12"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3">Link A</label>
                  <div class="controls span7">
                    <input id="id_linkaTB" name="id_linkaTB" placeholder="Link A(wajib diisi)" type="text" required class="span12"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Link B</label>
                  <div class="controls span7">
                    <input id="id_linkbTB" name="id_linkbTB" minlength="3" type="text" required placeholder="link B"class="row-fluid"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">Backbone</label>
                  <div class="controls span7">
                    <input id="id_backboneTB" name="id_backboneTB" minlength="3" type="text" required placeholder="backbone"class="row-fluid"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">DDF A</label>
                  <div class="controls span7">
                    <input id="ddf_aTB" name="ddf_aTB" type="text" required placeholder="ddf a(wajib diisi)" class="row-fluid"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">DDF B</label>
                  <div class="controls span7">
                    <input id="ddf_bTB" name="ddf_bTB" minlength="3" type="text" required placeholder="ddf b" class="row-fluid"/>
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">channel A</label>
                  <div class="controls span7">
                  	<input type="text" id="cahnnelidaTB" name="cahnnelidaTB" />
                  </div>
                </div>
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">channel B</label>
                  <div class="controls span7">
                  	<input type="text" id="cahnnelidbTB" name="cahnnelidbTB" />
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">st A</label>
                  <div class="controls span7">
                  	<input type="text" id="st_aTB" name="st_aTB" />
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">st B</label>
                  <div class="controls span7">
                  	<input type="text" id="st_bTB" name="st_bTB" />
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">tc</label>
                  <div class="controls span7">
                  	<input type="text" id="tcTB" name="tcTB" />
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">ddf tc</label>
                  <div class="controls span7">
                  	<input type="text" id="ddf_tcTB" name="ddf_tcTB" />
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">ddf user</label>
                  <div class="controls span7">
                  	<input type="text" id="ddf_userTB" name="ddf_userTB" />
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">tid</label>
                  <div class="controls span7">
                  	<input type="text" id="tidTB" name="tidTB" />
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">diu</label>
                  <div class="controls span7">
                  	<input type="text" id="diuTB" name="diuTB" />
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">tie line</label>
                  <div class="controls span7">
                  	<input type="text" id="tie_lineTB" name="tie_lineTB" />
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">arnet</label>
                  <div class="controls span7">
                  	<input type="text" id="arnetTB" name="arnetTB" />
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">netre</label>
                  <div class="controls span7">
                  	<input type="text" id="netreTB" name="netreTB" />
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">id_sistra</label>
                  <div class="controls span7">
                  	<input type="text" id="id_sistraTB" name="id_sistraTB" placeholder="sistra" class="row-fluid"/>
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">keterangan</label>
                  <div class="controls span7">
                  	<input type="text" id="keteranganTB" name="keteranganTB" placeholder="keterangan" class="row-fluid"/>
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">2 mbps</label>
                  <div class="controls span7">
                  	<input type="text" id="used2mbpsTB" name="used2mbpsTB" class="row-fluid" required/>
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">stm1</label>
                  <div class="controls span7">
                  	<input type="text" id="usedstm1TB" name="usedstm1TB" class="row-fluid" required/>
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">stm4</label>
                  <div class="controls span7">
                  	<input type="text" id="usedstm4TB" name="usedstm4TB" placeholder="stm 4"  class="row-fluid" required/>
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">stm64</label>
                  <div class="controls span7">
                  	<input type="text" id="usedstm64TB" name="usedstm64TB" placeholder="stm 64"  class="row-fluid" required/>
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">bulan</label>
                  <div class="controls span7">
                  	<input type="text" id="bulanTB" name="bulanTB" placeholder="bulan"  class="row-fluid" required/>
                  </div>
                </div>
                
                <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="hint-field">tahun</label>
                  <div class="controls span7">
                  	<input type="text" id="tahunTB" name="tahunTB" placeholder="tahun"  class="row-fluid" required/>
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
        <div class="box">
          <div class="title">
            <h4><span>Data Sirkit</span></h4> 
				<!--<select id="kategoriTB">
					<option value="id_per_detail" >ID</option>
					<option value="kondisi">kondisi</option>
					<option value="id_backbone">id_backbone</option>
					<option value="id_linka">link A</option>
					<option value="id_linkb">link B</option>
					<option value="id_user">user</option>
					<option value="st_a">st A</option>
					<option value="st_b">st B</option>
					<option value="tc">tc</option>
					<option value="ddf_tc">ddf tc</option>
					<option value="ddf_user">ddf user</option>
					<option value="tid">tid</option>
					<option value="diu">diu</option>
					<option value="tie_line">tie_line</option>
					<option value="arnet">arnet</option>
					<option value="netre">netre</option>
					<option value="id_sistra">id_sistra</option>
					<option value="keterangan">keterangan</option>
					<option value="used2mbps">used2mbps</option>
					<option value="usedstm1">usedstm1</option>
					<option value="usedstm4">usedstm4</option>
					<option value="usedstm64">usedstm64</option>
					<option value="bulan">bulan</option>
					<option value="tahun">tahun</option>
				</select>
                &nbsp;
				<input type="text" id="objekTB" placeholder="pencarian">
                &nbsp;-->
                
                <span id="loadtabel"></span>
          </div>
          <!-- End .title -->
          <div class="content top">
            <table id="datatable_examplez" class="responsive table table-striped table-bordered" 
            	style="width:100%;margin-bottom:0; ">
                <thead>
                    <tr>
                        <form id="searchFR" name="searchFR" method="post" >
                        <th class="to_hide_phone ue no_sort"><input type="text" id="id_perangkatSB" placeholder="id perangkat"/></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="id_linkaSB" placeholder="Link A"/></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="id_linkbSB" placeholder="Link B"/></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="id_backboneSB" placeholder="Backbone"/></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="ddf_aSB" placeholder="ddf A"/></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="ddf_bSB" placeholder="ddf B"/></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="channelidaSB" placeholder="Channel A"/></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="channelidaSB" placeholder="Channel B"/></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="id_sistraSB" placeholder="Sistra"/></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="st_aSB" placeholder="St A"/></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="st_bSB" placeholder="St B"/></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="tcSB" placeholder="TC"/></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="ddf_tcSB" placeholder="ddf TC"/></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="ddf_userSB" placeholder="ddf User"/></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="tidSB" placeholder="tid"/></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="diuSB" placeholder="diu"/></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="netreSB" placeholder="netre"/></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="arnetSB" placeholder="arnet"/></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="userSB" placeholder="User"/></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="used2mbpsSB" placeholder="2mbps"/></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="usedstm1SB" placeholder="stm1"/></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="usedstm4SB" placeholder="stm4"/></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="usedstm64SB" placeholder="stm64"/></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="bulanSB" placeholder="bulan"/></th>
                        <th class="to_hide_phone ue no_sort"><input type="text" id="tahunSB" placeholder="tahun"/></th>
                        <th class="ms no_sort ">Aksi</th>
                    	</form>
                    </tr>
                	
                    <tr>
                        <!--<th class="jv no_sort">
                            <label class="checkbox ">
	                            <input type="checkbox">
                            </label></th>-->
                        <!--<th class="to_hide_phone  no_sort">no</th>-->
                        <th class="to_hide_phone ue no_sort">ID perangkat detail</th>
                        <th class="to_hide_phone ue no_sort">Link A</th>
                        <th class="to_hide_phone ue no_sort">Link B</th>
                        <th class="to_hide_phone ue no_sort">Backbone</th>
                        <th class="to_hide_phone ue no_sort">ddf A</th>
                        <th class="to_hide_phone ue no_sort">ddf B</th>
                        <th class="to_hide_phone ue no_sort">Channel A</th>
                        <th class="to_hide_phone ue no_sort">Channel B</th>
                        <th class="to_hide_phone ue no_sort">Sistra</th>
                        <th class="to_hide_phone ue no_sort">St A</th>
                        <th class="to_hide_phone ue no_sort">St B</th>
                        <th class="to_hide_phone ue no_sort">TC</th>
                        <th class="to_hide_phone ue no_sort">ddf TC</th>
                        <th class="to_hide_phone ue no_sort">ddf User</th>
                        <th class="to_hide_phone ue no_sort">tid</th>
                        <th class="to_hide_phone ue no_sort">diu</th>
                        <th class="to_hide_phone ue no_sort">netre</th>
                        <th class="to_hide_phone ue no_sort">arnet</th>
                        <th class="to_hide_phone ue no_sort">User</th>
                        <th class="to_hide_phone ue no_sort">2mbps</th>
                        <th class="to_hide_phone ue no_sort">stm1</th>
                        <th class="to_hide_phone ue no_sort">stm4</th>
                        <th class="to_hide_phone ue no_sort">stm64</th>
                        <th class="to_hide_phone ue no_sort">bulan</th>
                        <th class="to_hide_phone ue no_sort">tahun</th>
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
    $(document).ready(function() 
	{	
		
		//var kepilih = $('#id_backboneSM').val();
		loadData();
		comboback();
		
		//combo
		//function comboback(par){
		function comboback(){
			$.ajax({
				url:'ptransaksi.php',
				type:'get',
				dataType:'json',
				data:'aksi=combo&menu=tsirkitc&tabel=tb_backbone',
				success:function(data){
					var optiony ='';
						$.each(data, function (id,item){
							//if(par==item.id_backbone)
								//optiony+='<option value='+item.id_backbone+' selected="selected">'+item.kode+'</option>';
							//else
							optiony+='<option value='+item.id_backbone+'>'+item.kode+'</option>';
						});
						$('#id_backboneSM').html(optiony);
				}
			});
		}
		//end of combo
		
		//var kepilih = $('#id_backboneSM').val();
		//alert('haha '+kepilih);
		
		//action combo searching backbone
			$('#id_backboneSM').change(function(){
				var id_backboney = this.val();
				comboback(id_backboney);
			});$('#id_backboneSM').keyup(function(){
				var id_backboney = this.val();
				comboback(id_backboney);
			});
		//end of action combo searching backbone
		
		//fungsi loading mode "normal"
		function loadData(){
			//$('#loadtabel').html('<img src="img/ajax-loaderz.gif">').fadeIn();
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			var dataString;
			//#var cari 	= $("input#objekTB").val();
			//#var combo 	= $("select#kategoriTB").val();
			var linkay	= $("#id_linkaSB").val();
			var linkby	= $("#id_linkbSB").val();
			
			dataString = 'linka='+linkay+'&linkb='+linkby;
			/*if (combo =="id_per_detail"){
				dataString = 'id_per_detail='+ cari;
			}else if (combo =="kondisi"){
				dataString = 'kondisi='+ cari;
			}else if (combo =="id_backbone"){
				dataString = 'id_backbone='+ cari;
			}else if (combo =="id_linka"){
				dataString = 'id_linka='+ cari;
			}else if (combo =="id_linkb"){
				dataString = 'id_linkb='+ cari;
			}else if (combo =="id_user"){
				dataString = 'id_user='+ cari;
			}else if (combo =="st_a"){
				dataString = 'st_a='+ cari;
			}else if (combo =="st_b"){
				dataString = 'st_b='+ cari;
			}else if (combo =="tc"){
				dataString = 'tc='+ cari;
			}else if (combo =="ddf_tc"){
				dataString = 'ddf_tc='+ cari;
			}else if (combo =="ddf_user"){
				dataString = 'ddf_user='+ cari;
			}else if (combo =="tid"){
				dataString = 'tid='+ cari;
			}else if (combo =="diu"){
				dataString = 'diu='+ cari;
			}else if (combo =="tie_line"){
				dataString = 'tie_line='+ cari;
			}else if (combo =="arnet"){
				dataString = 'arnet='+ cari;
			}else if (combo =="netre"){
				dataString = 'netre='+ cari;
			}else if (combo =="id_sistra"){
				dataString = 'id_sistra='+ cari;
			}else if (combo =="keterangan"){
				dataString = 'keterangan='+ cari;
			}else if (combo =="used2mbps"){
				dataString = 'used2mbps='+ cari;
			}else if (combo =="usedstm1"){
				dataString = 'usedstm1='+ cari;
			}else if (combo =="usedstm4"){
				dataString = 'usedstm4='+ cari;
			}else if (combo =="usedstm64"){
				dataString = 'usedstm64='+ cari;
			}else if (combo =="bulan"){
				dataString = 'bulan='+ cari;
			}else if (combo =="tahun"){
				dataString = 'tahun='+ cari;
			}*/
			/*if (combo =="id_per_detail"){
				dataString = 'id_per_detail='+ cari;
			}else if (combo =="kondisi"){
				dataString = 'kondisi='+ cari;
			}else if (combo =="id_backbone"){
				dataString = 'id_backbone='+ cari;
			}else if (combo =="id_linka"){
				dataString = 'id_linka='+ cari;
			}else if (combo =="id_linkb"){
				dataString = 'id_linkb='+ cari;
			}else if (combo =="id_user"){
				dataString = 'id_user='+ cari;
			}else if (combo =="st_a"){
				dataString = 'st_a='+ cari;
			}else if (combo =="st_b"){
				dataString = 'st_b='+ cari;
			}else if (combo =="tc"){
				dataString = 'tc='+ cari;
			}else if (combo =="ddf_tc"){
				dataString = 'ddf_tc='+ cari;
			}else if (combo =="ddf_user"){
				dataString = 'ddf_user='+ cari;
			}else if (combo =="tid"){
				dataString = 'tid='+ cari;
			}else if (combo =="diu"){
				dataString = 'diu='+ cari;
			}else if (combo =="tie_line"){
				dataString = 'tie_line='+ cari;
			}else if (combo =="arnet"){
				dataString = 'arnet='+ cari;
			}else if (combo =="netre"){
				dataString = 'netre='+ cari;
			}else if (combo =="id_sistra"){
				dataString = 'id_sistra='+ cari;
			}else if (combo =="keterangan"){
				dataString = 'keterangan='+ cari;
			}else if (combo =="used2mbps"){
				dataString = 'used2mbps='+ cari;
			}else if (combo =="usedstm1"){
				dataString = 'usedstm1='+ cari;
			}else if (combo =="usedstm4"){
				dataString = 'usedstm4='+ cari;
			}else if (combo =="usedstm64"){
				dataString = 'usedstm64='+ cari;
			}else if (combo =="bulan"){
				dataString = 'bulan='+ cari;
			}else if (combo =="tahun"){
				dataString = 'tahun='+ cari;
			}*/
			
			$.ajax({
				/*url	: "ptransaksi.php?aksi=tampil&menu=tsirkit",
				type: "GET",
				data: dataString,
				success:function(data){
					$("#loadtabel").fadeOut(1000);
					$('#isi').hide().html(data).fadeIn(1000);
					loadData();
				}*/
				//var dataString = $('#searchFR').serialize();
				url	: "ptransaksi.php?aksi=tampil&menu=tsirkit",
				type: "GET",
				data: dataString,
				success:function(data){
					$("#loadtabel").fadeOut(1000);
					$('#isi').hide().html(data).fadeIn(1000);
					loadData();
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
			
			if (combo == "tahun"){
				dataString = 'starting='+page+'&tahun='+cari;//+'&random='+Math.random();
			}else if (combo == "bulan"){
				dataString = 'starting='+page+'&bulan='+cari;//+'&random='+Math.random();
			}else if (combo == "usedstm1"){
				dataString = 'starting='+page+'&usedstm1='+cari;//+'&random='+Math.random();
			}else if (combo == "usedstm64"){
				dataString = 'starting='+page+'&usedstm64='+cari;//+'&random='+Math.random();
			}else if (combo == "usedstm4"){
				dataString = 'starting='+page+'&usedstm4='+cari;//+'&random='+Math.random();
			}else if (combo == "usedstm1"){
				dataString = 'starting='+page+'&usedstm1='+cari;//+'&random='+Math.random();
			}else if (combo == "used2mbps"){
				dataString = 'starting='+page+'&used2mbps='+cari;//+'&random='+Math.random();
			}else if (combo == "keterangan"){
				dataString = 'starting='+page+'&keterangan='+cari;//+'&random='+Math.random();
			}else if (combo == "id_sistra"){
				dataString = 'starting='+page+'&id_sistra='+cari;//+'&random='+Math.random();
			}else if (combo == "netre"){
				dataString = 'starting='+page+'&netre='+cari;//+'&random='+Math.random();
			}else if (combo == "arnet"){
				dataString = 'starting='+page+'&arnet='+cari;//+'&random='+Math.random();
			}else if (combo == "tie_line"){
				dataString = 'starting='+page+'&tie_line='+cari;//+'&random='+Math.random();
			}else if (combo == "diu"){
				dataString = 'starting='+page+'&diu='+cari;//+'&random='+Math.random();
			}else if (combo == "tid"){
				dataString = 'starting='+page+'&tid='+cari;//+'&random='+Math.random();
			}else if (combo == "ddf_user"){
				dataString = 'starting='+page+'&ddf_user='+cari;//+'&random='+Math.random();
			}else if (combo == "ddf_tc"){
				dataString = 'starting='+page+'&ddf_tc='+cari;//+'&random='+Math.random();
			}else if (combo == "tc"){
				dataString = 'starting='+page+'&tc='+cari;//+'&random='+Math.random();
			}else if (combo == "st_b"){
				dataString = 'starting='+page+'&st_b='+cari;//+'&random='+Math.random();
			}else if (combo == "st_a"){
				dataString = 'starting='+page+'&st_a='+cari;//+'&random='+Math.random();
			}else if (combo == "id_user"){
				dataString = 'starting='+page+'&id_user='+cari;//+'&random='+Math.random();
			}else if (combo == "id_linkb"){
				dataString = 'starting='+page+'&id_linkb='+cari;//+'&random='+Math.random();
			}else if (combo == "id_linka"){
				dataString = 'starting='+page+'&id_linka='+cari;//+'&random='+Math.random();
			}else if (combo == "id_backbone"){
				dataString = 'starting='+page+'&id_backbone='+cari;//+'&random='+Math.random();
			}else if (combo == "kondisi"){
				dataString = 'starting='+page+'&kondisi='+cari;//+'&random='+Math.random();
			}else if (combo == "id_per_detail"){
				dataString = 'starting='+page+'&id_per_detail='+cari;//+'&random='+Math.random();
			}else{
				dataString = 'starting='+page;//+'&random='+Math.random();
			}
			
			$.ajax({
				url:"ptransaksi.php?aksi=tampil&menu=tsirkit",
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
		
		//action combo searching 
			//-- change
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
			
			//--keyup
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
		//end of action combo searching 
		
		//klik tambah 
		$("#tambahBC").click(function(){
			kosongkan();
			$("#titlex").html('<h4><span align=center><b>tambah data</b></span><h4>');
			$("#simpanBC").html('Simpan');
			$("#namaTB").focus();
		});
		//end of tambah 
		
		//kosongkan fields
		function kosongkan(){
			$("#idform").val('');
			$("#id_sirkitTB").val('');
			$("#namaTB").val('');
			$("#lokasiTB").val('');
			$("#kegunaanTB").val('');
			$("#merkTB").val('');
			$("#jmlTB").val('');
			$("#kondisiTB").val('');
			$("#thn_operTB").val('');
		}
		//end of kosongkan fields
		
		//simpan(tambah & edit)
		$('#sirkitFR').submit(function() {
			var idformx = $("#idform").val();
			var urlx 	= $(this).attr('action');

			if(idformx==''){ //tmbah data
				urlx2 = "?aksi=tambah&menu=tsirkit";
			}
			else{ //edit data
				urlx2 = "?aksi=ubah&menu=tsirkit&idx="+idformx;
			}
			$('#hasily').html("loading ....");
			$.ajax({
				type: 'POST',
				dataType:'json',
				url: urlx + urlx2,
				data: $(this).serialize(),
				success: function(data) {
					var statusy 	= data.status;
					var id_sirkity	= data.id_sirkit;
					var namay 		= data.nama;
					var lokasiy 	= data.lokasi;
					var kegunaany	= data.kegunaan;
					var merky		= data.merk;
					var thn_opery	= data.thn_oper;
					var jmly		= data.jml;
					var kondisiy	= data.kondisi;
					
					if(statusy=='sukses'){
						//add
						if(idformx==''){
							$('#myModal').modal('hide');
							var idy = data.id;
							//alert(idy);
							loadData();
							$("#sirkit_"+idy).css("background","green");
						}
						//edit
						else{
							$('#myModal').modal('hide');
							var idy = idformx;
							$("#sirkit_"+idy).css("background","blue");
							$("#loadtabel").html('update <br> sirkit : "'+namay+'" <br> lokasi : '+lokasiy).fadeIn(6000);
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
		$('i.edit').live("click",function() {	
			kosongkan();
			$("#titlex").html('<h4><span align=center><b>Edit Data</b></span><h4>');
			var idy = $(this).attr("idz");
			//alert(idy);
			
			$.ajax({
				url:"ptransaksi.php?aksi=ambiledit&menu=tsirkit",
				data:"idx="+idy,
				dataType:'json',
				type:"GET",
				success:function(data){
					var statusy		= data.status;
					var id_sirkity	= data.id_sirkit;
					var namay 		= data.nama;
					var lokasiy		= data.lokasi;
					var kegunaany	= data.kegunaan;
					var merky		= data.merk;
					var jmly		= data.jml;
					var thn_opery	= data.thn_oper;
					var kondisiy	= data.kondisi;
					
					if(statusy=='sukses'){
						$("#idform").val(idy);
						$("#id_sirkitTB").val(id_sirkity);
						$("#namaTB").val(namay);
						$("#lokasiTB").val(lokasiy);
						$("#kegunaanTB").val(kegunaany);
						$("#merkTB").val(merky);
						$("#kondisiTB").val(kondisiy);
						$("#thn_operTB").val(thn_opery);
						$("#jmlTB").val(jmly);
						$("#kondisiTB").val(kondisiy);
						
						//$('#id_sirkitTB').prop({disabled:true});
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
			var id_sirkity	= $(this).attr("id_sirkitz");
			var namay		= $(this).attr("namaz");
			var lokasiy		= $(this).attr("lokasiz");
			var kegunaany	= $(this).attr("kegunaanz");
			var merky		= $(this).attr("merkz");
			var thn_opery	= $(this).attr("thn_operz");
			
			$.ajax({
				type:"GET",
				dataType:'json',
				url:"ptransaksi.php",
				data:"aksi=cetak&menu=tsirkit&idx="+idy,//+"&namax="+namay+"&lokasix="+lokasiy,
				success:function(data){
					var sirkity 	= data.nama;
					var lokasiy	= data.lokasi;
					var bodyy		='';
						bodyy		+='<div align=center><b>Detail sirkit (perusahaan)</b></div>';
						bodyy		+='<table align=center >';	
						bodyy		+='<tr><td>sirkit</td><td> :'+ sirkity+'</td></tr>';
						bodyy		+='<tr><td>lokasi</td><td>: '+lokasiy+'</td></tr></table>';
					//$(this).target="_blank";
					//window.open($(this).prop('href'));
					//return false;//alert('hai'+data);
					var print = $('<div>', {
											id:   'cetaksirkit',
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
						url: "ptransaksi.php?aksi=hapus&menu=tsirkit",
						data:"idx=" + idy,
						cache: false,
						success: function(data){
							var statusy		= data.status;
							var namay 		= data.nama;
								
							$("#sirkit_"+idy).css("background","red").fadeOut(2000);
							loadData();
							$("#loadtabel").html(namay+' terhapus').fadeIn(6000);
							//$("#list_"+nim).slideUp('slow', function() {$(this).remove();});
						}
				});
		});
		//end of action hapus 
		
		//hapus semua
		$('#hapusBC').click(function() {	
			if(confirm("lanjutkan menghapus semua sirkit  ?"))
				$.ajax({
						type: "GET",
						dataType:'json',
						url: "ptransaksi.php",
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
		
		//cetak semua
		$('#cetakBCx').click(function(){
			$.ajax({
				type:'post',
				url:'lib/tespddf.php',
				//data :'tabelx=tb_sirkit&idx=id_sirkitkerja',
				data :'tabelx=tb_sirkit',
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
				data: "tabelx=tb_sirkit",
				//data: "tabelx=tb_sirkit&ancur="+md5,
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