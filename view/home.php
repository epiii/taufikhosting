<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='home'){
?>	
<center><h1>Selamat Datang Di Sistem Pelaporan Data Potensi Kanal Arnet SBB, STO Kebalen</center>
<center>
<!-- <img src="img/kantor2.JPG" width="500"/> -->
<!-- <img src="img/kantor3.JPG" width="500"/> -->
</center>     
<?php
		}else{
			echo "<script>window.location='?hlm=aG9tZQ=='</script>";
		}
	}else{
			echo "<script>window.location='?hlm=aG9tZQ=='</script>";
	}
?>