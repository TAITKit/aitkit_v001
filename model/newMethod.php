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
	$sql = "SELECT no FROM dataSet WHERE algorithmID=%d_algorithmID ORDER BY no desc";
            $dataSetData = $praetor->custosql($sql, array('algorithmID'=>'-1'));
            if ($dataSetData)
            {
            	$n = 0;
            	while ($n <= $dataSetData[0]['no'])
            	{
            		$dataSetWhere = new WhereClause('and'); // create a WHERE statement of pieces joined by ANDs
					$dataSetWhere->add('algorithmID=%s', '-1');
					$dataSetWhere->add('no=%d', $n);
            		$praetor->custoupdate('dataSet', array('dataSetName'=>$_POST['dataSetName'.$n], 'url'=>$_POST['dataSetURL'.$n], 'fee'=>$_POST['dataSetFee'.$n]), "%l", $dataSetWhere);
            		$n = $n + 1;
            	}

            		$praetor->custoupdate('dataSet', array('algorithmID'=>$algorithmID), "algorithmID=%s", '-1');
            }

            $sql = "SELECT * FROM Paremeter WHERE algorithmID=%d_algorithmID ORDER BY no desc";
            $paremeterData = $praetor->custosql($sql, array('algorithmID'=>'-1'));
            if ($paremeterData)
            {
            	$n = 0;
            	while ($n <= $paremeterData[0]['no'])
            	{
            		$paremeterWhere = new WhereClause('and'); // create a WHERE statement of pieces joined by ANDs
					$paremeterWhere->add('algorithmID=%s', '-1');
					$paremeterWhere->add('no=%d', $n);
            		$praetor->custoupdate('Paremeter', array('paremeter'=>$_POST['paremeterName'.$n], 'paremeterRange'=>$_POST['paremeterRange'.$n], 'function'=>$_POST['paremeterDescription'.$n], 'format'=>$_POST['paremeterFormat'.$n]), "%l", $paremeterWhere);
            		$n = $n + 1;
            	}
            		$praetor->custoupdate('Paremeter', array('algorithmID'=>$algorithmID), "algorithmID=%s", '-1');
            }
	        


?>

<!DOCTYPE html>
<style type="text/css">
	form {
  margin: 0 auto;
  width: 1400px;
  padding: 1em;
  border: 1px solid #CCC;
  border-radius: 1em;
}

  fieldset {
  margin-left: 0;
  width: 750px;
  padding: 1em;
  border: 1px solid #CCC;
  border-radius: 1em;
}

form div + div {
  margin-top: 1em;
}

label {
  display: inline-block;
  text-align: center;
}

