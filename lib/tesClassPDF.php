<?php
	include "koneks.php";
	
	$classPdf = new MyFpdf();
	
	$classPdf -> AddPage();
	$classPdf -> setTitle('judul');
	$classPdf -> SetFont('Arial', 'B', 13);
	
	$classPdf -> tabeleHeader(array('id', 'shift', 'keterangan'));
	echo $classPdf->Output();
?>