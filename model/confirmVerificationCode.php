<?php
session_start();
include('../cfg/cfg.inc.php');
include('../cls/meekrodb.cls.php');
include('../cls/Praetor.cls.php');

$praetor = new Praetor();
$sql = "SELECT verificationCode FROM forgetpassword WHERE Email=%s_Email";
$verificationCodeArray = $praetor->custosql($sql, array('Email'=>$_POST['Email']));
$correct = 0;
foreach ($verificationCodeArray as $key => $value) {
  if ($_POST['verificationCode'] == $value['verificationCode'])
  {
    $correct = 1;
    break;
  }
}
if ($correct == 0)
{
  echo "驗證碼輸入錯誤！";
}
else
{
  echo "成功";
  $_SESSION['email'] = $_POST['Email'];
}
?>