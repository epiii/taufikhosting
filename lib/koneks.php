<?php 
	#online
	// $host	= 'mysql.idhostinger.com';
	// $user	= 'u889742410_mux';
	// $pass	= '1tambah1=2';
	// $db		= 'u889742410_mux';
	#local
	$host	= 'localhost';
	$user	= 'root';
	$pass	= '';
	$db		= 'mux';
	
	$konekx = mysql_connect($host,$user,$pass) or die('can.t connect with database server');
	$dbx	= mysql_select_db($db) or die('can.t select database');
	
	//if(!$konekx) echo "<script>alert('maaf tidak terhubung dengan database ') < /script>";
?>
