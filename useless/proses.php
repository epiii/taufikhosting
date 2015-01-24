<?php
	include "lib/koneks.php";
	$search = mysql_real_escape_string($_GET['term']);    
    $result = mysql_query("	SELECT * 
							FROM 
								tb_pekerja pk ,
								tb_jabatan jb,
								tb_bagian bg,
								tb_department dp,
								tb_shiftkerja sf,
								tb_statuskerja sk
							
							WHERE 
								pk.nama_pekerja LIKE '%$search%' and
								pk.id_jabatan = jb.id_jabatan and
								pk.id_bagian= bg.id_bagian and
								pk.id_department= dp.id_department and
								pk.id_shiftkerja= sf.id_shiftkerja and
								pk.id_statuskerja= sk.id_statuskerja 
								ORDER BY pk.nama_pekerja ASC") or die('Something went wrong');
    $rows = array();
    while ($row = mysql_fetch_assoc($result)){
        $rows[] = $row;
    }
	print json_encode($rows);
?>