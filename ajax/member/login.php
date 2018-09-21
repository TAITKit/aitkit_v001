<?php
	session_start();
	if($_POST['name'] == "admin" && $_POST['password'] == "1111"){
		$_SESSION['user'] = $_POST['name'];
		echo "<script>location.href='../../index.php';</script>";
	}else{
		echo "<script>alert('帳號密碼錯誤')</script>";
		echo "<script>location.href='../../index.php';</script>";
	}

?>