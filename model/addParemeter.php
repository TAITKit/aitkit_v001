<?php

include('../cfg/cfg.inc.php');
include('../cls/meekrodb.cls.php');
include('../cls/Praetor.cls.php');
            $praetor = new Praetor();
            $sql = "SELECT no FROM Paremeter WHERE algorithmID=%d_algorithmID ORDER BY no desc";
            $data = $praetor->custosql($sql, array('algorithmID'=>'-1'));
            if ($data)
            {
            	$number = $data[0]['no'] + 1;
            }
            else
            {
            	$number = 0;
            }
            $praetor->custoinsert('Paremeter', array('algorithmID'=>'-1', 'no'=> $number));
            echo '<div>
                            <table border="1" width="500" cellspacing="0" cellpadding="5" bordercolor="#333333">
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

</table>
                          </div>';
?>