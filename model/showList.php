<?php
//本檔案是當導覽列中的DeepLearningMethods按下後會以ajax方式被view/deepLearningMethods.html呼叫
//做的事情主要是從名為'tag'的資料表中讀取資料，依照所選取的tag來顯示演算法簡寫於左方導覽列
	include('../cfg/cfg.inc.php');
	include('../cls/meekrodb.cls.php');
	include('../cls/Praetor.cls.php');
    $praetor = new Praetor();
    if ($_POST['tagName'] == 'All')
    {
    	$sql = "SELECT abbreviation FROM tag GROUP BY abbreviation";
    $data = $praetor->custosql($sql, array());
    foreach ($data as $key => $value) {
    	echo '<a class="title" abbre="'.$value['abbreviation'].'"href="?item=DeepLearningMethods&tag=All&abbre='.$value['abbreviation'].'">'.$value['abbreviation'].'</a>';
    	
    }
	}
    else
    {
    	$sql = "SELECT abbreviation FROM tag WHERE tagName=%s_tagName";
    $data = $praetor->custosql($sql, array('tagName'=>$_POST['tagName']));
    foreach ($data as $key => $value) {
    	echo '<a class="title" abbre="'.$value['abbreviation'].'"href="?item=DeepLearningMethods&tag='.$_POST['tagName'].'&abbre='.$value['abbreviation'].'">'.$value['abbreviation'].'</a>';
    }
    }
    
    
?>