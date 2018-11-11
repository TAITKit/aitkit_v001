<?php
//由view/NewMethod.html呼叫
//新增一組參數(此檔案只會先處理個數，先建一個空欄位，使用者填的資料還不會被存到資料庫，之後會在model/editAlgorithm.php用update的方式補上空白欄位)
//當使用者每按下一次"新增"，就會在名為Paremeter的資料表裡面新增一個欄位，需要注意的是此時form的填寫尚未完成，
//所以還不會有algorithmID，因此會先存algorithmID成-1，等form被submit之後algorithmID=-1的資料會在model/editAlgorithm.php作處理

include('../cfg/cfg.inc.php');
include('../cls/meekrodb.cls.php');
include('../cls/Praetor.cls.php');
            $praetor = new Praetor();
            $sql = "SELECT no FROM Paremeter WHERE algorithmID=%d_algorithmID ORDER BY no desc";
            $data = $praetor->custosql($sql, array('algorithmID'=>'-1'));
            if ($data)
            {
            	$number = $data[0]['no'] + 1;//$data[0]['no']的值從0開始，每新增一筆就會加1
            }
            else
            {
            	$number = 0;
            }
            $praetor->custoinsert('Paremeter', array('algorithmID'=>'-1', 'no'=> $number));
            echo '<div>
                            <table border="1" width="500" cellspacing="0" cellpadding="5" bordercolor="#333333" class="paremeterTable'.$number.'">
<tr>
<th bgcolor="grey" width="400">參數名稱</th>
<th bgcolor="grey" >範圍</th>
<th bgcolor="grey" >格式</th>
<th bgcolor="grey" >功能說明</th>
</tr>
<tr>
<td bgcolor="#FFFFFF" align="left" nowrap><input type="text" id="issueinput1" class="form-control" name="paremeterName'.$number.'" placeholder="EX:-r"></td>
<td bgcolor="#FFFFFF" align="left" nowrap><input type="text" id="issueinput1" class="form-control" name="paremeterRange'.$number.'" placeholder="EX:0~100"></td>
<td bgcolor="#FFFFFF" align="left" nowrap><input type="text" id="issueinput1" class="form-control" name="paremeterFormat'.$number.'" placeholder="EX:-r:50"></td>
<td bgcolor="#FFFFFF" align="left" nowrap><input type="text" id="issueinput1" class="form-control" name="paremeterDescription'.$number.'" placeholder="EX:調整樹的深度"></td>
</tr>
<td bgcolor="#FFFFFF" align="left" nowrap> <button type="button" class="deleteParemeter '.$number.'" value="'.$number.'">
刪除
</button>  
</td>

</table>
                          </div>';//用ajax傳回view/editAlgorithm.html
?>