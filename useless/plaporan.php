 <?php
	include"lib/koneks.php";
	include"lib/pagination_class.php";
 
 	$aksi 	= $_GET['aksi'];
	$menu	= $_GET['menu'];
	$page 	= $_GET['page'];
	$cari	= $_GET['cari'];
	$tabel 	= $_GET['tabel'];
	
	switch ($aksi){
	#combo=======================================================================================
			case 'combo':
				switch($menu){
					case'tsafetyp':
						switch($tabel){
							case 'tb_safetyp':
								$sql 	= "select * from tb_safetyp order by id_safetyp";
								$kue	= mysql_query($sql);
								$ambil	= array();
								while($ambilR	= mysql_fetch_assoc($kue)){
									$ambil[]=$ambilR;
								}
								if($ambil!=NULL){
									echo json_encode($ambil);
								}
								else{
									echo '{"status":"gagal"}';
									}
							break;
						}
					break;
					case'temisi':
						switch($tabel){
							case 'tb_tempatsampling':
								$sql 	= "select * from tb_tempatsampling ts, tb_samplingemisi se 
											where ts.id_tempatsampling = se.id_tempatsampling
											order by ts.nama_tempatsampling";
								$kue	= mysql_query($sql);
								$ambil	= array();
								while($ambilR	= mysql_fetch_assoc($kue)){
									$ambil[]=$ambilR;
								}
								if($ambil!=NULL){
									echo json_encode($ambil);
								}
								else{
									echo '{"status":"gagal"}';
								}
							break;
							
							case 'tb_gas':
								$sql 	= "select * from tb_gas order by nama_gas";
								$kue	= mysql_query($sql);
								$ambil	= array();

								while($ambilR	= mysql_fetch_assoc($kue)){
									$ambil[]=$ambilR;
								}
								if($ambil!=NULL){
									echo json_encode($ambil);
								}
								else{
									echo '{"status":"gagal"}';
								}
							break;
						}
					break;	
					
					case'lkecelakaan':
						switch($tabel){
							case 'tb_jkecel':
								$sql 	= "select * from tb_jkecel order by id_jkecel";
								$kue	= mysql_query($sql);
								$ambil	= array();
								while($ambilR	= mysql_fetch_assoc($kue)){
									$ambil[]=$ambilR;
								}
								if($ambil!=NULL){
									//echo'{	
											echo json_encode($ambil);
											//.'"
										//}';
								}
								else{
									echo '{"status":"gagal"}';
									}
							break;
							
							case 'tb_tipedampak':
								$sql 	= "select * from tb_tipedampak order by id_tipedampak";
								$kue	= mysql_query($sql);
								$ambil	= array();
								while($ambilR	= mysql_fetch_assoc($kue)){
									$ambil[]=$ambilR;
								}
								if($ambil!=NULL){
									echo json_encode($ambil);
								}
								else{
									echo '{"status":"gagal"}';
									}
							break;

							case 'tb_jcidera':
								$sql 	= "select * from tb_jcidera order by id_jcidera";
								$kue	= mysql_query($sql);
								$ambil	= array();
								while($ambilR	= mysql_fetch_assoc($kue)){
									$ambil[]=$ambilR;
								}
								if($ambil!=NULL){
									echo json_encode($ambil);
								}
								else{
									echo '{"status":"gagal"}';
								}
							break;
							case 'tb_bagtubuh':
								$sql 	= "select * from tb_bagtubuh order by id_bagtubuh";
								$kue	= mysql_query($sql);
								$ambil	= array();
								while($ambilR	= mysql_fetch_assoc($kue)){
									$ambil[]=$ambilR;
								}
								if($ambil!=NULL){
									echo json_encode($ambil);
								}
								else{
									echo '{"status":"gagal"}';
								}
							break;
						}
					break;	
				}	
			break;	
			
	# tampil =================================================================================================				
			case 'tampil' :
				switch ($menu) {

					case 'lemisi':
						$sqlu="	select * 
								from 
									tb_tempatsampling ts,
									tb_gas g,
									tb_produk p,
									tb_samplingemisi se,
									tb_emisi e
									
								where 
									se.id_samplingemisi	= e.id_samplingemisi and
									se.id_tempatsampling= ts.id_tempatsampling and
									se.id_gas= g.id_gas and
									se.id_produk=p.id_produk ";
							if (isset($_GET['nama_tempatsampling']) and !empty($_GET['nama_tempatsampling'])){
								$nama_tempatsampling= $_GET['nama_tempatsampling'];
								$sql = $sqlu."and ts.nama_tempatsampling like '%$nama_tempatsampling%' order by e.id_emisi desc";
							}
							elseif (isset($_GET['nama_gas']) and !empty($_GET['nama_gas'])){
								$nama_gas= $_GET['nama_gas'];
								$sql = $sqlu."and g.nama_gas like '%$nama_gas%' order by e.id_emisi desc";
							}
							elseif (isset($_GET['kadar']) and !empty($_GET['kadar'])){
								$kadar= $_GET['kadar'];
								$sql = $sqlu."and e.kadar like '%$kadar%' order by e.id_emisi desc";
							}
							elseif (isset($_GET['bulan']) and !empty($_GET['bulan'])){
								$bulan= $_GET['bulan'];
								$sql = $sqlu."and e.bulan like '%$bulan%' order by e.id_emisi desc";
							}
							elseif (isset($_GET['tahun']) and !empty($_GET['tahun'])){
								$tahun= $_GET['tahun'];
								$sql = $sqlu."and e.tahun like '%$tahun%' order by e.id_emisi desc";
							}
							else {
								$sql = $sqlu;
							}
							#var_dump($sql);
							#exit();
							if(isset($_GET['starting'])){ //nilai awal halaman
								$starting=$_GET['starting'];
							}else{
								$starting=0;
							}
							
							$recpage= 5;//jumlah data per halaman
							$obj 	= new pagination_class($sql,$starting,$recpage);
							$result =$obj->result;
							
							if(mysql_num_rows($result)!=0){
								$nox 	= $starting+1;
								while($emisix = mysql_fetch_array($result)){
									if($emisix['bulan']==3)$bulan=='Maret';
									elseif($emisix['bulan']==7)$bulan=='Juli';
									else $bulan=='Nopember';
									//var_dump($bulan);
									echo"
										<tr id='emisi_$emisix[id_bagian]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$emisix[id_emisi]'>
											</label></td>
											
											<td class='to_hide_phone'> $nox </td>
											<td class='to_hide_phone'> $emisix[nama_tempatsampling]</td>
											<td class='to_hide_phone'> $emisix[nama_gas]</td>
											<td class='to_hide_phone'> $emisix[kadar]</td>
											<td class='to_hide_phone'> $emisix[bulan]</td>
											<td class='to_hide_phone'> $emisix[tahun]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$emisix[id_emisi]' class='gicon-eye-open'>
															cetak
														</i>
													</a>  
												</div>
											</td>
										</tr>";
										$nox++;
								}
							}else{
								echo "<tr align='center'>
										<td  colspan=7 ><span style='color:yellow;text-align:center;'>
										... data tidak ditemukan ...</span></td></tr>";
							 }
							 echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
							 echo "<tr><td colspan=7>".$obj->total."</td></tr>";
					break;
					


					case 'lsafetyp':
						$sqlu="	select * 
								from tb_jamkerja jk";
							if (isset($_GET['tahun']) and !empty($_GET['tahun'])){
								$tahun= $_GET['tahun'];
								$sql = $sqlu."where jk.tahun like '%$tahun%' order by jk.id_jamkerja desc";
							}
							elseif (isset($_GET['bulan']) and !empty($_GET['bulan'])){
								$bulan= $_GET['bulan'];
								$sql = $sqlu."where jk.bulan like '%$bulan%' order by jk.id_jamkerja desc";
							}
							else {
								$sql = $sqlu." order by jk.id_jamkerja desc";
							}

							if(isset($_GET['starting'])){ //nilai awal halaman
								$starting=$_GET['starting'];
							}else{
								$starting=0;
							}
							
							$recpage= 5;//jumlah data per halaman
							$obj 	= new pagination_class($sql,$starting,$recpage);
							$result =$obj->result;
							
							/*$bulanx = array("1"=>"januari",
											"2"=>"Februari",
											"3"=>"Maret",
											"4"=>"April",
											"5"=>"Mei",
											"6"=>"Juni",
											"7"=>"Juli",
											"8"=>"Agustus",
											"9"=>"September",
											"10"=>"Oktober",
											"11"=>"Nopember",
											"12"=>"Desember"
											);
							*/
							
							$bulanx = array("Januari",
											"Februari",
											"Maret",
											"April",
											"Mei",
											"Juni",
											"Juli",
											"Agustus",
											"September",
											"Oktober",
											"Nopember",
											"Desember"
											);
							
							if(mysql_num_rows($result)!=0){
								$nox 	= $starting+1;
								while($safetypx = mysql_fetch_array($result)){
									$jam_kerja_aman = $safetypx['jam_normal'] + $safetypx['jam_lembur'] - $safetypx['jam_absen']; 
									$i=$safetypx['bulan'] - 1;
									$bln = $bulanx[$i];
									echo"
										<tr id='safetyp_$safetypx[id_jamkerja]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$safetypx[id_jamkerja]'>
											</label></td>
											
											<td class='to_hide_phone'> $nox </td>
											<td class='to_hide_phone'> $jam_kerja_aman   jam</td>
											<td class='to_hide_phone'> $bln </td>
											<td class='to_hide_phone'> $safetypx[tahun]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$safetyp[id_safetyp]' class='gicon-eye-open'>
															cetak
														</i>
													</a>  
												</div>
												
											</td>
										</tr>";
										$nox++;
								}
							}else{
								echo "<tr align='center'>
										<td  colspan=7 ><span style='color:yellow;text-align:center;'>
										... data tidak ditemukan ...</span></td></tr>";
							 }
							 echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
							 echo "<tr><td colspan=7>".$obj->total."</td></tr>";
					break;				
					
					case 'lkecelakaan':
						$sqlu="	select * 
								from 
									tb_kecelakaan kc
									left join tb_subjkecel sj on sj.id_subjkecel = kc.id_subjkecel  
									left join tb_subjkecel2 sk  on sk.id_subjkecel2 = kc.id_subjkecel2 order by id_kecelakaan desc";
							if (isset($_GET['judul_kejadian']) and !empty($_GET['judul_kejadian'])){
								$judul_kejadian= $_GET['judul_kejadian'];
								$sql = $sqlu." and kc.judul_kejadian like '%$judul_kejadian%' order by kc.id_kecelakaan desc";
							}
							elseif (isset($_GET['tempat']) and !empty($_GET['tempat'])){
								$tempat= $_GET['tempat'];
								$sql = $sqlu."and kc.tempat like '%$tempat%' order by kc.id_kecelakaan desc";
							}
							elseif (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
								$keterangan= $_GET['keterangan'];
								$sql = $sqlu."and jk.keterangan like '%$keterangan%' order by kc.id_kecelakaan desc";
							}
							else {
								$sql = $sqlu;
							}

							if(isset($_GET['starting'])){ //nilai awal halaman
								$starting=$_GET['starting'];
							}else{
								$starting=0;
							}
							
							$recpage= 5;//jumlah data per halaman
							$obj 	= new pagination_class($sql,$starting,$recpage);
							$result =$obj->result;
							
							if(mysql_num_rows($result)!=0){
								$nox 	= $starting+1;
								while($kecelakaanx = mysql_fetch_array($result)){
									echo"
										<tr id='kecelakaan_$kecelakaanx[id_kecelakaan]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$kecelakaanx[id_kecelakaan]'>
											</label></td>
											
											<td class='to_hide_phone'> $nox </td>
											<td class='to_hide_phone'> $kecelakaanx[judul_kejadian]</td>
											<td class='to_hide_phone'> $kecelakaanx[tempat]</td>
											<td class='to_hide_phone'> $kecelakaanx[tgl_kejadian]</td>
											<td class='to_hide_phone'> $kecelakaanx[jam_kejadian]</td>
											<td class='to_hide_phone'> $kecelakaanx[keterangan]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$kecelakaanx[id_kecelakaan]' class='gicon-eye-open'>
															cetak
														</i>
													</a> 
												</div>
												
											</td>
										</tr>";
										$nox++;
								}
							}else{
								echo "<tr align='center'>
										<td  colspan=7 ><span style='color:yellow;text-align:center;'>
										... data tidak ditemukan ...</span></td></tr>";
							 }
							 echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
							 echo "<tr><td colspan=7>".$obj->total."</td></tr>";
					break;

	#ubah=======================================================================================			
			case 'ubah' :
				switch ($menu){
					case 'mshift':
						$simpanQ=mysql_query("update tb_shiftkerja set 	nama_shiftkerja ='$_POST[nama_shiftkerjaTB]', 
																		keterangan ='$_POST[keteranganTB]' 
																		where id_shiftkerja = '$_GET[idx]'");
						if($simpanQ){
								echo'{
										"status":"sukses",
										"keterangan":"'.$_POST['keteranganTB'].'",
										"nama_shiftkerja":"'.$_POST['nama_shiftkerjaTB'].'"
								}';
						}else{
								echo'{
										"status":"gagal"
								}';
						}
					break;
				}
			break;
			
	#hapusx ====================================================================================	
			case 'hapus' :
				switch($menu){
					case 'lkecelakaan':
						//$kue = "select * from tb_kecelakaan where id_kecelakaan ='$_GET[idx]'";
							//$terhapusQ=mysql_fetch_assoc(mysql_query($kue));
						$kue2="delete from tb_kecelakaan where id_kecelakaan='$_GET[idx]'";
						//var_dump($kue2);
						echo $kue2;
						exit();
						
						$hapusQ=mysql_query($kue2);
						
						#var_dump();
						#exit();
						/*if($hapusQ){
							echo "ok";
							#echo '{"status"		:"sukses","id"			:"'.$_GET[idx].'"}';
						}else{
							echo"no";
							#echo '{"status"		:"gagal","id"			:"'.$_GET[idx].'"}';						
						}*/
					break;
					case 'temisi':
						$kue 		= "select * from tb_emisi where id_emisi ='$_GET[idx]'";
						$terhapusQ	= mysql_fetch_assoc(mysql_query($kue));
						$kue2		= "delete from tb_emisi where id_emisi ='$_GET[idx]'";
						//var_dump($kue2);
						#echo $kue2;
						#exit();
						$hapusQ		= mysql_query($kue2);
						
						#var_dump();
						#exit();
						if($hapusQ){
							#echo "ok";
							echo '{
									"status"	:"sukses",
									"id"		:"'.$_GET[idx].'"
									"bulan"		:"'.$terhapus['bulan'].'",
									"tahun"		:"'.$terhapus['tahun'].'"
								}';
						}else{
							#echo"no";
							echo '{"status"		:"gagal",
									"id"		:"'.$_GET[idx].'"}';						
						}
					break;
					case 'tsafetyp':
						$kue2="delete from tb_safetyp where id_safetyp ='$_GET[idx]'";
						$hapusQ=mysql_query($kue2);
						
						var_dump();
						exit();
						if($hapusQ){
							//echo "ok";
							echo '{"status"		:"sukses","id"			:"'.$_GET[idx].'"}';
						}else{
							//echo"no";
							echo '{"status"		:"gagal","id"			:"'.$_GET[idx].'"}';						
						}
					break;

				}
			break;
	
	#hapusemuax ====================================================================================	
			case 'hapussemua' :
					switch($menu){
						case 'lkecelakaan':
							$hapusQ=mysql_query("truncate tb_kecelakaan")or die("gagal mengosongkan tb_kecelakaan");
							#$hapusQ=mysql_query("delete * tb_kecelakaan")or die("gagal mengosongkan tb_kecelakaan");
							if($hapusQ){
								echo '{"status":"sukses"}';
							}else{
								echo '{"status":"gagal"}';						
							}
						break;
					}
			break;
		}
	}

?>