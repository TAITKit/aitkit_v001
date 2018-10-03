<?php
$uploaddir = 'upload/';
$uploadfile = $uploaddir.basename($_FILES['myfile']['name']);


if(file_exists(iconv("utf-8", "big5", $uploadfile)))
{
  echo "<script>alert('檔案已存在！');</script>";
  echo "<script>location.href='index.php?item=NewMethod';</script>";
}else
{
 	if (move_uploaded_file($_FILES['myfile']['tmp_name'], iconv("utf-8", "big5", $uploadfile))) 
	{

	}
	else 
	{
    	echo "<script>alert('檔案上傳失敗！');</script>";
  		echo "<script>location.href='index.php?item=NewMethod';</script>";
	}
}
$praetor = new Praetor();
	$algorithmID = mt_rand(0, 10000);
	$praetor->custoinsert('algorithm', array('AID'=> $algorithmID, 'OwnerPID'=>$_SESSION['user']['PID'], 'AlgorithmTitle'=>$_POST['titleInfo'],'GitHub'=>$_POST['github'],'PdfFileName'=>$_FILES['myfile']['name'], 'Logo'=>'logo.png','StimulusType'=>'int', 'ServerIP'=>$_POST['serverInfo'], 'Abbreviation'=>$_POST['titleAbbre']));
	//$licenseKey = $_SESSION['user']['PMName'][0];
	// $userLenth = strlen($_SESSION['user']['PMName']);
	// $n = 1;
	// while ($n < $userLenth) {

	// 	if ($_SESSION['user']['PMName'][$n] == ' ' && $n + 1 != $userLenth)
	// 	{
	// 		$licenseKey = $licenseKey.$_SESSION['user']['PMName'][$n + 1];
	// 	}
	// 	$n = $n + 1;
	// }
	// $licenseKey = $licenseKey.'_'.$_POST['titleInfo'][0];
	// $titleLenth = strlen($_POST['titleInfo']);
	// $n = 1;
	// while ($n < $titleLenth) {
	// 	if ($_POST['titleInfo'][$n] == ' ' && $n + 1 != $titleLenth)
	// 	{
	// 		$licenseKey = $licenseKey.$_POST['titleInfo'][$n + 1];
	// 	}
	// 	$n = $n + 1;
	// }

	$licenseKey = strtoupper($_SESSION['user']['PMName'][0].substr($_SESSION['user']['PMName'], strpos($_SESSION['user']['PMName'], '-') + 1, 1).substr($_SESSION['user']['PMName'], strpos($_SESSION['user']['PMName'], ' ') + 1));
	if (strpos($_POST['titleAbbre'], ' ')  !== false)
	{
		$licenseKey = $licenseKey.'_'.strtoupper(substr($_POST['titleAbbre'], 0, strpos($_POST['titleAbbre'], ' ')));
	}
	else
	{
		$licenseKey = $licenseKey.'_'.strtoupper($_POST['titleAbbre']);
	}

	$sql = "SELECT * FROM algorithm WHERE AID=%s_AID";
	$data = $praetor->custosql($sql, array('AID'=>$algorithmID));
	$licenseKey = $licenseKey.'@'.$data[0]['Portnumber'];
	//print_r($licenseKey);
	//echo "<script>alert('".$licenseKey."');</script>";
	//echo "<script>location.href='index.php?item=praetorLogin';</script>";
//傳送email給老師
	require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/POP3.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/OAuth.php';
require 'PHPMailer/language/phpmailer.lang-ja.php';

//公式通り
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//require_once ( 'PHPMailer/PHPMailerAutoload.php' );
$subject = "您已成功上傳演算法，以下為您的上傳資訊";
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
$mail->Body = "<div><label>您已成功上傳演算法，以下為您的上傳資訊：</label></div><div>
                              <label>Algorithm's title:</label>
                              <label>".$_POST['titleInfo']."</label>
                          </div>
                          <div>
							  <label>Abbreviation:</label>
							  <label>".$_POST['titleAbbre']."</label>
                          </div>
                          <div>
							  <label>Server Daemon's Information:</label>
							  <label>".$_POST['serverInfo']."</label>
                          </div>
                          <div>
							  <label>Algorithm's Description:</label>
							  <label>".$_FILES['myfile']['name']."</label>
                          </div>
                          <div>
							  <label>Source Code:</label>
							  <label>".$_POST['github']."</label>
                          </div>
                          <div>
							  <label>License key:</label>
							  <label>".$licenseKey."</label>
                          </div>";
$mail->AddAddress($_SESSION['user']['Email']);

if( !$mail -> Send() ){
    $message  = "Message was not sent<br/ >";
    $message .= "Mailer Error: " . $mailer->ErrorInfo;
} else {
    $message  = "Message has been sent";
}


?>

<!DOCTYPE html>
<style type="text/css">
	form {
  margin: 0 auto;
  width: 400px;
  padding: 1em;
  border: 1px solid #CCC;
  border-radius: 1em;
}

form div + div {
  margin-top: 1em;
}

label {
  display: inline-block;
  width: 90px;
  text-align: center;
}

input, textarea {
  font: 1em sans-serif;
  width: 300px;
  box-sizing: border-box;
  border: 1px solid #999;
}

input:focus, textarea:focus {
  border-color: #000;
}

textarea {
  vertical-align: top;
  height: 5em;
}

button {
  margin-left: .5em;
}

.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}

</style>

<html>
<div class="form-group">
	<form action="index.php?item=praetorLogin" method="post">
		<h3 class="Topic">您已成功上傳演算法，以下為您的上傳資訊：</h3>
		
	<div>
                              <label>Algorithm's title:</label>
                              <label><?php echo $_POST['titleInfo'];?></label>
                          </div>
                          <div>
							  <label>Abbreviation:</label>
							  <label><?php echo $_POST['titleAbbre'];?></label>
                          </div>
                          <div>
							  <label>Server Daemon's Information:</label>
							  <label><?php echo $_POST['serverInfo'];?></label>
                          </div>
                          <div>
							  <label>Algorithm's Description:</label>
							  <label><?php echo $_FILES['myfile']['name'];?></label>
                          </div>
                          <div>
							  <label>Source Code:</label>
							  <label><?php echo $_POST['github'];?></label>
                          </div>
                          <div>
							  <label>License key:</label>
							  <label><?php echo $licenseKey;?></label>
                          </div>
                          <div>
                          <button type="submit" class="button">
        					<i class="add button"></i> 確定
    					</button>
    				</div>

                      </form>
</div>
</html>


