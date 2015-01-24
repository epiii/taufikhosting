<?php
	/*function murni($inp){
		mysql_real_escape_string($inp);
		return $inp;
	}*/
	
	function murni($data){
		$filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
		return $filter;
	}
?>