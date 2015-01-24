<?php 
	require_once "../lib/fpdf17/fpdf.php";
	include"../lib/koneks.php";
	if($_GET['tabelx'])
	{
		$judul 	= $_GET['judulx'];
		$idy 	= $_GET['id_linkb'];
		$tabel	= $_GET['tabelx'];	
		$query 	= "SELECT * FROM $tabel where id_linkb ='$idy'";
		//var_dump($query);exit();
		$exe 	= mysql_query($query);
		//var_dump($exe);exit();
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
		//lanjutkan fik hahahsek tak banekno user mau,, seng koordinasi tah leh?

		$w1=40; //lebar judul
		$w2=135; //lebar isi
		$h=8;
		
		$pdf->Cell($w1, 8, 'ID Link B', 0, '0', 'L', true);
		$pdf->Cell($w2, 8, ':  '.$data['id_linkb'], 0, '0', 'L', $f1);
		$pdf->Ln();

		$pdf->Cell($w1, 8, 'Keterangan', 0, '0', 'L', $f2);
		$pdf->Cell($w2, 8, ':  '.$data['keterangan'], 0, '0', 'L', $f2);
		$pdf->Ln();

		$pdf->Cell($w1, 8, 'Nama', 0, '0', 'L', $f1);
		$pdf->Cell($w2, 8, ':  '.$data['nama'],0, '0', 'L', $f1);
		$pdf->Ln();
		
		
		$pdf->Output();
	}
?>