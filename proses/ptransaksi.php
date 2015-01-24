<?php
	include"../lib/koneks.php";
	include"../lib/fungsi_indotgl.php";
	include"../lib/pagination_class.php";
	include "../lib/excel_reader2.php";
 
 	session_start();
 	$aksi 	=  isset($_GET['aksi'])?$_GET['aksi']:'';
	$menu	=  isset($_GET['menu'])?$_GET['menu']:'';
	$page 	=  isset($_GET['page'])?$_GET['page']:'';
	$cari	=  isset($_GET['cari'])?$_GET['cari']:'';
	$tabel	=  isset($_GET['tabel'])?$_GET['tabel']:'';

	// $aksi 	=  $_GET['aksi'];
	// $menu	=  $_GET['menu'];
	// $page 	=  $_GET['page'];
	// $cari	=  $_GET['cari'];
	// $tabel	=  $_GET['tabel'];
	
	switch ($aksi){
			case 'import':
				$data 	= new Spreadsheet_Excel_Reader($_FILES['fileTB']['tmp_name']);
				$baris 	= $data->rowcount($sheet_index=0);
				$kolom	= $data->colcount($sheet_index=0);
				$sukses = 0;
				$gagal 	= 0;
				$backb	= $data->val(2,1);
				
				#14 vs 16
				for($i=7; $i<=$baris; $i++){
					//tb_backbone
					//tb perangkat detail
						$channela	= $data->val($i, 2);
						$channelb	= $data->val($i, 3);
					//tb sirkit
						#linka n linkb------------------
						$linka		= $data->val($i, 4);
						$linkb		= $data->val($i, 5);
					
					if($kolom=14){
						$ddfa		= $data->val($i, 6);
						$ddfb		= $data->val($i, 7);
						
						#tb user------------------------
						$user		= $data->val($i, 8);
						#sirkit-------------------------
						$tid		= $data->val($i, 9);
						$diu		= $data->val($i, 10);
						$tc			= $data->val($i, 11);
						$ddftc		= $data->val($i, 12);
						$ddfuser	= $data->val($i, 13);
						$keterangan	= $data->val($i, 14);
						//echo '14';exit();
					}else{
						$ddfa1		= $data->val($i, 6);
						$ddfa2		= $data->val($i, 7);
						$ddfa3		= $data->val($i, 8);
						$ddfa		= $ddfa1.'_'.$ddfa2.'_'.$ddfa3;
						$ddfb		= $data->val($i, 9);
						
						#tb user------------------------
						$user		= $data->val($i, 10);
						#sirkit-------------------------
						$tid		= $data->val($i, 11);
						$diu		= $data->val($i, 12);
						$tc			= $data->val($i, 13);
						$ddftc		= $data->val($i, 14);
						$ddfuser	= $data->val($i, 15);
						$keterangan	= $data->val($i, 16);
						
						//echo '16';exit();
					}
				
				//perangkat detail 
					$sqlpd	= "select id_per_detail from tb_perangkat_detail where channelida='$channela'";
					//var_dump($sqlpd);exit();
					$exepd	= mysql_query($sqlpd);
					$cekpd	= mysql_fetch_assoc($exepd);
					$jumpd	= mysql_num_rows($exepd);
				//backbone 
					$sqlbc	="select id_backbone from tb_backbone where kode = '$backb'";
					//var_dump($sqlbc);exit();
					$exebc	= mysql_query($sqlbc);
					$cekbc	= mysql_fetch_assoc($exebc);
					$jumbc	= mysql_num_rows($exebc);
				
					#var_dump($jumpd);exit();
					#var_dump($jumbc);exit();
				
				//perangkat detail : ada
					if($jumpd>0){
						$sqlbc1 = "SELECT
									avail2mbps - (
										SELECT
											count(*) jum
										FROM
											tb_sirkit s,
											tb_perangkat_detail pd
										WHERE
											s.id_per_detail = pd.id_per_detail
										AND pd.id_backbone = '$cekbc[id_backbone]'
									) as sisa
								FROM
									tb_backbone
								WHERE
									id_backbone = '$cekbc[id_backbone]'";
						//var_dump($sqlbc1);exit();
						$exebc1	= mysql_query($sqlbc1);
						$cekbc1	= mysql_fetch_assoc($exebc1);
						$sisa = $cekbc1['sisa'];
						//var_dump($x);exit();
						if($sisa<$baris){
							$sqlbc2 = "update tb_backbone set avail2mbps =avail2mbps - 6  + $baris where id_backbone = '$cekbc[id_backbone]' ";
							//var_dump($sqlbc2);exit();
							$exebc2 = mysql_query($sqlbc2);
							//var_dump($exebc2);exit();
						}
						$id_pd	= $cekpd['id_per_detail'];
						//var_dump($id_pd);exit();
					}
					//perangkat detail : tidak ada
					else{
						//backbone
						if($jumbc>0){
							$sqlbc1 = "SELECT
										avail2mbps - (
											SELECT
												count(*) jum
											FROM
												tb_sirkit s,
												tb_perangkat_detail pd
											WHERE
												s.id_per_detail = pd.id_per_detail
											AND pd.id_backbone = '$cekbc[id_backbone]'
										) as sisa
									FROM
										tb_backbone
									WHERE
										id_backbone = '$cekbc[id_backbone]'";
							//var_dump($sqlbc1);exit();
							$exebc1	= mysql_query($sqlbc1);
							$cekbc1	= mysql_fetch_assoc($exebc1);
							$sisa = $cekbc1['sisa'];
							//var_dump($x);exit();
							if($sisa<$baris){
								$sqlbc2 = "update tb_backbone set avail2mbps =avail2mbps - 6  + $baris where id_backbone = '$cekbc[id_backbone]' ";
								//var_dump($sqlbc2);exit();
								$exebc2 = mysql_query($sqlbc2);
								//var_dump($exebc2);exit();
							}
							$id_bc = $cekbc['id_backbone'];
						}else{
							$sqlbc2="insert into tb_backbone set 	kode 		= '$backb', 
																	keterangan 	= '$backb', 	
																	id_sistra	= '1',
																	avail2mbps	= $baris - 6,
																	availstm1	= '0',
																	availstm4	= '0',
																	availstm16	= '0',
																	availstm64	= '0'";
							//var_dump($sqlbc2);exit();
							$exebc2 = mysql_query($sqlbc2);
							$id_bc = mysql_insert_id();
						}
						$sqlpd2 = "insert into tb_perangkat_detail set 	id_per		= 'P001',
																		id_backbone	= '$id_bc',
																		channelida 	= '$channela', 
																		channelidb 	= '$channelb', 	
																		ddf_a		= '$ddfa',
																		ddf_b		= '$ddfb'";
						$exepd2 = mysql_query($sqlpd2);
						$id_pd	= mysql_insert_id();
					}
						
					//linka 
					$exela	= mysql_query("select id_linka from tb_linka where nama='$linka'");
					$cekla	= mysql_fetch_assoc($exela);
					$jumla	= mysql_num_rows($exela);
					if($jumla>0){
						$id_la	= $cekla['id_linka'];
					}else{
						$exela2 = mysql_query("insert into tb_linka set nama = '$linka', keterangan = '$linka'");
						$id_la	= mysql_insert_id();
					}
					
					//linkb
					$exelb	= mysql_query("select id_linkb from tb_linkb where nama='$linkb'");
					$ceklb	= mysql_fetch_assoc($exelb);
					$jumlb	= mysql_num_rows($exelb);
					if($jumlb>0){
						$id_lb	= $ceklb['id_linkb'];
					}else{
						$exelb2 = mysql_query("insert into tb_linkb set nama = '$linkb', keterangan = '$linkb'");
						$id_lb	= mysql_insert_id();
					}
					
					//user
					$exeus	= mysql_query("select id_user from tb_user where user='$user'");
					$cekus	= mysql_fetch_assoc($exeus);
					$jumus	= mysql_num_rows($exeus);
					if($jumus>0){
						$id_us	= $cekus['id_user'];
					}else{
						$exeus2 = mysql_query("insert into tb_user set user = LOWER('$user'), keterangan = LOWER('$user')");
						$id_us	= mysql_insert_id();
					}
					
					$query 	= "INSERT INTO tb_sirkit set 	id_per_detail 	= '$id_pd',
															id_linka		= '$id_la',
															id_linkb		= '$id_lb',
															id_user			= '$id_us',
															
															tid				= '$tid',
															diu				= '$diu',
															tc				= '$tc',
															ddf_tc			= '$ddftc',
															ddf_user		= '$ddfuser',
															keterangan		= '$keterangan',
															
															tgl_update		= NOW()";
					$hasil 	= mysql_query($query);
					if ($hasil) 
						$sukses++;
					else 
						$gagal++;
				}
				echo "<script>alert(' import ".$_FILES['fileTB']['name'].", sukses :".$sukses." baris, gagal:".$gagal." baris');window.location='../?hlm=dGltcG9ydA=='</script>";
					
			break;
			
			case'cek':
				switch($menu){
					case 'tsirkit':
						$sql 	= "	select * from tb_perangkat_detail
									where id_per_detail not in(
										select id_per_detail
										from tb_sirkit 
										group by id_per_detail
									)";
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
			break;
	#combo ===================================================================================================
			case 'combo':
				switch($menu)
				{
					case 'tggnc':
					 	switch ($tabel)
						{
							case 'tb_koordinasi':
								$sql 	= "	select * 
											from tb_koordinasi k, tb_peg p, tb_loker l
											where k.id_peg = p.id_peg and k.id_loker = l.id_loker
											order by k.id_koordinasi asc";
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
						}
					break;
					
					case 'tsirkitc':
					 	switch ($tabel)
						{
							case 'tb_backbone':
								$sql 	= "	select * from tb_backbone order by kode asc";
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
							
							case 'tb_backbonex':
								$sql 	= "	select * from tb_backbone 
											where kode 
											like '%$_GET[idx]%' 
											order by kode asc";
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
							
							case 'tb_linka':
								$sql 	= "	select * from tb_linka order by nama asc";
								$kue	= mysql_query($sql);
								$ambil  = array();
								while($ambilR = mysql_fetch_array($kue)){
									$ambil[]=$ambilR;
								}
								
								if($ambil!=NULL){
									echo json_encode($ambil);
								}else{
									echo '{"status":"gagal"}';
								}
							break;
							
							case 'tb_linkb':
								$sql 	= "	select * from tb_linkb order by nama asc";
								$kue	= mysql_query($sql);
								$ambil  = array();
								while($ambilR = mysql_fetch_array($kue)){
									$ambil[]=$ambilR;
								}
								
								if($ambil!=NULL){
									echo json_encode($ambil);
								}else{
									echo '{"status":"gagal"}';
								}
							break;
							
							case 'tb_user':
								$sql 	= "	select * from tb_user order by user asc";
								$kue	= mysql_query($sql);
								$ambil  = array();
								while($ambilR = mysql_fetch_array($kue)){
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
								$kue	= mysql_query($sql);
								$ambil  = array();
								while($ambilR = mysql_fetch_array($kue)){
									$ambil[]=$ambilR;
								}
								
								if($ambil!=NULL){
									echo json_encode($ambil);
								}else{
									echo '{"status":"gagal"}';
								}
							break;			
							
							case 'tb_perangkat_detail':
								/*$sql 	= "	select * from tb_perangkat_detail
											where id_per_detail not in(
												select id_per_detail
												from tb_sirkit 
												group by id_per_detail
												ORDER BY id_per_detail asc
											)
											ORDER BY id_per";*/								
								$sql 	= "	select d.id_per_detail,b.kode,d.id_per
											from 
												tb_perangkat_detail d LEFT JOIN 
												tb_backbone b on b.id_backbone = d.id_backbone
											where 
												d.id_per_detail not in(
													select id_per_detail
													from tb_sirkit 
													group by id_per_detail
													ORDER BY id_per_detail asc
												)";
								//var_dump($sql);exit();
								$kue	= mysql_query($sql);
								$ambil  = array();
								while($ambilR = mysql_fetch_array($kue)){
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
				}
			break;
	#end of combo =====================================================================================================
	
	#cetak =====================================================================================================
			case 'cetak':
				switch($menu){
					case 'mshift':
						$jalan	= mysql_query("select * from tb_shiftkerja where id_shiftkerja = '$_GET[idx]'")
									or die("kueri cetak shift kerja ERROR");
						$cetakR = mysql_fetch_assoc($jalan);
						echo '{"nama_shift":"'.$cetakR['nama_shiftkerja'].'",
								"keterangan":"'.$cetakR['keterangan'].'"}';
						exit();
					break;
				}
			break;
	#end of cetak =====================================================================================================				
	
	#ambil edit =====================================================================================================				
			case 'ambiledit':
				switch($menu)
				{
					case 'tggn':
						$que  = "select *
								from 
									tb_koordinasi k,
									tb_peg p,
									tb_ggn g
								where 
									g.id_koordinasi = k.id_koordinasi and
									k.id_peg = p.id_peg and
									g.id_ggn = '$_GET[idx]'
									";
						//var_dump($que);exit();
						$jalan	= 	mysql_query($que) or die("kueri ambil edit gangguan error");
						$ambilR = 	mysql_fetch_assoc($jalan);
						$tgl	= $ambilR['tgl'];
						$tg		= substr($tgl,8,2);
						$bl		= substr($tgl,5,2);
						$th		= substr($tgl,0,4);
						$tglx	= $bl.'/'.$tg.'/'.$th;
						//var_dump($th);exit();
						
						if($jalan){
							echo '{
								"status":"sukses",
								"sistra":"'.$ambilR['sistra'].'",
								"linkx":"'.$ambilR['linkx'].'",
								"lokasi":"'.$ambilR['lokasi'].'",
								"uraian":"'.$ambilR['uraian'].'",
								"tgl":"'.$tglx.'",
								"jmA":"'.$ambilR['jmA'].'",
								"jmB":"'.$ambilR['jmB'].'",
								"pet":"'.$ambilR['pet'].'",
								"id_koordinasi":"'.$ambilR['id_koordinasi'].'"
							}';
						}else{
							echo '{"status":"gagal"}';
						}
					break;
					
					case 'tsirkit':
						$que  = "SELECT
										bb.kode,
										s.id_per_detail,
										pd.id_per,
										pd.channelida,
										pd.channelidb,
										s.kondisi,
										a.id_linka,
										b.id_linkb,
										s.id_user,
										s.st_a,
										s.st_b,
										s.tc,
										s.ddf_tc,
										s.ddf_user,
										s.tid,
										s.diu,
										s.tie_line,
										s.keterangan,
										s.tgl_update
									FROM
										tb_sirkit s
									INNER JOIN tb_linka a ON s.id_linka = a.id_linka
									INNER JOIN tb_linkb b ON s.id_linkb = b.id_linkb
									INNER JOIN tb_user u ON s.id_user = u.id_user
									INNER JOIN tb_perangkat_detail pd ON s.id_per_detail = pd.id_per_detail
									INNER JOIN tb_backbone bb ON pd.id_backbone = bb.id_backbone
									WHERE
										s.id_sirkit = '$_GET[idx]' " ;
								print_r($que);exit();
						$jalan	= 	mysql_query($que) or die("kueri ambil edit sirkit error");
						$ambilR = 	mysql_fetch_assoc($jalan);
						if($jalan)
						{
							echo '{
								"status":"sukses",
								"kode":"'.$ambilR['kode'].'",
								"id_per_detail":"'.$ambilR['id_per_detail'].'",
								"id_per":"'.$ambilR['id_per'].'",
								"channelida":"'.$ambilR['channelida'].'",
								"channelidb":"'.$ambilR['channelidb'].'",
								"ddf_a":"'.$ambilR['ddf_a'].'",
								"ddf_b":"'.$ambilR['ddf_b'].'",
								"id_linka":"'.$ambilR['id_linka'].'",
								"id_linkb":"'.$ambilR['id_linkb'].'",
								"st_a":"'.$ambilR['st_a'].'",
								"st_b":"'.$ambilR['st_b'].'",
								"id_user":"'.$ambilR['id_user'].'",
								"tid":"'.$ambilR['tid'].'",
								"diu":"'.$ambilR['diu'].'",
								"tc":"'.$ambilR['tc'].'",
								"ddf_tc":"'.$ambilR['ddf_tc'].'",
								"ddf_user":"'.$ambilR['ddf_user'].'",
								"tie_line":"'.$ambilR['tie_line'].'",
								"kondisi":"'.$ambilR['kondisi'].'",
								"keterangan":"'.$ambilR['keterangan'].'"
							}';
						}
						else
						{
							echo '{"status":"gagal"}';
						}
					break;
				}
			break;
 	#end of ambil edit =====================================================================================================

	#tampil =====================================================================================================
			case 'tampil' :
				switch ($menu) 
				{
					case 'tggn':
					#datagrid
						$sqlU = 'select 
									g.sistra,
									g.linkx,
									g.uraian,
									g.lokasi,
									g.tgl,
									g.jmA,
									g.jmB,
									g.pet,
									p.nama,
									g.id_ggn,
									k.id_koordinasi 
								from 
									tb_ggn g, 
									tb_koordinasi k, 
									tb_peg p 
								where 
									g.id_koordinasi = k.id_koordinasi and 
									p.id_peg = k.id_peg ';
						if (isset($_GET['sistra']) and !empty($_GET['sistra'])){
							$sistra= $_GET['sistra'];
							$sql = $sqlU." and g.sistra like '%$sistra%' order by g.sistra desc";
						}else if (isset($_GET['link']) and !empty($_GET['link'])){
							$link= $_GET['link'];
							$sql = $sqlU." and g.linkx like '%$link%' order by g.linkx  desc";
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
						}else {
							$sql = $sqlU.' order by g.id_ggn';
						}
						#end of datagrid
						///var_dump($sql);exit();

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
								if($_SESSION['leveluserMUX']=='admin' or $_SESSION['leveluserMUX']=='user' ){
									$actionBG="<td class='ms'>
									<div class='btn-group1'>
										<a idz='$ggnx[id_ggn]' class='edit btn btn-small' rel='tooltip' data-placement='left' data-original-title=' Edit '>
											<i class='icon-pencil'></i>
										</a> 
										<a href='report/cggn.php?tabelx=tb_ggn&judulx=GANGGUAN&id_ggn=$ggnx[id_ggn]' target='_blank' class='btn btn-small' rel='tooltip' data-placement='top' 
											data-original-title='detail'>
											<i class='icon-eye-open'></i>
										</a> 
										<a  idz='$ggnx[id_ggn]' namaz='$ggnx[nama]'  class='hapus btn btn-small' target='_blank'  
											rel='tooltip' data-placement='bottom' data-original-title='hapus'>
											<i class='icon-remove'></i>
										</a> 
									</div>
									</td>";	
								}else{
									$actionBG="<td class='ms'>
									<div class='btn-group1'>
									<a href='report/cggn.php?tabelx=tb_ggn&judulx=GANGGUAN&id_ggn=$ggnx[id_ggn]' target='_blank' class='btn btn-small' rel='tooltip' data-placement='top' 
											data-original-title='detail'>
											<i class='icon-eye-open'></i>
										</a> 
									</div>
									</td>";	
								}
								$jamA=jam($ggnx['jmA']);
								$jamB=jam($ggnx['jmB']);
								echo"
									<tr id='ggn_$ggnx[id_ggn]'>
										<td class='to_hide_phone'> $ggnx[sistra]</td>
										<td class='to_hide_phone'> $ggnx[linkx]</td>
										<td class='to_hide_phone'> $ggnx[lokasi]</td>
										<td class='to_hide_phone'> $ggnx[uraian]</td>
										<td class='to_hide_phone'>".tgl_indo($ggnx['tgl'])."</td>
										<td class='to_hide_phone'> $jamA</td>
										<td class='to_hide_phone'> $jamB</td>
										<td class='to_hide_phone'> $ggnx[pet]</td>
										<td class='to_hide_phone'> $ggnx[nama]</td>
										$actionBG
									</tr>";
								$nox++;
							}
						}
						#kosong
						else{
							echo "<tr align='center'>
									<td  colspan=10 ><span style='color:yellow;text-align:center;'>
									... data tidak ditemukan ...</span></td></tr>";
						}
						#link paging
						echo "<tr><td colspan=10>".$obj->anchors."</td></tr>";
						echo "<tr><td colspan=10>".$obj->total."</td></tr>";

					break;
					
					case 'tsirkit':
						#datagrid
						$sqlU = "SELECT
									s.id_sirkit,
									s.id_per_detail,
									pd.channelida,
									pd.channelidb,
									pd.ddf_a,
									pd.ddf_b,
									s.kondisi,
									a.nama as linka,
									b.nama as linkb,
									u.user,
									s.st_a,
									s.st_b,
									s.tc,
									s.ddf_tc,
									s.ddf_user,
									s.tid,
									s.diu,
									s.tie_line,
									s.keterangan,
									s.tgl_update

								FROM 
									tb_sirkit s
									INNER JOIN (
										SELECT s.id_per_detail, MAX(tgl_update) AS tanggal
											FROM tb_sirkit s,tb_perangkat_detail pd
											WHERE pd.id_backbone = '$_GET[id_backbonex]' and pd.id_per_detail = s.id_per_detail 
											GROUP BY id_per_detail
											ORDER BY id_per_detail,tgl_update
										)tb_tgl 
									ON 
									(
										s.id_per_detail	= tb_tgl.id_per_detail AND 
										s.tgl_update 	= tb_tgl.tanggal
									)
									INNER JOIN tb_linka a 
										ON s.id_linka = a.id_linka
									INNER JOIN tb_linkb b 
										ON s.id_linkb = b.id_linkb 
									INNER JOIN tb_user u 
										ON s.id_user = u.id_user
									INNER JOIN tb_perangkat_detail pd
										ON s.id_per_detail = pd.id_per_detail
									" ; 
						$sql = $sqlU;
						//var_dump($sqlU);exit();
						
						if (isset($_GET['id_per_detail']) and !empty($_GET['id_per_detail'])){
							$id_per_detail= $_GET['id_per_detail'];
							$sql = $sqlU." where d.id_per_detail like '%$id_per_detail%' order by d.id_per_detail desc";
						}else if (isset($_GET['channelida']) and !empty($_GET['channelida'])){
							$channelida= $_GET['channelida'];
							$sql = $sqlU." where pd.channelida like '%$channelida%' order by pd.channelida desc";
						}else if (isset($_GET['channelidb']) and !empty($_GET['channelidb'])){
							$channelidb= $_GET['channelidb'];
							$sql = $sqlU." where pd.channelidb like '%$channelidb%' order by pd.channelidb desc";
						}else if (isset($_GET['kondisi']) and !empty($_GET['kondisi'])){
							$kondisi= $_GET['kondisi'];
							$sql = $sqlU." where s.kondisi like '%$kondisi%' order by s.kondisi desc";
						}else if (isset($_GET['linka']) and !empty($_GET['linka'])){
							$linka= $_GET['linka'];
							$sql = $sqlU." where a.nama like '%$linka%' order by a.nama desc";
						}else if (isset($_GET['linkb']) and !empty($_GET['linkb'])){
							$linkb= $_GET['linkb'];
							$sql = $sqlU." where b.nama like '%$linkb%' order by b.nama desc";
						}else if (isset($_GET['ddf_a']) and !empty($_GET['ddf_a'])){
							$ddf_a= $_GET['ddf_a'];
							$sql = $sqlU." where pd.ddf_a like '%$ddf_a%' order by pd.ddf_a desc";
						}else if (isset($_GET['ddf_b']) and !empty($_GET['ddf_b'])){
							$ddf_b= $_GET['ddf_b'];
							$sql = $sqlU." where pd.ddf_b like '%$ddf_b%' order by pd.ddf_b desc";
						}else if (isset($_GET['user']) and !empty($_GET['user'])){
							$user= $_GET['user'];
							$sql = $sqlU." where u.user like '%$user%' order by u.user desc";
						}else if (isset($_GET['st_a']) and !empty($_GET['st_a'])){
							$st_a= $_GET['st_a'];
							$sql = $sqlU." where s.st_a like '%$st_a%' order by s.st_a desc";
						}else if (isset($_GET['st_b']) and !empty($_GET['st_b'])){
							$st_b= $_GET['st_b'];
							$sql = $sqlU." where s.st_b like '%$st_b%' order by s.st_b desc";
						}else if (isset($_GET['tc']) and !empty($_GET['tc'])){
							$tc= $_GET['tc'];
							$sql = $sqlU." where s.tc like '%$tc%' order by s.tc  desc";
						}else if (isset($_GET['ddf_tc']) and !empty($_GET['ddf_tc'])){
							$ddf_tc= $_GET['ddf_tc'];
							$sql = $sqlU." where s.ddf_tc like '%$ddf_tc%' order by s.ddf_tc desc";
						}else if (isset($_GET['ddf_user']) and !empty($_GET['ddf_user'])){
							$ddf_user= $_GET['ddf_user'];
							$sql = $sqlU." where s.ddf_user like '%$ddf_user%' order by s.ddf_user desc";
						}else if (isset($_GET['tid']) and !empty($_GET['tid'])){
							$tid= $_GET['tid'];
							$sql = $sqlU." where s.tid like '%$tid%' order by s.tid desc";
						}else if (isset($_GET['diu']) and !empty($_GET['diu'])){
							$diu= $_GET['diu'];
							$sql = $sqlU." where s.diu like '%$diu%' order by s.diu desc";
						}else if (isset($_GET['tie_line']) and !empty($_GET['tie_line'])){
							$tie_line= $_GET['tie_line'];
							$sql = $sqlU." where s.tie_line like '%$tie_line%' order by s.tie_line desc";
						}else if (isset($_GET['kondisi']) and !empty($_GET['kondisi'])){
							$kondisi= $_GET['kondisi'];
							$sql = $sqlU." where s.kondisi like '%$kondisi%' order by s.kondisi desc";
						}
						//var_dump($sql);exit();
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
							while($sirkitx = mysql_fetch_array($result))
							{
								if($_SESSION['leveluserMUX']=='admin' or $_SESSION['leveluserMUX']=='user' ){
									$actionBG ="
									<a idz='$sirkitx[id_sirkit]' class='edit btn btn-small' rel='tooltip' data-placement='left' data-original-title=' Edit '>
										<i class='icon-pencil'></i>
									</a> 
									<a href='report/csirkit2.php?tabelx=tb_sirkit&judulx=sirkit kanal&id_sirkit=$sirkitx[id_sirkit]' target='_blank' class='btn btn-small' rel='tooltip' data-placement='top' data-original-title='detail'>
										<i class='icon-eye-open'></i>
									</a>
									<a  namaz='$sirkitx[id_sirkit]'  idz='$sirkitx[id_per_detail]'  class='hapus btn btn-small' target='_blank'  rel='tooltip' data-placement='bottom' 
										data-original-title='hapus'>
										<i class='icon-remove'></i>
									</a> 
									"; 
									}else{
									$actionBG ="
									<a href='report/csirkit2.php?tabelx=tb_sirkit&judulx=sirkit kanal&id_sirkit=$sirkitx[id_sirkit]' target='_blank'class='btn btn-small' rel='tooltip' data-placement='top' 
										data-original-title='detail'>
										<i class='icon-eye-open'></i>
									</a>"; 
								}
								
								
								echo"
									<tr id='sirkit_$sirkitx[id_sirkit]'>
										<td class='to_hide_phone'> $sirkitx[id_per_detail]</td>
										<td class='to_hide_phone'> $sirkitx[channelida]</td>
										<td class='to_hide_phone'> $sirkitx[channelidb]</td>
										<td class='to_hide_phone'> $sirkitx[linka]</td>
										<td class='to_hide_phone'> $sirkitx[linkb]</td>
										<td class='to_hide_phone'> $sirkitx[ddf_a]</td>
										<td class='to_hide_phone'> $sirkitx[ddf_b]</td>
										<td class='to_hide_phone'> $sirkitx[st_a]</td>
										<td class='to_hide_phone'> $sirkitx[st_b]</td>
										<td class='to_hide_phone'> $sirkitx[user]</td>
										<td class='to_hide_phone'> $sirkitx[tid]</td>
										<td class='to_hide_phone'> $sirkitx[diu]</td>
										<td class='to_hide_phone'> $sirkitx[tc]</td>
										<td class='to_hide_phone'> $sirkitx[ddf_tc]</td>
										<td class='to_hide_phone'> $sirkitx[ddf_user]</td>
										<td class='to_hide_phone'> $sirkitx[tie_line]</td>
										<td class='to_hide_phone'> $sirkitx[kondisi]</td>
										<td class='to_hide_phone'> $sirkitx[keterangan]</td>
														
										<td class='ms'>
											<div class='btn-group1'>$actionBG</div>
										</td>
									</tr>";
								$nox++;
							}
						}
						#kosong
						else{
							echo "<tr align='center'>
									<td  colspan=20><span style='color:yellow;text-align:center;'>
									... data tidak ditemukan ...</span></td></tr>";
						}
						#link paging
						echo "<tr><td colspan=20>".$obj->anchors."</td></tr>";
						echo "<tr><td colspan=20>".$obj->total."</td></tr>";
					break;
					
				}
			break;
		#end of tampil====================================================================================			
		
		#tambah===========================================================================================			
			case 'tambah' :
				switch($menu)
				{
					case 'tggn':
						$tgl= $_POST['tglTB'];
						$tg	= substr($tgl,3,2);
						$bl	= substr($tgl,0,2);
						$th	= substr($tgl,6,4);
						$tglx = $th.'-'.$bl.'-'.$tg;
						//var_dump($tglx);exit();
						$que		= "insert into tb_ggn set 	sistra	='$_POST[sistraTB]', 
										linkx	='$_POST[linkxTB]', 
										lokasi	='$_POST[lokasiTB]', 
										uraian	='$_POST[uraianTB]',
										tgl		='$tglx',
										jmA		='$_POST[jmATB]',
										jmB		='$_POST[jmBTB]',
										pet		='$_POST[petTB]',
										id_koordinasi='$_POST[id_koordinasiTB]'
										";
						//var_dump($que);exit();
						$simpanQ	= mysql_query($que);//or die('eror sql');
						$idx		= mysql_insert_id();
						if($simpanQ)
						{
							echo'{
									"status":"sukses",
									"id":"'.$idx.'",
									"lokasi":"'.$_POST['lokasiTB'].'"
							}';
						}else{
							echo'{
									"status":"gagal"
							}';
						}
					break;
					
					case 'tsirkit':
						if(isset($_GET['idx'])){  //edit
							$id_per_detail = $_POST['id_per_detailH'];
						}else{ //add
							$id_per_detail = $_POST['id_per_detailTB'];
						}
						$que	= "insert into tb_sirkit set	
									id_per_detail 	='$id_per_detail', 
									kondisi			='$_POST[kondisiTB]',
									id_linka		='$_POST[id_linkaTB]',
									id_linkb		='$_POST[id_linkbTB]',
									id_user			='$_POST[id_userTB]',
									st_a			='$_POST[st_aTB]',
									st_b			='$_POST[st_bTB]',
									tc				='$_POST[tcTB]',
									ddf_tc			='$_POST[ddf_tcTB]',
									ddf_user		='$_POST[ddf_userTB]',
									tid				='$_POST[tidTB]',
									diu				='$_POST[diuTB]',
									tie_line		='$_POST[tie_lineTB]',
									keterangan		='$_POST[keteranganTB]',
									tgl_update		=NOW()
									";
						//var_dump($que);exit();
						$simpanQ	= mysql_query($que);//or die('eror sql');
						//$idx		= mysql_insert_id();
						if($simpanQ){
							echo'{
									"status":"sukses",
									"id_per_detail":"'.$_POST['id_per_detailTB'].'",
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
		#end of tambah===========================================================================================			
		
		#ubah===========================================================================================			
			case 'ubah' :
				switch ($menu){
					case 'tggn':
						$tgl= $_POST['tglTB'];
						$tg	= substr($tgl,3,2);
						$bl	= substr($tgl,0,2);
						$th	= substr($tgl,6,4);
						$tglx = $th.'-'.$bl.'-'.$tg;
						
						$sql	= "update tb_ggn set 	sistra			= '$_POST[sistraTB]',
														linkx			= '$_POST[linkxTB]',
														lokasi			= '$_POST[lokasiTB]',
														uraian			= '$_POST[uraianTB]',
														tgl				= '$tglx',
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
				}
			break;
		#end of ubah===========================================================================================			
		
		#hapus===========================================================================================			
		case 'hapus' :
			switch($menu)
			{
				case 'tsirkit':
					//$kue 		= "select * from tb_sirkit where id_per_detail ='$_GET[idperdet]'";
					//$terhapusQ	= mysql_fetch_assoc(mysql_query($kue));
					$kue2		= "delete from tb_sirkit where id_per_detail = '$_GET[idperdet]'";
					//var_dump($kue2);
					$hapusQ		= mysql_query($kue2);
					
					if($hapusQ){
						echo '{
								"status":"sukses",
								"idperdet":"'.$_GET['idperdet'].'"
							}';
					}else{
						echo '{"status":"gagal","id":"'.$_GET['idperdet'].'"}';						
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
				
			}	
		break;
		#end of hapus===========================================================================================			
		
		#kosongkan===========================================================================================			
		case 'hapussemua' :
			switch($menu){
				case 'tggn':
					$hapusQ=mysql_query("truncate tb_ggn")or die("gagal mengosongkan tb_ggn");
					if($hapusQ){
						echo '{"status":"sukses"}';
					}else{
						echo '{"status":"gagal"}';						
					}
				break;
				case 'tsirkit':
					$hapusQ=mysql_query("truncate tb_sirkit")or die("gagal mengosongkan tb_sirkit");
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
	