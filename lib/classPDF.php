<?php 
	require_once ("fpdf17/fpdf.php");
	class MyFpdf extends FPDF{
		function tableHeader($header){
			foreach($header as $col){
				$this->Cell(38,7,$col, 1,0,'L',0);		
			}
			$this->Ln();
		}
	}

?>