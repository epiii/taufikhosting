<?php 
	require_once "../lib/fpdf17/fpdf.php";
	include"../lib/koneks.php";
	if($_GET['tabelx'])
	{
		$judul 	= $_GET['judulx'];
		$idy 	= $_GET['id_koordinasi'];
		//var_dump($idy);exit();
		$tabel	= $_GET['tabelx'];	
		$query 	= "SELECT * FROM $tabel where id_koordinasi = '$idy'";
		// var_dump($query);exit();
		$exe 	= mysql_query($query);
		$data 	= mysql_fetch_assoc($exe);
		
		#sertakan library FPDF dan bentuk objek
		$pdf=new FPDF('p','mm','A4');
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
		
		$w1=40;
		$w2=135;
		$h=8;
		
		$pdf->Cell($w1, 8, 'ID Koordinasi', 0, '0', 'L', $f1);
		$pdf->Cell($w2, 8, ':  '.$data['id_koordinasi'], 0, '0', 'L', $f1);
		$pdf->Ln();

		$pdf->Cell($w1, 8, 'ID lokasi kerja', 0, '0', 'L', $f2);
		$pdf->Cell($w2, 8, ':  '.$data['id_loker'], 0, '0', 'L', $f2);
		$pdf->Ln();

		$pdf->Cell($w1, 8, 'Telp1 / Flexi', 0, '0', 'L', $f1);
		$pdf->Cell($w2, 8, ':  '.$data['telp'],0, '0', 'L', $f1);
		$pdf->Ln();
		
		$pdf->Cell($w1, 8, 'GSM', 0, '0', 'L', $f2);
		$pdf->Cell($w2, 8, ':  '.$data['telp2'],0, '0', 'L', $f2);
		$pdf->Ln();
		
		$pdf->Cell($w1, 8, 'ID Peg', 0, '0', 'L', $f2);
		$pdf->Cell($w2, 8, ':  '.$data['id_peg'],0, '0', 'L', $f2);
		$pdf->Ln();
		
		$pdf->Output();
	}
?>