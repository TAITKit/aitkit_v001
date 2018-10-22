<?php

include('../cfg/cfg.inc.php');
include('../cls/meekrodb.cls.php');
include('../cls/Praetor.cls.php');
            $praetor = new Praetor();
            $sql = "SELECT no FROM dataSet WHERE algorithmID=%d_algorithmID ORDER BY no desc";
            $data = $praetor->custosql($sql, array('algorithmID'=>-1));
            if ($data)
            {
            	$number = $data[0]['no'] + 1;
            }
            else
            {
            	$number = 0;
            }
            //$praetor->custoinsert('dataSet', array('algorithmID'=>-1, 'no'=> $number));
            echo '<div>
                            <table border="1" width="500" cellspacing="0" cellpadding="5" bordercolor="#333333">
<tr>
<th bgcolor="grey" width="400">名稱</th>
<th bgcolor="grey" >連結</th>
<th bgcolor="grey" >收費</th>
</tr>
<tr>
<td bgcolor="#FFFFFF" align="left" nowrap><input type="text" id="issueinput1" class="form-control" name="titleInfo" placeholder="EX:WordNet"></td>
<td bgcolor="#FFFFFF" align="left" nowrap><input type="text" id="issueinput1" class="form-control" name="titleInfo" placeholder="EX:https://wordnet.princeton.edu/"></td>
<td bgcolor="#FFFFFF" align="left" nowrap><input type="text" id="issueinput1" class="form-control" name="titleInfo" placeholder="EX:免費"></td>
</tr>

</table>
                          </div>';
?>