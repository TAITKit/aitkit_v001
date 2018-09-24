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


?>
