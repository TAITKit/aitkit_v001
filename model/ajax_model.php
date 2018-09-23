<?php
	//include_once('../../lib/lib.php');
	include_once('../../cfg/cfg.inc.php');	
	require_once('../../cls/meekrodb.cls.php');
	require_once('../../cls/Fisher.cls.php');
	require_once('../../cls/Praetor.cls.php');
	function alert_message($path,$message){
		echo "<script>alert('".$message."');</script>";
		echo "<script>location.href='".$path."';</script>";
	}

?>