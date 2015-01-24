<?php
	session_start();
	//include"lib/sesi.php";
	include"../lib/koneks.php";
	include"../lib/murni.php";
	include"../lib/pagination_class.php";
 
 	$aksi 	=  isset($_GET['aksi'])?$_GET['aksi']:'';
	$menu	=  isset($_GET['menu'])?$_GET['menu']:'';
	$page 	=  isset($_GET['page'])?$_GET['page']:'';
	$cari	=  isset($_GET['cari'])?$_GET['cari']:'';
	$tabel	=  isset($_GET['tabel'])?$_GET['tabel']:'';
	// var_dump($menu);exit();
	switch ($aksi){
	#cek =======================================================================================================
			case'cek':
				switch($menu){
					case 'mpeg':
						$sql = "select * from tb_peg where nik = '$_GET[nik]' ";
						$exe = mysql_query($sql);
						$jum = mysql_num_rows($exe);
						if($jum==0){
							echo '{"status":"available"}';
						}else{
							echo '{"status":"used"}';
						}
					break;
					
					case 'mperdet':
						//$tot1 = mysql_num_rows(mysql_query("select * from tb_perangkat"));
						$tot1 = mysql_num_rows(mysql_query("select * from tb_backbone"));
						//var_dump($tot1);exit();
						if($tot1>0){ //ada perangkat
							$tot2 = mysql_num_rows(mysql_query('select * from tb_perangkat_detail'));
							//var_dump($tot2);exit();
							if($tot2>0){ //ada per detail
								/*$sql3 =	"SELECT p.id , p.merk
										FROM tb_perangkat p
										INNER JOIN (
											SELECT id_per, count( * ) AS jum
											FROM tb_perangkat_detail
											GROUP BY id_per
										)d ON p.id = d.id_per
										WHERE d.jum < p.jumMax";*/
								$sql3 =	"SELECT p.id , b.merk
										FROM tb_perangkat p, tb_backbone b
										INNER JOIN (
											SELECT id_per, count( * ) AS jum
											FROM tb_perangkat_detail
											GROUP BY id_per
										)d ON p.id = d.id_per
										WHERE d.jum < b.avail2mbps";
										
								//var_dump($sql);exit();
								$exe3	= mysql_query($sql3);
								$tot3	= mysql_num_rows($exe3);
								//var_dump($tot2);exit();
								if($tot3>0){
									echo '{"status":"available"}';
								}else{
									echo '{"status":"full"}';
								}
							}else{
								echo '{"status":"no_per_detail"}';
							}
						}else{
							echo '{"status":"no_perangkat"}';
						}
					break;
					
					/*function transaksi_id($param='inv-str') {
						$dataMax = mysql_fetch_assoc(mysql_query(
						"SELECT SUBSTR(MAX(`NO_FAKTUR`),-5) AS ID  FROM master_transaksi")); // ambil data maximal dari id transaksi

						if($dataMax['ID']=='') { // bila data kosong
							$ID = $param."00001";
						}else {
							$MaksID = $dataMax['ID'];
							$MaksID++;
							if($MaksID < 10) $ID = $param."0000".$MaksID; // nilai kurang dari 10
							else if($MaksID < 100) $ID = $param."000".$MaksID; // nilai kurang dari 100
							else if($MaksID < 1000) $ID = $param."00".$MaksID; // nilai kurang dari 1000
							else if($MaksID < 10000) $ID = $param."0".$MaksID; // nilai kurang dari 10000
							else $ID = $MaksID; // lebih dari 10000
						}
						return $ID;}*/
					
					case 'mper':
						$sql =	"SELECT SUBSTR(MAX(id),-3)+1 as idmax FROM tb_perangkat";
						//var_dump($sql);exit();
						$exe	= mysql_query($sql);
						$res	= mysql_fetch_assoc($exe);
						//var_dump($exe);exit();
						$tot	= mysql_num_rows($exe);
						//var_dump($tot);exit();
						if($exe){
							$idmax=$res['idmax'];
							$pre	='P';
							if($idmax==NULL){
								$idnow	= 'P001';
								echo '{"status":"kosong","id":"'.$idnow.'"}';
							}else{
								if($idmax < 10) $idnow = $pre."00".$idmax; // nilai kurang dari 10
								else if($idmax < 100) $idnow = $pre."0".$idmax; // nilai kurang dari 100
								else $idnow = $pre.$idmax; // lebih dari 10000
							
								echo '{"status":"ada","id":"'.$idnow.'"	}';
							}
						}else{
							echo '{"status":"gagal"}';
						}
					break;
				}
			break;

	#combo ===================================================================================================
			case 'combo':
				switch($menu)
				{
					case 'mback':
						switch ($tabel)
						{
							case 'tb_perangkat':
								$sql 	= "	select * from tb_perangkat group by merk order by merk  ";
								//var_dump($sql);exit();
								$kue	= mysql_query($sql);
								$ambil  = array();
								
								while($ambilR	= mysql_fetch_array($kue)){
									$ambil[]=$ambilR;
								}
								
								if($ambil!=NULL){
									echo json_encode($ambil);
								}else{
									echo '{"status":"gagal"}';
								}
							break;	
							case 'tb_sistra':
								$sql 	= "	select * from tb_sistra order by sistra asc";
								//var_dump($sql);exit();
								$kue	= mysql_query($sql);
								$ambil  = array();
								
								while($ambilR	= mysql_fetch_array($kue)){
									$ambil[]=$ambilR;
								}
								
								if($ambil!=NULL){
									echo json_encode($ambil);
								}else{
									echo '{"status":"gagal"}';
								}
							break;	
						}
					break;
					
					case 'mkoordc':
						switch ($tabel)
						{
							case 'tb_peg':
								$sql 	= "	select * from tb_peg 
											where not(id_level = 'admin')
											order by nik";
								$kue	= mysql_query($sql);
								$ambil  = array();
								while($ambilR	= mysql_fetch_array($kue)){
									$ambil[]=$ambilR;
								}
								
								if($ambil!=NULL){
									echo json_encode($ambil);
								}
								else{
									echo '{"status":"gagal"}';
								}
							break;								
							case 'tb_loker':
								$sql 	= "	select * from tb_loker order by id_loker";
								$kue	= mysql_query($sql);
								$ambil  = array();
								while($ambilR	= mysql_fetch_array($kue)){
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
					
					case 'mkapc':
						switch ($tabel)
						{
							case 'tb_backbone':
								$sql 	= "	select * from tb_backbone order by id_backbone asc";
								$kue	= mysql_query($sql);
								$ambil  = array();
								while($ambilR	= mysql_fetch_array($kue)){
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
					
					case 'mperdetc':
						switch ($tabel){
							case 'tb_perangkat_detail':
								$sql 	= "select id as id_per, merk from tb_perangkat ";
								$kue	= mysql_query($sql);
								$ambil  = array();
								while($ambilR	= mysql_fetch_array($kue)){
									$ambil[]=$ambilR;
								}
								
								if($ambil!=NULL){
									echo json_encode($ambil);
								}
								else{
									echo '{"status":"kosong"}';
								}
							break;				
							case 'tb_backbone':
								//$mer
								$sql 	= "	SELECT
												bb.id_backbone,
												bb.kode,
												bb.avail2mbps
											FROM
												tb_backbone bb
											left JOIN (
												SELECT
													pd.id_backbone,
													COUNT(*) jum
												FROM
													tb_perangkat_detail pd,
													tb_perangkat p,
													tb_backbone b
												WHERE
													pd.id_backbone = b.id_backbone
												AND p.id = pd.id_per
												AND SUBSTRING_INDEX(b.kode, ' ', 1) = '$_GET[merk]'
												GROUP BY
													id_backbone
											) used ON bb.id_backbone = used.id_backbone
											WHERE
												(SUBSTRING_INDEX(bb.kode, ' ', 1) = '$_GET[merk]' AND used.id_backbone is NULL) or  
												jum < avail2mbps";
								//var_dump($sql);exit();
								$kue	= mysql_query($sql);
								$ambil  = array();
								while($ambilR	= mysql_fetch_array($kue)){
									$ambil[]=$ambilR;
								}
								
								if($ambil!=NULL){
									//var_dump($ambil);exit();
									echo json_encode($ambil);
								}
								else{
									echo '{"status":"kosong"}';
								}
							break;				
							
							case 'tb_perangkat':
								$sql 	= "	select * from tb_perangkat ";
								$kue	= mysql_query($sql);
								$ambil  = array();
								while($ambilR	= mysql_fetch_array($kue)){
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
	#end of combo =====================================================================================================
	
	#cetak =====================================================================================================
			case 'cetak':
				switch($menu){
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
					break;
				}
			break;
	#end of cetak =====================================================================================================				
	
	#ambil edit =====================================================================================================				
			case 'ambiledit':
				switch($menu)
				{
					case 'mlinka':
						$jalan	= 	mysql_query("select * from tb_linka where id_linka = '$_GET[idx]'") 
									or die("kueri ambil edit linkA error");
						$ambilR = 	mysql_fetch_assoc($jalan);
						if($jalan)
						{
							echo '{
								"status":"sukses",
								"nama":"'.$ambilR['nama'].'",
								"keterangan":"'.$ambilR['keterangan'].'"
								}';
						}
						else
						{
							echo '{"status":"gagal"}';
						}
					break;
					
					case 'mlinkb':
						$jalan	= 	mysql_query("select * from tb_linkb where id_linkb = '$_GET[idx]'") 
									or die("kueri ambil edit linkb error");
						$ambilR = 	mysql_fetch_assoc($jalan);
						if($jalan)
						{
							echo '{
								"status":"sukses",
								"nama":"'.$ambilR['nama'].'",
								"keterangan":"'.$ambilR['keterangan'].'"
								}';
						}
						else
						{
							echo '{"status":"gagal"}';
						}
					break;
					
					case 'mpeg':
						$jalan	= 	mysql_query("select * from tb_peg where id_peg = '$_GET[idx]'") 
									or die("kueri ambil edit pegawai error");
						$ambilR = 	mysql_fetch_assoc($jalan);
						if($jalan){
							echo '{
								"status":"sukses",
								"nik":"'.$ambilR['nik'].'",
								"nama":"'.$ambilR['nama'].'",
								"alamat":"'.$ambilR['alamat'].'",
								"username":"'.$ambilR['username'].'",
								"id_session":"'.$ambilR['id_session'].'",
								"id_level":"'.$ambilR['id_level'].'"
								}';
						}else{
							echo '{"status":"gagal"}';
						}
					break;
				
					case 'muser':
						$jalan	= 	mysql_query("select * from tb_user where id_user = '$_GET[idx]'") 
									or die("kueri ambil edit user error");
						$ambilR = 	mysql_fetch_assoc($jalan);
						if($jalan)
						{
							echo '{
								"status":"sukses",
								"user":"'.$ambilR['user'].'",
								"keterangan":"'.$ambilR['keterangan'].'"
								}';
						}
						else
						{
							echo '{"status":"gagal"}';
						}
					break;
					
					case 'mback':
						$sql ="select 	SUBSTRING_INDEX(kode,' ',1)  as merk,
										SUBSTRING_INDEX(kode,' ',-1)  as kode,
										avail2mbps,
										availstm1,
										availstm4,
										availstm16,
										availstm64,
										keterangan,
										id_sistra
								from tb_backbone 
								where id_backbone = '$_GET[idx]'";
						//var_dump($sql);exit();
						$jalan	= 	mysql_query($sql) or die("kueri ambil edit backbone error");
						$ambilR = 	mysql_fetch_assoc($jalan);
						if($jalan)
						{
							echo '{
								"status":"sukses",
								"merk":"'.$ambilR['merk'].'",
								"kode":"'.$ambilR['kode'].'",
								"avail2mbps":"'.$ambilR['avail2mbps'].'",
								"availstm1":"'.$ambilR['availstm1'].'",
								"availstm4":"'.$ambilR['availstm4'].'",
								"availstm16":"'.$ambilR['availstm16'].'",
								"availstm64":"'.$ambilR['availstm64'].'",
								"keterangan":"'.$ambilR['keterangan'].'",
								"id_sistra":"'.$ambilR['id_sistra'].'"
								}';
						}
						else
						{
							echo '{"status":"gagal"}';
						}
					break;
					
					case 'msistra':
						$jalan	= 	mysql_query("select * from tb_sistra where id_sistra = '$_GET[idx]'") 
									or die("kueri ambil edit sistra error");
						$ambilR = 	mysql_fetch_assoc($jalan);
						if($jalan)
						{
							echo '{
								"status":"sukses",
								"sistra":"'.$ambilR['sistra'].'"
								}';
						}
						else
						{
							echo '{"status":"gagal"}';
						}
					break;
					
					case 'mkoord':
						$que	= "	SELECT
										*
									FROM
										tb_koordinasi k,
										tb_peg p,
										tb_loker l
									WHERE
										k.id_peg = p.id_peg
									AND l.id_loker = k.id_loker
									AND k.id_koordinasi ='$_GET[idx]'";
						// print_r($que);
						$jalan	= 	mysql_query($que) or die("kueri ambil edit koordinasi error");
						$ambilR = 	mysql_fetch_assoc($jalan);
						if($jalan)
						{
							echo '{
								"status":"sukses",
								"id_peg":"'.$ambilR['id_peg'].'",
								"nama":"'.$ambilR['nama'].'",
								"id_loker":"'.$ambilR['id_loker'].'",
								"loker":"'.$ambilR['loker'].'",
								"telp":"'.$ambilR['telp'].'",
								"telp2":"'.$ambilR['telp2'].'"
								}';
						}
						else
						{
							echo '{"status":"gagal"}';
						}
					break;
					
					case 'malat':
						$que	= "	select * from tb_alat where id_alat = '$_GET[idx]'";
						$jalan	= 	mysql_query($que) or die("kueri ambil edit alat error");
						$ambilR = 	mysql_fetch_assoc($jalan);
						if($jalan)
						{
							echo '{
								"status":"sukses",
								"id_alat":"'.$ambilR['id_alat'].'",
								"lokasi":"'.$ambilR['lokasi'].'",
								"merk":"'.$ambilR['merk'].'",
								"kegunaan":"'.$ambilR['kegunaan'].'",
								"thn_oper":"'.$ambilR['thn_oper'].'",
								"kondisi":"'.$ambilR['kondisi'].'"
								}';
						}
						else
						{
							echo '{"status":"gagal"}';
						}
					break;
					
					case 'tggn':
						$que	= "	select * from tb_ggn where id_ggn = '$_GET[idx]'";
						$jalan	= 	mysql_query($que) or die("kueri ambil edit gangguan error");
						$ambilR = 	mysql_fetch_assoc($jalan);
						if($jalan)
						{
							echo '{
								"status":"sukses",
								"sistra":"'.$ambilR['sistra'].'",
								"lokasi":"'.$ambilR['lokasi'].'",
								"linkx":"'.$ambilR['linkx'].'",
								"uraian":"'.$ambilR['uraian'].'",
								"tgl":"'.$ambilR['tgl'].'",
								"jmA":"'.$ambilR['jmA'].'",
								"jmB":"'.$ambilR['jmB'].'",
								"pet":"'.$ambilR['pet'].'",
								"id_koordinasi":"'.$ambilR['id_koordinasi'].'"
								}';
						}
						else
						{
							echo '{"status":"gagal"}';
						}
					break;
					
					case 'mper':
						$que	= "	select * from tb_perangkat where id = '$_GET[idx]'";
						$jalan	= 	mysql_query($que) or die("kueri ambil edit perangkat error");
						$ambilR = 	mysql_fetch_assoc($jalan);
						if($jalan)
						{
							echo '{
								"status":"sukses",
								"id":"'.$ambilR['id'].'",
								"merk":"'.$ambilR['merk'].'",
								"type":"'.$ambilR['type'].'",
								"jumMax":"'.$ambilR['jumMax'].'",
								"thn_oper":"'.$ambilR['thn_oper'].'",
								"thn_noper":"'.$ambilR['thn_noper'].'"
								}';
						}
						else
						{
							echo '{"status":"gagal"}';
						}
					break;
					
					case 'mperdet':
						$que	= "	select * 
									from 
										tb_perangkat_detail pd,
										tb_perangkat p
									where 
										pd.id_per_detail  = '$_GET[idx]' and
										p.id=pd.id_per";
						$jalan	= 	mysql_query($que) or die("kueri ambil edit perangkat detail error");
						$ambilR = 	mysql_fetch_assoc($jalan);
						if($jalan)
						{
							//$idx	= explode("|", $ambilR[id_per]);
							//$id_per	= substr($idx[0],0);
							
								//"id_per":"'.$ambilR['id_per'].'|'.$ambilR['merk'].'",
							echo '{
								"status":"sukses",
								"id_per":"'.$ambilR['id_per'].'",
								"id_backbone":"'.$ambilR['id_backbone'].'",
								"ddf_a":"'.$ambilR['ddf_a'].'",
								"ddf_b":"'.$ambilR['ddf_b'].'",
								"channelida":"'.$ambilR['channelida'].'",
								"channelida":"'.$ambilR['channelida'].'"
								}';
						}
						else
						{
							echo '{"status":"gagal"}';
						}
					break;
					
					case 'mperdet':
						$que	= "	select * from tb_perangkat_detail where id_per_detail  = '$_GET[idx]'";
						$jalan	= 	mysql_query($que) or die("kueri ambil edit perangkat detail error");
						$ambilR = 	mysql_fetch_assoc($jalan);
						if($jalan)
						{
							echo '{
								"status":"sukses",
								"id_per":"'.$ambilR['id_per'].'",
								"ddf_a":"'.$ambilR['ddf_a'].'",
								"ddf_b":"'.$ambilR['ddf_b'].'",
								"channelida":"'.$ambilR['channelida'].'",
								"channelida":"'.$ambilR['channelida'].'"
								}';
						}
						else
						{
							echo '{"status":"gagal"}';
						}
					break;
			
					case 'mloker':
						$jalan	= 	mysql_query("select * from tb_loker where id_loker = '$_GET[idx]'") 
									or die("kueri ambil edit loker error");
						$ambilR = 	mysql_fetch_assoc($jalan);
						if($jalan)
						{
							echo '{
								"status":"sukses",
								"loker":"'.$ambilR['loker'].'"
								}';
						}
						else
						{
							echo '{"status":"gagal"}';
						}
					break;
							
				}
			break;
	#end of ambil edit ==========================================================================================

	# tampil =====================================================================================================
			case 'tampil' :
				switch ($menu) {
					case 'suser':
						$sql="select * from tb_peg where id_peg ='$_SESSION[id_userMUX]'";						
						//var_dump($sql);exit();
						$exe=mysql_query($sql);
						$res=mysql_fetch_assoc($exe);
						if($exe){
							echo '{
								"status":"sukses",
								"nik":"'.$res['nik'].'",
								"nama":"'.$res['nama'].'",
								"alamat":"'.$res['alamat'].'",
								"username":"'.$res['username'].'",
								"id_level":"'.$res['id_level'].'",
								"password":"'.$res['password'].'"
							}';
						}else{
							echo '{"status":"gagal"}';	
						}
					break;

					case 'mlinka':
						#datagrid
						if (isset($_GET['nama']) and !empty($_GET['nama'])){
							$nama= $_GET['nama'];
							$sql = "select * from tb_linka
									where nama like '%$nama%' order by id_linka desc";
						}else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
							$keterangan= $_GET['keterangan'];
							$sql = "select * from tb_linka 
									where keterangan like '%$keterangan%' order by id_linka desc";
						}else {
							$sql = "select * from tb_linka order by id_linka desc";
						}
						#end of datagrid

						#paging	 
						//start 				
						if(isset($_GET['starting'])){ //nilai awal halaman
							$starting=$_GET['starting'];
						}else{
							$starting=0;
						}
						//record per halaman
						$recpage= 5;//jumlah data per halaman
						$obj 	= new pagination_class($sql,$starting,$recpage);
						$result =$obj->result;
						#end of paging	 
						
						#ada data
						if(mysql_num_rows($result)!=0)
						{
							$nox 	= $starting+1;
							while($linkax = mysql_fetch_array($result))
							{
								if($_SESSION['leveluserMUX']=='admin'){
									$actionBG="<td class='ms'>
									<div class='btn-group1'>
										<a idz='$linkax[id_linka]'  class='edit btn btn-small'  
											rel='tooltip' data-placement='left' data-original-title=' Edit '>
											<i class='icon-pencil'></i>
										</a> 
										<a href='report/clinka.php?tabelx=tb_linka&judulx=LINK A&id_linka=$linkax[id_linka]' target='_blank' class='btn btn-small' rel='tooltip' data-placement='top' data-original-title='detail'>
											<i  class='icon-eye-open'></i>
										</a> 
										<a  idz='$linkax[id_linka]' namaz='$linkax[nama]' class='hapus btn btn-small' rel='tooltip' data-placement='bottom' data-original-title='hapus'>
											<i class='icon-remove'></i>
										</a> 
									</div>
									</td>";
								}else{
								//tambahi iki fik
									$actionBG="<td class='ms'>
										<div class='btn-group1'>
											<a href='report/clinka.php?tabelx=tb_linka&judulx=LINK A&id_linka=$linkax[id_linka]' target='_blank' class='btn btn-small' rel='tooltip' data-placement='top' data-original-title='detail'>
												<i  class='icon-eye-open'></i>
											</a> 
										</div>
										</td>";
								//tambahi iki fik
								}
								
								echo"
									<tr id='linka_$linkax[id_linka]'>
										<td class='to_hide_phone'> $nox </td>
										<td class='to_hide_phone'> $linkax[nama]</td>
										<td class='to_hide_phone'> $linkax[keterangan]</td>
										$actionBG
									</tr>";
								$nox++;
							}
						}
						#kosong
						else{
							echo "<tr align='center'>
									<td  colspan=7 ><span style='color:yellow;text-align:center;'>
									... data tidak ditemukan ...</span></td></tr>";
						}
						#link paging
						echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
						echo "<tr><td colspan=7>".$obj->total."</td></tr>";
					break;
					
					case 'mlinkb':
						#datagrid
						if (isset($_GET['nama']) and !empty($_GET['nama'])){
							$nama= $_GET['nama'];
							$sql = "select * from tb_linkb
									where nama like '%$nama%' order by id_linkb desc";
						}else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
							$keterangan= $_GET['keterangan'];
							$sql = "select * from tb_linkb 
									where keterangan like '%$keterangan%' order by id_linkb desc";
						}else {
							$sql = "select * from tb_linkb order by id_linkb desc";
						}
						#end of datagrid

						#paging	 
						//start 				
						if(isset($_GET['starting'])){ //nilai awal halaman
							$starting=$_GET['starting'];
						}else{
							$starting=0;
						}
						//record per halaman
						$recpage= 5;//jumlah data per halaman
						$obj 	= new pagination_class($sql,$starting,$recpage);
						$result =$obj->result;
						#end of paging	 
						
						#ada data
						if(mysql_num_rows($result)!=0)
						{
							$nox 	= $starting+1;
							while($linkbx = mysql_fetch_array($result))
							{
								if($_SESSION['leveluserMUX']=='admin'){
									$actionBG="<td class='ms'>
									<div class='btn-group1'>
										<a idz='$linkbx[id_linkb]'  class='edit btn btn-small'  
											rel='tooltip' data-placement='left' data-original-title=' Edit '>
											<i class='icon-pencil'></i>
										</a> 
										<a href='report/clinkb.php?tabelx=tb_linkb&judulx=LINK B&id_linkb=$linkbx[id_linkb]' target='_blank' class='btn btn-small' rel='tooltip' data-placement='top' data-original-title='detail'>
											<i  class='icon-eye-open'></i>
										</a> 
										<a  idz='$linkbx[id_linkb]' namaz='$linkbx[nama]' class='hapus btn btn-small' rel='tooltip' data-placement='bottom' data-original-title='hapus'>
											<i class='icon-remove'></i>
										</a> 
									</div>
									</td>";
								}else{
									$actionBG="<td class='ms'>
									<div class='btn-group1'>
									<a href='report/clinkb.php?tabelx=tb_linkb&judulx=LINK B&id_linkb=$linkbx[id_linkb]' target='_blank' class='btn btn-small' rel='tooltip' data-placement='top' data-original-title='detail'>
											<i  class='icon-eye-open'></i>
										</a> 
								</div>
									</td>";
								}
								echo"
									<tr id='linkb_$linkbx[id_linkb]'>
										<td class='to_hide_phone'> $nox </td>
										<td class='to_hide_phone'> $linkbx[nama]</td>
										<td class='to_hide_phone'> $linkbx[keterangan]</td>
											$actionBG	
									</tr>";
								$nox++;
							}
						}
						#kosong
						else{
							echo "<tr align='center'>
									<td  colspan=7 ><span style='color:yellow;text-align:center;'>
									... data tidak ditemukan ...</span></td></tr>";
						}
						#link paging
						echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
						echo "<tr><td colspan=7>".$obj->total."</td></tr>";
					break;
					
					case 'mpeg':
						#datagrid
						#$sqlU = "select * from tb_peg where not(id_level = 'admin' ) ";
						$sqlU = "select * from tb_peg where not(id_peg='$_SESSION[id_userMUX]')";
						if (isset($_GET['nama']) and !empty($_GET['nama'])){
							$nama= $_GET['nama'];
							$sql = $sqlU." and  nama like '%$nama%' order by nama desc";
						}else if (isset($_GET['nik']) and !empty($_GET['nik'])){
							$nik= $_GET['nik'];
							$sql = $sqlU." and  nik like '%$nik%' order by nik desc";
						}else if (isset($_GET['alamat']) and !empty($_GET['alamat'])){
							$alamat= $_GET['alamat'];
							$sql = $sqlU." and  alamat like '%$alamat%' order by alamat desc";
						}else if (isset($_GET['username']) and !empty($_GET['username'])){
							$username= $_GET['username'];
							$sql = $sqlU." and  username like '%$username%' order by username desc";
						}else if (isset($_GET['id_level']) and !empty($_GET['id_level'])){
							$id_level= $_GET['id_level'];
							$sql = $sqlU." and  id_level like '%$id_level%' order by id_level desc";
						}else {
							$sql = $sqlU;
						}
						#end of datagrid

						#paging	 
						//start 				
						if(isset($_GET['starting'])){ //nilai awal halaman
							$starting=$_GET['starting'];
						}else{
							$starting=0;
						}
						//record per halaman
						$recpage= 5;//jumlah data per halaman
						$obj 	= new pagination_class($sql,$starting,$recpage);
						$result =$obj->result;
						#end of paging	 
						
						#ada data
						if(mysql_num_rows($result)!=0)
						{
							$nox 	= $starting+1;
							while($pegx = mysql_fetch_array($result))
							{
								if($_SESSION['leveluserMUX']=='admin'){
									$actionBG ="<td class='ms'><div class='btn-group1'>
								<a idz='$pegx[id_peg]' tipez='edit' xhref=\"ambilData('edit','$pegx[id_peg]');\" data-toggle='modal' title='edit' 
									class='edit btn btn-small' rel='tooltip' data-placement='left' data-original-title=' Edit ' >
									<i class='edit icon-pencil'></i>
								</a> 
								<a href='report/cpeg.php?tabelx=tb_peg&judulx=PEGAWAI&id_peg=$pegx[id_peg]' target='_blank' class='btn detail btn-small' title='detail' rel='tooltip' data-placement='top' 
									data-original-title='detail' >
									<i class='view icon-eye-open'></i>
								</a> 
								<a  idz='$pegx[id_peg]' namaz='$pegx[nama]'  class='btn hapus btn-small' title='hapus' target='_blank'  
									rel='tooltip' data-placement='bottom' data-original-title='hapus'>
									<i  class='hapus icon-remove'></i>
								</a></td> 
								</div>";
									$userTD ="<td class='to_hide_phone'> $pegx[username]</td>";
								}
								else{
								$actionBG ="<td class='ms'><div class='btn-group1'>
								<a href='report/cpeg.php?tabelx=tb_peg&judulx=PEGAWAI&id_peg=$pegx[id_peg]' target='_blank' class='btn detail btn-small' title='detail' rel='tooltip' data-placement='top' 
									data-original-title='detail' >
									<i class='view icon-eye-open'></i>
								</a> 
								</td> 
								</div>";
								}
								echo"
									<tr id='peg_$pegx[id_peg]'>
										<td class='to_hide_phone'> $nox </td>
										<td class='to_hide_phone'> $pegx[nik]</td>
										<td class='to_hide_phone'> $pegx[nama]</td>
										<td class='to_hide_phone'> $pegx[alamat]</td>
										$userTD
										<td class='to_hide_phone'> $pegx[id_level]</td>
										$actionBG
									</tr>";
								$nox++;
							}
						}
						#kosong
						else{
							echo "<tr align='center'>
									<td  colspan=7 ><span style='color:yellow;text-align:center;'>
									... data tidak ditemukan ...</span></td></tr>";
						}
						#link paging
						echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
						echo "<tr><td colspan=7>".$obj->total."</td></tr>";
					break;
				
					case 'muser':
						#datagrid
						if (isset($_GET['user']) and !empty($_GET['user'])){
							$user= $_GET['user'];
							$sql = "select * from tb_user
									where user like '%$user%' order by id_user desc";
						}else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
							$keterangan= $_GET['keterangan'];
							$sql = "select * from tb_user 
									where keterangan like '%$keterangan%' order by id_user desc";
						}else {
							$sql = "select * from tb_user order by id_user desc";
						}
						#end of datagrid

						#paging	 
						//start 				
						if(isset($_GET['starting'])){ //nilai awal halaman
							$starting=$_GET['starting'];
						}else{
							$starting=0;
						}
						//record per halaman
						$recpage= 5;//jumlah data per halaman
						$obj 	= new pagination_class($sql,$starting,$recpage);
						$result =$obj->result;
						#end of paging	 
						
						#ada data
						if(mysql_num_rows($result)!=0)
						{
							$nox 	= $starting+1;
							while($userx = mysql_fetch_array($result))
							{
								if($_SESSION['leveluserMUX']=='admin'){
									$actionBG = "
								<td class='ms'>
									<div class='btn-group1'>
									<a idz='$userx[id_user]' data-toggle='modal' class='edit btn btn-small'  
										rel='tooltip' data-placement='left' data-original-title=' Edit '>
										<i class='icon-pencil'></i>
									</a> 
									<a class='btn btn-small' rel='tooltip' data-placement='top' href='report/cuser.php?tabelx=tb_user&judulx=USER/PELANGGAN&id_user=$userx[id_user]' target='_blank' 
										data-original-title='detail'>
										<i class='icon-eye-open'></i>
									</a> 
									<a  idz='$userx[id_user]' namaz='$userx[user]'  class='hapus btn btn-small' target='_blank'  rel='tooltip' data-placement='bottom' data-original-title='hapus'>
										<i class='icon-remove'></i>
									</a> 
									</div>
								</td>";
								}else{
								$actionBG = "
								<td class='ms'>
									<div class='btn-group1'>
									<a class='btn btn-small' rel='tooltip' data-placement='top' href='report/cuser.php?tabelx=tb_user&judulx=USER/PELANGGAN&id_user=$userx[id_user]' target='_blank' 
										data-original-title='detail'>
										<i class='icon-eye-open'></i>
									</a> 
								</div>
								</td>";	
								}
								echo"
									<tr id='user_$userx[id_user]'>
										<td class='to_hide_phone'> $nox </td>
										<td class='to_hide_phone'> $userx[user]</td>
										<td class='to_hide_phone'> $userx[keterangan]</td>
										$actionBG
									</tr>";
								$nox++;
							}
						}
						#kosong
						else{
							echo "<tr align='center'>
									<td  colspan=7 ><span style='color:yellow;text-align:center;'>
									... data tidak ditemukan ...</span></td></tr>";
						}
						#link paging
						echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
						echo "<tr><td colspan=7>".$obj->total."</td></tr>";
					break;
					
					case 'mback':
						#datagrid
						$sqlU = "select b.id_backbone,
										b.kode,
										b.keterangan,
										b.avail2mbps,
										b.availstm4,
										b.availstm16,
										b.availstm64,
										b.availstm1,
										s.sistra
											
									from tb_backbone b,tb_sistra s
									where s.id_sistra = b.id_sistra
									";
						
						if (isset($_GET['kode']) and !empty($_GET['kode'])){
							$kode= $_GET['kode'];
							$sql = $sqlU." and b.kode like '%$kode%' order by b.id_backbone desc";
						}else if (isset($_GET['keterangan']) and !empty($_GET['keterangan'])){
							$keterangan= $_GET['keterangan'];
							$sql = $sqlU." and b.keterangan like '%$keterangan%' order by b.id_backbone desc";
						}else {
							$sql = $sqlU.' order by b.id_backbone desc';
						}
						#end of datagrid

						#paging	 
						//start 				
						if(isset($_GET['starting'])){ //nilai awal halaman
							$starting=$_GET['starting'];
						}else{
							$starting=0;
						}
						
						//record per halaman
						$recpage= 5;//jumlah data per halaman
						$obj 	= new pagination_class($sql,$starting,$recpage);
						$result =$obj->result;
						#end of paging	 
						
						#ada data
						if(mysql_num_rows($result)!=0)
						{
							$nox 	= $starting+1;
							while($backx = mysql_fetch_array($result))
							{
								if($_SESSION['leveluserMUX']=='admin'){
									$actionBG="<td class='ms'>
									<div class='btn-group1'>
										<a idz='$backx[id_backbone]'  class='edit btn btn-small'  
											rel='tooltip' data-placement='left' data-original-title=' Edit '>
											<i class='icon-pencil'></i>
										</a> 
										<a href='report/cback.php?tabelx=tb_backbone&judulx=BACKBONE&id_backbone=$backx[id_backbone]' target='_blank' class='btn btn-small' rel='tooltip' data-placement='top' data-original-title='detail'>
											<i  class='icon-eye-open'></i>
										</a> 
										<a  idz='$backx[id_backbone]' namaz='$backx[kode]' class='hapus btn btn-small' rel='tooltip' data-placement='bottom' data-original-title='hapus'>
											<i class='icon-remove'></i>
										</a> 
									</div>
									</td>";
								}else{
									$actionBG="<td class='ms'>
									<div class='btn-group1'>
									<a href='report/cback.php?tabelx=tb_backbone&judulx=BACKBONE&id_backbone=$backx[id_backbone]' target='_blank' class='btn btn-small' rel='tooltip' data-placement='top' data-original-title='detail'>
											<i  class='icon-eye-open'></i>
										</a> 
									</div>
									</td>";

								}
								
								echo"
									<tr id='back_$backx[id_backbone]'>
										<td class='to_hide_phone'> $nox </td>
										<td class='to_hide_phone'> $backx[kode] </td>
										<td class='to_hide_phone'> $backx[keterangan]</td>
										<td class='to_hide_phone'> $backx[sistra]</td>
										<td class='to_hide_phone'> $backx[avail2mbps]</td>
										<td class='to_hide_phone'> $backx[availstm1]</td>
										<td class='to_hide_phone'> $backx[availstm4]</td>
										<td class='to_hide_phone'> $backx[availstm16]</td>
										<td class='to_hide_phone'> $backx[availstm64]</td>
										$actionBG
									</tr>";
								$nox++;
							}
						}
						#kosong
						else{
							echo "<tr align='center'>
									<td  colspan=10><span style='color:yellow;text-align:center;'>
									... data tidak ditemukan ...</span></td></tr>";
						}
						#link paging
						echo "<tr><td colspan=10>".$obj->anchors."</td></tr>";
						echo "<tr><td colspan=10>".$obj->total."</td></tr>";
					break;
					
					case 'msistra':
						#datagrid
						if (isset($_GET['sistra']) and !empty($_GET['sistra'])){
							$sistra= $_GET['sistra'];
							$sql = "select * from tb_sistra
									where sistra like '%$sistra%' order by id_linkb desc";
						}else {
							$sql = "select * from tb_sistra order by id_sistra desc";
						}
						#end of datagrid

						#paging	 
						//start 				
						if(isset($_GET['starting'])){ //nilai awal halaman
							$starting=$_GET['starting'];
						}else{
							$starting=0;
						}
						//record per halaman
						$recpage= 5;//jumlah data per halaman
						$obj 	= new pagination_class($sql,$starting,$recpage);
						$result =$obj->result;
						#end of paging	 
						
						#ada data
						if(mysql_num_rows($result)!=0)
						{
							$nox 	= $starting+1;
							while($sistrax = mysql_fetch_array($result))
							{
								if($_SESSION['leveluserMUX']=='admin'){
									$actionBG="<td class='ms'>
									<div class='btn-group1'>
										<a idz='$sistrax[id_sistra]'  class='edit btn btn-small'  
											rel='tooltip' data-placement='left' data-original-title=' Edit '>
											<i class='icon-pencil'></i>
										</a> 
										<a href='report/csistra.php?tabelx=tb_sistra&judulx=SISTRA&id_sistra=$sistrax[id_sistra]' target='_blank' class='btn btn-small' rel='tooltip' data-placement='top' data-original-title='detail'>
											<i  class='icon-eye-open'></i>
										</a> 
										<a  idz='$sistrax[id_sistra]' namaz='$sistrax[sistra]' class='hapus btn btn-small' rel='tooltip' data-placement='bottom' data-original-title='hapus'>
											<i class='icon-remove'></i>
										</a> 
									</div>
									</td>";
								}else{
								$actionBG="<td class='ms'>
									<div class='btn-group1'>
									<a href='report/csistra.php?tabelx=tb_sistra&judulx=SISTRA&id_sistra=$sistrax[id_sistra]' target='_blank' class='btn btn-small' rel='tooltip' data-placement='top' data-original-title='detail'>
											<i  class='icon-eye-open'></i>
										</a> 
									</div>
									</td>";
								}
								
								echo"
									<tr id='sistra_$sistrax[id_sistra]'>
										<td class='to_hide_phone'> $nox </td>
										<td class='to_hide_phone'> $sistrax[sistra]</td>
										$actionBG
									</tr>";
								$nox++;
							}
						}
						#kosong
						else{
							echo "<tr align='center'>
									<td  colspan=7 ><span style='color:yellow;text-align:center;'>
									... data tidak ditemukan ...</span></td></tr>";
						}
						#link paging
						echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
						echo "<tr><td colspan=7>".$obj->total."</td></tr>";
					break;
				
					case 'mkoord':
						#datagrid
						$sqlU = "select * 
								from tb_koordinasi k,tb_peg p, tb_loker l
								where 
									k.id_peg = p.id_peg and  
									k.id_loker=l.id_loker and 
									not(p.id_level = 'admin')
								";
						
						if (isset($_GET['nama']) and !empty($_GET['nama'])){
							$nama= $_GET['nama'];
							$sql = $sqlU." and p.nama like '%$nama%' order by p.nama desc";
						}else if (isset($_GET['loker']) and !empty($_GET['loker'])){
							$loker= $_GET['loker'];
							$sql = $sqlU." and l.loker like '%$loker%' order by l.loker desc";
						}else if (isset($_GET['telp']) and !empty($_GET['telp'])){
							$telp= $_GET['telp'];
							$sql = $sqlU." and k.telp like '%$telp%' order by k.telp desc";
						}else if (isset($_GET['telp2']) and !empty($_GET['telp2'])){
							$telp2= $_GET['telp2'];
							$sql = $sqlU." and k.telp2 like '%$telp2%' order by k.telp2 desc";
						}else {
							$sql=$sqlU.'order by k.id_koordinasi desc';
						}
						#end of datagrid

						#paging	 
						//start 				
						if(isset($_GET['starting'])){ //nilai awal halaman
							$starting=$_GET['starting'];
						}else{
							$starting=0;
						}
						//record per halaman
						$recpage= 5;//jumlah data per halaman
						$obj 	= new pagination_class($sql,$starting,$recpage);
						$result =$obj->result;
						#end of paging	 
						
						#ada data
						if(mysql_num_rows($result)!=0)
						{
							$nox 	= $starting+1;
							while($koordx = mysql_fetch_array($result))
							{
								if($_SESSION['leveluserMUX']=='admin'){
									$actionBG = "
								<td class='ms'><div class='btn-group1'>
								<a idz='$koordx[id_koordinasi]' data-toggle='modal' class='edit btn btn-small'  
									rel='tooltip' data-placement='left' data-original-title=' Edit '>
									<i class='icon-pencil'></i>
								</a> 
								<a idz='$koordx[id_koordinasi]' href='report/ckoord.php?tabelx=tb_koordinasi&judulx=KOORDINASI&id_koordinasi=$koordx[id_koordinasi]' target='_blank' class='btn btn-small' rel='tooltip' data-placement='top' 
									data-original-title='detail'>
									<i class='icon-eye-open'></i>
								</a> 
								<a  namaz='$koordx[nama]'  idz='$koordx[id_koordinasi]' class='hapus btn btn-small'  rel='tooltip' data-placement='bottom' 
									data-original-title='hapus'>
									<i  class='icon-remove'></i>
								</a></div></td>";
								}else{	
								$actionBG = "
								<td class='ms'><div class='btn-group1'>
								<a idz='$koordx[id_koordinasi]' href='report/ckoord.php?tabelx=tb_koordinasi&judulx=KOORDINASI&id_koordinasi=$koordx[id_koordinasi]' target='_blank' class='btn btn-small' rel='tooltip' data-placement='top' 
									data-original-title='detail'>
									<i class='icon-eye-open'></i>
								</a> 
								</div></td>";	
								}
								//var_dump($s);exit();
								//var_dump($actionBG);exit();
								echo"
									<tr id='koord_$koordx[id_koordinasi]'>
										<td class='to_hide_phone'> $koordx[nama]</td>
										<td class='to_hide_phone'> $koordx[loker]</td>
										<td class='to_hide_phone'> $koordx[telp]</td>
										<td class='to_hide_phone'> $koordx[telp2]</td>
											$actionBG
									</tr>";
								$nox++;
							}
						}
						#kosong
						else{
							echo "<tr align='center'>
									<td  colspan=7 ><span style='color:yellow;text-align:center;'>
									... data tidak ditemukan ...</span></td></tr>";
						}
						#link paging
						echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
						echo "<tr><td colspan=7>".$obj->total."</td></tr>";
					break;
					
					case 'malat':
						#datagrid
						$sqlU = 'select * from tb_alat';
						if (isset($_GET['id_alat']) and !empty($_GET['id_alat'])){
							$id_alat= $_GET['id_alat'];
							$sql = $sqlU." where id_alat like '%$id_alat%' order by id_alat desc";
						}else if (isset($_GET['lokasi']) and !empty($_GET['lokasi'])){
							$lokasi= $_GET['lokasi'];
							$sql = $sqlU." where lokasi like '%$lokasi%' order by lokasi  desc";
						}else if (isset($_GET['kegunaan']) and !empty($_GET['kegunaan'])){
							$kegunaan= $_GET['kegunaan'];
							$sql = $sqlU." where kegunaan like '%$kegunaan%' order by kegunaan  desc";
						}else if (isset($_GET['merk']) and !empty($_GET['merk'])){
							$merk= $_GET['merk'];
							$sql = $sqlU." where merk like '%$merk%' order by merk  desc";
						}else if (isset($_GET['thn_oper']) and !empty($_GET['thn_oper'])){
							$thn_oper= $_GET['thn_oper'];
							$sql = $sqlU." where thn_oper like '%$thn_oper%' order by thn_oper desc";
						}else if (isset($_GET['kondisi']) and !empty($_GET['kondisi'])){
							$kondisi= $_GET['kondisi'];
							$sql = $sqlU." where kondisi like '%$kondisi%' order by kondisi  desc";
						}else {
							$sql = $sqlU.' order by id_alat';
						}
						#end of datagrid

						#paging	 
						//start 				
						if(isset($_GET['starting'])){ //nilai awal halaman
							$starting=$_GET['starting'];
						}else{
							$starting=0;
						}
						//record per halaman
						$recpage= 5;//jumlah data per halaman
						$obj 	= new pagination_class($sql,$starting,$recpage);
						$result =$obj->result;
						#end of paging	 
						
						#ada data
						if(mysql_num_rows($result)!=0)
						{
							$nox 	= $starting+1;
							while($alatx = mysql_fetch_array($result))
							{
								//$s = $_SESSION['leveluserMUX'];
								//var_dump($s);exit();
								if($_SESSION['leveluserMUX']=='admin'){
								$actionBG="<td class='ms'>
									<div class='btn-group1'>
									<a idz='$alatx[id_alat]'  class='edit btn btn-small'  
										rel='tooltip' data-placement='left' data-original-title=' Edit '>
										<i class='icon-pencil'></i>
									</a> 
									<a href='report/calat.php?tabelx=tb_alat&judulx=ALAT UKUR&id_alat=$alatx[id_alat]'  target='_blank' class='btn btn-small' rel='tooltip' data-placement='top' 
										data-original-title='detail'>
										<i class='icon-eye-open'></i>
									</a> 
									<a  idz='$alatx[id_alat]'  class='hapus btn btn-small'   
										rel='tooltip' data-placement='bottom' data-original-title='hapus'>
										<i class='icon-remove'></i>
									</a> 
									</div>
								</td>";
								}else{
									$actionBG="<td class='ms'>
									<div class='btn-group1'>
									<a href='report/calat.php?tabelx=tb_alat&judulx=ALAT UKUR&id_alat=$alatx[id_alat]'  target='_blank' class='btn btn-small' rel='tooltip' data-placement='top' 
										data-original-title='detail'>
										<i class='icon-eye-open'></i>
									</a> 
									</div>
								</td>";
								}
								//var_dump($actionBG);exit();
								echo"
									<tr id='alat_$alatx[id_alat]'>
										<td class='to_hide_phone'> $alatx[id_alat]</td>
										<td class='to_hide_phone'> $alatx[lokasi]</td>
										<td class='to_hide_phone'>$alatx[kegunaan]</td>
										<td class='to_hide_phone'> $alatx[merk]</td>
										<td class='to_hide_phone'> $alatx[thn_oper]</td>
										<td class='to_hide_phone'> $alatx[kondisi]</td>
										$actionBG
									</tr>";
								$nox++;
							}
						}
						#kosong
						else{
							echo "<tr align='center'>
									<td  colspan=7 ><span style='color:yellow;text-align:center;'>
									... data tidak ditemukan ...</span></td></tr>";
						}
						#link paging
						echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
						echo "<tr><td colspan=7>".$obj->total."</td></tr>";
					break;
					
					case 'tggn':
						#datagrid
						$sqlU = 'select * 
								from tb_ggn g, tb_koordinasi k, tb_peg p 
								where 
									g.id_koordinasi = k.id_koordinasi and 
									p.nik=k.nik';
						if (isset($_GET['id_ggn']) and !empty($_GET['id_ggn'])){
							$id_ggn= $_GET['id_ggn'];
							$sql = $sqlU." and g.id_ggn like '%$id_ggn%' order by g.id_ggn desc";
						}else if (isset($_GET['nama']) and !empty($_GET['nama'])){
							$sistra= $_GET['sistra'];
							$sql = $sqlU." and g.sistra like '%$sistra%' order by g.sistra desc";
						}else if (isset($_GET['link']) and !empty($_GET['link'])){
							$link= $_GET['link'];
							$sql = $sqlU." and g.link like '%$link%' order by g.linkx  desc";
						}else if (isset($_GET['uraian']) and !empty($_GET['uraian'])){
							$uraian= $_GET['uraian'];
							$sql = $sqlU." and g.uraian like '%$uraian%' order by g.uraian  desc";
						}else if (isset($_GET['tgl']) and !empty($_GET['tgl'])){
							$tgl= $_GET['tgl'];
							$sql = $sqlU." and g.tgl like '%$tgl%' order by g.tgl  desc";
						}else if (isset($_GET['jmA']) and !empty($_GET['jmA'])){
							$jmA= $_GET['jmA'];
							$sql = $sqlU." and g.jmA like '%$jmA%' order by g.jmA desc";
						}else if (isset($_GET['jml']) and !empty($_GET['jmB'])){
							$jmB= $_GET['jmB'];
							$sql = $sqlU." and g.jmB like '%$jmB%' order by g.jmB  desc";
						}else if (isset($_GET['pet']) and !empty($_GET['pet'])){
							$pet= $_GET['pet'];
							$sql = $sqlU." and g.pet like '%$pet%' order by g.pet  desc";
						}else if (isset($_GET['id_koordinasi']) and !empty($_GET['id_koordinasi'])){
							$id_koordinasi= $_GET['id_koordinasi'];
							$sql = $sqlU." and g.id_koordinasi like '%$id_koordinasi%' order by g.id_koordinasi desc";
						}else {
							$sql = $sqlU.' order by g.id_ggn';
						}
						#end of datagrid

						#paging	 
						//start 				
						if(isset($_GET['starting'])){ //nilai awal halaman
							$starting=$_GET['starting'];
						}else{
							$starting=0;
						}
						//record per halaman
						$recpage= 5;//jumlah data per halaman
						$obj 	= new pagination_class($sql,$starting,$recpage);
						$result =$obj->result;
						#end of paging	 
						
						#ada data
						if(mysql_num_rows($result)!=0)
						{
							$nox 	= $starting+1;
							while($ggnx = mysql_fetch_array($result))
							{
								echo"
									<tr id='ggn_$ggnx[id_ggn]'>
										<td>
											<label class='checkbox '>
												<xinput type='checkbox' id='CB$ggnx[id_ggn]'>
											</label>
										</td>
										
										<td class='to_hide_phone'> $ggnx[id_ggn]</td>
										<td class='to_hide_phone'> $ggnx[sistra]</td>
										<td class='to_hide_phone'> $ggnx[linkx]</td>
										<td class='to_hide_phone'> $ggnx[uraian]</td>
										<td class='to_hide_phone'> $ggnx[tgl]</td>
										<td class='to_hide_phone'> $ggnx[jmA]</td>
										<td class='to_hide_phone'> $ggnx[jmB]</td>
										<td class='to_hide_phone'> $ggnx[pet]</td>
										<td class='to_hide_phone'> $ggnx[nama]</td>
										<td class='ms'>
											
											<div class='btn-group1'>
												<a data-toggle='modal' class='btn btn-small'  
													rel='tooltip' data-placement='left' data-original-title=' Edit '>
													<!--<i idz='$ggnx[id_ggn]' xclass='gicon-edit'>edit</i>-->
													<i idz='$ggnx[id_ggn]' class='edit'>edit</i>
												</a> 
												<a class='btn btn-small' rel='tooltip' data-placement='top' 
													data-original-title='detail'>
													<!--<i idz='$ggnx[id_ggn]' class='gicon-eye-open'>view</i>-->
													<i idz='$ggnx[id_ggn]' class='view'>view</i>
												</a> 
												<a  class='btn btn-small' target='_blank'  rel='tooltip' data-placement='bottom' 
													data-original-title='hapus'>
													<!--<i idz='$ggnx[id_ggn]' namaz='$ggnx[nama]' class='gicon-remove'>del</i>-->
													<i idz='$ggnx[id_ggn]' namaz='$ggnx[nama]' class='hapus'>del</i>
												</a> 
											</div>
											
										</td>
									</tr>";
								$nox++;
							}
						}
						#kosong
						else{
							echo "<tr align='center'>
									<td  colspan=7 ><span style='color:yellow;text-align:center;'>
									... data tidak ditemukan ...</span></td></tr>";
						}
						#link paging
						echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
						echo "<tr><td colspan=7>".$obj->total."</td></tr>";
					break;
					
					case 'mper':
						#datagrid
						if (isset($_GET['id']) and !empty($_GET['id'])){
							$id= $_GET['id'];
							$sql = "select * from tb_perangkat
									where id like '%$id%' order by id desc";
						}else if (isset($_GET['merk']) and !empty($_GET['merk'])){
							$merk= $_GET['merk'];
							$sql = "select * from tb_perangkat 
									where merk like '%$merk%' order by merk desc";
						}else if (isset($_GET['type']) and !empty($_GET['type'])){
							$type= $_GET['type'];
							$sql = "select * from tb_perangkat 
									where type like '%$type%' order by type desc";
						/*}else if (isset($_GET['jumMax']) and !empty($_GET['jumMax'])){
							$jumMax= $_GET['jumMax'];
							$sql = "select * from tb_perangkat 
									where jumMax like '%$jumMax%' order by jumMax desc";
*/						}else if (isset($_GET['thn_oper']) and !empty($_GET['thn_oper'])){
							$thn_oper= $_GET['thn_oper'];
							$sql = "select * from tb_perangkat 
									where thn_oper like '%$thn_oper%' order by thn_oper desc";
						}else if (isset($_GET['thn_noper']) and !empty($_GET['thn_noper'])){
							$thn_noper= $_GET['thn_noper'];
							$sql = "select * from tb_perangkat 
									where thn_noper like '%$thn_noper%' order by thn_noper desc";
						}else {
							$sql = "select * from tb_perangkat order by id desc";
						}
						#end of datagrid

						#paging	 
						//start 				
						if(isset($_GET['starting'])){ //nilai awal halaman
							$starting=$_GET['starting'];
						}else{
							$starting=0;
						}
						//record per halaman
						$recpage= 5;//jumlah data per halaman
						$obj 	= new pagination_class($sql,$starting,$recpage);
						$result =$obj->result;
						#end of paging	 
						
						#ada data
						if(mysql_num_rows($result)!=0)
						{
							$nox 	= $starting+1;
							while($perx = mysql_fetch_array($result))
							{
								
								if($_SESSION['leveluserMUX']=='admin'){
									$actionBG ="<td class='ms'>
									<div class='btn-group1'>
								<a idz='$perx[id]' title='edit' class='edit btn btn-small' rel='tooltip' data-placement='left' data-original-title=' Edit ' >
									<i class='edit icon-pencil'></i>
								</a> 
								<a href='report/cper.php?tabelx=tb_perangkat&judulx=PERANGKAT&id=$perx[id]' target='_blank' class='btn detail btn-small' title='detail' rel='tooltip' data-placement='top' 
									data-original-title='detail' >
									<i class='view icon-eye-open'></i>
								</a> 
								<a  idz='$perx[id]' class='btn hapus btn-small' title='hapus' rel='tooltip' data-placement='bottom' data-original-title='hapus'>
									<i  class='hapus icon-remove'></i>
								</a></td> 
								</div>";
								}else{
								$actionBG ="<td class='ms'>
								<div class='btn-group1'>
								<a href='report/cper.php?tabelx=tb_perangkat&judulx=PERANGKAT&id=$perx[id]' target='_blank' class='btn detail btn-small' title='detail' rel='tooltip' data-placement='top' 
									data-original-title='detail' >
									<i class='view icon-eye-open'></i>
								</a> 
								</td> 
								</div>";
								}
															
								echo"
									<tr id='per_$perx[id]'>
										<td class='to_hide_phone'> $perx[id]</td>
										<td class='to_hide_phone'> $perx[merk]</td>
										<td class='to_hide_phone'> $perx[type]</td>
										<!--<td class='to_hide_phone'> $perx[jumMax]</td>-->
										<td class='to_hide_phone'> $perx[thn_oper]</td>
										<td class='to_hide_phone'> $perx[thn_noper]</td>
										$actionBG
									</tr>";
								$nox++;
							}
						}
						#kosong
						else{
							echo "<tr align='center'>
									<td  colspan=7 ><span style='color:yellow;text-align:center;'>
									... data tidak ditemukan ...</span></td></tr>";
						}
						#link paging
						echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
						echo "<tr><td colspan=7>".$obj->total."</td></tr>";
					break;
				
					case 'mperdet':
						#datagrid
						$sqlU= "select * from tb_perangkat p, tb_perangkat_detail d, tb_backbone b
								where 	
									p.id = d.id_per and 
									d.id_backbone = b.id_backbone ";
						if (isset($_GET['id_per']) and !empty($_GET['id_per'])){
							$id_per= $_GET['id_per'];
							$sql = $sqlU." and p.id like '%$id_per%' order by p.id desc";
						}else if (isset($_GET['channelida']) and !empty($_GET['channelida'])){
							$channelida= $_GET['channelida'];
							$sql = $sqlU." and d.channelida like '%$channelida%' order by d.channelida desc";
						}else if (isset($_GET['channelidb']) and !empty($_GET['channelidb'])){
							$channelidb= $_GET['channelidb'];
							$sql = $sqlU." and d.channelidb like '%$channelidb%' order by d.channelidb desc";
						}else if (isset($_GET['ddf_a']) and !empty($_GET['ddf_a'])){
							$ddf_a= $_GET['ddf_a'];
							$sql = $sqlU." and d.ddf_a like '%$ddf_a%' order by d.ddf_a desc";
						}else if (isset($_GET['ddf_b']) and !empty($_GET['ddf_b'])){
							$ddf_b= $_GET['ddf_b'];
							$sql = $sqlU." and d.ddf_b like '%$ddf_b%' order by d.ddf_b desc";
						}else {
							$sql = $sqlU." order by d.id_per_detail desc";
						}
						#end of datagrid
	
						#paging	 
						//start 				
						if(isset($_GET['starting'])){ //nilai awal halaman
							$starting=$_GET['starting'];
						}else{
							$starting=0;
						}
						//record per halaman
						$recpage= 5;//jumlah data per halaman
						$obj 	= new pagination_class($sql,$starting,$recpage);
						$result =$obj->result;
						#end of paging	 
						
						#ada data
						if(mysql_num_rows($result)!=0)
						{
							$nox 	= $starting+1;
							while($perdetx = mysql_fetch_array($result))
							{
								if($_SESSION['leveluserMUX']=='admin'){
									$actionBG ="<td class='ms'><div class='btn-group1'>
								<a idz='$perdetx[id_per_detail]' title='edit' class='edit btn btn-small' rel='tooltip' data-placement='left' data-original-title=' Edit ' >
									<i class='edit icon-pencil'></i>
								</a> 
								<a href='report/cperdet.php?tabelx=tb_perangkat_detail&judulx=PERANGKAT DETAIL&id_per_detail=$perdetx[id_per_detail]' target='_blank' class='btn detail btn-small' title='detail' rel='tooltip' data-placement='top' 
									data-original-title='detail' >
									<i class='view icon-eye-open'></i>
								</a> 
								<a  idz='$perdetx[id_per_detail]' class='btn hapus btn-small' title='hapus' rel='tooltip' data-placement='bottom' data-original-title='hapus'>
									<i  class='hapus icon-remove'></i>
								</a></td> 
								</div>";
								}else{
								$actionBG ="<td class='ms'><div class='btn-group1'>
								<a href='report/cperdet.php?tabelx=tb_perangkat_detail&judulx=PERANGKAT DETEAIL&id_per_detail=$perdetx[id_per_detail]' target='_blank' class='btn detail btn-small' title='detail' rel='tooltip' data-placement='top' 
									data-original-title='detail' >
									<i class='view icon-eye-open'></i>
								</a> 
								</td> 
								</div>";
								}
								echo"
									<tr id='perdet_$perdetx[id_per_detail]'>
										<td class='to_hide_phone'> $perdetx[id]</td>
										<td class='to_hide_phone'> $perdetx[kode]</td>
										<td class='to_hide_phone'> $perdetx[ddf_a]</td>
										<td class='to_hide_phone'> $perdetx[ddf_b]</td>
										<td class='to_hide_phone'> $perdetx[channelida]</td>
										<td class='to_hide_phone'> $perdetx[channelidb]</td>
										$actionBG
									</tr>";
								$nox++;
							}
						}
						#kosong
						else{
							echo "<tr align='center'>
									<td  colspan=7 ><span style='color:yellow;text-align:center;'>
									... data tidak ditemukan ...</span></td></tr>";
						}
						#link paging
						echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
						echo "<tr><td colspan=7>".$obj->total."</td></tr>";
					break;
					
					case 'mkap':
						#datagrid
						//$sqlU = "SELECT
