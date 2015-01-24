<?php
	/*if(!$_POST['page']) 
	{
		die("0");
	}*/
	$page = $_POST['page'];
	
	//if(file_exists('pages/'.$page.'.php'))
		//echo file_get_contents('pages/'.$page.'.php');
	if(file_exists($page.'.php'))
		echo file_get_contents($page.'.php');
	else 
		echo 'halaman tidak ditemukan!';
?>
