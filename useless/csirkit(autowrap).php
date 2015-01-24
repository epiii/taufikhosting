<?php  
	session_start();
	//error_reporting(0);
	include "../lib/timeout.php";
		require_once "../lib/fpdf17/fpdf.php";
	require_once "../lib/koneks.php";
	
	#epi script ================================================================
	if($_SESSION[loginMUX]==1)
	{
		if(!cek_loginMUX())
		{
			$_SESSION[loginMUX] = 0;
		}
	}
	#gak ada sesi
	if($_SESSION[loginMUX]==0) 
	{
		echo "<script>alert('maaf waktu habis silahkan login lagi');window.close();</script>";
	}
	#end of gak ada sesi
	
	#ada sesi 
	else  
	{
		#GAK ADA username, passuser, login 
		if (empty($_SESSION['namauserMUX']) AND empty($_SESSION['passuserMUX']) AND $_SESSION['loginMUX']==0)
		{
			echo "<script>window.location='default.php'</script>";
		}#end of GAK ADA username, passuser, login kosong 
		
		#ADA username, passuser, login 
		else
		{	
			#set merk, backb , tahun, bulan, ruwet
			if($_GET['merk'] and $_GET['backb'] and $_GET['tahun'] and $_GET['bulan'] and $_GET['ruwet'])
			{
				$blnx	= array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");		
				
				$merky	= $_GET['merk'];
				$backby	= $_GET['backb'];
				$tahuny	= $_GET['tahun']; 
				$bulany = $_GET['bulan']; 
				
				$tabely	= $_GET['tabelx'];
				$bul	= $blnx[$bulany];
				
				$sql 	= 'select *  from tb_peg where id_peg = '.$_SESSION['id_user'];
				$exe 	=mysql_query($sql);
				$ambil	=mysql_fetch_array($exe);
				$idsesi	=$ambil['id_session'];
				
				$ruwet	= base64_encode($idsesi.$bulany.$tahuny.$backby.$merky);
				#ruwet cocok			
				if($_GET['ruwet']==$ruwet)
				{
#end of epi script ================================================================
	
				class FPDF_AutoWrapTable extends FPDF {
					private $data = array();
					
					//public $tahun === $_GET['ruwet'];
					//public $tahun = $_GET['tahun'];
					//var_dump($tahun);exit();
					
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
							$this->SetX($left); $this->Cell(0, 10, 'LAPORAN SIRKIT KANAL TRANSPORT BACKBONE ARNET SBB', 0, 1,'C');
														//	x,  x,               title,      border, space(enter), align 	
							//$this->SetX($left); $this->Cell(0, 10, 'Posisi : '.$bul, 0, 1,'C');
							$this->SetX($left); $this->Cell(0, 10, 'backbone: '.$backby, 0, 1,'C');
							$this->SetX($left); $this->Cell(0, 10, 'tahun: '.$tahun, 0, 1,'C');
							$this->SetX($left); $this->Cell(0, 10, 'Total :'.$jum, 0, 1,'L');
							$this->Ln(10);
						//end of Title header
						
						//table header (properties-all)
							//$h 		= 13; // height (cell)
							$h 		= 20; // height (cell)
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
									array('width'=>50,'height'=>13,'x'=>1,'label'=>'channel A','align'=>'C','leftx'=>20,'space'=>0,'color'=>true),
									array('width'=>50,'height'=>13,'x'=>1,'label'=>'channel B','align'=>'C','leftx'=>50,'space'=>0,'color'=>true),
									array('width'=>30,'height'=>13,'x'=>1,'label'=>'Kota A','align'=>'C','leftx'=>50,'space'=>0,'color'=>true),
									array('width'=>30,'height'=>13,'x'=>1,'label'=>'Kota B','align'=>'C','leftx'=>30,'space'=>0,'color'=>true),
									array('width'=>40,'height'=>13,'x'=>1,'label'=>'ddf A','align'=>'C','leftx'=>30,'space'=>0,'color'=>true),
									array('width'=>40,'height'=>13,'x'=>1,'label'=>'ddf B','align'=>'C','leftx'=>40,'space'=>0,'color'=>true),
									array('width'=>40,'height'=>13,'x'=>1,'label'=>'user','align'=>'C','leftx'=>40,'space'=>0,'color'=>true),
									array('width'=>40,'height'=>13,'x'=>1,'label'=>'tid','align'=>'C','leftx'=>40,'space'=>0,'color'=>true),
									array('width'=>40,'height'=>13,'x'=>1,'label'=>'diu','align'=>'C','leftx'=>40,'space'=>0,'color'=>true),
									array('width'=>40,'height'=>13,'x'=>1,'label'=>'tc','align'=>'C','leftx'=>40,'space'=>0,'color'=>true),
									array('width'=>50,'height'=>13,'x'=>1,'label'=>'ddf tc','align'=>'C','leftx'=>40,'space'=>0,'color'=>true),
									array('width'=>50,'height'=>13,'x'=>1,'label'=>'ddf user','align'=>'C','leftx'=>50,'space'=>0,'color'=>true),
									array('width'=>70,'height'=>13,'x'=>1,'label'=>'keterangan','align'=>'C','leftx'=>50,'space'=>0,'color'=>true)
							);
							foreach ($tbHeader as $col){
								$this->SetX($left += $col['leftx']);  
								$this->Cell($col['width'],$col['height'],$col['label'],$col['x'],$col['space'],$col['align'],$col['color']);
							}$this->Ln();
						//end of table header (properties)
						
						$this->SetFont('Arial','',9);
						//width of cells in datagrid
							//$kol = array();
							$widthz = array();
							$alignz = array();
							//$i='';
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
										WHERE 
											id_backbone = '$backby' and 
											year(tgl_update)<='$tahuny' and 
											month(tgl_update)<='$bulany'
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

#epi script ================================================================
				}#end of ruwet cocok
				
				#ruwet GAK cocok
				else{ //url tidak sesuai
					echo 'maaf url tidak sesuai(dilarang merubah url)<br>';
					echo '<a href=../mux/?hlm=bHNpcmtpdA==>kembali</a>';
				}#end of ruwet GAK cocok
			}#end of set merk, backb , tahun, bulan, ruwet
		}#end of ADA username, passuser, login 
	}#end of ada sesi 
	
#end of epi script ================================================================
?>
