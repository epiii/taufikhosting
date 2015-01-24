 <?php
	include"lib/koneks.php";
	include"lib/pagination_class.php";
 
 	$aksi 	= $_GET['aksi'];
	$menu	= $_GET['menu'];
	$page 	= $_GET['page'];
	$cari	= $_GET['cari'];
	$tabel 	= $_GET['tabel'];
	
	function anti_injection($data){
	  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
	  return $filter;
	}

	switch ($aksi){
	#combo =====================================================================================================
			case 'combo':
				switch($menu){
					case 'smenus':
						switch($tabel){
							case 'tb_menu':
								$jalan	= mysql_query ("select * from tb_menu order by id_menu asc")or die ("kueri tb_menu eror");
								$arr	=array();
								while($hasil = mysql_fetch_assoc($jalan)){
									$arr[]=$hasil;
								}
								echo json_encode($arr);
								//echo '{"id_menu":"0","nama_menu":"empty"}';
								
							break;
						}
					case 'slevels':
						switch($tabel){
							case 'tb_level':
								$jalan	= mysql_query ("select * from tb_level order by id_level asc")
									or die ("kueri tb_level eror");
								$arr	=array();
								while($hasil = mysql_fetch_assoc($jalan)){
									$arr[]=$hasil;
								}
								echo json_encode($arr);
								//echo '{"id_menu":"0","nama_menu":"empty"}';
								
							break;
						}
					case 'smenus2':
						switch($tabel){
							case 'tb_menu':
							
								/*$sql = "select 	mn.id_menu,
												mn.nama_menu, 
												lv.id_level 
										from 
												tb_menu mn, 
												tb_level lv, (
												select id_menu from tb_hakakses where )
										where 
											id_level = 1
										order by 
												mn.nama_menu asc";*/
								
								$sql = "select 	mn.id_menu,
												mn.nama_menu
										from 
												tb_menu mn
										where
											not exists 
												(select 
													ha.id_menu 
												from 
													tb_hakakses ha, 
													tb_level lv 
												where 
													ha.id_level = '$_GET[idlevel]' and
													ha.id_level = lv.id_level)
										order by 
												mn.nama_menu asc";
								#echo $sql;exit(); 
								$jalan	= mysql_query ($sql)
									or die ("kueri tb_menu2 eror");
								$arr	=array();
								while($hasil = mysql_fetch_assoc($jalan)){
									$arr[]=$hasil;
								}
								echo json_encode($arr);
								//echo '{"id_menu":"0","nama_menu":"empty"}';
								
							break;
						}
						
				}
			break;
	
	#cetak =====================================================================================================
			case 'cetak':
				switch($menu){
					case 'slevel':
							$jalan	= mysql_query("select * from tb_level where id_level = '$_GET[idx]'")
										or die("kueri cetak level pengguna kerja ERROR");
							$cetakR = mysql_fetch_assoc($jalan);
							echo '{"nama_level":"'.$cetakR['nama_level'].'"}';
							exit();
					break;
					case 'mstatuskerja':
							$jalan	= mysql_query("select * from tb_statuskerja where id_statuskerja = '$_GET[idx]'")
										or die("kueri cetak statuskerja ERROR");
							$cetakR = mysql_fetch_assoc($jalan);
							echo '{"nama_statuskerja":"'.$cetakR['nama_statuskerja'].'"}';
							exit();
					break;
					case 'mpekerja':
							$kue="	select * 
									from 
										tb_pekerja p, 
										tb_bagian b, 
										tb_jabatan j, 
										tb_department d, 
										tb_statuskerja s, 
										tb_shiftkerja f
										
									where 
										p.NIK = '$_GET[idx]' and 
										b.id_bagian= p.id_bagian and 
										j.id_jabatan= p.id_jabatan and 
										d.id_department = p.id_department and 
										s.id_statuskerja= p.id_statuskerja and 
										f.id_shiftkerja= p.id_shiftkerja ";
							$jalan	= mysql_query($kue)or die("kueri cetak shift kerja ERROR");
							$cetakR = mysql_fetch_assoc($jalan);
							echo '{
									"nama_pekerja":"'.$cetakR['nama_pekerja'].'",
									"jkelamin":"'.$cetakR['jkelamin'].'",
									"tgllahir":"'.$cetakR['tgllahir'].'",
									"alamat":"'.$cetakR['alamat'].'",
									"kota":"'.$cetakR['kota'].'",
									"jabatan":"'.$cetakR['nama_jabatan'].'",
									"bagian":"'.$cetakR['nama_bagian'].'",
									"department":"'.$cetakR['nama_department'].'",
									"statuskerja":"'.$cetakR['nama_statuskerja'].'",
									"shiftkerja":"'.$cetakR['nama_shiftkerja'].'",
									"tglmasuk":"'.$cetakR['tgl_masuk'].'",
									"tglkeluar":"'.$cetakR['tgl_keluar'].'"
								}';
							exit();
					break;
	
					}

	#ambil edit =====================================================================================================				
			case 'ambiledit':
				switch($menu){
					case 'shakakses':
							$jalan	= 	mysql_query("select * 
													from 
														tb_menu m, tb_level l, tb_hakakses h
													where 
														h.id_menu = m.id_menu and
														h.id_level = l.id_level and
														h.id_hakakses ='$_GET[idx]'")or die("kueri cetak menu ERROR");
							$ambilR = 	mysql_fetch_assoc($jalan);
							echo '{
									"status":"sukses",
									"nama_menu":"'.$ambilR['nama_menu'].'",
									"nama_level":"'.$ambilR['nama_level'].'"
									}';
						exit();
					break;
					case 'smenu':
							$jalan	= 	mysql_query("select * from tb_menu where id_menu = '$_GET[idx]'")
										or die("kueri cetak menu ERROR");
							$ambilR = 	mysql_fetch_assoc($jalan);
							echo '{
									"status":"sukses",
									"nama_menu":"'.$ambilR['nama_menu'].'",
									"linkx":"'.$ambilR['link'].'",
									"subx":"'.$ambilR['sub'].'"
									}';
						exit();
					break;
					case 'slevel':
							$jalan	= 	mysql_query("select * from tb_level where id_level = '$_GET[idx]'")
										or die("kueri cetak shift kerja ERROR");
							$ambilR = 	mysql_fetch_assoc($jalan);
							echo '{
									"status":"sukses",
									"nama_level":"'.$ambilR['nama_level'].'"
									}';
						exit();
					break;
					case 'mbagian':
							$jalan	= 	mysql_query("select * from tb_bagian where id_bagian = '$_GET[idx]'")
										or die("kueri tb_bagian ERROR");
							$ambilR = 	mysql_fetch_assoc($jalan);
							echo '{
									"status":"sukses",
									"nama_bagian":"'.$ambilR['nama_bagian'].'",
									"keterangan":"'.$ambilR['keterangan'].'"
									}';
						exit();
					break;
					case 'mjabatan':
							$jalan	= 	mysql_query("select * from tb_jabatan where id_jabatan = '$_GET[idx]'")
										or die("kueri tb_jabatan ERROR");
							$ambilR = 	mysql_fetch_assoc($jalan);
							echo '{
									"status":"sukses",
									"nama_jabatan":"'.$ambilR['nama_jabatan'].'",
									"keterangan":"'.$ambilR['keterangan'].'"
									}';
						exit();
					break;
					case 'mdepartment':
							$jalan	= 	mysql_query("select * from tb_department where id_department= '$_GET[idx]'")
										or die("kueri tb_department ERROR");
							$ambilR = 	mysql_fetch_assoc($jalan);
							echo '{
									"status":"sukses",
									"nama_department":"'.$ambilR['nama_department'].'",
									"keterangan":"'.$ambilR['keterangan'].'"
									}';
						exit();
					break;
					case 'mstatuskerja':
							$jalan	= 	mysql_query("select * from tb_statuskerja where id_statuskerja= '$_GET[idx]'")
										or die("kueri tb_statuskerja ERROR");
							$ambilR = 	mysql_fetch_assoc($jalan);
							echo '{
									"status":"sukses",
									"nama_statuskerja":"'.$ambilR['nama_statuskerja'].'"
									}';
						exit();
					break;
					case 'mstatuskerja':
							$jalan	= 	mysql_query("select * from tb_statuskerja where id_statuskerja= '$_GET[idx]'")
										or die("kueri tb_statuskerja ERROR");
							$ambilR = 	mysql_fetch_assoc($jalan);
							echo '{
									"status":"sukses",
									"nama_statuskerja":"'.$ambilR['nama_statuskerja'].'"
									}';
						exit();
					break;
					case 'mjcidera':
							$jalan	= 	mysql_query("select * from tb_jcidera where id_jcidera= '$_GET[idx]'")
										or die("kueri tb_jcidera ERROR");
							$ambilR = 	mysql_fetch_assoc($jalan);
							echo '{
									"status":"sukses",
									"nama_jcidera":"'.$ambilR['nama_jcidera'].'",
									"keterangan":"'.$ambilR['keterangan'].'"
									}';
						exit();
					break;
					case 'mjkecel':
							$jalan	= 	mysql_query("select * from tb_jkecel where id_jkecel= '$_GET[idx]'")
										or die("kueri tb_jkecel ERROR");
							$ambilR = 	mysql_fetch_assoc($jalan);
							echo '{
									"status":"sukses",
									"nama_jkecel":"'.$ambilR['nama_jeniskecel'].'",
									"sub_jkecel":"'.$ambilR['sub_jeniskecel'].'",
									"keterangan":"'.$ambilR['keterangan'].'"
									}';
						exit();
					break;
					case 'mbagtubuh':
							$jalan	= 	mysql_query("select * from tb_bagtubuh where id_bagtubuh= '$_GET[idx]'")
										or die("kueri tb_bagtubuh ERROR");
							$ambilR = 	mysql_fetch_assoc($jalan);
							echo '{
									"status":"sukses",
									"nama_bagtubuh":"'.$ambilR['nama_bagtubuh'].'",
									"keterangan":"'.$ambilR['keterangan'].'"
									}';
						exit();
					break;
					case 'mnilairesiko':
							$jalan	= 	mysql_query("select * from tb_nilairesiko where id_nilairesiko= '$_GET[idx]'")
										or die("kueri tb_nilairesiko ERROR");
							$ambilR = 	mysql_fetch_assoc($jalan);
							echo '{
									"status":"sukses",
									"nama_nilairesiko":"'.$ambilR['nama_nilairesiko'].'",
									"keterangan":"'.$ambilR['keterangan'].'"
									}';
						exit();
					break;
					case 'mkatinvestigasi':
							$jalan	= 	mysql_query("select * from tb_katinvestigasi where id_katinvestigasi= '$_GET[idx]'")
										or die("kueri tb_katinvestigasi ERROR");
							$ambilR = 	mysql_fetch_assoc($jalan);
							echo '{
									"status":"sukses",
									"nama_katinvestigasi":"'.$ambilR['nama_katinvestigasi'].'",
									"keterangan":"'.$ambilR['keterangan'].'"
									}';
						exit();
					break;
					case 'mjlampiran':
							$jalan	= 	mysql_query("select * from tb_jlampiran where id_jlampiran= '$_GET[idx]'")
										or die("kueri tb_jlampiran ERROR");
							$ambilR = 	mysql_fetch_assoc($jalan);
							echo '{
									"status":"sukses",
									"nama_jlampiran":"'.$ambilR['nama_jlampiran'].'"
									}';
						exit();
					break;
					case 'mtipedampak':
							$jalan	= 	mysql_query("select * from tb_tipedampak where id_tipedampak= '$_GET[idx]'")
										or die("kueri tb_tipedampak ERROR");
							$ambilR = 	mysql_fetch_assoc($jalan);
							echo '{
									"status":"sukses",
									"nama_tipedampak":"'.$ambilR['nama_tipedampak'].'",
									"keterangan":"'.$ambilR['keterangan'].'"
									}';
						exit();
					break;
					case 'mtempatsampling':
							$jalan	= 	mysql_query("select * from tb_tempatsampling where id_tempatsampling= '$_GET[idx]'")
										or die("kueri tb_tempatsampling ERROR");
							$ambilR = 	mysql_fetch_assoc($jalan);
							echo '{
									"status":"sukses",
									"nama_tempatsampling":"'.$ambilR['nama_tempatsampling'].'",
									"keterangan":"'.$ambilR['keterangan'].'"
									}';
						exit();
					break;
					case 'msafetyp':
							$jalan	= 	mysql_query("select * from tb_safetyp where id_safetyp= '$_GET[idx]'")
										or die("kueri tb_safetyp ERROR");
							$ambilR = 	mysql_fetch_assoc($jalan);
							echo '{
									"status":"sukses",
									"nama_safetyp":"'.$ambilR['nama_safetyp'].'",
									"target_bln":"'.$ambilR['target_bln'].'",
									"target_thn":"'.$ambilR['target_thn'].'",
									"keterangan":"'.$ambilR['keterangan_safetyp'].'"
									}';
						exit();
					break;
					case 'mgas':
							$jalan	= 	mysql_query("select * from tb_gas where id_gas= '$_GET[idx]'")
										or die("kueri tb_gas ERROR");
							$ambilR = 	mysql_fetch_assoc($jalan);
							echo '{
									"status":"sukses",
									"nama_gas":"'.$ambilR['nama_gas'].'",
									"keterangan":"'.$ambilR['keterangan_gas'].'"
									}';
						exit();
					break;
					
				}
			break;

	#tampil =====================================================================================================
			case 'tampil' :
				switch ($menu) {
					case 'shakakses':
							$sqlU = "select * 
									from 
										tb_menu m, tb_level l, tb_hakakses h
									where 
										h.id_menu = m.id_menu and
										h.id_level = l.id_level ";

							if (isset($_GET['nama_menu']) and !empty($_GET['nama_menu'])){
								$nama_menu= $_GET['nama_menu'];
								$sql = $sqlU."and nama_menu like '%$nama_menu%' order by h.id_hakakses desc ";
							}elseif(isset($_GET['nama_level']) and !empty($_GET['nama_level'])){
								$nama_level= $_GET['nama_level'];
								$sql = $sqlU."and nama_level like '%$nama_level%' order by h.id_hakakses desc ";
							}else{
								$sql = $sqlU;
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
								while($hakaksesx= mysql_fetch_array($result)){
									echo"
										<tr id='hakakses_$hakaksesx[id_hakakses]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$hakaksesx[id_hakakses]'>
											</label></td>
											
											<td class='to_hide_phone'> $nox</td>
											<td class='to_hide_phone'> $hakaksesx[nama_level]</td>
											<td class='to_hide_phone'> $hakaksesx[nama_menu]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a data-toggle='modal' class='btn btn-small'  
														rel='tooltip' data-placement='left' data-original-title=' Edit '>
														<i idz='$hakaksesx[id_hakakses]' class='gicon-edit'>
															edit
														</i>
													</a> 
													<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$hakaksesx[id_hakakses]' class='gicon-eye-open'>
															detail
														</i>
													</a> 
													<!--<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
														data-original-title='hapus'>
														<i idz='$hakaksesx[id_hakakses]' 
														class='gicon-remove'>
															hapus
														</i>
													</a>--> 
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
					case 'smenu':
							if (isset($_GET['nama_menu']) and !empty($_GET['nama_menu'])){
								$nama_menu= $_GET['nama_menu'];
								$sql = "select * from tb_menu
										where nama_menu like '%$nama_menu%' order by id_menu desc ";
							}else {
								$sql = "select * from tb_menu order by id_menu desc";
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
								while($menux = mysql_fetch_array($result)){
									echo"
										<tr id='menu_$menux[id_menu]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$menux[id_menu]'>
											</label></td>
											
											<td class='to_hide_phone'> $menux[id_menu]</td>
											<td class='to_hide_phone'> $menux[nama_menu]</td>
											<td class='to_hide_phone'> $menux[link]</td>
											<td class='to_hide_phone'> $menux[sub]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a data-toggle='modal' class='btn btn-small'  
														rel='tooltip' data-placement='left' data-original-title=' Edit '>
														<i idz='$menux[id_menu]' class='gicon-edit'>
															edit
														</i>
													</a> 
													<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$menux[id_menu]' class='gicon-eye-open'>
															detail
														</i>
													</a> 
													<!--<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
														data-original-title='hapus'>
														<i idz='$menux[id_menu]' namaz='$menux[nama_menu]'
														class='gicon-remove'>
															hapus
														</i>
													</a>--> 
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
					case 'slevel':
							if (isset($_GET['nama_level']) and !empty($_GET['nama_level'])){
								$nama_level= $_GET['nama_level'];
								$sql = "select * from tb_level
										where nama_level like '%$nama_level%' order by id_level desc";
							}else {
								$sql = "select * from tb_level order by nama_level desc";
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
								while($levelx = mysql_fetch_array($result)){
									echo"
										<tr id='level_$levelx[id_level]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$levelx[id_level]'>
											</label></td>
											
											<td class='to_hide_phone'> $nox </td>
											<td class='to_hide_phone'> $levelx[nama_level]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a data-toggle='modal' class='btn btn-small'  
														rel='tooltip' data-placement='left' data-original-title=' Edit '>
														<i idz='$levelx[id_level]' class='gicon-edit'>
															edit
														</i>
													</a> 
													<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$levelx[id_level]' class='gicon-eye-open'>
															detail
														</i>
													</a> 
													<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
														data-original-title='hapus'>
														<i idz='$levelx[id_level]' namaz='$levelx[nama_level]'
														class='gicon-remove'>
															hapus
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
					case 'suser':
							if (isset($_GET['nama_bagian']) and !empty($_GET['nama_bagian'])){
								$nama_bagian= $_GET['nama_bagian'];
								$sql = "select * from tb_users
										where nama_bagian like '%$nama_bagian%' order by id_bagian desc";
							}
							else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
								$keterangan= $_GET['keterangan'];
								$sql = "select * from tb_users 
										where keterangan like '%$keterangan%' order by id_bagian desc";
							}
							else {
								$sql = "select * from tb_users order by username desc";
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
								while($sbagianx = mysql_fetch_array($result)){
									echo"
										<tr id='bagian_$sbagianx[username]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$sbagianx[username]'>
											</label></td>
											
											<td class='to_hide_phone'> $nox </td>
											<td class='to_hide_phone'> $sbagianx[username]</td>
											<td class='to_hide_phone'> $sbagianx[nama_lengkap]</td>
											<td class='to_hide_phone'> $sbagianx[email]</td>
											<td class='to_hide_phone'> $sbagianx[id_level]</td>
											<td class='to_hide_phone'> $sbagianx[blokir]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a data-toggle='modal' href='#myModal' class='btn btn-small'  
														rel='tooltip' data-placement='left' data-original-title=' Edit '>
														<i idz='$sbagianx[username]' class='gicon-edit'>
															edit
														</i>
													</a> 
													<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$sbagianx[username]' class='gicon-eye-open'>
															detail
														</i>
													</a> 
													<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
														data-original-title='hapus'>
														<i idz='$sbagianx[username]' namaz='$sbagianx[nama_bagian]'
														class='gicon-remove'>
															hapus
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
					
					case 'mshift':
							if (isset($_GET['nama_shiftkerja']) and !empty($_GET['nama_shiftkerja'])){
								$nama_shiftkerja= $_GET['nama_shiftkerja'];
								$sql = "select * from tb_shiftkerja
										where nama_shiftkerja like '%$nama_shiftkerja%' order by id_shiftkerja desc";
							}
							else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
								$keterangan= $_GET['keterangan'];
								$sql = "select * from tb_shiftkerja 
										where keterangan like '%$keterangan%' order by id_shiftkerja desc";
							}
							else {
								$sql = "select * from tb_shiftkerja order by id_shiftkerja desc";
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
								while($shiftx = mysql_fetch_array($result)){
									echo"
										<tr id='shift_$shiftx[id_shiftkerja]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$shiftx[id_shiftkerja]'>
											</label></td>
											
											<td class='to_hide_phone'> $nox </td>
											<td class='to_hide_phone'> $shiftx[nama_shiftkerja]</td>
											<td class='to_hide_phone'> $shiftx[keterangan]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a data-toggle='modal' href='#myModal' class='btn btn-small'  
														rel='tooltip' data-placement='left' data-original-title=' Edit '>
														<i idz='$shiftx[id_shiftkerja]' class='gicon-edit'>
															edit
														</i>
													</a> 
													<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$shiftx[id_shiftkerja]' class='gicon-eye-open'>
															detail
														</i>
													</a> 
													<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
														data-original-title='hapus'>
														<i idz='$shiftx[id_shiftkerja]' namaz='$shiftx[nama_shiftkerja]'
														class='gicon-remove'>
															hapus
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
							 unset($shiftx);
							 echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
							 echo "<tr><td colspan=7>".$obj->total."</td></tr>";
								
					break;
					
					case 'mjabatan':
							if (isset($_GET['nama_jabatan']) and !empty($_GET['nama_jabatan'])){
								$nama_jabatan= $_GET['nama_jabatan'];
								$sql = "select * from tb_jabatan
										where nama_jabatan like '%$nama_jabatan%' order by id_jabatan desc";
							}
							else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
								$keterangan= $_GET['keterangan'];
								$sql = "select * from tb_jabatan 
										where keterangan like '%$keterangan%' order by id_jabatan desc";
							}
							else {
								$sql = "select * from tb_jabatan order by id_jabatan desc";
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
								while($jabatanx = mysql_fetch_array($result)){
									echo"
										<tr id='jabatan_$jabatanx[id_jabatan]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$jabatanx[id_jabatan]'>
											</label></td>
											
											<td class='to_hide_phone'> $nox </td>
											<td class='to_hide_phone'> $jabatanx[nama_jabatan]</td>
											<td class='to_hide_phone'> $jabatanx[keterangan]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a data-toggle='modal' href='#myModal' class='btn btn-small'  
														rel='tooltip' data-placement='left' data-original-title=' Edit '>
														<i idz='$jabatanx[id_jabatan]' class='gicon-edit'>
															edit
														</i>
													</a> 
													<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$jabatanx[id_jabatan]' class='gicon-eye-open'>
															detail
														</i>
													</a> 
													<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
														data-original-title='hapus'>
														<i idz='$jabatanx[id_jabatan]' namaz='$jabatanx[nama_jabatan]'
														class='gicon-remove'>
															hapus
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
					
					case 'mdepartment':
							if (isset($_GET['nama_department']) and !empty($_GET['nama_department'])){
								$nama_department= $_GET['nama_department'];
								$sql = "select * from tb_department
										where nama_department like '%$nama_department%' order by id_department desc";
							}
							else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
								$keterangan= $_GET['keterangan'];
								$sql = "select * from tb_department 
										where keterangan like '%$keterangan%' order by id_department desc";
							}
							else {
								$sql = "select * from tb_department order by id_department desc";
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
								while($departmentx = mysql_fetch_array($result)){
									echo"
										<tr id='department_$departmentx[id_department]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$departmentx[id_department]'>
											</label></td>
											
											<td class='to_hide_phone'> $nox </td>
											<td class='to_hide_phone'> $departmentx[nama_department]</td>
											<td class='to_hide_phone'> $departmentx[keterangan]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a data-toggle='modal' href='#myModal' class='btn btn-small'  
														rel='tooltip' data-placement='left' data-original-title=' Edit '>
														<i idz='$departmentx[id_department]' class='gicon-edit'>
															edit
														</i>
													</a> 
													<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$departmentx[id_department]' class='gicon-eye-open'>
															detail
														</i>
													</a> 
													<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
														data-original-title='hapus'>
														<i idz='$departmentx[id_department]' namaz='$departmentx[nama_department]'
														class='gicon-remove'>
															hapus
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
					
					case 'mstatuskerja':
							if (isset($_GET['nama_statuskerja']) and !empty($_GET['nama_statuskerja'])){
								$nama_statuskerja= $_GET['nama_statuskerja'];
								$sql = "select * from tb_statuskerja
										where nama_statuskerja like '%$nama_statuskerja%' order by id_statuskerja desc";
							}
							else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
								$keterangan= $_GET['keterangan'];
								$sql = "select * from tb_statuskerja 
										where keterangan like '%$keterangan%' order by id_statuskerja desc";
							}
							else {
								$sql = "select * from tb_statuskerja order by id_statuskerja desc";
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
								while($statuskerjax = mysql_fetch_array($result)){
									echo"
										<tr id='statuskerja_$statuskerjax[id_statuskerja]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$statuskerjax[id_statuskerja]'>
											</label></td>
											
											<td class='to_hide_phone'> $nox </td>
											<td class='to_hide_phone'> $statuskerjax[nama_statuskerja]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a data-toggle='modal' href='#myModal' class='btn btn-small'  
														rel='tooltip' data-placement='left' data-original-title=' Edit '>
														<i idz='$statuskerjax[id_statuskerja]' class='gicon-edit'>
															edit
														</i>
													</a> 
													<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$statuskerjax[id_statuskerja]' class='gicon-eye-open'>
															detail
														</i>
													</a> 
													<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
														data-original-title='hapus'>
														<i idz='$statuskerjax[id_statuskerja]' namaz='$statuskerjax[nama_statuskerja]'
														class='gicon-remove'>
															hapus
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
							 
							unset($statuskerjax);
							 echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
							 echo "<tr><td colspan=7>".$obj->total."</td></tr>";
								
					break;
					
					case 'mjkecel':
							if (isset($_GET['jeniskecel']) and !empty($_GET['jeniskecel'])){
								$jeniskecel= $_GET['jeniskecel'];
								$sql = "select * from tb_jkecel
										where jeniskecel like '%$jeniskecel%' order by id_jkecel desc";
							}
							else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
								$keterangan= $_GET['keterangan'];
								$sql = "select * from tb_jkecel 
										where keterangan like '%$keterangan%' order by id_jkecel desc";
							}
							else if (isset($_GET['sub_jeniskecel']) and !empty($_GET['sub_jeniskecel'])){
								$sub_jeniskecel= $_GET['sub_jeniskecel'];
								$sql = "select * from tb_jkecel 
										where sub_jeniskecel like '%$sub_jeniskecel%' order by id_jkecel desc";
							}
							else {
								$sql = "select * from tb_jkecel order by id_jkecel desc";
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
								while($jkecelx = mysql_fetch_array($result)){
									echo"
										<tr id='jkecel_$jkecelx[id_jkecel]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$jkecelx[id_jkecel]'>
											</label></td>
											
											<td class='to_hide_phone'> $nox </td>
											<td class='to_hide_phone'> $jkecelx[nama_jeniskecel]</td>
											<td class='to_hide_phone'> $jkecelx[sub_jeniskecel]</td>
											<td class='to_hide_phone'> $jkecelx[keterangan]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a data-toggle='modal' href='#myModal' class='btn btn-small'  
														rel='tooltip' data-placement='left' data-original-title=' Edit '>
														<i idz='$jkecelx[id_jkecel]' class='gicon-edit'>
															edit
														</i>
													</a> 
													<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$jkecelx[id_jkecel]' class='gicon-eye-open'>
															detail
														</i>
													</a> 
													<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
														data-original-title='hapus'>
														<i idz='$jkecelx[id_jkecel]' namaz='$jkecelx[jeniskecel]'
														class='gicon-remove'>
															hapus
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
					
					case 'mbagtubuh':
							if (isset($_GET['nama_bagtubuh']) and !empty($_GET['nama_bagtubuh'])){
								$nama_bagtubuh= $_GET['nama_bagtubuh'];
								$sql = "select * from tb_bagtubuh
										where nama_bagtubuh like '%$nama_bagtubuh%' order by id_bagtubuh desc";
							}
							else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
								$keterangan= $_GET['keterangan'];
								$sql = "select * from tb_bagtubuh 
										where keterangan like '%$keterangan%' order by id_bagtubuh desc";
							}
							else {
								$sql = "select * from tb_bagtubuh order by id_bagtubuh desc";
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
								while($bagtubuhx = mysql_fetch_array($result)){
									echo"
										<tr id='bagtubuh_$bagtubuhx[id_bagtubuh]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$bagtubuhx[id_bagtubuh]'>
											</label></td>
											
											<td class='to_hide_phone'> $nox </td>
											<td class='to_hide_phone'> $bagtubuhx[nama_bagtubuh]</td>
											<td class='to_hide_phone'> $bagtubuhx[keterangan]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a data-toggle='modal' href='#myModal' class='btn btn-small'  
														rel='tooltip' data-placement='left' data-original-title=' Edit '>
														<i idz='$bagtubuhx[id_bagtubuh]' class='gicon-edit'>
															edit
														</i>
													</a> 
													<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$bagtubuhx[id_bagtubuh]' class='gicon-eye-open'>
															detail
														</i>
													</a> 
													<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
														data-original-title='hapus'>
														<i idz='$bagtubuhx[id_bagtubuh]' namaz='$bagtubuhx[nama_bagtubuh]'
														class='gicon-remove'>
															hapus
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
	
					case 'mnilairesiko':
							if (isset($_GET['nama_nilairesiko']) and !empty($_GET['nama_nilairesiko'])){
								$nama_nilairesiko= $_GET['nama_nilairesiko'];
								$sql = "select * from tb_nilairesiko
										where nama_nilairesiko like '%$nama_nilairesiko%' order by id_nilairesiko desc";
							}
							else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
								$keterangan= $_GET['keterangan'];
								$sql = "select * from tb_nilairesiko 
										where keterangan like '%$keterangan%' order by id_nilairesiko desc";
							}
							else {
								$sql = "select * from tb_nilairesiko order by id_nilairesiko desc";
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
								while($nilairesikox = mysql_fetch_array($result)){
									echo"
										<tr id='nilairesiko_$nilairesikox[id_nilairesiko]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$nilairesikox[id_nilairesiko]'>
											</label></td>
											
											<td class='to_hide_phone'> $nox </td>
											<td class='to_hide_phone'> $nilairesikox[nama_nilairesiko]</td>
											<td class='to_hide_phone'> $nilairesikox[keterangan]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a data-toggle='modal' href='#myModal' class='btn btn-small'  
														rel='tooltip' data-placement='left' data-original-title=' Edit '>
														<i idz='$nilairesikox[id_nilairesiko]' class='gicon-edit'>
															edit
														</i>
													</a> 
													<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$nilairesikox[id_nilairesiko]' class='gicon-eye-open'>
															detail
														</i>
													</a> 
													<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
														data-original-title='hapus'>
														<i idz='$nilairesikox[id_nilairesiko]' namaz='$nilairesikox[nama_nilairesiko]'
														class='gicon-remove'>
															hapus
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
						case 'mkatinvestigasi':
							if (isset($_GET['nama_katinvestigasi']) and !empty($_GET['nama_katinvestigasi'])){
								$nama_katinvestigasi= $_GET['nama_katinvestigasi'];
								$sql = "select * from tb_katinvestigasi
										where nama_katinvestigasi like '%$nama_katinvestigasi%' order by id_katinvestigasi desc";
							}
							else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
								$keterangan= $_GET['keterangan'];
								$sql = "select * from tb_katinvestigasi 
										where keterangan like '%$keterangan%' order by id_katinvestigasi desc";
							}
							else {
								$sql = "select * from tb_katinvestigasi order by id_katinvestigasi desc";
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
								while($katinvestigasix = mysql_fetch_array($result)){
									echo"
										<tr id='katinvestigasi_$katinvestigasix[id_katinvestigasi]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$katinvestigasix[id_katinvestigasi]'>
											</label></td>
											
											<td class='to_hide_phone'> $nox </td>
											<td class='to_hide_phone'> $katinvestigasix[nama_katinvestigasi]</td>
											<td class='to_hide_phone'> $katinvestigasix[keterangan]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a data-toggle='modal' href='#myModal' class='btn btn-small'  
														rel='tooltip' data-placement='left' data-original-title=' Edit '>
														<i idz='$katinvestigasix[id_katinvestigasi]' class='gicon-edit'>
															edit
														</i>
													</a> 
													<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$katinvestigasix[id_katinvestigasi]' class='gicon-eye-open'>
															detail
														</i>
													</a> 
													<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
														data-original-title='hapus'>
														<i idz='$katinvestigasix[id_katinvestigasi]' namaz='$katinvestigasix[nama_katinvestigasi]'
														class='gicon-remove'>
															hapus
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
	
					case 'mjlampiran':
							if (isset($_GET['nama_jlampiran']) and !empty($_GET['nama_jlampiran'])){
								$nama_jlampiran= $_GET['nama_jlampiran'];
								$sql = "select * from tb_jlampiran
										where nama_jlampiran like '%$nama_jlampiran%' order by id_jlampiran desc";
							}
							else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
								$keterangan= $_GET['keterangan'];
								$sql = "select * from tb_jlampiran 
										where keterangan like '%$keterangan%' order by id_jlampiran desc";
							}
							else {
								$sql = "select * from tb_jlampiran order by id_jlampiran desc";
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
								while($jlampiranx = mysql_fetch_array($result)){
									echo"
										<tr id='jlampiran_$jlampiranx[id_jlampiran]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$jlampiranx[id_jlampiran]'>
											</label></td>
											
											<td class='to_hide_phone'> $nox </td>
											<td class='to_hide_phone'> $jlampiranx[nama_jlampiran]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a data-toggle='modal' href='#myModal' class='btn btn-small'  
														rel='tooltip' data-placement='left' data-original-title=' Edit '>
														<i idz='$jlampiranx[id_jlampiran]' class='gicon-edit'>
															edit
														</i>
													</a> 
													<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$jlampiranx[id_jlampiran]' class='gicon-eye-open'>
															detail
														</i>
													</a> 
													<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
														data-original-title='hapus'>
														<i idz='$jlampiranx[id_jlampiran]' namaz='$jlampiranx[nama_jlampiran]'
														class='gicon-remove'>
															hapus
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
						
					case 'mtipedampak':
							if (isset($_GET['nama_tipedampak']) and !empty($_GET['nama_tipedampak'])){
								$nama_tipedampak= $_GET['nama_tipedampak'];
								$sql = "select * from tb_tipedampak
										where nama_tipedampak like '%$nama_tipedampak%' order by id_tipedampak desc";
							}
							else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
								$keterangan= $_GET['keterangan'];
								$sql = "select * from tb_tipedampak 
										where keterangan like '%$keterangan%' order by id_tipedampak desc";
							}
							else {
								$sql = "select * from tb_tipedampak order by id_tipedampak desc";
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
								while($tipedampakx = mysql_fetch_array($result)){
									echo"
										<tr id='tipedampak_$tipedampakx[id_tipedampak]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$tipedampakx[id_tipedampak]'>
											</label></td>
											
											<td class='to_hide_phone'> $nox </td>
											<td class='to_hide_phone'> $tipedampakx[nama_tipedampak]</td>
											<td class='to_hide_phone'> $tipedampakx[keterangan]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a data-toggle='modal' href='#myModal' class='btn btn-small'  
														rel='tooltip' data-placement='left' data-original-title=' Edit '>
														<i idz='$tipedampakx[id_tipedampak]' class='gicon-edit'>
															edit
														</i>
													</a> 
													<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$tipedampakx[id_tipedampak]' class='gicon-eye-open'>
															detail
														</i>
													</a> 
													<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
														data-original-title='hapus'>
														<i idz='$tipedampakx[id_tipedampak]' namaz='$tipedampakx[nama_tipedampak]'
														class='gicon-remove'>
															hapus
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
							unset($tipedampakx);

							echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
							echo "<tr><td colspan=7>".$obj->total."</td></tr>";
								
					break;
						
					case 'mgas':
							if (isset($_GET['nama_gas']) and !empty($_GET['nama_gas'])){
								$nama_gas= $_GET['nama_gas'];
								$sql = "select * from tb_gas
										where nama_gas like '%$nama_gas%' order by id_gas desc";
							}
							else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
								$keterangan= $_GET['keterangan'];
								$sql = "select * from tb_gas 
										where keterangan like '%$keterangan%' order by id_gas desc";
							}
							else {
								$sql = "select * from tb_gas order by id_gas desc";
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
								while($gasx = mysql_fetch_array($result)){
									echo"
										<tr id='gas_$gasx[id_gas]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$gasx[id_gas]'>
											</label></td>
											
											<td class='to_hide_phone'> $nox </td>
											<td class='to_hide_phone'> $gasx[nama_gas]</td>
											<td class='to_hide_phone'> $gasx[keterangan]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a data-toggle='modal' href='#myModal' class='btn btn-small'  
														rel='tooltip' data-placement='left' data-original-title=' Edit '>
														<i idz='$gasx[id_gas]' class='gicon-edit'>
															edit
														</i>
													</a> 
													<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$gasx[id_gas]' class='gicon-eye-open'>
															detail
														</i>
													</a> 
													<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
														data-original-title='hapus'>
														<i idz='$gasx[id_gas]' namaz='$gasx[nama_gas]'
														class='gicon-remove'>
															hapus
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
					
					case 'mtempatsampling':
							if (isset($_GET['nama_tempatsampling']) and !empty($_GET['nama_tempatsampling'])){
								$nama_tempatsampling= $_GET['nama_tempatsampling'];
								$sql = "select * from tb_tempatsampling
										where nama_tempatsampling like '%$nama_tempatsampling%' order by id_tempatsampling desc";
							}
							else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
								$keterangan= $_GET['keterangan'];
								$sql = "select * from tb_tempatsampling 
										where keterangan like '%$keterangan%' order by id_tempatsampling desc";
							}
							else {
								$sql = "select * from tb_tempatsampling order by id_tempatsampling desc";
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
								while($tempatsamplingx = mysql_fetch_array($result)){
									echo"
										<tr id='tempatsampling_$tempatsamplingx[id_tempatsampling]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$tempatsamplingx[id_tempatsampling]'>
											</label></td>
											
											<td class='to_hide_phone'> $nox </td>
											<td class='to_hide_phone'> $tempatsamplingx[nama_tempatsampling]</td>
											<td class='to_hide_phone'> $tempatsamplingx[keterangan]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a data-toggle='modal' href='#myModal' class='btn btn-small'  
														rel='tooltip' data-placement='left' data-original-title=' Edit '>
														<i idz='$tempatsamplingx[id_tempatsampling]' class='gicon-edit'>
															edit
														</i>
													</a> 
													<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$tempatsamplingx[id_tempatsampling]' class='gicon-eye-open'>
															detail
														</i>
													</a> 
													<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
														data-original-title='hapus'>
														<i idz='$tempatsamplingx[id_tempatsampling]' namaz='$tempatsamplingx[nama_tempatsampling]'
														class='gicon-remove'>
															hapus
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
					
					case 'msafetyp':
							if (isset($_GET['nama_safetyp']) and !empty($_GET['nama_safetyp'])){
								$nama_safetyp= $_GET['nama_safetyp'];
								$sql = "select * from tb_safetyp
										where nama_safetyp like '%$nama_safetyp%' order by id_safetyp desc";
							}
							else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
								$keterangan= $_GET['keterangan'];
								$sql = "select * from tb_safetyp 
										where keterangan like '%$keterangan%' order by id_safetyp desc";
							}
							else {
								$sql = "select * from tb_safetyp order by id_safetyp desc";
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
								while($safetypx = mysql_fetch_array($result)){
									echo"
										<tr id='safetyp_$safetypx[id_safetyp]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$safetypx[id_safetyp]'>
											</label></td>
											
											<td class='to_hide_phone'> $nox </td>
											<td class='to_hide_phone'> $safetypx[nama_safetyp]</td>
											<td class='to_hide_phone'> $safetypx[keterangan_safetyp]</td>
											<td class='to_hide_phone'> $safetypx[target_bln]</td>
											<td class='to_hide_phone'> $safetypx[target_thn]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a data-toggle='modal' href='#myModal' class='btn btn-small'  
														rel='tooltip' data-placement='left' data-original-title=' Edit '>
														<i idz='$safetypx[id_safetyp]' class='gicon-edit'>
															edit
														</i>
													</a> 
													<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$safetypx[id_safetyp]' class='gicon-eye-open'>
															detail
														</i>
													</a> 
													<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
														data-original-title='hapus'>
														<i idz='$safetypx[id_safetyp]' namaz='$safetypx[nama_safetyp]'
														class='gicon-remove'>
															hapus
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
										
					
					case 'mjcidera':
							if (isset($_GET['nama_jcidera']) and !empty($_GET['nama_jcidera'])){
								$nama_jcidera= $_GET['nama_jcidera'];
								$sql = "select * from tb_jcidera
										where nama_jcidera like '%$nama_jcidera%' order by id_jcidera desc";
							}
							else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
								$keterangan= $_GET['keterangan'];
								$sql = "select * from tb_jcidera 
										where keterangan like '%$keterangan%' order by id_jcidera desc";
							}
							else {
								$sql = "select * from tb_jcidera order by id_jcidera desc";
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
								while($jciderax = mysql_fetch_array($result)){
									echo"
										<tr id='jcidera_$jciderax[id_jcidera]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$jciderax[id_jcidera]'>
											</label></td>
											
											<td class='to_hide_phone'> $nox </td>
											<td class='to_hide_phone'> $jciderax[nama_jcidera]</td>
											<td class='to_hide_phone'> $jciderax[keterangan]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a data-toggle='modal' href='#myModal' class='btn btn-small'  
														rel='tooltip' data-placement='left' data-original-title=' Edit '>
														<i idz='$jciderax[id_jcidera]' class='gicon-edit'>
															edit
														</i>
													</a> 
													<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$jciderax[id_jcidera]' class='gicon-eye-open'>
															detail
														</i>
													</a> 
													<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
														data-original-title='hapus'>
														<i idz='$jciderax[id_jcidera]' namaz='$jciderax[nama_jcidera]'
														class='gicon-remove'>
															hapus
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
						
					case 'mpekerja':
							$sqlu = "select * 
										from 
											tb_pekerja p, 
											tb_bagian b, 
											tb_jabatan j, 
											tb_department d, 
											tb_statuskerja s, 
											tb_shiftkerja f
											
										where 
											b.id_bagian= p.id_bagian and 
											j.id_jabatan= p.id_jabatan and 
											d.id_department = p.id_department and 
											s.id_statuskerja= p.id_statuskerja and 
											f.id_shiftkerja= p.id_shiftkerja " ;
							if (isset($_GET['nama_pekerja']) and !empty($_GET['nama_pekerja'])){
								$nama_pekerja= $_GET['nama_pekerja'];
								$sql = $sqlu." and p.nama_pekerja like '%$nama_pekerja%' order by p.NIK"; 
							}
							else if (isset($_GET['jkelamin']) and !empty($_GET['jkelamin'])){
								$jkelamin= $_GET['jkelamin'];
								$sql = $sqlu." and p.jkelamin like '%$jkelamin%' order by p.NIK desc";
							}
							else if (isset($_GET['nama_jabatan']) and !empty($_GET['nama_jabatan'])){
								$jkelamin= $_GET['nama_jabatan'];
								$sql = $sqlu."and j.nama_jabatan like '%$nama_jabatan%' order by p.NIK desc";
							}
							else if (isset($_GET['nama_bagian']) and !empty($_GET['nama_bagian'])){
								$jkelamin= $_GET['nama_bagian'];
								$sql = $sqlu."and b.nama_bagian like '%$nama_bagian%' order by p.NIK desc";
							}
							else if (isset($_GET['nama_department']) and !empty($_GET['nama_department'])){
								$jkelamin= $_GET['nama_department'];
								$sql = $sqlu."and d.nama_department like '%$nama_department%' order by p.NIK desc";
							}
							else if (isset($_GET['jkelamin']) and !empty($_GET['jkelamin'])){
								$jkelamin= $_GET['jkelamin'];
								$sql = $sqlu."and p.jkelamin like '%$jkelamin%' order by p.NIK desc";
							}
							else {
								$sql=$sqlu;
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
								while($pekerjax = mysql_fetch_array($result)){
									echo"
										<tr id='pekerja_$pekerjax[NIK]'>
											<td><label class='checkbox '>
											<input type='checkbox' id='CB$pekerjax[NIK]'>
											</label></td>
											
											<td class='to_hide_phone'> $nox </td>
											<td class='to_hide_phone'> $pekerjax[NIK]</td>
											<td class='to_hide_phone'> $pekerjax[nama_pekerja]</td>
											<td class='to_hide_phone'> $pekerjax[jkelamin]</td>
											<td class='to_hide_phone'> $pekerjax[tgllahir]</td>
											<td class='to_hide_phone'> $pekerjax[nama_jabatan]</td>
											<td class='to_hide_phone'> $pekerjax[nama_bagian]</td>
											<td class='to_hide_phone'> $pekerjax[nama_department]</td>
											<td class='to_hide_phone'> $pekerjax[nama_statuskerja]</td>
											<td class='to_hide_phone'> $pekerjax[nama_shiftkerja]</td>
											<td class='to_hide_phone'> $pekerjax[tgl_masuk]</td>
											<td class='to_hide_phone'> $pekerjax[tgl_keluar]</td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a data-toggle='modal' href='#myModal' class='btn btn-small'  
														rel='tooltip' data-placement='left' data-original-title=' Edit '>
														<i idz='$pekerjax[NIK]' class='gicon-edit'>
															edit
														</i>
													</a> 
													<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$pekerjax[NIK]' class='gicon-eye-open'>
															detail
														</i>
													</a> 
													<a  class='btn target='_blank' btn-small' rel='tooltip' data-placement='bottom' 
														data-original-title='hapus'>
														<i idz='$pekerjax[NIK]' namaz='$pekerjax[nama_pekerja]'
														class='gicon-remove'>
															hapus
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
					
						
					}
			break;

	#tambah =====================================================================================================			
			case 'tambah' :
				switch($menu){
						case 'suser':
							$pass = md5($_POST[passwordTB]);
							$sql="insert into tb_users set 	username='$_POST[usernameTB]',
															password='$pass',
															nama_lengkap='$_POST[nama_lengkapTB]',
															email='$_POST[emailTB]'
																			";
							#var_dump($sql);exit();
							$simpanQ=mysql_query($sql)or die('eror sql');
							
							if($simpanQ){
								echo'{  "status":"sukses" }';
							}else{
								echo'{
										"status":"gagal"
								}';
							}
						break;
						case 'shakakses':
							$simpanQ=mysql_query("insert into tb_hakakses set id_menu='$_POST[id_menuTB]',
																				id_level='$_POST[id_levelTB]'
																			")or die('eror sql');
							$idx=mysql_insert_id();
							$tersimpanQ = mysql_fetch_assoc(mysql_query("select * 
																			from 
																				tb_menu m, tb_level l, tb_hakakses h
																			where 
																				h.id_menu = m.id_menu and
																				h.id_level = l.id_level and
																				h.id_hakakses ='$idx'"));
							if($simpanQ){
								echo'{
										"status":"sukses",
										"id_hakakses":"'.$idx.'",
										"nama_menu":"'.$tersimpanQ['nama_menu'].'",
										"nama_level":"'.$tersimpanQ['nama_level'].'"
								}';
							}else{
								echo'{
										"status":"gagal"
								}';
							}
						break;
						case 'smenu':
							$simpanQ=mysql_query("insert into tb_menu set 	nama_menu='$_POST[nama_menuTB]',
																			link='$_POST[linkTB]',
																			sub='$_POST[subTB]'
																			")or die('eror sql');
							$idx=mysql_insert_id();
							if($simpanQ){
								echo'{
										"status":"sukses",
										"id":"'.$idx.'",
										"nama_menu":"'.$_POST['nama_menuTB'].'"
								}';
							}else{
								echo'{
										"status":"gagal"
								}';
							}
						break;
						case 'slevel':
							$simpanQ=mysql_query("insert into tb_level set nama_level ='$_POST[nama_levelTB]'")or die('eror sql');
							$idx=mysql_insert_id();
							if($simpanQ){
								echo'{
										"status":"sukses",
										"id":"'.$idx.'",
										"nama_level":"'.$_POST['nama_levelTB'].'"
								}';
							}else{
								echo'{
										"status":"gagal"
								}';
							}
						break;
						
						case 'mbagian':
							$simpanQ=mysql_query("insert into tb_bagian set nama_bagian ='$_POST[nama_bagianTB]',
																		 keterangan ='$_POST[keteranganTB]'")or die('eror sql');
							$idx=mysql_insert_id();
							if($simpanQ){
								echo'{
										"status":"sukses",
										"id":"'.$idx.'",
										"keterangan":"'.$_POST['keteranganTB'].'",
										"nama_bagian":"'.$_POST['nama_bagianTB'].'"
								}';
							}else{
								echo'{
										"status":"gagal"
								}';
							}
						break;
						
						case 'mjabatan':
							$simpanQ=mysql_query("insert into tb_jabatan set nama_jabatan ='$_POST[nama_jabatanTB]',
																		 keterangan ='$_POST[keteranganTB]'")or die('eror sql');
							$idx=mysql_insert_id();
							if($simpanQ){
								echo'{
										"status":"sukses",
										"id":"'.$idx.'",
										"keterangan":"'.$_POST['keteranganTB'].'",
										"nama_jabatan":"'.$_POST['nama_jabatanTB'].'"
								}';
							}else{
								echo'{
										"status":"gagal"
								}';
							}
						break;
						
						case 'mdepartment':
							$simpanQ=mysql_query("insert into tb_department set nama_department ='$_POST[nama_departmentTB]',
																		 keterangan ='$_POST[keteranganTB]'")or die('eror sql');
							$idx=mysql_insert_id();
							if($simpanQ){
								echo'{
										"status":"sukses",
										"id":"'.$idx.'",
										"keterangan":"'.$_POST['keteranganTB'].'",
										"nama_department":"'.$_POST['nama_departmentTB'].'"
								}';
							}else{
								echo'{
										"status":"gagal"
								}';
							}
						break;
						
						case 'mstatuskerja':
							$simpanQ=mysql_query("insert into tb_statuskerja set nama_statuskerja ='$_POST[nama_statuskerjaTB]'")or die('eror sql');
							$idx=mysql_insert_id();
							if($simpanQ){
								echo'{
										"status":"sukses",
										"id":"'.$idx.'",
										"nama_statuskerja":"'.$_POST['nama_statuskerjaTB'].'"
								}';
							}else{
								echo'{
										"status":"gagal"
								}';
							}
						break;
						
						case 'mjkecel':
							$simpanQ=mysql_query("insert into tb_jkecel set nama_jeniskecel ='$_POST[nama_jeniskecelTB]',
																		 	sub_jeniskecel	='$_POST[sub_jeniskecelTB]',
																			keterangan 		='$_POST[keteranganTB]'")
																			or die('eror sql');
							$idx=mysql_insert_id();
							if($simpanQ){
								echo'{
										"status":"sukses",
										"id":"'.$idx.'",
										"keterangan":"'.$_POST['keteranganTB'].'",
										"nama_jeniskecel":"'.$_POST['nama_jeniskecelTB'].'",
										"sub_jeniskecel":"'.$_POST['sub_jeniskecelTB'].'"
								}';
							}else{
								echo'{
										"status":"gagal"
								}';
							}
						break;
						case 'mjcidera':
							$simpanQ=mysql_query("insert into tb_jcidera set nama_jcidera ='$_POST[nama_jcideraTB]',
																		 keterangan ='$_POST[keteranganTB]'")or die('eror sql');
							$idx=mysql_insert_id();
							if($simpanQ){
								echo'{
										"status":"sukses",
										"id":"'.$idx.'",
										"keterangan":"'.$_POST['keteranganTB'].'",
										"nama_jcidera":"'.$_POST['nama_jcideraTB'].'"
								}';
							}else{
								echo'{
										"status":"gagal"
								}';
							}
						break;
						case 'mbagtubuh':
							$simpanQ=mysql_query("insert into tb_bagtubuh set nama_bagtubuh ='$_POST[nama_bagtubuhTB]',
																		 keterangan ='$_POST[keteranganTB]'")or die('eror sql');
							$idx=mysql_insert_id();
							if($simpanQ){
								echo'{
										"status":"sukses",
										"id":"'.$idx.'",
										"keterangan":"'.$_POST['keteranganTB'].'",
										"nama_bagtubuh":"'.$_POST['nama_bagtubuhTB'].'"
								}';
							}else{
								echo'{
										"status":"gagal"
								}';
							}
						break;
						case 'mnilairesiko':
							$simpanQ=mysql_query("insert into tb_nilairesiko set nama_nilairesiko ='$_POST[nama_nilairesikoTB]',
																		 keterangan ='$_POST[keteranganTB]'")or die('eror sql');
							$idx=mysql_insert_id();
							if($simpanQ){
								echo'{
										"status":"sukses",
										"id":"'.$idx.'",
										"keterangan":"'.$_POST['keteranganTB'].'",
										"nama_nilairesiko":"'.$_POST['nama_nilairesikoTB'].'"
								}';
							}else{
								echo'{
										"status":"gagal"
								}';
							}
						break;
						case 'mkatinvestigasi':
							$simpanQ=mysql_query("insert into tb_katinvestigasi set nama_katinvestigasi ='$_POST[nama_katinvestigasiTB]',
																		 keterangan ='$_POST[keteranganTB]'")or die('eror sql');
							$idx=mysql_insert_id();
							if($simpanQ){
								echo'{
										"status":"sukses",
										"id":"'.$idx.'",
										"keterangan":"'.$_POST['keteranganTB'].'",
										"nama_katinvestigasi":"'.$_POST['nama_katinvestigasiTB'].'"
								}';
							}else{
								echo'{
										"status":"gagal"
								}';
							}
						break;
						case 'mjlampiran':
							$simpanQ=mysql_query("insert into tb_jlampiran set nama_jlampiran ='$_POST[nama_jlampiranTB]'")or die('eror sql');
							$idx=mysql_insert_id();
							if($simpanQ){
								echo'{
										"status":"sukses",
										"id":"'.$idx.'",
										"nama_jlampiran":"'.$_POST['nama_jlampiranTB'].'"
								}';
							}else{
								echo'{
										"status":"gagal"
								}';
							}
						break;
						case 'mtipedampak':
							$simpanQ=mysql_query("insert into tb_tipedampak set nama_tipedampak ='$_POST[nama_tipedampakTB]', 
																			keterangan='$_POST[keteranganTB]'")or die('eror sql');
							$idx=mysql_insert_id();
							if($simpanQ){
								echo'{
										"status":"sukses",
										"id":"'.$idx.'",
										"nama_tipedampak":"'.$_POST['nama_tipedampakTB'].'",
										"keterangan":"'.$_POST['keteranganTB'].'"
								}';
							}else{
								echo'{
										"status":"gagal"
								}';
							}
						break;
						case 'mtempatsampling':
							$simpanQ=mysql_query("insert into tb_tempatsampling set nama_tempatsampling ='$_POST[nama_tempatsamplingTB]', 
																			keterangan='$_POST[keteranganTB]'")or die('eror sql');
							$idx=mysql_insert_id();
							if($simpanQ){
								echo'{
										"status":"sukses",
										"id":"'.$idx.'",
										"nama_tempatsampling":"'.$_POST['nama_tempatsamplingTB'].'",
										"keterangan":"'.$_POST['keteranganTB'].'"
								}';
							}else{
								echo'{
										"status":"gagal"
								}';
							}
						break;
						case 'msafetyp':
							$simpanQ=mysql_query("insert into tb_safetyp set nama_safetyp 		='$_POST[nama_safetypTB]', 
																			keterangan_safetyp	='$_POST[keteranganTB]',
																			target_bln			='$_POST[target_blnTB]',
																			target_thn			='$_POST[target_thnTB]'")or die('eror sql');
							$idx=mysql_insert_id();
							if($simpanQ){
								echo'{
										"status":"sukses",
										"id":"'.$idx.'",
										"nama_safetyp":"'.$_POST['nama_safetypTB'].'",
										"target_bln":"'.$_POST['target_blnTB'].'",
										"target_thn":"'.$_POST['target_thnTB'].'",
										"keterangan":"'.$_POST['keteranganTB'].'"
								}';
							}else{
								echo'{
										"status":"gagal"
								}';
							}
						break;

					}
			break;

	#ubah =====================================================================================================			
			case 'ubah' :
				switch ($menu){
					case 'smenu';
						$simpanQ=mysql_query("update tb_menu set nama_menu ='$_POST[nama_menuTB]', link='$_POST[linkTB]',sub='$_POST[subTB]'  where id_menu = '$_GET[idx]'");
						if($simpanQ){
							echo'{
									"status":"sukses",
									"nama_menu":"'.$_POST['nama_menuTB'].'",
									"linkx":"'.$_POST['linkTB'].'",
									"subx":"'.$_POST['subTB'].'"
								}';
						}else{
							echo'{
									"status":"gagal"
								}';
						}
					break;
					case 'slevel';
						$simpanQ=mysql_query("update tb_level set 	nama_level ='$_POST[nama_levelTB]' where id_level = '$_GET[idx]'");
						if($simpanQ){
							echo'{
									"status":"sukses",
									"nama_level":"'.$_POST['nama_levelTB'].'"
								}';
						}else{
							echo'{
									"status":"gagal"
								}';
						}
					break;
					case 'mbagian';
						$simpanQ=mysql_query("update tb_bagian set 	nama_bagian ='$_POST[nama_bagianTB]', 
																		keterangan ='$_POST[keteranganTB]' 
																		where id_bagian = '$_GET[idx]'");
						if($simpanQ){
							echo'{
									"status":"sukses",
									"keterangan":"'.$_POST['keteranganTB'].'",
									"nama_bagian ":"'.$_POST['nama_bagianTB'].'"
								}';
						}else{
							echo'{
									"status":"gagal"
								}';
						}
					break;
					case 'mjabatan';
						$simpanQ=mysql_query("update tb_jabatan set 	nama_jabatan ='$_POST[nama_jabatanTB]', 
																		keterangan ='$_POST[keteranganTB]' 
																		where id_jabatan = '$_GET[idx]'");
						if($simpanQ){
							echo'{
									"status":"sukses",
									"keterangan":"'.$_POST['keteranganTB'].'",
									"nama_jabatan ":"'.$_POST['nama_jabatanTB'].'"
								}';
						}else{
							echo'{
									"status":"gagal"
								}';
						}
					break;
					case 'mdepartment';
						$simpanQ=mysql_query("update tb_department set 	nama_department ='$_POST[nama_departmentTB]', 
																		keterangan ='$_POST[keteranganTB]' 
																		where id_department = '$_GET[idx]'");
						if($simpanQ){
							echo'{
									"status":"sukses",
									"keterangan":"'.$_POST['keteranganTB'].'",
									"nama_department ":"'.$_POST['nama_departmentTB'].'"
								}';
						}else{
							echo'{
									"status":"gagal"
								}';
						}
					break;
					case 'mstatuskerja';
						$simpanQ=mysql_query("update tb_statuskerja set nama_statuskerja ='$_POST[nama_statuskerjaTB]' 
																		where id_statuskerja = '$_GET[idx]'");
						if($simpanQ){
							echo'{
									"status":"sukses",
									"keterangan":"'.$_POST['keteranganTB'].'",
									"nama_statuskerja ":"'.$_POST['nama_statuskerjaTB'].'"
								}';
						}else{
							echo'{
									"status":"gagal"
								}';
						}
					break;
					case 'mjkecel';
						$simpanQ=mysql_query("update tb_jkecel set 	nama_jeniskecel ='$_POST[nama_jeniskecelTB]', 
																	sub_jeniskecel ='$_POST[sub_jeniskecelTB]', 
																	keterangan ='$_POST[keteranganTB]' 
																	where id_jkecel = '$_GET[idx]'");
						if($simpanQ){
							echo'{
									"status":"sukses",
									"keterangan":"'.$_POST['keteranganTB'].'",
									"sub_jeniskecel":"'.$_POST['sub_jeniskecelTB'].'",
									"nama_jeniskecel":"'.$_POST['nama_jeniskecelTB'].'"
								}';
						}else{
							echo'{
									"status":"gagal"
								}';
						}
					break;
					case 'mjcidera';
						$simpanQ=mysql_query("update tb_jcidera set 	nama_jcidera ='$_POST[nama_jcideraTB]', 
																		keterangan ='$_POST[keteranganTB]' 
																		where id_jcidera = '$_GET[idx]'");
						if($simpanQ){
							echo'{
									"status":"sukses",
									"keterangan":"'.$_POST['keteranganTB'].'",
									"nama_jcidera ":"'.$_POST['nama_jcideraTB'].'"
								}';
						}else{
							echo'{
									"status":"gagal"
								}';
						}
					break;
					case 'mbagtubuh';
						$simpanQ=mysql_query("update tb_bagtubuh set 	nama_bagtubuh ='$_POST[nama_bagtubuhTB]', 
																		keterangan ='$_POST[keteranganTB]' 
																		where id_bagtubuh = '$_GET[idx]'");
						if($simpanQ){
							echo'{
									"status":"sukses",
									"keterangan":"'.$_POST['keteranganTB'].'",
									"nama_bagtubuh ":"'.$_POST['nama_bagtubuhTB'].'"
								}';
						}else{
							echo'{
									"status":"gagal"
								}';
						}
					break;
					case 'mnilairesiko':
						$simpanQ=mysql_query("update tb_nilairesiko set 	nama_nilairesiko ='$_POST[nama_nilairesikoTB]', 
																		keterangan ='$_POST[keteranganTB]' 
																		where id_nilairesiko = '$_GET[idx]'");
						if($simpanQ){
							echo'{
									"status":"sukses",
									"keterangan":"'.$_POST['keteranganTB'].'",
									"nama_nilairesiko ":"'.$_POST['nama_nilairesikoTB'].'"
								}';
						}else{
							echo'{
									"status":"gagal"
								}';
						}
					break;
					case 'mkatinvestigasi':
						$simpanQ=mysql_query("update tb_katinvestigasi set 	nama_katinvestigasi ='$_POST[nama_katinvestigasiTB]', 
																		keterangan ='$_POST[keteranganTB]' 
																		where id_katinvestigasi = '$_GET[idx]'");
						if($simpanQ){
							echo'{
									"status":"sukses",
									"keterangan":"'.$_POST['keteranganTB'].'",
									"nama_katinvestigasi ":"'.$_POST['nama_katinvestigasiTB'].'"
								}';
						}else{
							echo'{
									"status":"gagal"
								}';
						}
					break;
					case 'mjlampiran':
						$simpanQ=mysql_query("update tb_jlampiran set 	nama_jlampiran ='$_POST[nama_jlampiranTB]' 
																		where id_jlampiran = '$_GET[idx]'");
						if($simpanQ){
							echo'{
									"status":"sukses",
									"nama_jlampiran ":"'.$_POST['nama_jlampiranTB'].'"
								}';
						}else{
							echo'{
									"status":"gagal"
								}';
						}
					break;
					case 'mtipedampak':
						$simpanQ=mysql_query("update tb_tipedampak set 	nama_tipedampak ='$_POST[nama_tipedampakTB]' 
																		where id_tipedampak = '$_GET[idx]'");
						if($simpanQ){
							echo'{
									"status":"sukses",
									"keterangan":"'.$_POST['keteranganTB'].'",
									"nama_tipedampak ":"'.$_POST['nama_tipedampakTB'].'"
								}';
						}else{
							echo'{
									"status":"gagal"
								}';
						}
					break;
					case 'mtempatsampling':
						$simpanQ=mysql_query("update tb_tempatsampling set 	nama_tempatsampling ='$_POST[nama_tempatsamplingTB]', 
																			keterangan = '$_POST[keteranganTB]'
																			where id_tempatsampling = '$_GET[idx]'");
						if($simpanQ){
							echo'{
									"status":"sukses",
									"keterangan":"'.$_POST['keteranganTB'].'",
									"nama_tempatsampling ":"'.$_POST['nama_tempatsamplingTB'].'"
								}';
						}else{
							echo'{
									"status":"gagal"
								}';
						}
					break;
					case 'msafetyp':
						$simpanQ=mysql_query("update tb_safetyp set nama_safetyp		='$_POST[nama_safetypTB]', 
																	target_bln			= '$_POST[target_blnTB]', 
																	target_thn			= '$_POST[target_thnTB]', 
																	keterangan_safetyp	= '$_POST[keteranganTB]'
																	where id_safetyp 	= '$_GET[idx]'");
						if($simpanQ){
							echo'{
									"status":"sukses",
									"keterangan":"'.$_POST['keteranganTB'].'",
									"target_bln":"'.$_POST['target_blnTB'].'",
									"target_thn":"'.$_POST['target_thnTB'].'",
									"nama_safetyp ":"'.$_POST['nama_safetypTB'].'"
								}';
						}else{
							echo'{
									"status":"gagal"
								}';
						}
					break;
						
				}
			break;

	#hapus =====================================================================================================			
			case 'hapus' :
				switch($menu){
						case 'smenu':
							$terhapusQ=mysql_fetch_assoc(mysql_query("	select * from tb_menu where id_menu ='$_GET[idx]'"));
							$hapusQ=mysql_query("delete from tb_menu where id_menu ='$_GET[idx]'");
							if($terhapusQ){
								echo '{
										"status"		:"sukses",
										"id"			:"'.$_GET[idx].'",
										"nama_menu":"'.$terhapusQ['nama_menu'].'"
										}';
							}else{
								echo '{
										"status"		:"gagal",
										"id"			:"'.$_GET[idx].'"
										}';						
							}
						break;
						case 'slevel':
							$terhapusQ=mysql_fetch_assoc(mysql_query("	select * from tb_level where id_level ='$_GET[idx]'"));
							$hapusQ=mysql_query("delete from tb_level where id_level='$_GET[idx]'");
							if($terhapusQ){
								echo '{
										"status"		:"sukses",
										"id"			:"'.$_GET[idx].'",
										"nama_level":"'.$terhapusQ['nama_level'].'"
										}';
							}else{
								echo '{
										"status"		:"gagal",
										"id"			:"'.$_GET[idx].'"
										}';						
							}
						break;
						case 'mbagian':
							$terhapusQ=mysql_fetch_assoc(mysql_query("	select * from tb_bagian
																		where id_bagian='$_GET[idx]'"));
							$hapusQ=mysql_query("delete from tb_bagian where id_bagian	='$_GET[idx]'");
							if($terhapusQ){
								echo '{
										"status"		:"sukses",
										"id"			:"'.$_GET[idx].'",
										"nama_bagian ":"'.$terhapusQ['nama_bagian'].'",
										"keterangan"	:"'.$terhapusQ['keterangan'].'"
										}';
							}else{
								echo '{
										"status"		:"gagal",
										"id"			:"'.$_GET[idx].'"
										}';						
							}
						break;
						case 'mjabatan':
							$terhapusQ=mysql_fetch_assoc(mysql_query("	select * from tb_jabatan
																		where id_jabatan='$_GET[idx]'"));
							$hapusQ=mysql_query("delete from tb_jabatan where id_jabatan	='$_GET[idx]'");
							if($terhapusQ){
								echo '{
										"status"		:"sukses",
										"id"			:"'.$_GET[idx].'",
										"nama_jabatan ":"'.$terhapusQ['nama_jabatan'].'",
										"keterangan"	:"'.$terhapusQ['keterangan'].'"
										}';
							}else{
								echo '{
										"status"		:"gagal",
										"id"			:"'.$_GET[idx].'"
										}';						
							}
						break;
						case 'mdepartment':
							$terhapusQ=mysql_fetch_assoc(mysql_query("	select * from tb_department
																		where id_department='$_GET[idx]'"));
							$hapusQ=mysql_query("delete from tb_department where id_department	='$_GET[idx]'");
							if($terhapusQ){
								echo '{
										"status"		:"sukses",
										"id"			:"'.$_GET[idx].'",
										"nama_department ":"'.$terhapusQ['nama_department'].'",
										"keterangan"	:"'.$terhapusQ['keterangan'].'"
										}';
							}else{
								echo '{
										"status"		:"gagal",
										"id"			:"'.$_GET[idx].'"
										}';						
							}
						break;
						case 'mstatuskerja':
							$terhapusQ=mysql_fetch_assoc(mysql_query("	select * from tb_statuskerja
																		where id_statuskerja='$_GET[idx]'"));
							$hapusQ=mysql_query("delete from tb_statuskerja where id_statuskerja	='$_GET[idx]'");
							if($terhapusQ){
								echo '{
										"status"		:"sukses",
										"id"			:"'.$_GET[idx].'",
										"nama_statuskerja ":"'.$terhapusQ['nama_statuskerja'].'"
									}';
							}else{
								echo '{
										"status"		:"gagal",
										"id"			:"'.$_GET[idx].'"
										}';						
							}
						break;
						case 'mjkecel':
							$terhapusQ=mysql_fetch_assoc(mysql_query("	select * from tb_jkecel
																		where id_jkecel='$_GET[idx]'"));
							$hapusQ=mysql_query("delete from tb_jkecel where id_jkecel	='$_GET[idx]'");
							if($terhapusQ){
								echo '{
										"status"		:"sukses",
										"id"			:"'.$_GET[idx].'",
										"keterangan":"'.$terhapusQ['keterangan'].'",
										"nama_jeniskecel":"'.$terhapusQ['nama_jeniskecel'].'",
										"sub_jeniskecel":"'.$terhapusQ['nama_jeniskecel'].'"
									}';
							}else{
								echo '{
										"status"		:"gagal",
										"id"			:"'.$_GET[idx].'"
										}';						
							}
						break;
						case 'mjcidera':
							$terhapusQ=mysql_fetch_assoc(mysql_query("	select * from tb_jcidera
																		where id_jcidera='$_GET[idx]'"));
							$hapusQ=mysql_query("delete from tb_jcidera where id_jcidera	='$_GET[idx]'");
							if($terhapusQ){
								echo '{
										"status"		:"sukses",
										"id"			:"'.$_GET[idx].'",
										"nama_jcidera ":"'.$terhapusQ['nama_jcidera'].'"
									}';
							}else{
								echo '{
										"status"		:"gagal",
										"id"			:"'.$_GET[idx].'"
										}';						
							}
						break;
						case 'mbagtubuh':
							$terhapusQ=mysql_fetch_assoc(mysql_query("	select * from tb_bagtubuh
																		where id_bagtubuh='$_GET[idx]'"));
							$hapusQ=mysql_query("delete from tb_bagtubuh where id_bagtubuh	='$_GET[idx]'");
							if($terhapusQ){
								echo '{
										"status"		:"sukses",
										"id"			:"'.$_GET[idx].'",
										"nama_bagtubuh ":"'.$terhapusQ['nama_bagtubuh'].'"
									}';
							}else{
								echo '{
										"status"		:"gagal",
										"id"			:"'.$_GET[idx].'"
										}';						
							}
						break;
						case 'mkatinvestigasi':
							$terhapusQ=mysql_fetch_assoc(mysql_query("	select * from tb_katinvestigasi
																		where id_katinvestigasi='$_GET[idx]'"));
							$hapusQ=mysql_query("delete from tb_katinvestigasi where id_katinvestigasi	='$_GET[idx]'");
							if($terhapusQ){
								echo '{
										"status"		:"sukses",
										"id"			:"'.$_GET[idx].'",
										"nama_katinvestigasi ":"'.$terhapusQ['nama_katinvestigasi'].'"
									}';
							}else{
								echo '{
										"status"		:"gagal",
										"id"			:"'.$_GET[idx].'"
										}';						
							}
						break;
						case 'mjlampiran':
							$terhapusQ=mysql_fetch_assoc(mysql_query("	select * from tb_jlampiran
																		where id_jlampiran='$_GET[idx]'"));
							$hapusQ=mysql_query("delete from tb_jlampiran where id_jlampiran	='$_GET[idx]'");
							if($terhapusQ){
								echo '{
										"status"		:"sukses",
										"id"			:"'.$_GET[idx].'",
										"nama_jlampiran ":"'.$terhapusQ['nama_jlampiran'].'"
									}';
							}else{
								echo '{
										"status"		:"gagal",
										"id"			:"'.$_GET[idx].'"
										}';						
							}
						break;
						case 'mtempatsampling':
							$terhapusQ=mysql_fetch_assoc(mysql_query("	select * from tb_tempatsampling
																		where id_tempatsampling='$_GET[idx]'"));
							$hapusQ=mysql_query("delete from tb_tempatsampling where id_tempatsampling	='$_GET[idx]'");
							if($terhapusQ){
								echo '{
										"status"		:"sukses",
										"id"			:"'.$_GET[idx].'",
										"nama_tempatsampling ":"'.$terhapusQ['nama_tempatsampling'].'"
									}';
							}else{
								echo '{
										"status"		:"gagal",
										"id"			:"'.$_GET[idx].'"
										}';						
							}
						break;
						case 'msafetyp':
							$terhapusQ=mysql_fetch_assoc(mysql_query("	select * from tb_safetyp
																		where id_safetyp='$_GET[idx]'"));
							$hapusQ=mysql_query("delete from tb_safetyp where id_safetyp	='$_GET[idx]'");
							if($terhapusQ){
								echo '{
										"status"		:"sukses",
										"id"			:"'.$_GET[idx].'",
										"target_bln"	:"'.$terhapusQ['target_bln'].'",
										"target_thn"	:"'.$terhapusQ['target_thn'].'",
										"nama_safetyp "	:"'.$terhapusQ['nama_safetyp'].'"
									}';
							}else{
								echo '{
										"status"		:"gagal",
										"id"			:"'.$_GET[idx].'"
										}';						
							}
						break;
					}
					break;

	#hapus semua=====================================================================================================
			case 'hapussemua' :
					switch($menu){
						case 'slevel':
							$hapusQ=mysql_query("truncate tb_level")or die("gagal mengosongkakn tb_level");
							if($hapusQ){
								echo '{"status":"sukses"}';
							}else{
								echo '{"status":"gagal"}';						
							}
						break;
						case 'smenu':
							$hapusQ=mysql_query("truncate tb_menu")or die("gagal mengosongkakn tb_menu");
							if($hapusQ){
								echo '{"status":"sukses"}';
							}else{
								echo '{"status":"gagal"}';						
							}
						break;
					}
			break;
		}
	

?>