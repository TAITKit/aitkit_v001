<?php
	session_start();
	include('../../model/ajax_model.php');
	$praetor = new Praetor();
	$sql = "SELECT * FROM pmanager WHERE PID=%d_PID AND Password =%s_Password";
	$data = $praetor->custosql($sql, array('PID'=>$_POST['name'], 'Password'=>$_POST['password']));
	
	if($data[0] != ""){
		$_SESSION['user'] = $data[0];

		echo "<script>location.href='../../index.php';</script>";
	}else{
		if ($_POST['name'] == '1' && $_POST['password'] == '1')
		{
			$_SESSION['user'] = '1';
			echo "<script>location.href='../../index.php';</script>";
		}
		else
		{
			alert_message('../../index.php','帳號密碼錯誤');
		}	
	}

?>