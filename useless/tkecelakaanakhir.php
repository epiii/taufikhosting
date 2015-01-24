<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='tkecelakaanakhir'){
?>	
<style>
a.toggler:hover {
	opacity:0.5;
}
a.toggler {
	margin:5px;
	text-decoration:none;
	color:white;
	background: #FF6B24;
	cursor: pointer;
	padding: 5px;
}

a.toggler.off {
	text-decoration:none;
	width:100%;
	font:Arial, Helvetica, sans-serif;
	color:white;
	background: #999;
}
</style>
<link href="css/style-page.css" rel="stylesheet" />        

<script language="javascript" type="text/javascript" src="js/plugins/bootstrap-datepicker.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script> 
<script>
</script>
<link href="js/plugins/chosen/chosen/chosen.css" rel="stylesheet">

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<a  type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/delete2.png" width="50"></a>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="box paint color_14">
				<div class="titlex" id="titlex">
                	
				</div>

				<div class="content full">
					<section id="wizard">
						<div id="rootwizard">
							<div class="content row-fluid mb5">
								<ul class="row-fluid fluid mb5">
									 <li class="span3">
                                        <a class="btn btn-default btn-large" href="#tab1" data-toggle="tab">
                                        <strong>info kecelakaan</strong></a></li>
									  <li class="span3">
                                        <a class="btn btn-default btn-large" href="#tab2" data-toggle="tab">
                                        <strong>Tingkat Resiko(Akhir)</strong></a></li>
									 <li class="span3">
                                        <a class="btn btn-default btn-large" href="#tab3" data-toggle="tab">
                                        <strong>Temuan Investigasi</strong></a></li>
                                     <li class="span3">
                                        <a class="btn btn-default btn-large" href="#tab4" data-toggle="tab">
                                        <strong>Lampiran</strong></a></li>
									<li class="span3"> 
                                        <a class="btn btn-default btn-large" href="#tab5" data-toggle="tab">
                                        <strong>Penyebab Dasar Kecelakaan</strong></a></li>
									<li class="span3">
                                        <a class="btn btn-default btn-large" href="#tab6" data-toggle="tab">
                                        <strong>Tim Investigasi </strong></a></li>
									<li class="span3">
                                        <a class="btn btn-default btn-large" href="#tab7" data-toggle="tab">
                                        <strong>Ppengkaji Ulang</strong></a></li>
								</ul>
							</div>
							<div class="tab-content content">
								<div class="tab-pane" id="tab1">
									<form class="form-horizontal" action='ptransaksi.php' method="get">
										<fieldset>	
										<input type='hidden' id="id_kecelakaanTB" name="id_kecelakaanTB" />
                                		<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="no_refTB">NO. Referensi</label>
                                                    <span class="controls span9"> 
                                                    <input type="text" id="no_refTB" disabled="disabled"name="no_refTB" 
                                                    placeholder="no referensi kecelakaan"class="row-fluid" />
                                                    </span>
											</div>
											
                                            <div class="control-group row-fluid"> 
												<label class="control-label span2"  for="judul_kejadianTB">judul kejadian</label>
												<div class="controls span9">
													<input type="text" id="judul_kejadianTB" name="judul_kejadianTB" disabled="disabled"required placeholder="judul kejadian (wajib diisi)"class="row-fluid">
												</div>
											</div>
											
                                            <div class="control-group row-fluid"> 
												<label class="control-label span2"  for="kategori">kategori</label>
												<div class="controls span10">
						                    	<input type='text' disabled="disabled"id="id_jkecelTB" 
                                                	data-placeholder="id_jkecelTB" name="id_jkecelTB">
                                            	<input type="text"class="chzn-select"disabled="disabled" id="id_subjkecelTB" 
                                                	data-placeholder="id_subjkecelTB" name="id_subjkecelTB">
                                                <input type="text"class="chzn-select"disabled="disabled" id="id_subjkecel2TB" 
                                                	data-placeholder="id_subjkecel2TB" name="id_subjkecel2TB">
                                                </div>
											</div>
										
                                        	<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="tgl_kejadianTB">Tanggal Kejadian </label>
												<div class="controls span5">
													<input type="text" id="tgl_kejadianTB" name="tgl_kejadianTB" 
                                                    class="row-fluid" disabled="disabled"required placeholder="yyyy-mm-dd">
												</div>
                                                <div class="controls span2">
													<input type="text" disabled="disabled" id="jam_kejadianTB" name="jam_kejadianTB" 
                                                    placeholder="hh.mm" class="row-fluid">
												</div>
											
											</div>
										
                                        	<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="tgl_laporTB">Tanggal Lapor </label>
												<div class="controls span5">
													<input type="text" id="tgl_laporTB" disabled="disabled"name="tgl_laporTB" 
                                                    placeholder="yyyy-mm-dd" class="row-fluid">
												</div>
                                                <div class="controls span2">
													<input type="text" id="jam_laporTB"disabled="disabled" name="jam_laporTB" 
                                                    placeholder="hh.mm" class="row-fluid">
												</div>
											
											</div>									
									
                                    		<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="tempatTB">Tempat Kejadian</label>
												<div class="controls span9">
													<input type="text" id="tempatTB" disabled="disabled"name="tempatTB" placeholder="tempat kejadian" class="row-fluid">
												</div>
											</div>
											
                                            </fieldset>
									</form>
								</div>
                            	
                                <div class="tab-pane" id="tab2">
									<form class="form-horizontal" action='ptransaksi.php' method="get">
										<fieldset>
											<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="name">Konsekuensi Aktual</label>
												<div class="controls span9">
													<select id="konsekuensi_aktualTB" name="konsekuensi_aktualTB">
                                                    	<option value="">pilih resiko aktual....</option>
                                                    	<option value="catastrophic">catastropic</option>
                                                    	<option value="major">major</option>
                                                    	<option value="moderate">moderate</option>
                                                    	<option value="minor">minor</option>
                                                    	<option value="insignificant">insignificant</option>
                                                    </select>
                                                </div>
											</div>
                                                
											<div class="control-group row-fluid"> 
                                                <label class="control-label span2"  for="name">Konsekuensi Potensial</label>
												<div class="controls span9">
													<select id="konsekuensi_potensialTB" name="konsekuensi_potensialTB">
                                                    	<option value="">pilih konsekuansi potensial....</option>
                                                    	<option value="catastrophic">catastropic</option>
                                                    	<option value="major">major</option>
                                                    	<option value="moderate">moderate</option>
                                                    	<option value="minor">minor</option>
                                                    	<option value="insignificant">insignificant</option>
                                                    </select>
                                                </div></div>
                                                
											<div class="control-group row-fluid"> 
                                        		<label class="control-label span2"  for="name">Kemungkinan</label>
												<div class="controls span9">
													<select id="kemungkinanTB" name="kemungkinanTB">
                                                    	<option value="">pilih kemungkinan....</option>
                                                    	<option value="almost certain">almost certain</option>
                                                    	<option value="likely">likely</option>
                                                    	<option value="possible">possible</option>
                                                    	<option value="unlikely">unlikely</option>
                                                    	<option value="rare">rare</option>
                                                    </select>
                                                </div></div>

											<div class="control-group row-fluid"> 
                                        		<label class="control-label span2"  for="name">Tingkat Resiko Aktual</label>
												<div class="controls span9">
													<select id="tingkat_resiko_aktualTB" name="tingkat_resiko_aktualTB">
                                                    	<option value="">pilih resiko aktual...</option>
                                                    	<option value="low">low</option>
                                                    	<option value="medium">medium</option>
                                                    	<option value="high">high</option>
                                                    	<option value="extreme">extreme</option>
                                                    </select>
                                                </div></div>

											<div class="control-group row-fluid"> 
                                        		<label class="control-label span2"  for="name">Tingkat Resiko Potensial</label>
												<div class="controls span9">
													<select id="tingkat_resiko_potensialTB" name="tingkat_resiko_potensialTB">
                                                    	<option value="">pilih resiko potensial...</option>
                                                    	<option value="low">low</option>
                                                    	<option value="medium">medium</option>
                                                    	<option value="high">high</option>
                                                    	<option value="extreme">extreme</option>
                                                    </select>
                                                </div>
											</div>
	                                               
										</fieldset>
									</form>
								</div>
                                
                                <div class="tab-pane" id="tab3">
									<form class="form-horizontal" action='ptransaksi.php' method="get">
										<fieldset>
                                            <input type="button" id="tambahInv" class="btn"value="tambah">
                                            <div id="investigasiTS" class="control-group row-fluid"> 
                                                
                                            </div>
                                        </fieldset>
									</form>
								</div>
                                
                                <div class="tab-pane" id="tab4">
									<form class="form-horizontal" action='ptransaksi.php' method="get">
										<fieldset>
											<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="name">instruksi kerja</label>
												<div class="controls span9">
													<select id="jsaTB" name="jsaTB">
                                                    	<option value="0">tidak</option>
                                                    	<option value="1">ya</option>
                                                    </select>
                                                </div>
											</div>
                                            <div class="control-group row-fluid"> 
												<label class="control-label span2"  for="name">pernyataan saksi</label>
												<div class="controls span9">
													<select id="saksiTB" name="saksiTB">
                                                    	<option value="0">tidak</option>
                                                    	<option value="1">ya</option>
                                                    </select>
                                                </div>
											</div>
                                            <div class="control-group row-fluid"> 
												<label class="control-label span2"  for="name">sketsa / gambar</label>
												<div class="controls span9">
													<select id="sketsaTB" name="sketsaTB">
                                                    	<option value="0">tidak</option>
                                                    	<option value="1">ya</option>
                                                    </select>
                                                </div>
											</div>
                                            <div class="control-group row-fluid"> 
												<label class="control-label span2"  for="name">foto -foto</label>
												<div class="controls span9">
													<select id="fotoTB" name="fotoTB">
                                                    	<option value="0">tidak</option>
                                                    	<option value="1">ya</option>
                                                    </select>
                                                </div>
											</div>
                                            <div class="control-group row-fluid"> 
												<label class="control-label span2"  for="name">catatan training </label>
												<div class="controls span9">
													<select id="trainingTB" name="trainingTB">
                                                    	<option value="0">tidak</option>
                                                    	<option value="1">ya</option>
                                                    </select>
                                                </div>
											</div>
                                            <div class="control-group row-fluid"> 
												<label class="control-label span2"  for="name">catatan perbaikan </label>
												<div class="controls span9">
													<select id="perbaikanTB" name="perbaikanTB">
                                                    	<option value="0">tidak</option>
                                                    	<option value="1">ya</option>
                                                    </select>
                                                </div>
											</div>
                                            <div class="control-group row-fluid"> 
												<label class="control-label span2"  for="name">prosedur / instruksi kerja</label>
												<div class="controls span9">
													<select id="prosedurTB" name="prosedurTB">
                                                    	<option value="0">tidak</option>
                                                    	<option value="1">ya</option>
                                                    </select>
                                                </div>
											</div>
                                            <div class="control-group row-fluid"> 
												<label class="control-label span2"  for="name">surat ijin / keterangan keterampilan </label>
												<div class="controls span9">
													<select id="keterampilanTB" name="keterampilanTB">
                                                    	<option value="0">tidak</option>
                                                    	<option value="1">ya</option>
                                                    </select>
                                                </div>
											</div>
                                        <div class="control-group row-fluid"> 
											<label class="control-label span2"  for="name">catatan pemvberitahuna pihak berwenang</label>
												<div class="controls span9">
													<select id="pemberitahuanTB" name="pemberitahuanTB">
                                                    	<option value="0">tidak</option>
                                                    	<option value="1">ya</option>
                                                    </select>
                                                </div>
										</div>
                                        </fieldset>
									</form>
								</div>
                                
                                <div class="tab-pane" id="tab5">
									<form class="form-horizontal" action='ptransaksi.php' method="get">
										<fieldset>
                                        <input type="button" class="btn" id="tambahSeb" value="tambah">
                                        <div id="sebabTS" class="control-group row-fluid"> 
											
										</div>
        								</fieldset>
									</form>
								</div>
                                
                                <div class="tab-pane" id="tab6">
									<form class="form-horizontal" action='ptransaksi.php' method="get">
										<fieldset>
                                            <div class="control-group row-fluid"> 
                                                <label class="control-label span2"  for="pjlokasiTB">Ketua Tim </label>
                                                <div class="controls span5">
                                                    <input type="text" id="ketua_timinvTB" name="ketua_timinvTB" placeholder="nama lengkap" class="row-fluid">		
                                                </div>
                                                <div class="controls span2">
                                                    <input type="text" id="tglmulai_timinvTB" name="tglmulai_timinvTB" placeholder="tanggal mulai " class="row-fluid">		
                                                </div>
                                                <div class="controls span2">
                                                    <input type="text" id="tglakhir_timinvTB" name="tglakhir_timinvTB" placeholder="tanggal diselesaikan" class="row-fluid">		
                                                </div>
                                            </div>	
        								
                                        	<div class="control-group row-fluid"> 
                                                <label class="control-label span2"  for="pjlokasiTB">Anggota 1</label>
                                                <div class="controls span5">
                                                    <input type="text" id="nm_anggota1TB" name="nm_anggota1TB" placeholder="nama lengkap" class="row-fluid">		
                                                </div>
                                                <div class="controls span2">
                                                    <input type="text" id="per_anggota1TB" name="per_anggota1TB" placeholder="perusahaan " class="row-fluid">		
                                                </div>
                                                <div class="controls span2">
                                                    <input type="text" id="jab_anggota1TB" name="jab_anggota1TB" placeholder="jabatan" class="row-fluid">		
                                                </div>
                                            </div>	
        								
                                        	<div class="control-group row-fluid"> 
                                                <label class="control-label span2"  for="pjlokasiTB">Anggota 2</label>
                                                <div class="controls span5">
                                                    <input type="text" id="nm_anggota2TB" name="nm_anggota2TB" placeholder="nama lengkap" class="row-fluid">		
                                                </div>
                                                <div class="controls span2">
                                                    <input type="text" id="per_anggota2TB" name="per_anggota2TB" placeholder="perusahaan " class="row-fluid">		
                                                </div>
                                                <div class="controls span2">
                                                    <input type="text" id="jab_anggota2TB" name="jab_anggota2TB" placeholder="jabatan" class="row-fluid">		
                                                </div>
                                            </div>	
        								
                                        	<div class="control-group row-fluid"> 
                                                <label class="control-label span2"  for="pjlokasiTB">Anggota 3</label>
                                                <div class="controls span5">
                                                    <input type="text" id="nm_anggota3TB" name="nm_anggota3TB" placeholder="nama lengkap" class="row-fluid">		
                                                </div>
                                                <div class="controls span2">
                                                    <input type="text" id="per_anggota3TB" name="per_anggota3TB" placeholder="perusahaan " class="row-fluid">		
                                                </div>
                                                <div class="controls span2">
                                                    <input type="text" id="jab_anggota3TB" name="jab_anggota3TB" placeholder="jabatan" class="row-fluid">		
                                                </div>
                                            </div>	
        								
                                        	<div class="control-group row-fluid"> 
                                                <label class="control-label span2"  for="pjlokasiTB">Anggota 4</label>
                                                <div class="controls span5">
                                                    <input type="text" id="nm_anggota4TB" name="nm_anggota4TB" placeholder="nama lengkap" class="row-fluid">		
                                                </div>
                                                <div class="controls span2">
                                                    <input type="text" id="per_anggota4TB" name="per_anggota4TB" placeholder="perusahaan " class="row-fluid">		
                                                </div>
                                                <div class="controls span2">
                                                    <input type="text" id="jab_anggota4TB" name="jab_anggota4TB" placeholder="jabatan" class="row-fluid">		
                                                </div>
                                            </div>	
        								
                                        </fieldset>
									</form>								
								</div>
                                
                                <div class="tab-pane" id="tab7">
									<form class="form-horizontal" action='ptransaksi.php' method="get">
										<fieldset>
                                            <div class="control-group row-fluid"> 
                                                <label class="control-label span2"  for="pjlokasiTB">kabag K3</label>
                                                <div class="controls span5">
                                                    <input type="text" id="nm_kabagk3TB" name="nm_kabagk3TB" placeholder="nama lengkap" class="row-fluid">		
                                                </div>
                                                <div class="controls span2">
                                                    <input type="text" id="tgl_kabagk3TB" name="tgl_kabagk3TB" placeholder="perusahaan" class="row-fluid">		
                                                </div>
                                                <div class="controls span2">
                                                    <textarea id="kom_kabagk3TB" name="kom_kabagk3TB" placeholder="komentar" class="row-fluid"></textarea>		
                                                </div>
                                            </div>	
        								
                                        	<div class="control-group row-fluid"> 
                                                <label class="control-label span2"  for="pjlokasiTB">Kadep LK3</label>
                                                <div class="controls span5">
                                                    <input type="text" id="nm_kadeplk3TB" name="nm_kadeplk3TB" placeholder="nama lengkap" class="row-fluid">		
                                                </div>
                                                <div class="controls span2">
                                                    <input type="text" id="tgl_kadeplk3TB" name="tgl_kadeplk3TB" placeholder="perusahaan " class="row-fluid">		
                                                </div>
                                                <div class="controls span2">
                                                    <textarea id="kom_kadeplk3TB" name="kom_kadeplk3TB" placeholder="komentar" class="row-fluid"></textarea>		
                                                </div>
                                            </div>	
        								
                                        	<div class="control-group row-fluid"> 
                                                <label class="control-label span2"  for="pjlokasiTB">kakomp Teknologi</label>
                                                <div class="controls span5">
                                                    <input type="text" id="nm_kakompTB" name="nm_kakompTB" placeholder="nama lengkap" class="row-fluid">		
                                                </div>
                                                <div class="controls span2">
                                                    <input type="text" id="tgl_kakompTB" name="tgl_kakompTB" placeholder="perusahaan " class="row-fluid">		
                                                </div>
                                                <div class="controls span2">
                                                    <textarea id="kom_kakompTB" name="kom_kakompTB" placeholder="jabatan" class="row-fluid"></textarea>		
                                                </div>
                                            </div>	
        								
                                        	<div class="control-group row-fluid"> 
                                                <label class="control-label span2"  for="pjlokasiTB">Direktur Produksi</label>
                                                <div class="controls span5">
                                                    <input type="text" id="nm_dproduksiTB" name="nm_dproduksiTB" placeholder="nama lengkap" class="row-fluid">		
                                                </div>
                                                <div class="controls span2">
                                                    <input type="text" id="tgl_dproduksiTB" name="tgl_dproduksiTB" placeholder="perusahaan " class="row-fluid">		
                                                </div>
                                                <div class="controls span2">
                                                    <textarea id="kom_dproduksiTB" name="kom_dproduksiTB" placeholder="jabatan" class="row-fluid"></textarea>		
                                                </div>
                                            </div>	
        								
                                        </fieldset>
									</form>								
								</div>
                                
								<div class="description content">
									<ul class="pager wizard mb5">
                                        <button class="btn btn-success btn-large" type="submit"id="simpanBC">
                                        	Simpan
                                        </button>
										</li>
									</ul>
								</div>
							</div>
							
						</div>
					</section>
				</div>
			</div>
        </div>
	</div>
</div>
	<div class="row-fluid">
		<div class="box ">
			<div class="title">
				<h4> <span>Data Transaksi - Kecelakaan Final</span></h4>&nbsp;
				<select id="kategoriTB">
					<option value="no Referensi " selected="selected">nomer referensi</option>
					<!--<option value="judul_kejadian" selected="selected">Judul Kejadian</option>
					<option value="tempat">Tempat </option>
					<option value="keterangan">Kategori</option>-->
				</select>&nbsp;
				<input type="text" id="objekTB" placeholder="pencarian">&nbsp;
				<span id="loadtabel"> </span>
			</div>
			<!-- End .title -->
			<div class="content top">
				<table id="datatable_examplez" class="responsive table table-striped table-bordered" 
				style="width:100%;margin-bottom:0; ">
					<thead>
						<tr>
							<th class="xjv no_sort">
								<label class="chexckbox ">
									<input type="checkbox">
								</label>
							</th>
							<th class="to_hide_phone  no_sort">no</th>
							<th class="to_hide_phone ue no_sort">No. Refrensi</th>
							<th class="to_hide_phone ue no_sort">Judul Kejadian</th>
							<th class="to_hide_phone ue no_sort">Tempat</th>
							<th class="to_hide_phone ue no_sort">Tgl Kejadian</th>
							<th class="to_hide_phone ue no_sort">Jam Kejadian</th>
							<th class="to_hide_phone ue no_sort">Kategori</th>
							<th class="ms no_sort ">aksi</th>
						</tr>
					</thead>
					<tbody id="isi"> 
						<!--grid tabel-->
					</tbody>
				</table>
			</div>
		</div>
	</div>
<script language="javascript" type="text/javascript" src="js/plugins/chosen/chosen/chosen.jquery.min.js"></script> 
<script type="text/javascript">

    $(document).ready(function(){
		//pemberitahuan
		$('#diperlukanTB').val('tidak');
		$('#diperlukanTB').change(function(){
			var nilai = $(this).val();
			if(nilai=='ya'){
				//$('#diperlukanTB').prop({disabled:false});
				//$('#diperlukanTB').val('');
				$('#instansiTB').val('');
				$('#dilaporkankeTB').val('');
				$('#tglTB').val('');
				$('#jamTB').val('');
				$('#komentarTB').val('');
				
				$('#pihakluar').show();
			}else{
				$('#instansiTB').val('');
				$('#dilaporkankeTB').val('');
				$('#tglTB').val('');
				$('#jamTB').val('');
				$('#komentarTB').val('');
				
				$('#pihakluar').hide();
							
			}
		});
//===============================
            var countp = 0;
			tambahSeb();
 			$("#tambahSeb").click(function(){
				tambahSeb();
			});
			function tambahSeb(){
				countp += 1;
				$('#sebabTS').append(
					'<tr class="rowSeb">' 
						+'<td><label class="control-label span2"  for="penindakTB">Penyebab Dasar</label></td>'
						+'<td>'
							+'<select id="id_sebabdasarTB_'+countp+'" name="id_sebabdasarTB_'+countp+'" placeholder="oleh " class="id_sebabdasarTB"></select>'
						+'</td>'
						+'<td>'
							+'<select id="id_subsebabdasarTB_'+countp+'" name="id_subsebabdasarTB_'+countp+'" placeholder="oleh " class="id_subsebabdasarTB"></select>'
						+'</td>'
						
						+'<td>'
							+'<textarea id="penyebabTB_'+countp+'" name="penyebabTB_'+countp+'" placeholder="keterangan"class="row-fluid"></textarea>'
						+'</td>'
						+'<td>'
							+'<a class="remove_itemP btn" href="#" >Hapus</a>'
							+'<input id="rowp_' + countp + '" name="rowp[]" value="'+ countp +'" type="hidden">'
						+'</td>'
					+'</tr>'
				);
			}
			$(".remove_itemP").live('click', function(){
				$(this).parents(".rowSeb").fadeOut();
				$(this).parents(".rowSeb").remove();
			});
			function combosebabdasar(){
				$.ajax({
					url:'ptransaksi.php',
					type:'get',
					dataType :'json',
					data:'aksi=combo&menu=tkecelakaan&tabel=tb_sebabdasar',
					success:function(data){
						var optiony='';
							$.each(data, function(id,item){
								optiony+='<option value='+item.id_sebabdasar+'>'+item.nm_sebabdasar+'</option>';
							});
							$('#id_sebabdasarTB_'+countp).html(optiony);
					}
				});
			}
			function combosubsebabdasar(x){
				$.ajax({
					url:'ptransaksi.php',
					type:'get',
					dataType :'json',
					data:'aksi=combo&menu=tkecelakaan&tabel=tb_subsebabdasar&idsub='+x,
					success:function(data){
						var optiony='';
							$.each(data, function(id,item){
								optiony+='<option value='+item.id_subsebabdasar+'>'+item.nm_subsebabdasar+'</option>';
							});
							$('#id_subsebabdasarTB_'+countp).html(optiony);
					}
				});
			}
			$('.id_sebabdasarTB').live('focus',function(){
				combosebabdasar();	
			});
			$('.id_subsebabdasarTB').live('focus',function(){
				var idsub = $('#id_sebabdasarTB_'+countp).val();
				combosubsebabdasar(idsub);	
				//alert(idsub);
			});
//=========================
			var count = 0;
			tambahTin();
 			$("#tambahTin").click(function(){
				tambahTin()
			});
			function tambahTin(){
				count += 1;
				$('#tindakanT').append(
					'<tr class="rowTin">' 
						+'<td><label class="control-label span2"  for="penindakTB">Tindakan</label></td>'
						+'<td>'
							+'<input type="text" id="penindakTB_'+count+'" name="penindakTB_'+count+'" placeholder="oleh " class="row-fluid">'
						+'</td>'
						
						+'<td>'
							+'<textarea id="tindakanTB_'+count+'" name="tindakanTB_'+count+'" placeholder="tindakan langsung "class="row-fluid"></textarea>'
						+'</td>'
						
						+'<td>'
							+'<input type="text" id="tanggal_tindakanTB_'+count+'" name="tanggal_tindakanTB_'+count+'"' 
							+'placeholder="tanggal selesai " class="row-fluid">'
						+'</td>'
						+'<td>'
							+'<input type="text" id="jam_tindakanTB_'+count+'" name="jam_tindakanTB_'+count+'"' 
							+'placeholder="jam selesai " class="row-fluid">'
						+'</td>'
						+'<td>'
							+'<a class="remove_item btn" href="#" >Hapus</a>'
							+'<input id="rows_' + count + '" name="rows[]" value="'+ count +'" type="hidden">'
						+'</td>'
					+'</tr>'
				);
			}
			$(".remove_item").live('click', function(){
				$(this).parents(".rowTin").fadeOut();
				$(this).parents(".rowTin").remove();
			});
//=====================
            var countC = 0;
			tambahCid();
 			$("#tambahCid").click(function(){
				tambahCid()
			});
			function tambahCid(){
				countC += 1;
				$('#cideraTS').append(
					'<tr class="rowCid">' 
						+'<td><label class="control-label span2"  for="penindakTB">Cidera</label></td>'
						+'<td>'
							+'<select id="id_jcideraTB_'+countC+'" title="jenis cidera" name="id_jcideraTB_'+countC+'" class="id_jcideraTB">'
								+'<option value=>Pilih jenis cidera..</option>'
							+'</select>'
						+'</td>'
						
						+'<td>'
							+'<select id="id_bagtubuhTB_'+countC+'" title="bagian tubuh" name="id_bagtubuhTB_'+countC+'"  class="id_bagtubuhTB">'
								+'<option value=>Pilih bagian tubuh ..</option>'
							+'</select>'
						+'</td>'
						+'<td>'
							+'<select id="kiriTB_'+countC+'" name="kiriTB_'+countC+'"  title="bagian kiri" class="kiriTB">'
								+'<option value=0>tidak</option>'
								+'<option value=1>ya</option>'
							+'</select>'
						+'</td>'
						+'<td>'
							+'<select id="kananTB_'+countC+'" name="kananTB_'+countC+'"  title="bagian kanan" class="kananTB">'
								+'<option value=0>tidak</option>'
								+'<option value=1>ya</option>'
							+'</select>'
						+'</td>'
						+'<td>'
							+'<a class="remove_itemC btn" href="#" >Hapus</a>'
							+'<input id="rowc_' + countC + '" name="rowc[]" value="'+ countC +'" type="hidden">'
						+'</td>'
					+'</tr>'
				);
			}
			$(".remove_itemC").live('click', function(){
				$(this).parents(".rowCid").fadeOut();
				$(this).parents(".rowCid").remove();
			});
			$('.id_jcideraTB').live('focus',function(){
				combojcidera();	
			});
			function combojcidera(){
				$.ajax({
					url:'ptransaksi.php',
					type:'get',
					dataType :'json',
					data:'aksi=combo&menu=tkecelakaan&tabel=tb_jcidera',
					success:function(data){
						var optiony='';
							$.each(data, function(id,item){
								optiony+='<option value='+item.id_jcidera+'>'+item.nama_jcidera+'('+item.keterangan+')</option>';
							});
							$('#id_jcideraTB_'+countC).html(optiony);
					}
				});
			}
			$('.id_bagtubuhTB').live('focus',function(){
				combobagtubuh();	
			});
			function combobagtubuh(){
				$.ajax({
					url:'ptransaksi.php',
					type:'get',
					dataType :'json',
					data:'aksi=combo&menu=tkecelakaan&tabel=tb_bagtubuh',
					success:function(data){
						var optiony='';
							$.each(data, function(id,item){
								optiony+='<option value='+item.id_bagtubuh+'>'+item.nama_bagtubuh+'('+item.keterangan+')</option>';
							});
							$('#id_bagtubuhTB_'+countC).html(optiony);
					}
				});
			}
			
//===============================
            var count2 = 0;
			tambahInv();
 			$("#tambahInv").click(function(){
				tambahInv()
			});
			function tambahInv(){
				count2 += 1;
				$('#investigasiTS').append(
					'<tr class="rowInv">' 
						+'<td><label class="control-label span2"  for="hasil_investigasiTB">investigasi</label></td>'
						+'<td>'
							+'<textarea id="hasil_investigasiTB_'+count2+'" name="hasil_investigasiTB_'+count2+'" placeholder="hasil investigasi" class="hasil_investigasiTB"></textarea>'
						+'</td>'
						
						+'<td>'
							+'<select id="id_katinvestigasiTB_'+count2+'" name="id_katinvestigasiTB_'+count2+'"class="id_katinvestigasiTB">'
							+'</select>'
						+'</td>'
						
						+'<td>'
							+'<select id="statusTB_'+count2+'" name="statusTB_'+count2+'" class="row-fluid">'
							+'<option value="0">faktor pendukung</option>'
							+'<option value="1">faktor utama</option>'
							+'</select>'
						+'</td>'
						+'<td>'
							+'<a class="remove_itemx btn" href="#" >Hapus</a>'
							+'<input id="rowi_' + count2 + '" name="rowi[]" value="'+ count2 +'" type="hidden">'
						+'</td>'
					+'</tr>'
				);
			}
			$(".remove_itemx").live('click', function(){
				$(this).parents(".rowInv").fadeOut();
				$(this).parents(".rowInv").remove();
			});

			$('.id_katinvestigasiTB').live('focus',function(){
				combokatinvestigasi();
				//alert('hai');
			})
			function combokatinvestigasi(){
				$.ajax({
					url:'ptransaksi.php',
					type:'get',
					dataType:'json',
					data:'aksi=combo&menu=tkecelakaan&tabel=tb_katinvestigasi',
					success:function(data){
						var optiony ='';
							$.each(data, function (id,item){
								optiony+='<option value='+item.id_katinvestigasi+'>'+item.nama_katinvestigasi+'</option>';
							});
							$('#id_katinvestigasiTB_'+count2).html(optiony);
					}
				});
			}
	//tbah orang====================		
			var counter = 0;
			tambahOrgs();
 			$("#tambahOrgs").click(function(){
				tambahOrgs();
			});
			function tambahOrgs(){
				counter += 1;
				$('#orgterlibatT').append(
					'<tbody class="rowOrg">'
						+'<tr >' 
							 +'<td>'
								+'<select class="asalTB" nilai="'+counter+'" name="asalTB_'+counter+'" id="asalTB_'+counter+'">'
									+'<option value="" selected="selected">pilih asal</option>'
									+'<option value="internal">internal</option>'
									+'<option value="eksternal">eksternal</option>'
								+'</select>'
							  +'</td>'
							  
							  +'<td>'
									+'<select name="orgterlibatTB_'+counter+'"  class="orgterlibatTB" id="orgterlibatTB_'+counter+'" >'
									+'</select>'
							  +'</td>'
						
							  +'<td><input type="text" name="orgterlibat2TB_'+counter +'" disabled="disabled"  class="orgterlibat2TB" placeholder="nama orang" '
							  	+'id="orgterlibat2TB_'+counter+'">'
							  +'</td>'
						+'</tr>'			  
						+'<tr>'
							+'<td><label class="control-label span2"><tr>'
							+'<td>orgterlibat</td></label><td>:<input type="text" value="'+data.aktivitas+'" id="aktivitasTB_'+counter+'" name="aktivitasTB_'+counter+'" ></td></tr>'
						+'<tr>'
							+'<td><label class="control-label span2"><tr>'
							+'<td>aktivitas</td></label><td>:<input type="text" value="'+data.aktivitas+'" id="aktivitasTB_'+counter+'" name="aktivitasTB_'+counter+'" ></td></tr>'
						+'<tr>'
							+'<td><label class="control-label span2"><tr>'
							+'<td>NIK</td></label><td>:<input type="text" id="NIKTB_'+counter+'" name="NIKTB_'+counter+'" value="'+data.NIK+'"></td></tr>'
						+'<tr>'
							+'<td><label class="control-label span2"><tr>'
							+'<td>jenis kelamin </td></label><td>:<input type="text" id="jkelaminTB_'+counter+'" name="jkelaminTB_'+counter+'" value="'+data.jkelamin+'"></td></tr>'
						+'<tr>'
							+'<td><label class="control-label span2"><tr>'
							+'<td>tanggal lahir</td></label><td>:<input type="text" value="'+data.tgllahir+'" id="tgllahirTB_'+counter+'" name="tgllahirTB_'+counter+'" ></td></tr>'
						+'<tr>'
							+'<td><label class="control-label span2"><tr>'
							+'<td>jabatan</td></label><td>:<input type="text" value="'+data.nama_jabatan+'" id="nama_jabatanTB_'+counter+'" name="nama_jabatanTB_'+counter+'" ></td></tr>'
						+'<tr>'
							+'<td><label class="control-label span2"><tr>'
							+'<td>bagian</td></label><td>:<input type="text" value="'+data.nama_bagian+'" id="nama_bagianTB_'+counter+'" name="nama_bagianTB_'+counter+'" ></td></tr>'
						+'<tr>'
							+'<td><label class="control-label span2"><tr>'
							+'<td>department</td></label><td>:<input type="text" value="'+data.nama_department+'" id="nama_departmentTB_'+counter+'" name="nama_departmentTB_'+counter+'" ></td></tr>'
						+'<tr>'
							+'<td><label class="control-label span2"><tr>'
							+'<td>shift kerja</td></label><td>:<input type="text" id="nama_shiftkerjaTB_'+counter+'" name="nama_shiftkerjaTB_'+counter+'"  value="'+data.nama_shiftkerja+'"></td></tr>'
		 				+'<tr>'
		 					+'<td><label class="control-label span2"><tr>'
							+'<td>status kerja</td></label><td>:<input type="text" id="nama_statuskerjaTB_'+counter+'" name="nama_statuskerjaTB_'+counter+'" value="'+data.nama_statuskerja+'"></td></tr>'
			
						+'<tr>'
							+'<td>'
								+'<a class="remove_item2 btn" href="#" >Hapus</a>'
								+'<input id="rowz_' + counter + '" name="rowz[]" value="'+ counter +'" type="hidden">'
							+'</td>'
						+'</tr>'
					+'</tbody>'
				);
			}
			$(".remove_item2").live('click', function(){
				$(this).parents(".rowOrg").fadeOut();
				$(this).parents(".rowOrg").remove();
			});

		$('.asalTB').live('change',function(){
			function kosongin(){
				$('#jkelaminTB_'+counter).val('');
				$('#tgllahirTB_'+counter).val(''); 
				$('#aktivitasTB_'+counter).val(''); 
				$('#nama_jabatanTB_'+counter).val(''); 
				$('#nama_bagianTB_'+counter).val(''); 
				$('#nama_departmentTB_'+counter).val(''); 
				$('#nama_shiftkerjaTB_'+counter).val(''); 
				$('#nama_statuskerjaTB_'+counter).val(''); 
				$('#NIKTB_'+counter).val(''); 
			}
			var comboy = $(this).val();
			if(comboy=='internal'){
				$('.orgterlibatTB').prop({disabled:false});
				$('.orgterlibat2TB').prop({disabled:true});
				
				$.ajax({
					url:'ptransaksi.php',
					type:'get',
					dataType:'json',
					data:'aksi=combo&menu=tkecelakaan&tabel=tb_pekerja',
					success:function(data){
						var optiony ='';
							$.each(data, function (id,item){
								optiony+='<option value='+item.id_pekerja+'>'+item.nama_pekerja+'</option>';
							});
							$('#orgterlibatTB_'+counter).html(optiony);
					}
				});
			}else{
				$('.orgterlibatTB').prop({disabled:true});
				$('.orgterlibat2TB').prop({disabled:false});
				kosongin();
			}
			$('.orgterlibatTB').live('change',function(){
				var id_pekerjay = $('#orgterlibatTB_'+counter).val();
				$.ajax({
					url:'ptransaksi.php',
					type:'get',
					dataType:'json',
					data:'aksi=result&menu=tkecelakaan&tabel=tb_pekerja&idx='+id_pekerjay,
					success:function(data){
						if(data.status=='sukses'){
							$('#NIKTB_'+counter).val(data.NIK);
							$('#jkelaminTB_'+counter).val(data.jkelamin);
							$('#tgllahirB_'+counter).val(data.tgllahir); 
							$('#nama_jabatanTB_'+counter).val(data.nama_jabatan); 
							$('#nama_bagianTB_'+counter).val(data.nama_bagian); 
							$('#nama_departmentTB_'+counter).val(data.nama_department); 
							$('#nama_shiftkerjaTB_'+counter).val(data.nama_shiftkerja); 
							//$('#nama_statuskerjaTB_'+counter).val(data.nama_statuskerja);
						}else{
							alert('gagal fertch');
						}
						
					}
				});
			});
			
			
		});
		
		$('#tambahBC').click(function(){
			$('#diperlukanTB').val('tidak');
			$('#pihakluar').hide();
			$('#myModal').modal('show');
		});	
		
		$('a.toggler off').live('click',function(){
			//alert('asikkk');
			$(this).toggleClass('off');
			if ($(this).attr('title')=='aktif'){
				alert('mati'); 
				$(this).attr({'title':'tidak aktif','nilai':'0'});
			}else{
				alert('hidup');
				$(this).attr({'title':'aktif','nilai':'1'});
			}
		});
		                 
		$('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
			var $total = navigation.find('li').length;
			var $current = index+1;
			var $percent = ($current/$total) * 100;
			$('#rootwizard').find('.bar').css({width:$percent+'%'});

			if($current >= $total) {
				$('#rootwizard').find('.pager .next').hide();
				$('#rootwizard').find('.pager .finish').show();
				$('#rootwizard').find('.pager .finish').removeClass('disabled');
			} else if($current==1){
				$('#rootwizard').find('.pager .previous').hide();
			}
			else {
				$('#rootwizard').find('.pager .previous').show();
				$('#rootwizard').find('.pager .next').show();
				$('#rootwizard').find('.pager .finish').hide();
			}
		}});
		//end of wizard 
		
		//combo jeniskecel
		function combojkecel(){
			$.ajax({
				url:'ptransaksi.php',
				type:'get',
				dataType :'json',
				data:'aksi=combo&menu=tkecelakaan&tabel=tb_jkecel',
				success:function(data){
					var optiony = '';
					$.each(data, function(id,item){
						optiony+='<option value='+item.id_jkecel+'> '+item.nama_jkecel+'</option>';
					});
					$('#id_jkecelTB').html('<option value=>pilih jenis kecelakaan</option>'+optiony);
				}
			});
		}
		function combosubjkecel(id1){
			var combox = '';
			$.ajax({
				url:'ptransaksi.php',
				type:'get',
				dataType :'json',
				data:'aksi=combo&menu=tkecelakaan&tabel=tb_subjkecel&id1='+id1,
				success:function(data){
					$.each(data, function(id,item){
						combox+='<option value='+item.id_subjkecel+'> '+item.ket_subjkecel+'</option>';
					});
					$('#id_subjkecelTB').html('<option value=>pilih sub jenis kecelakaan </option>'+combox);
				}
			});
		}
		function combosubjkecel2(id2){
			var combox = '';
			$.ajax({
				url:'ptransaksi.php',
				type:'get',
				dataType :'json',
				data:'aksi=combo&menu=tkecelakaan&tabel=tb_subjkecel2&id2='+id2,
				success:function(data){
					$.each(data, function(id,item){
						if(item.status=='kosong'){
							combox+='<option value=>tidak ada data</option>';
						}else{
							combox+='<option value='+item.id_subjkecel2+'> '+item.ket_subjkecel2+'</option>';
						}
					});
					$('#id_subjkecel2TB').html('<option value=>pilih jenis kecelakaan dahulu</option>'+combox);
				}
			});
		}
		
		//selecao
		$('#id_jkecelTB').change(function(){
			var id1= $('#id_jkecelTB').val();
			combosubjkecel(id1);
		});
		$('#id_subjkecelTB').change(function(){
			var id2= $('#id_subjkecelTB').val();
			combosubjkecel2(id2);
			
			/*var subjenis = $('#id_subjkecelTB').val();
			if(subjenis=='1' || subjenis=='2' || subjenis=='3'  ){
				$('#propertiT').hide();
				$('#cideraT').show();
				$('#orangT').show();
				$('#lingkunganT').hide();
			}else if(subjenis=='4' || subjenis=='5'){
				$('#propertiT').show();
				$('#cideraT').hide();
				$('#orangT').hide();
				$('#lingkunganT').hide();
			}else if(subjenis=='6'){
				$('#propertiT').hide();
				$('#cideraT').hide();
				$('#orangT').hide();
				$('#lingkunganT').show();
			}*/
		});
		loadData();
		
		//fungai loading mode "normal"
		function loadData(){
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			var dataString;
			var cari 	= $("input#objekTB").val();
			var combo 	= $("select#kategoriTB").val();
			
			if (combo == "judul_kejadian"){
				dataString = 'judul_kejadian='+ cari;
			}
			else if (combo == "tempat"){
				dataString = 'tempat='+ cari;
			}
			else if (combo == "keterangan"){
				dataString = 'keterangan='+ cari;
			}
			
			$.ajax({
				url	: "ptransaksi.php?aksi=tampil&menu=tkecelakaanakhir",
				type: "GET",
				data: dataString,
				success:function(data){
					$("#loadtabel").fadeOut(1000);
					$('#isi').hide().html(data).fadeIn(1000);
				}
			});
		}
		//end of fungsi loading mode "normal"
		
		//fungsi loading mode "paging"
		var page;
		function pagination(page){
			$('#loadtabel').html('<img src="img/w8.gif">').fadeIn();
			var cari = $("input#objekTB").val();
			var combo = $("select#kategoriTB").val();
			
			if (combo == "judul_kejadian"){
				dataString = 'starting='+page+'&judul_kejadian='+cari;//+'&random='+Math.random();
			}
			else if (combo == "tempat"){
				dataString = 'starting='+page+'&tempat='+cari;//+'&random='+Math.random();
			}
			else if (combo == "keterangan"){
				dataString = 'starting='+page+'&keterangan='+cari;//+'&random='+Math.random();
			}
			else{
				dataString = 'starting='+page;//+'&random='+Math.random();
			}
			
			$.ajax({
				url:"ptransaksi.php?aksi=tampil&menu=tkecelakaan",
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
			}
			else if ((cari.replace(/\s/g,"") == "") && (combo != "semua") ){
			  $("input#objekTB").focus();
				loadData();
			}
			else{
			  loadData();
			}
			return false;
		});
		
		//cari objekTB
		$("#objekTB").keyup(function(){
			var cari = $("input#objekTB").val();
			var combo = $("select#kategoriTB").val();
			if (cari.replace(/\s/g,"") != ""){ // mengecek field text kosong atau tidak)
				loadData();
			}
			else if ((cari.replace(/\s/g,"") == "") && (combo != "semua") ){
				$("input#objekTB").focus();
				loadData();
			}
			else{
			  loadData();
			}
			return false;	
		});
		
		function kosongkan(){
			//info kecelakaan
			$("#id_kecelakaanTB").val('');
			
			//tingkat resiko
			$("#konsekuensi_aktualTB").val('');
			$("#konsekuensi_potensialTB").val('');
			$("#kemungkinanTB").val('');
			$("#tingkat_resiko_aktualTB").val('');
			$("#tingkat_resiko_potensialTB").val('');
			
			//temuan investigasi // looping
			$("#investigasiTS").empty();
			
			//lampiran
			$("#jsaTB").val('');
			$("#saksiTB").val('');
			$("#sketsaTB").val('');
			$("#fotoTB").val('');
			$("#trainingTB").val('');
			$("#perbaikanTB").val('');
			$("#prosedurTB").val('');
			$("#keterampilanTB").val('');
			$("#pemberitahuanTB").val('');
			
			//penyebab dasar //looping
			$("#sebabTS").empty();
			
			//tim investigasi
				$("#ketua_timinvTB").val('');
				$("#tglmulai_timinvTB").val('');
				$("#tglakhir_timinvTB").val('');
			$("#nm_anggota1TB").val('');
			$("#nm_anggota2TB").val('');
			$("#nm_anggota3TB").val('');
			$("#nm_anggota4TB").val('');
				$("#per_anggota1TB").val('');
				$("#per_anggota2TB").val('');
				$("#per_anggota3TB").val('');
				$("#per_anggota4TB").val('');
			$("#jab_anggota1TB").val('');
			$("#jab_anggota2TB").val('');
			$("#jab_anggota3TB").val('');
			$("#jab_anggota4TB").val('');
			
			//pengkaji ulang
			$("#nm_kabagk3TB").val('');
			$("#tgl_kabagk3TB").val('');
			$("#kom_kabagk3TB").val('');
				$("#nm_kadeplk3TB").val('');
				$("#tgl_kadeplk3TB").val('');
				$("#kom_kadeplk3TB").val('');
			$("#nm_kakompTB").val('');
			$("#tgl_kakompTB").val('');
			$("#kom_kakompTB").val('');
				$("#nm_dproduksiTB").val('');
				$("#tgl_dproduksiTB").val('');
				$("#kom_dproduksiTB").val('');

		}
		
		//combo tipedampak  lingkungan
		function combotipedampak(){
			$.ajax({
				url:'ptransaksi.php',
				type:'get',
				dataType :'json',
				data:'aksi=combo&menu=tkecelakaan&tabel=tb_tipedampak',
				success:function(data){
					var optiony = '';
					$.each(data, function(id,item){
						optiony+='<option value='+item.id_tipedampak+'>'+item.nama_tipedampak+'</option>';
					});
					$('#id_tipedampakTB').html('<option value=></option>'+optiony);
				}
			});
		}
		
		function simpan(){
			var urlx 	= $('.form-horizontal').attr('action');
			
			var urlx2 = "?aksi=tambah&menu=tkecelakaanakhir";
			$.ajax({
				type: 'POST',
				dataType:'json',
				url: urlx + urlx2,
				data: $('.form-horizontal').serialize(),
				success: function(data){
					var statusy = data.status;
					if(statusy=='sukses'){
						$('#myModal').modal('hide');
						loadData();
					}else{
						alert('gagal disimpan');
					}
				}
			});
			return false;
		}
		
		//aksi simpan
		$('#simpanBC').click(function(){
			if(confirm("yakin anda sudah mengisi data dengan lengkap?")){
				simpan();
			}
		});
		$('.form-horizontal').submit(function(){
			if(confirm("yakin anda sudah mengisi data dengan lengkap?")){
				simpan();
			}
		});
		//end of aksi simpan
		
		//action klik lapor
		$('i.gicon-lapor').live("click",function() {	
			kosongkan();
			tambahSeb();
			tambahInv()
 			
			$("#titlex").html(' <h1><span align=center><b>Kecelakaan - Final (Lapor)</b></span><h1>');
			var idx 	= $(this).attr("idx");
			var idz		= $(this).attr("idz");
			var jdl		= $(this).attr("jdl");
			var kat1	= $(this).attr("kat1");
			var kat2	= $(this).attr("kat2");
			var kat3	= $(this).attr("kat3");
			var tgl1	= $(this).attr("tgl1");
			var tgl2	= $(this).attr("tgl2");
			var jam1	= $(this).attr("jam1");
			var jam2	= $(this).attr("jam2");
			var tempat	= $(this).attr("tempat");
		
			$("#id_kecelakaanTB").val(idx);
			$("#no_refTB").val(idz);
			$("#judul_kejadianTB").val(jdl);
			$("#id_jkecelTB").val(kat1);
			$("#id_subjkecelTB").val(kat2);
			$("#id_subjkecel2TB").val(kat3);
			$("#tgl_kejadianTB").val(tgl1);
			$("#tgl_laporTB").val(tgl2);
			$("#jam_laporTB").val(jam1);
			$("#jam_kejadianTB").val(jam2);
			$("#tempatTB").val(tempat);
			
			$('#myModal').modal('show');
	
		});	
		//end of action klik edit
		
		//action klik edit
		$('i.reset').live("click",function() {	
			var idy		= $(this).attr('idz');
			var juduly 	= $(this).attr('namaz');
			if(confirm("melanjutkan me-reset laporan '"+juduly+"' ?"))
				$.ajax({
						type: "GET",
						dataType:"json",
						url: "ptransaksi.php?aksi=result&menu=tkecelakaan&tabel=tb_kecelakaan2",
						data:"idx=" + idy,
						cache: false,
						success: function(data){
							var statusy	= data.status;
							if(statusy=='sukses'){
								//alert('berhasil reset');
								$("#kecelakaan_"+idy).css("background","blue").fadeOut(2000);
								loadData();
							}else{
								alert('gagal reset');
							}	
						}
				});
		});
		
		//action klik edit
		$('i.gicon-edit').live("click",function() {	
			kosongkan();
			$("#titlex").html(' <h4><span align=center><b>Edit Data</b></span><h4>');
			var idy = $(this).attr("idz");

			$.ajax({
				url:"ptransaksi.php?aksi=ambiledit&menu=tkecelakaanakhir",
				data: "idx="+idy,
				dataType:'json',
				type:"GET",
				success:function(data){
					var statusy		= data.status;
					$("#titlex").html(' <h4><span align=center><b>lapor Data final</b></span><h4>');
					var idx = $(this).attr("idx");
					var idz= $(this).attr("idz");
					var jdl= $(this).attr("jdl");
					var kat1= $(this).attr("kat1");
					var kat2= $(this).attr("kat2");
					var kat3= $(this).attr("kat3");
					var tgl1= $(this).attr("tgl1");
					var tgl2= $(this).attr("tgl2");
					var jam1= $(this).attr("jam1");
					var jam2= $(this).attr("jam2");
					var tempat= $(this).attr("tempat");
					if(statusy=='sukses'){
							$("#no_refTB").val(idz);
							$("#judul_kejadianTB").val(jdl);
							$("#id_jkecelTB").val(kat1);
							$("#id_subjkecelTB").val(kat2);
							$("#id_subjkecel2TB").val(kat3);
							$("#tgl_kejadianTB").val(tgl1);
							$("#tgl_laporTB").val(tgl2);
							$("#jam_laporTB").val(jam1);
							$("#jam_kejadianTB").val(jam2);
							$("#tempatTB").val(tempat);
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
			var namay= $(this).attr("namaz");
			var keterangany= $(this).attr("keteranganz");
			
			$.ajax({
				type:"GET",
				dataType:'json',
				url:"ptransaksi.php",
				data:"aksi=cetak&menu=tkecelakaan&idx="+idy,//+"&namax="+namay+"&keteranganx="+keterangany,
				success:function(data){
					var shifty 		= data.nama_shift;
					var keterangany	= data.keterangan;
					var bodyy		='';
						bodyy		+='<div align=center><b>Shift Kerja</b></div>';
						bodyy		+='<table align=center >';	
						bodyy		+='<tr><td>Shift</td><td> :'+ shifty+'</td></tr>';
						bodyy		+='<tr><td>Keterangan</td><td>: '+keterangany+'</td></tr></table>';
					var print = $('<div>', {
											id:   'cetakShift',
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
		$('i.gicon-remove').live("click",function() {	
			var idy = $(this).attr("idz");
			 
			if(confirm("lanjutkan menghapus '"+idy+"' ?"))
				$.ajax({
						type: "GET",
						dataType:"json",
						url: "ptransaksi.php?aksi=hapus&menu=tkecelakaan",
						data:"idx=" + idy,
						cache: false,
						success: function(data){
							var statusy			= data.status;
							var judul_kejadiany	= data.judul_kejadian;
								
							$("#kecelakaan_"+idy).css("background","red").fadeOut(2000);
							loadData();
							$("#loadtabel").html('judul kejadian: "'+judul_kejadiany).fadeIn(6000);
							//$("#list_"+nim).slideUp('slow', function() {$(this).remove();});
						}
				});
		});
		//end of action hapus 
		
		//hapus semua
		$('#hapusBC').click(function() {	
			if(confirm("lanjutkan menghapus semua data ?"))
				$.ajax({
						type: "GET",	
						dataType:'json',
						url: "ptransaksi.php",
						data:"aksi=hapussemua&menu=tkecelakaan",
						success: function(data){
							//var x = jQuery.parseJSON(data);
							if(data.status=='sukses'){
							//if(data=='sukses'){
								loadData();
							}else{
								alert('terjadi kesalahan pada proses database');
							}
						}
				});
		});
		
		$('.btn ok').click(function(){
				alert('ok');
		});
		
		// Datepicker
		$('#xtgl_kejadianTB').datepicker({
			format: 'yyyy-mm-dd',
			changeMonth:true,
			changeYear:true,
		});$('#xtgl_laporTB').datepicker({
			dateformat: 'yyyy-mm-dd',
			changeMonth:true,
			changeYear:true,
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