<?php
session_start();
include('../cfg/cfg.inc.php');
include('../cls/meekrodb.cls.php');
include('../cls/Praetor.cls.php');
if ($_POST['password'] != $_POST['confirm'])
{
	echo "<script>alert('第二次輸入的密碼和第一次不同！');</script>";
	echo "<script>location.href='../index.php?item=changePassword';</script>";
}
else
{
	$praetor = new Praetor();
	$where = new WhereClause('and'); // create a WHERE statement of pieces joined by ANDs
	$where->add('Email=%s', $_SESSION['email']);
    $praetor->custoupdate('pmanager', array('Password'=>$_POST['password']), "%l", $where);
    $praetor->custodelete('forgetpassword', 'Email=%s', $_SESSION['email']);
	$_SESSION['email']='';
	echo "<script>alert('接下來請用新的密碼登入！');</script>";
	echo "<script>location.href='../index.php?item=Login';</script>";
}

?>