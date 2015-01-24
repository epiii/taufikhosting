<?php
include "lib/koneks.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = anti_injection($_POST['username']);
$pass     = anti_injection(md5($_POST['password']));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($pass)){
  echo "<script>alert('silahkan lengkapi data dengan benar atau anda lupa ID dan password');window.location='default.php'</script>";
}
else{
$login=mysql_query("SELECT * 
					FROM
						tb_peg u
					WHERE 
						u.username='$username' AND 
						u.password='$pass' /*AND 
						u.blokir='N'*/
						");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  include "lib/timeout.php";

  $_SESSION[id_userMUX]		= $r[id_peg];
  $_SESSION[namauserMUX]   	= $r[username];
  $_SESSION[namalengkapMUX]	= $r[nama];
  $_SESSION[passuserMUX]   	= $r[password];
  $_SESSION[leveluserMUX]	= $r[id_level];
  $_SESSION[fotouserMUX]   	= $r[foto];
  
  // session timeout
  $_SESSION[loginMUX] = 1;
  timer();

	$sid_lama = session_id();
	
	session_regenerate_id();

	$sid_baru = session_id();

  mysql_query("UPDATE tb_peg SET id_session='$sid_baru' WHERE username='$username'");
  //header('location:index.php');
  header('location:index.php?hlm=aG9tZQ==');
}
else{
  echo "<script>
			alert('username / password salah ');
			window.location='default.php'
		</script>";
}
}
?>
