<?php 
	session_start();
	error_reporting(0);
	include "../lib/timeout.php";
	require_once("../lib/fpdf17/fpdf.php");
	require_once("../lib/koneks.php");

	#add ================================================================
	if($_SESSION['loginMUX']==1)
	{
		if(!cek_login())
		{
			$_SESSION['loginMUX'] = 0;
		}
	}
	//var_dump($_SESSION['loginMUX']);exit();
	if($_SESSION['loginMUX']==0) //jika sesi login 0
	{
		echo "<script>alert('maaf waktu habis silahkan login lagi');window.close();</script>";
	}
	else //jika sesi login 1 
	{
		//jika sesi username &  passuser = kosong , sesi login = 0
		if (empty($_SESSION['namauserMUX']) AND empty($_SESSION['passuserMUX']) AND $_SESSION['loginMUX']==0)
		{
			echo "<script>window.location='default.php'</script>";
		}
		//jika sesi username &  passuser = ada , sesi login = 1
		else
		{
			//jika get bulan , tahun, ruwet
			if($_GET['bulan'] and $_GET['tahun'] and $_GET['ruwet'])
			{
				//echo 'halo';
				$blnx= array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");		
				
				$tabel = $_GET['tabelx'];
				$bulan	= $_GET['bulan'];
				//var_dump($bulan);exit();				
				$bul	= $blnx[$bulan-1];
				$tahun	= $_GET['tahun']; 
				$ruwet	= base64_encode($bulan.'dapot'.$tahun);
				if($_GET['ruwet']==$ruwet)
				{
//end of conditional of epi -------------
		
		$query 	= "SELECT
						b.id_backbone,
						SUBSTRING_INDEX(kode,' ',-1)  as linkbnew,	
						st.sistra,
						b.avail2mbps,
						(30 * b.avail2mbps) AS availkanal,
						b.availstm1,
						b.availstm4,
						b.availstm16,
						b.availstm64,
						tbsljj2.usedsljj,
						tbmea2.usedmea,
						tbflexi2.usedflexi,
						tbspeedy2.usedspeedy,
						tbolo2.usedolo,
						tbmm2.usedmm,
						tblc2.usedlc,
						tblain2.usedlain,
						tb2mbps2.used2mbps,
						(
							avail2mbps - tb2mbps2.used2mbps
						) AS free2mbps,
						(
							30 * (
								avail2mbps - tb2mbps2.used2mbps
							)
						) AS freekanal,
						tbkondrusak2.jumrusak
					FROM
						tb_backbone b
					LEFT JOIN (
						SELECT
							tb2mbps.id_backbone,
							count(*) used2mbps
						FROM
							(
								SELECT
									s.id_per_detail,
									pd.id_backbone,
									MAX(tgl_update) AS tanggal
								FROM
									tb_sirkit s,
									tb_perangkat_detail pd
								WHERE
									YEAR (s.tgl_update) <= '$tahun'
								AND MONTH (s.tgl_update) <= '$bulan'
								AND pd.id_per_detail = s.id_per_detail
								GROUP BY
									id_per_detail
								ORDER BY
									tgl_update DESC
							) tb2mbps
						GROUP BY
							tb2mbps.id_backbone
					) tb2mbps2 ON tb2mbps2.id_backbone = b.id_backbone
					LEFT JOIN (
						SELECT
							tbspeedy.id_backbone,
							count(*) usedspeedy
						FROM
							(
								SELECT
									s.id_per_detail,
									pd.id_backbone,
									MAX(tgl_update) AS tanggal
								FROM
									tb_sirkit s,
									tb_perangkat_detail pd
								WHERE
									YEAR (s.tgl_update) <= $tahun
								AND MONTH (s.tgl_update) <=$bulan
								AND s.id_user = (
									SELECT
										id_user
									FROM
										tb_user
									WHERE
										USER = 'speedy'
								)
								AND pd.id_per_detail = s.id_per_detail
								GROUP BY
									id_per_detail
								ORDER BY
									tgl_update DESC
							) tbspeedy
						GROUP BY
							tbspeedy.id_backbone
					) tbspeedy2 ON tbspeedy2.id_backbone = b.id_backbone
					LEFT JOIN (
						SELECT
							tbsljj.id_backbone,
							count(*) usedsljj
						FROM
							(
								SELECT
									s.id_per_detail,
									pd.id_backbone,
									MAX(tgl_update) AS tanggal
								FROM
									tb_sirkit s,
									tb_perangkat_detail pd
								WHERE
									YEAR (s.tgl_update) <= $tahun
								AND MONTH (s.tgl_update) <=$bulan
								AND s.id_user = (
									SELECT
										id_user
									FROM
										tb_user
									WHERE
										USER = 'sljj'
								)
								AND pd.id_per_detail = s.id_per_detail
								GROUP BY
									id_per_detail
								ORDER BY
									tgl_update DESC
							) tbsljj
						GROUP BY
							tbsljj.id_backbone
					) tbsljj2 ON tbsljj2.id_backbone = b.id_backbone
					LEFT JOIN (
						SELECT
							tbflexi.id_backbone,
							count(*) usedflexi
						FROM
							(
								SELECT
									s.id_per_detail,
									pd.id_backbone,
									MAX(tgl_update) AS tanggal
								FROM
									tb_sirkit s,
									tb_perangkat_detail pd
								WHERE
									YEAR (s.tgl_update) <= $tahun
								AND MONTH (s.tgl_update) <=$bulan
								AND s.id_user = (
									SELECT
										id_user
									FROM
										tb_user
									WHERE
										USER = 'flexi'
								)
								AND pd.id_per_detail = s.id_per_detail
								GROUP BY
									id_per_detail
								ORDER BY
									tgl_update DESC
							) tbflexi
						GROUP BY
							tbflexi.id_backbone
					) tbflexi2 ON tbflexi2.id_backbone = b.id_backbone
					LEFT JOIN (
						SELECT
							tbmm.id_backbone,
							count(*) usedmm
						FROM
							(
								SELECT
									s.id_per_detail,
									pd.id_backbone,
									MAX(tgl_update) AS tanggal
								FROM
									tb_sirkit s,
									tb_perangkat_detail pd
								WHERE
									YEAR (s.tgl_update) <= $tahun
								AND MONTH (s.tgl_update) <=$bulan
								AND s.id_user = (
									SELECT
										id_user
									FROM
										tb_user
									WHERE
										USER = 'mm'
								)
								AND pd.id_per_detail = s.id_per_detail
								GROUP BY
									id_per_detail
								ORDER BY
									tgl_update DESC
							) tbmm
						GROUP BY
							tbmm.id_backbone
					) tbmm2 ON tbmm2.id_backbone = b.id_backbone
					LEFT JOIN (
						SELECT
							tblain.id_backbone,
							count(*) usedlain
						FROM
							(
								SELECT
									s.id_per_detail,
									pd.id_backbone,
									MAX(tgl_update) AS tanggal
								FROM
									tb_sirkit s,
									tb_perangkat_detail pd
								WHERE
									YEAR (s.tgl_update) <= $tahun
								AND MONTH (s.tgl_update) <=$bulan
								AND s.id_user NOT IN (
									SELECT
										id_user
									FROM
										tb_user
									WHERE
										USER = 'sljj'
									OR USER = 'mea'
									OR USER = 'flexi'
									OR USER = 'speedy'
									OR USER = 'olo'
									OR USER = 'l/c'
									OR USER = 'mm'
								)
								AND pd.id_per_detail = s.id_per_detail
								GROUP BY
									id_per_detail
								ORDER BY
									tgl_update DESC
							) tblain
						GROUP BY
							tblain.id_backbone
					) tblain2 ON tblain2.id_backbone = b.id_backbone
					LEFT JOIN (
						SELECT
							tblc.id_backbone,
							count(*) usedlc
						FROM
							(
								SELECT
									s.id_per_detail,
									pd.id_backbone,
									MAX(tgl_update) AS tanggal
								FROM
									tb_sirkit s,
									tb_perangkat_detail pd
								WHERE
									YEAR (s.tgl_update) <= $tahun
								AND MONTH (s.tgl_update) <=$bulan
								AND s.id_user = (
									SELECT
										id_user
									FROM
										tb_user
									WHERE
										USER = 'l/c'
								)
								AND pd.id_per_detail = s.id_per_detail
								GROUP BY
									id_per_detail
								ORDER BY
									tgl_update DESC
							) tblc
						GROUP BY
							tblc.id_backbone
					) tblc2 ON tblc2.id_backbone = b.id_backbone
					LEFT JOIN (
						SELECT
							tbkondrusak.id_backbone,
							count(*) jumrusak
						FROM
							(
								SELECT
									s.id_per_detail,
									pd.id_backbone,
									MAX(tgl_update) AS tanggal
								FROM
									tb_sirkit s,
									tb_perangkat_detail pd
								WHERE
									YEAR (s.tgl_update) <= $tahun
								AND MONTH (s.tgl_update) <= 23
								AND pd.id_per_detail = s.id_per_detail
								AND s.kondisi = 'rusak'
								GROUP BY
									id_per_detail
								ORDER BY
									tgl_update DESC
							) tbkondrusak
						GROUP BY
							tbkondrusak.id_backbone
					) tbkondrusak2 ON tbkondrusak2.id_backbone = b.id_backbone
					LEFT JOIN (
						SELECT
							tbmea.id_backbone,
							count(*) usedmea
						FROM
							(
								SELECT
									s.id_per_detail,
									pd.id_backbone,
									MAX(tgl_update) AS tanggal
								FROM
									tb_sirkit s,
									tb_perangkat_detail pd
								WHERE
									YEAR (s.tgl_update) <= $tahun
								AND MONTH (s.tgl_update) <=$bulan
								AND s.id_user = (
									SELECT
										id_user
									FROM
										tb_user
									WHERE
										USER = 'mea'
								)
								AND pd.id_per_detail = s.id_per_detail
								GROUP BY
									id_per_detail
								ORDER BY
									tgl_update DESC
							) tbmea
						GROUP BY
							tbmea.id_backbone
					) tbmea2 ON tbmea2.id_backbone = b.id_backbone
					LEFT JOIN (
						SELECT
							tbolo.id_backbone,
							count(*) usedolo
						FROM
							(
								SELECT
									s.id_per_detail,
									pd.id_backbone,
									MAX(tgl_update) AS tanggal
								FROM
									tb_sirkit s,
									tb_perangkat_detail pd
								WHERE
									YEAR (s.tgl_update) <= $tahun
								AND MONTH (s.tgl_update) <=$bulan
								AND s.id_user = (
									SELECT
										id_user
									FROM
										tb_user
									WHERE
										USER = 'olo'
								)
								AND pd.id_per_detail = s.id_per_detail
								GROUP BY
									id_per_detail
								ORDER BY
									tgl_update DESC
							) tbolo
						GROUP BY
							tbolo.id_backbone
					) tbolo2 ON tbolo2.id_backbone = b.id_backbone
					LEFT JOIN tb_perangkat_detail pd ON b.id_backbone = pd.id_backbone
					LEFT JOIN tb_sirkit s ON s.id_per_detail = pd.id_per_detail
					LEFT JOIN tb_sistra st ON st.id_sistra = b.id_sistra
					GROUP BY
						id_backbone";
		//var_dump($query);exit();
		$sql 	= mysql_query ($query);
		$jum	= mysql_num_rows($sql);
		$data 	= array();
		while ($row = mysql_fetch_assoc($sql)) {
			array_push($data, $row);
		}
		#sertakan library FPDF dan bentuk objek
		$pdf=new FPDF('l','mm','A4');
		$pdf->AddPage();
	//========
		$border = 0;
		//$this->AddPage();
		$pdf->SetAutoPageBreak(true,60);
		//$this->AliasNbPages();
		$left = 25;
		
	//==========
		#tampilkan judul laporan
		//$pdf->SetMargins(4,40,30);
		$pdf->SetMargins(2,10,10);

		$pdf->SetFont('Arial','B','12');
		
		$pdf->MultiCell(0, 3, 'PT. TELKOM INDONESIA');
		$pdf->Image('../img/lg.png',268,3);
		$pdf->Cell(0, 1, " ", "B"); 
		$pdf->Ln(3);
		
		$pdf->SetFont("", "B", 10);
		$pdf->Cell(0, 4, 'LAPORAN DATA POTENSI KANAL ', 0, 1,'C');
		$pdf->Cell(0, 4, 'Arnet : Surabaya Barat', 0,1,'C');
		$pdf->Cell(0, 4, 'Posisi : '.$bul.' '.$tahun, 0, 1,'C');
		$pdf->Cell(0,5, 'Total Data : '.$jum, '0', 1, 'L');
 
		#buat header tabel
		$pdf->SetFont('Arial','','10');
		$pdf->SetFillColor(0,0,0);
		$pdf->SetTextColor(255);
		$pdf->SetDrawColor(204,204,204);
		$fill = true;
		
		//lebar tiap kolom :
		$ww1=8; # 8,'no.', 1, '0', 'C', $fill);
		$ww2=12; # 8,'Link A', 1, '0', 'C', $fill);
		$ww3=23; # 8,'Link B', 1, '0', 'C', $fill);
		$ww4=15; #,'sistra', 1, '0', 'C', $fill);
		$ww5=12; #, 'avail2mbps', 1, '0', 'C', $fill);
		$ww6=12; #, 'availkanal', 1, '0', 'C', $fill);
		$ww7=12; #, 'availstm1', 1, '0', 'C', $fill);
		$ww8=12; #, 'availstm4', 1, '0', 'C', $fill);
		$ww9=12; #, 'availstm16', 1, '0', 'C', $fill);
		$ww10=12; #, 'availstm64', 1, '0', 'C', $fill);
		$ww11=12; #, 'usedsljj', 1, '0', 'C', $fill);
		$ww12=12; #, 'usedmea', 1, '0', 'C', $fill);
		$ww13=12; #, 'usedflexi', 1, '0', 'C', $fill);
		$ww14=12; #, 'usedspeedy', 1, '0', 'C', $fill);
		$ww15=12; #, 'usedolo', 1, '0', 'C', $fill);
		$ww16=12; #, 'usedmm', 1, '0', 'C', $fill);
		$ww17=12; #, 'usedlc', 1, '0', 'C', $fill);
		$ww18=12; #, 'usedlain', 1, '0', 'C', $fill);
		$ww19=12; #, 'used2mbps', 1, '0', 'C', $fill);
		$ww20=12; #, 'free2mbps', 1, '0', 'C', $fill);
		$ww21=12; #, 'freekanal', 1, '0', 'C', $fill);
		$ww22=12; #, 'jumrusak', 1, '0', 'C', $fill);
		$ww23=12; #, 'jumrusak', 1, '0', 'C', $fill);
		
	//judul tabel
		$pdf->Cell($ww1, 	8,	'no.', 		1, '0', 'C', $fill);
		$pdf->Cell($ww2, 	8,	'Link A', 	1, '0', 'C', $fill);
		$pdf->Cell($ww3, 	8,	'Link B', 	1, '0', 'C', $fill);
		$pdf->Cell($ww4, 	8,	'sistra', 	1, '0', 'C', $fill);
		$pdf->Cell($ww5,	8, 	'2mbps', 	1, '0', 'C', $fill);
		$pdf->Cell($ww6,	8, 	'kanal', 	1, '0', 'C', $fill);
		$pdf->Cell($ww7,	8, 	'stm1', 	1, '0', 'C', $fill);
		$pdf->Cell($ww8,	8, 	'stm4', 	1, '0', 'C', $fill);
		$pdf->Cell($ww9,	8, 	'stm16', 	1, '0', 'C', $fill);
		$pdf->Cell($ww10,	8, 	'stm64', 	1, '0', 'C', $fill);
		$pdf->Cell($ww11,	8, 	'sljj', 	1, '0', 'C', $fill);
		$pdf->Cell($ww12,	8, 	'mea', 		1, '0', 'C', $fill);
		$pdf->Cell($ww13,	8, 	'flexi', 	1, '0', 'C', $fill);
		$pdf->Cell($ww14,	8, 	'speedy', 	1, '0', 'C', $fill);
		$pdf->Cell($ww16,	8, 	'olo', 		1, '0', 'C', $fill);
		$pdf->Cell($ww17,	8, 	'mm', 		1, '0', 'C', $fill);
		$pdf->Cell($ww18,	8, 	'lc', 		1, '0', 'C', $fill);
		$pdf->Cell($ww19,	8, 	'lain', 	1, '0', 'C', $fill);
		$pdf->Cell($ww20,	8, 	'jum', 		1, '0', 'C', $fill);
		$pdf->Cell($ww21,	8, 	's 2mbps',	1, '0', 'C', $fill);
		$pdf->Cell($ww22,	8, 	's kanal',	1, '0', 'C', $fill);
		$pdf->Cell($ww23,	8, 	'rusak', 	1, '0', 'C', $fill);
		$pdf->Ln();
		
		#tampilkan data tabelnya
		$pdf->SetFillColor(249, 246, 244);
		$pdf->SetTextColor(0);
		$pdf->SetFont('');
		$fill=false;
		$i = 1;
		foreach ($data as $baris) {
			#if($baris==null) $baris[]=0;
			#else $baris[]=$baris;
			$pdf->Cell($ww1, 8,$i, 1, '0', 'C', $fill);
			$pdf->Cell($ww2, 8,'KBL', 1, '0', 'C', $fill);
			$pdf->Cell($ww3,8,$baris['linkbnew'], 1, '0', 'C', $fill);
			$pdf->Cell($ww4,8,$baris['sistra'], 1, '0', 'C', $fill);
			$pdf->Cell($ww5,8,$baris['avail2mbps'], 1, '0', 'C', $fill);
			$pdf->Cell($ww6,8,$baris['availkanal'], 1, '0', 'C', $fill);
			$pdf->Cell($ww7,8,$baris['availstm1'], 1, '0', 'C', $fill);
			$pdf->Cell($ww8,8,$baris['availstm4'], 1, '0', 'C', $fill);
			$pdf->Cell($ww9,8,$baris['availstm16'], 1, '0', 'C', $fill);
			$pdf->Cell($ww10,8,$baris['availstm64'], 1, '0', 'C', $fill);
			$pdf->Cell($ww11,8,(($baris['usedsljj']!=null)?$baris['usedsljj']:0),  1, '0', 'C', $fill);
			$pdf->Cell($ww12,8,(($baris['usedmea']!=null)?$baris['usedmea']:0),  1, '0', 'C', $fill);
			$pdf->Cell($ww13,8,(($baris['usedflexi']!=null)?$baris['usedflexi']:0),  1, '0', 'C', $fill);
			$pdf->Cell($ww14,8,(($baris['usedspeedy']!=null)?$baris['usedspeedy']:0),  1, '0', 'C', $fill);
			$pdf->Cell($ww15,8,(($baris['usedolo']!=null)?$baris['usedolo']:0),  1, '0', 'C', $fill);
			$pdf->Cell($ww16,8,(($baris['usedmm']!=null)?$baris['usedmm']:0),  1, '0', 'C', $fill);
			$pdf->Cell($ww17,8,(($baris['usedlc']!=null)?$baris['usedlc']:0),  1, '0', 'C', $fill);
			$pdf->Cell($ww18,8,(($baris['usedlain']!=null)?$baris['usedlain']:0),  1, '0', 'C', $fill);
			$pdf->Cell($ww19,8,(($baris['used2mbps']!=null)?$baris['used2mbps']:0),  1, '0', 'C', $fill);
			$pdf->Cell($ww20,8,(($baris['free2mbps']!=null)?$baris['free2mbps']:0),  1, '0', 'C', $fill);
			$pdf->Cell($ww21,8,(($baris['freekanal']!=null)?$baris['freekanal']:0),  1, '0', 'C', $fill);
			$pdf->Cell($ww22,8,(($baris['jumrusak']!=null)?$baris['jumrusak']:0),  1, '0', 'C', $fill);
			
			$i++;
			$fill = !$fill;
			$pdf->Ln();
		}
		$pdf->Output();
#add =======================
			}else{ //url tidak sesuai
				echo 'maaf url tidak sesuai(dilarang merubah url)<br>';
				echo '<a href=../mux>kembali</a>';
			}
		}
	}
}
#add ==================

?>