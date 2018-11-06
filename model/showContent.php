<?php
//本檔案是在當頁面停留在DeepLearningMethods時按下左方導覽列的演算法時會以ajax的方式被view/deepLearningMethods.html呼叫
//做的事情主要是顯示被選到的演算法的內容
	include('../cfg/cfg.inc.php');
	include('../cls/meekrodb.cls.php');
	include('../cls/Praetor.cls.php');
    $praetor = new Praetor();
    $sql = "SELECT * FROM algorithm WHERE Abbreviation=%s_Abbreviation";
    $data = $praetor->custosql($sql, array('Abbreviation'=>$_POST['abbre']));
    echo '<fieldset>
      <legend>程式名稱:</legend>
  <div>
                              <label for="issueinput1">簡寫:</label>
                              <label>'.$data[0]['Abbreviation'].'</label>
                          </div>
                          <div>
                              <label for="issueinput5">全名:</label>
                              <label>'.$data[0]['AlgorithmTitle'].'</label>
                          </div>
                          </fieldset>
                          <fieldset>
      <legend>作者/單位:</legend>
  <div>
                              <label for="issueinput1">作者英文名:</label>
                              <label>'.$data[0]['authorName'].'</label>
                          </div>
                          <div>
                              <label for="issueinput5">單位:</label>
                              <label>'.$data[0]['authorUnit'].'</label>
                          </div>
                          </fieldset>
                          <fieldset>
      <legend>程式功能:</legend>
  <div>
                              <label for="issueinput1">英文:</label>
                              <label>'.$data[0]['functionEnglish'].'</label>
                          </div>
                          <div>
                              <label for="issueinput5">中文:</label>
                              <label>'.$data[0]['functionChinese'].'</label>
                          </div>
                          </fieldset>
                          <fieldset>
      <legend>程式功能說明-文字描述(中英文皆可)</legend>
  <div>
    <textarea>'.$data[0]['functionDescription'].'</textarea>
                          </div>
                         
                          </fieldset>
                          <fieldset>
      <legend>程式源碼:</legend>
  <div>
                              <a href="'.$data[0]['GitHub'].'">'.$data[0]['GitHub'].'</a>
                          </div>
                          </fieldset>';
    
    
?>