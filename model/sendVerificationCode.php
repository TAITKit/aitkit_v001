<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include('../cfg/cfg.inc.php');
include('../cls/meekrodb.cls.php');
include('../cls/Praetor.cls.php');
$praetor = new Praetor();

$sql = "SELECT Email FROM pmanager";
$emailArray = $praetor->custosql($sql, array());
$emailExist = 0;
foreach ($emailArray as $key => $value) {
	if ($_POST['Email'] == $value['Email'])
	{
		$emailExist = 1;
		break;
	}
}
if ($emailExist == 0)
{
	echo "該信箱沒有註冊過帳號！";
}
else
{
	function generate_string ($length = 6)
{
    $nps = "";
    for($i=0;$i<$length;$i++)
    {
        $nps .= chr( (mt_rand(1, 36) <= 26) ? mt_rand(97, 122) : mt_rand(48, 57 ));
    }
    return $nps;
}
$verificationCode = generate_string();


$praetor->custoinsert('forgetPassword', array('Email'=>$_POST['Email'], 'verificationCode'=> $verificationCode));


	        //傳送email給老師
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/POP3.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/OAuth.php';
require 'PHPMailer/language/phpmailer.lang-ja.php';

//公式通り

//require_once ( 'PHPMailer/PHPMailerAutoload.php' );
$subject = "修改密碼通知";
$from = "yuzuriha4nerine@gmail.com";
$smtp_user = "yuzuriha4nerine@gmail.com";
$smtp_password = "@1a1b1c1d";

$mail = new PHPMailer(true);
$mail->IsSMTP();
//$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true;
$mail->CharSet = 'utf-8';
$mail->SMTPSecure = 'tls';
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->IsHTML(true);
$mail->Username = $smtp_user;
$mail->Password = $smtp_password; 
$mail->SetFrom($smtp_user);
$mail->From     = "yuzuriha4nerine@gmail.com";
$mail->Subject = $subject;
$mailBody = '您的驗證碼為<br><h1 style="color:red;">'.$verificationCode.'</h1> 請在網站輸入該驗證碼以修改密碼';
                      
$mail->Body = $mailBody;
$mail->AddAddress($_POST['Email']);

if( !$mail -> Send() ){
    $message  = "Message was not sent<br/ >";
    $message .= "Mailer Error: " . $mailer->ErrorInfo;
} else {
    $message  = "Message has been sent";
}
echo "驗證碼已經送出，請到信箱查看";
// echo "<script>alert('驗證碼已經送出，請到信箱查看');</script>";

	// echo "<script>location.href='index.php?item=changePassword';</script>";
}



?>