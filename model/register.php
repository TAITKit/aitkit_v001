<?php
include('../cfg/cfg.inc.php');
include('../cls/meekrodb.cls.php');
include('../cls/Praetor.cls.php');

$praetor = new Praetor();

$praetor->custoinsert('pmanager', array('PhoneNumber'=>$_POST['phoneNumber'], 'Institute'=> $_POST['unit'], 'PMName'=>$_POST['fullName'], 'Email'=>$_POST['Email'],'Password'=>$_POST['password'],'Conformed'=>0));
echo "<script>alert('已成功註冊！');</script>";
echo "<script>location.href='../index.php';</script>";

?>