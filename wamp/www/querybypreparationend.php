<?php
error_reporting(E_ALL ^ E_NOTICE^E_DEPRECATED^E_WARNING); 
header('fontbase family="SimHei"');
header('Content-Type:text/html;charset=GB2312');
$date11=$_POST['date11'];
$date12=$_POST['date12'];
$date13=$_POST['date13'];
$date21=$_POST['date21'];
$date22=$_POST['date22'];
$date23=$_POST['date23'];
/* echo $date11;
echo $date12;
echo $date13;
echo $date21;
echo $date22;
echo $date23; */
$db=mysql_connect('localhost','root','');
mysql_select_db("picklist",$db);
$date111="2015/$date11/$date12 $date13";
$date222="2015/$date21/$date22 $date23";
//echo $date111;
//echo $date222;
$query="select
picklistdata.batchnum,picklistdata.PLO,picklistdata.Qty,picklistdata.material_end_time,picklistdata.production_start_time,picklistdata.preparationend,linetype.UpdateTime,linetype.family,picklistdata.status,picklistdata.remark
from
picklistdata left outer join linetype ON picklistdata.PLO=linetype.PLO
WHERE preparationend > '$date111' AND preparationend < '$date222' and picklistdata.Remark not like'%cancel%'
";
//echo $query;
mysql_select_db("picklistdata",$db);
$result=mysql_query($query,$db)or die(mysql_error($db));
?>
<div style="text-align:center;color:#CE0000;">
 <h1>查询结果</h1>
 <table border="7" cellpadding="1" cellspacing="1"
  style="width: 90%;margin-right:auto;margin-left:auto">
  <tr>
  <th>备料批次号</th>
  <th>PLO<?php echo '(';echo $countrows;echo '套)'?></th>
  <th>Qty<?php echo '(';echo $countqty;echo '台)'?></th>
  <th>机型</th>
  <th>仓库结束备料时间</th>
  <th>产线开始备料时间</th>
  <th>产线备料结束时间</th>
  <th>WIP时间</th>
  </tr>
</div> 
<?php 
 //loop through the results

 while($row=mysql_fetch_assoc($result))
{
extract($row);
echo'<tr>';
echo'<td>'.$batchnum.'</td>';
echo'<td>'.$PLO.'</td>';
echo'<td>'.$Qty.'</td>';
echo'<td>'.$family.'</td>';
echo'<td>'.$material_end_time.'</td>';
echo'<td>'.$production_start_time.'</td>';
echo'<td>'.$preparationend.'</td>';
echo'<td>'.$UpdateTime.'</td>';
echo'</tr>';
}
//echo'<td>'.'<form action="submit.php" method="post" style="margin:0px" ><input type="text" name="Remark1" /><input type="hidden" name="Remark2" value="'.$batchnum.'"/>'.'</td>';
//echo'<td>'.'<input type="submit" name="submit" value="更新"/>
//</form>'.'</td>';
?>
 </table>