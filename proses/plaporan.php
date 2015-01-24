<?php
	session_start();
	include"../lib/koneks.php";
	//include"lib/pagination_class.php";
 
 // 	$aksi 	=  $_GET['aksi'];
	// $menu	=  $_GET['menu'];
	// $page 	=  $_GET['page'];
	// $cari	=  $_GET['cari'];
	// $tabel	=  $_GET['tabel'];
 	$aksi 	=  isset($_GET['aksi'])?$_GET['aksi']:'';
	$menu	=  isset($_GET['menu'])?$_GET['menu']:'';
	$page 	=  isset($_GET['page'])?$_GET['page']:'';
	$cari	=  isset($_GET['cari'])?$_GET['cari']:'';
	$tabel	=  isset($_GET['tabel'])?$_GET['tabel']:'';
	
	switch ($aksi){
	#cek =======================================================================================================
			/*case'cek':
				switch($menu){
					case 'mperdet':
						$sql =	"SELECT p.id , p.merk
								FROM tb_perangkat p
								INNER JOIN (
									SELECT id_per, count( * ) AS jum
									FROM tb_perangkat_detail
									GROUP BY id_per
								)d ON p.id = d.id_per
								WHERE d.jum < p.jumMax";
						//var_dump($sql);exit();
						$exe	= mysql_query($sql);
						$tot	= mysql_num_rows($exe);
						//var_dump($tot);exit();
						if($tot==0){
							echo '{"status":"full"}';
						}else{
							echo '{"status":"available"}';
						}
					break;
				}
			break;*/

	#combo ===================================================================================================
			case 'combo':
				switch($menu)
				{
					case 'ldapotc':
						$sql 	= "	SELECT
										MONTH (tgl_update) AS bulan
									FROM
										tb_sirkit
									WHERE
										YEAR (tgl_update) = '$_GET[tahun]' 
									GROUP BY
										bulan";
						//var_dump($sql);exit();
						$kue	= mysql_query($sql);
						$ambil  = array();
						while($ambilR	= mysql_fetch_array($kue)){
							$akhir 	= 12;
							$awal	= 1;
							//for($i=$ambilR['bulan']; $i<$akhir; $i++){
								
							//}
							$ambil[]=$ambilR;
						}
						
						if($ambil!=NULL){
							echo json_encode($ambil);
						}
						else{
							echo '{"status":"gagal"}';
						}
					break;
					
					case 'lsirkitc':
						switch ($tabel)
						{
							case 'tb_backbonex':
								/*$sql ="SELECT REVERSE( 
										 SUBSTring( 
										  REVERSE(kode), 1, LOCATE( ' ', REVERSE( kode))
										 )
										) 
										from tb_backbone";*/
								$sql 	= "	select id_backbone, SUBSTRING_INDEX(kode,' ',-1)  as kode
											from tb_backbone
											where kode like '$_GET[kode]%'";
								//var_dump($sql);exit();
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
						
							case 'tb_sirkitx':
								$sql 	= "	select year(s.tgl_update) as tahun
											from tb_sirkit s, tb_perangkat_detail d
											where 
												d.id_backbone = '$_GET[idback]' 
												and d.id_per_detail = s.id_per_detail
											group by 
												tahun";
								//var_dump($sql);exit();
								$kue	= mysql_query($sql);
								//var_dump($kue);exit();
								$ambil  = array();
								while($ambilR	= mysql_fetch_array($kue)){
									$ambil[]=$ambilR;
								}
								//var_dump($ambilR);exit();
								
								
								if($ambil!=NULL){
									echo json_encode($ambil);
								}
								else{
									echo '{"status":"gagal"}';
								}
							break;
							
							case 'tb_sirkit2x':
								$sql 	= " select month(s.tgl_update) as bulan
											from 
												tb_sirkit s, 
												tb_perangkat_detail d
											where 
												year(s.tgl_update)='$_GET[tahun]' and  
												d.id_backbone = '$_GET[idback]' and 
												d.id_per_detail = s.id_per_detail
											group by bulan";
								//var_dump($sql);exit();
								$kue	= mysql_query($sql);
								$ambil  = array();
								$blnx	= array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");		
								while($ambilR	= mysql_fetch_array($kue)){
									//$ambil[]=$ambilR;
									$ambil[]=array(
										'namabulan'=>$blnx[$ambilR['bulan']],
										'bulan'=>$ambilR['bulan'],
									);
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
						switch ($tabel)
						{
							case 'tb_perangkat_detail':
								$sqlU =	"SELECT p.id as id_per, p.merk
											FROM tb_perangkat p
											INNER JOIN (
												SELECT id_per, count( * ) AS jum
												FROM tb_perangkat_detail
												GROUP BY id_per
											)d ON p.id = d.id_per
											WHERE d.jum < p.jumMax";
											
								if($_GET['par']==0){//add data
									$sql = $sqlU;
								}else{ //edit
									$sql =	$sqlU." UNION 
												select d2.id_per , p2.merk
												from tb_perangkat p2, tb_perangkat_detail d2
												where 
													p2.id = d2.id_per and
													d2.id_per_detail = '$_GET[par]' ";
								}
								//var_dump($sql);exit();
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
						if($jalan)
						{
							echo '{
								"status":"sukses",
								"nik":"'.$ambilR['nik'].'",
								"nama":"'.$ambilR['nama'].'",
								"alamat":"'.$ambilR['alamat'].'",
								"username":"'.$ambilR['username'].'",
								"id_level":"'.$ambilR['id_level'].'"
								}';
						}
						else
						{
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
						$jalan	= 	mysql_query("select * from tb_backbone where id_backbone = '$_GET[idx]'") 
									or die("kueri ambil edit backbone error");
						$ambilR = 	mysql_fetch_assoc($jalan);
						if($jalan)
						{
							echo '{
								"status":"sukses",
								"kode":"'.$ambilR['kode'].'",
								"avail2mbps":"'.$ambilR['avail2mbps'].'",
								"availstm1":"'.$ambilR['availstm1'].'",
								"availstm4":"'.$ambilR['availstm4'].'",
								"availstm16":"'.$ambilR['availstm16'].'",
								"availstm64":"'.$ambilR['availstm64'].'",
								"keterangan":"'.$ambilR['keterangan'].'"
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
						$que	= "	select * 
									from tb_koordinasi k, tb_peg p
									where 
										k.id_peg = p.id_peg and
										k.id_koordinasi = '$_GET[idx]'";
						$jalan	= 	mysql_query($que) or die("kueri ambil edit koordinasi error");
						$ambilR = 	mysql_fetch_assoc($jalan);
						if($jalan)
						{
							echo '{
								"status":"sukses",
								"id_peg":"'.$ambilR['id_peg'].'",
								"nama":"'.$ambilR['nama'].'",
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
	
	}
	