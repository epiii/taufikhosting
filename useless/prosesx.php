<?php
	include"lib/koneks.php";
	$simpanQ=mysql_query("insert into tb_shiftkerja set nama_shiftkerja ='$_POST[nama_shiftkerjaTB]', keterangan ='$_POST[keteranganTB]'");
	if($simpanQ)
		echo " shift : $_POST[nama_shiftkerjaTB] <br> keterangan : $_POST[keteranganTB]";
	else
		echo "gagal menyimpan data (silahkan periksa database atau koneksi )";
?>