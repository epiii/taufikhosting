<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='tkecelakaan'){
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
		//$(function() {
/*		$(document).ready(function() {
			$('#nama_pekerjaTB').val('');
			$( "#nama_pekerjaTB" ).autocomplete({
				minLength: 1,
				maxHeight: 100, 
				overflow: 'auto',
				source: "./proses.php",
				focus: function( event, ui ) {
					$( "#nama_pekerjaTB" ).val( ui.item.nama_pekerja);
					return false;
				},
				select: function( event, ui ){
					$( "#nama_pekerjaTB" ).val( ui.item.nama_pekerja);
					$( "#NIKTB" ).val( ui.item.NIK);
					$( "#nama_jabatanTB" ).val( ui.item.nama_jabatan);
					$( "#nama_bagianTB" ).val( ui.item.nama_bagian);
					$( "#nama_departmentTB" ).val( ui.item.nama_department);
					$( "#nama_shiftkerjaTB" ).val( ui.item.nama_shiftkerja);
					$( "#nama_statuskerjaTB" ).val( ui.item.nama_statuskerja);
					return false;
				}
			})
			.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
				return $( "<li>" )
				.append( "<a>" + item.nama_pekerja+ "<br> jkelamin :" + item.jkelamin+ "<img src='delete2.png' width='20'></a>" )
				.appendTo( ul );
			};
});*/
</script>
<link href="js/plugins/chosen/chosen/chosen.css" rel="stylesheet">

<a data-toggle="modal" id="tambahBC" class="btn btn-info btn-large">Tambah Data</a>
<!--<button class="btn btn-warning color_14" id="hapusBC">Kosongkan</button>-->
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
									<li id="detailT" class="span3">
                                        <a class="btn btn-default btn-large" href="#tab1" data-toggle="tab">
                                        <strong> Detail </strong></a></li>
									<li class="span3">
                                        <a class="btn btn-default btn-large" href="#tab6" data-toggle="tab">
                                        <strong>Tindakan Langsung</strong></a></li>
                                    <li class="span3">
                                        <a class="btn btn-default btn-large" href="#tab7" data-toggle="tab">
                                        <strong>Tingkat Resiko(Awal)</strong></a></li>
									<li class="span3">
                                        <a class="btn btn-default btn-large" href="#tab16" data-toggle="tab">
                                        <strong>Gambar/Foto</strong></a></li>
									<li id="orangT"  class="span3">
                                        <a class="btn btn-default btn-large" href="#tab2" data-toggle="tab">
                                        <strong>Orang Terlibat</strong></a></li>
									<li id="cideraT"  class="span3">
                                        <a class="btn btn-default btn-large" href="#tab3" data-toggle="tab">
                                        <strong>Cidera / Sakit</strong></a></li>
									<li id="rawatTS"  class="span3">
                                        <a class="btn btn-default btn-large" href="#tab17" data-toggle="tab">
                                        <strong>Hasil Perawatan</strong></a></li>
                                    <li id="propertiT"  class="span3">
                                        <a class="btn btn-default btn-large" href="#tab5" data-toggle="tab">
                                        <strong>Kerusakan Properti</strong></a></li>
									<li id="lingkunganT"  class="span3">
                                        <a class="btn btn-default btn-large" href="#tab4" data-toggle="tab">
                                        <strong>Lingkungan </strong></a></li>
									<li class="span3">
                                        <a class="btn btn-default btn-large" href="#tab9" data-toggle="tab">
                                        <strong>Pemberitahuan</strong></a></li>
									<li class="span3">
                                        <a class="btn btn-default btn-large" href="#tab10" data-toggle="tab">
                                        <strong>Laporan Diketahui</strong></a></li>
								</ul>
							</div>
							<form enctype="multipart/form-data" class="form-horizontal" action='ptransaksi.php?aksi=tambah&menu=tkecelakaan' method="post">
							<div class="tab-content content">
								<input type="hidden" id="idform" />
									<div class="tab-pane" id="tab17">
										<fieldset>
                            				<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="name">Deskripsi Perawataan</label>
												<div class="controls span9">
													<textarea id="deskripsi_perTB" name="deskripsi_perTB" placeholder="deskripsi perwatan dan kondisi korban" ></textarea>
												</div>
											</div>									
								
                                			<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="name">Hasil Perawatan</label>
												<div class="controls span9">
                                            		<select id="hasil_perTB" name="hasil_perTB" >
                                                    	<option value="p1">kembali kerja normal</option>
                                                    	<option value="p2">menjalani perawatan P3K</option>
                                                    	<option value="p3">dirujuk untuk mendapatkan perawatan  dokter / rumah sakit  / pengobatan medis lanjut</option>
                                                    	<option value="p4">kembali kerja dengan pembatasan aktivitas</option>
                                                    	<option value="p5">tidak kembali ke tempat kerja </option>
                                                    	<option value="p6">lain lain </option>
                                                    </select>
												</div>
											</div>									
								
                                			<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="name">Penyedia </label>
												<div class="controls span9">
													<input type="text" name="pj_perTB" id="pj_perTB" placeholder="penanggung jawab "/>
                                            		<input type="text" name="tgl_perTB" id="tgl_perTB" placeholder="tanggal (format : yyyy-mm-dd)"/>
                                            		<input type="text" name="jam_perTB" id="jam_perTB" placeholder="jam (format : hh.mm)"/>
                                                  </div>
											</div>									
										    
                                			<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="name">Tempat / Provider Perawatan</label>
												<div class="controls span9">
													<input type="text" id="tempat_perTB" name="tempat_perTB" placeholder="tempat / provider perawatan"/>
													<input type="text" id="contaper_perTB" name="contaper_perTB" placeholder="contact person" />
													<input type="text" id="contactno_perTB" name="contactno_perTB" placeholder="contact no." />
                                                </div>
											</div>
										</fieldset>
								</div>						
                                <div class="tab-pane" id="tab1">
									<fieldset>	
										<div class="control-group row-fluid"> 
											<label class="control-label span2" for="no_refTB">NO. Referensi</label>
												<span class="controls span9"> 
												<input type="text" id="no_refTB" readonly="readonly"readonlyname="no_refTB" 
												placeholder="no referensi kecelakaan"class="row-fluid" />
												</span>
										</div>
										
										
										<div class="control-group row-fluid"> 
											<label class="control-label span2"  for="judul_kejadianTB">judul kejadian</label>
											<div class="controls span9">
												<input type="text" id="judul_kejadianTB" name="judul_kejadianTB" required placeholder="judul kejadian (wajib diisi)"class="row-fluid">
											</div>
										</div>
										
										<div class="control-group row-fluid"> 
											<label class="control-label span2"  for="kategori">kategori</label>
											<div class="controls span10">
											<select class="chzn-select" id="id_jkecelTB" 
												data-placeholder="id_jkecelTB" name="id_jkecelTB">
											</select>
											<select class="chzn-select" id="id_subjkecelTB" 
												data-placeholder="id_subjkecelTB" name="id_subjkecelTB">
												<option value=>pilih jenis kecelakaan dahulu</option>
											</select>
											<select class="chzn-select" id="id_subjkecel2TB" 
												data-placeholder="id_subjkecel2TB" name="id_subjkecel2TB">
												<option value=>pilih sub jenis kecelakaan dahulu</option>
											</select>
											</div>
										</div>
									
										<div class="control-group row-fluid"> 
											<label class="control-label span2"  for="tgl_kejadianTB">Tanggal Kejadian </label>
											<div class="controls span5">
												<input type="text" id="tgl_kejadianTB" name="tgl_kejadianTB" 
												class="row-fluid" required placeholder="yyyy-mm-dd">
											</div>
											<div class="controls span2">
												<input type="text" id="jam_kejadianTB" name="jam_kejadianTB" 
												placeholder="hh.mm" class="row-fluid">
											</div>
										
										</div>
									
										<div class="control-group row-fluid"> 
											<label class="control-label span2"  for="tgl_laporTB">Tanggal Lapor </label>
											<div class="controls span5">
												<input type="text" id="tgl_laporTB" name="tgl_laporTB" 
												placeholder="yyyy-mm-dd" class="row-fluid">
											</div>
											<div class="controls span2">
												<input type="text" id="jam_laporTB" name="jam_laporTB" 
												placeholder="hh.mm" class="row-fluid">
											</div>
										
										</div>									
								
										<div class="control-group row-fluid"> 
											<label class="control-label span2"  for="tempatTB">Tempat Kejadian</label>
											<div class="controls span9">
												<input type="text" id="tempatTB" name="tempatTB" placeholder="tempat kejadian" class="row-fluid">
											</div>
										</div>
										
										<div class="control-group row-fluid"> 
											<label class="control-label span2"  for="pelaporTB">dilaporkan oleh </label>
											<div class="controls span5">
												<input type="text" id="pelaporTB" name="pelaporTB" placeholder="nama lengkap " class="row-fluid">
											</div>
											<div class="controls span2">
												<input type="text" id="jabatan_pelaporTB" name="jabatan_pelaporTB" placeholder="jabatan " class="row-fluid">
											</div>
										</div>											
										<div class="control-group row-fluid"> 
											<label class="control-label span2"  for="laporkeTB">dilaporkan kepada</label>
											<div class="controls span5">
												<input type="text" id="laporkeTB" name="laporkeTB" placeholder="nama lengkap" class="row-fluid">		
											</div>
											<div class="controls span2">
												<input type="text" id="jabatan_laporkeTB" name="jabatan_laporkeTB" placeholder="jabatan" class="row-fluid">		
											</div>
										</div>	
								
								
										<div class="control-group row-fluid"> 
											<label class="control-label span2"  for="pjlokasiTB">Penanggung JWB Lokasi </label>
											<div class="controls span5">
												<input type="text" id="nama_pjlokasiTB" name="nama_pjlokasiTB" placeholder="nama lengkap" class="row-fluid">		
											</div>
											<div class="controls span2">
												<input type="text" id="jabatan_pjlokasiTB" name="jabatan_pjlokasiTB" placeholder="jabatan" class="row-fluid">		
											</div>
											<div class="controls span2">
												<input type="text" id="kontak_pjlokasiTB" name="kontak_pjlokasiTB" placeholder="kontak" class="row-fluid">		
											</div>
										</div>	
											
										<div class="control-group row-fluid"> 
											<label class="control-label span2"  for="pelaporTB">saksi 1</label>
											<div class="controls span5">
												<input type="text" id="saksi1TB" name="saksi1TB" placeholder="saksi 1" class="row-fluid">
											</div>
											<div class="controls span2">
												<input type="text" id="jabatan_saksi1TB" name="jabatan_saksi1TB" placeholder="jabatan saksi" class="row-fluid">
											</div>
											<div class="controls span2">
												<input type="text" id="kontak_saksi1TB" name="kontak_saksi1TB" placeholder="kontak saksi" class="row-fluid">
											</div>
										</div>					
											
										<div class="control-group row-fluid"> 
											<label class="control-label span2"  for="pelaporTB">saksi 2</label>
											<div class="controls span5">
												<input type="text" id="saksi2TB" name="saksi2TB" placeholder="saksi 2" class="row-fluid">
											</div>
											<div class="controls span2">
												<input type="text" id="jabatan_saksi2TB" name="jabatan_saksi2TB" placeholder="jabatan saksi" class="row-fluid">
											</div>
											<div class="controls span2">
												<input type="text" id="kontak_saksi2TB" name="kontak_saksi2TB" placeholder="kontak saksi 2" class="row-fluid">
											</div>
										</div>					
	
										<div class="control-group row-fluid"> 
											<label class="control-label span2"  for="uraianTB">Uraian Kejadian</label>
											<div class="controls span9">
												<textarea  id="uraianTB" name="uraianTB" placeholder="uraian kejadian" 
												class="row-fluid"></textarea>		
											</div>
										</div>						
										<div class="control-group row-fluid"> 
											<label class="control-label span2"  for="kerugianTB">kerugian yang dialami</label>
											<div class="controls span9">
												<textarea  id="kerugianTB" name="kerugianTB" placeholder="kerugian yang diakibatkan oleh kejadian kecelakaan tersebut (cidera, kerusakan perlatan, pencemaran lingkungan , dll)" 
												class="row-fluid"></textarea>		
											</div>
										</div>
										</fieldset>
								</div>
							
                            	<div class="tab-pane" id="tab2">
									<label class="control-label span2"  for="asalTB"></label><br />
									<input type="button" id="tambahOrgs" class="btn"value="tambah + ">    
									
									<div id="roworg">
										<div class="control-group row-fluid"> 
											<div class="controls span9">
											   
												<span id="orgterlibatT">
											   
												</span>
											</div>
										</div>
										
										
									</div>
									<!--</fieldset>-->
								</div>						
							 	<div class="tab-pane" id="tab3">
									<fieldset>
										<input type="button" id="tambahCid" class="btn"value="Tambah +">
											<div id="cideraTS" class="control-group row-fluid"> 
											
											</div>
									</fieldset>
								</div>
                            	
                                <div class="tab-pane" id="tab6">
									<fieldset>
										<input type="button" class="btn"id="tambahTin" value="Tambah +">
										<div id="tindakanT" class="control-group row-fluid"> 
											
										</div>
									</fieldset>
								</div>
                                <div class="tab-pane" id="tab16">
									<fieldset>
										<input type="button" class="btn" id="tambahUpl" value="Tambah +">
										<div id="fotoTS" class="control-group row-fluid"> 
											
										</div>
									</fieldset>
									<!--<form class="form-horizontal" action='ptransaksi.php' method="get">
										<fieldset>
                                    -->        
                                   <!-- <form enctype="multipart/form-data" action="ptransaksi.php" method="POST" >
                                        <div id="text">
                                            <div>	
                                            	<input name="data[]" id="file" type="file" multiple="multiple" />
                                          </div>
                                        </div>
                                        <input type="button" id="add-file-field" name="add" class="btn"value="Tambah +" />
                                    </form>-->
								<!--           
                                        </fieldset>
									</form>								
							-->
                            	</div>
                                <div class="tab-pane" id="tab15">
									<fieldset>
										<div class="control-group row-fluid"> 
											<label class="control-label span2"  for="pjlokasiTB">kabag K3</label>
											<div class="controls span5">
												<input type="text" id="nm_kabaglkTB" name="nm_kabaglkTB" placeholder="nama lengkap" class="row-fluid">		
											</div>
											<div class="controls span2">
												<input type="text" id="tgl_kabaglkTB" name="tgl_kabaglkTB" placeholder="perusahaan" class="row-fluid">		
											</div>
											<div class="controls span2">
												<textarea id="kom_kabaglkTB" name="kom_kabaglkTB" placeholder="komentar" class="row-fluid"></textarea>		
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
								</div>
                                <div class="tab-pane" id="tab14">
									<fieldset>
										<div class="control-group row-fluid"> 
											<label class="control-label span2"  for="pjlokasiTB">Ketua Tim </label>
											<div class="controls span5">
												<input type="text" id="ketua_timinvTB" name="ketua_timinvTB" placeholder="nama lengkap" class="row-fluid">		
											</div>
											<div class="controls span2">
												<input type="text" id="tgl_mulaitiminvTB" name="tgl_mulaitiminvTB" placeholder="tanggal mulai " class="row-fluid">		
											</div>
											<div class="controls span2">
												<input type="text" id="tgl_akhhirtiminvTB" name="tgl_akhhirtiminvTB" placeholder="tanggal diselesaikan" class="row-fluid">		
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
								</div>
                                <div class="tab-pane" id="tab12">
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
								</div>
                        		<div class="tab-pane" id="tab4">
									<fieldset>
										<div class="control-group row-fluid"> 
											<label class="control-label span2"  for="kategori">Kategori </label>
											<div class="controls span10">
											<select class="chzn-select" id="id_tipedampakTB" data-placeholder="id_tipedampakTB" name="id_tipedampakTB">
												<option value="water-ground">water-ground || air - tanah</option>
												<option value="water-surface">water-surface || air - permukaan</option>
												<option value="land-undisturbed">land - undisturbed|| tanah tak terganggu</option>
												<option value="land-rehabilited">land-rehabilited|| tanah - rehabilitasi</option>
												<option value="land-general">land-general|| tanah - umum</option>
												<option value="culture">culture || budaya</option>
												<option value="heritage">heritage || warisan</option>
												<option value="air-quality">air-quality || kualitas udara</option>
												<option value="fauna">fauna || hewan</option>
												<option value="community">community || public</option>
												<option value="others">others || lainnya</option>
											</select>											
											</div>
										</div>
										
					
										<div class="form-row control-group row-fluid">
											<label class="control-label span2">Pencemar / Polutan</label>
											<div class="controls span9">
												<input type="text" id="agen_pencemarTB" name="agen_pencemarTB" placeholder="" class="row-fluid">
											</div>
										</div>
					
										<div class="form-row control-group row-fluid">
											<label class="control-label span2">Volume</label>
											<div class="controls span9">
												<input type="text" id="volumeTB" name="volumeTB" placeholder="" class="row-fluid">
											</div>
										</div>									
						
										<div class="form-row control-group row-fluid">
											<label class="control-label span2">Area Terpapar</label>
											<div class="controls span9">
												<input type="text" id="area_terpaparTB" name="area_terpaparTB" placeholder="" class="row-fluid">
											</div>
										</div>
							
										<div class="form-row control-group row-fluid">
											<label class="control-label span2">Durasi Terpapar</label>
											<div class="controls span9">
												<input type="text" id="durasi_terpaparTB" name="durasi_terpaparTB" placeholder="" class="row-fluid">
											</div>
										</div>									
								
										<div class="form-row control-group row-fluid">
											<label class="control-label span2">Durasi Dampak Terpapar</label>
											<div class="controls span9">
												<input type="text" id="durasi_dampak_paparTB" name="durasi_dampak_paparTB" placeholder="" class="row-fluid">
											</div>
										</div>									
							
										<div class="form-row control-group row-fluid">
											<label class="control-label span2">Keterangan </label>
											<div class="controls span9">
												<input type="text" id="komen_tambahanTB" name="komen_tambahanTB" placeholder="" class="row-fluid">
											</div>
										</div>
									</fieldset>
								</form>
							</div>
						
							<div class="tab-pane" id="tab5">
								<fieldset>
					
									<div class="control-group row-fluid"> 
										<label class="control-label span2"  for="name">Nama Alat</label>
										<div class="controls span9">
											<input type="text" id="nama_alatTB" name="nama_alatTB" placeholder="nama alat / keterangan" class="row-fluid">
										</div>
									</div>									
						
									<div class="control-group row-fluid"> 
										<label class="control-label span2"  for="name">Detil </label>
										<div class="controls span9">
											<textarea id="deskripsiTB" name="deskripsiTB" placeholder="deskripsi kerusakan " class="row-fluid"></textarea>
										</div>
									</div>									
						
									<div class="control-group row-fluid"> 
										<label class="control-label span2"  for="name">Biaya</label>
										<div class="controls span9">
											<select id="biayaTB" name="biayaTB">
												<option value="">pilih kerugian</option>
												<option value="1">Rp 0 – Rp 100 juta</option>
												<option value="2">Rp 100 juta – Rp 1 milyar</option>
												<option value="3">Rp 1 milyar – Rp 5 milyar </option>
												<option value="4">Rp 5 milyar – Rp 20 milyar </option>
												<option value="5"> > Rp 20 milyar</option>
											</select>
										  </div>
									</div>									
						
									<div class="control-group row-fluid"> 
										<label class="control-label span2"  for="name">Mekanisme Kejadian </label>
										<div class="controls span9">
											<textarea id="mekanismeTB" name="mekanismeTB" placeholder="mekanisme kejadian" class="row-fluid"></textarea>
										</div>
									</div>
								</fieldset>
								</div>						
                        		<div class="tab-pane" id="tab11">
									<fieldset>
										<input type="button" id="tambahInv" class="btn"value="tambah">
										<div id="investigasiTS" class="control-group row-fluid"> 
										
										</div>
									</fieldset>
								</div>
                        		<div class="tab-pane" id="tab7">
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
								</div>
                        		<div class="tab-pane" id="tab8">
									<fieldset>
										<div class="control-group row-fluid"> 
											<label class="control-label span2"  for="name">Konsekuensi Aktual</label>
											<div class="controls span9">
												<select id="konsekuensi_aktual2TB" name="konsekuensi_aktual2TB">
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
												<select id="konsekuensi_potensial2TB" name="konsekuensi_potensial2TB">
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
												<select id="kemungkinan2TB" name="kemungkinan2TB">
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
												<select id="tingkat_resiko_aktual2TB" name="tingkat_resiko_aktual2TB">
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
												<select id="tingkat_resiko_potensial2TB" name="tingkat_resiko_potensial2TB">
													<option value="">pilih resiko potensial...</option>
													<option value="low">low</option>
													<option value="medium">medium</option>
													<option value="high">high</option>
													<option value="extreme">extreme</option>
												</select>
											</div>
										</div>
									</fieldset>
								</div>
                                <div class="tab-pane" id="tab9">
									<fieldset>
										<div class="control-group row-fluid"> 
											<label class="control-label span2"  for="name">Diperlukan</label>
											<div class="controls span9">
												<select id="diperlukanTB" name="diperlukanTB">
													<option selected="selected"value="tidak">Tidak</option>
													<option value="ya">Ya</option>
												</select>
											</div>
										</div>
											
										
										<div id="pihakluar">
											<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="name">Instansi</label>
												<div class="controls span9">
													<textarea  id="instansiTB" name="instansiTB" 
														placeholder="instansi yang dilapori"></textarea>
													<textarea id="dilaporkankeTB" name="dilaporkankeTB" 
														placeholder="dilaporkan ke pada"></textarea>
												</div>
										   </div>
										   <div class="control-group row-fluid"> 
												<label class="control-label span2"  for="name">Tanggal Pemberitahuan</label>
												<div class="controls span9">
													<input type="text"id="tglTB" name="tglTB" placeholder="tanggal">
													<input type="text"id="jamTB" placeholder="jam "name="jamTB">
												</div>
										   </div>
											<div class="control-group row-fluid"> 
												<label class="control-label span2"  for="komentarTB">Komentar</label>
												<div class="controls span9">
													<textarea id="komentarTB" cols="50"name="komentarTB" placeholder="komentar"></textarea>
												</div>
										   </div>
										</div>
									</fieldset>
								</div>
                                <div class="tab-pane" id="tab10">
									<fieldset>
										<div class="control-group row-fluid"> 
											<label class="control-label span2"  for="name">Nama Korban</label>
											<div class="controls span9">
												<input type="text"id="nm_korbanTB" placeholder="nama korban"
												name="nm_korbanTB">
												<input type="text"id="tgl_korbanTB" name="tgl_korbanTB"
												placeholder="tanggal" />
												<textarea id="kom_korbanTB" placeholder="komentar korban"
													name="kom_korbanTB"></textarea>
											</div>
									   </div>	
										
									   
										<div class="control-group row-fluid"> 
											<label class="control-label span2"  for="name">Nama Atasan</label>
											<div class="controls span9">
												<input type="text"id="nm_atasanTB" name="nm_atasanTB" 
												placeholder="nama atasan">
												<input type="text"id="tgl_atasanTB" name="tgl_atasanTB"
												placeholder="tanggal" />
												<textarea id="kom_atasanTB" name="kom_atasanTB" 
												placeholder="komentar atasan"></textarea>
											</div>
									   </div>	
										
									   <div class="control-group row-fluid"> 
											<label class="control-label span2"  for="name">Penanggung Jawab Lokasi </label>
											<div class="controls span9">
												<input type="text"id="nm_pjlokasiTB" name="nm_pjlokasiTB" 
												placeholder="nama penanggung jawab lokasi">
												<input type="text"id="tgl_pjlokasiTB" name="tgl_pjlokasiTB"
												placeholder="tanggal" />
												<textarea id="kom_pjlokasiTB" placeholder=
												"komentar penanggung jawab lokasi"name="kom_pjlokasiTB"></textarea>

											</div>
									   </div>	
										<div class="control-group row-fluid"> 
											<label class="control-label span2"  for="name">Department LK3</label>
											<div class="controls span9">
												<input type="text"id="nm_LK3TB" name="nm_LK3TB" 
												placeholder="nama bagian Department LK">
												<input type="text"id="tgl_LK3TB" name="tgl_LK3TB"
												placeholder="tanggal" />
												<textarea id="kom_LK3TB" placeholder="komentar Department LK3"
												name="kom_LK3TB"></textarea>

											</div>
									   </div>	
									</fieldset>
								</div>
                                <div class="tab-pane" id="tab13">
									<fieldset>
									<input type="button" id="tambahSeb" value="tambah">
									<div id="sebabTS" class="control-group row-fluid"> 
										
									</div>
									</fieldset>
								</div>
								<div class="description content">
									<ul class="pager wizard mb5">
                                        <button class="btn btn-success btn-large" type="submit">
                                        	Simpan
                                        </button>
										</li>
									</ul>
								</div>
                                <!--</form>-->
							</div>
							</form>
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
				<h4> <span>Data Transaksi - Kecelakaan Awal</span></h4>&nbsp;
				<select id="kategoriTB">
					<option value="judul_kejadian" selected="selected">Judul Kejadian</option>
					<option value="tempat">Tempat </option>
					<option value="keterangan">Kategori</option>
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
		$('#id_subjkecel2TB').hide();
		
		//=========================
			var countu = 0;
 			$("#tambahUpl").click(function(){
				tambahUpl();
			});
			function tambahUpl(){
				countu += 1;
				$('#fotoTS').append(
					'<tr class="rowUpl">' 
						+'<td><label class="control-label span2"  for="penindakTB"></label></td>'
						+'<td>'
							+'<input id="Afoto" name="AFoto'+ countu +'" type="file" />'
						+'</td>'
						+'<td>'
							+'<textarea id="BFoto" name="BFoto'+ countu +'" placeholder="keterangan gambar" class="row-fluid"></textarea>'
						+'</td>'
						+'<td>'
							+'<a class="remove_itemu btn" href="#" >Hapus</a>'
							+'<input id="RFoto" name="RFoto'+ countu +'" value="'+ countu +'" type="hidden">'
						+'</td>'
					+'</tr>'
				);
			}
			$(".remove_itemu").live('click', function(){
				$(this).parents(".rowUpl").fadeOut();
				$(this).parents(".rowUpl").remove();
			});

		 //upload foto
		 $('#add-file-field').click(function(){
			var pathRow = '';
				pathRow +='<div class="added-field">'
							+'<input type="file" name="data[]">'
							+'<textarea placeholder="keterangan" type="text" name="keteranganTB[]"></textarea>'
							+'<input type="button" class="btn hapusx" value="Hapus">'
						+'</div>'
			$("#text").append(pathRow);
		});
		$('.hapusx').live('click',function(){
			$(this).parent().remove();
		});
		//
		
		$('#tgl_kejadianTB').change(function(){
			var tgl_kejadiany = $('#tgl_kejadianTB').val();
			//alert(tgl_kejadiany);
			$.ajax({
				url :'ptransaksi.php',
				data:'aksi=result&menu=tkecelakaan&tabel=tb_kecelakaan&tgl='+tgl_kejadiany,
				dataType:'json',
				success:function(data){
					if(data.status=='sukses'){
						var norefy = data.no_ref;
						//alert(x);
						$('#no_refTB').val(norefy);
					}else{
						alert('silahkan tulis tanggal sesuai format yyyy-mm-dd');
					}
				}
				
			});
			//alert('hahah');	
		});
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
				//$('#diperlukanTB').show();
				/*$('#instansiTB').show();
				$('#dilaporkankeTB').show();
				$('#tglTB').hide();
				$('#jamTB').show();
				$('#komentarTB').show();
				*/
			}else{
				//$('#diperlukanTB').val('');
				$('#instansiTB').val('');
				$('#dilaporkankeTB').val('');
				$('#tglTB').val('');
				$('#jamTB').val('');
				$('#komentarTB').val('');
				
				$('#pihakluar').hide();
				//$('#diperlukanTB').hide();
				/*$('#instansiTB').hide();

				$('#dilaporkankeTB').hide();
				$('#tglTB').hide();
				$('#jamTB').hide();
				$('#komentarTB').hide();*/
							
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
								+'<input type="text" name="nama_orgterlibatTB_'+counter+'" id="nama_orgterlibatTB_'+counter+'">'
							  +'</td>'
						+'</tr>'			  
						+'<tr>'
							+'<td><label class="control-label span2"><tr>'
							+'<td>aktivitas</td></label><td>:<input type="text" placeholder="aktivitas saat kejadian berlangsung" id="aktivitasTB_'+counter+'" name="aktivitasTB_'+counter+'" ></td></tr>'
						+'<tr>'
							+'<td><label class="control-label span2"><tr>'
							+'<td>NIK</td></label><td>:<input type="text" id="NIKTB_'+counter+'" name="NIKTB_'+counter+'" placeholder="NIK"></td></tr>'
						+'<tr>'
							+'<td><label class="control-label span2"><tr>'
							+'<td>jenis kelamin </td></label><td>:<input type="text" id="jkelaminTB_'+counter+'" name="jkelaminTB_'+counter+'" placeholder="jenis kelamin"></td></tr>'
						+'<tr>'
							+'<td><label class="control-label span2"><tr>'
							+'<td>tanggal lahir</td></label><td>:<input type="text" placeholder="tanggal lahir" id="tgllahirTB_'+counter+'" name="tgllahirTB_'+counter+'" ></td></tr>'
						+'<tr>'
							+'<td><label class="control-label span2"><tr>'
							+'<td>jabatan</td></label><td>:<input type="text" placeholder="jabatan" id="nama_jabatanTB_'+counter+'" name="nama_jabatanTB_'+counter+'" ></td></tr>'
						+'<tr>'
							+'<td><label class="control-label span2"><tr>'
							+'<td>bagian</td></label><td>:<input type="text" placeholder="bagian" id="nama_bagianTB_'+counter+'" name="nama_bagianTB_'+counter+'" ></td></tr>'
						+'<tr>'
							+'<td><label class="control-label span2"><tr>'
							+'<td>department</td></label><td>:<input type="text" placeholder="department" id="nama_departmentTB_'+counter+'" name="nama_departmentTB_'+counter+'" ></td></tr>'
						+'<tr>'
							+'<td><label class="control-label span2"><tr>'
							+'<td>shift kerja</td></label><td>:<input type="text" id="nama_shiftkerjaTB_'+counter+'" name="nama_shiftkerjaTB_'+counter+'" placeholder="shift"></td></tr>'
		 				+'<tr>'
		 					+'<td><label class="control-label span2"><tr>'
							+'<td>status kerja</td></label><td>:<input type="text" id="nama_statuskerjaTB_'+counter+'" name="nama_statuskerjaTB_'+counter+'" placeholder="status kerja"></td></tr>'
			
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
				$('.orgterlibatTB').show();
				
				$('.orgterlibat2TB').prop({disabled:true});
				$('.orgterlibat2TB').hide();
				
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
				$('.orgterlibatTB').hide();
				
				$('.orgterlibat2TB').prop({disabled:false});
				$('.orgterlibat2TB').show();
				
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
							$('#nama_statuskerjaTB_'+counter).val(data.nama_statuskerja);
						}else{
							alert('gagal fertch');
						}
						
					}
				});
			});
			
			
			
