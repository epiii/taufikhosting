<?php 
session_start();
error_reporting(0);
include "timeout.php";
include"lib/fungsi_indotgl.php";
include "lib/koneks.php";
if($_SESSION[login]==1){
	if(!cek_login()){
		$_SESSION[login] = 0;
	}
}
if($_SESSION[login]==0){
	echo "<script>alert('maaf waktu habis silahkan login lagi');window.close();</script>";
}
else{
	if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
		echo "<script>window.location='default.php'</script>";
	}else{
		if($_GET['bulan'] and $_GET['tahun'] and $_GET['ruwet']){
			$blnx= array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");		
			
			$bulany = $_GET['bulan']; 
			$tahuny	= $_GET['tahun']; 
			$ruwet	= base64_encode($bulany.'ruwet'.$tahuny);
			if($_GET['ruwet']==$ruwet){
				
				$sqlx		= "select * from  tb_safetyp ";
				$kriteriax	= " tahun = '$tahuny' and bulan='$bulany'";
				
				//jam kerja aman ==================================================================================
				#bulanan
				$hasiljka 	= mysql_fetch_assoc(mysql_query($sqlx.' where '.$kriteriax));
				$jka		= $hasiljka['jam_normal'] + $hasiljka['jam_lembur'] - $hasiljka['jam_absen'];
				
				#tahunan
				$sqljka2	= "SELECT sum( jam_normal + jam_lembur - jam_absen ) AS jka2
								FROM tb_safetyp
								WHERE bulan
									BETWEEN 1
									AND '$bulany'
								AND tahun
									BETWEEN 0
									AND '$tahuny'";
				#var_dump($sqljka2);
				$kuejka2	= mysql_query($sqljka2);
				$hasiljka2	= mysql_fetch_assoc($kuejka2);
				$jka2		= $hasiljka2['jka2'];
				
				//UAC ================================================================================================
				#bulanan
				$hasiluac	= mysql_fetch_assoc(mysql_query($sqlx.' where '.$kriteriax));
				$uac		= $hasiluac['uac'];
				
				#tahunan 
				$sqluac2	= "SELECT sum(uac) AS uac2
								FROM tb_safetyp
								WHERE bulan
									BETWEEN 1
									AND '$bulany'
								AND tahun
									BETWEEN 0
									AND '$tahuny'";
				$kueuac2	= mysql_query($sqluac2);
				$hasiluac2	= mysql_fetch_assoc($kueuac2);
				$uac2		= $hasiluac2['uac2'];
				
				//near miss ===============================================================================
				#bulanan
				$hasilnearm	= mysql_fetch_assoc(mysql_query($sqlx.' where '.$kriteriax));
				$nearm		= $hasilnearm['near_miss'];
				
				#tahunan 
				$sqlnearm2	= "	SELECT sum(near_miss) AS near_miss2
								FROM tb_safetyp
								WHERE bulan
									BETWEEN 1
									AND '$bulany'
								AND tahun
									BETWEEN 0
									AND '$tahuny'";
				#var_dump($sqlnearm2);
				$kuenearm2	= mysql_query($sqlnearm2);
				$hasilnearm2= mysql_fetch_assoc($kuenearm2);
				$nearm2		= $hasilnearm2['near_miss2'];
				
				
				//firt aid ================================================================
				#bulanan
				$sqlfirst	= "	select *  
								from tb_kecelakaan kc 
									left join tb_subjkecel2 sk on sk.id_subjkecel2 = kc.id_subjkecel2
								where 
									month(tgl_kejadian) = '$bulany' and 
									year(tgl_kejadian)  = '$tahuny' and
									kc.id_subjkecel2 	= sk.id_subjkecel2 and
									sk.nama_subjkecel2 	= 'FAI'";
				$kuefirst	= mysql_query($sqlfirst);
				$jumfirst	= mysql_num_rows($kuefirst);
				
				#tahunan 
				$sqlfirst2	= "	SELECT 
									count( * ) AS first2
								FROM 
									tb_kecelakaan kc
										LEFT JOIN tb_subjkecel2 sk ON sk.id_subjkecel2 = kc.id_subjkecel2
								WHERE 
									kc.id_subjkecel2 = sk.id_subjkecel2 AND 
									sk.nama_subjkecel2 = 'FAI' AND 
									month( tgl_kejadian )
										BETWEEN 1 AND '$bulany' AND 
									year( tgl_kejadian ) 
										BETWEEN 0 AND '$tahuny'
								";
				#var_dump($sqlfirst2);
				$kuefirst2	= mysql_query($sqlfirst2);
				$hasilfirst2= mysql_fetch_assoc($kuefirst2);
				$first2		= $hasilfirst2['first2'];
				
				//medical treatment ================================================================
				#bulanan
				$sqlmedic	= "	select *  
								from tb_kecelakaan kc 
									left join tb_subjkecel2 sk on sk.id_subjkecel2 = kc.id_subjkecel2
								where 
									month(tgl_kejadian) = '$bulany' and 
									year(tgl_kejadian)  = '$tahuny' and
									kc.id_subjkecel2 	= sk.id_subjkecel2 and
									sk.nama_subjkecel2 	= 'MTI'
									";
				$kuemedic	= mysql_query($sqlmedic);
				$jummedic	= mysql_num_rows($kuemedic);
				
				#tahunan 
				$sqlmedic2	= "	SELECT 
									count( * ) AS medic2
								FROM 
									tb_kecelakaan kc
										LEFT JOIN tb_subjkecel2 sk ON sk.id_subjkecel2 = kc.id_subjkecel2
								WHERE 
									kc.id_subjkecel2 = sk.id_subjkecel2 AND 
									sk.nama_subjkecel2 = 'MTI' AND 
									month( tgl_kejadian )
										BETWEEN 1 AND '$bulany' AND 
									year( tgl_kejadian ) 
										BETWEEN 0 AND '$tahuny'
								";
				#var_dump($sqlmedic2);
				$kuemedic2	= mysql_query($sqlmedic2);
				$hasilmedic2= mysql_fetch_assoc($kuemedic2);
				$medic2		= $hasilmedic2['medic2'];
				
				//fatality
				#bulanan
				$hasilfatal	= mysql_fetch_assoc(mysql_query($sqlx.' where '.$kriteriax));
				$fatal		= $hasilfatal['fatality'];
				
				#tahunan 
				$sqlfatal2	= "	SELECT sum(fatality) AS fatality2
								FROM tb_safetyp
								WHERE bulan
									BETWEEN 1
									AND '$bulany'
								AND tahun
									BETWEEN 0
									AND '$tahuny'";
				#var_dump($sqlfatal2);
				$kuefatal2	= mysql_query($sqlfatal2);
				$hasilfatal2= mysql_fetch_assoc($kuefatal2);
				$fatal2		= $hasilfatal2['fatality2'];
				
				//ldwc =========================================
				#bulanan
				$hasilldwc	= mysql_fetch_assoc(mysql_query($sqlx.' where '.$kriteriax));
				$ldwc		= $hasilldwc['ldwc'];
				
				#tahunan 
				$sqlldwc2	= "	SELECT sum(ldwc) AS ldwc2
								FROM tb_safetyp
								WHERE bulan
									BETWEEN 1
									AND '$bulany'
								AND tahun
									BETWEEN 0
									AND '$tahuny'";
				#var_dump($sqlldwc2);
				$kueldwc2	= mysql_query($sqlldwc2);
				$hasilldwc2	= mysql_fetch_assoc($kueldwc2);
				$ldwc2		= $hasilldwc2['ldwc2'];
				
				//ldwc =========================================
				#bulanan
				$hasilldwc	= mysql_fetch_assoc(mysql_query($sqlx.' where '.$kriteriax));
				$ldwc		= $hasilldwc['ldwc'];
				
				#tahunan 
				$sqlldwc2	= "	SELECT sum(ldwc) AS ldwc2
								FROM tb_safetyp
								WHERE bulan
									BETWEEN 1
									AND '$bulany'
								AND tahun
									BETWEEN 0
									AND '$tahuny'";
				#var_dump($sqlldwc2);
				$kueldwc2	= mysql_query($sqlldwc2);
				$hasilldwc2	= mysql_fetch_assoc($kueldwc2);
				$ldwc2		= $hasilldwc2['ldwc2'];
				
				//lost time injury
				#bulanan 
				$sqllti		= "	select *  
								from tb_kecelakaan kc 
									left join tb_subjkecel2 sk on sk.id_subjkecel2 = kc.id_subjkecel2
								where 
									month(tgl_kejadian) = '$bulany' and 
									year(tgl_kejadian)  = '$tahuny' and
									kc.id_subjkecel2 	= sk.id_subjkecel2 and
									sk.nama_subjkecel2 	= 'LTI'
									";
				$kuelti		= mysql_query($sqllti);
				$jumlti		= mysql_num_rows($kuelti);
				
				#tahunan
				$sqllti2	= "	SELECT 
									count( * ) AS lost2
								FROM 
									tb_kecelakaan kc
										LEFT JOIN tb_subjkecel2 sk ON sk.id_subjkecel2 = kc.id_subjkecel2
								WHERE 
									kc.id_subjkecel2 = sk.id_subjkecel2 AND 
									sk.nama_subjkecel2 = 'LTI' AND 
									month( tgl_kejadian )
										BETWEEN 1 AND '$bulany' AND 
									year( tgl_kejadian ) 
										BETWEEN 0 AND '$tahuny'";
				#var_dump($sqllti2);
				$kuelti2	= mysql_query($sqllti2);
				$hasillti2	= mysql_fetch_assoc($kuelti2);
				$lti2		= $hasillti2['lost2'];
				
				//restrict work injury
				#bulanan
				$sqlrwi	= "	select *  
								from tb_kecelakaan kc 
									left join tb_subjkecel2 sk on sk.id_subjkecel2 = kc.id_subjkecel2
								where 
									month(tgl_kejadian) = '$bulany' and 
									year(tgl_kejadian)  = '$tahuny' and
									kc.id_subjkecel2 	= sk.id_subjkecel2 and
									sk.nama_subjkecel2 	= 'RWI'
									";
				$kuerwi	= mysql_query($sqlrwi);
				$jumrwi	= mysql_num_rows($kuerwi);
				
				#tahunan
				$sqlrwi2	= "	SELECT 
									count( * ) AS rest2
								FROM 
									tb_kecelakaan kc
										LEFT JOIN tb_subjkecel2 sk ON sk.id_subjkecel2 = kc.id_subjkecel2
								WHERE 
									kc.id_subjkecel2 = sk.id_subjkecel2 AND 
									sk.nama_subjkecel2 = 'RWI' AND 
									month( tgl_kejadian )
										BETWEEN 1 AND '$bulany' AND 
									year( tgl_kejadian ) 
										BETWEEN 0 AND '$tahuny'";
				#var_dump($sqlrwi2);
				$kuerwi2	= mysql_query($sqlrwi2);
				$hasilrwi2	= mysql_fetch_assoc($kuerwi2);
				$rwi2		= $hasilrwi2['rest2'];
				
				//TRI ===============================================================
				#bulanan
				$jumtri		= $jumrwi + $jummedic + $jumfirst + fatal ;
				#tahunan
				$jumtri2	= $rwi2 + $medic2 + $first2 + fatal2;
				
				//TRIFR ==============================================================	
				#bulanan
				$trifr		= round( (($jumtri * 1000000)/$jka),2);
				#tahunan
				$trifr2		= round( (($jumtri2 * 1000000)/$jka),2);
				
				//FFR ================================================================
				#bulanan
				$ffr		= round( (($fatal * 1000000)/$jka),2);
				#tahunan 
				$ffr2		= round( (($fatal2 * 1000000)/$jka),2);
				
				
				//LTIFR
				#bulanan
				$ltifr		= round( (($jumlti * 1000000)/$jka),2);
				#tahunan
				$ltifr2		= round( (($jumlti2 * 1000000)/$jka2),2);
				
				//FR
				$fr			= round( (($jumfr * 1000000)/$jka),2);
				#tahunan
				$fr2		= round( (($jumfr2 * 1000000)/$jka2),2);
				
				//SR
				$sr			= round( (($jumsr * 1000000)/$jka),2);
				#tahunan
				$sr2		= round( (($jumsr2 * 1000000)/$jka2),2);
				
/*			$sqljka2	= "	select sum(jam_normal+jam_lembur-jam_absen) as jka2 from tb_jamkerja 
						where bulan between 1 and '$bulany' and tahun='$tahuny'";
			$hasiljka2 = mysql_fetch_assoc(mysql_query($sqljka2));
			$jka2		 = $hasiljka2['jka2'];
			#komulatif
			$sqljka3	= "	SELECT sum( jam_normal + jam_lembur - jam_absen ) AS jka3
						FROM tb_jamkerja
						WHERE bulan
							BETWEEN 1
							AND '$bulany'
						AND tahun
							BETWEEN 0
							AND '$tahuny'";
			$hasiljka3 = mysql_fetch_assoc(mysql_query($sqljka3));
			$jka3		 = $hasiljka3['jka3'] ;
			
			//UAC ================================================================================================
			#bulanan
			$sqluac	= "select * from tb_kecelakaan kc, tb_jkecel jk where jk.id_jkecel = kc.id_jkecel and ";
			$hasiljka = mysql_fetch_assoc(mysql_query($sqluac));
			$jka		= $hasiljka['jam_normal'] + $hasiljka['jam_lembur'] - $hasiljka['jam_absen'];
			#tahunan
			$sqluac2	= "	select sum(jam_normal+jam_lembur-jam_absen) as jka2 from tb_jamkerja 
						where bulan between 1 and '$bulany' and tahun='$tahuny'";
			$hasiljka2 = mysql_fetch_assoc(mysql_query($sqluac2));
			$jka2		 = $hasiljka2['jka2'];
			#komulatif
			$sqluac3	= "	SELECT sum( jam_normal + jam_lembur - jam_absen ) AS jka3
						FROM tb_jamkerja
						WHERE bulan
							BETWEEN 1
							AND '$bulany'
						AND tahun
							BETWEEN 0
							AND '$tahuny'";
			$hasiljka3 = mysql_fetch_assoc(mysql_query($sqluac3));
			$jka3		 = $hasiljka3['jka3'] ;
			
			
			//FR
			#buanan
			$sqlfr	= "	select count(*)jumk
						from tb_kecelakaan 
						where 	month(tgl_kejadian) ='$bulany' and 
								year(tgl_kejadian)='$tahuny'";
			$kuefr		= mysql_query($sqlfr);
			$hasilfr	= mysql_fetch_assoc($kuefr);
			$totkecel 	= $hasilfr['jumk'];
			//$jumpx		= mysql_fetch_assoc(mysql_query('select count(*) as jump from tb_pekerja'));
			$jumpx		= mysql_fetch_assoc(mysql_query('select as jump from tb_safetyp'));
			$jump		= $jumpx['jump'];
			$frx	= ($totkecel*1000000)/$jump;
			#tahunan
			
			//LTIF
			#bualan
			$sqlltif = "select count(*)as jumltif 
						from 	tb_kecelakaan kc,
								tb_jkecel jk
						where 
							jk.sub_jeniskecel='LTI' and
							jk.id_jkecel = kc.id_jkecel and
							month(tgl_kejadian) ='$bulany' and 
							year(tgl_kejadian)='$tahuny'
						";
			$kueltif	= mysql_query($sqlltif);
			$hasilltif	= mysql_fetch_assoc($kueltif);
			$jumltif	= $hasilltif['jumltif'];
			$ltifx  = ($jumltif*1000000)/$jump; // jumpekerja : 3437
			
			//MTI
			#bulanan
			$sqlMTI= "select count(*)as jummti
						from 	tb_kecelakaan kc,
								tb_jkecel jk
						where 
							jk.sub_jeniskecel='MTI' and
							jk.id_jkecel = kc.id_jkecel and
							month(tgl_kejadian) ='$bulany' and 
							year(tgl_kejadian)='$tahuny'
						";
			$kueMTI= mysql_query($sqlMTI);
			$hasilMTI= mysql_fetch_assoc($kuemti);
			$jumlMTI= $hasilMTI['jumltif'];
			$MTIx= ($jumMTI*1000000)/$jump; // jumpekerja : 3437
			
			//FAI
			#bulanan
			$sqlFAI= "select count(*)as jummti
						from 	tb_kecelakaan kc,
								tb_jkecel jk
						where 
							jk.sub_jeniskecel='FAI' and
							jk.id_jkecel = kc.id_jkecel and
							month(tgl_kejadian) ='$bulany' and 
							year(tgl_kejadian)='$tahuny'
						";
			$kueFAI= mysql_query($sqlFAI);
			$hasilFAI= mysql_fetch_assoc($kuemti);
			$jumlFAI= $hasilFAI['jumltif'];
			$FAIx= ($jumMTI*1000000)/$jump; // jumpekerja : 3437
			
			//FFR
			#bulanan
			$sqlFFR= "	select fatality as jumffr 
						from 	tb_safetyp 
						where 
							bulan ='$bulany' and 
							tahun='$tahuny'
						";
						#var_dump($sqlFFR);exit();
			$kueFFR= mysql_query($sqlFFR);
			$hasilFFR= mysql_fetch_assoc($kueFFR);
			$jumlFFR= $hasilFFR['jumffr'];
			$FFRx= ($jumlFFR*1000000)/$jka; // jumpekerja : 3437
			#var_dump($jka);exit();
			
	*/		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
	*{
		text-transform:capitalize;
		font: Tahoma, Geneva, sans-serif;
		font-size:14px; 
		color: #000;
	}
	.target{
		text-align:right;
	}
	th{
		background: #D4D4D4;}
	.oranye{
		background:#FC0;
		text-align:right;
	}
	.kuning{
		background:#FF0;
		text-align:right;
	}
	.kuningjudul{
		background:#FF0;
		text-align: left;
	}
	.biru{
		background:#6CF;
		
		text-align:right;}
	#konten{
		width: 800px;
		margin: 0 auto;
		padding:0;
	}
	.fieldx{
		color:#000;
		list-style:none;
	}
	.info{
		margin:0;
		padding:0;
		color:#F00;
		background:#FFF;
		float:left;
	}
	.info th {
		text-transform:uppercase;
		text-align:left;
		font-weight:bold;
		background:none;
		padding:0;
		margin:0;}
	.info td{
		margin:0;
		padding:0;
		text-align:left;
		text-transform:none;}
	
	.isi{
		color:#009;
		list-style:none;
	
	}
	.terpilih{
		background:#999;}
	.subket{
		font-size: 12px;
		padding:0 0 0 2px;
	}
	.subbab{
		font-weight:bold;
		text-transform:uppercase;
	}
	.subbab2{
		font-weight:bold;
		text-transform: capitalize;
	}
	.subbab3{
		padding-left:25px;
		font-weight:bold;
		text-transform: capitalize;
	}
	table{
		background: #A0A0A0;
		
	}
	table tr{
		background:#FFF;
	}
	table tr td{
		padding:5px 10px 5px 10px;
	}
	#headery {
		text-transform:uppercase;
		font:"Arial Black", Gadget, sans-serif;
		font-size:18px;
		font-weight:bold;
		
	}
</style>
</head>

<body>
<center>
<div id="konten">
<table class="info">
   <tr>
     <th colspan="2">safety &amp; fire performance</th>
   </tr>
   <tr>
     <td>Perusahaan</td>
     <td>: PT Petrokimia Gresik</td>
   </tr>
   <tr>
     <td>Bulan</td>
     <td>: <?php 
				#echo $bulany;
				#echo $tahuny;
				//echo $blnx;
				echo $blnx[$bulany-1].' '. $tahuny; 
			?></td>
   </tr>
</table>

<p><br />
  <br />
</p>
<p>&nbsp;</p>
<table width="800"  >
  <tr>
    <th rowspan="3">no</th>
    <th rowspan="3">safety performance</th>
    <th colspan="4">kejadian</th>
    </tr>
  <tr>
    <th colspan="2">bulanan</th>
    <th colspan="2">tahunan</th> 
    </tr>
  <tr>
    <th>target</th>
    <th>realisasi</th>
    <th>target</th>
    <th>realisasi</td>  </tr>
 <tr>
    <td>1</td>
    <td>jam kerja aman</td>
    <td class="target">600,000</td>
    <td class="oranye"><?php echo $jka; ?></td>
    <td class="target">7,200,000</td>
    <td class="oranye"><?php echo $jka2;?></td>
    </tr>
    
   <tr>
    <td>2</td>
    <td>UAC</td>
    <td class="target">150</td>
    <td class="oranye"><?php echo $uac;?></td>
    <td class="target">3,600</td>
    <td class="oranye"><?php echo $uac2;?></td>
    </tr>
   <tr>
    <td>3</td>
    <td>near miss</td>
    <td class="target">1</td>
    <td class="oranye"><?php echo $nearm;?></td>
    <td class="target">250</td>
    <td class="oranye"><?php echo $nearm2;?></td>
    </tr>
   <tr>
    <td>4</td>
    <td>first aid</td>
    <td class="target">0</td>
    <td class="oranye"><?php echo $jumfirst;?></td>
    <td class="target">30</td>
    <td class="oranye"><?php echo $first2; ?></td>
    </tr>
   <tr>
    <td>5</td>
    <td>Medical treatment</td>
    <td class="target">0</td>
    <td class="oranye"><?php echo $jummedic;?></td>
    <td class="target">0</td>
    <td class="oranye"><?php echo $medic2;?></td>
    </tr>
   <tr>
     <td>6</td>
     <td>fatality</td>
     <td class="target">0</td>
     <td class="oranye"><?php echo $fatal;?></td>
     <td class="target">0</td>
     <td class="oranye"><?php echo $fatal2; ?></td>
   </tr>
   <tr>
     <td>7</td>
     <td>lost day work case</td>
     <td class="target">0</td>
     <td class="oranye"><?php echo $ldwc;?></td>
     <td class="target">0</td>
     <td class="oranye"><?php echo $ldwc2; ?></td>
   </tr>
     <td>8</td>
     <td>Lost Time Injury</td>
     <td class="target">0</td>
     <td class="oranye"><?php echo $jumlti;?></td>
     <td class="target">10</td>
     <td class="oranye"><?php echo $lti2;?></td>
   </tr>
     <td>9</td>
     <td>restricted Work Injury</td>
     <td class="target">0</td>
     <td class="oranye"><?php echo $jumrwi;?></td>
     <td class="target">10</td>
     <td class="oranye"><?php echo $rwi2?></td>
   </tr>
 <tr>
   <td>10</td>
   <td>TRI -</td>
   <td class="target">0</td>
   <td class="oranye"><?php echo $jumtri;?></td>
   <td class="target">0</td>
   <td class="oranye"><?php echo $jumtri2;?></td>
 </tr>
 <tr>
   <td>11</td>
   <td>TRIFR -</td>
   <td class="target">0</td>
   <td class="oranye"><?php echo $trifr;?></td>
   <td class="target">0</td>
   <td class="oranye"><?php echo  $trifr2;?></td>
 </tr>
 <tr>
    <td>12</td>
    <td>FFR -</td>
    <td class="target">0</td>
    <td class="oranye"><?php echo $ffr;?></td>
    <td class="target">0</td>
    <td class="oranye"><?php echo $ffr2;?></td>
    </tr>
 <tr>
    <td>13</td>
    <td>LTIFR -</td>
    <td class="target">0</td>
    <td class="oranye"><?php echo $ltifr;?></td>
    <td class="target">0</td>
    <td class="oranye"><?php echo $ltifr2;?></td>
    </tr>
  <tr>
    <td class="kuningjudul">14</td>
    <td class="kuningjudul">FR *)</td>
    <td class="kuning">1.5</td>
    <td class="kuning"><?php echo $fr;?></td>
    <td class="kuning">1.5</td>
    <td class="kuning"><?php echo $fr2;?></td>
    </tr> 
   <tr>
    <td class="kuningjudul">15</td>
    <td class="kuningjudul">SR *)</td>
    <td class="kuning">1.5</td>
    <td class="kuning"><?php echo $sr;?></td>
    <td class="kuning">1.5</td>
    <td class="kuning"><?php echo $sr2;?></td>
    </tr>
</table>
<br />
<!--<table class="info">
  <tr>
    <td>Note </td>
    <td colspan="2">: Data ilaporkan setiap bulan</td>
    </tr>
  <tr>
    <td>Note<br /></td>
    <td colspan="2"> : UAC adalah pelaporan terhadap kondisi tdak aaman dan kondisi perilaku tidak </td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>TRIR <br /></td>
    <td>: (Total Recordable * 1000000)/ Total Man-Hours</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>LTIF</td>
    <td>: (Total LTI * 1000000) / Total Man-Hours</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Total LTI </td>
    <td>: Fataliti + Lost Day Case </td>
  </tr>
</table>
--><p><br />
  <br />
  <br />
  <br />
  <br />
</p>
</div>
</center>

</body>
</html>
<?php 
			}
			else{
				echo "<script>alert('maaf url tidak sesuai, dilarang merubah url');window.close();</script>";
			}
		}
		else
		{
				echo "<script>alert('maaf url tidak sesuai, dilarang merubah url');window.close();</script>";
		}
	}
}	
?>