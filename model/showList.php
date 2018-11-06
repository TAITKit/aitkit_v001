<?php
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