//									distinct(k.id_kap) /*,
//									k.avail2mbpsx,
//									k.availstm1x,
//									k.availstm4x,
//									k.availstm64x,
//									k.tgl*/
//									
//								FROM tb_kapasitas k, tb_backbone b
//								WHERE 
//									k.id_backbone = b.id_backbone AND 
//									k.avail2mbpsx LIKE '%$_GET[avail2mbpsx]%' and
//									k.availstm1x LIKE '%$_GET[availstm1x]%' and
//									k.availstm4x LIKE '%$_GET[availstm4x]%' and
//									k.availstm64x LIKE '%$_GET[availstm64x]%' and
//									k.id_backbone = '$_GET[id_backbonex]'
//								ORDER BY k.id_kapasitas DESC";'
						/*$sqlU = "SELECT 
									id_kap, 
									id_backbone, 
									avail2mbpsx, 
									availstm1x, 
									availstm4x, 
									availstm64x, 
									max(tgl) as tanggal
								FROM tb_kapasitas
								GROUP BY id_kap
								HAVING 
									id_backbone ='$_GET[id_backbonex]' and
									id_kap like '%$_GET[id_kapx]%' and
									avail2mbpsx like '%$_GET[avail2mbpsx]%' and
									availstm1x like '%$_GET[availstm1x]%' and
									availstm4x like '%$_GET[availstm4x]%' and
									availstm64x like '%$_GET[availstm64x]%'
								order by tgl desc 								
								";*/

						$sqlU="	SELECT
									k.id_kapasitas,
									k.id_kap,
									k.id_backbone,
									k.avail2mbpsx,
									k.availstm1x,
									k.availstm4x,
									k.availstm64x,
									k.tgl

								FROM 
									tb_kapasitas k
									INNER JOIN (
										SELECT id_kap, MAX(tgl) AS tanggal
										FROM tb_kapasitas
										WHERE id_backbone='$_GET[id_backbonex]'
										GROUP BY id_kap
										ORDER BY id_kap,tgl
									)tb_tgl 
									ON 
									(k.id_kap=tb_tgl.id_kap AND k.tgl= tb_tgl.tanggal)
								ORDER BY 
									k.id_kap";
								
								//var_dump($sqlU);exit();
						/*if (isset($_GET['kode']) and !empty($_GET['kode'])){
							$kode= $_GET['kode'];
							$sql = $sqlU." b.kode like '%$kode%' order by b.kode desc";
						}else if (isset($_GET['avail2mbps']) and !empty($_GET['avail2mbps'])){
							$avail2mbps= $_GET['avail2mbps'];
							$sql = $sqlU." k.avail2mbps like '%$avail2mbps%' order by b.avail2mbps desc";
						}else if (isset($_GET['availstm1']) and !empty($_GET['availstm1'])){
							$availstm1= $_GET['availstm1'];
							$sql = $sqlU." k.availstm1 like '%$availstm1%' order by b.availstm1 desc";
						}else{
							$sql = $sqlU." order by k.id_kapasitas desc";
						}*/
							//var_dump($sqlU);exit();
							#end of datagrid
							$sql = $sqlU;
							//var_dump($sql);exit();
							
						#paging	 
						//start 				
						if(isset($_GET['starting'])){ //nilai awal halaman
							$starting=$_GET['starting'];
						}else{
							$starting=0;
						}
						//record per halaman
						$recpage= 10;//jumlah data per halaman
						$obj 	= new pagination_class($sql,$starting,$recpage);
						$result = $obj->result;
						#end of paging	 
						
						#ada data
						if(mysql_num_rows($result)!=0)
						{
							$nox 	= $starting+1;
							while($kapx = mysql_fetch_array($result))
							{
								echo"
									<tr id='kapx_$kapx[id_kapasitas]' ok='kapx_$kapx[id_kapasitas]'  class='kapx_'>
										<form method='post' action='pmaster.php'>
											<input type=hidden value=$kapx[id_kapasitas]>
											<td class='to_hide_phone'> $kapx[id_kap]</td>
											<td class='to_hide_phone'> <input type=text name='avail2mbpsxTB' value=$kapx[avail2mbpsx]></td>
											<td class='to_hide_phone'> <input type=text value=$kapx[availstm1x]></td>
											<td class='to_hide_phone'> <input type=text value=$kapx[availstm4x]></td>
											<td class='to_hide_phone'> <input type=text value=$kapx[availstm64x]></td>
											<td class='to_hide_phone'> <input type=text value=$kapx[tgl]></td>
											<td class='ms'>
												
												<div class='btn-group1'>
													<a data-toggle='modal' class='btn btn-small'  
														rel='tooltip' data-placement='left' data-original-title=' Edit '>
														<i idz='$kapx[id_kapasitas]' class='edit'>update</i>
													</a> 
													<a class='btn btn-small' rel='tooltip' data-placement='top' 
														data-original-title='detail'>
														<i idz='$kapx[id_kapasitas]' class='view'>history</i>
													</a> 
													<a  class='btn btn-small' target='_blank'  rel='tooltip' data-placement='bottom' 
													data-original-title='hapus'>
														<i idz='$kapx[id_kapasitas]' namaz='$kapx[nama]' class='hapus'>del</i>
													</a> 
												</div>
											</td>
										</form>
									</tr>";
								$nox++;
							}
						}
						#data kosong
						else{
							echo "<tr align='center'>
									<td  colspan=7 ><span style='color:yellow;text-align:center;'>
									... data tidak ditemukan ...</span></td></tr>";
						}
						#link paging
						echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
						echo "<tr><td colspan=7>".$obj->total."</td></tr>";
					break;
					
					case 'mloker':
						#datagrid
						$loker= $_GET['loker'];
						$sql = "select * from tb_loker where loker like '%$loker%' order by id_loker desc";
						#end of datagrid

						#paging	 
						//start 				
						if(isset($_GET['starting'])){ //nilai awal halaman
							$starting=$_GET['starting'];
						}else{
							$starting=0;
						}
						//record per halaman
						$recpage= 5;//jumlah data per halaman
						$obj 	= new pagination_class($sql,$starting,$recpage);
						$result =$obj->result;
						#end of paging	 
						
						#ada data
						if(mysql_num_rows($result)!=0){
							$nox 	= $starting+1;
							while($lokerx = mysql_fetch_array($result)){
								$x = $_SESSION['leveluserMUX'];
								//var_dump($x);exit();
								if($x=='admin'){
									$actionBG="<td class='ms'>
									<div class='btn-group1'>
										<a idz='$lokerx[id_loker]'  class='edit btn btn-small'  
											rel='tooltip' data-placement='left' data-original-title=' Edit '>
											<i class='icon-pencil'></i>
										</a> 
										<a href='report/cloker.php?tabelx=tb_loker&judulx=LOKASI KERJA&id_loker=$lokerx[id_loker]' target='_blank' class='btn btn-small' rel='tooltip' data-placement='top' data-original-title='detail'>
											<i  class='icon-eye-open'></i>
										</a> 
										<a  idz='$lokerx[id_loker]' namaz='$lokerx[kode]' class='hapus btn btn-small' rel='tooltip' data-placement='bottom' data-original-title='hapus'>
											<i class='icon-remove'></i>
										</a> 
									</div>
									</td>";
								}else{
									$actionBG="<td class='ms'>
									<div class='btn-group1'>
									<a href='report/cloker.php?tabelx=tb_loker&judulx=LOKASI KERJA&id_loker=$lokerx[id_loker]' target='_blank' class='btn btn-small' rel='tooltip' data-placement='top' data-original-title='detail'>
											<i  class='icon-eye-open'></i>
										</a> 
									</div>
									</td>";
								}
								//var_dump($actionBG);exit();
								
								echo"
									<tr id='loker_$lokerx[id_loker]'>
										<td class='to_hide_phone'> $nox </td>
										<td class='to_hide_phone'> $lokerx[loker]</td>
										$actionBG
								</tr>";
								$nox++;
							}
						}
						#kosong
						else{
							echo "<tr align='center'>
									<td  colspan=7 ><span style='color:yellow;text-align:center;'>
									... data tidak ditemukan ...</span></td></tr>";
						}
						#link paging
						echo "<tr><td colspan=7>".$obj->anchors."</td></tr>";
						echo "<tr><td colspan=7>".$obj->total."</td></tr>";
					break;

									
				}
			break;
		#end of tampil====================================================================================			
		
		#tambah===========================================================================================			
			case 'tambah' :
				switch($menu)
				{
					case 'mlinka':
						///$x = filter_input(INPUT_POST, 'ok.', FILTER_CALLBACK, array("options"=>"mysql_real_escape_string"));
						//var_dump($x);exit();
						$que		= "insert into tb_linka SET nama = '".murni($_POST[namaTB])."',
															keterangan='".murni($_POST[keteranganTB])."'";
						//var_dump($que);exit();
						$simpanQ	= mysql_query($que);//or die('eror sql');
						$idx		= mysql_insert_id();
						if($simpanQ)
						{
							echo'{
									"status":"sukses",
									"id":"'.$idx.'",
									"nama":"'.$_POST['namaTB'].'",
									"keterangan":"'.$_POST['keteranganTB'].'"
							}';
						}else{
							echo'{
									"status":"gagal"
							}';
						}
					break;					
					
					case 'mlinkb':
						$que		= "insert into tb_linkb (nama, keterangan) 
										values ('".$_POST['namaTB']."','".$_POST['keteranganTB']."')";
						//var_dump($que);exit();
						$simpanQ	= mysql_query($que);//or die('eror sql');
						$idx		= mysql_insert_id();
						if($simpanQ)
						{
							echo'{
									"status":"sukses",
									"id":"'.$idx.'",
									"nama":"'.$_POST['namaTB'].'",
									"keterangan":"'.$_POST['keteranganTB'].'"
							}';
						}else{
							echo'{
									"status":"gagal"
							}';
						}
					break;
					
					case 'mpeg':
						$que		= "insert into tb_peg set 	
										nik		= '$_POST[nikTB]', 
										nama 	= '$_POST[namaTB]', 
										alamat	= '$_POST[alamatTB]',
										username= '$_POST[usernameTB]',
										password= md5('$_POST[passwordTB]'),
										id_level= '$_POST[id_levelTB]'";
						//var_dump($que);exit();
						$simpanQ	= mysql_query($que) or die();
						if($simpanQ)
						{
							echo'{
									"status":"sukses",
									"nik":"'.$_POST['nikTB'].'",
									"nama":"'.$_POST['namaTB'].'",
									"alamat":"'.$_POST['alamatTB'].'",
									"username":"'.$_POST['usernameTB'].'",
									"password":"'.$_POST['passwordTB'].'",
									"id_level":"'.$_POST['id_levelTB'].'"
							}';
						}else{
							echo'{
									"status":"gagal"
							}';
						}
					break;
					
					case 'muser':
						$que		= "insert into tb_user set 	user 		='$_POST[userTB]', 
																keterangan	='$_POST[keteranganTB]'";
						//var_dump($que);exit();
						$simpanQ	= mysql_query($que);//or die('eror sql');
						$idx		= mysql_insert_id();
						if($simpanQ)
						{
							echo'{
									"status":"sukses",
									"id":"'.$idx.'",
									"user":"'.$_POST['userTB'].'",
									"keterangan":"'.$_POST['keteranganTB'].'"
							}';
						}else{
							echo'{
									"status":"gagal"
							}';
						}
					break;
					
					case 'mback':
						$que		= "insert into tb_backbone set 	kode		='$_POST[merkTB] $_POST[kodeTB]', 
																	avail2mbps	='$_POST[avail2mbpsTB]', 
																	availstm1	='$_POST[availstm1TB]', 
																	availstm4	='$_POST[availstm4TB]',
																	availstm16	='$_POST[availstm16TB]', 
																	availstm64	='$_POST[availstm64TB]',
																	id_sistra	='$_POST[id_sistraTB]',
																	keterangan	='$_POST[keteranganTB]'";
						//var_dump($que);exit();
						$simpanQ	= mysql_query($que);//or die('eror sql');
						$idx		= mysql_insert_id();
						if($simpanQ)
						{
							echo'{
									"status":"sukses",
									"id":"'.$idx.'",
									"kode":"'.$_POST['kodeTB'].'",
									"keterangan":"'.$_POST['keteranganTB'].'"
							}';
						}else{
							echo'{
									"status":"gagal"
							}';
						}
					break;
				
					case 'msistra':
						$que		= "insert into tb_sistra set sistra ='$_POST[sistraTB]'";
						$simpanQ	= mysql_query($que);//or die('eror sql');
						$idx		= mysql_insert_id();
						if($simpanQ)
						{
							echo'{
									"status":"sukses",
									"id":"'.$idx.'",
									"sistra":"'.$_POST['sistraTB'].'"
							}';
						}else{
							echo'{
									"status":"gagal"
							}';
						}
					break;
					
					case 'mkoord':
						$que		= "insert into tb_koordinasi set 
										id_peg	= '$_POST[id_pegTB]', 
										id_loker= '$_POST[id_lokerTB]',
										telp	= '$_POST[telpTB]',
										telp2	= '$_POST[telp2TB]'";
						//var_dump($que);exit();
						$simpanQ	= mysql_query($que);//or die('eror sql');
						if($simpanQ){
							echo'{
									"status":"sukses",
									"id_peg":"'.$_POST['id_pegTB'].'",
									"id_loker":"'.$_POST['id_lokerTB'].'",
									"telp":"'.$_POST['telpTB'].'",
									"telp2":"'.$_POST['telp2TB'].'"
							}';
						}else{
							echo'{
									"status":"gagal"
							}';
						}
					break;
					
					case 'malat':
						$que		= "insert into tb_alat set 	id_alat	= '$_POST[id_alatTB]', 
																lokasi	= '$_POST[lokasiTB]',
																kegunaan= '$_POST[kegunaanTB]',
																merk	= '$_POST[merkTB]',
																thn_oper= '$_POST[thn_operTB]',
																kondisi	= '$_POST[kondisiTB]'
																";
						
						//var_dump($que);exit();
						$simpanQ	= mysql_query($que);//or die('eror sql');
						if($simpanQ)
						{
							echo'{
									"status":"sukses",
									"id_alat":"'.$_POST['id_alatTB'].'",
									"lokasi":"'.$_POST['lokasiTB'].'",
									"kegunaan":"'.$_POST['kegunaanTB'].'",
									"merk":"'.$_POST['merkTB'].'",
									"thn_oper":"'.$_POST['thn_operTB'].'",
									"kondisi":"'.$_POST['kondisiTB'].'"
							}';
						}else{
							echo'{
									"status":"gagal"
							}';
						}
					break;
					
					case 'mper':
						$que		= "insert into tb_perangkat set id			= '$_POST[idTB]', 
																	merk		= UCASE('$_POST[merkTB]'),
																	type		= '$_POST[typeTB]',
																	thn_oper	= '$_POST[thn_operTB]',
																	thn_noper	= '$_POST[thn_noperTB]'
																	";
						$simpanQ	= mysql_query($que);//or die('eror sql');
						if($simpanQ)
						{
							echo'{
									"status":"sukses",
									"id":"'.$_POST['idTB'].'",
									"merk":"'.$_POST['merkTB'].'",
									"type":"'.$_POST['typeTB'].'",
									"thn_oper":"'.$_POST['thn_operTB'].'",
									"thn_noper":"'.$_POST['thn_noperTB'].'"
							}';
						}else{
							echo'{
									"status":"gagal"
							}';
						}
					break;
					
					case 'mperdet':
						$idx	= explode("|", $_POST[id_perTB]);
						$id_per	= substr($idx[0],0);
						$que		= "insert into tb_perangkat_detail set 	
										id_per		= '$id_per', 
										id_backbone	= '$_POST[id_backboneTB]',
										ddf_a		= '$_POST[ddf_aTB]',
										ddf_b		= '$_POST[ddf_bTB]',
										channelida	= '$_POST[channelidaTB]',
										channelidb	= '$_POST[channelidbTB]'";
						//var_dump($que);exit();
						$simpanQ	= mysql_query($que);//or die('eror sql');
						$idx		= mysql_insert_id();
						if($simpanQ){
							echo'{
									"status":"sukses",
									"id":"'.$idx.'",
									"id_per":"'.$_POST['id_perTB'].'"
							}';
						}else{
							echo'{
									"status":"gagal"
							}';
						}
					break;
					
					case 'mkap':
						$que		= "insert into tb_kapasitas set 	
										id_kap		= '".$_POST[id_kapTB]."', 
										id_backbone	= '".$_POST[id_backboneTB]."', 
										avail2mbpsx	= '".$_POST[avail2mbpsTB]."', 
										availstm1x	= '".$_POST[availstm1TB]."', 
										availstm4x	= '".$_POST[availstm4TB]."', 
										availstm64x	= '".$_POST[availstm64TB]."', 
										tgl			= NOW()"; 
						//var_dump($que);exit();
						
						$simpanQ	= mysql_query($que);//or die('eror sql');
						$idx		= mysql_insert_id();
						if($simpanQ){
							echo'{
									"status":"sukses",
									"id":"'.$idx.'",
									"id_kap":"'.$_POST['id_kapTB'].'",
									"id_backbone":"'.$_POST['id_backboneTB'].'",
									"avail2mbpsx":"'.$_POST['avail2mbpsTB'].'",
									"availstm1x":"'.$_POST['availstm1TB'].'",
									"availstm4x":"'.$_POST['availstm4TB'].'",
									"availstm64x":"'.$_POST['availstm64TB'].'"
							}';
						}else{
							echo'{
									"status":"gagal"
							}';
						}
					break;
				case 'mloker':
					$que		= "insert into tb_loker set loker ='$_POST[lokerTB]'";
					$simpanQ	= mysql_query($que);//or die('eror sql');
					$idx		= mysql_insert_id();
					if($simpanQ)
					{
						echo'{
								"status":"sukses",
								"id_loker":"'.$idx.'",
								"loker":"'.$_POST['lokerTB'].'"
						}';
					}else{
						echo'{
								"status":"gagal"
						}';
					}
				break;	
					
				}
			break;
		#end of tambah===========================================================================================			
		
		#ubah===========================================================================================			
			case 'ubah' :
				switch ($menu){
					case 'suser':
						if(empty($_POST['passwordTB']) and empty($_POST['password2TB'])){
							$que		= "update tb_peg set 	nama	='$_POST[namaTB]',
																alamat	= '$_POST[alamatTB]',
																username= '$_POST[usernameTB]'
													where id_peg ='$_SESSION[id_userMUX]'";
						}else{
							if($_POST['passwordTB'] != $_POST['password2TB']){
								echo'{"status":"error_pass"}';
								exit();
							}else{
								$que = "update tb_peg set 	nama	='$_POST[namaTB]',
															alamat	= '$_POST[alamatTB]',
															username= '$_POST[usernameTB]',
															password= md5('$_POST[passwordTB]')
												where id_peg ='$_SESSION[id_userMUX]'";
							}
						}
																	
						//var_dump($que);exit();
						$simpanQ	= mysql_query($que);//or die('eror sql');
						$idx		= mysql_insert_id();
						if($simpanQ){
							echo'{"status":"sukses"}';
						}else{
							echo'{"status":"gagal"}';
						}
					break;					
					
					case 'mlinka':
						$sql="update tb_linka set 	nama		='$_POST[namaTB]', 
													keterangan	='$_POST[keteranganTB]' 
											where id_linka	= '$_GET[idx]'";
						$simpanQ=mysql_query($sql);
						if($simpanQ){
							echo'{"status":"sukses"}';
						}else{
							echo'{"status":"gagal"}';
						}
					break;
					
					case 'mlinkb':
						$sql="update tb_linkb set 	nama		='$_POST[namaTB]', 
													keterangan	='$_POST[keteranganTB]' 
											where id_linkb = '$_GET[idx]'";
						$simpanQ=mysql_query($sql);
						if($simpanQ){
							echo'{"status":"sukses"}';
						}else{
							echo'{"status":"gagal"}';
						}
					break;
					
					case 'mpeg':
						$sql = "update tb_peg set 	nama 	= '$_POST[namaTB]', 
													nik		= '$_POST[nikTB]',
													alamat	= '$_POST[alamatTB]',
													username= '$_POST[usernameTB]',
													password= md5('$_POST[passwordTB]'),
													id_level= '$_POST[id_levelTB]'
										where id_peg = '$_GET[idx]'";
						$simpanQ=mysql_query($sql);
						if($simpanQ){
							echo'{"status":"sukses"}';
						}else{
							echo'{"status":"gagal"}';
						}
					break;
			
					case 'muser':
						$sql="update tb_user  set 	user 		='$_POST[userTB]', 
													keterangan	='$_POST[keteranganTB]' 
											where id_user	= '$_GET[idx]'";
						$simpanQ=mysql_query($sql);
						if($simpanQ){
							echo'{"status":"sukses"}';
						}else{
							echo'{"status":"gagal"}';
						}
					break;
					
					case 'mback':
						$sql="update tb_backbone set	kode		='$_POST[merkTB] $_POST[kodeTB]', 
														avail2mbps	='$_POST[avail2mbpsTB]', 
														availstm1	='$_POST[availstm1TB]', 
														availstm4	='$_POST[availstm4TB]', 
														availstm16	='$_POST[availstm16TB]', 
														availstm64	='$_POST[availstm64TB]', 
														id_sistra	='$_POST[id_sistraTB]', 
														keterangan	='$_POST[keteranganTB]' 
											where id_backbone = '$_GET[idx]'";
						$simpanQ=mysql_query($sql);
						if($simpanQ){
							echo'{"status":"sukses"}';
						}else{
							echo'{"status":"gagal"}';
						}
					break;
					
					case 'msistra':
						$sql="update tb_sistra set	sistra	='$_POST[sistraTB]' where id_sistra = '$_GET[idx]'";
						$simpanQ=mysql_query($sql);
						if($simpanQ){
							echo'{"status":"sukses"}';
						}else{
							echo'{"status":"gagal"}';
						}
					break;
					
					case 'mkoord':
						$sql="update tb_koordinasi set	id_peg	='$_POST[id_pegTB]',
											 			id_loker='$_POST[id_lokerTB]',
											 			telp	='$_POST[telpTB]',
											 			telp2	='$_POST[telp2TB]'											 	
												where id_koordinasi = '$_GET[idx]'";
						//var_dump($sql);exit();
						$simpanQ=mysql_query($sql);
						if($simpanQ){
							echo'{"status":"sukses"}';
						}else{
							echo'{"status":"gagal"}';
						}
					break;
					
					case 'malat':
						$sql	= "update tb_alat set 	lokasi	= '$_POST[lokasiTB]',
														kegunaan= '$_POST[kegunaanTB]',
														merk	= '$_POST[merkTB]',
														thn_oper= '$_POST[thn_operTB]',
														kondisi	= '$_POST[kondisiTB]'
									where  id_alat	= '$_GET[idx]'"; 
															
						//var_dump($sql);exit();
						$simpanQ=mysql_query($sql);
						if($simpanQ){
							echo'{"status":"sukses"}';
						}else{
							echo'{"status":"gagal"}';
						}
					break;
					
					case 'tggn':
						$sql	= "update tb_ggn set 	sistra			= '$_POST[sistraTB]',
														linkx			= '$_POST[linkxTB]',
														lokasi			= '$_POST[lokasiTB]',
														uraian			= '$_POST[uraianTB]',
														tgl				= '$_POST[tglTB]',
														jmA				= '$_POST[jmATB]',
														jmB				= '$_POST[jmBTB]',
														pet				= '$_POST[petTB]',
														id_koordinasi	= '$_POST[id_koordinasiTB]'
									where  id_ggn = '$_GET[idx]'"; 
															
						//var_dump($sql);exit();
						$simpanQ=mysql_query($sql);
						if($simpanQ){
							echo'{"status":"sukses"}';
						}else{
							echo'{"status":"gagal"}';
						}
					break;
					
					case 'mper':
						$que		= "update tb_perangkat set 	merk		= UCASE('$_POST[merkTB]'),
																type		= '$_POST[typeTB]',
																thn_oper	= '$_POST[thn_operTB]',
																thn_noper	= '$_POST[thn_noperTB]'
												where id = '$_POST[idTB]'";
						$simpanQ	= mysql_query($que);//or die('eror sql');
						if($simpanQ)
						{
							echo'{
									"status":"sukses",
									"id":"'.$_POST['idTB'].'",
									"merk":"'.$_POST['merkTB'].'",
									"type":"'.$_POST['typeTB'].'",
									"thn_oper":"'.$_POST['thn_operTB'].'",
									"thn_noper":"'.$_POST['thn_noperTB'].'"
							}';
						}else{
							echo'{
									"status":"gagal"
							}';
						}
					break;
					
					case 'mperdet':
						$idx	= explode("|", $_POST[id_perTB]);
						$id_per	= substr($idx[0],0);
						
						$que		= "update tb_perangkat_detail set 		
											id_per 		= '$id_per', 
											id_backbone	= '$_POST[id_backboneTB]',
											ddf_a		= '$_POST[ddf_aTB]',
											ddf_b		= '$_POST[ddf_bTB]',
											channelida	= '$_POST[channelidaTB]',
											channelidb	= '$_POST[channelidbTB]'
										where id_per_detail  = '$_GET[idx]'";
						//var_dump($que);exit();
						$simpanQ	= mysql_query($que);//or die('eror sql');
						if($simpanQ)
						{
							echo'{
									"status":"sukses",
									"id":"'.$_GET['idx'].'",
									"ddf_a":"'.$_POST['ddf_aTB'].'",
									"ddf_b":"'.$_POST['ddf_bTB'].'",
									"channelida":"'.$_POST['channelidaTB'].'",
									"channelidb":"'.$_POST['channelidbTB'].'"
							}';
						}else{
							echo'{
									"status":"gagal"
							}';
						}
					break;
				
					case 'mloker':
						$sql="update tb_loker set	loker	='$_POST[lokerTB]' where id_loker = '$_GET[idx]'";
						$simpanQ=mysql_query($sql);
						if($simpanQ){
							echo'{"status":"sukses"}';
						}else{
							echo'{"status":"gagal"}';
						}
					break;
						
				}
			break;
		#end of ubah===========================================================================================			
		
		#hapus===========================================================================================			
		case 'hapus' :
			switch($menu)
			{
				case 'mlinka':
					$kue 		= "select * from tb_linka where id_linka ='$_GET[idx]'";
					$terhapusQ	= mysql_fetch_assoc(mysql_query($kue));
					$kue2		= "delete from tb_linka where id_linka = '$_GET[idx]'";
					#var_dump($kue2);
					$hapusQ		= mysql_query($kue2);
					
					if($hapusQ)
					{
						echo '{
								"status":"sukses",
								"id":"'.$_GET['idx'].'",
								"nama":"'.$terhapusQ['nama'].'",
								"keterangan":"'.$terhapusQ['keterangan'].'"
							}';
					}else{
						echo '{"status":"gagal","id":"'.$_GET['idx'].'"}';						
					}
				break;
				
				case 'mlinkb':
					$kue 		= "select * from tb_linkb where id_linkb ='$_GET[idx]'";
					$terhapusQ	= mysql_fetch_assoc(mysql_query($kue));
					$kue2		= "delete from tb_linkb where id_linkb = '$_GET[idx]'";
					#var_dump($kue2);
					$hapusQ		= mysql_query($kue2);
					
					if($hapusQ)
					{
						echo '{
								"status":"sukses",
								"id":"'.$_GET['idx'].'",
								"nama":"'.$terhapusQ['nama'].'",
								"keterangan":"'.$terhapusQ['keterangan'].'"
							}';
					}else{
						echo '{"status":"gagal","id":"'.$_GET['idx'].'"}';						
					}
				break;
				
				case 'mpeg':
					$kue 		= "select * from tb_peg where id_peg='$_GET[idx]'";
					$terhapusQ	= mysql_fetch_assoc(mysql_query($kue));
					$kue2		= "delete from tb_peg where id_peg= '$_GET[idx]'";
					//var_dump($kue2);
					
					$hapusQ		= mysql_query($kue2);
					if($hapusQ){
						echo '{
								"status":"sukses",
								"id_peg":"'.$_GET['idx'].'",
								"nik":"'.$terhapus['nik'].'",
								"nama":"'.$terhapusQ['nama'].'"
							}';
					}else{
						echo '{"status":"gagal","id":"'.$_GET['idx'].'"}';						
					}
				break;
				
				case 'muser':
					$kue 		= "select * from tb_user where id_user ='$_GET[idx]'";
					$terhapusQ	= mysql_fetch_assoc(mysql_query($kue));
					$kue2		= "delete from tb_user where id_user = '$_GET[idx]'";
					#var_dump($kue2);
					$hapusQ		= mysql_query($kue2);
					
					if($hapusQ)
					{
						echo '{
								"status":"sukses",
								"id":"'.$_GET['idx'].'",
								"user":"'.$terhapusQ['user'].'",
								"keterangan":"'.$terhapusQ['keterangan'].'"
							}';
					}else{
						echo '{"status":"gagal","id":"'.$_GET['idx'].'"}';						
					}
				break;
				
				case 'mback':
					$kue 		= "select * from tb_backbone where id_backbone ='$_GET[idx]'";
					$terhapusQ	= mysql_fetch_assoc(mysql_query($kue));
					$kue2		= "delete from tb_backbone where id_backbone = '$_GET[idx]'";
					//var_dump($kue2);
					$hapusQ		= mysql_query($kue2);
					
					if($hapusQ)
					{
						echo '{
								"status":"sukses",
								"id":"'.$_GET['idx'].'",
								"kode":"'.$terhapusQ['kode'].'",
								"keterangan":"'.$terhapusQ['keterangan'].'"
							}';
					}else{
						echo '{"status":"gagal","id":"'.$_GET['idx'].'"}';						
					}
				break;
				
				case 'msistra':
					$kue 		= "select * from tb_sistra where id_sistra ='$_GET[idx]'";
					$terhapusQ	= mysql_fetch_assoc(mysql_query($kue));
					$kue2		= "delete from tb_sistra where id_sistra = '$_GET[idx]'";
					#var_dump($kue2);
					$hapusQ		= mysql_query($kue2);
					
					if($hapusQ)
					{
						echo '{
								"status":"sukses",
								"id":"'.$_GET['idx'].'",
								"sistra":"'.$terhapusQ['sistra'].'"
							}';
					}else{
						echo '{"status":"gagal","id":"'.$_GET['idx'].'"}';						
					}
				break;
				
				case 'mkoord':
					$kue 		= "select * from tb_koordinasi k, tb_peg p 
									where 
										k.id_peg = p.id_peg and
										k.id_koordinasi = '$_GET[idx]'";
					$terhapusQ	= mysql_fetch_assoc(mysql_query($kue));
					$kue2		= "delete from tb_koordinasi where id_koordinasi = '$_GET[idx]'";
					//var_dump($kue2);
					$hapusQ		= mysql_query($kue2);
					
					if($hapusQ){
						echo '{"status":"sukses","nama":"'.$_terhapusQ['nama'].'"}';
					}else{
						echo '{"status":"gagal","id":"'.$_GET['idx'].'"}';						
					}
				break;
				
				case 'malat':
					$kue 		= "select * from tb_alat where id_alat ='$_GET[idx]'";
					$terhapusQ	= mysql_fetch_assoc(mysql_query($kue));
					$kue2		= "delete from tb_alat where id_alat = '$_GET[idx]'";
					//var_dump($kue2);
					$hapusQ		= mysql_query($kue2);
					
					if($hapusQ){
						echo '{
								"status":"sukses",
								"id":"'.$_GET['idx'].'"
							}';
					}else{
						echo '{"status":"gagal","id":"'.$_GET['idx'].'"}';						
					}
				break;
				
				case 'tggn':
					$kue 		= "select * from tb_ggn where id_ggn ='$_GET[idx]'";
					$terhapusQ	= mysql_fetch_assoc(mysql_query($kue));
					$kue2		= "delete from tb_ggn where id_ggn = '$_GET[idx]'";
					//var_dump($kue2);
					$hapusQ		= mysql_query($kue2);
					
					if($hapusQ){
						echo '{
								"status":"sukses",
								"sistra":"'.$terhapusQ['sistra'].'",
								"id":"'.$_GET['idx'].'"
							}';
					}else{
						echo '{"status":"gagal","id":"'.$_GET['idx'].'"}';						
					}
				break;
				
				case 'mper':
					$kue 		= "select * from tb_perangkat where id ='$_GET[idx]'";
					$terhapusQ	= mysql_fetch_assoc(mysql_query($kue));
					$kue2		= "delete from tb_perangkat where id = '$_GET[idx]'";
					
					$hapusQ		= mysql_query($kue2);
					if($hapusQ){
						echo '{
								"status":"sukses",
								"nama_per":"'.$terhapusQ['nama_per'].'",
								"id":"'.$_GET['idx'].'"
							}';
					}else{
						echo '{"status":"gagal","id":"'.$_GET['idx'].'"}';						
					}
				break;
				
				case 'mperdet':
					$kue 		= "select * from tb_perangkat_detail where id_per_detail  ='$_GET[idx]'";
					$terhapusQ	= mysql_fetch_assoc(mysql_query($kue));
					$kue2		= "delete from tb_perangkat_detail  where id_per_detail  = '$_GET[idx]'";
					
					$hapusQ		= mysql_query($kue2);
					if($hapusQ){
						echo '{
								"status":"sukses",
								"id":"'.$_GET['idx'].'"
							}';
					}else{
						echo '{"status":"gagal","id":"'.$_GET['idx'].'"}';						
					}
				break;
			
				case 'mloker':
					$kue 		= "select * from tb_loker where id_loker ='$_GET[idx]'";
					$terhapusQ	= mysql_fetch_assoc(mysql_query($kue));
					$kue2		= "delete from tb_loker where id_loker = '$_GET[idx]'";
					#var_dump($kue2);
					$hapusQ		= mysql_query($kue2);
					
					if($hapusQ)
					{
						echo '{
								"status":"sukses",
								"id_loker":"'.$_GET['idx'].'",
								"loker":"'.$terhapusQ['loker'].'"
							}';
					}else{
						echo '{"status":"gagal","id":"'.$_GET['idx'].'"}';						
					}
				break;
					
			}	
		break;
		#end of hapus===========================================================================================			
		
		#kosongkan===========================================================================================			
		case 'hapussemua' :
			switch($menu){
				
				case 'muser':
					$hapusQ=mysql_query("truncate tb_user")or die("gagal mengosongkan tb_user");
					if($hapusQ){
						echo '{"status":"sukses"}';
					}else{
						echo '{"status":"gagal"}';						
					}
				break;
				
				case 'mpeg':
					$hapusQ=mysql_query("delete from mpeg where id_level = 'user' or id_level='public' ")or die("gagal mengosongkan tb_linka");
					if($hapusQ){
						echo '{"status":"sukses"}';
					}else{
						echo '{"status":"gagal"}';						
					}
				break;
				case 'mlinka':
					$hapusQ=mysql_query("truncate tb_linka")or die("gagal mengosongkan tb_linka");
					if($hapusQ){
						echo '{"status":"sukses"}';
					}else{
						echo '{"status":"gagal"}';						
					}
				break;
				
				case 'mlinkb':
					$hapusQ=mysql_query("truncate tb_linkb")or die("gagal mengosongkan tb_linka");
					if($hapusQ){
						echo '{"status":"sukses"}';
					}else{
						echo '{"status":"gagal"}';						
					}
				break;
				
				case 'mback':
					$hapusQ=mysql_query("truncate tb_backbone")or die("gagal mengosongkan tb_linka");
					if($hapusQ){
						echo '{"status":"sukses"}';
					}else{
						echo '{"status":"gagal"}';						
					}
				break;
				
				case 'msistra':
					$hapusQ=mysql_query("truncate tb_sistra")or die("gagal mengosongkan tb_sistra");
					if($hapusQ){
						echo '{"status":"sukses"}';
					}else{
						echo '{"status":"gagal"}';						
					}
				break;
				
				case 'mkoord':
					$hapusQ=mysql_query("truncate tb_koordinasi")or die("gagal mengosongkan tb_koordinasi");
					if($hapusQ){
						echo '{"status":"sukses"}';
					}else{
						echo '{"status":"gagal"}';						
					}
				break;
				
				case 'malat':
					$hapusQ=mysql_query("truncate tb_alat")or die("gagal mengosongkan tb_alat");
					if($hapusQ){
						echo '{"status":"sukses"}';
					}else{
						echo '{"status":"gagal"}';						
					}
				break;
				
				case 'tggn':
					$hapusQ=mysql_query("truncate tb_ggn")or die("gagal mengosongkan tb_ggn");
					if($hapusQ){
						echo '{"status":"sukses"}';
					}else{
						echo '{"status":"gagal"}';						
					}
				break;
				
				case 'mper':
					$hapusQ=mysql_query("truncate tb_perangkat")or die("gagal mengosongkan tb_perangkat");
					if($hapusQ){
						echo '{"status":"sukses"}';
					}else{
						echo '{"status":"gagal"}';						
					}
				break;
				
				case 'mperdet':
					$hapusQ=mysql_query("truncate tb_perangkat_detail ")or die("gagal mengosongkan tb_perangkat_detail");
					if($hapusQ){
						echo '{"status":"sukses"}';
					}else{
						echo '{"status":"gagal"}';						
					}
				break;
				
				case 'mloker':
					$hapusQ=mysql_query("truncate tb_loker ")or die("gagal mengosongkan tb_loker");
					if($hapusQ){
						echo '{"status":"sukses"}';
					}else{
						echo '{"status":"gagal"}';						
					}
				break;
			}
		break;		
		#kosongkan===========================================================================================			
		
	}
?>