<pre lang="php">
<?php 
include "koneks.php";
require_once ("fpdf17/fpdf.php");
//mysql_select_db("$namedb"); 

//listing sebelimnya

$pdf->SetAutoPageBreak(true,15);
				$pdf->SetMargins(10,8,15);
				$pdf->AliasNbPages();
				$pdf->Ln(2);
				
				$pdf->SetFont('Times','',11);
				$pdf->Cell(7,12,'No.',1,0,'C');
				$pdf->Cell(55,12,'Nama',1,0,'C');
				$pdf->Cell(17,12,'Jabatan',1,0,'C');
				$pdf->Cell(32,6,'Penermaan Naskah',1,0,'C');
				$pdf->Cell(82,6,'Persetujuan Waktu Seminar',1,1,'C');
				$pdf->SetX(89);
				$pdf->SetFont('Times','B',11);
				$pdf->Cell(32,6,'Tanggal',1,0,'C');
				$pdf->Cell(13,6,'Paraf',1,0,'C');
				$pdf->Cell(18,6,'Hari/Tgl',1,0,'C');
				$pdf->Cell(13,6,'Jam',1,0,'C');
				$pdf->Cell(24,6,'TandaTangan',1,0,'C');
				$pdf->Cell(14,6,'Ruang',1,1,'C');
				$pdf->SetFont('Times','',11);
				
				$pdf->SetFont('Times', '',12);
				$pdf->Cell(7,12,'No.',1,0,'C');
				$pdf->MultiCell(55,5,$ketua ,0,'C',''); 
				//nah sy bermasalah d' sini,, bissa ngga' klo kolom selanjutnya letaknya pas d' samping kolom ini
				$pdf->Cell(17,12, 'Ketua',1,0,'C');
				$pdf->Cell(32,12,'',1,0,'C');
				$pdf->Cell(13,12,'',1,0,'C');
				$pdf->Cell(18,12,' ',1,0,'C');
				$pdf->Cell(13,12,' ',1,0,'C');
				$pdf->Cell(24,12,' ',1,0,'C');
				$pdf->Cell(14,12,' ',1,1,'C');
				
				?>