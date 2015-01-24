<?php 
	#$group_name = "The Thursday Thumpers";
	#$member_name = "EleventyOne";
	#$conn = new mysqli($db_host,$db_user,$db_passwd,$db_name); // error-check this
	$conn = new mysqli('localhost','root','cr0ssdomain','k3nata'); // error-check this
	
	// note: this is meant for InnoDB tables. won't work with MyISAM tables.
	
	try {
		$conn->autocommit(FALSE); // i.e., start transaction
		// assume that the TABLE groups has an auto_increment id field
		$query 	= "insert into tb_kecelakaan set 	id_jkecel ='1', 
													judul_kejadian = '$_POST[judul_kejadianTB]',
													tgl_kejadian= $_POST[tgl_kejadianTB],
													tgl_lapor= $_POST[tgl_laporTB],
													jam_kejadian= $_POST[jam_kejadianTB],
													jam_lapor= $_POST[jam_laporTB],
													/*pelapor= $_POST[pelaporTB],
													laporke= $_POST[laporkeTB],
													uraian= $_POST[uraianTB],
													pjawablokasi= $_POST[pjawablokasiTB],*/
													kerugian= '1'
													 ";
		#$query .= "VALUES ('$group_name')";
		$result = $conn->query($query);
		if ( !$result ) {
			$result->free();
			throw new Error($conn->error);
			echo '"status":"gagal"';
		}
	
		$idx = $conn->insert_id; // last auto_inc id from *this* connection
		
		$query = "insert into tb_kerusakanling set	id_kecelakaan='$idx', 
												id_tipedampak='1', 
												agen_pencemar='$_POST[agen_pencemarTB]',
												volume='$_POST[volumeTB]',
												area_terpapar='$_POST[area_terpaparTB]',
												durasi_terpapar='$_POST[durasi_terpaparTB]',
												durasi_dampak_papar='$_POST[durasi_dampak_paparTB]',
												komen_tambahan='$_POST[komen_tambahanTB]'";
		#$query .= "VALUES ('$group_id','$member_name')";
		$result = $conn->query($query);
		if ( !$result ) {
			$result->free();
			throw new Error($conn->error);
		}
		$conn->commit();
		$conn->autocommit(TRUE); // i.e., end transaction
	}
	catch ( Exception $e ) {
		$conn->rollback(); 
		$conn->autocommit(TRUE); // i.e., end transaction   
		echo '"status":"gagal"';
	}
	
	
	
	
	
	
	
	
	//======================
	
	?>