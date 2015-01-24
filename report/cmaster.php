<?php 
	require_once "../lib/fpdf17/fpdf.php";
	include"../lib/koneks.php";
	if($_GET['tabelx'])
	{
		$judul 	= $_GET['judulx'];
		$tabel	= $_GET['tabelx'];	
		$query 	= "SELECT * FROM $tabel";
		$sql 	= mysql_query ($query);
		$jum	= mysql_num_rows($sql);
		$data 	= array();
		while ($row = mysql_fetch_assoc($sql)) {
			array_push($data, $row);
		}
		#sertakan library FPDF dan bentuk objek
		$pdf=new FPDF('l','mm','A4');
		$pdf->AddPage();
	
		#tampilkan judul laporan
		$pdf->SetMargins(4,40,30);

		$pdf->SetFont('Arial','B','16');
		//        kiri,atas,nama,
		$pdf->Cell(0,20, $judul, '0', 1, 'L');
		$pdf->SetFont('Times','B','10');
		$pdf->Cell(0,5, 'Total Data : '.$jum, '0', 1, 'L');
		 
		#buat header tabel
		$pdf->SetFont('Arial','','10');
		$pdf->SetFillColor(0,0,0);
		$pdf->SetTextColor(255);
		$pdf->SetDrawColor(204,204,204);
		
		$f2 = array();
		$f 	= array();
		$f_num = mysql_num_fields($sql);
		for ($fi=0; $fi < $f_num; ++$fi){
			$field = mysql_fetch_field($sql, $fi);
			$f[$field->name] = array();
			$f[$field->name]['name'] = $field->name;
			$pdf->Cell(50, 5, $field->name, 1, '0', 'C', true);
		}
		#setting judul laporan dan header tabel
		/*$header = array(
						array("label"=>"id", "length"=>10, "align"=>"L"),
						array("label"=>"nama_shiftkerja", "length"=>50, "align"=>"L"),
						array("label"=>"keterangan", "length"=>80, "align"=>"L")
					);
					*/
		
		//foreach ($header as $kolom) {
			#							(tinggi kolom header)
			//$pdf->Cell($kolom['length'], 3, $kolom['label'], 1, '0', $kolom['align'], true);
		//}
		$pdf->Ln();
		#tampilkan data tabelnya
		//$pdf->SetFillColor(0,255,255);
		$pdf->SetFillColor(249, 246, 244);
		$pdf->SetTextColor(0);
		$pdf->SetFont('');
		$fill=false;
		foreach ($data as $baris) {
			$i = 0;
			foreach ($baris as $cell) {
				//$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'], $fill);
				$pdf->Cell(50, 5, $cell, 1, '0', 'C', $fill);
				$i++;
			}
			$fill = !$fill;
			$pdf->Ln();
		}
		$pdf->Output();
	}
?>