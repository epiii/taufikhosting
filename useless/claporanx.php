<?php 
	session_start();
	error_reporting(0);
	include "timeout.php";
	include"lib/fungsi_indotgl.php";

	require_once ("lib/fpdf17/fpdf.php");
	include"lib/koneks.php";

	#cekk
	#echo 'username :'.$_SESSION[namauser].' <br>';
	#echo 'pass :'.$_SESSION[passuser].' <br>';
	#echo 'login :'.$_SESSION[login];
	
	#cek session 'login' ksong atau tidak
	if($_SESSION[login]==1)
	{
		if(!cek_login())
		{
			$_SESSION[login] = 0;
		}
	}
	
	if($_SESSION[login]==0) //jika sesi login 0
	{
		echo "<script>alert('maaf waktu habis silahkan login lagi');window.close();</script>";
	}
	else //jika sesi login 1 
	{
		//jika sesi username &  passuser = kosong , sesi login = 0
		if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0)
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
				
				$tabely	= $_GET['tabelx'];
				$bulany = $_GET['bulan']; 
				$tahuny	= $_GET['tahun']; 
				$ruwet	= base64_encode($bulany.'ruwet'.$tahuny);
				if($_GET['ruwet']==$ruwet)
				{
					//$judul 	= $_GET['judulx'];
					$judul 	= 'Data Potensial Kanal';
					$tabel	= $_GET['tabelx'];	
					$query 	= "SELECT 
								bb.kode, 
								sr.netre, 
								sr.arnet, 
								la.nama AS linka, 
								lb.nama AS linkb, 
								st.sistra, 
								bb.avail2mbps,
								bb.availstm1,
								bb.availstm4,
								bb.availstm16,
								bb.availstm64,

								SUM( sr.used2mbps ) AS used2mbps, 
								SUM( sr.usedstm1 ) AS usedstm1, 
								SUM( sr.usedstm4 ) AS usedstm4, 
								SUM( sr.usedstm16 ) AS usedstm16, 
								SUM( sr.usedstm64 ) AS usedstm64, 
								us.user, 
								count( sr.id_user ) AS mea

							FROM 
								tb_sirkit sr, 
								tb_backbone bb, 
								tb_linka la, 
								tb_linkb lb, 
								tb_sistra st, 
								tb_user us

							WHERE 
								sr.id_backbone = bb.id_backbone
								AND sr.id_linka = la.id_linka
								AND sr.id_linkb = lb.id_linkb
								AND sr.id_sistra = st.id_sistra
								AND sr.id_user = us.id_user

							GROUP BY sr.id_backbone";
					$sql 	= mysql_query ($query);
					$jum	= mysql_num_rows($sql);
					$data 	= array();
					
					while ($row = mysql_fetch_assoc($sql)) 
					{
						array_push($data, $row);
					}
					$header = array(
						array('label'=>'ID', 'length'=>10, 'align'=>'C'),
						array('label'=>'Netre', 'length'=>14, 'align'=>'C'),
						array('label'=>'Arnet', 'length'=>14, 'align'=>'C'),
						array('label'=>'A','length'=>8, 'align'=>'C'),
						array('label'=>'B','length'=>8, 'align'=>'C'),
						array('label'=>'SisTra','length'=>35, 'align'=>'C'),
						array('label'=>'2mbps','length'=>11, 'align'=>'C'),
						array('label'=>'Kanal','length'=>11, 'align'=>'C'),
						array('label'=>'stm1','length'=>11, 'align'=>'C'),
						array('label'=>'stm4','length'=>11, 'align'=>'C'),
						array('label'=>'stm16','length'=>11, 'align'=>'C'),
						array('label'=>'stm64','length'=>11, 'align'=>'C'),
						array('label'=>'SLJJ','length'=>11, 'align'=>'C'),
						array('label'=>'MEA','length'=>11, 'align'=>'C'),
						array('label'=>'Flexi','length'=>11, 'align'=>'C'),
						array('label'=>'Speedy','length'=>11, 'align'=>'C'),
						array('label'=>'OLO','length'=>11, 'align'=>'C'),
						array('label'=>'MM','length'=>11, 'align'=>'C'),
						array('label'=>'L/C','length'=>11, 'align'=>'C'),
						array('label'=>'Lain','length'=>11, 'align'=>'C'),
						array('label'=>'Jum','length'=>11, 'align'=>'C'),
						array('label'=>'2mbps','length'=>11, 'align'=>'C'),
						array('label'=>'Kanal','length'=>11, 'align'=>'C'),
						array('label'=>'Ket','length'=>14, 'align'=>'C')
					);
					
					#buat object dr class library FPDF 
						$pdf = new FPDF('l','mm','A4');
						$pdf->AddPage();
				
					#setting untuk judul report
						//             left,   
						$pdf->SetMargins(4,   40,   89);
						//$pdf->SetMargins(4,40,30);
	
						$pdf->SetFont('Arial','B','16');
						//        kiri, atas,  nama,  
						$pdf->Cell(5,    10,  $judul, '0', 1, 'L');
						//$pdf->Cell(0,    20,  $judul, '0', 1, 'L');
						///$pdf->Ln(); 
						$pdf->SetFont('Times','B','10');
						$pdf->Cell(0,5, 'Total Data : '.$jum, '0', 1, 'L');
					
					#setting untuk header tabel
						$pdf->SetFont('Arial','','10');
						$pdf->SetFillColor(0,0,0);
						$pdf->SetTextColor(255);
						$pdf->SetDrawColor(204,204,204);
						
					#tampilkan header tabel
						foreach ($header as $kolom) {
							//               width,    height,    title   , ????, ??? ,  alignment   , color
							$pdf->Cell($kolom['length'], 10, $kolom['label'], 1,  '0', $kolom['align'], true);
							//$pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
						}
					
					/*
					#setting judul laporan dan header tabel
					$header = array(
									array("label"=>"id", "length"=>10, "align"=>"L"),
									array("label"=>"nama_shiftkerja", "length"=>50, "align"=>"L"),
									array("label"=>"keterangan", "length"=>80, "align"=>"L")
								);
					
					foreach ($header as $kolom) {
						#							(tinggi kolom header)
						$pdf->Cell($kolom['length'], 3, $kolom['label'], 1, '0', $kolom['align'], true);
					}
					*/
					$pdf->Ln();
					#tampilkan data tabelnya
					$pdf->SetFillColor(249, 246, 244);
					$pdf->SetTextColor(0);
					$pdf->SetFont('');
					$fill=false;
					
					foreach ($data as $baris) {
						$i = 0;
						foreach ($baris as $cell) {
							$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'], $fill);
							$i++;
						}
						$fill = !$fill;
						$pdf->Ln();
					}
					$pdf->Output();
				}else{ //url tidak sesuai
					echo 'maaf url tidak sesuai(dilarang merubah url)<br>';
					echo '<a href=../mux>kembali</a>';
				}
			}
		}
	}
?>