input, textarea {
  vertical-align: top;
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
		
	<fieldset>
      <legend>程式名稱:</legend>
	<div>
                              <label for="issueinput1">簡寫:</label>
                              <label><?php echo $_POST['titleAbbre'];?></label>
                          </div>
                          <div>
                              <label for="issueinput5">全名:</label>
                              <label><?php echo $_POST['titleInfo'];?></label>
                          </div>
                          </fieldset>
                          <fieldset>
      <legend>作者/單位:</legend>
  <div>
                              <label for="issueinput1">作者英文名:</label>
                              <label><?php echo $_POST['authorName'];?></label>
                          </div>
                          <div>
                              <label for="issueinput5">單位:</label>
                              <label><?php echo $_POST['authorUnit'];?></label>
                          </div>
                          </fieldset>
                          <fieldset>
      <legend>程式功能:</legend>
  <div>
                              <label for="issueinput1">英文:</label>
                              <label><?php echo $_POST['functionEnglish'];?></label>
                          </div>
                          <div>
                              <label for="issueinput5">中文:</label>
                              <label><?php echo $_POST['functionChinese'];?></label>
                          </div>
                          </fieldset>
                          <fieldset>
      <legend>程式功能說明-文字描述(中英文皆可)</legend>
  <div>
    <textarea><?php echo $_POST['functionDescription'];?></textarea>
                          </div>
                         
                          </fieldset>
                          <fieldset>
      <legend>程式源碼:</legend>
  <div>
                              <label><?php echo $_POST['github'];?></label>
                          </div>
                          </fieldset>
                          <fieldset>
      <legend>程式類別:</legend>
  <div>
                              <label><?php echo $_POST['classification'];?></label>
                          </div>
                          </fieldset>
                          <?php if ($dataSetData)
                          {
                          	?>
                          <fieldset>
      <legend>執行程式所需要的資料集，語料庫等等的資源:</legend>
    <div>
    	<?php
    		$n = 0;
                          	while ($n <= $dataSetData[0]['no'])
                          	{
    	?>
                            <table border="1" width="500" cellspacing="0" cellpadding="5" bordercolor="#333333">
<tr>
<th bgcolor="grey" >名稱</th>
<th bgcolor="grey" >連結</th>
<th bgcolor="grey" >收費</th>
</tr>
<tr>
<td bgcolor="#FFFFFF" align="left" nowrap><?php echo $_POST['dataSetName'.$n];?></td>
<td bgcolor="#FFFFFF" align="left" nowrap><?php echo $_POST['dataSetURL'.$n];?></td>
<td bgcolor="#FFFFFF" align="left" nowrap><?php echo $_POST['dataSetFee'.$n];?></td>
</tr>

</table>
<?php
	$n = $n + 1;
                      }?>
                          </div>                 
                          
                          
                          </fieldset>
                          <?php
                      }?>
                          <fieldset>
      <legend>執行程式所需要的系統環境及套件:</legend>
  <div>
                              <label for="issueinput10">系統環境:</label>
                              <label><?php echo $_POST['systemEnvironment'];?></label>
                            </div>
                            <div>
                              <label for="issueinput5">套件:</label>
                              <label><?php echo $_POST['package'];?></label>
                          </div>
                          </fieldset>
                          <?php if ($_POST['inputFormat'])
                          {
                          	?>
                          <fieldset class="inputAllowed">
      <legend>程式接受的輸入/輸出格式:</legend>
  <div>
                            <label for="input">輸入格式:</label>
                <label><?php echo $_POST['inputFormat'];?></label>
                          </div>
                          <div>
                            <label for="output">輸出格式:</label>
                <label><?php echo $_POST['outputFormat'];?></label>
                          </div>
                          </fieldset>
                          <?php
                      }?>
                      <?php
                      		if ($paremeterData)
                      		{
                      ?>
                          <fieldset  class="inputAllowed paremeterAllowed">
      <legend>參數的功能說明以及參數是否是有範圍(Range):</legend>

                       <div>
                       	<?php 
      	$n = 0;
      	while ($n <= $paremeterData[0]['no'])
      	{
      ?>
                            <table border="1" width="500" cellspacing="0" cellpadding="5" bordercolor="#333333">
<tr>
<th bgcolor="grey" >參數名稱</th>
<th bgcolor="grey" >範圍</th>
<th bgcolor="grey" >格式</th>
<th bgcolor="grey" >功能說明</th>
</tr>
<tr>
<td bgcolor="#FFFFFF" align="left" nowrap><?php echo $_POST['paremeterName'.$n];?></td>
<td bgcolor="#FFFFFF" align="left" nowrap><?php echo $_POST['paremeterRange'.$n];?></td>
<td bgcolor="#FFFFFF" align="left" nowrap><?php echo $_POST['paremeterFormat'.$n];?></td>
<td bgcolor="#FFFFFF" align="left" nowrap><?php echo $_POST['paremeterDescription'.$n];?></td>
</tr>

</table>
<?php
	$n = $n + 1;
}
?>
                          </div>               
                          </fieldset>
                          <?php
                      }?>
                      <fieldset>
      <legend>License key:</legend>
  <div>
                              <label><?php echo $licenseKey;?></label>
                          </div>
                          </fieldset>
                          <div>
                          <button type="submit" class="button">
        					<i class="add button"></i> 確定
    					</button>
    				</div>

                      </form>
</div>
</html>



