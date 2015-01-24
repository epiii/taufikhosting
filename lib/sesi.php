<?php
	session_start();
	if(!isset($_SESSION['loginMUX']) and $_SESSION['loginMUX']==0){
		//header('location:logout.php');
		header('location:../logout.php');
	}else{
	
	}
?>