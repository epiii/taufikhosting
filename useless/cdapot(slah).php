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
			if($_GET['bulan'] and $_GET['tahun'] and $_GET['ruwet'])
			{
				//echo 'halo';
				$blnx= array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");		
				
				$tabel = $_GET['tabelx'];
				$bulan	= $_GET['bulan']; 
				$bul	= $blnx[$bulan];
				$tahun	= $_GET['tahun']; 
				$ruwet	= base64_encode($bulan.'dapot'.$tahun);
				if($_GET['ruwet']==$ruwet)
				{
//end of conditional of epi -------------
		
		$query 	= "SELECT
				b.id_backbone,
				b.kode,
				SUBSTRING_INDEX(b.kode, '-' ,- 1) AS linkbnew,
				st.sistra,
				avail2mbps,
				(30 * avail2mbps) AS availkanal,
				availstm1,
				availstm4,
				availstm16,
				availstm64,
				(
					SELECT
						count(*)
					FROM
						tb_sirkit s,
						tb_backbone bb,
						tb_perangkat_detail d
					WHERE
						s.id_per_detail = d.id_per_detail
					AND d.id_backbone = bb.id_backbone = b.id_backbone
					AND YEAR (tgl_update) <= '$tahun'
					AND MONTH (tgl_update) <= '$bulan'
					AND id_user = (
						SELECT
							id_user
						FROM
							tb_user
						WHERE
							USER = 'sljj'
					)
				) AS usedsljj,
				(
					SELECT
						count(*)
					FROM
						tb_sirkit s,
						tb_backbone bb,
						tb_perangkat_detail d
					WHERE
						s.id_per_detail = d.id_per_detail
					AND d.id_backbone = bb.id_backbone = b.id_backbone
					AND YEAR (tgl_update) <= '$tahun'
					AND MONTH (tgl_update) <= '$bulan'
					AND id_user = (
						SELECT
							id_user
						FROM
							tb_user
						WHERE
							USER = 'mea'
					)
				) AS usedmea,
				(
					SELECT
						count(*)
					FROM
						tb_sirkit s,
						tb_backbone bb,
						tb_perangkat_detail d
					WHERE
						s.id_per_detail = d.id_per_detail
					AND d.id_backbone = bb.id_backbone = b.id_backbone
					AND YEAR (tgl_update) <= '$tahun'
					AND MONTH (tgl_update) <= '$bulan'
					AND id_user = (
						SELECT
							id_user
						FROM
							tb_user
						WHERE
							USER = 'flexi'
					)
				) AS usedflexi,
				(
					SELECT
						count(*)
					FROM
						tb_sirkit s,
						tb_backbone bb,
						tb_perangkat_detail d
					WHERE
						s.id_per_detail = d.id_per_detail
					AND d.id_backbone = bb.id_backbone = b.id_backbone
					AND YEAR (tgl_update) <= '$tahun'
					AND MONTH (tgl_update) <= '$bulan'
					AND id_user = (
						SELECT
							id_user
						FROM
							tb_user
						WHERE
							USER = 'speedy'
					)
				) AS usedspeedy,
				(
					SELECT
						count(*)
					FROM
						tb_sirkit s,
						tb_backbone bb,
						tb_perangkat_detail d
					WHERE
						s.id_per_detail = d.id_per_detail
					AND d.id_backbone = bb.id_backbone = b.id_backbone
					AND YEAR (tgl_update) <= '$tahun'
					AND MONTH (tgl_update) <= '$bulan'
					AND id_user = (
						SELECT
							id_user
						FROM
							tb_user
						WHERE
							USER = 'olo'
					)
				) AS usedolo,
				(
					SELECT
						count(*)
					FROM
						tb_sirkit s,
						tb_backbone bb,
						tb_perangkat_detail d
					WHERE
						s.id_per_detail = d.id_per_detail
					AND d.id_backbone = bb.id_backbone = b.id_backbone
					AND YEAR (tgl_update) <= '$tahun'
					AND MONTH (tgl_update) <= '$bulan'
					AND id_user = (
						SELECT
							id_user
						FROM
							tb_user
						WHERE
							USER = 'mm'
					)
				) AS usedmm,
				(
					SELECT
						count(*)
					FROM
						tb_sirkit s,
						tb_backbone bb,
						tb_perangkat_detail d
					WHERE
						s.id_per_detail = d.id_per_detail
					AND d.id_backbone = bb.id_backbone = b.id_backbone
					AND YEAR (tgl_update) <= '$tahun'
					AND MONTH (tgl_update) <= '$bulan'
					AND id_user = (
						SELECT
							id_user
						FROM
							tb_user
						WHERE
							USER = 'l/c'
					)
				) AS usedlc,
				(
					SELECT
						count(*)
					FROM
						tb_sirkit s,
						tb_backbone bb,
						tb_perangkat_detail d
					WHERE
						pd.id_per_detail = s.id_per_detail
					AND pd.id_backbone = b.id_backbone
					AND id_user NOT IN (
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
				) AS usedlain,
				(
					SELECT
						count(*)
					FROM
						tb_sirkit s,
						tb_backbone bb,
						tb_perangkat_detail d
					WHERE
						pd.id_backbone = b.id_backbone
					AND pd.id_per_detail = s.id_per_detail
				) used2mbps,
				(
					avail2mbps - (
						SELECT
							count(*)
						FROM
							tb_sirkit s,
							tb_backbone bb,
							tb_perangkat_detail d
						WHERE
							pd.id_backbone = b.id_backbone
						AND pd.id_per_detail = s.id_per_detail
					)
				) free2mbps,
				(
					(
						avail2mbps - (
							SELECT
								count(*)
							FROM
								tb_sirkit s,
								tb_backbone bb,
								tb_perangkat_detail d
							WHERE
								pd.id_backbone = b.id_backbone
							AND pd.id_per_detail = s.id_per_detail
						)
					) * 30
				) freekanal,
				(
					SELECT
						count(*)
					FROM
						tb_sirkit s,
						tb_backbone bb,
						tb_perangkat_detail d
					WHERE
						pd.id_backbone = b.id_backbone
					AND pd.id_per_detail = s.id_per_detail
					AND s.keterangan = 'rusak'
				) jumrusak
			FROM
				tb_backbone b
			LEFT JOIN tb_perangkat_detail pd ON b.id_backbone = pd.id_backbone
			LEFT JOIN tb_sirkit s ON s.id_per_detail = pd.id_per_detail
			LEFT JOIN tb_sistra st ON st.id_sistra = b.id_sistra
			GROUP BY
				id_backbone";
		//var_dump($idy);exit();
		$exe 	= mysql_query($query);
		$data 	= mysql_fetch_assoc($exe);
		
		#sertakan library FPDF dan bentuk objek
		$pdf=new FPDF('L','mm','A4');
		$pdf->AddPage();
	
		#tampilkan judul laporan
		$pdf->SetMargins(20,40,30);
		$pdf->SetFont('Arial','B','16');
		//       kiri,atas,nama,
		$pdf->Cell(0,  20, $judul, '0', 1, 'L');

		#buat header tabel
		//$pdf->SetFont('Arial','B','15');
		//$pdf->SetFillColor(0,0,0);
		//$pdf->SetTextColor(255);
		//$pdf->SetDrawColor(204,204,204);
		
		//$pdf->Cell(50, 5, 'nomer', 1, '0', 'C', true);
		
		//$pdf->Ln();
		#tampilkan data tabelnya
		$pdf->SetFillColor(249, 246, 244);
		$pdf->SetTextColor(0);
		$pdf->SetFont('');
		$f1=true;
		$f2=false;
		//lanjutkan fik hahahsek tak banekno user mau,, seng koordinasi tah leh?

		$w1=40; //lebar judul
		$w2=135; //lebar isi
		$h=8;
		
		$pdf->Cell($w1, 8, 'ID Link A', 0, '0', 'L', true);
		$pdf->Cell($w2, 8, ':  '.$data['id_linka'], 0, '0', 'L', $f1);
		$pdf->Ln();

		$pdf->Cell($w1, 8, 'Keterangan', 0, '0', 'L', $f2);
		$pdf->Cell($w2, 8, ':  '.$data['keterangan'], 0, '0', 'L', $f2);
		$pdf->Ln();

		$pdf->Cell($w1, 8, 'Nama', 0, '0', 'L', $f1);
		$pdf->Cell($w2, 8, ':  '.$data['nama'],0, '0', 'L', $f1);
		$pdf->Ln();
		
		
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