//===========================================================================
            /*var countb = 0;
			tambahSeb();
 			$("#tambahSeb").click(function(){
				tambahSeb()
			});
			function tambahSeb(){
				countb += 1;
				$('#sebabTS').append(
					'<tr class="rowSeb">' 
						+'<td><label class="control-label span2"  for="hasil_investigasiTB">investigasi</label></td>'
						+'<td>'
							+'<textarea id="hasil_investigasiTB_'+countb+'" name="hasil_investigasiTB_'+countb+'" placeholder="hasil investigasi" class="hasil_investigasiTB"></textarea>'
						+'</td>'
						
						+'<td>'
							+'<select id="id_katinvestigasiTB_'+countb+'" name="id_katinvestigasiTB_'+countb+'"class="id_katinvestigasiTB">'
							+'</select>'
						+'</td>'
						
						+'<td>'
							+'<select id="statusTB_'+countb+'" name="statusTB_'+countb+'" class="row-fluid">'
							+'<option value="0">faktor pendukung</option>'
							+'<option value="1">faktor utama</option>'
							+'</select>'
						+'</td>'
						+'<td>'
							+'<a class="remove_itemb btn" href="#" >Delete</a>'
							+'<input id="rowi_' + countb + '" name="rowi[]" value="'+ countb +'" type="hidden">'
						+'</td>'
					+'</tr>'
				);
			}
			$(".remove_itemb").live('click', function(){
				$(this).parents(".rowSeb").fadeOut();
				$(this).parents(".rowSeb").remove();
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
							$('#id_katinvestigasiTB_'+countb).html(optiony);
					}
				});
			}*/
			
		});
		
		$('#tambahBC').click(function(){
			$("#titlex").html(' <h1><span align=center><b>Kecelakaan - Awal (Tambah Data)</b></span><h1>');
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
						$('#id_subjkecelTB').show();
					
				}
			});
		}
		function combosubjkecel2(id2){
			if(id2==1){
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
							$('#id_subjkecel2TB').show();
					}
				});
			}else{
				$('#id_subjkecel2TB').hide();
			}
		}
		
		//selecao
		$('#id_jkecelTB').change(function(){
			var id1= $('#id_jkecelTB').val();
			combosubjkecel(id1);
		});
		$('#id_subjkecelTB').change(function(){
			var id2= $('#id_subjkecelTB').val();
			combosubjkecel2(id2);
			//alert(id2);
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
				url	: "ptransaksi.php?aksi=tampil&menu=tkecelakaan",
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
			$("#judul_kejadianTB").val('');
			$("#id_jkecelTB").val('');
			$("#tgl_kejadianTB").val('');
			$("#tgl_laporTB").val('');
			$("#jam_kejadianTB").val('');
			$("#jam_laporTB").val('');
			$("#tempatTB").val('');
			
			$("#id_tipedampakTB").val('');
			$("#agen_pencemarTB").val('');
			$("#volumeTB").val('');
			$("#area_terpaparTB").val('');
			$("#durasi_terpaparTB").val('');
			$("#durasi_dampak_paparTB").val('');
			$("#komen_tambahanTB").val('');
			
			$("#nama_alatTB").val('');
			$("#deskripsiTB").val('');
			$("#biayaTB").val('');
			$("#mekanismeTB").val('');
			
			$("#konsekuensi_aktualTB").val('');
			$("#konsekuensi_potensialTB").val('');
			$("#kemungkinanTB").val('');
			$("#tingkat_resiko_aktualTB").val('');
			$("#tingkat_resiko_potensialTB").val('');
			
			$("#penindakTB1").val('');
			$("#tindakanTB1").val('');
			$("#tanggal_tindakanTB1").val('');
			$("#jam_tindakanTB1").val('');
			
			//$('#fieldset3').empty();
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
		
		//klik tambah 
		$("#tambahBC").click(function(){
			kosongkan();
			combojkecel();
			tambahUpl();
			//combotipedampak();
			$("#titlex").html('<h4>Kecelakaan - Awal (Tambah Data)</h4>');
			$('#myModal').modal('show');

		});
		//end of tambah 
			
		function simpan(){
			var urlx = $('.form-horizontal').attr('action');
			var urlx2 = "?aksi=tambah&menu=tkecelakaan";
			$.ajax({
				type: 'POST',
				dataType:'json',
				url: urlx + urlx2,
				data: $('.form-horizontal').serialize(),
				success: function(data){
					var statusy = data.status;
					if(statusy=='sukses'){
						alert('berhasil disimpan');
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
			//var x = $('id_subbjkecel2TB').val();
			//alert(x);
			if(confirm("yakin anda sudah mengisi data dengan lengkap?")){
				simpan();
			}
		});
		$('.form-horizontal').submit(function(){
			//var x = $('id_subbjkecel2TB').val();
			//alert(x);
			if(confirm("yakin anda sudah mengisi data dengan lengkap?")){
				simpan();
			}
		});
		//end of aksi simpan
		
		//action klik edit
		$('i.gicon-editx').live("click",function() {	
			$("#titlex").html(' <h1><span align=center><b>Kecelakaan - Awal (edit data)</b></span><h1>');
			var idy = $(this).attr("idz");

			$.ajax({
				url:"ptransaksi.php?aksi=ambiledit&menu=tkecelakaan",
				data: "idx="+idy,
				dataType:'json',
				type:"GET",
				success:function(data){
					var infoy		= data.info;
					//alert(infoy);
					if(infoy == 'sukses'){
						//detail kecelakaan
						$('#no_refTB').val(data.no_ref);
						$('#judul_kejadianTB').val(data.judul_kejadian);
						$('#statusTB').val(data.sukses);
						$('#no_refTB').val(data.no_ref);
						$('#judul_kejadianTB').val(data.judul_kejadian);
						$('#id_subjkecelTB').val(data.id_subjkecel);
						$('#id_subjkecel2TB').val(data.id_subjkecel2);
						$('#tgl_kejadianTB').val(data.tgl_kejadian);
						$('#tgl_laporTB').val(data.tgl_lapor);
						$('#jam_kejadianTB').val(data.jam_kejadian);
						$('#jam_laporTB').val(data.jam_lapor);
						$('#tempatTB').val(data.tempat);
						$('#pelaporTB').val(data.pelapor);
						$('#jabatan_pelaporTB').val(data.jabatan_pelapor);
						$('#laporkeTB').val(data.laporke);
						$('#jabatan_laporkeTB').val(data.jabatan_laporke);
						$('#uraianTB').val(data.uraian);
						$('#kerugianTB').val(data.kerugian);
						$('#nama_pjlokasiTB').val(data.nama_pjlokasi);
						$('#kontak_pjlokasiTB').val(data.kontak_pjlokasi);
						$('#nama_pjlokasiTB').val(data.nama_pjlokasi);
						$('#jabatan_pjlokasiTB').val(data.jabatan_pjlokasi);
						$('#kontak_pjlokasiTB').val(data.kontak_pjlokasi);
						$('#saksi1TB').val(data.saksi1);
						$('#saksi2TB').val(data.saksi2);
						$('#jabatan_saksi1TB').val(data.jabatan_saksi1);
						$('#jabatan_saksi2TB').val(data.jabatan_saksi2);
						$('#kontak_saksi1TB').val(data.kontak_saksi1);
						$('#kontak_saksi2TB').val(data.kontak_saksi2);
						$('#ketua_timinvTB').val(data.ketua_timinv);
						
						//tingkat resiko awal
						$('#konsekuensi_aktualTB').val(data.konsekuensi_aktual);
						$('#konsekuensi_potensialTB').val(data.konsekuensi_potensial);
						$('#kemungkinanTB').val(data.kemungkinan);
						$('#tingkat_resiko_aktualTB').val(data.tingkat_resiko_aktual);
						$('#tingkat_resiko_potensialTB').val(data.tingkat_resiko_potensial);
						
						//perawatan
						//$('#pj_perTB').val(data.pj_per);
//						$('#tgl_perTB').val(data.tgl_per);
//						$('#jam_perTB').val(data.jam_per);
//						$('#tempat_perTB').val(data.tempat_per);
//						$('#contactper_perTB').val(data.contactper_per);
//						$('#hasil_perTB').val(data.hasil_per);
//						$('#deskripsi_perTB').val(data.deskripsi_per);
//						$('#hasil_perTB').val(data.hasil_per);
						
						//kerusakan alat
						//$('#nama_alatTB').val(data.nama_alat);
//						$('#deskripsiTB').val(data.deskripsi);
//						$('#biayaTB').val(data.biaya);
//						$('#mekanismeTB').val(data.mekanisme);
						
						//kerusakan lingkungan 
						//$('#id_tipedampakTB').val(data.id_tipedampak);
//						$('#agen_pencemarTB').val(data.agen_pencemar);
//						$('#volumeTB').val(data.volume);
//						$('#area_terpaparTB').val(data.area_terpapar);
//						$('#durasi_terpaparTB').val(data.durasi_terpapar);
//						$('#durasi_dampak_paparTB').val(data.durasi_dampak_papar);
//						$('#komen_tambahanTB').val(data.komen_tambahan);
						
						//pemberitahuan ke pihak luar
						//$('#instansiTB').val(data.instansi);
//						$('#dilaporkankeTB').val(data.dilaporkanke);
//						$('#tglTB').val(data.tgl);
//						$('#jamTB').val(data.jam);
//						$('#komentarTB').val(data.komentar);
						
						//laporan 
						//$('#nm_korbanTB').val(data.nm_korban);
//						$('#kom_korbanTB').val(data.kom_korban);
//						$('#tgl_korbanTB').val(data.tgl_korban);
//						$('#nm_atasanTB').val(data.nm_atasan);
//						$('#kom_atasanTB').val(data.kom_atasan);
//						$('#tgl_atasanTB').val(data.tgl_atasan);
//						$('#nm_pjlokasiTB').val(data.nm_pjlokasi);
//						$('#kom_pjlokasiTB').val(data.kom_pjlokasi);
//						$('#tgl_pjlokasiTB').val(data.tgl_pjlokasi);
//						$('#nm_LK3TB').val(data.nm_LK3);
//						$('#kom_LK3TB').val(data.kom_LK3);
//						$('#tgl_LK3TB').val(data.tgl_LK3);
						
						//munculkan pop up form 
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
		//$('i.gicon-remove').live("click",function() {	
		$('i.hapusLK').live("click",function() {	
			var idy = $(this).attr("idz");
			//var namay= $(this).attr("namaz");
			 
			if(confirm("lanjutkan menghapus '"+idy+"' ?"))
				$.ajax({
						type: "GET",
						dataType:"json",
						url: "ptransaksi.php?aksi=hapus&menu=tkecelakaan",
						data:"idx=" + idy,
						//cache: false,
						success: function(data){
							var statusy		= data.status;
							//var keterangany	= data.keterangan;
							//var namay 		= data.nama_produk;
								
							$("#kecelakaan_"+idy).css("background","red").fadeOut(2000);
							loadData();
							//$("#loadtabel").html('produk : '+namay+' terhapus').fadeIn(6000);
							//$("#list_"+nim).slideUp('slow', function() {$(this).remove();});
						}
				});
		});
		///end of action hapus 
		
		//hapus semua
		$('#hapusBC').click(function() {	
			if(confirm("lanjutkan menghapus semua data ?"))
				$.ajax({
						type: "GET",	
						dataType:'json',
						url: "ptransaksi.php",
						data:"aksi=hapussemua&menu=tkecelakaan",
						success: function(data){
							if(data.status=='sukses'){
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