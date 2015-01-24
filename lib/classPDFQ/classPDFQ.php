<?php 
//include the core fpdf library
include '../fpdf17/fpdf.php';

//create our custom class
class Myfpdf extends FPDF
{
	//takes an array of values and prints them as text headers with a black border around each one
	function tableHeader($header)
	{
		foreach($header as $col)
		{
			$this->Cell(38,7,$col,1,0,'L',0);
		}
		$this->Ln();
		
		//tambahan 
		function LoadData() 
		{ 
			$data=array(); 
			mysql_connect("localhost","root","cr0ssdomain"); 
			mysql_select_db("k3nata"); 
			$query = "SELECT * FROM tb_shiftkerja"; 
			$hasil = mysql_query($query); 
			$i = 0; 
			while ($fetchdata = mysql_fetch_assoc($hasil)) 
			{ 
				$i++; // membuat counter 1, 2, 3, ... untuk ditampilkan 
				array_unshift($fetchdata,$i); 
				$data[] = $fetchdata;  
			} 
			return $data; 
		} 
		// tmbahan 
	}
}

?>
