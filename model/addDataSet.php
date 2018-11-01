<?php
//由view/NewMethod.html呼叫
//新增一組資料集(此檔案只會先處理個數，先建一個空欄位，使用者填的資料還不會被存到資料庫，之後會在model/editAlgorithm.php用update的方式補上空白欄位)
//當使用者每按下一次"新增"，就會在名為dataSet的資料表裡面新增一個欄位，需要注意的是此時form的填寫尚未完成，
//所以還不會有algorithmID，因此會先存algorithmID成-1，等form被submit之後algorithmID=-1的資料會在model/editAlgorithm.php作處理

include('../cfg/cfg.inc.php');
include('../cls/meekrodb.cls.php');
include('../cls/Praetor.cls.php');
            $praetor = new Praetor();
            $sql = "SELECT no FROM dataSet WHERE algorithmID=%d_algorithmID ORDER BY no desc";
            $data = $praetor->custosql($sql, array('algorithmID'=>'-1'));
            if ($data)
            {
            	$number = $data[0]['no'] + 1;//$data[0]['no']的值從0開始，每新增一筆就會加1
            }
            else
            {
            	$number = 0;
            }
            $praetor->custoinsert('dataSet', array('algorithmID'=>'-1', 'no'=> $number));
            echo '<div>
                            <table border="1" width="500" cellspacing="0" cellpadding="5" bordercolor="#333333">
<tr>
<th bgcolor="grey" width="400">名稱</th>
<th bgcolor="grey" >連結</th>
<th bgcolor="grey" >收費</th>
</tr>
<tr>
<td bgcolor="#FFFFFF" align="left" nowrap><input type="text" id="issueinput1" class="form-control" name="dataSetName'.$number.'" placeholder="EX:WordNet"></td>
<td bgcolor="#FFFFFF" align="left" nowrap><input type="text" id="issueinput1" class="form-control" name="dataSetURL'.$number.'" placeholder="EX:https://wordnet.princeton.edu/"></td>
<td bgcolor="#FFFFFF" align="left" nowrap><input type="text" id="issueinput1" class="form-control" name="dataSetFee'.$number.'" placeholder="EX:免費"></td>
</tr>

</table>
                          </div>';//用ajax傳回view/editAlgorithm.html
?>