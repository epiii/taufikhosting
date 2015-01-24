<?php  
	/**
	 * @author Achmad Solichin
	 * @website http://achmatim.net
	 * @email achmatim@gmail.com
	 */
	require_once("fpdf17/fpdf.php");
	require_once("koneks.php");
	
	class FPDF_AutoWrapTable extends FPDF {
		private $data = array();
		/*private $options = array(
			'filename' => '',
			'destinationfile' => '',
			//'paper_size'=>'F4',
			'paper_size'=>'A4',
			//'orientation'=>'P'
			'orientation'=>'L'
		);
		*/
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
				$this->SetX($left); $this->Cell(0, 10, 'LAPORAN DATA DAERAH POTENSI KANAL ', 0, 1,'C');
											//	x,  x,               title,      border, space(enter), align 	
				$this->SetX($left); $this->Cell(0, 10, 'Arnet : Surabaya Barat',    0,         1,       'C');
				$this->SetX($left); $this->Cell(0, 10, 'Posisi : '.$blnx , 0, 1,'C');
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
						array('width'=>40,'height'=>13,'x'=>1,'label'=>'ID','align'=>'C','leftx'=>20,'space'=>0,'color'=>true),
						array('width'=>40,'height'=>13,'x'=>1,'label'=>'Netre','align'=>'C','leftx'=>40,'space'=>0,'color'=>true),
						array('width'=>40,'height'=>13,'x'=>1,'label'=>'Arnet', 'align'=>'C','leftx'=>40,'space'=>0,'color'=>true),
						array('width'=>30,'height'=>13,'x'=>1,'label'=>'A','align'=>'C','leftx'=>40,'space'=>0,'color'=>true),
						array('width'=>30,'height'=>13,'x'=>1,'label'=>'B','align'=>'C','leftx'=>30,'space'=>0,'color'=>true),
						array('width'=>50,'height'=>13,'x'=>1,'label'=>'SisTra','align'=>'C','leftx'=>30,'space'=>0,'color'=>true),
						array('width'=>35,'height'=>13,'x'=>1,'label'=>'2mb','align'=>'C','leftx'=>50,'space'=>0,'color'=>true),
						array('width'=>35,'height'=>13,'x'=>1,'label'=>'Kanal','align'=>'C','leftx'=>35,'space'=>0,'color'=>true),
						array('width'=>35,'height'=>13,'x'=>1,'label'=>'stm1','align'=>'C','leftx'=>35,'space'=>0,'color'=>true),
						array('width'=>35,'height'=>13,'x'=>1,'label'=>'stm4','align'=>'C','leftx'=>35,'space'=>0,'color'=>true),
						array('width'=>35,'height'=>13,'x'=>1,'label'=>'stm16','align'=>'C','leftx'=>35,'space'=>0,'color'=>true),
						array('width'=>35,'height'=>13,'x'=>1,'label'=>'stm64','align'=>'C','leftx'=>35,'space'=>0,'color'=>true),
						array('width'=>35,'height'=>13,'x'=>1,'label'=>'SLJJ','align'=>'C','leftx'=>35,'space'=>0,'color'=>true),
						array('width'=>35,'height'=>13,'x'=>1,'label'=>'MEA','align'=>'C','leftx'=>35,'space'=>0,'color'=>true),
						array('width'=>35,'height'=>13,'x'=>1,'label'=>'Flexi','align'=>'C','leftx'=>35,'space'=>0,'color'=>true),
						array('width'=>35,'height'=>13,'x'=>1,'label'=>'Spdy','align'=>'C','leftx'=>35,'space'=>0,'color'=>true),
						array('width'=>35,'height'=>13,'x'=>1,'label'=>'OLO','align'=>'C','leftx'=>35,'space'=>0,'color'=>true),
						array('width'=>35,'height'=>13,'x'=>1,'label'=>'MM','align'=>'C','leftx'=>35,'space'=>0,'color'=>true),
						array('width'=>35,'height'=>13,'x'=>1,'label'=>'L/C','align'=>'C','leftx'=>35,'space'=>0,'color'=>true),
						array('width'=>35,'height'=>13,'x'=>1,'label'=>'Lain','align'=>'C','leftx'=>35,'space'=>0,'color'=>true),
						array('width'=>35,'height'=>13,'x'=>1,'label'=>'Jum','align'=>'C','leftx'=>35,'space'=>0,'color'=>true),
						array('width'=>35,'height'=>13,'x'=>1,'label'=>'2mb','align'=>'C','leftx'=>35,'space'=>0,'color'=>true),
						array('width'=>35,'height'=>13,'x'=>1,'label'=>'Kanal','align'=>'C','leftx'=>35,'space'=>0,'color'=>true),
						array('width'=>35,'height'=>13,'x'=>1,'label'=>'Ket','align'=>'C','leftx'=>35,'space'=>0,'color'=>true)
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
							/*$baris['nip'], 
							$baris['nama'], 
							$baris['alamat'], 
							$baris['email'], 
							$baris['website']*/
							$baris['kode'], 
							$baris['netre'], 
							$baris['arnet'], 
							$baris['linka'], 
							$baris['linkb'], 
							$baris['sistra'], 
							$baris['2mbps'], 
							$baris['stm1'], 
							$baris['stm4'], 
							$baris['stm16'], 
							$baris['stm64'],
							$baris['used2mbps'],
							$baris['usedstm1'],
							$baris['usedstm4'],
							$baris['usedstm16'],
							$baris['usedstm64'],
							$baris['user'],
							$baris['user'],
							$baris['mea'],
							$baris['user'],
							$baris['user'],
							$baris['user'],
							$baris['user'],
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
						bb.kode, 
						sr.netre, 
						sr.arnet, 
						la.nama AS linka, 
						lb.nama AS linkb, 
						st.sistra, 
						bb.avail2mbps as 2mbps,
						bb.availstm1 as stm1,
						bb.availstm4 as stm4,
						bb.availstm16 as stm16,
						bb.availstm64 as stm64,

						SUM( sr.used2mbps ) AS used2mbps, 
						SUM( sr.usedstm1 ) AS usedstm1, 
						SUM( sr.usedstm4 ) AS usedstm4, 
						SUM( sr.usedstm16 ) AS usedstm16, 
						SUM( sr.usedstm64 ) AS usedstm64, 
						us.user, 
						count( sr.id_user ) AS mea,
						sr.keterangan
						
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
			
	//contoh penggunaan
	/*$dataX = array(
		array(
			'nip'		=> '0111500382',
			'nama' 		=> 'ACHMAD SOLICHIN',
			'alamat' 	=> 'Jalan Ciledug Raya No 99, Petukangan Utara, Jakarta Selatan 12260, DKI Jakarta',
			'email' 	=> 'achmatim@gmail.com',
			'website' 	=> 'http://achmatim.net'
		),
		array(
			'nip'		=> '0411500101',
			'nama' 		=> 'CHOTIMATUL MUSYAROFAH',
			'alamat' 	=> 'Komplek Japos RT 002/015 Kelurahan Peninggilan, Kec. Ciledug, Tangerang',
			'email' 	=> 'chotimatul.musyarofah@gmail.com',
			'website' 	=> 'http://contohprogram.info'
		),
		array(
			'nip'		=> '1111500200',
			'nama' 		=> 'MUHAMMAD LINTANG ANUGRAH CAHAYA BULAN PURNAMA PUTRA',
			'alamat' 	=> 'Jl. Raya Caplin, Kec. Ciledug, Tangerang, Banten',
			'email' 	=> 'achmatim@yahoo.com',
			'website' 	=> 'http://ebook.achmatim.net'
		)
	);*/
	
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
?>
