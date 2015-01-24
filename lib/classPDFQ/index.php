<?php
	//include our custom fpdf class
	//include 'my.fpdf.php';
	include 'classPDFQ.php';
	
	//instantiate the class
	$myFPDF = new Myfpdf();
	
	//create the pdf
	$myFPDF->AddPage();
	$myFPDF->setTitle('Title');
	$myFPDF->setFont('Arial', 'B', 15);
	
	//set up the Header values and call it
	//$myFPDF->tableHeader(array('Header 1', 'Header 2', 'Header 3', 'Header 4'));
	$myFPDF->tableHeader(array('ID', 'nama', 'alamat', 'kode pos','no telp', 'kota'));
	
	echo $myFPDF->Output('test_header.pdf','I');
?>
