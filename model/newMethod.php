<?php
//有要上傳檔案的話反註解
// $uploaddir = 'upload/';
// $uploadfile = $uploaddir.basename($_FILES['myfile']['name']);


// if(file_exists(iconv("utf-8", "big5", $uploadfile)))
// {
//   echo "<script>alert('檔案已存在！');</script>";
//   echo "<script>location.href='index.php?item=NewMethod';</script>";
// }else
// {
//  	if (move_uploaded_file($_FILES['myfile']['tmp_name'], iconv("utf-8", "big5", $uploadfile))) 
// 	{

// 	}
// 	else 
// 	{
//     	echo "<script>alert('檔案上傳失敗！');</script>";
//   		echo "<script>location.href='index.php?item=NewMethod';</script>";
// 	}
// }
$praetor = new Praetor();
	$algorithmID = mt_rand(0, 10000);
	$praetor->custoinsert('algorithm', array('AID'=> $algorithmID, 'OwnerPID'=>$_SESSION['user']['PID'], 'AlgorithmTitle'=>$_POST['titleInfo'],'GitHub'=>$_POST['github'],'Abbreviation'=>$_POST['titleAbbre'], 'Input'=>$_POST['inputFormat'], 'Output'=>$_POST['outputFormat'], 'authorName'=>$_POST['authorName'], 'authorUnit'=>$_POST['authorUnit'], 'functionEnglish'=>$_POST['functionEnglish'], 'functionChinese'=>$_POST['functionChinese'], 'functionDescription'=>$_POST['functionDescription'], 'classification'=>$_POST['classification'], 'systemEnvironment'=>$_POST['systemEnvironment'], 'package'=>$_POST['package']));
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
	$praetor->custoupdate('algorithm', array('LicenseKey'=>$licenseKey), "AID=%s", $algorithmID);
	//print_r($licenseKey);
	//echo "<script>alert('".$licenseKey."');</script>";
	//echo "<script>location.href='index.php?item=praetorLogin';</script>";




