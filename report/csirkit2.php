<?php 
	require_once "../lib/fpdf17/fpdf.php";
	include "../lib/koneks.php";
	include "../lib/fungsi_indotgl.php";
	if($_GET['tabelx'])
	{
		$judul 	= $_GET['judulx'];
		$idy 	= $_GET['id_sirkit'];
		$tabel	= $_GET['tabelx'];	
		//$query 	= "SELECT * FROM $tabel where id_sirkit = '$idy' ";
		$query = "SELECT
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
						u. USER,
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
					INNER JOIN tb_backbone bb ON bb.id_backbone = pd.id_backbone
					WHERE
						id_sirkit = '$_GET[id_sirkit]'"; 
					//	$sql = $query;
						//var_dump($sqlU);exit();
		//var_dump($query);exit();
		$sql 	= mysql_query ($query);
		$exe 	= mysql_query($query);
		$data 	= mysql_fetch_assoc($exe);
		
		#sertakan library FPDF dan bentuk objek
		$pdf=new FPDF('p','mm','A4');
		$pdf->AddPage();
	
		#tampilkan judul laporan
		$pdf->SetMargins(20,40,30);
		$pdf->SetFont('Times','B','16');
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
		
		$w1=40;
		$w2=135;
		$h=8;
		
		$pdf->Cell($w1, 8, Backbone, 0, '0', 'L', $f2);
		$pdf->Cell($w2, 8, ':  '.$data['kode'], 0, '0', 'L', $f2);
		$pdf->Ln();

		
		$pdf->Cell($w1, 8, id_per_detail, 0, '0', 'L', $f1);
		$pdf->Cell($w2, 8, ':  '.$data['id_per_detail'], 0, '0', 'L', $f1);
		$pdf->Ln();

		$pdf->Cell($w1, 8, id_sirkit, 0, '0', 'L', $f2);
		$pdf->Cell($w2, 8, ':  '.$data['id_sirkit'], 0, '0', 'L', $f2);
		$pdf->Ln();

		$pdf->Cell($w1, 8, 'Channel A', 0, '0', 'L', $f1);
		$pdf->Cell($w2, 8, ':  '.$data['channelida'], 0, '0', 'L', $f1);
		$pdf->Ln();
		
		$pdf->Cell($w1, 8, 'Channel B', 0, '0', 'L', $f2);
		$pdf->Cell($w2, 8, ':  '.$data['channelidb'], 0, '0', 'L', $f2);
		$pdf->Ln();

		$pdf->Cell($w1, 8, 'DDF A', 0, '0', 'L', $f1);
		$pdf->Cell($w2, 8, ':  '.$data['ddf_a'], 0, '0', 'L', $f1);
		$pdf->Ln();
		
		$pdf->Cell($w1, 8, 'DDF B', 0, '0', 'L', $f2);
		$pdf->Cell($w2, 8, ':  '.$data['ddf_b'], 0, '0', 'L', $f2);
		$pdf->Ln();
		
		$pdf->Cell($w1, 8, 'ST A', 0, '0', 'L', $f1);
		$pdf->Cell($w2, 8, ':  '.$data['linka'], 0, '0', 'L', $f1);
		$pdf->Ln();
		
		$pdf->Cell($w1, 8, 'ST B', 0, '0', 'L', $f2);
		$pdf->Cell($w2, 8, ':  '.$data['linkb'], 0, '0', 'L', $f2);
		$pdf->Ln();

		$pdf->Cell($w1, 8, TC, 0, '0', 'L', $f1);
		$pdf->Cell($w2, 8, ':  '.$data['tc'], 0, '0', 'L', $f1);
		$pdf->Ln();

		$pdf->Cell($w1, 8, 'DDF TC', 0, '0', 'L', $f2);
		$pdf->Cell($w2, 8, ':  '.$data['ddf_tc'], 0, '0', 'L', $f2);
		$pdf->Ln();
		
		$pdf->Cell($w1, 8, 'DDF User', 0, '0', 'L', $f1);
		$pdf->Cell($w2, 8, ':  '.$data['ddf_user'], 0, '0', 'L', $f1);
		$pdf->Ln();
		
		$pdf->Cell($w1, 8, TID, 0, '0', 'L', $f2);
		$pdf->Cell($w2, 8, ':  '.$data['tid'], 0, '0', 'L', $f2);
		$pdf->Ln();

		$pdf->Cell($w1, 8, DIU, 0, '0', 'L', $f1);
		$pdf->Cell($w2, 8, ':  '.$data['diu'], 0, '0', 'L', $f1);
		$pdf->Ln();
		
		$pdf->Cell($w1, 8, TieLine, 0, '0', 'L', $f2);
		$pdf->Cell($w2, 8, ':  '.$data['tie_line'], 0, '0', 'L', $f2);
		$pdf->Ln();
		
		$pdf->Cell($w1, 8, Keterangan, 0, '0', 'L', $f1);
		$pdf->Cell($w2, 8, ':  '.$data['keterangan'], 0, '0', 'L', $f1);
		$pdf->Ln();
		
		$pdf->Cell($w1, 8, Tgl_upadate, 0, '0', 'L', $f2);
		$pdf->Cell($w2, 8, ':  '.tgl_indo($data['tgl_update']), 0, '0', 'L', $f2);
		$pdf->Ln();

			
		$pdf->Output();
	}
?>