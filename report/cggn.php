<?php 
	require_once "../lib/fpdf17/fpdf.php";
	include"../lib/koneks.php";
	if($_GET['tabelx'])
	{
		$judul 	= $_GET['judulx'];
		$idy 	= $_GET['id_ggn'];
		$tabel	= $_GET['tabelx'];	
		$query 	= "SELECT * FROM $tabel where id_ggn ='$idy'";
		//var_dump($idy);exit();
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
		//lanjutkan fik hahahsek tak banekno user mau,, seng koordinasi tah leh?

		$w1=40; //lebar judul
		$w2=135; //lebar isi
		$h=8;
		
		$pdf->Cell($w1, 8, 'Sistra', 0, '0', 'L', true);
		$pdf->Cell($w2, 8, ':  '.$data['sistra'], 0, '0', 'L', $f1);
		$pdf->Ln();

		$pdf->Cell($w1, 8, 'linkx', 0, '0', 'L', $f2);
		$pdf->Cell($w2, 8, ':  '.$data['linkx'], 0, '0', 'L', $f2);
		$pdf->Ln();

		$pdf->Cell($w1, 8, 'lokasi', 0, '0', 'L', $f1);
		$pdf->Cell($w2, 8, ':  '.$data['lokasi'],0, '0', 'L', $f1);
		$pdf->Ln();
		
		$pdf->Cell($w1, 8, 'uraian', 0, '0', 'L', $f2);
		$pdf->Cell($w2, 8, ':  '.$data['uraian'],0, '0', 'L', $f2);
		$pdf->Ln();
		
		$pdf->Cell($w1, 8, 'Tanggal', 0, '0', 'L', $f1);
		$pdf->Cell($w2, 8, ':  '.$data['tgl'],0, '0', 'L', $f1);
		$pdf->Ln();
		
		$pdf->Cell($w1, 8, 'jm A', 0, '0', 'L', $f2);
		$pdf->Cell($w2, 8, ':  '.$data['jmA'],0, '0', 'L', $f2);
		$pdf->Ln();
		
		$pdf->Cell($w1, 8, 'jm B', 0, '0', 'L', $f1);
		$pdf->Cell($w2, 8, ':  '.$data['jmB'],0, '0', 'L', $f1);
		$pdf->Ln();
		
		$pdf->Cell($w1, 8, 'pet', 0, '0', 'L', $f2);
		$pdf->Cell($w2, 8, ':  '.$data['pet'],0, '0', 'L', $f2);
		$pdf->Ln();
		
		$pdf->Cell($w1, 8, 'id_koordinasi', 0, '0', 'L', $f1);
		$pdf->Cell($w2, 8, ':  '.$data['id_koordinasi'],0, '0', 'L', $f1);
		$pdf->Ln();
		
		
		
		$pdf->Output();
	}
?>