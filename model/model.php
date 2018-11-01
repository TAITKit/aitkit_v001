<?php
	//會被include在index.php
	//目的是一口氣require cls資料夾裡面的.php
	//include_once('../../lib/lib.php');
	include_once('cfg/cfg.inc.php');	
	function __autoload($ClassName){
		require_once('cls/'.$ClassName.".cls.php");
	}
	function alert_message($path,$message){
		echo "<script>alert('".$message."');</script>";
		echo "<script>location.href='".$path."';</script>";
	}

?>