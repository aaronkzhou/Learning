<?php
error_reporting(E_ALL ^ E_NOTICE^E_DEPRECATED^E_WARNING); 
header('fontbase family="SimHei"');
header('Content-Type:text/html;charset=GB2312');
//connect to mysql_affected_rows
$db=mysql_connect('localhost','root','') or die('unable to connect.check your connection prameters.');
mysql_select_db('picklist',$db) or die(mysql_error($db));
$query1='
select
picklistdata.batchnum,picklistdata.PLO,picklistdata.Qty,picklistdata.material_end_time,picklistdata.production_start_time,picklistdata.preparationend,linetype.UpdateTime,linetype.family,picklistdata.status
from
picklistdata left outer join linetype ON picklistdata.PLO=linetype.PLO
where(material_end_time<>"" and production_start_time<>"" and preparationend<>""and UpdateTime=""and picklistdata.remark not like"%cancel%")and status not like"%close%"and picklistdata.status not like"%cancel%"
';
mysql_query("SET NAMES utf8");
$result1=mysql_query($query1,$db);

//determine number of rows in returned result
$countrows=mysql_num_rows($result1);

for($i=0;$i<$countrows;$i++)
{
$countqty=$countqty+mysql_result($result1,$i,2);
}
mysql_query("SET NAMES utf8");
$result1=mysql_query($query1,$db)or die(mysql_error($db));
?>

<div style="text-align:center;color:#CE0000;">
 <h1>等待上线组装</h1>
<table border="1" cellpadding="0" cellspacing="0"
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

 while($row=mysql_fetch_assoc($result1))
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
