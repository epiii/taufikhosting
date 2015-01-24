<?php
	session_start();
	include '../lib/koneks.php';
	$menu	=  $_GET['menu'];
	$outputx=array();
	
	if(isset($_GET['data'])){
		switch($menu){
			case'dapot':
			$tahun 	= $_GET['tahun'];
			$bulan	= $_GET['bulan'];
			
			$sql 	= "SELECT
						b.id_backbone,
						b.kode,
						b.avail2mbps,
						(30 * b.avail2mbps) AS availkanal,
						tbsljj2.usedsljj,
						tbmea2.usedmea,
						tbflexi2.usedflexi,
						tbspeedy2.usedspeedy,
						tbolo2.usedolo,
						tbmm2.usedmm,
						tblc2.usedlc,
						tblain2.usedlain,
						tb2mbps2.used2mbps,
						(
							avail2mbps - tb2mbps2.used2mbps
						) AS free2mbps,
						(
							30 * (
								avail2mbps - tb2mbps2.used2mbps
							)
						) AS freekanal,
						tbkondrusak2.jumrusak
					FROM
						tb_backbone b
					LEFT JOIN (
						SELECT
							tb2mbps.id_backbone,
							count(*) used2mbps
						FROM
							(
								SELECT
									s.id_per_detail,
									pd.id_backbone,
									MAX(tgl_update) AS tanggal
								FROM
									tb_sirkit s,
									tb_perangkat_detail pd
								WHERE
									YEAR (s.tgl_update) <= '$tahun'
								AND MONTH (s.tgl_update) <= '$bulan'
								AND pd.id_per_detail = s.id_per_detail
								GROUP BY
									id_per_detail
								ORDER BY
									tgl_update DESC
							) tb2mbps
						GROUP BY
							tb2mbps.id_backbone
					) tb2mbps2 ON tb2mbps2.id_backbone = b.id_backbone
					LEFT JOIN (
						SELECT
							tbspeedy.id_backbone,
							count(*) usedspeedy
						FROM
							(
								SELECT
									s.id_per_detail,
									pd.id_backbone,
									MAX(tgl_update) AS tanggal
								FROM
									tb_sirkit s,
									tb_perangkat_detail pd
								WHERE
									YEAR (s.tgl_update) <= $tahun
								AND MONTH (s.tgl_update) <=$bulan
								AND s.id_user = (
									SELECT
										id_user
									FROM
										tb_user
									WHERE
										USER = 'speedy'
								)
								AND pd.id_per_detail = s.id_per_detail
								GROUP BY
									id_per_detail
								ORDER BY
									tgl_update DESC
							) tbspeedy
						GROUP BY
							tbspeedy.id_backbone
					) tbspeedy2 ON tbspeedy2.id_backbone = b.id_backbone
					LEFT JOIN (
						SELECT
							tbsljj.id_backbone,
							count(*) usedsljj
						FROM
							(
								SELECT
									s.id_per_detail,
									pd.id_backbone,
									MAX(tgl_update) AS tanggal
								FROM
									tb_sirkit s,
									tb_perangkat_detail pd
								WHERE
									YEAR (s.tgl_update) <= $tahun
								AND MONTH (s.tgl_update) <=$bulan
								AND s.id_user = (
									SELECT
										id_user
									FROM
										tb_user
									WHERE
										USER = 'sljj'
								)
								AND pd.id_per_detail = s.id_per_detail
								GROUP BY
									id_per_detail
								ORDER BY
									tgl_update DESC
							) tbsljj
						GROUP BY
							tbsljj.id_backbone
					) tbsljj2 ON tbsljj2.id_backbone = b.id_backbone
					LEFT JOIN (
						SELECT
							tbflexi.id_backbone,
							count(*) usedflexi
						FROM
							(
								SELECT
									s.id_per_detail,
									pd.id_backbone,
									MAX(tgl_update) AS tanggal
								FROM
									tb_sirkit s,
									tb_perangkat_detail pd
								WHERE
									YEAR (s.tgl_update) <= $tahun
								AND MONTH (s.tgl_update) <=$bulan
								AND s.id_user = (
									SELECT
										id_user
									FROM
										tb_user
									WHERE
										USER = 'flexi'
								)
								AND pd.id_per_detail = s.id_per_detail
								GROUP BY
									id_per_detail
								ORDER BY
									tgl_update DESC
							) tbflexi
						GROUP BY
							tbflexi.id_backbone
					) tbflexi2 ON tbflexi2.id_backbone = b.id_backbone
					LEFT JOIN (
						SELECT
							tbmm.id_backbone,
							count(*) usedmm
						FROM
							(
								SELECT
									s.id_per_detail,
									pd.id_backbone,
									MAX(tgl_update) AS tanggal
								FROM
									tb_sirkit s,
									tb_perangkat_detail pd
								WHERE
									YEAR (s.tgl_update) <= $tahun
								AND MONTH (s.tgl_update) <=$bulan
								AND s.id_user = (
									SELECT
										id_user
									FROM
										tb_user
									WHERE
										USER = 'mm'
								)
								AND pd.id_per_detail = s.id_per_detail
								GROUP BY
									id_per_detail
								ORDER BY
									tgl_update DESC
							) tbmm
						GROUP BY
							tbmm.id_backbone
					) tbmm2 ON tbmm2.id_backbone = b.id_backbone
					LEFT JOIN (
						SELECT
							tblain.id_backbone,
							count(*) usedlain
						FROM
							(
								SELECT
									s.id_per_detail,
									pd.id_backbone,
									MAX(tgl_update) AS tanggal
								FROM
									tb_sirkit s,
									tb_perangkat_detail pd
								WHERE
									YEAR (s.tgl_update) <= $tahun
								AND MONTH (s.tgl_update) <=$bulan
								AND s.id_user NOT IN (
									SELECT
										id_user
									FROM
										tb_user
									WHERE
										USER = 'sljj'
									OR USER = 'mea'
									OR USER = 'flexi'
									OR USER = 'speedy'
									OR USER = 'olo'
									OR USER = 'l/c'
									OR USER = 'mm'
								)
								AND pd.id_per_detail = s.id_per_detail
								GROUP BY
									id_per_detail
								ORDER BY
									tgl_update DESC
							) tblain
						GROUP BY
							tblain.id_backbone
					) tblain2 ON tblain2.id_backbone = b.id_backbone
					LEFT JOIN (
						SELECT
							tblc.id_backbone,
							count(*) usedlc
						FROM
							(
								SELECT
									s.id_per_detail,
									pd.id_backbone,
									MAX(tgl_update) AS tanggal
								FROM
									tb_sirkit s,
									tb_perangkat_detail pd
								WHERE
									YEAR (s.tgl_update) <= $tahun
								AND MONTH (s.tgl_update) <=$bulan
								AND s.id_user = (
									SELECT
										id_user
									FROM
										tb_user
									WHERE
										USER = 'l/c'
								)
								AND pd.id_per_detail = s.id_per_detail
								GROUP BY
									id_per_detail
								ORDER BY
									tgl_update DESC
							) tblc
						GROUP BY
							tblc.id_backbone
					) tblc2 ON tblc2.id_backbone = b.id_backbone
					LEFT JOIN (
						SELECT
							tbkondrusak.id_backbone,
							count(*) jumrusak
						FROM
							(
								SELECT
									s.id_per_detail,
									pd.id_backbone,
									MAX(tgl_update) AS tanggal
								FROM
									tb_sirkit s,
									tb_perangkat_detail pd
								WHERE
									YEAR (s.tgl_update) <= $tahun
								AND MONTH (s.tgl_update) <= 23
								AND pd.id_per_detail = s.id_per_detail
								AND s.kondisi = 'rusak'
								GROUP BY
									id_per_detail
								ORDER BY
									tgl_update DESC
							) tbkondrusak
						GROUP BY
							tbkondrusak.id_backbone
					) tbkondrusak2 ON tbkondrusak2.id_backbone = b.id_backbone
					LEFT JOIN (
						SELECT
							tbmea.id_backbone,
							count(*) usedmea
						FROM
							(
								SELECT
									s.id_per_detail,
									pd.id_backbone,
									MAX(tgl_update) AS tanggal
								FROM
									tb_sirkit s,
									tb_perangkat_detail pd
								WHERE
									YEAR (s.tgl_update) <= $tahun
								AND MONTH (s.tgl_update) <=$bulan
								AND s.id_user = (
									SELECT
										id_user
									FROM
										tb_user
									WHERE
										USER = 'mea'
								)
								AND pd.id_per_detail = s.id_per_detail
								GROUP BY
									id_per_detail
								ORDER BY
									tgl_update DESC
							) tbmea
						GROUP BY
							tbmea.id_backbone
					) tbmea2 ON tbmea2.id_backbone = b.id_backbone
					LEFT JOIN (
						SELECT
							tbolo.id_backbone,
							count(*) usedolo
						FROM
							(
								SELECT
									s.id_per_detail,
									pd.id_backbone,
									MAX(tgl_update) AS tanggal
								FROM
									tb_sirkit s,
									tb_perangkat_detail pd
								WHERE
									YEAR (s.tgl_update) <= $tahun
								AND MONTH (s.tgl_update) <=$bulan
								AND s.id_user = (
									SELECT
										id_user
									FROM
										tb_user
									WHERE
										USER = 'olo'
								)
								AND pd.id_per_detail = s.id_per_detail
								GROUP BY
									id_per_detail
								ORDER BY
									tgl_update DESC
							) tbolo
						GROUP BY
							tbolo.id_backbone
					) tbolo2 ON tbolo2.id_backbone = b.id_backbone
					LEFT JOIN tb_perangkat_detail pd ON b.id_backbone = pd.id_backbone
					LEFT JOIN tb_sirkit s ON s.id_per_detail = pd.id_per_detail
					LEFT JOIN tb_sistra st ON st.id_sistra = b.id_sistra
					GROUP BY
						id_backbone";
		
				/*$sql = "SELECT
						s.id_sirkit,
						s.id_per_detail,
						pd.channelida,
						pd.channelidb,
						pd.ddf_a,
						pd.ddf_b,
						s.kondisi,
						bb.kode as backbone,
						a.nama as linka,
						b.nama as linkb,
						u.user,
						s.st_a,
						s.st_b,
						s.tc,
						s.ddf_tc,
						s.ddf_user,
						s.tid,
						s.diu,
						s.tie_line,
						st.sistra,
						s.keterangan,
						s.tgl_update

					FROM 
						tb_sirkit s
						INNER JOIN (
							SELECT id_per_detail, MAX(tgl_update) AS tanggal
								FROM tb_sirkit 
								WHERE id_backbone = '29'
								GROUP BY id_per_detail
								ORDER BY id_per_detail,tgl_update
							)tb_tgl 
						ON 
						(
							s.id_per_detail	= tb_tgl.id_per_detail AND 
							s.tgl_update 	= tb_tgl.tanggal
						)
						INNER JOIN tb_backbone bb 
							ON s.id_backbone = bb.id_backbone 
						INNER JOIN tb_linka a 
							ON s.id_linka = a.id_linka
						INNER JOIN tb_linkb b 
							ON s.id_linkb = b.id_linkb 
						INNER JOIN tb_user u 
							ON s.id_user = u.id_user
						INNER JOIN tb_sistra st 
							ON s.id_sistra = st.id_sistra
						INNER JOIN tb_perangkat_detail pd
							ON s.id_per_detail = pd.id_per_detail
						";*/
					//var_dump($sql);exit();
					$exe 	= mysql_query($sql);
					$datax 	= array();
					while($res = mysql_fetch_assoc($exe)){
							//$tes[]=$res['tid'];
							$datax[]=array(
								'data1'=>array(
									$res['id_backbone'],
									(($res['used2mbps']!=null)?$res['used2mbps']:0)
								),
								'data2'=>array(
									$res['id_backbone'],
									(($res['avail2mbps']!=null)?$res['avail2mbps']:0)
								)
								#substr($res['kode'],0,9),
								#$res['kode'],
								#$res['free2mbps']
								//'linka'=>$res['linka'],
								//'diu'=>$res['diu']
							);
					}
					if($datax!=NULL){
						$outputx=json_encode($datax);
					}else{
						$ouptutx=array('status'=>'kosong');
					}
			break;
			
		}
		echo $outputx;
		#var_dump($outputx);exit();
	}else{
		//$outpux=array('status'=>'gagal');
		echo array('status'=>'gagal');
	}
	//echo $outputx;
		
	
?>