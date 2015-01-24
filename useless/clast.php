<?php  
	session_start();
	//error_reporting(0);
	include "timeout.php";
		require_once("lib/fpdf17/fpdf.php");
	require_once("lib/koneks.php");
	
	#add ================================================================
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
			if($_GET['bulan'] and $_GET['tahun'] and $_GET['ruwet'] and $_GET['backb'])
			{
				//echo 'halo';
				$blnx= array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");		
				
				$backby	= $_GET['backb'];
				$tabely	= $_GET['tabelx'];
				$bulany = $_GET['bulan']; 
				$bul	= $blnx[$bulany];
				$tahuny	= $_GET['tahun']; 
				$ruwet	= base64_encode($bulany.'ruwet'.$tahuny);
				if($_GET['ruwet']==$ruwet)
				{
	
				#add ================================================================
				class FPDF_AutoWrapTable extends FPDF {
					private $data = array();
					
					function __construct($data = array(), $options = array()) {
						parent::__construct();
						$this->data = $data;
						$this->options = $options;
					}
					
					public function rptDetailData () {
						$border = 0;
						$this->AddPage();
						$this->SetAutoPageBreak(true,60);
						$this->AliasNbPages();
						$left = 25;
						
						//Title header
							//$blnx=$_GET['bln'];
							$blnx='Agustus';
							$this->SetFont("", "B", 15);
							$this->MultiCell(0, 12, 'PT. TELKOM INDONESIA');
							$this->Cell(0, 1, " ", "B"); 
							$this->Ln(10);
							//$this->SetFont("", "B", 12);
							$this->SetFont("", "B", 10);
							$this->SetX($left); $this->Cell(0, 10, 'LAPORAN DATA SIRKIT KANAL TRANSPORT BACK BONE ARNET SBB ', 0, 1,'C');
														//	x,  x,               title,      border, space(enter), align 	
							$this->SetX($left); $this->Cell(0, 10, 'LINK : $',    0,         1,       'C');
							$this->SetX($left); $this->Cell(0, 10, 'Posisi : '.$bul, 0, 1,'C');
							$this->SetX($left); $this->Cell(0, 10, 'Total :'.$jum, 0, 1,'L');
							$this->Ln(10);
						//end of Title header
						
						//table header (properties-all)
							$h 		= 13; // height (cell)
							$left 	= 40; //left's margin (cell)
							$top 	= 80; // top's margin (cell)
							$space	= 0; // space(enter) between cell => no enter
							$space2	= 1; // space(enter) between cell => enter
							//$pdf->SetFillColor(0,0,0);
								
							$this->SetFillColor(0,0,0);	
							$this->SetTextColor(255);
							$this->SetDrawColor(204,204,204);
							//$this->SetFillColor(200,200,200);	
							$left = $this->GetX();
							$tbHeader = 
								array(
									array('width'=>20,'height'=>13,'x'=>1,'label'=>	'no','align'=>'C','leftx'=>0,'space'=>0,'color'=>true), // no
									array('width'=>40,'height'=>13,'x'=>1,'label'=>'Chnl A','align'=>'C','leftx'=>20,'space'=>0,'color'=>true),
									array('width'=>40,'height'=>13,'x'=>1,'label'=>'Chnl B','align'=>'C','leftx'=>40,'space'=>0,'color'=>true),
									array('width'=>40,'height'=>13,'x'=>1,'label'=>'Kota A', 'align'=>'C','leftx'=>40,'space'=>0,'color'=>true),
									array('width'=>30,'height'=>13,'x'=>1,'label'=>'Kota B','align'=>'C','leftx'=>40,'space'=>0,'color'=>true),
									array('width'=>30,'height'=>13,'x'=>1,'label'=>'DDF A','align'=>'C','leftx'=>30,'space'=>0,'color'=>true),
									array('width'=>50,'height'=>13,'x'=>1,'label'=>'DDF B','align'=>'C','leftx'=>30,'space'=>0,'color'=>true),
									array('width'=>35,'height'=>13,'x'=>1,'label'=>'user','align'=>'C','leftx'=>50,'space'=>0,'color'=>true),
									array('width'=>35,'height'=>13,'x'=>1,'label'=>'TID','align'=>'C','leftx'=>35,'space'=>0,'color'=>true),
									array('width'=>35,'height'=>13,'x'=>1,'label'=>'DIU','align'=>'C','leftx'=>35,'space'=>0,'color'=>true),
									array('width'=>35,'height'=>13,'x'=>1,'label'=>'TC','align'=>'C','leftx'=>35,'space'=>0,'color'=>true),
									array('width'=>35,'height'=>13,'x'=>1,'label'=>'DDF TC','align'=>'C','leftx'=>35,'space'=>0,'color'=>true),
									array('width'=>35,'height'=>13,'x'=>1,'label'=>'DDF User','align'=>'C','leftx'=>35,'space'=>0,'color'=>true),
									array('width'=>35,'height'=>13,'x'=>1,'label'=>'Ket','align'=>'C','leftx'=>35,'space'=>0,'color'=>true)
							);
							foreach ($tbHeader as $col){
								$this->SetX($left += $col['leftx']);  
								$this->Cell($col['width'],$col['height'],$col['label'],$col['x'],$col['space'],$col['align'],$col['color']);
							}$this->Ln();
						//end of table header (properties)
						
						$this->SetFont('Arial','',9);
							$widthz = array();
							$alignz = array();
							foreach ($tbHeader as $cols){
								$widthz[] = $cols['width'];
								$alignz[] = $cols['align'];
								/*$i=0;
								$kol[]= array(
									'w'=>$cols['width'],
									'a'=>$cols['align'],  
								);
								$i++;*/
								//$kol[]= $cols['width'];  
							}
							/*$this->SetWidths($kol[$i]['w']);  
							$this->SetAligns($kol[$i]['a']);*/  
							$this->SetWidths($widthz);  
							$this->SetAligns($alignz);  
						//end of width of cells in datagrid
						
						//$this->SetAligns(array('C','L','L','L','L','L'));
						$no = 1; 
						$this->SetFillColor(255);
						$this->SetTextColor(0);
						//$this->SetFillColor(0,0,0);	
						//$this->SetDrawColor(204,204,204);
						
						#show loop data
						foreach ($this->data as $baris){
							$this->Row(
									array($no++, 
										$baris['channelida'], 
										$baris['channelidb'], 
										$baris['linka'], 
										$baris['linkb'], 
										$baris['ddf_a'], 
										$baris['ddf_b'], 
										$baris['user'], 
										$baris['tid'], 
										$baris['diu'], 
										$baris['tc'], 
										$baris['ddf_tc'], 
										$baris['ddf_user'],
										$baris['keterangan']
									));
						}
					}
				
					public function printPDF () {
						//if ($this->options['paper_size'] == "F4") {
						if ($this->options['paper_size'] == "A4") {
							$a = 8.3 * 72; //1 inch = 72 pt
							$b = 13.0 * 72;
							$this->FPDF($this->options['orientation'], "pt", array($a,$b));
						} else {
							$this->FPDF($this->options['orientation'], "pt", $this->options['paper_size']);
						}
						
						$this->SetAutoPageBreak(false);
						$this->AliasNbPages();
						$this->SetFont("helvetica", "B", 10);
						//$this->AddPage();
					
						$this->rptDetailData();
								
						$this->Output($this->options['filename'],$this->options['destinationfile']);
					}
					
					private $widths;
					private $aligns;
				
					function SetWidths($w)
					{
						//Set the array of column widths
						$this->widths=$w;
					}
				
					function SetAligns($a)
					{
						//Set the array of column alignments
						$this->aligns=$a;
					}
				
					function Row($data)
					{
						//Calculate the height of the row
						$nb=0;
						for($i=0;$i<count($data);$i++)
							$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
						$h=10*$nb;
						//Issue a page break first if needed
						$this->CheckPageBreak($h);
						//Draw the cells of the row
						for($i=0;$i<count($data);$i++)
						{
							$w=$this->widths[$i];
							$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
							//Save the current position
							$x=$this->GetX();
							$y=$this->GetY();
							//Draw the border
							$this->Rect($x,$y,$w,$h);
							//Print the text
							$this->MultiCell($w,10,$data[$i],0,$a);
							//Put the position to the right of the cell
							$this->SetXY($x+$w,$y);
						}
						//Go to the next line
						$this->Ln($h);
					}
				
					function CheckPageBreak($h)
					{
						//If the height h would cause an overflow, add a new page immediately
						if($this->GetY()+$h>$this->PageBreakTrigger)
							$this->AddPage($this->CurOrientation);
					}
				
					function NbLines($w,$txt)
					{
						//Computes the number of lines a MultiCell of width w will take
						$cw=&$this->CurrentFont['cw'];
						if($w==0)
							$w=$this->w-$this->rMargin-$this->x;
						$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
						$s=str_replace("\r",'',$txt);
						$nb=strlen($s);
						if($nb>0 and $s[$nb-1]=="\n")
							$nb--;
						$sep=-1;
						$i=0;
						$j=0;
						$l=0;
						$nl=1;
						while($i<$nb)
						{
							$c=$s[$i];
							if($c=="\n")
							{
								$i++;
								$sep=-1;
								$j=$i;
								$l=0;
								$nl++;
								continue;
							}
							if($c==' ')
								$sep=$i;
							$l+=$cw[$c];
							if($l>$wmax)
							{
								if($sep==-1)
								{
									if($i==$j)
										$i++;
								}
								else
									$i=$sep+1;
								$sep=-1;
								$j=$i;
								$l=0;
								$nl++;
							}
							else
								$i++;
						}
						return $nl;
					}
				} //end of class
						$query 	= "SELECT
									s.id_sirkit,
									s.id_per_detail,
									pd.channelida,
									pd.channelidb,
									pd.ddf_a,
									pd.ddf_b,
									s.kondisi,
									bb.kode as backbone,
									a.nama as linka,
									b.nama as linkb,
									u.user,
									s.st_a,
									s.st_b,
									s.tc,
									s.ddf_tc,
									s.ddf_user,
									s.tid,
									s.diu,
									s.tie_line,
									st.sistra,
									s.keterangan,
									s.tgl_update

								FROM 
									tb_sirkit s
									INNER JOIN (
										SELECT id_per_detail, MAX(tgl_update) AS tanggal
											FROM tb_sirkit 
											WHERE id_backbone = '$backby'
											GROUP BY id_per_detail
											ORDER BY id_per_detail,tgl_update
										)tb_tgl 
									ON 
									(
										s.id_per_detail	= tb_tgl.id_per_detail AND 
										s.tgl_update 	= tb_tgl.tanggal
									)
									INNER JOIN tb_backbone bb 
										ON s.id_backbone = bb.id_backbone 
									INNER JOIN tb_linka a 
										ON s.id_linka = a.id_linka
									INNER JOIN tb_linkb b 
										ON s.id_linkb = b.id_linkb 
									INNER JOIN tb_user u 
										ON s.id_user = u.id_user
									INNER JOIN tb_sistra st 
										ON s.id_sistra = st.id_sistra
									INNER JOIN tb_perangkat_detail pd
										ON s.id_per_detail = pd.id_per_detail
								";
						//var_dump($query);exit();
						$sql 	= mysql_query ($query);
						$jum	= mysql_num_rows($sql);
						$data 	= array();
						
						while ($row = mysql_fetch_assoc($sql)) 
						{
							array_push($data, $row);
						}
					
				//pilihan
				$options = array(
					'filename' => '', //nama file penyimpanan, kosongkan jika output ke browser
					'destinationfile' => '', //I=inline browser (default), F=local file, D=download
					//'paper_size'=>'F4',	//paper size: F4, A3, A4, A5, Letter, Legal
					'paper_size'=>'A4',	//paper size: F4, A3, A4, A5, Letter, Legal
					'orientation'=>'L' //orientation: P=portrait, L=landscape
				);
				
				$tabel = new FPDF_AutoWrapTable($data, $options);
				$tabel->printPDF();

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
