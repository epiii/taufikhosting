<?php 
	session_start();
	//error_reporting(0);
	include "../lib/timeout.php";
	require_once("../lib/fpdf17/fpdf.php");
	require_once("../lib/koneks.php");

	#add ================================================================
	if($_SESSION[loginMUX]==1)
	{
		if(!cek_login())
		{
			$_SESSION[loginMUX] = 0;
		}
	}
	//var_dump($_SESSION[loginMUX]);exit();
	if($_SESSION[loginMUX]==0) //jika sesi login 0
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
			if(isset($_GET['tahun'], $_GET['bulan'],$_GET['backb'], $_GET['ruwet']))
			{
				#ambil sesi
				$sql 	= 'select *  from tb_peg where id_peg = '.$_SESSION['id_userMUX'];
				$exe 	= mysql_query($sql);
				$ambil	= mysql_fetch_array($exe);
				$idsesi	= $ambil['id_session'];
				$blnx	= array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");		
				
				$tabel 	= $_GET['tabelx'];
				$backby	= $_GET['backb'];
				$bulan	= $_GET['bulan'];
				//var_dump($bulan);exit();				
				$bul	= $blnx[$bulan-1];
				$tahun	= $_GET['tahun']; 
				$ruwet	= base64_encode($idsesi.$backby.$tahun.$bulan);
				if($_GET['ruwet']==$ruwet)
				{
//end of conditional of epi -------------
		
		$query ="SELECT
					bb.kode,
					s.id_sirkit,
					s.id_per_detail,
					pd.channelida,
					pd.channelidb,
					pd.ddf_a,
					pd.ddf_b,
					s.kondisi,
					a.nama AS linka,
					b.nama AS linkb,
					UCASE(u.user)user,
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
					SELECT
						s.id_per_detail,
						MAX(tgl_update) AS tanggal
					FROM
						tb_sirkit s,
						tb_perangkat_detail pd
					WHERE
						pd.id_backbone = '$backby' 
					AND year(s.tgl_update)<='$tahun'
					AND month(s.tgl_update)<='$bulan'
					AND pd.id_per_detail = s.id_per_detail
					GROUP BY
						id_per_detail
					ORDER BY
						tgl_update
				) tb_tgl ON (
					s.id_per_detail = tb_tgl.id_per_detail
					AND s.tgl_update = tb_tgl.tanggal
				)
				INNER JOIN tb_linka a ON s.id_linka = a.id_linka
				INNER JOIN tb_linkb b ON s.id_linkb = b.id_linkb
				INNER JOIN tb_user u ON s.id_user = u.id_user
				INNER JOIN tb_perangkat_detail pd ON s.id_per_detail = pd.id_per_detail
				INNER JOIN tb_backbone bb  ON bb.id_backbone = pd.id_backbone 
				";
		//var_dump($query);exit();
		$sql 	= mysql_query ($query);
		$jum	= mysql_num_rows($sql);
		$data 	= array();
		while ($row = mysql_fetch_assoc($sql)) {
			array_push($data, $row);
		}
		///var_dump($data);exit();
		$kodebb = $data[0][kode];
		//var_dump($kodebb);exit();
		#sertakan library FPDF dan bentuk objek
		$pdf=new FPDF('p','mm','A4');
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
		$pdf->Image('../img/lg.png',180,3);
		$pdf->Cell(0, 1, " ", "B"); 
		$pdf->Ln(3);
		
		$pdf->SetFont("", "B", 10);
		$pdf->Cell(0, 4, 'LAPORAN DATA SIRKIT KANAL TRANSPORT BACKBONE ARNET SBB', 0, 1,'C');
		$pdf->Cell(0, 4, $kodebb.' ( '.$bul.' '.$tahun.' )', 0,1,'C');
		$pdf->Cell(0,5, 'Total Data : '.$jum, '0', 1, 'L');
 
		#buat header tabel
		$pdf->SetFont('Arial','','10');
		$pdf->SetFillColor(0,0,0);
		$pdf->SetTextColor(255);
		$pdf->SetDrawColor(204,204,204);
		$fill = true;
		
		//lebar tiap kolom :
		$ww1=8; # 8,'no.', 1, '0', 'C', $fill);
		$ww2=18; # 8,'Link A', 1, '0', 'C', $fill);
		$ww3=18; # 8,'Link B', 1, '0', 'C', $fill);
		$ww4=15; #,'sistra', 1, '0', 'C', $fill);
		$ww5=12; #, 'avail2mbps', 1, '0', 'C', $fill);
		$ww6=12; #, 'availkanal', 1, '0', 'C', $fill);
		$ww7=12; #, 'availstm1', 1, '0', 'C', $fill);
		$ww8=12; #, 'availstm4', 1, '0', 'C', $fill);
		$ww9=12; #, 'availstm16', 1, '0', 'C', $fill);
		$ww10=12; #, 'availstm64', 1, '0', 'C', $fill);
		$ww11=12; #, 'usedsljj', 1, '0', 'C', $fill);
		$ww12=18; #, 'usedmea', 1, '0', 'C', $fill);
		$ww13=18; #, 'usedflexi', 1, '0', 'C', $fill);
		$ww14=20; #, 'usedspeedy', 1, '0', 'C', $fill);
		
	//judul tabel
		$pdf->Cell($ww1, 	8,	'no.', 		1, '0', 'C', $fill);
		$pdf->Cell($ww2, 	8,	'Channel A', 	1, '0', 'C', $fill);
		$pdf->Cell($ww3, 	8,	'Channel B', 	1, '0', 'C', $fill);
		$pdf->Cell($ww4, 	8,	'kota A', 	1, '0', 'C', $fill);
		$pdf->Cell($ww5,	8, 	'Kota B', 	1, '0', 'C', $fill);
		$pdf->Cell($ww6,	8, 	'ddf A', 	1, '0', 'C', $fill);
		$pdf->Cell($ww7,	8, 	'ddf B', 	1, '0', 'C', $fill);
		$pdf->Cell($ww8,	8, 	'user', 	1, '0', 'C', $fill);
		$pdf->Cell($ww9,	8, 	'tid', 	1, '0', 'C', $fill);
		$pdf->Cell($ww10,	8, 	'diu', 	1, '0', 'C', $fill);
		$pdf->Cell($ww11,	8, 	'tc', 	1, '0', 'C', $fill);
		$pdf->Cell($ww12,	8, 	'ddf tc', 		1, '0', 'C', $fill);
		$pdf->Cell($ww13,	8, 	'ddf user', 	1, '0', 'C', $fill);
		$pdf->Cell($ww14,	8, 	'keterangan', 	1, '0', 'C', $fill);
		$pdf->Ln();
		
		#tampilkan data tabelnya
		$pdf->SetFillColor(249, 246, 244);
		$pdf->SetTextColor(0);
		$pdf->SetFont('');
		$fill=false;
		$i = 1;
		foreach ($data as $baris) {
			$pdf->Cell($ww1, 	8,$i, 1, '0', 'C', $fill);
			$pdf->Cell($ww2,	8,$baris['channelida'], 1, '0', 'C', $fill);
			$pdf->Cell($ww3,	8,$baris['channelidb'], 1, '0', 'C', $fill);
			$pdf->Cell($ww4,	8,$baris['linka'], 1, '0', 'C', $fill);
			$pdf->Cell($ww5,	8,$baris['linkb'], 1, '0', 'C', $fill);
			$pdf->Cell($ww6,	8,$baris['ddf_a'], 1, '0', 'C', $fill);
			$pdf->Cell($ww7,	8,$baris['ddf_b'], 1, '0', 'C', $fill);
			$pdf->Cell($ww8,	8,$baris['user'], 1, '0', 'C', $fill);
			$pdf->Cell($ww9,	8,$baris['tid'], 1, '0', 'C', $fill);
			$pdf->Cell($ww10,	8,$baris['diu'], 1, '0', 'C', $fill);
			$pdf->Cell($ww11,	8,$baris['tc'], 1, '0', 'C', $fill);
			$pdf->Cell($ww12,	8,$baris['ddf_tc'], 1, '0', 'C', $fill);
			$pdf->Cell($ww13,	8,$baris['ddf_user'], 1, '0', 'C', $fill);
			$pdf->Cell($ww14,	8,$baris['keterangan'], 1, '0', 'C', $fill);
			
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