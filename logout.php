<?php
	session_start();
	session_destroy();
	echo "<script>window.location='default.php';</script>";
?>
